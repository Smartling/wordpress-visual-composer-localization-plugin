<?php

/**
 * @link              https://www.smartling.com
 * @since             1.0.0
 * @package           smartling-visual-composer
 * @wordpress-plugin
 * Plugin Name:       Smartling Visual Composer Extension
 * Plugin URI:        https://www.smartling.com/translation-software/wordpress-translation-plugin/
 * Description:       Integrate your Wordpress site with Smartling to upload your content and download translations.
 * Version:           1.0.0
 * Author:            Smartling
 * Author URI:        https://www.smartling.com
 * License:           GPL-2.0+
 * Network:           true
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

add_action('plugins_loaded', function () {
    add_action('smartling_before_init', function (\Symfony\Component\DependencyInjection\ContainerBuilder $di) {
        // Require files.
        require_once __DIR__ . '/extension/ShortcodeInjector.php';
        require_once __DIR__ . '/SmartlingVisualComposerTagProcessor.php';
        
        // Register shortcodes.
        SmartlingVisualComposer\SmartlingVisualComposerTagProcessor::registerShortcodes();
        
        // Register filters.
        SmartlingVisualComposer\SmartlingVisualComposerTagProcessor::registerFilters();
    });
});


