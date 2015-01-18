# piwik

[Piwik](http://www.piwik.org)-Integration for ZendFramework2

This module uses the PHP Tracker to track requests to your website without using any client-side JavaScript.  While this could serve many purposes, the original was to support a legacy application that did not permit easy injection of the client-side tracking code.

## Installation:

It should be possible to use DaleyPiwik through [composer](http://getcomposer.org) and Git submodules.

## Usage:

 1. Add the module to the ```modules```-list of your applications ```application.config.php```-File.
 2. Copy this modules ```module.config.php```-File to your applications ```config/autoload``-directory and edit it according to your piwik-settings.
 3. There is no third step!
 
## Configuration:

Robust, server-side tracking must be supported by the Module serving the pages so the connection is established in that module's `module.config.php`

    'controllers' => array(
        ...
        'initializers' => array (
            function ($instance, $sm) {
                if ($instance instanceof \LegacyRS\Controller\LegacyRSController) {
                    $instance->addServerSideAnalytics($sm->getServiceLocator()->get('DaleyPiwik\Service\PhpTracker'));
                }
            },
        )
        ...
    ),

A sample configuration profile is found in `/config/daleypiwik.local.php.dist`

    return array(
        'orgHeiglPiwik' => array(
    
            // Always omit a trailing slash!
            'server' => 'example.org',
            'site_id' => 1,
        ), 
    );
    
## Feedback:

Feel free to provide feedback by opening [issues](https://github.com/claytondaley/daleypiwik/issues) or pull-requests

## License:

This module is licensed according to the [LICENSE](LICENSE)-Document.

