<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 13:48:02
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155396542555c05212c5a5c4-40905331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fb26a8f887b8922025b2198049e27ec5ce07ae1' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1438586511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155396542555c05212c5a5c4-40905331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c05212ca4475_89439687',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c05212ca4475_89439687')) {function content_55c05212ca4475_89439687($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)) {?> onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){return true;}else{event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delete">
	<i class="icon-trash"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
