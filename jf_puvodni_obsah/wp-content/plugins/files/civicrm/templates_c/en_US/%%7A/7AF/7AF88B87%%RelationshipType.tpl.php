<?php /* Smarty version 2.6.26, created on 2012-02-12 13:36:56
         compiled from CRM/Admin/Form/RelationshipType.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Admin/Form/RelationshipType.tpl', 27, false),)), $this); ?>
<h3><?php if ($this->_tpl_vars['action'] == 1): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New Relationship Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php elseif ($this->_tpl_vars['action'] == 2): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Relationship Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php elseif ($this->_tpl_vars['action'] == 8): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete Relationship Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View Relationship Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></h3>
<div class="crm-block crm-form-block crm-relationship-type-form-block">
    <?php if ($this->_tpl_vars['action'] != 4): ?>         <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <?php else: ?>
        <div class="crm-submit-buttons"><?php echo $this->_tpl_vars['form']['done']['html']; ?>
</div>
    <?php endif; ?>
	<?php if ($this->_tpl_vars['action'] == 8): ?>
      <div class="messages status">
          <div class="icon inform-icon"></div>     
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>WARNING: Deleting this option will result in the loss of all Relationship records of this type.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This may mean the loss of a substantial amount of data, and the action cannot be undone.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Do you want to continue?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         
      
      </div>
     <?php else: ?>
	    <table class="form-layout-compressed">
            <tr class="crm-relationship-type-form-block-label_a_b">
                <td class="label"><?php echo $this->_tpl_vars['form']['label_a_b']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['label_a_b']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Label for the relationship from Contact A to Contact B. EXAMPLE: Contact A is 'Parent of' Contact B.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
            <tr class="crm-relationship-type-form-block-label_b_a">
                <td class="label"><?php echo $this->_tpl_vars['form']['label_b_a']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['label_b_a']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Label for the relationship from Contact B to Contact A. EXAMPLE: Contact B is 'Child of' Contact A. You may leave this blank for relationships where the name is the same in both directions (e.g. Spouse).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
            <tr class="crm-relationship-type-form-block-contact_types_a">
                <td class="label"><?php echo $this->_tpl_vars['form']['contact_types_a']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['contact_types_a']['html']; ?>
</td>
            </tr>
            <tr class="crm-relationship-type-form-block-contact_types_b">
                <td class="label"><?php echo $this->_tpl_vars['form']['contact_types_b']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['contact_types_b']['html']; ?>
</td>
            </tr>
            <tr class="crm-relationship-type-form-block-description">
                <td class="label"><?php echo $this->_tpl_vars['form']['description']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['description']['html']; ?>
</td>
            </tr>
            <tr class="crm-relationship-type-form-block-is_active">
                <td class="label"><?php echo $this->_tpl_vars['form']['is_active']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['is_active']['html']; ?>
</td>
            </tr>
        </table>
    <?php endif; ?>
	<?php if ($this->_tpl_vars['action'] != 4): ?>             <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
        <?php else: ?>
            <div class="crm-submit-buttons"><?php echo $this->_tpl_vars['form']['done']['html']; ?>
</div>
        <?php endif; ?>
        
</fieldset>
</div>