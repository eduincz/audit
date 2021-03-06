<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.1                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2011                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2011
 * $Id$
 *
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Core_DAO_ActionSchedule extends CRM_Core_DAO
{
    /**
     * static instance to hold the table name
     *
     * @var string
     * @static
     */
    static $_tableName = 'civicrm_action_schedule';
    /**
     * static instance to hold the field values
     *
     * @var array
     * @static
     */
    static $_fields = null;
    /**
     * static instance to hold the FK relationships
     *
     * @var string
     * @static
     */
    static $_links = null;
    /**
     * static instance to hold the values that can
     * be imported / apu
     *
     * @var array
     * @static
     */
    static $_import = null;
    /**
     * static instance to hold the values that can
     * be exported / apu
     *
     * @var array
     * @static
     */
    static $_export = null;
    /**
     * static value to see if we should log any modifications to
     * this table in the civicrm_log table
     *
     * @var boolean
     * @static
     */
    static $_log = false;
    /**
     *
     * @var int unsigned
     */
    public $id;
    /**
     * Name of the action(reminder)
     *
     * @var string
     */
    public $name;
    /**
     * Title of the action(reminder)
     *
     * @var string
     */
    public $title;
    /**
     * Recipient
     *
     * @var string
     */
    public $recipient;
    /**
     * Entity value
     *
     * @var string
     */
    public $entity_value;
    /**
     * Entity status
     *
     * @var string
     */
    public $entity_status;
    /**
     * Reminder Interval.
     *
     * @var int unsigned
     */
    public $start_action_offset;
    /**
     * Time units for reminder.
     *
     * @var enum('hour', 'day', 'week', 'month', 'year')
     */
    public $start_action_unit;
    /**
     * Reminder Action
     *
     * @var string
     */
    public $start_action_condition;
    /**
     * Entity date
     *
     * @var string
     */
    public $start_action_date;
    /**
     *
     * @var boolean
     */
    public $is_repeat;
    /**
     * Time units for repetition of reminder.
     *
     * @var enum('hour', 'day', 'week', 'month', 'year')
     */
    public $repetition_frequency_unit;
    /**
     * Time interval for repeating the reminder.
     *
     * @var int unsigned
     */
    public $repetition_frequency_interval;
    /**
     * Time units till repetition of reminder.
     *
     * @var enum('hour', 'day', 'week', 'month', 'year')
     */
    public $end_frequency_unit;
    /**
     * Time interval till repeating the reminder.
     *
     * @var int unsigned
     */
    public $end_frequency_interval;
    /**
     * Reminder Action till repeating the reminder.
     *
     * @var string
     */
    public $end_action;
    /**
     * Entity end date
     *
     * @var string
     */
    public $end_date;
    /**
     * Is this option active?
     *
     * @var boolean
     */
    public $is_active;
    /**
     * Contact IDs to which reminder should be sent.
     *
     * @var string
     */
    public $recipient_manual;
    /**
     * listing based on recipient field.
     *
     * @var string
     */
    public $recipient_listing;
    /**
     * Body of the mailing in text format.
     *
     * @var longtext
     */
    public $body_text;
    /**
     * Body of the mailing in html format.
     *
     * @var longtext
     */
    public $body_html;
    /**
     * Subject of mailing
     *
     * @var string
     */
    public $subject;
    /**
     * Record Activity for this reminder?
     *
     * @var boolean
     */
    public $record_activity;
    /**
     * FK to mapping which is being used by this reminder
     *
     * @var int unsigned
     */
    public $mapping_id;
    /**
     * FK to Group
     *
     * @var int unsigned
     */
    public $group_id;
    /**
     * FK to the message template.
     *
     * @var int unsigned
     */
    public $msg_template_id;
    /**
     * Date on which the reminder be sent.
     *
     * @var date
     */
    public $absolute_date;
    /**
     * class constructor
     *
     * @access public
     * @return civicrm_action_schedule
     */
    function __construct()
    {
        parent::__construct();
    }
    /**
     * return foreign links
     *
     * @access public
     * @return array
     */
    function &links()
    {
        if (!(self::$_links)) {
            self::$_links = array(
                'mapping_id' => 'civicrm_action_mapping:id',
                'group_id' => 'civicrm_group:id',
                'msg_template_id' => 'civicrm_msg_template:id',
            );
        }
        return self::$_links;
    }
    /**
     * returns all the column names of this table
     *
     * @access public
     * @return array
     */
    function &fields()
    {
        if (!(self::$_fields)) {
            self::$_fields = array(
                'id' => array(
                    'name' => 'id',
                    'type' => CRM_Utils_Type::T_INT,
                    'required' => true,
                ) ,
                'name' => array(
                    'name' => 'name',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Name') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'title' => array(
                    'name' => 'title',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Title') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'recipient' => array(
                    'name' => 'recipient',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Recipient') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'entity_value' => array(
                    'name' => 'entity_value',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Value') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'entity_status' => array(
                    'name' => 'entity_status',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Status') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'start_action_offset' => array(
                    'name' => 'start_action_offset',
                    'type' => CRM_Utils_Type::T_INT,
                    'title' => ts('Start Action Offset') ,
                ) ,
                'start_action_unit' => array(
                    'name' => 'start_action_unit',
                    'type' => CRM_Utils_Type::T_ENUM,
                    'title' => ts('Start Action Unit') ,
                    'enumValues' => 'hour,day,week,month,year',
                ) ,
                'start_action_condition' => array(
                    'name' => 'start_action_condition',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Start Action Condition') ,
                    'maxlength' => 32,
                    'size' => CRM_Utils_Type::MEDIUM,
                ) ,
                'start_action_date' => array(
                    'name' => 'start_action_date',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Start Action Date') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'is_repeat' => array(
                    'name' => 'is_repeat',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                    'title' => ts('Repeat?') ,
                ) ,
                'repetition_frequency_unit' => array(
                    'name' => 'repetition_frequency_unit',
                    'type' => CRM_Utils_Type::T_ENUM,
                    'title' => ts('Repetition Frequency Unit') ,
                    'enumValues' => 'hour,day,week,month,year',
                ) ,
                'repetition_frequency_interval' => array(
                    'name' => 'repetition_frequency_interval',
                    'type' => CRM_Utils_Type::T_INT,
                    'title' => ts('Repetition Frequency Interval') ,
                ) ,
                'end_frequency_unit' => array(
                    'name' => 'end_frequency_unit',
                    'type' => CRM_Utils_Type::T_ENUM,
                    'title' => ts('End Frequency Unit') ,
                    'enumValues' => 'hour,day,week,month,year',
                ) ,
                'end_frequency_interval' => array(
                    'name' => 'end_frequency_interval',
                    'type' => CRM_Utils_Type::T_INT,
                    'title' => ts('End Frequency Interval') ,
                ) ,
                'end_action' => array(
                    'name' => 'end_action',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('End Action') ,
                    'maxlength' => 32,
                    'size' => CRM_Utils_Type::MEDIUM,
                ) ,
                'end_date' => array(
                    'name' => 'end_date',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('End Date') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'is_active' => array(
                    'name' => 'is_active',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                    'default' => '',
                ) ,
                'recipient_manual' => array(
                    'name' => 'recipient_manual',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Recipient Manual') ,
                    'maxlength' => 128,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'recipient_listing' => array(
                    'name' => 'recipient_listing',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Recipient Listing') ,
                    'maxlength' => 128,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'body_text' => array(
                    'name' => 'body_text',
                    'type' => CRM_Utils_Type::T_LONGTEXT,
                    'title' => ts('Body Text') ,
                ) ,
                'body_html' => array(
                    'name' => 'body_html',
                    'type' => CRM_Utils_Type::T_LONGTEXT,
                    'title' => ts('Body Html') ,
                ) ,
                'subject' => array(
                    'name' => 'subject',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Subject') ,
                    'maxlength' => 128,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'record_activity' => array(
                    'name' => 'record_activity',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                    'title' => ts('Record Activity') ,
                    'default' => 'UL',
                ) ,
                'mapping_id' => array(
                    'name' => 'mapping_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Core_DAO_ActionMapping',
                ) ,
                'group_id' => array(
                    'name' => 'group_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Contact_DAO_Group',
                ) ,
                'msg_template_id' => array(
                    'name' => 'msg_template_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Core_DAO_MessageTemplates',
                ) ,
                'absolute_date' => array(
                    'name' => 'absolute_date',
                    'type' => CRM_Utils_Type::T_DATE,
                    'title' => ts('Absolute Date') ,
                ) ,
            );
        }
        return self::$_fields;
    }
    /**
     * returns the names of this table
     *
     * @access public
     * @return string
     */
    function getTableName()
    {
        return self::$_tableName;
    }
    /**
     * returns if this table needs to be logged
     *
     * @access public
     * @return boolean
     */
    function getLog()
    {
        return self::$_log;
    }
    /**
     * returns the list of fields that can be imported
     *
     * @access public
     * return array
     */
    function &import($prefix = false)
    {
        if (!(self::$_import)) {
            self::$_import = array();
            $fields = self::fields();
            foreach($fields as $name => $field) {
                if (CRM_Utils_Array::value('import', $field)) {
                    if ($prefix) {
                        self::$_import['action_schedule'] = & $fields[$name];
                    } else {
                        self::$_import[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_import;
    }
    /**
     * returns the list of fields that can be exported
     *
     * @access public
     * return array
     */
    function &export($prefix = false)
    {
        if (!(self::$_export)) {
            self::$_export = array();
            $fields = self::fields();
            foreach($fields as $name => $field) {
                if (CRM_Utils_Array::value('export', $field)) {
                    if ($prefix) {
                        self::$_export['action_schedule'] = & $fields[$name];
                    } else {
                        self::$_export[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_export;
    }
    /**
     * returns an array containing the enum fields of the civicrm_action_schedule table
     *
     * @return array (reference)  the array of enum fields
     */
    static function &getEnums()
    {
        static $enums = array(
            'start_action_unit',
            'repetition_frequency_unit',
            'end_frequency_unit',
        );
        return $enums;
    }
    /**
     * returns a ts()-translated enum value for display purposes
     *
     * @param string $field  the enum field in question
     * @param string $value  the enum value up for translation
     *
     * @return string  the display value of the enum
     */
    static function tsEnum($field, $value)
    {
        static $translations = null;
        if (!$translations) {
            $translations = array(
                'start_action_unit' => array(
                    'hour' => ts('hour') ,
                    'day' => ts('day') ,
                    'week' => ts('week') ,
                    'month' => ts('month') ,
                    'year' => ts('year') ,
                ) ,
                'repetition_frequency_unit' => array(
                    'hour' => ts('hour') ,
                    'day' => ts('day') ,
                    'week' => ts('week') ,
                    'month' => ts('month') ,
                    'year' => ts('year') ,
                ) ,
                'end_frequency_unit' => array(
                    'hour' => ts('hour') ,
                    'day' => ts('day') ,
                    'week' => ts('week') ,
                    'month' => ts('month') ,
                    'year' => ts('year') ,
                ) ,
            );
        }
        return $translations[$field][$value];
    }
    /**
     * adds $value['foo_display'] for each $value['foo'] enum from civicrm_action_schedule
     *
     * @param array $values (reference)  the array up for enhancing
     * @return void
     */
    static function addDisplayEnums(&$values)
    {
        $enumFields = & CRM_Core_DAO_ActionSchedule::getEnums();
        foreach($enumFields as $enum) {
            if (isset($values[$enum])) {
                $values[$enum . '_display'] = CRM_Core_DAO_ActionSchedule::tsEnum($enum, $values[$enum]);
            }
        }
    }
}
