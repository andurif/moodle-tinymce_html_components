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
 * Page to list custom components of tinymce html_components plugin.
 *
 * @package tiny_html_components
 * @author  2021 Cédric Gerbault, Anthony Durif
 * @copyright 2025 Cédric Gerbault, Anthony Durif, Université Clermont Auvergne
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core_competency\api;
use core_competency\external\performance_helper;

require(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/config.php');

require_login();

$deleteid = optional_param('deleteid', 0, PARAM_ALPHANUM);

$context = context_user::instance($USER->id);
$PAGE->set_context($context);

$PAGE->set_pagelayout('standard');
$PAGE->set_url('/lib/editor/tiny/plugins/html_components/custom_components.php');
$PAGE->set_title(fullname($USER));
$PAGE->set_heading($PAGE->title);
$PAGE->navbar->add(get_string('profile', 'moodle'), new moodle_url('/user/profile.php', ['id' => $USER->id]));
$PAGE->navbar->add('Composants Tiny customs', new moodle_url('lib/editor/tiny/plugins/html_components/custom_components.php'));

echo $OUTPUT->header();

echo html_writer::tag('h2', get_string('custom_components_link', 'tiny_html_components'));

if ($deleteid) {
    try {
        $DB->delete_records('tiny_html_components_custom', ['id' => $deleteid]);
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

$customs = $DB->get_records('tiny_html_components_custom', ['userid' => $USER->id], 'name ASC');
echo html_writer::link(new moodle_url('/lib/editor/tiny/plugins/html_components/edit_custom_component.php'),
        get_string('custom_components_create', 'tiny_html_components'), ['class' => 'btn btn-outline-info pull-right']);

if ($customs) {
    echo html_writer::start_tag('fieldset', ['style' => 'margin-top: 50px;']);
    echo html_writer::start_tag('table', ['class' => 'table table-condensed']);
    foreach ($customs as $custom) {
        echo html_writer::start_tag('tr');
        echo html_writer::tag('td', $custom->name, ['width' => '60%']);
        echo html_writer::start_tag('td');
        echo html_writer::link(new moodle_url('/lib/editor/tiny/plugins/html_components/edit_custom_component.php',
            ['id' => $custom->id]), get_string('custom_components_edit', 'tiny_html_components'), ['class' => 'btn btn-outline-secondary']);
        echo html_writer::end_tag('td');
        echo html_writer::start_tag('td');
        echo html_writer::link(new moodle_url('/lib/editor/tiny/plugins/html_components/custom_components.php',
            ['deleteid' => $custom->id]), get_string('custom_components_delete', 'tiny_html_components'), ['class' => 'btn btn-outline-secondary']);
        echo html_writer::end_tag('td');
        echo html_writer::end_tag('tr');
    }
    echo html_writer::end_tag('table');
    echo html_writer::end_tag('fieldset');

    echo "</table></fieldset>";
}

echo $OUTPUT->footer();
