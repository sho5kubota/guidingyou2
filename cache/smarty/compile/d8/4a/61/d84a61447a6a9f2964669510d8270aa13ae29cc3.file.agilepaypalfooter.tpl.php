<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilepaypal/agilepaypalfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81774158655bf247a9d7978-40758588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd84a61447a6a9f2964669510d8270aa13ae29cc3' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilepaypal/agilepaypalfooter.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81774158655bf247a9d7978-40758588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'force_summary' => 0,
    'hide_add2cart4membership' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247a9e7318_06906700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247a9e7318_06906700')) {function content_55bf247a9e7318_06906700($_smarty_tpl) {?><script type="text/javascript">
    var force_summary = <?php echo $_smarty_tpl->tpl_vars['force_summary']->value;?>
;
	var hide_add2cart4membership = <?php echo $_smarty_tpl->tpl_vars['hide_add2cart4membership']->value;?>
;
	$(document).ready(function() {
		if(force_summary == 1)
		{
			if ($("p#cart-buttons a.exclusive") != "undefined") {
				var oldhref = $("p#cart-buttons a.exclusive").attr("href");
				if(oldhref != null)$("p#cart-buttons a.exclusive").attr("href", oldhref.replace("step=1","step=0"));
			}
		}
		/** _agile_ hide delivery address _agile_ **/
		$(".order_delivery").hide(); 
		/** _agile_ hide add to cart buttons _agile_ **/
		if(hide_add2cart4membership)
		{
			$(".button.ajax_add_to_cart_button").hide(); 
		}

	});  
</script>
<?php }} ?>
