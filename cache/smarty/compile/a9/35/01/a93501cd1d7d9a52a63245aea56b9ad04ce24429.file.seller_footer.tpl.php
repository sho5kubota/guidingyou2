<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 16:13:45
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/seller_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181930235155c0743992d090-95542733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93501cd1d7d9a52a63245aea56b9ad04ce24429' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/seller_footer.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181930235155c0743992d090-95542733',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir_ssl' => 0,
    'admin_folder_name' => 0,
    'selleremail' => 0,
    'sellertoken' => 0,
    'is_multiple_shop_installed' => 0,
    'sellerinfo' => 0,
    'link' => 0,
    'isSeller' => 0,
    'seller_back_office' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c07439997fa9_32850001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c07439997fa9_32850001')) {function content_55c07439997fa9_32850001($_smarty_tpl) {?><form action="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['admin_folder_name']->value;?>
/index.php?controller=adminlogin" id="seller_login_form" method="post">
<input type="hidden" name="ams_seller_email" value="<?php echo $_smarty_tpl->tpl_vars['selleremail']->value;?>
" />
<input type="hidden" name="ams_seller_token" value="<?php echo $_smarty_tpl->tpl_vars['sellertoken']->value;?>
" />
<input type="hidden" name="seller_login" value="1" />
<input type="hidden" name="submitLogin" value="1" />
</form>

<script type="text/javascript" language="javascript">
	function seller_login() 
	{
		$("#seller_login_form").submit();
	}
</script>

<ul class="footer_links clearfix">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
"><i class="icon-home"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'Home','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['is_multiple_shop_installed']->value) {?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAgileSellerLink($_smarty_tpl->tpl_vars['sellerinfo']->value->id_seller,'');?>
"><i class="icon-home"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'My Virtual Shop','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a></li>    <?php }?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><i class="icon-circle-arrow-left"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'My Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['isSeller']->value&&$_smarty_tpl->tpl_vars['seller_back_office']->value) {?>
      <li><a href="#" onclick="seller_login()" title="<?php echo smartyTranslate(array('s'=>'Access Seller Account from back office','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
"><i class="icon-user"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'My Back office','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a></li>
	  <?php }?>
</ul>

<?php }} ?>
