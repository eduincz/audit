<?php /* Smarty version 2.6.26, created on 2012-02-12 13:35:01
         compiled from CRM/Event/Form/Search/Common.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'crmReplace', 'CRM/Event/Form/Search/Common.tpl', 27, false),array('block', 'ts', 'CRM/Event/Form/Search/Common.tpl', 41, false),array('function', 'cycle', 'CRM/Event/Form/Search/Common.tpl', 45, false),)), $this); ?>
<tr>
    <td class="crm-event-form-block-event_type"> <?php echo $this->_tpl_vars['form']['event_name']['label']; ?>
  <br /><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['event_name']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'huge') : smarty_modifier_crmReplace($_tmp, 'class', 'huge')); ?>
 </td>
    <td class="crm-event-form-block-event_type"> <?php echo $this->_tpl_vars['form']['event_type']['label']; ?>
<br /><?php echo $this->_tpl_vars['form']['event_type']['html']; ?>
 </td>
</tr>     
 
<tr> 
    <td class="crm-event-form-block-event_start_date_low">  
       <?php echo $this->_tpl_vars['form']['event_start_date_low']['label']; ?>
<br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'event_start_date_low')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
    <td class="crm-event-form-block-event_end_date_high"> 
       <?php echo $this->_tpl_vars['form']['event_end_date_high']['label']; ?>
<br /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'event_end_date_high')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td> 
</tr>

<tr>
    <td class="crm-event-form-block-participant_status"><label><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participant Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label> 
    <br />
      <div class="listing-box" style="width: auto; height: 120px">
       <?php $_from = $this->_tpl_vars['form']['participant_status_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['participant_status_val']):
?> 
        <div class="<?php echo smarty_function_cycle(array('values' => "odd-row,even-row"), $this);?>
">
       <?php echo $this->_tpl_vars['participant_status_val']['html']; ?>

        </div>
       <?php endforeach; endif; unset($_from); ?>
      </div>
    </td>
    <td class="crm-event-form-block-participant_role_id"><label><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Participant Role<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
    <br />
      <div class="listing-box" style="width: auto; height: 120px">
       <?php $_from = $this->_tpl_vars['form']['participant_role_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['participant_role_id_val']):
?>
        <div class="<?php echo smarty_function_cycle(array('values' => "odd-row,even-row"), $this);?>
">
                <?php echo $this->_tpl_vars['participant_role_id_val']['html']; ?>

        </div>
      <?php endforeach; endif; unset($_from); ?>
      </div><br />
    </td>
  
</tr> 
<tr>
    <td class="crm-event-form-block-participant_test"><?php echo $this->_tpl_vars['form']['participant_test']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['participant_test']['label']; ?>
</td> 
    <td class="crm-event-form-block-participant_pay_later"><?php echo $this->_tpl_vars['form']['participant_pay_later']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['participant_pay_later']['label']; ?>
</td> 
</tr>
<tr>
    <td class="crm-event-form-block-participant_fee_level"><?php echo $this->_tpl_vars['form']['participant_fee_level']['label']; ?>
<br /><?php echo $this->_tpl_vars['form']['participant_fee_level']['html']; ?>
</td>
     <td class="crm-event-form-block-participant_fee_amount"><label><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fee Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label><br />
     	<?php echo $this->_tpl_vars['form']['participant_fee_amount_low']['label']; ?>
 &nbsp; <?php echo $this->_tpl_vars['form']['participant_fee_amount_low']['html']; ?>
 &nbsp;&nbsp; 
	<?php echo $this->_tpl_vars['form']['participant_fee_amount_high']['label']; ?>
 &nbsp; <?php echo $this->_tpl_vars['form']['participant_fee_amount_high']['html']; ?>

     </td> 
</tr>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Campaign/Form/addCampaignToComponent.tpl", 'smarty_include_vars' => array('campaignContext' => 'componentSearch','campaignTrClass' => '','campaignTdClass' => 'crm-event-form-block-participant_campaign_id')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['participantGroupTree']): ?>
<tr>
    <td colspan="4">
       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Form/Search.tpl", 'smarty_include_vars' => array('groupTree' => $this->_tpl_vars['participantGroupTree'],'showHideLinks' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
</tr>
<?php endif; ?>

<?php echo '
<script type="text/javascript"> 
var eventUrl = "'; ?>
<?php echo $this->_tpl_vars['dataURLEvent']; ?>
<?php echo '";
var typeUrl  = "'; ?>
<?php echo $this->_tpl_vars['dataURLEventType']; ?>
<?php echo '";
var feeUrl   = "'; ?>
<?php echo $this->_tpl_vars['dataURLEventFee']; ?>
<?php echo '";

cj(\'#event_name\').autocomplete( eventUrl, { width : 280, selectFirst : false, matchContains: true
                            }).result( function(event, data, formatted) { cj( "input#event_id" ).val( data[1] );
                            }).bind( \'click\', function( ) { cj( "input#event_id" ).val(\'\'); });

cj(\'#event_type\').autocomplete( typeUrl, { width : 180, selectFirst : false, matchContains: true
                               }).result(function(event, data, formatted) { cj( "input#event_type_id" ).val( data[1] );
                               }).bind( \'click\', function( ) { cj( "input#event_type_id" ).val(\'\'); });

cj(\'#participant_fee_level\').autocomplete( feeUrl, { width : 180, selectFirst : false, matchContains: true
                                         }).result(function(event, data, formatted) { cj( "input#participant_fee_id" ).val( data[1] );
                                         }).bind( \'click\', function( ) { cj( "input#participant_fee_id" ).val(\'\'); });
</script>
'; ?>
