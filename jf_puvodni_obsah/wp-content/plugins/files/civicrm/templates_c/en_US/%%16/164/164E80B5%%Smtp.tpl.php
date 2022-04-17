<?php /* Smarty version 2.6.26, created on 2012-02-11 10:11:28
         compiled from CRM/Admin/Form/Setting/Smtp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Admin/Form/Setting/Smtp.tpl', 28, false),)), $this); ?>
<div class="crm-block crm-form-block crm-smtp-form-block">
<div id="help">
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>CiviCRM offers several options to send emails. The default option should work fine on linux systems. If you are using windows, you probably need to enter settings for your SMTP/Sendmail server. You can send a test email to check your settings by clicking "Save and Send Test Email". If you're unsure of the correct values, check with your system administrator, ISP or hosting provider. If you do not want users to send outbound mail from CiviCRM, select "Disable Outbound Email". NOTE: If you disable outbound email, and you are using Online Contribution pages or online Event Registration - you will need to disable automated receipts and registration confirmations.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
     <table class="form-layout-compressed">
           <tr class="crm-smtp-form-block-outBound_option">
              <td class="label"><?php echo $this->_tpl_vars['form']['outBound_option']['label']; ?>
</td>
              <td><?php echo $this->_tpl_vars['form']['outBound_option']['html']; ?>
</td>
           </tr>
        </table>
            <div id="bySMTP" class="mailoption">
            <fieldset>
                <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SMTP Configuration<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                <table class="form-layout-compressed">
                    <tr class="crm-smtp-form-block-smtpServer">
                       <td class="label"><?php echo $this->_tpl_vars['form']['smtpServer']['label']; ?>
</td>
                       <td><?php echo $this->_tpl_vars['form']['smtpServer']['html']; ?>
<br  />
                            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the SMTP server (machine) name. EXAMPLE: smtp.example.com<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                       </td>
                    </tr>
                    <tr class="crm-smtp-form-block-smtpPort">
                       <td class="label"><?php echo $this->_tpl_vars['form']['smtpPort']['label']; ?>
</td>
                       <td><?php echo $this->_tpl_vars['form']['smtpPort']['html']; ?>
<br />
                           <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The standard SMTP port is 25. You should only change that value if your SMTP server is running on a non-standard port.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                       </td>
                    </tr>
                    <tr class="crm-smtp-form-block-smtpAuth">
                       <td class="label"><?php echo $this->_tpl_vars['form']['smtpAuth']['label']; ?>
</td>
                       <td><?php echo $this->_tpl_vars['form']['smtpAuth']['html']; ?>
<br />
                         <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Does your SMTP server require authentication (user name + password)?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                       </td>
                    </tr>
                    <tr class="crm-smtp-form-block-smtpUsername"> 
                       <td class="label"><?php echo $this->_tpl_vars['form']['smtpUsername']['label']; ?>
</td>
                       <td><?php echo $this->_tpl_vars['form']['smtpUsername']['html']; ?>
</td>
                    </tr>
                    <tr class="crm-smtp-form-block-smtpPassword"> 
                       <td class="label"><?php echo $this->_tpl_vars['form']['smtpPassword']['label']; ?>
</td>
                       <td><?php echo $this->_tpl_vars['form']['smtpPassword']['html']; ?>
<br />                  
                           <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If your SMTP server requires authentication, enter your Username and Password here.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                       </td>
                    </tr>
                </table>
           </fieldset>
        </div>
        <div id="bySendmail" class="mailoption">
            <fieldset>
                <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Sendmail Configuration<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                   <table class="form-layout-compressed">
                     <tr class="crm-smtp-form-block-sendmail_path">           
                        <td class="label"><?php echo $this->_tpl_vars['form']['sendmail_path']['label']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['form']['sendmail_path']['html']; ?>
<br />
                            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the Sendmail Path. EXAMPLE: /usr/sbin/sendmail<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                        </td>
                     </tr>
                     <tr class="crm-smtp-form-block-sendmail_args"> 
                        <td class="label"><?php echo $this->_tpl_vars['form']['sendmail_args']['label']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['form']['sendmail_args']['html']; ?>
</td>
                     </tr>
                    </table>
            </fieldset>
        </div>
        <div class="spacer"></div>
        <div class="crm-submit-buttons">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <span class="place-left">&nbsp;</span>
            <span class="crm-button crm-button-type-next crm-button_qf_Smtp_refresh_test"><?php echo $this->_tpl_vars['form']['_qf_Smtp_refresh_test']['html']; ?>
</span>
        </div>
</div>    

<?php echo '
<script type="text/javascript">
    cj( function( ) {
        showHideMailOptions( cj("input[name=\'outBound_option\']:checked").val( ) ) ;
        
        function showHideMailOptions( value ) {
            switch( value ) {
              case "0":
                cj("#bySMTP").show( );
                cj("#bySendmail").hide( );
                cj("#_qf_Smtp_refresh_test").show( );
              break;
              case "1":
                cj("#bySMTP").hide( );
                cj("#bySendmail").show( );
                cj("#_qf_Smtp_refresh_test").show( );
              break;
              case "3":
                cj(\'.mailoption\').hide();
                cj("#_qf_Smtp_refresh_test").show( );
              break;
              default:
                cj("#bySMTP").hide( );
                cj("#bySendmail").hide( );
                cj("#_qf_Smtp_refresh_test").hide( );
            }
        }
        
        cj("input[name=\'outBound_option\']").click( function( ) {
            showHideMailOptions( cj(this).val( ) );
        });
    });
    
</script>
'; ?>
