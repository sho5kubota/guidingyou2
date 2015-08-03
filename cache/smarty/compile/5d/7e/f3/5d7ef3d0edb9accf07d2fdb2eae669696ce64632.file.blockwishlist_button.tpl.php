<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:13
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockwishlist/blockwishlist_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200671977455bf2479e4d930-39898968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d7ef3d0edb9accf07d2fdb2eae669696ce64632' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockwishlist/blockwishlist_button.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200671977455bf2479e4d930-39898968',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf2479e7d259_58620839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf2479e7d259_58620839')) {function content_55bf2479e7d259_58620839($_smarty_tpl) {?>

<div class="wishlist">
	<a class="addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" href="#" rel="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
', false, 1); return false;">
		<?php echo smartyTranslate(array('s'=>'','mod'=>'blockwishlist'),$_smarty_tpl);?>

	</a>
</div><?php }} ?>
