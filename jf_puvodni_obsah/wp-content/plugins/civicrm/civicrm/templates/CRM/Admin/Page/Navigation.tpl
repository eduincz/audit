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
{if $action eq 1 or $action eq 2 or $action eq 8}
    {include file="CRM/Admin/Form/Navigation.tpl"}
{else}
    <div id="help">
        {ts}Customize the CiviCRM navigation menu bar for your users here.{/ts} {help id="id-navigation"}
    </div>

<div class="crm-block crm-content-block">
    <div id="new-menu-item">
        <a href="{crmURL p="civicrm/admin/menu" q="action=add&reset=1"}" class="button" style="margin-left: 6px;"><span><div class="icon add-icon"></div>{ts}Add Menu Item{/ts}</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <span id="reset-menu" class="success-status" style="display:none">
        {capture assign=rebuildURL}{crmURL p='civicrm/admin/menu' q="reset=1"}{/capture}
        {ts 1=$rebuildURL}<a href='%1' title="Reload page"><strong>Click here</strong></a> to reload the page and see your changes in the menu bar above.{/ts}
        </span><br/><br/>
    </div>
    <div class="spacer"></div>
    <div id="navigation-tree" class="navigation-tree" style="height:auto; border-collapse:separate; background-color:#FFFFFF;"></div>
    <div class="spacer"></div>
</div>
    {literal}
    <script type="text/javascript">
    cj(function () {
        cj("#navigation-tree").jstree({
	     plugins : [ "themes", "json_data", "dnd","ui", "crrm","contextmenu" ],
             json_data  : {
                ajax:{
                   dataType : "json",
                   async : true, 
                   url : {/literal}"{crmURL p='civicrm/ajax/menu' h=0 q='key='}{crmKey name='civicrm/ajax/menu'}"{literal}
                 }
            },
             rules : {
                droppable : [ "tree-drop" ],
                multiple : true,
                deletable : "all",
                draggable : "all"
            },
	        crrm  :  {
                move: {
                        check_move: function(m) {
		                    if ( cj( m.r[0] ).attr('id').replace("node_","") == {/literal}{$homeMenuId}{literal} || 
                                cj( m.o[0] ).attr('id').replace("node_","") == {/literal}{$homeMenuId}{literal} ) { 
                                    return false; 
                            } else { 
                                    return true; 
                            } 
		                } 
                      }
            },
             contextmenu : { 
                items: {
                        create : false,
                        ccp : {   
                                   label   : "Edit", 
                                   visible : function (node, obj) { if(node.length != 1) return false; 
                                                  return obj.check("renameable", node); }, 
                                   action  : function (node, obj) { 
                                             var nid = cj(node).prop('id');
                                             var nodeID = nid.substr( 5 );
                                             var editURL = {/literal}"{crmURL p='civicrm/admin/menu' h=0 q='action=update&reset=1&id='}"{literal} + nodeID;
                                             location.href =  editURL;  
                                       },
				                   submenu : false
                            }       
                      }
           }                
      
      }).bind("rename.jstree", function ( e,node ) {
        var nodeID  = node.rslt.obj.attr('id').replace("node_","");
        var newName = node.rslt.new_name;
        var postURL = {/literal}"{crmURL p='civicrm/ajax/menutree' h=0 q='key='}{crmKey name='civicrm/ajax/menutree'}"{literal};
              cj.get( postURL + '&type=rename&id=' + nodeID + '&data=' + newName, 
                function (data) {
                    cj("#reset-menu").show( );
                });
       
       }). bind("remove.jstree", function ( e,node ) {
            var menuName  = node.rslt.obj.find('a').first( ).text( );
            var deleteMsg = {/literal}{ts}"Are you sure you want to delete this menu item:"{/ts} + " "{literal} + menuName + {/literal}" ? This action can not be undone."{literal};
      var isDelete  = confirm( deleteMsg );
          if ( isDelete ) {
              var nodeID  = node.rslt.obj.attr('id').replace("node_","");
              var postURL = {/literal}"{crmURL p='civicrm/ajax/menutree' h=0 q='key='}{crmKey name='civicrm/ajax/menutree'}"{literal};
              cj.get( postURL + '&type=delete&id=' + nodeID,
                 function (data) {
                		cj("#reset-menu").show( );
          	      } );
               } else { 
 	         cj("#navigation-tree").jstree('refresh');
    	  }                 
       
       }). bind("move_node.jstree", function ( e,node ) {
          node.rslt.o.each(function (i) {
               var nodeID = node.rslt.o.attr('id').replace("node_","");
               var refID  = node.rslt.np.attr('id').replace("node_","");
	        if (isNaN( refID ) ){ refID =''; }
	             var ps = node.rslt.cp+i;
               var postURL = {/literal}"{crmURL p='civicrm/ajax/menutree' h=0 q='key='}{crmKey name='civicrm/ajax/menutree'}"{literal};
               cj.get( postURL + '&type=move&id=' +  nodeID + '&ref_id=' + refID + '&ps='+ps, 
               function (data) {
             		cj("#reset-menu").show( );
               });
         }); 
    });
});
    </script>
    {/literal}
{/if}
