<?php
/**
 * mapitApi2entry plugin for Craft CMS 3.x
 *
 * Call mapit api to store results with entry for later mapping
 *
 * @link      https://www.joomkit.co.uk
 * @copyright Copyright (c) 2021 Alan Sparkes
 */

namespace joomkit\mapitapi2entry\console\controllers;

use joomkit\mapitapi2entry\MapitApi2entry;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Fetch Command
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin-name/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft mapit-api2entry/fetch
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft mapit-api2entry/fetch/do-something
 *
 * @author    Alan Sparkes
 * @package   MapitApi2entry
 * @since     1.0.0
 */
class FetchController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle mapit-api2entry/fetch console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console FetchController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle mapit-api2entry/fetch/do-something console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the console FetchController actionDoSomething() method\n";

        return $result;
    }
}
