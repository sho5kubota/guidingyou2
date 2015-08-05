<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 15:54:08
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views//templates/front/products/textarea_lang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187427225955c06fa01ca6c7-46615236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70f1ef214515f9faa01427cce818148903d69bdb' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views//templates/front/products/textarea_lang.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187427225955c06fa01ca6c7-46615236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'input_name' => 0,
    'default_row' => 0,
    'autosize_js' => 0,
    'class' => 0,
    'input_value' => 0,
    'max' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c06fa02594c0_66838879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06fa02594c0_66838879')) {function content_55c06fa02594c0_66838879($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
">
	<div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		<textarea
			id="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"
			name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"
			<?php if (isset($_smarty_tpl->tpl_vars['default_row']->value)&&$_smarty_tpl->tpl_vars['default_row']->value>0) {?> row="<?php echo $_smarty_tpl->tpl_vars['default_row']->value;?>
" <?php }?>
			class="<?php if (isset($_smarty_tpl->tpl_vars['autosize_js']->value)) {?>textarea-autosize<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
<?php }?>"><?php if (isset($_smarty_tpl->tpl_vars['input_value']->value[$_smarty_tpl->tpl_vars['language']->value['id_lang']])) {?><?php echo smarty_modifier_htmlentitiesUTF8($_smarty_tpl->tpl_vars['input_value']->value[$_smarty_tpl->tpl_vars['language']->value['id_lang']]);?>
<?php }?></textarea>
	</div>

</div>
<span class="counter" max="<?php if (isset($_smarty_tpl->tpl_vars['max']->value)) {?><?php echo $_smarty_tpl->tpl_vars['max']->value;?>
<?php } else { ?>none<?php }?>"></span>
<?php } ?>
<?php }} ?>
