<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Tiny html_component plugin for Moodle.
 *
 * @package    tiny_html_components
 * @copyright  2023 Gerbault Cédric, Anthony Durif, Université Clermont Auvergne
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_html_components;

use context;
use editor_tiny\plugin;
use editor_tiny\plugin_with_buttons;
use editor_tiny\plugin_with_menuitems;
use editor_tiny\plugin_with_configuration;

/**
 * Tiny html_component plugin for Moodle.
 *
 * @package    tiny_html_components
 * @copyright  2023 Gerbault Cédric, Anthony Durif, Université Clermont Auvergne 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class plugininfo extends plugin implements
    plugin_with_buttons,
    plugin_with_menuitems,
    plugin_with_configuration {

    /**
     * Get a list of the buttons provided by this plugin.
     *
     * @return string[]
     */
    public static function get_available_buttons(): array {
        return [
            'tiny_html_components/html_componentstiny_html_components',
        ];
    }

    /**
     * Get a list of the menu items provided by this plugin.
     *
     * @return string[]
     */
    public static function get_available_menuitems(): array {
        return [
            'tiny_html_components/html_componentstiny_html_components',
        ];
    }

    /**
     * Get a list of the menu items provided by this plugin.
     *
     * @param context $context The context that the editor is used within.
     * @param array $options The options passed in when requesting the editor.
     * @param array $fpoptions The filepicker options passed in when requesting the editor.
     * @param ?\editor_tiny\editor $editor The editor instance in which the plugin is initialised.
     * @return array
     */
    public static function get_plugin_configuration_for_context(
        context $context,
        array $options,
        array $fpoptions,
        ?\editor_tiny\editor $editor = null
    ): array {
        return [
            'customcomponents' => self::getAvailableComponents(),
        ];
    }

    /**
     * Function to return all the available components as <option>.
     * We check here if the current user has own custom components to list or to use.
     * @return string
     * @throws coding_exception
     */
    public static function getAvailableComponents()
    {
        global $DB;
        global $USER;

        $customs = $DB->get_records('tiny_html_components_custom', ['userid' => $USER->id], 'name ASC');

        if ($customs) {
            $custom_components = [];
            foreach ($customs as $custom) {
                array_push($custom_components, [
                    'value' => 'custom',
                    'custom-component' => $custom->code,
                    'custom-component-content' => htmlspecialchars($custom->content),
                    'name' => $custom->name,
                ]);
            }
            return json_encode($custom_components);
        } else {
            return null;
        }
    }
}
