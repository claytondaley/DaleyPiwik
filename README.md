# piwik

[Piwik](http://www.piwik.org)-Integration for ZendFramework2

This module uses the PHP Tracker to track requests to your website without using any client-side JavaScript.  While this could serve many purposes, the original was to support a legacy application that did not permit easy injection of the client-side tracking code.

## Installation:

It should be possible to use DaleyPiwik through [composer](http://getcomposer.org) and Git submodules.

## Usage:

 1. Add the module to the ```modules```-list of your applications ```application.config.php```-File.
 2. Copy ```daleypiwik.local.php.dist``` to your application's ```config/autoload``-directory, remove the ```.dist``` extension, and edit it according to your piwik-settings.
 3. There is no third step!

The supported configuration options are found in `/config/daleypiwik.local.php.dist`

    'DaleyPiwik' => array(
        // Always omit a trailing slash!
        'server' => 'my.piwikserver.com',
        'site_id' => 0,
        'api_token' => "abcdefghijk123456789",
        'cookie_config' => array(
            'domain' => '*.mydomain.com',
            'path' => '/',
        )
        ...
    ),

## Configuration:

While it may be possible to passively track pageviews for a ZF2 application, you'll get better data if the Application's Controllers are designed to actively interact with DaleyPiwik.  The recommended extension strategy is to use a [Delegator](http://framework.zend.com/manual/current/en/modules/zend.service-manager.delegator-factories.html) to attach the tracker to your Controller.  DaleyPiwik ships with a Delegator and the default configuration file (`/config/daleypiwik.local.php.dist`) shows how to attach this to your controller (assuming your controller implements `DaleyPiwik\Contract\ServerSideAnalyticsUserInterface`).

    return array (
        ...
        'service_manager' => array(
            'delegators' => array(
                'MyApp\Controller\MyController' => array(
                    'DAM4\Delegator\InjectPiwikPhpTracker',
                ),
            ),
        ),
    );

## Feedback:

Feel free to provide feedback by opening [issues](https://github.com/claytondaley/daleypiwik/issues) or pull-requests

## License:

This module is licensed according to the [LICENSE](LICENSE.txt)-Document.

