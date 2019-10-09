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
 * Javascript controller for Requeueing submissions.
 *
 * @package   plagiarism_turnitincheck
 * @copyright 2018 David Winn <dwinn@turnitin.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module plagiarism_turnitincheck/resendSubmission
 */

define(['jquery'], function($) {
    return {
        resendSubmission: function() {
            $(document).on('click', '.pp_resubmit_link', function() {
                $(this).hide();
                $(this).siblings('.pp_resubmitting').removeClass('hidden');
                var that = $(this);

                // Moodle forums strip ids from elements so we have to use classes.
                var classList = $(this).attr('class').split(/\s+/);
                var submissionid = 0;
                $(classList).each(function(index){
                    if (classList[index].match("^pp_resubmit_id_")) {
                        submissionid = classList[index].split("_")[3];
                    }
                });

                $.ajax({
                    type: "POST",
                    url: M.cfg.wwwroot + "/plagiarism/turnitincheck/ajax/resend_submission.php",
                    dataType: "text",
                    data: {action: "resubmit_event", submissionid: submissionid, sesskey: M.cfg.sesskey},
                    success: function() {
                        that.siblings('.turnitincheck_status').removeClass('hidden');
                        that.siblings('.tii_status_text').html(M.str.plagiarism_turnitincheck.submissiondisplaystatusqueued);
                        that.siblings('.pp_resubmitting').addClass('hidden');
                    },
                    error: function() {
                        that.show();
                        that.siblings('.pp_resubmitting').addClass('hidden');
                    }
                });
            });
        }
    };
});