
<?php
/**
 * Fetches and Caches a Instagram Feed
 *
 * - Get an Instagram Developer Account here: https://www.instagram.com/developer/
 * - Create a new client, using the 'redirect URI' as https://rudrastyh.com/tools/access-token
 * - Get an access token here: https://rudrastyh.com/tools/access-token
 * - This file will return JSON - so use some AJAX on the front-end to display
 * - Add the instagram-feed-cache.json file as ignored, to .gitignore
 */
class SocialFeed
{
    public $instagram = [
        'url' => 'https://api.instagram.com/v1/users/self/media/recent?',
        'expiry' => 3600 * 24, // 24 Hours
        'cache' => 'instagram-feed-cache.json'
    ];

    /**
     * Fetch Instagram Feed
     *
     * @param  str  $token - Instagram Access Token
     * @param  integer $count - Number of posts to output
     * @return json - The actual feed
     */
    public function instagramFeed($token = '', $count = 9) {
        $this->instagram['url'] .= 'access_token=' . $token . '&count=' . $count;
        return $this->getFeed('instagram');
    }

    /**
     * Always load the feed from cache file, but fetch fresh when needed
     *
     * @param  string  $type - feed config to use
     * @return json - The actual feed
     */
    private function getFeed($type = 'instagram', $formatFeed = null) {
        $thisType = $this->$type;

        if(
            !is_file($thisType['cache'])
            OR filesize($thisType['cache']) == 0
            OR filemtime($thisType['cache']) < (time() - $thisType['expiry'])
        ) {
            $this->fetchAndCacheFeed($type, $formatFeed);
        }

        return require($thisType['cache']);
    }

    /**
     * Fetch the feed and save to cache file
     */
    private function fetchAndCacheFeed($type = 'instagram', $formatFeed = null) {
        ob_start();

        $thisType = $this->$type;

        try {
            // Attempt to fetch from API
            $res = @file_get_contents($thisType['url']);

            // Throw to the catch
            if (empty($res)) throw new Exception('');
            // If we've passed a "format" hook, call it now
            if (!empty($formatFeed)) $res = $formatFeed($res);

            echo $res;
            file_put_contents($thisType['cache'], ob_get_contents());

        } catch (Exception $e) {
            // Error occured. Set the file modification time to now
            // so a refresh isn't attempted continuously.
            touch($thisType['cache']);
        }

        ob_end_clean();
    }
}

$SocialFeed = new SocialFeed();
$SocialFeed->instagramFeed("YOUR_ACCESS_TOKEN_HERE", 9);
