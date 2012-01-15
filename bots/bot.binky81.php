<?php

/**
 * The binky81 bot is robotic clone of binky79 from the Digg days of yore, only brought to reddit.
 * What binky81 does is look at all links on the xkcd subreddit that link to a comic. It will then
 * leave a comment on that link stating that "This is the greatest xkcd of all time" (slightly
 * different from the original "This is the best xkcd ever!"). It will only allow itself to comment
 * on a link one time.
 */

function runBinky81($bot) {

	$retVal = false;

	// Get all the front page posts from the XKCD subreddit
	$posts = $bot->GetPageListing('r/xkcd/');
	if (is_array($posts)) {
		foreach ($posts as $post) {
			// Ensure that the data we got back is clean, that we haven't posted on this link before,
			// and that the link points to the xkcd domain
			if (is_object($post) && strpos($bot->data, $post->data->id) === false && $post->data->domain == 'xkcd.com') {
				
				// Leave the comment...
				$bot->Comment('This is the greatest xkcd of all time!', $post->data->id, REDDIT_LINK);
				
				// ... save the ID so we know we've been here
				$bot->data .= ',' . $post->data->id;
				$bot->Save();
				
				// ... give some meaningful output back to the main script
				$retVal = $post->data->id . ': ' . $post->data->permalink;
				break;
			}
		}
	}

	return $retVal;
	
}