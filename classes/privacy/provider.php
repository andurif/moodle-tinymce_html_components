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
 * @author  2025 Cédric Gerbault, Anthony Durif
 * @copyright 2025 Cédric Gerbault, Anthony Durif, Université Clermont Auvergne
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_html_components\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\userlist;
use core_privacy\local\request\writer;
use stdClass;

/**
 * Privacy Subsystem implementation for the html_components plugin for TinyMCE.
 *
 * @package tiny_html_components
 * @copyright 2023 Gerbault Cédric, Anthony Durif, Université Clermont Auvergne
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements \core_privacy\local\metadata\provider,
    \core_privacy\local\request\plugin\provider,
    \core_privacy\local\request\core_userlist_provider {

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
                'name' => 'privacy:metadata:tiny_html_components_custom:name',
                'content' => 'privacy:metadata:tiny_html_components_custom:content'
            ],
            'privacy:metadata:tiny_html_components_custom'
        );

        return $collection;
    }

    /**
     * Get the list of contexts that contain user information for the specified user.
     *
     * @param int $userid The user to search.
     * @return contextlist $contextlist The contextlist containing the list of contexts used in this plugin.
     */
    public static function get_contexts_for_userid(int $userid): \core_privacy\local\request\contextlist {
        $contextlist = new \core_privacy\local\request\contextlist();

        // Data may be saved in the system context.
        $sql = "SELECT c.id FROM {context} c WHERE contextlevel = :context ";
        $contextlist->add_from_sql($sql, ['context' => CONTEXT_SYSTEM]);

        return $contextlist;
    }

    /**
     * Get the list of users within a specific context.
     *
     * @param userlist $userlist The userlist containing the list of users who have data in this context/plugin combination.
     */
    public static function get_users_in_context(userlist $userlist) {
        $sql = "SELECT userid FROM {tiny_html_components_custom}";

        $userlist->add_from_sql('userid', $sql);
    }

    /**
     * Export all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts to export information for.
     */
    public static function export_user_data(approved_contextlist $contextlist) {
        global $DB;
        $user = $contextlist->get_user();

        $sql = "SELECT *
                  FROM {tiny_html_components_custom}
                 WHERE userid = :userid";

        $components = $DB->get_recordset_sql($sql, ['userid' => $user->id]);
        self::export_components($user, $components);
    }

    /**
     * Export all custom html_components records in the recordset, and close the recordset when finished.
     *
     * @param stdClass $user The user whose data is to be exported
     * @param \moodle_recordset $components The recordset containing the data to export
     */
    protected static function export_components(stdClass $user, \moodle_recordset $components) {
        foreach ($components as $component) {
            $context = \context_system::instance();
            $subcontext = [
                get_string('pluginname', 'tiny_html_components'),
                $context->id,
            ];
            $data = (object) [
                'name' => $component->name,
                'content' => $component->content,
            ];

            writer::with_context($context)
                ->export_data($subcontext, $data);
        }
        $components->close();
    }

    /**
     * Delete all data for all users in the specified context.
     *
     * @param \context $context The specific context to delete data for.
     */
    public static function delete_data_for_all_users_in_context(\context $context) {
        global $DB;
        if ($context->contextlevel != CONTEXT_SYSTEM) {
            return;
        }

        $DB->delete_records('tiny_html_components_custom');
    }

    /**
     * Delete multiple users within a single context.
     *
     * @param approved_userlist $userlist The approved context and user information to delete information for.
     */
    public static function delete_data_for_users(approved_userlist $userlist) {
        global $DB;
        [$useridsql, $useridsqlparams] = $DB->get_in_or_equal($userlist->get_userids(), SQL_PARAMS_NAMED);

        $DB->delete('tiny_html_components_custom', "userid {$useridsql}");
    }

    /**
     * Delete all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts and user information to delete information for.
     */
    public static function delete_data_for_user(approved_contextlist $contextlist) {
        global $DB;
        $user = $contextlist->get_user();
        $DB->delete_records('tiny_html_components_custom',  ["userid" => $user->id]);
    }
}
