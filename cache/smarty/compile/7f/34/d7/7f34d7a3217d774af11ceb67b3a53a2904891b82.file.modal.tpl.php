<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:14:47
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109529241355bf22f74ffd21-34160775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f34d7a3217d774af11ceb67b3a53a2904891b82' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1438586511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109529241355bf22f74ffd21-34160775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf22f7507399_13011042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf22f7507399_13011042')) {function content_55bf22f7507399_13011042($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div><?php }} ?>
