<?php
/**
 * mapitApi2entry plugin for Craft CMS 3.x
 *
 * Call mapit api to store results with entry for later mapping
 *
 * @link      https://www.joomkit.co.uk
 * @copyright Copyright (c) 2021 Alan Sparkes
 */

namespace joomkit\mapitapi2entry\utilities;

use joomkit\mapitapi2entry\MapitApi2entry;
use joomkit\mapitapi2entry\assetbundles\mapitapi2entryutilityutility\MapitApi2entryUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * mapitApi2entry Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Alan Sparkes
 * @package   MapitApi2entry
 * @since     1.0.0
 */
class MapitApi2entryUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('mapit-api2entry', 'MapitApi2entryUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'mapitapi2entry-mapit-api2entry-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@joomkit/mapitapi2entry/assetbundles/mapitapi2entryutilityutility/dist/img/MapitApi2entryUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(MapitApi2entryUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'mapit-api2entry/_components/utilities/MapitApi2entryUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
