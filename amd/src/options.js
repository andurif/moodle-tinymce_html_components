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
 * Tiny html_component Option Helper.
 * @module      tiny_html_components/options
 * @copyright   2023 Gerbault Cédric, Anthony Durif, Université Clermont Auvergne
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {getPluginOptionName} from 'editor_tiny/options';
import {pluginName} from './common';

const customcomponents= getPluginOptionName(pluginName, 'customcomponents');

/**
 * Register the options for the Tiny html_components plugin.
 *
 * @param {TinyMCE} editor
 */
export const register = (editor) => {
    const registerOption = editor.options.register;

    registerOption(customcomponents, {
        processor: 'string',
    });
};

/**
 * Get the permissions configuration for the Tiny H5P plugin.
 *
 * @param {TinyMCE} editor
 * @returns {object}
 */
export const getCustomComponents = (editor) => editor.options.get(customcomponents);


