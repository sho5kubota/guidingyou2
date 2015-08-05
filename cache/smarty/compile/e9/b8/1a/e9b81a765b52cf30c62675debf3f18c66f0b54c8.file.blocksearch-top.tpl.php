<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:14:09
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blocksearch/blocksearch-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100777683055c08261c54d04-35501068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b81a765b52cf30c62675debf3f18c66f0b54c8' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blocksearch/blocksearch-top.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100777683055c08261c54d04-35501068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'new_categories' => 0,
    'category' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c08261cd8243_85960568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c08261cd8243_85960568')) {function content_55c08261cd8243_85960568($_smarty_tpl) {?>
<!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
<div><h2>Search Guides and Activities</h2>
	<div class="cclose" style="display:inline-block;   float:right; cursor:pointer; color:#000;"><i class="fa fa-times fa-lg"></i></i></div>
	</div><div class="clearfix"></div>
	<form id="searchbox" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />

		<!-- Location Input -->
		<input id="search_query_topmodal" class="search_query" type="text" name="search_loc" placeholder="Country and City"  autocomplete="off"
		<?php if (!empty(Tools::getValue('search_original'))) {?>
			value="<?php echo Tools::getValue('search_original');?>
" 
		<?php }?>
		<?php if (empty(Tools::getValue('search_original'))) {?>

			value="<?php echo Tools::getValue('search_loc');?>
" 
		<?php }?>
		/>

		<!-- CATEGORY -->
		<select  class="search_query search_query_top" name="search_cat" style="-webkit-appearance: none;-moz-appearance: none;appearance: none; color:#bbb">
			<option value="0">Guide and Activity</option>
				<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
					<optgroup label="<?php echo $_smarty_tpl->tpl_vars['category']->value['name_main'];?>
">
					<?php if (count($_smarty_tpl->tpl_vars['category']->value['child'])>0) {?>
						<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
							<option  
								<?php if (Tools::getValue('search_cat')==$_smarty_tpl->tpl_vars['cat']->value['id_category']) {?>
									selected="selected"
								<?php }?>
								value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>

							</option>
						<?php } ?>
					<?php }?>
					</optgroup>
				<?php } ?>
		</select>

		<!-- FREE WORD -->
		<input class="search_query search_query_top" type="text"  name="search_words" placeholder="Free word" />

		<input type='submit' name='submitmodal' style='visibility:hidden' /> 
	
	</form>
	

</div>
<!-- /Block search module TOP --><?php }} ?>
