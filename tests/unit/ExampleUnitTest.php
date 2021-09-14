<?php
/**
 * mapitApi2entry plugin for Craft CMS 3.x
 *
 * Call mapit api to store results with entry for later mapping
 *
 * @link      https://www.joomkit.co.uk
 * @copyright Copyright (c) 2021 Alan Sparkes
 */

namespace joomkit\mapitapi2entrytests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use joomkit\mapitapi2entry\MapitApi2entry;

/**
 * ExampleUnitTest
 *
 *
 * @author    Alan Sparkes
 * @package   MapitApi2entry
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            MapitApi2entry::class,
            MapitApi2entry::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
