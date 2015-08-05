<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:14:06
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138867755855c0825e76b502-87791809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c626d8735f953a6b528f56a9bf1534623e533e20' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookheader.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138867755855c0825e76b502-87791809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header_logo_mode' => 0,
    'base_dir_default' => 0,
    'base_dir' => 0,
    'HOOK_SELLER_HEADER_LOGO' => 0,
    'seller_logo_url' => 0,
    'id_shop_owner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c0825e78ba69_52911026',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0825e78ba69_52911026')) {function content_55c0825e78ba69_52911026($_smarty_tpl) {?><script language="javascript" type="text/javascript">
var header_logo_mode = <?php echo $_smarty_tpl->tpl_vars['header_logo_mode']->value;?>
;
var base_dir_default = "<?php echo $_smarty_tpl->tpl_vars['base_dir_default']->value;?>
";
var base_dir = "<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
";
var HOOK_SELLER_HEADER_LOGO = '<?php echo $_smarty_tpl->tpl_vars['HOOK_SELLER_HEADER_LOGO']->value;?>
';
var seller_logo_url = "<?php echo $_smarty_tpl->tpl_vars['seller_logo_url']->value;?>
";
var id_shop_owner = <?php echo $_smarty_tpl->tpl_vars['id_shop_owner']->value;?>
;

$('document').ready(function() {
	var seller_header_logo_id = $("a#seller_header_logo").attr("id");
	/** _agile_ alert(seller_header_logo_id); _agile_ **/

	var tag = $("#header_logo");
	if(!tag || !tag.is("a"))tag = $("#header_logo a");

	/** _agile_ main store logo only _agile_ **/
	if(header_logo_mode ==0)
	{
		tag.attr("href", base_dir_default);
	}
	/** _agile_ seller logo only _agile_ **/
	if(header_logo_mode ==1)
	{
		if(id_shop_owner>0)
		{
			tag.html('<img src="' + seller_logo_url + '" height="60">');
			tag.attr("href", base_dir);
		}
	}

	/** _agile_ both main store logo and seller logo _agile_ **/
	if(header_logo_mode ==2)
	{
		tag.attr("href", base_dir_default);
		/** _agile_ if HOOK is not found _agile_ **/
		if(seller_header_logo_id != 'seller_header_logo')
			$(HOOK_SELLER_HEADER_LOGO).insertAfter(tag);
	}
});
</script>
<?php }} ?>
