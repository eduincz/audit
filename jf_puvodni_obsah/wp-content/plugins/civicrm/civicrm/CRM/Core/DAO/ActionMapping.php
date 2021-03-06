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
class CRM_Core_DAO_ActionMapping extends CRM_Core_DAO
{
    /**
     * static instance to hold the table name
     *
     * @var string
     * @static
     */
    static $_tableName = 'civicrm_action_mapping';
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
     * Entity for which the reminder is created
     *
     * @var string
     */
    public $entity;
    /**
     * Entity value
     *
     * @var string
     */
    public $entity_value;
    /**
     * Entity value label
     *
     * @var string
     */
    public $entity_value_label;
    /**
     * Entity status
     *
     * @var string
     */
    public $entity_status;
    /**
     * Entity status label
     *
     * @var string
     */
    public $entity_status_label;
    /**
     * Entity date
     *
     * @var string
     */
    public $entity_date_start;
    /**
     * Entity date
     *
     * @var string
     */
    public $entity_date_end;
    /**
     * Entity recipient
     *
     * @var string
     */
    public $entity_recipient;
    /**
     * class constructor
     *
     * @access public
     * @return civicrm_action_mapping
     */
    function __construct()
    {
        parent::__construct();
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
                'entity' => array(
                    'name' => 'entity',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity') ,
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
                'entity_value_label' => array(
                    'name' => 'entity_value_label',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Value Label') ,
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
                'entity_status_label' => array(
                    'name' => 'entity_status_label',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Status Label') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'entity_date_start' => array(
                    'name' => 'entity_date_start',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Date Start') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'entity_date_end' => array(
                    'name' => 'entity_date_end',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Date End') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
                ) ,
                'entity_recipient' => array(
                    'name' => 'entity_recipient',
                    'type' => CRM_Utils_Type::T_STRING,
                    'title' => ts('Entity Recipient') ,
                    'maxlength' => 64,
                    'size' => CRM_Utils_Type::BIG,
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
                        self::$_import['action_mapping'] = & $fields[$name];
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
                        self::$_export['action_mapping'] = & $fields[$name];
                    } else {
                        self::$_export[$name] = & $fields[$name];
                    }
                }
            }
        }
        return self::$_export;
    }
}
