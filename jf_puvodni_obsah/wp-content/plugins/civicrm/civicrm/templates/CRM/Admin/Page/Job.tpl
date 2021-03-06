{*
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
*}
<div id="help">
    {ts}You can configure scheduled jobs (cron tasks) for your CiviCRM installation..{/ts} {$docLink}
</div>

{if $action eq 1 or $action eq 2 or $action eq 8}
   {include file="CRM/Admin/Form/Job.tpl"}
{else}

{if $rows}

        {if $action ne 1 and $action ne 2}
        <div class="action-link">
          <a href="{crmURL q="action=add&reset=1"}" id="newJob" class="button"><span><div class="icon add-icon"></div>{ts}Add New Scheduled Job{/ts}</span></a>
          <a href="{crmURL p='civicrm/admin/joblog' q="reset=1"}" id="jobLog" class="button"><span><div class="icon add-icon"></div>{ts}See the log{/ts}</span></a>
        </div>
        {/if}

<div id="ltype">
        {strip}
        {* handle enable/disable actions*}
 	{include file="CRM/common/enableDisable.tpl"}
        <table class="selector">
        <tr class="columnheader">
            <th >{ts}Name (Frequency)/Description{/ts}</th>
            <th >{ts}Command/Parameters{/ts}</th>
            <th >{ts}Last run{/ts}</th>
            <th >{ts}Enabled?{/ts}</th>
            <th ></th>
        </tr>
        {foreach from=$rows item=row}
        <tr id="row_{$row.id}" class="crm-job {cycle values="odd-row,even-row"} {$row.class}{if NOT $row.is_active} disabled{/if}">
            <td class="crm-job-name"><strong>{$row.name}</strong> ({$row.run_frequency})<br/>{$row.description}
                {ts}API Prefix:{/ts} {$row.api_prefix}<br/>
                {ts}API Entity:{/ts} {$row.api_entity}<br/>
                {ts}API Action:{/ts} <strong>{$row.api_action}</strong><br/>
            </td>
            <td class="crm-job-name">{if $row.parameters eq null}<em>{ts}no parameters{/ts}</em>{else}<pre>{$row.parameters}</pre>{/if}</td>
            <td class="crm-job-name">{if $row.last_run eq null}never{else}{$row.last_run|crmDate:$config->dateformatDatetime}{/if}</td>
            <td id="row_{$row.id}_status" class="crm-job-is_active">{if $row.is_active eq 1} {ts}Yes{/ts} {else} {ts}No{/ts} {/if}</td>
	    <td>{$row.action|replace:'xx':$row.id}</td>
        </tr>
        {/foreach}
        </table>
        {/strip}

        {if $action ne 1 and $action ne 2}
        <div class="action-link">
          <a href="{crmURL q="action=add&reset=1"}" id="newJob" class="button"><span><div class="icon add-icon"></div>{ts}Add New Scheduled Job{/ts}</span></a>
          <a href="{crmURL p='civicrm/admin/joblog' q="reset=1"}" id="jobLog" class="button"><span><div class="icon add-icon"></div>{ts}See the log{/ts}</span></a>
        </div>
        {/if}
</div>
{elseif $action ne 1}
    <div class="messages status">
      <div class="icon inform-icon"></div>
        {ts}There are no jobs configured.{/ts}
     </div>    
     <div class="action-link">
       <a href="{crmURL p='civicrm/admin/job' q="action=add&reset=1"}" id="newJob" class="button"><span><div class="icon add-icon"></div>{ts}Add New Scheduled Job{/ts}</span></a>
     </div>
 
{/if}
{/if}