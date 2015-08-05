<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 14:21:19
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerorders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170449793755c059df933cd1-74995464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c69d75fa39cf8c23ee7152eec5acbd80392b6b' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerorders.tpl',
      1 => 1438669265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170449793755c059df933cd1-74995464',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'isSeller' => 0,
    'orders' => 0,
    'order' => 0,
    'base_dir_ssl' => 0,
    'invoiceAllowed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c059dfb2c710_81887788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c059dfb2c710_81887788')) {function content_55c059dfb2c710_81887788($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="withAdditional"><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h1>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('22','whats-guide-member'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink"><?php echo smartyTranslate(array('s'=>'Explanation of guide membar','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['isSeller']->value)&&$_smarty_tpl->tpl_vars['isSeller']->value) {?>
<div id="agile">
<div class="block-center" id="block-history">
    <?php if ($_smarty_tpl->tpl_vars['orders']->value&&count($_smarty_tpl->tpl_vars['orders']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<div class="table-responsive clearfix">
    <table id="order-list" class="table">
        <thead>
	        <tr>
		        <th class="first_item"><?php echo smartyTranslate(array('s'=>'Order','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'New','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Customer','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Date','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Total price','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Payment','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Status','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Invoice','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
		        <th class="last_item" style="width:5px">&nbsp;</th>
	        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['order']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['order']->iteration=0;
 $_smarty_tpl->tpl_vars['order']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
 $_smarty_tpl->tpl_vars['order']->iteration++;
 $_smarty_tpl->tpl_vars['order']->index++;
 $_smarty_tpl->tpl_vars['order']->first = $_smarty_tpl->tpl_vars['order']->index === 0;
 $_smarty_tpl->tpl_vars['order']->last = $_smarty_tpl->tpl_vars['order']->iteration === $_smarty_tpl->tpl_vars['order']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['order']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['order']->last;
?>
	        <tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['index']%2) {?>alternate_item<?php }?>">
		        <td class="history_link bold">
			        <?php if (isset($_smarty_tpl->tpl_vars['order']->value['invoice'])&&$_smarty_tpl->tpl_vars['order']->value['invoice']&&isset($_smarty_tpl->tpl_vars['order']->value['virtual'])&&$_smarty_tpl->tpl_vars['order']->value['virtual']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
//modules/agilemultipleseller/images//download_product.gif" class="icon" alt="<?php echo smartyTranslate(array('s'=>'Products to download','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Products to download','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" /><?php }?>
			        <a class="color-myaccount" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerorderdetail',array('id_order'=>$_smarty_tpl->tpl_vars['order']->value['id_order']),true);?>
"><?php echo smartyTranslate(array('s'=>'#','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['order']->value['reference'];?>
</a>
		        </td>
		        <td><?php if ($_smarty_tpl->tpl_vars['order']->value['new']==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
//modules/agilemultipleseller/images/news-new.gif" /><?php }?></td>
		        <td><?php echo $_smarty_tpl->tpl_vars['order']->value['customer'];?>
</td>
		        <td class="history_date bold"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value['date_add'],'full'=>0),$_smarty_tpl);?>
</td>
		        <td class="history_price"><span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order']->value['total_paid'],'currency'=>$_smarty_tpl->tpl_vars['order']->value['id_currency'],'no_utf8'=>false,'convert'=>false),$_smarty_tpl);?>
</span></td>
		        <td class="history_method"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['payment'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
		        <td class="history_state"><?php if (isset($_smarty_tpl->tpl_vars['order']->value['order_state'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['order_state'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></td>
		        <td class="history_invoice">
		        <?php if ((isset($_smarty_tpl->tpl_vars['order']->value['invoice'])&&$_smarty_tpl->tpl_vars['order']->value['invoice']&&isset($_smarty_tpl->tpl_vars['order']->value['invoice_number'])&&$_smarty_tpl->tpl_vars['order']->value['invoice_number'])&&isset($_smarty_tpl->tpl_vars['invoiceAllowed']->value)&&$_smarty_tpl->tpl_vars['invoiceAllowed']->value==true) {?>
			        <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerpdfinvoice',array('id_order'=>$_smarty_tpl->tpl_vars['order']->value['id_order']),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Invoice','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" target="pdf"><img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
//modules/agilemultipleseller/images/pdf.gif" alt="<?php echo smartyTranslate(array('s'=>'Invoice'),$_smarty_tpl);?>
" class="icon" /></a>
			        <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerpdfinvoice',array('id_order'=>$_smarty_tpl->tpl_vars['order']->value['id_order']),true);?>
" title="<?php echo smartyTranslate(array('s'=>'Invoice','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" target="pdf"><?php echo smartyTranslate(array('s'=>'PDF','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
		        <?php } else { ?>-<?php }?>
		        </td>
		        <td class="history_detail">
		        </td>
	        </tr>
        <?php } ?>
        </tbody>
    </table>
	</div> <!-- responsive -->
    <div id="block-order-detail" class="hidden">&nbsp;</div>
    <?php } else { ?>
        <p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'You do not have any orders.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
    <?php }?>
</div> <!-- block-center -->
</div> <!-- agile -->
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
