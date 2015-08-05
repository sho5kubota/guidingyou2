<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:10:23
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/smartsellerblog/views/templates/front/smartbloglist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21231945955c0817f71b5e8-89889387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aa9f7bf9bfd8ce45d0afff7f94372120c92ecd8' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/smartsellerblog/views/templates/front/smartbloglist.tpl',
      1 => 1438675866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21231945955c0817f71b5e8-89889387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'blogs' => 0,
    'blog' => 0,
    'modules_dir' => 0,
    'meta_title' => 0,
    'base_dir_ssl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c0817f836398_08431896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0817f836398_08431896')) {function content_55c0817f836398_08431896($_smarty_tpl) {?><h1 class="withAdditional"><?php echo smartyTranslate(array('s'=>'My Guiding Blog','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</h1>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('22','whats-guide-member'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink"><?php echo smartyTranslate(array('s'=>'Explanation of guide membar','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
<?php echo $_smarty_tpl->getSubTemplate ("modules/agilemultipleseller/views/templates/front/seller_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div id="agile">
	<div class="block-center clearfix" id="block-history">
		<div class="row">
			<div class="agile-col-sm-2">
			<a class="agile-btn agile-btn-default" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartform',array('id_smart_blog_post'=>0),true);?>
">
					<i class="icon-plus-sign"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'Add New','mod'=>'smartsellerblog'),$_smarty_tpl);?>

			</a>
			</div>
			
			<div class="agile-col-sm-1"></div>

			
	    </div>

	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("modules/smartsellerblog/views/templates/front/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<table id="product-list" class="std">
	<thead>
		<tr>
			<th class="first_item" style="width:60px"><?php echo smartyTranslate(array('s'=>'ID','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>
			<th class="item" style="width:20%"><?php echo smartyTranslate(array('s'=>'Media','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>
			<th class="item"><?php echo smartyTranslate(array('s'=>'Category','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>
			<th class="item"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>
			<th class="item"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>
			<th class="item" style="width:80px"><?php echo smartyTranslate(array('s'=>'Active','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>

			<th class="item" style="width:80px"><?php echo smartyTranslate(array('s'=>'Action','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</th>

	        </tr>
	</thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value) {
$_smarty_tpl->tpl_vars['blog']->_loop = true;
?>
        <tr>
        	<td class="pointer left"><?php echo $_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'];?>
</td>
        	<td class="pointer center">
        		<div class="row">
				  <div class="col-xs-6 col-md-6">
				    <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartform',array('id_smart_blog_post'=>$_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post']),true);?>
" class="thumbnail">
				      <img src="<?php echo $_smarty_tpl->tpl_vars['modules_dir']->value;?>
/smartblog/images/<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_author'];?>
/<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'];?>
-home-default.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
">
				    </a>
				  </div>
				</div>
        	</td>
        	<td class="pointer left"><?php echo $_smarty_tpl->tpl_vars['blog']->value['cat_title'];?>
</td>
        	<td class="pointer left"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartform',array('id_smart_blog_post'=>$_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post']),true);?>
"><?php echo $_smarty_tpl->tpl_vars['blog']->value['meta_title'];?>
</a></td>
        	<td class="pointer left"><?php echo $_smarty_tpl->tpl_vars['blog']->value['short_description'];?>
</td>
        	<td class="pointer center">
        		<?php if ($_smarty_tpl->tpl_vars['blog']->value['active']==1) {?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartlist',array('process'=>'inactive','id_smart_blog_post'=>$_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post']),true);?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/enabled.gif" /></a>
				<?php } else { ?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartlist',array('process'=>'active','id_smart_blog_post'=>$_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post']),true);?>
" ><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/disabled.gif" /></a>
				<?php }?>
        	</td>
        	<td class="center">
		        <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartlist',array('process'=>'delete','id_smart_blog_post'=>$_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post']),true);?>
" onclick="if (confirm('Delete selected item?')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/delete.gif" /></a>
		</td>
        </tr>
        <?php } ?>
        </tbody>
</table><?php }} ?>
