<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:14:07
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/smartbloghomelatestnews/views/templates/front/smartblog_latest_news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121799624955c0825f1fa925-03295942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af836a30b6d0b993e09db08c03a772116a686914' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/smartbloghomelatestnews/views/templates/front/smartblog_latest_news.tpl',
      1 => 1438586514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121799624955c0825f1fa925-03295942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view_data' => 0,
    'post' => 0,
    'options' => 0,
    'modules_dir' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c0825f2a1a31_63748679',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c0825f2a1a31_63748679')) {function content_55c0825f2a1a31_63748679($_smarty_tpl) {?><div class="block">
    <h2 class='sdstitle_block'><a href="<?php echo smartblog::GetSmartBlogLink('smartblog');?>
"><?php echo smartyTranslate(array('s'=>'Latest News','mod'=>'smartbloghomelatestnews'),$_smarty_tpl);?>
</a></h2>
    <div class="sdsblog-box-content">
        <?php if (isset($_smarty_tpl->tpl_vars['view_data']->value)&&!empty($_smarty_tpl->tpl_vars['view_data']->value)) {?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['view_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
               
                    <?php $_smarty_tpl->tpl_vars["options"] = new Smarty_variable(null, null, 0);?>
                    <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['id_post'] = $_smarty_tpl->tpl_vars['post']->value['id'];?>
                    <?php $_smarty_tpl->createLocalArrayVariable('options', null, 0);
$_smarty_tpl->tpl_vars['options']->value['slug'] = $_smarty_tpl->tpl_vars['post']->value['link_rewrite'];?>
                    <div id="sds_blog_post" class="col-xs-12 col-sm-4 col-md-3">
                        <span class="news_module_image_holder">
                             <a href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
" class="feat_img_small" src="<?php echo $_smarty_tpl->tpl_vars['modules_dir']->value;?>
smartblog/images/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_img'];?>
-home-default.jpg"></a>
                        </span>
                        <span><?php echo $_smarty_tpl->tpl_vars['post']->value['date_added'];?>
</span>
                        <h4 class="sds_post_title"><a href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</a></h4>
                        <p>
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['short_description'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        </p>
                        <a href="<?php echo smartblog::GetSmartBlogLink('smartblog_post',$_smarty_tpl->tpl_vars['options']->value);?>
"  class="r_more"><?php echo smartyTranslate(array('s'=>'Read More','mod'=>'smartbloghomelatestnews'),$_smarty_tpl);?>
</a>
                    </div>
                
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
            <?php } ?>
        <?php }?>
     </div>
</div><?php }} ?>
