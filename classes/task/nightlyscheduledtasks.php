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
 * A scheduled task for scripted database integrations.
 *
 * @package    local_nightlyscheduledtasks - template
 * @copyright  2016 ROelmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_nightlyscheduledtasks\task;
use stdClass;
use context_block;

defined('MOODLE_INTERNAL') || die;

/**
 * A scheduled task for scripted database integrations.
 *
 * @copyright  2016 ROelmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class nightlyscheduledtasks extends \core\task\scheduled_task {

    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('nightlyscheduledtasks', 'local_nightlyscheduledtasks');
    }

    /**
     * Run sync.
     */
    public function execute() {
        /* Reset User Preference for nav-drawer to closed.
         * ============================================= */
        global $DB;
        $sqlupnav = "UPDATE {user_preferences} SET `value` = 'false' WHERE `name` = 'drawer-open-nav' AND `value` = 'true'";
        $DB->execute($sqlupnav, array('value' => 'true'));
    }
}
