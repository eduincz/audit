<?php /* Smarty version 2.6.26, created on 2012-02-11 10:09:46
         compiled from CRM/common/showHide.tpl */ ?>
 <script type="text/javascript">
    var showBlocks = new Array(<?php echo $this->_tpl_vars['showBlocks']; ?>
);
    var hideBlocks = new Array(<?php echo $this->_tpl_vars['hideBlocks']; ?>
);

    on_load_init_blocks( showBlocks, hideBlocks<?php if ($this->_tpl_vars['elemType'] == 'table-row'): ?>, 'table-row'<?php endif; ?> );
 </script>