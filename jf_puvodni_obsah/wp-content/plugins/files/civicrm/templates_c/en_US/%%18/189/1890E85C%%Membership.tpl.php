<?php /* Smarty version 2.6.26, created on 2012-02-12 13:35:19
         compiled from CRM/Member/Form/Membership.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Member/Form/Membership.tpl', 30, false),array('modifier', 'crmDate', 'CRM/Member/Form/Membership.tpl', 30, false),array('modifier', 'crmReplace', 'CRM/Member/Form/Membership.tpl', 188, false),array('function', 'help', 'CRM/Member/Form/Membership.tpl', 134, false),array('function', 'crmURL', 'CRM/Member/Form/Membership.tpl', 344, false),)), $this); ?>
<?php if ($this->_tpl_vars['cancelAutoRenew']): ?>
<div class="messages status">
    <div class="icon inform-icon"></div>
       <p><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['cancelAutoRenew'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This membership is set to renew automatically <?php if ($this->_tpl_vars['endDate']): ?>on <?php echo ((is_array($_tmp=$this->_tpl_vars['endDate'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php endif; ?>. You will need to cancel the auto-renew option if you want to modify the Membership Type, End Date or Membership Status. <a href="%1">Click here</a> if you want to cancel the automatic renewal option.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
    </div>
<?php endif; ?>
<div class="spacer"></div>
<?php if ($this->_tpl_vars['cdType']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Form/CustomData.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['priceSetId']): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Form/PriceSet.tpl", 'smarty_include_vars' => array('context' => 'standalone','extends' => 'Membership')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php echo '
  <script type="text/javascript">
    cj( function() {
        var membershipValues = new Array;
        '; ?>
<?php $_from = $this->_tpl_vars['optionsMembershipTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opId'] => $this->_tpl_vars['memType']):
?><?php echo '
                  membershipValues['; ?>
<?php echo $this->_tpl_vars['opId']; ?>
<?php echo '] = '; ?>
<?php echo $this->_tpl_vars['memType']; ?>
<?php echo ';
        '; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
        processMembershipPriceset(membershipValues, '; ?>
<?php echo $this->_tpl_vars['autoRenewOption']; ?>
<?php echo ', 1);
	'; ?>
<?php if (! $this->_tpl_vars['membershipMode']): ?><?php echo '
	  enableAmountSection('; ?>
<?php echo $this->_tpl_vars['contributionType']; ?>
<?php echo ');
	'; ?>
<?php endif; ?><?php echo '
    });
  </script>
  '; ?>

<?php else: ?>
<?php if ($this->_tpl_vars['membershipMode'] == 'test'): ?>
    <?php $this->assign('registerMode', 'TEST'); ?>
<?php elseif ($this->_tpl_vars['membershipMode'] == 'live'): ?>
    <?php $this->assign('registerMode', 'LIVE'); ?>
<?php endif; ?>
<?php if (! $this->_tpl_vars['emailExists'] && $this->_tpl_vars['action'] != 8 && $this->_tpl_vars['context'] != 'standalone'): ?>
<div class="messages status">
    <div class="icon inform-icon"></div>
        <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You will not be able to send an automatic email receipt for this Membership because there is no email address recorded for this contact. If you want a receipt to be sent when this Membership is recorded, click Cancel and then click Edit from the Summary tab to add an email address before recording the Membership.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['context'] != 'standalone'): ?>
   <h3><?php if ($this->_tpl_vars['action'] == 1): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php elseif ($this->_tpl_vars['action'] == 2): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></h3>
<?php endif; ?>
<?php if ($this->_tpl_vars['membershipMode']): ?>
    <div id="help">
        <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['displayName'],'2' => $this->_tpl_vars['registerMode'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Use this form to submit Membership Record on behalf of %1. <strong>A %2 transaction will be submitted</strong> using the selected payment processor.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
<?php endif; ?>
<div class="crm-block crm-form-block crm-membership-form-block">
   <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <?php if ($this->_tpl_vars['action'] == 8): ?>
      <div class="messages status">
          <div class="icon inform-icon"></div>&nbsp;       
          <span class="font-red bold"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>WARNING: Deleting this membership will also delete any related payment (contribution) records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This action cannot be undone.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
          <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Consider modifying the membership status instead if you want to maintain an audit trail and avoid losing payment data. You can set the status to Cancelled by editing the membership and clicking the Status Override checkbox.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
          <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click 'Delete' if you want to continue.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>    
      </div>
    <?php else: ?>
    <table class="form-layout-compressed">
        <?php if ($this->_tpl_vars['context'] != 'standalone'): ?>
            <tr>
                <td class="font-size12pt label"><strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Member<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></td><td class="font-size12pt"><strong><?php echo $this->_tpl_vars['displayName']; ?>
</strong></td>
            </tr>
        <?php else: ?>
            <?php if (! $this->_tpl_vars['membershipMode'] && ! $this->_tpl_vars['emailExists'] && $this->_tpl_vars['outBound_option'] != 2): ?>
                <?php $this->assign('profileCreateCallback', 1); ?>
            <?php endif; ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Form/NewContact.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    <?php if ($this->_tpl_vars['membershipMode']): ?>
	    <tr><td class="label"><?php echo $this->_tpl_vars['form']['payment_processor_id']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['payment_processor_id']['html']; ?>
</td></tr>
	<?php endif; ?>
 	<tr class="crm-membership-form-block-membership_type_id">
            <td class="label"><?php echo $this->_tpl_vars['form']['membership_type_id']['label']; ?>
</td>
            <td><span id='mem_type_id'><?php echo $this->_tpl_vars['form']['membership_type_id']['html']; ?>
</span>
                 <?php if ($this->_tpl_vars['hasPriceSets']): ?>
                    <span id='totalAmountORPriceSet'> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>OR<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
        	    <span id='selectPriceSet'><?php echo $this->_tpl_vars['form']['price_set_id']['html']; ?>
</span>
                    <?php if ($this->_tpl_vars['buildPriceSet'] && $this->_tpl_vars['priceSet']): ?>
                      <div id="priceset"><br/><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Form/PriceSet.tpl", 'smarty_include_vars' => array('extends' => 'Membership')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
                    <?php else: ?>
                      <div id="priceset" class="hiddenElement"></div>
                    <?php endif; ?>
                 <?php endif; ?>
                 <?php if ($this->_tpl_vars['member_is_test']): ?> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>(test)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?><br />
                    <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select Membership Organization and then Membership Type.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
            </td>
        </tr>	
    <tr class="crm-membership-form-block-source"><td class="label"><?php echo $this->_tpl_vars['form']['source']['label']; ?>
</td><td>&nbsp;<?php echo $this->_tpl_vars['form']['source']['html']; ?>
<br />
        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Source of this membership. This value is searchable.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr>
		
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Campaign/Form/addCampaignToComponent.tpl", 'smarty_include_vars' => array('campaignTrClass' => "crm-membership-form-block-campaign_id")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<tr class="crm-membership-form-block-join_date"><td class="label"><?php echo $this->_tpl_vars['form']['join_date']['label']; ?>
</td><td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'join_date')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<br />
        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>When did this contact first become a member?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr>
 	<tr class="crm-membership-form-block-start_date"><td class="label"><?php echo $this->_tpl_vars['form']['start_date']['label']; ?>
</td><td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'start_date')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<br />
        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>First day of current continuous membership period. Start Date will be automatically set based on Membership Type if you don't select a date.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr>
 	<tr class="crm-membership-form-block-end_date"><td class="label"><?php echo $this->_tpl_vars['form']['end_date']['label']; ?>
</td>
	<td><?php if ($this->_tpl_vars['isRecur'] && $this->_tpl_vars['endDate']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['endDate'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
<?php else: ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'end_date')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endif; ?>
		<br />
        <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Latest membership period expiration date. End Date will be automatically set based on Membership Type if you don't select a date.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr>
        <tr id="autoRenew" class="crm-membership-form-block-auto_renew">
           <td class="label"> <?php echo $this->_tpl_vars['form']['auto_renew']['label']; ?>
 </td>
           <td> <?php echo $this->_tpl_vars['form']['auto_renew']['html']; ?>
 </td>
        </tr>
    <?php if (! $this->_tpl_vars['membershipMode']): ?>
        <tr><td class="label"><?php echo $this->_tpl_vars['form']['is_override']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['is_override']['html']; ?>
&nbsp;&nbsp;<?php echo smarty_function_help(array('id' => "id-status-override"), $this);?>
</td></tr>
    <?php endif; ?>

    <?php if (! $this->_tpl_vars['membershipMode']): ?>
           	<tr id="memberStatus_show">    
        <?php if ($this->_tpl_vars['action'] == 2): ?>
            <td class="label"><?php echo $this->_tpl_vars['form']['status_id']['label']; ?>
</td><td class="view-value"><?php echo $this->_tpl_vars['membershipStatus']; ?>
</td>
        <?php endif; ?>
	</tr>

	        <tr id="memberStatus"><td class="label"><?php echo $this->_tpl_vars['form']['status_id']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['status_id']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If <strong>Status Override</strong> is checked, the selected status will remain in force (it will NOT be modified by the automated status update script).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr>

	<?php elseif ($this->_tpl_vars['membershipMode']): ?>
        <tr class="crm-membership-form-block-total_amount">
                      <td class="label"><?php echo $this->_tpl_vars['form']['total_amount']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['total_amount']['html']; ?>
<br />
                      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership payment amount.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>                   
        </tr>
        <tr class="crm-membership-form-block-billing"><td colspan="2">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/BillingBlock.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td></tr>
    <?php endif; ?>
        <?php if ($this->_tpl_vars['accessContribution'] && ! $this->_tpl_vars['membershipMode'] && ( $this->_tpl_vars['action'] != 2 || ! $this->_tpl_vars['rows']['0']['contribution_id'] || $this->_tpl_vars['onlinePendingContributionId'] )): ?>
        <tr id="contri">
            <td class="label"><?php if ($this->_tpl_vars['onlinePendingContributionId']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Update Payment Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php echo $this->_tpl_vars['form']['record_contribution']['label']; ?>
<?php endif; ?></td>
            <td><?php echo $this->_tpl_vars['form']['record_contribution']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Check this box to enter or update payment information. You will also be able to generate a customized receipt.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
        </tr>
        <tr class="crm-membership-form-block-record_contribution"><td colspan="2">    
          <fieldset id="recordContribution"><legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Payment and Receipt<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
              <table>
                  <tr class="crm-membership-form-block-contribution_type_id">
                      <td class="label"><?php echo $this->_tpl_vars['form']['contribution_type_id']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['contribution_type_id']['html']; ?>
<br />
                      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the appropriate contribution type for this payment.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
                  </tr>
                  <tr class="crm-membership-form-block-total_amount">
                      <td class="label"><?php echo $this->_tpl_vars['form']['total_amount']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['total_amount']['html']; ?>
<br />
                	  <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership payment amount. A contribution record will be created for this amount.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
                  </tr>
                  <tr class="crm-membership-form-block-receive_date">
                      <td class="label"><?php echo $this->_tpl_vars['form']['receive_date']['label']; ?>
</td>
                      <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'receive_date')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>  
                  </tr>
                  <tr class="crm-membership-form-block-payment_instrument_id">
                      <td class="label"><?php echo $this->_tpl_vars['form']['payment_instrument_id']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['payment_instrument_id']['html']; ?>
</td>
                  </tr>
		          <tr id="checkNumber" class="crm-membership-form-block-check_number">
                      <td class="label"><?php echo $this->_tpl_vars['form']['check_number']['label']; ?>
</td>
                      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['check_number']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'six') : smarty_modifier_crmReplace($_tmp, 'class', 'six')); ?>
</td>
                  </tr>
	   	       <?php if ($this->_tpl_vars['action'] != 2): ?>	
                  <tr class="crm-membership-form-block-trxn_id">
	    	          <td class="label"><?php echo $this->_tpl_vars['form']['trxn_id']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['trxn_id']['html']; ?>
</td>
                  </tr>
	   	       <?php endif; ?>
                  <tr class="crm-membership-form-block-contribution_status_id">		
		              <td class="label"><?php echo $this->_tpl_vars['form']['contribution_status_id']['label']; ?>
</td>
                      <td><?php echo $this->_tpl_vars['form']['contribution_status_id']['html']; ?>
</td>
                  </tr>
              </table>
          </fieldset>
        </td></tr>
    <?php else: ?>
        <div class="spacer"></div>
	<?php endif; ?>

    <?php if ($this->_tpl_vars['emailExists'] && $this->_tpl_vars['outBound_option'] != 2): ?>
        <tr id="send-receipt" class="crm-membership-form-block-send_receipt">
            <td class="label"><?php echo $this->_tpl_vars['form']['send_receipt']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['send_receipt']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['emailExists'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Automatically email a membership confirmation and receipt to %1?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
        </tr>
    <?php elseif ($this->_tpl_vars['context'] == 'standalone' && $this->_tpl_vars['outBound_option'] != 2): ?>
        <tr id="email-receipt" style="display:none;">
            <td class="label"><?php echo $this->_tpl_vars['form']['send_receipt']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['send_receipt']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Automatically email a membership confirmation and receipt to <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><span id="email-address"></span>?</span></td>
        </tr>
    <?php endif; ?>
        <tr id="fromEmail" style="display:none;">
            <td class="label"><?php echo $this->_tpl_vars['form']['from_email_address']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['from_email_address']['html']; ?>
</td>
        </tr>    
        <tr id='notice' style="display:none;">
            <td class="label"><?php echo $this->_tpl_vars['form']['receipt_text_signup']['label']; ?>
</td>
            <td class="html-adjust"><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you need to include a special message for this member, enter it here. Otherwise, the confirmation email will include the standard receipt message configured under System Message Templates.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                 <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['receipt_text_signup']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'huge') : smarty_modifier_crmReplace($_tmp, 'class', 'huge')); ?>
</td>
        </tr>
    </table>
    <div id="customData"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/customData.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php echo '
		<script type="text/javascript">
			cj(document).ready(function() {
				'; ?>

				buildCustomData( '<?php echo $this->_tpl_vars['customDataType']; ?>
' );
				<?php if ($this->_tpl_vars['customDataSubType']): ?>
					buildCustomData( '<?php echo $this->_tpl_vars['customDataType']; ?>
', <?php echo $this->_tpl_vars['customDataSubType']; ?>
 );
				<?php endif; ?>
				<?php echo '
			});
		</script>
	'; ?>

	<?php if ($this->_tpl_vars['accessContribution'] && $this->_tpl_vars['action'] == 2 && $this->_tpl_vars['rows']['0']['contribution_id']): ?>
        <fieldset>	 
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Selector.tpl", 'smarty_include_vars' => array('context' => 'Search')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </fieldset>
	<?php endif; ?>
   <?php endif; ?>
    
    <div class="spacer"></div>
    <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div> <!-- end form-block -->

<?php if ($this->_tpl_vars['action'] != 8): ?>  
<?php if ($this->_tpl_vars['accessContribution'] && ! $this->_tpl_vars['membershipMode'] && ( $this->_tpl_vars['action'] != 2 || ! $this->_tpl_vars['rows']['0']['contribution_id'] || $this->_tpl_vars['onlinePendingContributionId'] )): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'record_contribution','trigger_value' => "",'target_element_id' => 'recordContribution','target_element_type' => "table-row",'field_type' => 'radio','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'payment_instrument_id','trigger_value' => '4','target_element_id' => 'checkNumber','target_element_type' => "table-row",'field_type' => 'select','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php echo '
<script type="text/javascript">
cj( function( ) {
    var mode   = '; ?>
'<?php echo $this->_tpl_vars['membershipMode']; ?>
'<?php echo ';
    if ( !mode ) {
        // Offline form (mode = false) has the record_contribution checkbox
        cj(\'#record_contribution\').click( function( ) {
            if ( cj(this).attr(\'checked\') ) {
                cj(\'#recordContribution\').show( );
                setPaymentBlock( );
            } else {
                cj(\'#recordContribution\').hide( );
            }
        });
    }
    
    cj(\'#membership_type_id\\\\[1\\\\]\').change( function( ) {
        setPaymentBlock( mode );
    });
});
</script>
'; ?>




<?php if (( $this->_tpl_vars['emailExists'] && $this->_tpl_vars['outBound_option'] != 2 ) || $this->_tpl_vars['context'] == 'standalone'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'send_receipt','trigger_value' => "",'target_element_id' => 'notice','target_element_type' => "table-row",'field_type' => 'radio','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'send_receipt','trigger_value' => "",'target_element_id' => 'fromEmail','target_element_type' => "table-row",'field_type' => 'radio','invert' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php echo '

<script type="text/javascript">

'; ?>
<?php if (! $this->_tpl_vars['membershipMode']): ?><?php echo '
showHideMemberStatus();
function showHideMemberStatus() {
    if ( cj( "#is_override" ).attr(\'checked\' ) ) {
	 cj(\'#memberStatus\').show( );
         cj(\'#memberStatus_show\').hide( );
    } else {
	 cj(\'#memberStatus\').hide( );
         cj(\'#memberStatus_show\').show( );
    }
}
'; ?>
<?php endif; ?>
	
<?php echo '
function setPaymentBlock( mode ) {
    var memType = cj(\'#membership_type_id\\\\[1\\\\]\').val( );
    var isPriceSet = 0;

    if ( cj(\'#price_set_id\').length > 0 && cj(\'#price_set_id\').val() ) {
        isPriceSet = 1;
    }  	
    
    if ( !memType || isPriceSet ) {
        return;
    }
    
    var dataUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/memType','h' => 0), $this);?>
"<?php echo ';
    
    cj.post( dataUrl, {mtype: memType}, function( data ) {
        if ( !mode ) {
            // skip this for test and live modes because contribution type is set automatically
            cj("#contribution_type_id").val( data.contribution_type_id );            
        } 
        cj("#total_amount").val( data.total_amount );
    }, \'json\');    
}

'; ?>

<?php if ($this->_tpl_vars['context'] == 'standalone' && $this->_tpl_vars['outBound_option'] != 2): ?>
<?php echo '
cj( function( ) {
    cj("#contact_1").blur( function( ) {
        checkEmail( );
    } );
    checkEmail( );
});
function checkEmail( ) {
    var contactID = cj("input[name=\'contact_select_id[1]\']").val();
    if ( contactID ) {
        var postUrl = "'; ?>
<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/checkemail','h' => 0), $this);?>
<?php echo '";
        cj.post( postUrl, {contact_id: contactID},
            function ( response ) {
                if ( response ) {
                    cj("#email-receipt").show( );
                    if ( cj("#send_receipt").is(\':checked\') ) {
                        cj("#notice").show( );
                    }
                
                    cj("#email-address").html( response );
                } else {
                    cj("#email-receipt").hide( );
                    cj("#notice").hide( );
                }
            }
        );
    } else {
       cj("#email-receipt").hide( );
       cj("#notice").hide( );
    }
}

function profileCreateCallback( blockNo ) {
    checkEmail( );     			    	    
}
'; ?>

<?php endif; ?>

<?php echo '
   //keep read only always checked.
   cj( function( ) {
      var allowAutoRenew   = '; ?>
'<?php echo $this->_tpl_vars['allowAutoRenew']; ?>
'<?php echo ';
      var alreadyAutoRenew = '; ?>
'<?php echo $this->_tpl_vars['alreadyAutoRenew']; ?>
'<?php echo ';
      if ( allowAutoRenew || alreadyAutoRenew ) {
          cj( "#auto_renew" ).click(function( ) {
              if ( cj(this).attr( \'readonly\' ) ) { 
                 cj(this).attr( \'checked\', true );
              }
          });
       }
    }); 
'; ?>



<?php if ($this->_tpl_vars['membershipMode'] || $this->_tpl_vars['action'] == 2): ?>
<?php echo '

buildAutoRenew( null, null );

function buildAutoRenew( membershipType, processorId ) {
  var mode   = '; ?>
'<?php echo $this->_tpl_vars['membershipMode']; ?>
'<?php echo ';
  var action = '; ?>
'<?php echo $this->_tpl_vars['action']; ?>
'<?php echo ';
  
  //for update lets hide it when not already recurring.
  if ( action == 2 ) {
     //user can\'t cancel auto renew by unchecking.
     if ( cj("#auto_renew").attr( \'checked\' ) ) {
     	cj("#auto_renew").attr( \'readonly\', true );
     } else {
        cj("#autoRenew").hide( );
     }  
  }
  
  //we should do all auto renew for cc memberships.
  if ( !mode ) return; 

  //get the required values in case missing.
  if ( !processorId )  processorId = cj( \'#payment_processor_id\' ).val( );  
  if ( !membershipType ) membershipType = parseInt( cj(\'#membership_type_id\\\\[1\\\\]\').val( ) );
  
  //we don\'t have both required values.
  if ( !processorId || !membershipType ) {
     cj("#auto_renew").attr( \'checked\', false );
     cj("#autoRenew").hide( );
     return;
  }

  var recurProcessors  = '; ?>
<?php echo $this->_tpl_vars['recurProcessor']; ?>
<?php echo ';  
  var autoRenewOptions = '; ?>
<?php echo $this->_tpl_vars['autoRenewOptions']; ?>
<?php echo ';
  var currentOption    = autoRenewOptions[membershipType];
    
  if ( !currentOption || !recurProcessors[processorId] ) {
     cj("#auto_renew").attr( \'checked\', false );
     cj("#autoRenew").hide( );
     return;
  }
  
  if ( currentOption == 1 ) {
     cj("#autoRenew").show( );
     if ( cj("#auto_renew").attr( \'readonly\' ) ) { 
     	cj("#auto_renew").attr(\'checked\', false );	  
	cj("#auto_renew").removeAttr( \'readonly\' );
     }
  } else if ( currentOption == 2 ) {
     cj("#autoRenew").show( );
     cj("#auto_renew").attr( \'checked\', true );
     cj("#auto_renew").attr( \'readonly\', true );
  } else {
     cj("#auto_renew").attr( \'checked\', false );
     cj("#autoRenew").hide( );
  }

  //play w/ receipt option.
  if ( cj("#auto_renew").attr( \'checked\' ) ) {
     cj("#notice").hide( );
     cj("#send_receipt").attr( \'checked\', false );
     cj("#send-receipt").hide( );
  } else {
     cj("#send-receipt").show( );
     if ( cj("#send_receipt").attr( \'checked\' ) ) { 
        cj("#notice").show( );
     }
  }
}
'; ?>

<?php endif; ?>

<?php echo '
function buildReceiptANDNotice( ) {
   if ( cj("#auto_renew").attr( \'checked\' ) ) {
       cj("#notice").hide( );
       cj("#send-receipt").hide( );
   } else {
     cj("#send-receipt").show( );
     if ( cj("#send_receipt").attr( \'checked\' ) ) {
       cj("#notice").show( );
     }
   }
}

var customDataType = \''; ?>
<?php echo $this->_tpl_vars['customDataType']; ?>
<?php echo '\';

// load form during form rule.
'; ?>
<?php if ($this->_tpl_vars['buildPriceSet']): ?><?php echo '
    cj( "#totalAmountORPriceSet" ).hide( );
    cj( "#mem_type_id" ).hide( );
    cj(\'#total_amount\').attr("readonly", true);
'; ?>
<?php endif; ?><?php echo '

function buildAmount( priceSetId ) {
  if ( !priceSetId ) priceSetId = cj("#price_set_id").val( );
  
  var fname = \'#priceset\';
  if ( !priceSetId ) {
      cj(\'#membership_type_id\\\\[1\\\\]\').val(0);
      buildCustomData(customDataType, \'null\' );

      // hide price set fields.
      cj( fname ).hide( );

      // show/hide price set amount and total amount.
      cj( "#mem_type_id").show( );
      cj( "#totalAmountORPriceSet" ).show( );
      cj(\'#total_amount\').removeAttr("readonly"); 

      '; ?>
<?php if ($this->_tpl_vars['allowAutoRenew']): ?><?php echo '   
          cj(\'#autoRenew\').hide();
          var autoRenew = cj("#auto_renew");
          autoRenew.removeAttr( \'readOnly\' );
          autoRenew.removeAttr( \'checked\' );
       '; ?>
<?php endif; ?><?php echo '
      return;
  }

  cj( "#total_amount" ).val( \'\' );
  cj(\'#total_amount\').attr("readonly", true);

  var dataUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('h' => 0,'q' => 'snippet=4'), $this);?>
"<?php echo ' + \'&priceSetId=\' + priceSetId;
  
  var response = cj.ajax({
		         url: dataUrl,
                         async: false
                 }).responseText;
  
  cj( fname ).show( ).html( response );
  // freeze total amount text field.
 
  cj( "#totalAmountORPriceSet" ).hide( );
  cj( "#mem_type_id" ).hide( );
}

var lastMembershipTypes = new Array;
var optionsMembershipTypes = new Array;

// function to load custom data for selected membership types through priceset
function processMembershipPriceset( membershipValues, autoRenewOption, reload ) {
    var currentMembershipType = new Array;
    var count = 0;
    var loadCustomData = 0;
    if ( membershipValues ) {
        optionsMembershipTypes = membershipValues;
    }

    if ( reload ) {
        lastMembershipTypes = new Array;
        '; ?>
<?php if ($this->_tpl_vars['allowAutoRenew']): ?><?php echo '   
        cj(\'#autoRenew\').hide();
        var autoRenew = cj("#auto_renew");
        autoRenew.removeAttr( \'readOnly\' );
        autoRenew.removeAttr( \'checked\' );
        if ( autoRenewOption == 1 ) {
            cj(\'#autoRenew\').show();
        } else if ( autoRenewOption == 2 ) {
            autoRenew.attr( \'readOnly\', true );
            autoRenew.attr( \'checked\',  true );
            cj(\'#autoRenew\').show();
        }
        '; ?>
<?php endif; ?><?php echo '
    }
    
    cj("input,#priceset select,#priceset").each(function () {
           if ( cj(this).attr(\'price\') ) {
             switch( cj(this).attr(\'type\') ) {

               case \'checkbox\':
	         if ( cj(this).attr(\'checked\') ) {
                     eval( \'var option = \' + cj(this).attr(\'price\') ) ;
                     var ele = option[0];
		     var memTypeId = optionsMembershipTypes[ele];
		     if ( memTypeId && cj.inArray(optionsMembershipTypes[ele], currentMembershipType) == -1 ) {
		       currentMembershipType[count] = memTypeId;
		       count++;
		     }
                 }
		 if ( reload ) { 
		   cj(this).click( function( ) {
		     processMembershipPriceset();
		   });
		 }  
               break;

               case \'radio\':
                 if ( cj(this).attr(\'checked\') && cj(this).val() ) {
		   var memTypeId = optionsMembershipTypes[cj(this).val()];
                   if ( memTypeId && cj.inArray(memTypeId, currentMembershipType) == -1 ) {
                       currentMembershipType[count] = memTypeId;
		       count++;
		   }
                 }
                 if ( reload ) { 
		   cj(this).click( function( ) {
		     processMembershipPriceset();
		   });
		 }
               break;

               case \'select-one\':
	         if ( cj(this).val( ) ) {
                   var memTypeId = optionsMembershipTypes[cj(this).val()];
                   if ( memTypeId && cj.inArray(memTypeId, currentMembershipType) == -1 ) {
                       currentMembershipType[count] = memTypeId;
		       count++;
		   }
                 } 
                 if ( reload ) { 
		   cj(this).change( function( ) {
		     processMembershipPriceset();
		   });
		 }
	       break;
	     }
	   }
    });

    for( i in currentMembershipType ) {
        if ( cj.inArray(currentMembershipType[i], lastMembershipTypes) == -1 ) {
            loadCustomData = 1;
            break;
        }
    }

    if ( !loadCustomData ) {
        for( i in lastMembershipTypes) { 
            if ( cj.inArray(lastMembershipTypes[i], currentMembershipType) == -1 ) {
                loadCustomData = 1;
                break;
            }
        }  
    }
    lastMembershipTypes = currentMembershipType;

    // load custom data only if change in membership type selection
    if ( !loadCustomData ) {
        return;   
    }    

    subTypeNames = currentMembershipType.join(\',\');
    if ( subTypeNames.length < 1 ) {
        subTypeNames = \'null\';
    }

    buildCustomData( customDataType, subTypeNames );
}

function enableAmountSection( setContributionType ) {
  if ( !cj(\'#record_contribution\').attr(\'checked\') ) {
    cj(\'#record_contribution\').click( );
    cj(\'#recordContribution\').show( );
  }
  if ( setContributionType ) {
    cj(\'#contribution_type_id\').val(setContributionType);
  }
}	 
</script>
'; ?>

<?php endif; ?>  
<?php endif; ?>