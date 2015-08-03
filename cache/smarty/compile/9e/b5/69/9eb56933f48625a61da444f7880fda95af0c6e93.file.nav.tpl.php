<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:15
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockcontact/nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32639001555bf247bdbfae3-66253861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9eb56933f48625a61da444f7880fda95af0c6e93' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/modules/blockcontact/nav.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32639001555bf247bdbfae3-66253861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'telnumber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247bdf42c4_55332817',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247bdf42c4_55332817')) {function content_55bf247bdf42c4_55332817($_smarty_tpl) {?>
<div id="contact-link">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Contact Us','mod'=>'blockcontact'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Contact us','mod'=>'blockcontact'),$_smarty_tpl);?>
</a>
</div>
<?php if ($_smarty_tpl->tpl_vars['telnumber']->value) {?>
	<span class="shop-phone">
		<i class="icon-phone"></i><?php echo smartyTranslate(array('s'=>'Call us now:','mod'=>'blockcontact'),$_smarty_tpl);?>
 <strong><?php echo $_smarty_tpl->tpl_vars['telnumber']->value;?>
</strong>
	</span>
<?php }?><?php }} ?>
