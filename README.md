# piwik

[Piwik](http://www.piwik.org)-Integration for ZendFramework2

This module uses the PHP Tracker to track requests to your website without using any client-side JavaScript.  While this could serve many purposes, the original was to support a legacy application that did not permit easy injection of the client-side tracking code.

## Installation:

It should be possible to use DaleyPiwik through [composer](http://getcomposer.org) and Git submodules.

## Usage:

 1. Add the module to the ```modules```-list of your applications ```application.config.php```-File.
 2. Copy ```daleypiwik.local.php.dist``` to your application's ```config/autoload``-directory, remove the ```.dist``` extension, and edit it according to your piwik-settings.
 3. There is no third step!
 
## Configuration:

While it may be possible to passively track pageviews for a ZF2 application that is not configured to support this tracker, the performance will be best with an application designed to actively interact with DaleyPiwik.  The recommended extension strategy is to use a [Delegator](http://framework.zend.com/manual/current/en/modules/zend.service-manager.delegator-factories.html) to attach the tracker to your Controller.

A sample configuration profile is found in `/config/daleypiwik.local.php.dist`

    'DaleyPiwik' => array(
        // Always omit a trailing slash!
        'server' => 'my.piwikserver.com',
        'site_id' => 0,
        'api_token' => "abcdefghijk123456789",
        'cookie_config' => array(
            'domain' => '*.mydomain.com',
            'path' => '/',
        )
        /**
         * Fill with rest of Piwik Tracking Code Settings
         */
    ),
    
## Feedback:

Feel free to provide feedback by opening [issues](https://github.com/claytondaley/daleypiwik/issues) or pull-requests

## License:

This module is licensed according to the [LICENSE](LICENSE.txt)-Document.

