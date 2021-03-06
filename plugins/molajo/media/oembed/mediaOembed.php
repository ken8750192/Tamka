<?php
/**
 * @package     Molajo
 * @subpackage  Molajo Media oEmbed Plugin
 * @copyright   Copyright (C) 2011 Amy Stephen. All rights reserved.
 * @license     GNU General Public License Version 2, or later http://www.gnu.org/licenses/gpl.html
 */
defined('MOLAJO') or die();



class MediaoEmbed extends JPlugin	{

    function onAfterInitialise () {

        /**
         * 	Get Tamka Plugin Information
         */
        $plugin 	=& JPluginHelper::getPlugin( 'molajo', 'backup');
        $pluginParams = new JParameter($plugin->params);

/**
http://oembed.com/

JSON endpoints
[
{
"url": "http://*.blip.tv/*", 
"url_re": "blip\\.tv/.+", 
"example_url": "http://pycon.blip.tv/file/2058801/", 
"endpoint_url": "http://blip.tv/oembed/", 
"title": "blip.tv"
}, 
{
"url": "http://*.dailymotion.com/*", 
"url_re": "dailymotion\\.com/.+", 
"example_url": "http://www.dailymotion.com/video/x5ioet_phoenix-mars-lander_tech", 
"endpoint_url": "http://www.dailymotion.com/api/oembed/", 
"title": "Dailymotion"
}, 
{
"url": "http://*.flickr.com/photos/*", 
"url_re": "flickr\\.com/photos/[-.\\w@]+/\\d+/?", 
"example_url": "http://www.flickr.com/photos/fuffer2005/2435339994/", 
"endpoint_url": "http://www.flickr.com/services/oembed/", 
"title": "Flickr Photos"
}, 
{
"url": "http://www.hulu.com/watch/*", 
"url_re": "hulu\\.com/watch/.*", 
"example_url": "http://www.hulu.com/watch/20807/late-night-with-conan", 
"endpoint_url": "http://www.hulu.com/api/oembed.json", 
"title": "Hulu"
}, 
{
"url": "http://*.nfb.ca/film/*", 
"url_re": "nfb\\.ca/film/[-\\w]+/?", 
"example_url": "http://www.nfb.ca/film/blackfly/", 
"endpoint_url": "http://www.nfb.ca/remote/services/oembed/", 
"title": "National Film Board of Canada"
}, 
{
"url": "http://qik.com/*", 
"url_re": "qik\\.com/\\w+", 
"example_url": "http://qik.com/video/86776", 
"endpoint_url": "http://qik.com/api/oembed.json", 
"title": "Qik Video"
}, 
{
"url": "http://*.revision3.com/*", 
"url_re": "revision3\\.com/.+", 
"example_url": "http://revision3.com/diggnation/2008-04-17xsanned/", 
"endpoint_url": "http://revision3.com/api/oembed/", 
"title": "Revision3"
}, 
{
"url": "http://*.scribd.com/*", 
"url_re": "scribd\\.com/.+", 
"example_url": "http://www.scribd.com/doc/17896323/Indian-Automobile-industryPEST", 
"endpoint_url": "http://www.scribd.com/services/oembed", 
"title": "Scribd"
}, 
{
"url": "http://*.viddler.com/explore/*", 
"url_re": "viddler\\.com/explore/.*/videos/\\w+/?", 
"example_url": "http://www.viddler.com/explore/engadget/videos/14/", 
"endpoint_url": "http://lab.viddler.com/services/oembed/", 
"title": "Viddler Video"
}, 
{
"url": "http://www.vimeo.com/* and http://www.vimeo.com/groups/*/videos/*", 
"url_re": "vimeo\\.com/.*", 
"example_url": "http://www.vimeo.com/1211060", 
"endpoint_url": "http://www.vimeo.com/api/oembed.json", 
"title": "Vimeo"
}, 
{
"url": "http://*.youtube.com/watch*", 
"url_re": "youtube\\.com/watch.+v=[\\w-]+&?", 
"example_url": "http://www.youtube.com/watch?v=vk1HvP7NO5w", 
"endpoint_url": "http://www.youtube.com/oembed", 
"title": "YouTube"
},
{
"url": "http://dotsub.com/view/*", 
"url_re": "dotsub\\.com/view/[-\\da-zA-Z]+$",
"example_url": "http://dotsub.com/view/10e3cb5e-96c7-4cfb-bcea-8ab11e04e090", 
"endpoint_url": "http://dotsub.com/services/oembed", 
"title": "dotSUB.com"
},
{
"url": "http://yfrog.(com|ru|com.tr|it|fr|co.il|co.uk|com.pl|pl|eu|us)/*", 
"url_re": "yfrog\\.(com|ru|com\\.tr|it|fr|co\\.il|co\\.uk|com\\.pl|pl|eu|us)/[a-zA-Z0-9]+$",
"example_url": "http://yfrog.com/0wgvcpj", 
"endpoint_url": "http://www.yfrog.com/api/oembed", 
"title": "YFrog"
},
{
"url": "http://*.clikthrough.com/theater/video/*", 
"url_re": "clikthrough\\.com/theater/video/\\d+$",
"example_url": "http://www.clikthrough.com/theater/video/55", 
"endpoint_url": "http://clikthrough.com/services/oembed", 
"title": "Clikthrough"
},
{
"url": "http://*.kinomap.com/*", 
"url_re": "kinomap\\.com/.+",
"example_url": "http://www.kinomap.com/kms-vzkpc7", 
"endpoint_url": "http://www.kinomap.com/oembed", 
"title": "Kinomap"
},
{
"url": "http://*.photobucket.com/albums/*|http://*.photobucket.com/groups/*", 
"url_re": "photobucket\\.com/(albums|groups)/.+$",
"example_url": "http://img.photobucket.com/albums/v211/JAV123/Michael%20Holland%20Candle%20Burning/_MG_5661.jpg", 
"endpoint_url": "http://photobucket.com/oembed", 
"title": "Photobucket"
}
]
*/
    }
}
?>