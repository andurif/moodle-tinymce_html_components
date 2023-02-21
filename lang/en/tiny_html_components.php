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
 *
 * @package    tinymce_html_components
 * @author  2020 Anthony Durif
 * @copyright 2020 Anthony Durif, Université Clermont Auvergne
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'TinyMCE html Components Plugin';
$string['pluginname_help'] = 'Plugin to insert some html components (bootstrap for example) through TinyMCE editor.';
$string['html_components:desc'] = 'Insert some html components';
$string['title'] = 'Insert html components';

$string['choice_legend'] = 'Component choice';
$string['component'] = 'Component :';
$string['component_placeholder'] = 'Choose the component...';
$string['basic_components'] = 'Basic components';
$string['custom_components'] = 'Own custom components';
$string['custom_components_title'] = 'Custom Html components';
$string['custom_components_link'] = 'Manage your custom components';
$string['custom_components_construct'] = 'Component construction';
$string['custom_components_create'] = 'Create a new custom component';
$string['custom_components_edit'] = 'Edit the component';
$string['custom_components_delete'] = 'Delete the component';
$string['custom_components_name'] = 'Component name';
$string['custom_components_name_help'] = 'Name you want to give to the component. This name will be displayed in the components\' list available in the editor plugin.';
$string['custom_components_content'] = 'Component content (html)';
$string['custom_components_content_help'] = 'Content in html of the component you will construct throw the editor. That\'s will be inserted after the component selection.';
$string['custom_components_back'] = 'Return to your custom components list';
$string['custom_components_preview_msg'] = '<div class="alert alert-info">Preview available after validation !</div>';
$string['alert'] = 'Alert';
$string['alert_type'] = 'Alert type :';
$string['alert_info'] = 'Information (blue)';
$string['alert_warning'] = 'Warning (yellow)';
$string['alert_success'] = 'Success (green)';
$string['alert_danger'] = 'Error/danger (red)';
$string['alert_primary'] = 'Principal information (blue html)';
$string['alert_secondary'] = 'Secondary information (gray)';
$string['alert_dark'] = 'Dark (black)';
$string['alert_close'] = 'Possibility to close the alert :';
$string['card'] = 'Card';
$string['card_nb'] = 'Number of cards :';
$string['card_display'] = 'Card display :';
$string['card_display_horizontal'] = 'Side by side';
$string['card_display_vertical'] = 'In column';
$string['card_background'] = 'Background type :';
$string['card_image'] = 'Image';
$string['card_classic'] = 'Classic (white)';
$string['card_orientation'] = 'Card orientation : ';
$string['card_orientation_portrait'] = 'Portrait';
$string['card_orientation_landscape'] = 'Landscape';
$string['card_disposition'] = 'Card width : ';
$string['card_disposition_line'] = ' by line';
$string['card_disposition_info'] = 'Note: This choice will be used by default but it could be adapted to add more readability in function of your screen (responsive design).';
$string['card_proportion'] = 'Image proportion :';
$string['jumbotron'] = 'Jumbrotron';
$string['accordion'] = 'Accordion';
$string['accordion_show'] = 'Let items collapsed';
$string['accordion_nb'] = 'Number of lines :';
$string['nav'] = 'Navigation menu';
$string['nav_nb'] = 'Number of links :';
$string['quote'] = 'Quote';
$string['button'] = 'Button';
$string['button_nb'] = 'Number of buttons :';
$string['button_type'] = 'Button type :';
$string['button_style'] = 'Button style :';
$string['button_style_full'] = 'Full';
$string['button_style_outline'] = 'Outline';
$string['button_size'] = 'Button size :';
$string['button_size_sm'] = 'Small';
$string['button_size_med'] = 'Medium';
$string['button_size_lg'] = 'Large';
$string['button_size_block'] = 'Block';
$string['button_tooltip'] = 'Add a tooltip :';
$string['button_tooltip_pos'] = 'Position :';
$string['button_tooltip_top'] = 'Top';
$string['button_tooltip_right'] = 'Right';
$string['button_tooltip_bottom'] = 'Bottom';
$string['button_tooltip_left'] = 'Left';
$string['button_dropdown'] = 'Dropdown list';
$string['button_dropdown_nb'] = 'Number of links :';
$string['icon'] = 'Icon';
$string['icon_name'] = 'Icon name : ';
$string['icon_desc'] = 'Fill in the icon name to insert. For example: "qr_code_scanner" or "check_circle".
                    <br/>Check <a href="https://fonts.google.com/icons?selected=Material+Icons" target="_blank" style="font-size: larger; color: #5FC6CC;">all compatible icons here</a>.';
$string['icon_size'] = 'Icon size : ';
$string['timeline'] = 'Timeline';
$string['timeline_nb'] = 'Timeline items : ';
$string['timeline_orientation'] = 'Orientation : ';
$string['timeline_horizontal'] = 'Horizontal';
$string['timeline_vertical'] = 'Vertical';
$string['timeline_position'] = 'Timeline position :';
$string['timeline_position_before'] = 'Before text items';
$string['timeline_position_after'] = 'After text items';
$string['preview_legend'] = 'Preview';
$string['preview_desc'] = 'Component preview let you visualize components which will be displayed in the page. This display can be a little different than the final render according to the theme, options, etc...';
$string['suggestion'] = 'If you see that a bootstrap component is not here or to propose a new component, please fill in the <a href="%s" target="_blank">suggestion form</a>.Your ask will be seen by the Moodle group.';
$string['insert'] = 'Insert';
$string['privacy:metadata:tiny_html_components_custom'] = 'Table to store individuals and customs component made by users';
$string['privacy:metadata:tiny_html_components_custom:userid'] = 'Id of the user who made the component';
$string['privacy:metadata:tiny_html_components_custom:content'] = 'The HTML code of the custom component';