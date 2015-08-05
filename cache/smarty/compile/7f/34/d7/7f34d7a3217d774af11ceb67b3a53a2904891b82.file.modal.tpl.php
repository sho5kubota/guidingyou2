<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 16:40:06
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/admin641i1vw2x/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201603513455c07a666d6b09-09242649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '201603513455c07a666d6b09-09242649',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c07a666de841_98459087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c07a666de841_98459087')) {function content_55c07a666de841_98459087($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
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
