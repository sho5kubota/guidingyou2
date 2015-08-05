<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 13:43:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookblocklocation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92961179855c050f2415522-02201883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd01611db449f296e9db8e78f91a3736bcdc4c743' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hookblocklocation.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92961179855c050f2415522-02201883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'location_level' => 0,
    'link' => 0,
    'location_custom_name' => 0,
    'seller_locations4block' => 0,
    'asp_location_block_style' => 0,
    'location' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c050f24f8235_42870854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c050f24f8235_42870854')) {function content_55c050f24f8235_42870854($_smarty_tpl) {?>

<script language="javascript" type="text/javascript">
<!--
    function shopbylocation_block_selectedchanged() {
        var url = $("#shop_by_location_list").val();
        window.location.href = url;
    }
-->
</script>

<div id="shopbylocation_block_left" class="block blockmanufacturer">
	<?php if ($_smarty_tpl->tpl_vars['location_level']->value=="country") {?>
		<p class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by Country','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by Country','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a></p>
	<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="state") {?>
		<p class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by State','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by State','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a></p>
	<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="city") {?>
		<p class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by City','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by City','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a></p>
	<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="sellertype") {?>
		<p class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by Seller Type','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by Seller Type','mod'=>'agilemultiplehop'),$_smarty_tpl);?>
</a></p>
	<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="custom") {?>
		<p class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['location_custom_name']->value;?>
"><?php echo smartyTranslate(array('s'=>'Shop by','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['location_custom_name']->value;?>
</a></p>
	<?php }?>
	<div class="block_content list-block">
        <?php if ($_smarty_tpl->tpl_vars['seller_locations4block']->value!==false) {?>
			<?php if ($_smarty_tpl->tpl_vars['asp_location_block_style']->value==1) {?>
				<div class="form-group selector1">
					<select name="shop_by_location_list" id="shop_by_location_list"  class="form-control" onchange=" shopbylocation_block_selectedchanged()">
						<option value="0"><?php echo smartyTranslate(array('s'=>'Please select','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</option>
						<?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seller_locations4block']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value) {
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink($_smarty_tpl->tpl_vars['location']->value['id'],$_smarty_tpl->tpl_vars['location_level']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</div>
			<?php } else { ?>
				<?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seller_locations4block']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value) {
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
					<ul class="block_content">
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink($_smarty_tpl->tpl_vars['location']->value['id'],$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
</a></li>
					</ul>
				<?php } ?>

			<?php }?>
        <?php } else { ?>
	        <p><?php echo smartyTranslate(array('s'=>'No seller found in this location','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</p>
        <?php }?>

	</div>
</div>
<!-- /MODULE Agile Sellers Products -->

<?php }} ?>
