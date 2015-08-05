<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 15:54:07
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views//templates/front/products/product_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94187404555c06f9f9f8560-88072885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48f789f0528bff13e3d28d460a9ca4fc85fdb155' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views//templates/front/products/product_nav.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94187404555c06f9f9f8560-88072885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_menu' => 0,
    'id_product' => 0,
    'product_menus' => 0,
    'menu' => 0,
    'token' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c06f9fa5ff59_89056126',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06f9fa5ff59_89056126')) {function content_55c06f9fa5ff59_89056126($_smarty_tpl) {?>﻿<script type="text/javascript">
	var currentmenuid = <?php echo $_smarty_tpl->tpl_vars['product_menu']->value;?>
;
</script>

<?php if ($_smarty_tpl->tpl_vars['id_product']->value==0) {?>
<script type="text/javascript">
$(document).ready(function() {
	$('a#link-Images').on('click', function() {
		alert("<?php echo smartyTranslate(array('s'=>'Please save the product information first.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
");
	});

	$('a#link-Images').attr('onclick', 'return false;');

	$('a#link-真').on('click', function() {
		alert("<?php echo smartyTranslate(array('s'=>'Please save the product information first.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
");
	});

	$('a#link-真').attr('onclick', 'return false;');
});
</script>
<?php }?>


	<div class="productTabs agile-col-md-3 agile-col-lg-2 agile-col-xl-2">
		<div class="list-group">
			<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
				<a class="list-group-item <?php if ($_smarty_tpl->tpl_vars['product_menu']->value==$_smarty_tpl->tpl_vars['menu']->value['id']) {?>active<?php }?>" id="link-<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
"
				href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerproductdetail',array('id_product'=>$_smarty_tpl->tpl_vars['id_product']->value,'product_menu'=>$_smarty_tpl->tpl_vars['menu']->value['id'],'token'=>$_smarty_tpl->tpl_vars['token']->value),true);?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</a>
			<?php } ?>
		</div>
	</div>
<?php }} ?>
