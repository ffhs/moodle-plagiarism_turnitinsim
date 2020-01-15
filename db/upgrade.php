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
 * Database upgrade script for plagiarism_turnitinsim component
 *
 * @package   plagiarism_turnitinsim
 * @copyright 2017 John McGettrick <jmcgettrick@turnitin.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * @global moodle_database $DB
 * @param int $oldversion
 * @return bool
 */
function xmldb_plagiarism_turnitinsim_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2018021501) {
        $table = new xmldb_table('plagiarism_turnitinsim_sub');
        $field = new xmldb_field('requested_time', XMLDB_TYPE_INTEGER, '10', null, false, null, null, 'submitted_time');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018021501, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018021601) {
        $table = new xmldb_table('plagiarism_turnitinsim_sub');
        $field = new xmldb_field('errormessage', XMLDB_TYPE_CHAR, '255', null, false, null, null, 'requested_time');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018021601, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018030601) {
        $table = new xmldb_table('plagiarism_turnitinsim_sub');
        $field = new xmldb_field('type', XMLDB_TYPE_CHAR, '20', null, false, null, null, 'itemid');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018030601, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018031801) {
        $table = new xmldb_table('plagiarism_turnitinsim_mod');

        $field = new xmldb_field('queuedrafts', XMLDB_TYPE_INTEGER, '1', null, false, null, 0, 'checkprivate');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018031801, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018032001) {
        $table = new xmldb_table('plagiarism_turnitinsim_mod');

        $field = new xmldb_field('reportgeneration', XMLDB_TYPE_INTEGER, '1', null, false, null, 0, 'turnitinenabled');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018032001, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018032003) {
        $table = new xmldb_table('plagiarism_turnitinsim_sub');

        $field = new xmldb_field('to_generate', XMLDB_TYPE_INTEGER, '1', null, false, null, 0, 'submitted_time');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('generation_time', XMLDB_TYPE_INTEGER, '10', null, false, null, null, 'to_generate');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018032003, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018050401) {
        $table = new xmldb_table('plagiarism_turnitinsim_users');

        $field = new xmldb_field('lasteulaaccepted', XMLDB_TYPE_CHAR, '100', null, false, null, null, 'turnitinid');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('lasteulaacceptedtime', XMLDB_TYPE_INTEGER, '10', null, false, null, null, 'lasteulaaccepted');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018050401, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018051001) {
        $table = new xmldb_table('plagiarism_turnitinsim_mod');

        $field = new xmldb_field('addtoindex', XMLDB_TYPE_INTEGER, '1', null, false, null, 0, 'reportgeneration');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('accessstudents', XMLDB_TYPE_INTEGER, '1', null, false, null, 0, 'addtoindex');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018051001, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018051501) {
        $table = new xmldb_table('plagiarism_turnitinsim_users');
        $field = new xmldb_field('lasteulaacceptedlang', XMLDB_TYPE_CHAR, '10', null, false, null, null, 'lasteulaacceptedtime');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018051501, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018062601) {
        $table = new xmldb_table('plagiarism_turnitinsim_sub');
        $field = new xmldb_field('submitter', XMLDB_TYPE_INTEGER, '10', null, false, null, 0, 'userid');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint(true, 2018062601, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2018080301) {
        // Add groupid column to submission.
        $table = new xmldb_table('plagiarism_turnitinsim_sub');
        $field = new xmldb_field('groupid', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'submitter');

        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Add group table.
        $table = new xmldb_table('plagiarism_turnitinsim_group');

        // Adding fields.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('groupid', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('turnitinid', XMLDB_TYPE_CHAR, '255', null, null, null, null);

        // Adding keys to table assign_overrides.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Create table.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }
        upgrade_plugin_savepoint(true, 2018080301, 'plagiarism', 'turnitinsim');
    }

    if ($oldversion < 2019121601) {
        // Get the current features enabled.
        // If require_eula does not exist then set it to true, it will be overwritten
        // if necessary when the scheduled tasks run.
        $features = json_decode(get_config('plagiarism_turnitinsim', 'turnitin_features_enabled'));
        if (!isset($features->tenant)) {
            $features->tenant->require_eula = true;
            set_config('turnitin_features_enabled', json_encode($features), 'plagiarism_turnitinsim');
        }

        upgrade_plugin_savepoint(true, 2019112701, 'plagiarism', 'turnitinsim');
    }

    // This block will migrate the config namespace for the plugin to plagiarism_turnitinsim.
    if ($oldversion < 2020011001) {
        $data = get_config('plagiarism');

        $properties = array('turnitinmodenabledassign', 'turnitinmodenabledforum', 'turnitinmodenabledworkshop',
            'turnitinapikey', 'turnitinapiurl', 'turnitinenablelogging', 'turnitin_eula_url', 'turnitin_eula_version',
            'turnitin_features_enabled', 'turnitinhideidentity', 'turnitinviewermatchsubinfo', 'turnitinviewersavechanges',
            'turnitinviewerviewfullsource', 'turnitin_webhook_id', 'turnitin_webhook_secret');
        foreach ($properties as $property) {
            if (isset($data->$property)) {
                set_config($property, $data->$property, 'plagiarism_turnitinsim');
                unset_config($property, 'plagiarism');
            }
        }

        upgrade_plugin_savepoint(true, 2020011001, 'plagiarism', 'turnitinsim');
    }

    return true;
}