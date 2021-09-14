<?php
/**
 * mapitApi2entry plugin for Craft CMS 3.x
 *
 * Call mapit api to store results with entry for later mapping
 *
 * @link      https://www.joomkit.co.uk
 * @copyright Copyright (c) 2021 Alan Sparkes
 */

namespace joomkit\mapitapi2entry\services;

use joomkit\mapitapi2entry\MapitApi2entry;

use Craft;
use craft\base\Component;

/**
 * MapitApi2entryService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Alan Sparkes
 * @package   MapitApi2entry
 * @since     1.0.0
 */
class MapitApi2entryService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     MapitApi2entry::$plugin->mapitApi2entryService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (MapitApi2entry::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
