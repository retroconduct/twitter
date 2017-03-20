<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Thujohn\Twitter\Twitter;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
	public function index(Request $request)
    {
    	$tweets = [];

    	if (isset($request->handle) && !empty($request->handle)) {
	    	try {
		    	$tweets = $this->getTweets($request->handle);
		    } catch (\Exception $e) {
		    	return view('exception', ['exception' => $e]);
		    }
		}

        return view('twitter', ['tweets' => $tweets]);
    }

    /**
     * Returns most recent 5 tweets of given handle
     * 
     * @param  string $handle twitter handle
     * @return object $tweets collection object of tweets         
     */
    public function getTweets($handle)
    {
    	$tweets = \Twitter::getUserTimeline(
    		[
				'screen_name' => $handle, 
				'count'       => 5, 
				'format'      => 'object',
    		]
    	);

    	return $tweets;
    }
}
