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
 * Privacy Subsystem implementation for the html_components plugin for TinyMCE.
 *
 * @package tiny_html_components
 * @author  2023 Cédric Gerbault, Anthony Durif
 * @copyright 2023 Cédric Gerbault, Anthony Durif, Université Clermont Auvergne
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_html_components\privacy;

use core_privacy\local\metadata\collection;

/**
 * Privacy Subsystem implementation for the html_components plugin for TinyMCE.
 *
 * @package tiny_html_components
 * @copyright 2023 Gerbault Cédric, Anthony Durif, Université Clermont Auvergne
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\provider {

    /**
     * Returns metadata about this system.
     *
     * @param collection $collection The initialised collection to add items to.
     * @return collection A listing of user data stored through this system.
     */
    public static function get_metadata(collection $collection): collection {
        // Here you will add more items into the collection.
        $collection->add_database_table(
            'tiny_html_components_custom',
            [
                'userid' => 'privacy:metadata:tiny_html_components_custom:userid',
                'content' => 'privacy:metadata:tiny_html_components_custom:content'
            ],
            'privacy:metadata:tiny_html_components_custom'
        );

        return $collection;
    }
}
