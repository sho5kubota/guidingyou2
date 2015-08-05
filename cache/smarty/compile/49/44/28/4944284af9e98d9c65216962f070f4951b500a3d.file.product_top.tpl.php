<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 15:54:07
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/products/product_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30206956355c06f9f98dd32-63238847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4944284af9e98d9c65216962f070f4951b500a3d' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/products/product_top.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30206956355c06f9f98dd32-63238847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'id_language' => 0,
    'link' => 0,
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c06f9f9e8ed6_59606077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06f9f9e8ed6_59606077')) {function content_55c06f9f9e8ed6_59606077($_smarty_tpl) {?><input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
<div class="row">
  <h3>
    <span class="agile-pull-left">
      <?php echo smartyTranslate(array('s'=>'Product','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="color-myaccount"><?php echo smartyTranslate(array('s'=>'#','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['product']->value->id);?>
</span> - <?php echo $_smarty_tpl->tpl_vars['product']->value->name[$_smarty_tpl->tpl_vars['id_language']->value];?>

    </span>
    <span class="agile-pull-right">
      <a class="agile-btn agile-btn-default" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerproducts',array(),true);?>
">
        <i class="icon-th-list"></i><?php echo smartyTranslate(array('s'=>' Back to product list','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </a>
    </span>
  </h3>


  <h3 class="row agile-align-center">
    <?php if ($_smarty_tpl->tpl_vars['id_product']->value>0) {?>
    <?php } else { ?>
    <span>
      <h4><?php echo smartyTranslate(array('s'=>'Adding a new product - other menus will be available once you save the basic information','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h4>
    </span>
    <?php }?>
  </h3>
</div><?php }} ?>
