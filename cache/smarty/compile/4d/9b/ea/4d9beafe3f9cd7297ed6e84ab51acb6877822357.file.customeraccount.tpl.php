<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 16:12:30
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/hook/customeraccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108279500355c073ee261317-21844140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d9beafe3f9cd7297ed6e84ab51acb6877822357' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/hook/customeraccount.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108279500355c073ee261317-21844140',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mysellerurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c073ee276fd7_27797133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c073ee276fd7_27797133')) {function content_55c073ee276fd7_27797133($_smarty_tpl) {?><li>
  <a href="<?php echo $_smarty_tpl->tpl_vars['mysellerurl']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
    <i class="icon-cog"></i>
    <span><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
  </a>
</li>
<?php }} ?>
