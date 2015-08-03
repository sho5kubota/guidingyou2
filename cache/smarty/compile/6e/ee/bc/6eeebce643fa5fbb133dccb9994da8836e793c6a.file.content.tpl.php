<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:14:47
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213944177755bf22f716c812-75994138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eeebce643fa5fbb133dccb9994da8836e793c6a' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/content.tpl',
      1 => 1438586511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213944177755bf22f716c812-75994138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf22f7186014_80017022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf22f7186014_80017022')) {function content_55bf22f7186014_80017022($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
