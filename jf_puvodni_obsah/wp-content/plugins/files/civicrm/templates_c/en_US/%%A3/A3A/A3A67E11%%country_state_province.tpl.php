<?php /* Smarty version 2.6.26, created on 2012-02-11 09:23:34
         compiled from CRM/Contact/Form/Edit/Address/country_state_province.tpl */ ?>
<tr><td colspan="3" style="padding:0;">
<table style="border:none;">
<tr>
   <?php if (! empty ( $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['country_id'] )): ?>
     <td>
        <?php echo $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['country_id']['label']; ?>
<br />
        <?php echo $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['country_id']['html']; ?>

     </td>
   <?php endif; ?>
   <?php if (! empty ( $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['state_province_id'] )): ?> 
     <td>
        <?php echo $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['state_province_id']['label']; ?>
<br />
        <?php echo $this->_tpl_vars['form']['address'][$this->_tpl_vars['blockId']]['state_province_id']['html']; ?>

     </td>
   <?php endif; ?>
   <td colspan="2">&nbsp;&nbsp;</td>
</tr>
</table>
</td></tr>