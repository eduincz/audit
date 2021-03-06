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
class CRM_Core_DAO_Setting extends CRM_Core_DAO
{
    /**
     * static instance to hold the table name
     *
     * @var string
     * @static
     */
    static $_tableName = 'civicrm_setting';
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
     * group name for setting element, useful in caching setting elements
     *
     * @var string
     */
    public $group_name;
    /**
     * Unique name for setting
     *
     * @var string
     */
    public $name;
    /**
     * data associated with this group / name combo
     *
     * @var text
     */
    public $value;
    /**
     * Which Domain is this menu item for
     *
     * @var int unsigned
     */
    public $domain_id;
    /**
     * FK to Contact ID if the setting is localized to a contact
     *
     * @var int unsigned
     */
    public $contact_id;
    /**
     * Is this setting a contact specific or site wide setting?
     *
     * @var boolean
     */
    public $is_domain;
    /**
     * Component that this menu item belongs to
     *
     * @var int unsigned
     */
    public $component_id;
    /**
     * When was the setting created
     *
     * @var datetime
     */
    public $created_date;
    /**
     * FK to civicrm_contact, who created this setting
     *
     * @var int unsigned
     */
    public $created_id;
    /**
     * class constructor
     *
     * @access public
     * @return civicrm_setting
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
                'domain_id' => 'civicrm_domain:id',
                'contact_id' => 'civicrm_contact:id',
                'component_id' => 'civicrm_component:id',
                'created_id' => 'civicrm_contact:id',
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
                'group_name' => array(
                    'name' => 'group_name',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Group Name') ,
                    'required' => true,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'name' => array(
                    'name' => 'name',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Name') ,
                    'maxlength' => 255,
                    'size' => CRM_Utils_Type::HUGE,
                ) ,
                'value' => array(
                    'name' => 'value',
                    'type' => CRM_Utils_Type::T_TEXT,
                    'title' => ts('Value') ,
                ) ,
                'domain_id' => array(
                    'name' => 'domain_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'required' => true,
                    'FKClassName' => 'CRM_Core_DAO_Domain',
                ) ,
                'contact_id' => array(
                    'name' => 'contact_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Contact_DAO_Contact',
                ) ,
                'is_domain' => array(
                    'name' => 'is_domain',
                    'type' => CRM_Utils_Type::T_BOOLEAN,
                ) ,
                'component_id' => array(
                    'name' => 'component_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Core_DAO_Component',
                ) ,
                'created_date' => array(
                    'name' => 'created_date',
                    'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
                    'title' => ts('Created Date') ,
                ) ,
                'created_id' => array(
                    'name' => 'created_id',
                    'type' => CRM_Utils_Type::T_INT,
                    'FKClassName' => 'CRM_Contact_DAO_Contact',
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
                        self::$_import['setting'] = & $fields[$name];
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
                        self::$_export['setting'] = & $fields[$name];
                    } else {
                        self::$_export[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_export;
    }
}
