<?php /* Smarty version 2.6.26, created on 2012-02-11 09:18:09
         compiled from CRM/common/action.tpl */ ?>
<?php echo '
<script type="text/javascript">
cj(\'#crm-container\')
    .live(\'click\', function(event) {
        if (cj(event.target).is(\'.btn-slide\')) {
            cj(event.target).children().show();
            cj(event.target).addClass(\'btn-slide-active\');
        } else {
            cj(\'.btn-slide .panel\').hide();
            cj(\'.btn-slide-active\').removeClass(\'btn-slide-active\');	
        } 
});
</script>
'; ?>
