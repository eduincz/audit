<?php /* Smarty version 2.6.26, created on 2012-02-12 13:38:04
         compiled from CRM/Contact/Form/Edit/Organization.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'crmReplace', 'CRM/Contact/Form/Edit/Organization.tpl', 30, false),)), $this); ?>
<table class="form-layout-compressed">
    <tr>
       <td><?php echo $this->_tpl_vars['form']['organization_name']['label']; ?>
<br/>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['organization_name']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>

       </td>

       <td><?php echo $this->_tpl_vars['form']['legal_name']['label']; ?>
<br/>
       <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['legal_name']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>
</td>

       <td><?php echo $this->_tpl_vars['form']['nick_name']['label']; ?>
<br/>
       <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['nick_name']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>
</td>

       <td><?php echo $this->_tpl_vars['form']['sic_code']['label']; ?>
<br/>
       <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['sic_code']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>
</td>

       <td><?php if ($this->_tpl_vars['action'] == 1 && $this->_tpl_vars['contactSubType']): ?>&nbsp;<?php else: ?>
              <?php echo $this->_tpl_vars['form']['contact_sub_type']['label']; ?>
<br />
              <?php echo $this->_tpl_vars['form']['contact_sub_type']['html']; ?>

           <?php endif; ?>
       </td>
     </tr>
</table>