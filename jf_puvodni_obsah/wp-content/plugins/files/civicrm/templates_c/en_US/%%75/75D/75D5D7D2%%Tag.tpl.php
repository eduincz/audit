<?php /* Smarty version 2.6.26, created on 2012-02-11 17:46:14
         compiled from CRM/common/Tag.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'crmKey', 'CRM/common/Tag.tpl', 19, false),array('function', 'crmURL', 'CRM/common/Tag.tpl', 56, false),array('block', 'ts', 'CRM/common/Tag.tpl', 24, false),)), $this); ?>
<?php if (! $this->_tpl_vars['tagsetType'] || $this->_tpl_vars['tagsetType'] == 'contact'): ?>
<?php $_from = $this->_tpl_vars['tagsetInfo_contact']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagset']):
?>
<div class="crm-section tag-section contact-tagset-<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
-section">
<label><?php echo $this->_tpl_vars['tagset']['parentName']; ?>
</label>
<div<?php if ($this->_tpl_vars['context'] == 'contactTab'): ?> style="margin-top:-15px;"<?php endif; ?>>
<?php $this->assign('elemName', $this->_tpl_vars['tagset']['tagsetElementName']); ?>
<?php $this->assign('parID', $this->_tpl_vars['tagset']['parentID']); ?>
<?php $this->assign('editTagSet', false); ?>
<?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elemName']][$this->_tpl_vars['parID']]['html']; ?>

<?php if ($this->_tpl_vars['action'] != 4): ?>
 <?php $this->assign('editTagSet', true); ?>
 <?php if ($this->_tpl_vars['action'] == 16 && ! ( $this->_tpl_vars['permission'] == 'edit' )): ?>
   <?php $this->assign('editTagSet', false); ?>
 <?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['editTagSet']): ?>
<script type="text/javascript">
<?php echo '
    var tagUrl = '; ?>
"<?php echo $this->_tpl_vars['tagset']['tagUrl']; ?>
&key=<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/taglist'), $this);?>
"<?php echo ';
    var contactEntityTags = \'\';
    '; ?>
<?php if ($this->_tpl_vars['tagset']['entityTags']): ?><?php echo '
        eval( \'contactEntityTags = \' + '; ?>
'<?php echo $this->_tpl_vars['tagset']['entityTags']; ?>
'<?php echo ' );
    '; ?>
<?php endif; ?><?php echo '
    var hintText = "'; ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Type in a partial or complete name of an existing tag.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";
    
    cj( ".contact-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) input")
        .addClass("contact-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '");
    cj( ".contact-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) .contact-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '"  )    
        .tokenInput( tagUrl, { 
            prePopulate: contactEntityTags, 
            theme: \'facebook\', 
            hintText: hintText, 
            onAdd: function ( item ) { 
                processContactTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'select\', item.id );
                
                //update count of tags in summary tab
                if ( cj( \'.ui-tabs-nav #tab_tag a\' ).length ) {
                    var existingTagsInTagset = cj(\'.token-input-delete-token-facebook\').length;
                    var tagCount = cj("#tagtree input:checkbox:checked").length + existingTagsInTagset;  
                    cj( \'.ui-tabs-nav #tab_tag a\' ).html( \'Tags <em>\' + tagCount + \'</em>\');
                }
            },
            onDelete: function ( item ) { 
                processContactTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'delete\', item.id );

                //update count of tags in summary tab
                if ( cj( \'.ui-tabs-nav #tab_tag a\' ).length ) {
                    var existingTagsInTagset = cj(\'.token-input-delete-token-facebook\').length;
                    var tagCount = cj("#tagtree input:checkbox:checked").length + existingTagsInTagset;  
                    cj( \'.ui-tabs-nav #tab_tag a\' ).html( \'Tags <em>\' + tagCount + \'</em>\');
                }
            } 
         });
    cj( ".contact-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input)").addClass("crm-processed-input");    
    function processContactTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( action, id ) {
        var postUrl          = "'; ?>
<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/processTags','h' => 0), $this);?>
<?php echo '";
        var parentId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '";
        var entityId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityId']; ?>
<?php echo '";
        var entityTable      = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityTable']; ?>
<?php echo '";
        var skipTagCreate    = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipTagCreate']; ?>
<?php echo '";
        var skipEntityAction = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipEntityAction']; ?>
<?php echo '";
         
        cj.post( postUrl, { action: action, tagID: id, parentId: parentId, entityId: entityId, entityTable: entityTable,
                            skipTagCreate: skipTagCreate, skipEntityAction: skipEntityAction, key: '; ?>
"<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/processTags'), $this);?>
"<?php echo ' },
            function ( response ) {
                // update hidden element
                if ( response.id ) {
                    var curVal   = cj( ".contact-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( );
                    var valArray = curVal.split(\',\');
                    var setVal   = Array( );
                    if ( response.action == \'delete\' ) {
                        for ( x in valArray ) {
                            if ( valArray[x] != response.id ) {
                                setVal[x] = valArray[x];
                            }
                        }
                    } else if ( response.action == \'select\' ) {
                        setVal    = valArray;
                        setVal[ setVal.length ] = response.id;
                    }
                    
                    var actualValue = setVal.join( \',\' );
                    cj( ".contact-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( actualValue );
                }
            }, "json" );
    }
'; ?>

</script>
<?php else: ?>
    <?php if ($this->_tpl_vars['tagset']['entityTagsArray']): ?>
        <?php $_from = $this->_tpl_vars['tagset']['entityTagsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagsetList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagsetList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['val']):
        $this->_foreach['tagsetList']['iteration']++;
?>
            &nbsp;<?php echo $this->_tpl_vars['val']['name']; ?>
<?php if (! ($this->_foreach['tagsetList']['iteration'] == $this->_foreach['tagsetList']['total'])): ?>,<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
<?php endif; ?>
</div>
<div class="clear"></div> 
</div>
<?php endforeach; endif; unset($_from); ?>

<?php elseif ($this->_tpl_vars['tagsetType'] == 'activity'): ?>
<?php $_from = $this->_tpl_vars['tagsetInfo_activity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagset']):
?>
<div class="crm-section tag-section activity-tagset-<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
-section">
<div class="label">
<label><?php echo $this->_tpl_vars['tagset']['parentName']; ?>
</label>
</div>
<div class="content">
<?php $this->assign('elemName', $this->_tpl_vars['tagset']['tagsetElementName']); ?>
<?php $this->assign('parID', $this->_tpl_vars['tagset']['parentID']); ?>
<?php $this->assign('editTagSet', false); ?>
<?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elemName']][$this->_tpl_vars['parID']]['html']; ?>

<?php if ($this->_tpl_vars['action'] != 4): ?>
 <?php $this->assign('editTagSet', true); ?>
 <?php if ($this->_tpl_vars['action'] == 16 && ! ( $this->_tpl_vars['permission'] == 'edit' )): ?>
   <?php $this->assign('editTagSet', false); ?>
 <?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['editTagSet']): ?>
<script type="text/javascript">
<?php echo '
    var tagUrl = '; ?>
"<?php echo $this->_tpl_vars['tagset']['tagUrl']; ?>
&key=<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/taglist'), $this);?>
"<?php echo ';
    var activityEntityTags = \'\';
    '; ?>
<?php if ($this->_tpl_vars['tagset']['entityTags']): ?><?php echo '
        eval( \'activityEntityTags = \' + '; ?>
'<?php echo $this->_tpl_vars['tagset']['entityTags']; ?>
'<?php echo ' );
    '; ?>
<?php endif; ?><?php echo '
    var hintText = "'; ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Type in a partial or complete name of an existing tag.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";
    
    cj( ".activity-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) input")
        .addClass("activity-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '");
    cj( ".activity-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) .activity-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '"  )    
        .tokenInput( tagUrl, { 
              prePopulate: activityEntityTags, 
              theme: \'facebook\', 
              hintText: hintText, 
              onAdd: function ( item ) { 
                processActivityTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'select\', item.id );
              },
              onDelete: function ( item ) { 
                processActivityTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'delete\', item.id );
              } 
           });
    cj( ".activity-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input)").addClass("crm-processed-input");    
    function processActivityTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( action, id ) {
        var postUrl          = "'; ?>
<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/processTags','h' => 0), $this);?>
<?php echo '";
        var parentId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '";
        var entityId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityId']; ?>
<?php echo '";
        var entityTable      = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityTable']; ?>
<?php echo '";
        var skipTagCreate    = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipTagCreate']; ?>
<?php echo '";
        var skipEntityAction = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipEntityAction']; ?>
<?php echo '";
         
        cj.post( postUrl, { action: action, tagID: id, parentId: parentId, entityId: entityId, entityTable: entityTable,
                            skipTagCreate: skipTagCreate, skipEntityAction: skipEntityAction, key: '; ?>
"<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/processTags'), $this);?>
"<?php echo ' },
            function ( response ) {
                // update hidden element
                if ( response.id ) {
                    var curVal   = cj( ".activity-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( );
                    var valArray = curVal.split(\',\');
                    var setVal   = Array( );
                    if ( response.action == \'delete\' ) {
                        for ( x in valArray ) {
                            if ( valArray[x] != response.id ) {
                                setVal[x] = valArray[x];
                            }
                        }
                    } else if ( response.action == \'select\' ) {
                        setVal    = valArray;
                        setVal[ setVal.length ] = response.id;
                    }
                    
                    var actualValue = setVal.join( \',\' );
                    cj( ".activity-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( actualValue );
                }
            }, "json" );
    }
'; ?>

</script>
<?php else: ?>
    <?php if ($this->_tpl_vars['tagset']['entityTagsArray']): ?>
        <?php $_from = $this->_tpl_vars['tagset']['entityTagsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagsetList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagsetList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['val']):
        $this->_foreach['tagsetList']['iteration']++;
?>
            &nbsp;<?php echo $this->_tpl_vars['val']['name']; ?>
<?php if (! ($this->_foreach['tagsetList']['iteration'] == $this->_foreach['tagsetList']['total'])): ?>,<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
<?php endif; ?>
</div>
<div class="clear"></div> 
</div>
<?php endforeach; endif; unset($_from); ?>
<?php elseif ($this->_tpl_vars['tagsetType'] == 'case'): ?>
<?php $_from = $this->_tpl_vars['tagsetInfo_case']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tagset']):
?>
<div class="crm-section tag-section case-tagset-<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
-section">
<div class="label">
<label><?php echo $this->_tpl_vars['tagset']['parentName']; ?>
</label>
</div>
<div class="content">
<?php $this->assign('elemName', $this->_tpl_vars['tagset']['tagsetElementName']); ?>
<?php $this->assign('parID', $this->_tpl_vars['tagset']['parentID']); ?>
<?php $this->assign('editTagSet', false); ?>
<?php echo $this->_tpl_vars['form'][$this->_tpl_vars['elemName']][$this->_tpl_vars['parID']]['html']; ?>

<?php if ($this->_tpl_vars['action'] != 4 || $this->_tpl_vars['form']['formName'] == 'CaseView'): ?>
 <?php $this->assign('editTagSet', true); ?>
 <?php if ($this->_tpl_vars['action'] == 16 && ! ( $this->_tpl_vars['permission'] == 'edit' )): ?>
   <?php $this->assign('editTagSet', false); ?>
 <?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['editTagSet']): ?>
<script type="text/javascript">
<?php echo '
    var tagUrl = '; ?>
"<?php echo $this->_tpl_vars['tagset']['tagUrl']; ?>
&key=<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/taglist'), $this);?>
"<?php echo ';
    var caseEntityTags = \'\';
    '; ?>
<?php if ($this->_tpl_vars['tagset']['entityTags']): ?><?php echo '
        eval( \'caseEntityTags = \' + '; ?>
'<?php echo $this->_tpl_vars['tagset']['entityTags']; ?>
'<?php echo ' );
    '; ?>
<?php endif; ?><?php echo '
    var hintText = "'; ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Type in a partial or complete name of an existing tag.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '";
    
    cj( ".case-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) input")
        .addClass("case-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '")
    cj( ".case-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input) .case-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '"  )
        .tokenInput( tagUrl, {
              prePopulate: caseEntityTags, 
              theme: \'facebook\', 
              hintText: hintText, 
              onAdd: function ( item ) { 
                processCaseTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'select\', item.id );
              },
              onDelete: function ( item ) { 
                processCaseTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( \'delete\', item.id );
              } 
         });
    cj( ".case-tagset-'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '-section:not(.crm-processed-input)").addClass("crm-processed-input");    
    function processCaseTags_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '( action, id ) {
        var postUrl          = "'; ?>
<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/processTags','h' => 0), $this);?>
<?php echo '";
        var parentId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '";
        var entityId         = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityId']; ?>
<?php echo '";
        var entityTable      = "'; ?>
<?php echo $this->_tpl_vars['tagset']['entityTable']; ?>
<?php echo '";
        var skipTagCreate    = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipTagCreate']; ?>
<?php echo '";
        var skipEntityAction = "'; ?>
<?php echo $this->_tpl_vars['tagset']['skipEntityAction']; ?>
<?php echo '";
         
        cj.post( postUrl, { action: action, tagID: id, parentId: parentId, entityId: entityId, entityTable: entityTable,
                            skipTagCreate: skipTagCreate, skipEntityAction: skipEntityAction, key: '; ?>
"<?php echo smarty_function_crmKey(array('name' => 'civicrm/ajax/processTags'), $this);?>
"<?php echo ' },
            function ( response ) {
                // update hidden element
                if ( response.id ) {
                    var curVal   = cj( ".case-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( );
                    var valArray = curVal.split(\',\');
                    var setVal   = Array( );
                    if ( response.action == \'delete\' ) {
                        for ( x in valArray ) {
                            if ( valArray[x] != response.id ) {
                                setVal[x] = valArray[x];
                            }
                        }
                    } else if ( response.action == \'select\' ) {
                        setVal    = valArray;
                        setVal[ setVal.length ] = response.id;
                    }
                    
                    var actualValue = setVal.join( \',\' );
                    cj( ".case-taglist_'; ?>
<?php echo $this->_tpl_vars['tagset']['parentID']; ?>
<?php echo '" ).val( actualValue );
                }
            }, "json" );
    }
'; ?>

</script>
<?php else: ?>
    <?php if ($this->_tpl_vars['tagset']['entityTagsArray']): ?>
        <?php $_from = $this->_tpl_vars['tagset']['entityTagsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tagsetList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tagsetList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['val']):
        $this->_foreach['tagsetList']['iteration']++;
?>
            &nbsp;<?php echo $this->_tpl_vars['val']['name']; ?>
<?php if (! ($this->_foreach['tagsetList']['iteration'] == $this->_foreach['tagsetList']['total'])): ?>,<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
<?php endif; ?>
</div>
<div class="clear"></div> 
</div>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
