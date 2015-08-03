<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hometabcontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168925617655bf247a0d0534-04277502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ea8aebd69d706826861e316beb8a20d6e38157f' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleshop/views/templates/hook/hometabcontent.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168925617655bf247a0d0534-04277502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'location_level' => 0,
    'location_custom_name' => 0,
    'asp_sellers' => 0,
    'asc_seller' => 0,
    'seller_locations4block' => 0,
    'location' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247a2075d8_35995685',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247a2075d8_35995685')) {function content_55bf247a2075d8_35995685($_smarty_tpl) {?>
<ul id="shopbysellerlocation" class="block products_block clearfix tab-pane">
	<table width="100%">
	<tr>
		<td width="15%">
			<h4 class="title_block"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAgileSellersLink('all');?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by Seller','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by Seller','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a></h4>
		</td>
		<td width="15%">
			<h4 class="title_block">
				<?php if ($_smarty_tpl->tpl_vars['location_level']->value=="country") {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by Country','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by Country','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="state") {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by State','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by State','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="city") {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by City','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by City','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="sellertype") {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by Seller Type','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Shop by Seller Type','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</a>
				<?php } elseif ($_smarty_tpl->tpl_vars['location_level']->value=="custom") {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink('',$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Shop by','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['location_custom_name']->value;?>
"><?php echo smartyTranslate(array('s'=>'Shop by','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['location_custom_name']->value;?>
</a>
				<?php }?>
			</h4>
		</td>
	</tr>
	<tr>
		<td valign="top" width="15%">
			<div class="block_content list-block">
			<?php if ($_smarty_tpl->tpl_vars['asp_sellers']->value!==false) {?>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['asc_seller'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['asc_seller']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asp_sellers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['asc_seller']->key => $_smarty_tpl->tpl_vars['asc_seller']->value) {
$_smarty_tpl->tpl_vars['asc_seller']->_loop = true;
?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAgileSellerLink($_smarty_tpl->tpl_vars['asc_seller']->value['id_seller'],$_smarty_tpl->tpl_vars['asc_seller']->value['company']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['asc_seller']->value['company'];?>
"><?php echo $_smarty_tpl->tpl_vars['asc_seller']->value['company'];?>
</a></li>
					<?php } ?>
				</ul>
			<?php } else { ?>
				<p><?php echo smartyTranslate(array('s'=>'No sellers at this time','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</p>
			<?php }?>
			</div>
		</td>
		<td valign="top" width="15%">
			<div class="block_content list-block">
				<?php if ($_smarty_tpl->tpl_vars['seller_locations4block']->value!==false) {?>
					<ul class="block_content">
					<?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['location']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['seller_locations4block']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value) {
$_smarty_tpl->tpl_vars['location']->_loop = true;
?>
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getSellerLocationLink($_smarty_tpl->tpl_vars['location']->value['id'],$_smarty_tpl->tpl_vars['location_level']->value);?>
" title="<?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
</a></li>
					<?php } ?>
					</ul>
				<?php } else { ?>
					<p><?php echo smartyTranslate(array('s'=>'No seller found in this location','mod'=>'agilemultipleshop'),$_smarty_tpl);?>
</p>
				<?php }?>
			</div>
		</td>
	</tr>
	</table>
</ul>
<?php }} ?>
