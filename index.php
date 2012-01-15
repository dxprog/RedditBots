<?php

/**
 * The reddit bot bootstrapper. This executes all bots that are enabled in the database 
 * and saves their output to a log file. This can be executed by any means, but is intended
 * to be run as a cron job.
 */

// For a timezone to avoid warnings when using time related functions
date_default_timezone_set('America/Chicago');

// Absolute file path to the directory containing this script
define('BOT_PATH', '/var/www/reddit/');

require('lib.pdo.php');
require('reddit.php');

Db::Connect('mysql:dbname=reddit_bots;host=localhost', 'MYSQL_USER', 'MYSQL_PASSWORD');

$f = fopen(BOT_PATH . 'cron.log', 'a');

// Get all enabled bots from the database
$result = Db::Query('SELECT bot_id, bot_name FROM bot_users WHERE bot_enabled = 1');
while ($row = Db::Fetch($result)) {
	
	// Ensure the bot script exists before continuing
	$botFile = BOT_PATH . 'bots/bot.' . $row->bot_name . '.php';
	if (file_exists($botFile)) {
		
		// Include the script...
		require_once($botFile);
		
		// ...instantiate the bot...
		$bot = new RedditBot((int)$row->bot_id);
		
		// ...run the callback...
		$retVal = $bot->Run();
		
		// ... and save the output.
		fwrite($f, date('r') . ': (' . $row->bot_name . ') ' . ($retVal !== false ? $retVal : 'failed') . PHP_EOL);
	}
}

fclose($f);