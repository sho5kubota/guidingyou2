<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 14:22:31
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerorderdetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59982739055c05a276b6f21-77575561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '736dd274f63c1910fab84add51144d570a51cf4a' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerorderdetail.tpl',
      1 => 1438669346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59982739055c05a276b6f21-77575561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'isSeller' => 0,
    'order_history' => 0,
    'order' => 0,
    'order_states' => 0,
    'order_state' => 0,
    'order_cur_state' => 0,
    'state' => 0,
    'followup' => 0,
    'carrier' => 0,
    'shop_name' => 0,
    'img_dir' => 0,
    'inv_adr_fields' => 0,
    'field_item' => 0,
    'address_invoice' => 0,
    'address_words' => 0,
    'word_item' => 0,
    'invoiceAddressFormatedValues' => 0,
    'HOOK_ORDERDETAILDISPLAYED' => 0,
    'is_guest' => 0,
    'return_allowed' => 0,
    'priceDisplay' => 0,
    'use_tax' => 0,
    'currency' => 0,
    'products' => 0,
    'product' => 0,
    'group_use_tax' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'customizationPerAddress' => 0,
    'customizationId' => 0,
    'customization' => 0,
    'type' => 0,
    'CUSTOMIZE_FILE' => 0,
    'datas' => 0,
    'pic_dir' => 0,
    'data' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'customizationFieldName' => 0,
    'invoice' => 0,
    'productQuantity' => 0,
    'discounts' => 0,
    'discount' => 0,
    'messages' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c05a28094938_96026284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c05a28094938_96026284')) {function content_55c05a28094938_96026284($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Applications/MAMP/htdocs/testguidingyou2/tools/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_date_format')) include '/Applications/MAMP/htdocs/testguidingyou2/tools/smarty/plugins/modifier.date_format.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
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

<br />
<?php if (isset($_smarty_tpl->tpl_vars['isSeller']->value)&&$_smarty_tpl->tpl_vars['isSeller']->value) {?>
<div id="agile">
<?php if (count($_smarty_tpl->tpl_vars['order_history']->value)) {?>
	<div class="panel">
		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerorderdetail',array('id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),true);?>
" method="post" class="std">
		<div class="row">
		  <h3>
			<span class="agile-pull-left">
				<?php echo smartyTranslate(array('s'=>'Order','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="color-myaccount"><?php echo smartyTranslate(array('s'=>'#'),$_smarty_tpl);?>
<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['order']->value->id);?>
</span> - <?php echo smartyTranslate(array('s'=>'placed on','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl);?>

			</span>
			<span class="agile-pull-right">
			  <a class="agile-btn agile-btn-default" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerorders',array('process'=>'orders'),true);?>
">
				<i class="icon-th-list"></i>&nbsp;<?php echo smartyTranslate(array('s'=>' Back to order list','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

			  </a>
			</span>
		  </h3>
	    </div>
		<div class="form-group">
			<div class="agile-col-sm-4 agile-col-md-4 agile-col-lg-4 agile-col-xl-4">
			<select id="id_order_state" name="id_order_state">
				<?php  $_smarty_tpl->tpl_vars['order_state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order_state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order_state']->key => $_smarty_tpl->tpl_vars['order_state']->value) {
$_smarty_tpl->tpl_vars['order_state']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['order_state']->value['id_order_state']!=$_smarty_tpl->tpl_vars['order_cur_state']->value) {?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['order_state']->value['id_order_state'];?>
"><?php echo $_smarty_tpl->tpl_vars['order_state']->value['name'];?>
</option>
					<?php }?>
				<?php } ?>
			</select>
			</div>
			<div class="input-group agile-col-sm-4 agile-col-md-4 agile-col-lg-4 agile-col-xl-4">
				<input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
				<input type="submit" name="submitState" value="<?php echo smartyTranslate(array('s'=>'Change Status','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" class="button" />
			</div>
		</div>
		</form>
	</div>

	<div class="form-group">
		<div class="table-responsive clearfix">
			<table class="table detail_step_by_step">
				<thead>
					<tr>
						<th class="first_item"><?php echo smartyTranslate(array('s'=>'Date','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="last_item"><?php echo smartyTranslate(array('s'=>'Status','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_history']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['state']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['state']->iteration=0;
 $_smarty_tpl->tpl_vars['state']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["orderStates"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
 $_smarty_tpl->tpl_vars['state']->iteration++;
 $_smarty_tpl->tpl_vars['state']->index++;
 $_smarty_tpl->tpl_vars['state']->first = $_smarty_tpl->tpl_vars['state']->index === 0;
 $_smarty_tpl->tpl_vars['state']->last = $_smarty_tpl->tpl_vars['state']->iteration === $_smarty_tpl->tpl_vars['state']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["orderStates"]['first'] = $_smarty_tpl->tpl_vars['state']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["orderStates"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["orderStates"]['last'] = $_smarty_tpl->tpl_vars['state']->last;
?>
						<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['orderStates']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['orderStates']['last']) {?>last_item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['orderStates']['index']%2) {?>alternate_item<?php } else { ?>item<?php }?>">
							<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['state']->value['date_add'],'full'=>1),$_smarty_tpl);?>
</td>
							<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['ostate_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['followup']->value)) {?>
	<div class="form-group">
		<p class="bold"><?php echo smartyTranslate(array('s'=>'Click the following link to track the delivery of your order','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
		<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['followup']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['followup']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
	</div>
<?php }?>

<div class="panel form-group">
	<div class="form-group">
		<h3>
		<p class="bold"><?php echo smartyTranslate(array('s'=>'Order:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="color-myaccount"><?php echo smartyTranslate(array('s'=>'#','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php echo sprintf("%06d",$_smarty_tpl->tpl_vars['order']->value->id);?>
</span></p>
		<?php if ($_smarty_tpl->tpl_vars['carrier']->value->id) {?><p class="bold"><?php echo smartyTranslate(array('s'=>'Carrier:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['carrier']->value->name=="0") {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></p><?php }?>
		<p class="bold"><?php echo smartyTranslate(array('s'=>'Payment method:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="color-myaccount"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->payment, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></p>
		</h3>

		<?php if ($_smarty_tpl->tpl_vars['order']->value->recyclable) {?>
		<p><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/recyclable.gif" alt="" class="icon" />&nbsp;<?php echo smartyTranslate(array('s'=>'Permission to receive order in recycled packaging is given.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->gift) {?>
			<p><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/gift.gif" alt="" class="icon" />&nbsp;<?php echo smartyTranslate(array('s'=>'Gift-wrapping for order is requested.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
			<p><?php echo smartyTranslate(array('s'=>'Message:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <?php echo nl2br($_smarty_tpl->tpl_vars['order']->value->gift_message);?>
</p>
		<?php }?>
	</div>
	<ul class="address item form-group agile-col-sm-6 agile-col-md-6 agile-col-lg-6 agile-col-xl-6" <?php if ($_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>style="display:none;"<?php }?>>
		<li class="address_title"><?php echo smartyTranslate(array('s'=>'Invoice','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</li>
		<?php  $_smarty_tpl->tpl_vars['field_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['inv_adr_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_item']->key => $_smarty_tpl->tpl_vars['field_item']->value) {
$_smarty_tpl->tpl_vars['field_item']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['field_item']->value=="company"&&isset($_smarty_tpl->tpl_vars['address_invoice']->value->company)) {?><li class="address_company"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['address_invoice']->value->company, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
			<?php } elseif ($_smarty_tpl->tpl_vars['field_item']->value=="address2"&&$_smarty_tpl->tpl_vars['address_invoice']->value->address2) {?><li class="address_address2"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['address_invoice']->value->address2, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
			<?php } elseif ($_smarty_tpl->tpl_vars['field_item']->value=="phone_mobile"&&$_smarty_tpl->tpl_vars['address_invoice']->value->phone_mobile) {?><li class="address_phone_mobile"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['address_invoice']->value->phone_mobile, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
			<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['address_words'] = new Smarty_variable(explode(" ",$_smarty_tpl->tpl_vars['field_item']->value), null, 0);?>
					<li>
					<?php  $_smarty_tpl->tpl_vars['word_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['word_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['address_words']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['word_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['word_item']->key => $_smarty_tpl->tpl_vars['word_item']->value) {
$_smarty_tpl->tpl_vars['word_item']->_loop = true;
 $_smarty_tpl->tpl_vars['word_item']->index++;
 $_smarty_tpl->tpl_vars['word_item']->first = $_smarty_tpl->tpl_vars['word_item']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["word_loop"]['first'] = $_smarty_tpl->tpl_vars['word_item']->first;
?>
						<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['word_loop']['first']) {?> <?php }?><span class="address_<?php echo trim($_smarty_tpl->tpl_vars['word_item']->value,",");?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['invoiceAddressFormatedValues']->value[trim($_smarty_tpl->tpl_vars['word_item']->value,",")], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
					<?php } ?>
					</li>
			<?php }?>

		<?php } ?>
	</ul>

<!---->

</div>
<?php echo $_smarty_tpl->tpl_vars['HOOK_ORDERDETAILDISPLAYED']->value;?>

<?php if (!$_smarty_tpl->tpl_vars['is_guest']->value) {?><form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true);?>
" method="post"><?php }?>
	<div class="form-group">
		<div id="order-detail-content" class="table-responsive clearfix">
			<table class="table">
				<thead>
					<tr>
						<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?><th class="first_item"><input type="checkbox" /></th><?php }?>
						<th class="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>item<?php } else { ?>first_item<?php }?>"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="item"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="item"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="item"><?php echo smartyTranslate(array('s'=>'Booking Date','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="item"><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
						<th class="last_item"><?php echo smartyTranslate(array('s'=>'Total price','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
					</tr>
				</thead>
				<tfoot>
					<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value&&$_smarty_tpl->tpl_vars['use_tax']->value) {?>
						<tr class="item">
							<td colspan="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>7<?php } else { ?>6<?php }?>">
								<?php echo smartyTranslate(array('s'=>'Total products (tax excl.):','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->getTotalProductsWithoutTaxes(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span>
							</td>
						</tr>
					<?php }?>
					<tr class="item">
						<td colspan="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>7<?php } else { ?>6<?php }?>">
							<?php echo smartyTranslate(array('s'=>'Total products','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?><?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php }?>: <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->getTotalProductsWithTaxes(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span>
						</td>
					</tr>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts>0) {?>
					<tr class="item">
						<td colspan="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>7<?php } else { ?>6<?php }?>">
							<?php echo smartyTranslate(array('s'=>'Total vouchers:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="price-discount"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_discounts,'currency'=>$_smarty_tpl->tpl_vars['currency']->value,'convert'=>1),$_smarty_tpl);?>
</span>
						</td>
					</tr>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->total_wrapping>0) {?>
					<tr class="item">
						<td colspan="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>7<?php } else { ?>6<?php }?>">
							<?php echo smartyTranslate(array('s'=>'Total gift-wrapping:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="price-wrapping"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_wrapping,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span>
						</td>
					</tr>
					<?php }?>

					

					<tr class="totalprice item">
						<td colspan="<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>7<?php } else { ?>6<?php }?>">
							<?php echo smartyTranslate(array('s'=>'Total:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPriceWithCurrency'][0][0]->displayWtPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid,'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</span>
						</td>
					</tr>
				</tfoot>

				<tbody>
					<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
						<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['deleted'])) {?>
							<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_id'], null, 0);?>
							<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_attribute_id'], null, 0);?>
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['customizedDatas'])) {?>
								<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'], null, 0);?>
							<?php } else { ?>
								<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_quantity'], null, 0);?>
							<?php }?>
							<!-- Customized products -->
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['customizedDatas'])) {?>
								<tr class="item">
									<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?><td class="order_cb"></td><?php }?>
									<td><label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value['product_reference']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>--<?php }?></label></td>
									<td class="bold">
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
									</td>
									<td><label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><span class="order_qte_span editable"><?php echo intval($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']);?>
</span></label></td>
									<?php if ($_smarty_tpl->tpl_vars['order']->value->hasProductReturned()) {?>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['product']->value['qty_returned'];?>

										</td>
									<?php }?>
									<td>
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
											<?php if ($_smarty_tpl->tpl_vars['group_use_tax']->value) {?>
												<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

											<?php } else { ?>
												<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

											<?php }?>
										</label>
									</td>
									<td>
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
											<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
												<?php if ($_smarty_tpl->tpl_vars['group_use_tax']->value) {?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization_wt'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

												<?php } else { ?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

												<?php }?>
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['group_use_tax']->value) {?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

												<?php } else { ?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

												<?php }?>
											<?php }?>
										</label>
									</td>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['customizationPerAddress'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizedDatas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customizationPerAddress']->key => $_smarty_tpl->tpl_vars['customizationPerAddress']->value) {
$_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = true;
?>
									<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['customizationId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizationPerAddress']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['customizationId']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
									<tr class="alternate_item">
										<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?><td class="order_cb"><input type="checkbox" id="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" name="customization_ids[<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
][]" value="<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
" /></td><?php }?>
										<td colspan="2">
										<?php  $_smarty_tpl->tpl_vars['datas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datas']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datas']->key => $_smarty_tpl->tpl_vars['datas']->value) {
$_smarty_tpl->tpl_vars['datas']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['datas']->key;
?>
											<?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_FILE']->value) {?>
											<ul class="customizationUploaded">
												<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
													<li><img src="<?php echo $_smarty_tpl->tpl_vars['pic_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
_small" alt="" class="customizationUploaded" /></li>
												<?php } ?>
											</ul>
											<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value) {?>
											<ul class="typedText"><?php echo smarty_function_counter(array('start'=>0,'print'=>false),$_smarty_tpl);?>

												<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
													<?php $_smarty_tpl->tpl_vars['customizationFieldName'] = new Smarty_variable(("Text #").($_smarty_tpl->tpl_vars['data']->value['id_customization_field']), null, 0);?>
													<li><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['name'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['customizationFieldName']->value : $tmp);?>
 : <?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
</li>
												<?php } ?>
											</ul>
											<?php }?>
										<?php } ?>
										</td>
										<td>
											<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><span class="order_qte_span editable"><?php echo intval($_smarty_tpl->tpl_vars['customization']->value['quantity']);?>
</span></label>
										</td>
										<td colspan="2"></td>
									</tr>
									<?php } ?>
								<?php } ?>
							<?php }?>
							<!-- Classic products -->
							<?php if ($_smarty_tpl->tpl_vars['product']->value['product_quantity']>$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']) {?>
								<tr class="item">
									<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?><td class="order_cb"><input type="checkbox" id="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" name="ids_order_detail[<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
]" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" /></td><?php }?>
									<td><label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value['product_reference']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>--<?php }?></label></td>
									<td class="bold">
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
											<?php if ($_smarty_tpl->tpl_vars['product']->value['download_hash']&&$_smarty_tpl->tpl_vars['invoice']->value&&$_smarty_tpl->tpl_vars['product']->value['display_filename']!=''&&$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']==0&&$_smarty_tpl->tpl_vars['product']->value['product_quantity_return']==0) {?>
												<?php if (isset($_smarty_tpl->tpl_vars['is_guest']->value)&&$_smarty_tpl->tpl_vars['is_guest']->value) {?>
												<a href="<?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['filename'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['download_hash'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp4=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('get-file',true,null,"key=".$_tmp3."-".$_tmp4."&amp;id_order=".((string)$_smarty_tpl->tpl_vars['order']->value->id)."&secure_key=".((string)$_smarty_tpl->tpl_vars['order']->value->secure_key)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Download this product'),$_smarty_tpl);?>
">
												<?php } else { ?>
													<a href="<?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['filename'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['download_hash'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp6=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('get-file',true,null,"key=".$_tmp5."-".$_tmp6), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Download this product'),$_smarty_tpl);?>
">
												<?php }?>
													<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/download_product.gif" class="icon" alt="<?php echo smartyTranslate(array('s'=>'Download product','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" />
												</a>
												<?php if (isset($_smarty_tpl->tpl_vars['is_guest']->value)&&$_smarty_tpl->tpl_vars['is_guest']->value) {?>
													<a href="<?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['filename'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['download_hash'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp8=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('get-file',true,null,"key=".$_tmp7."-".$_tmp8."&id_order=".((string)$_smarty_tpl->tpl_vars['order']->value->id)."&secure_key=".((string)$_smarty_tpl->tpl_vars['order']->value->secure_key)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Download this product'),$_smarty_tpl);?>
"> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 	</a>
												<?php } else { ?>
												<a href="<?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['filename'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['download_hash'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp10=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('get-file',true,null,"key=".$_tmp9."-".$_tmp10), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Download this product'),$_smarty_tpl);?>
"> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 	</a>
												<?php }?>
											<?php } else { ?>
												<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

											<?php }?>
										</label>
									</td>
									<td><label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
"><span class="order_qte_span editable"><?php echo intval($_smarty_tpl->tpl_vars['productQuantity']->value);?>
</span></label></td>
									<?php if ($_smarty_tpl->tpl_vars['order']->value->hasProductReturned()) {?>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['product']->value['qty_returned'];?>

										</td>
									<?php }?>
										<td>
											<b>Booking Date:</b><br/>
											<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['arrival'],"%Y-%m-%d");?>
 <br/>
										</td>
									<td>
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
										<?php if ($_smarty_tpl->tpl_vars['group_use_tax']->value) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

										<?php } else { ?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

										<?php }?>
										</label>
									</td>
									<td>
										<label for="cb_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
										<?php if ($_smarty_tpl->tpl_vars['group_use_tax']->value) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

										<?php } else { ?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>

										<?php }?>
										</label>
									</td>
								</tr>
							<?php }?>
						<?php }?>
					<?php } ?>
					<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
						<tr class="item">
							<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
							<td><?php echo smartyTranslate(array('s'=>'Voucher:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
							<td><span class="order_qte_span editable">1</span></td>
							<td>&nbsp;</td>
							<td><?php if ($_smarty_tpl->tpl_vars['discount']->value['value']!=0.00) {?><?php echo smartyTranslate(array('s'=>'-','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPriceWithCurrency'][0][0]->convertPriceWithCurrency(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value),$_smarty_tpl);?>
</td>
							<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>
							<td>&nbsp;</td>
							<?php }?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<?php if (!$_smarty_tpl->tpl_vars['is_guest']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['return_allowed']->value) {?>
		<div id="returnOrderMessage"  class="form-group">
			<h3><?php echo smartyTranslate(array('s'=>'Merchandise return','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h3>
			<p><?php echo smartyTranslate(array('s'=>'If you wish to return one or more products, please mark the corresponding boxes and provide an explanation for the return. Then click the button below.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
			<p class="textarea">
				<textarea cols="67" rows="3" name="returnText"></textarea>
			</p>
			<p class="submit">
				<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Make an RMA slip','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
" name="submitReturnMerchandise" class="button_large" />
				<input type="hidden" class="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
" name="id_order" />
			</p>
		</div>
	<?php }?>
	</form>

<!---->

	<div class="panel">
		<?php if (count($_smarty_tpl->tpl_vars['messages']->value)) {?>
			<div class="form-group">
				<div class="table-responsive clearfix">
					<h3><?php echo smartyTranslate(array('s'=>'Messages','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h3>
					<table class="detail_step_by_step std">
						<thead>
							<tr>
								<th class="first_item" style="width:150px;"><?php echo smartyTranslate(array('s'=>'From','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
								<th class="last_item"><?php echo smartyTranslate(array('s'=>'Message','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</th>
							</tr>
						</thead>
						<tbody>
						<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['message']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['message']->iteration=0;
 $_smarty_tpl->tpl_vars['message']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["messageList"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
 $_smarty_tpl->tpl_vars['message']->iteration++;
 $_smarty_tpl->tpl_vars['message']->index++;
 $_smarty_tpl->tpl_vars['message']->first = $_smarty_tpl->tpl_vars['message']->index === 0;
 $_smarty_tpl->tpl_vars['message']->last = $_smarty_tpl->tpl_vars['message']->iteration === $_smarty_tpl->tpl_vars['message']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["messageList"]['first'] = $_smarty_tpl->tpl_vars['message']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["messageList"]['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["messageList"]['last'] = $_smarty_tpl->tpl_vars['message']->last;
?>
							<tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['messageList']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['messageList']['last']) {?>last_item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['messageList']['index']%2) {?>alternate_item<?php } else { ?>item<?php }?>">
								<td>
									<?php if (isset($_smarty_tpl->tpl_vars['message']->value['elastname'])&&$_smarty_tpl->tpl_vars['message']->value['elastname']) {?>
										<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['efirstname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['elastname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

									<?php } elseif ($_smarty_tpl->tpl_vars['message']->value['clastname']) {?>
										<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['cfirstname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value['clastname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

									<?php } else { ?>
										<b><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</b>
									<?php }?>
									<br />
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['message']->value['date_add'],'full'=>1),$_smarty_tpl);?>

								</td>
								<td><?php echo nl2br($_smarty_tpl->tpl_vars['message']->value['message']);?>
</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		<?php }?>

		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerorderdetail',array('id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),true);?>
" method="post" class="std" id="sendOrderMessage">
			<h3><?php echo smartyTranslate(array('s'=>'Add a message:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h3>
			<p><?php echo smartyTranslate(array('s'=>'If you would like to add a comment about your order, please write it below.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
			<p>
			<div class="form-group">
				<div class="agile-col-sm-2 agile-col-md-2 agile-col-lg-2 agile-col-xl-2">
					<label for="id_product" class="control-label"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
				</div>
				<div class="input-group agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<select name="id_product">
						<option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
						<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group textarea">
				<div class="agile-col-sm-2 agile-col-md-2 agile-col-lg-2 agile-col-xl-2">
					<label for="msgText" class="control-label"><?php echo smartyTranslate(array('s'=>'Comment','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
				</div>
				<div class="input-group agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
					<textarea cols="67" rows="6" name="msgText" class="form-control textarea"></textarea>
				</div>
			</div>

			<div class="form-group agile-align-center">
				<input type="hidden" name="id_order" value="<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
" />
				<button type="submit" class="agile-btn agile-btn-default" name="submitMessage" value="<?php echo smartyTranslate(array('s'=>'Send','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
				<i class="icon-save "></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Send','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span></button >
			</div>
		</form>
	</div>
<?php } else { ?>
	<div class="form-group">
		<p><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/infos.gif" alt="" class="icon" />&nbsp;<?php echo smartyTranslate(array('s'=>'You cannot make a merchandise return with a guest account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</p>
	</div>
<?php }?>
</div>
<?php }?> 
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript" language="javascript">
	$('.edit_shipping_number_link').unbind('click').click(function(e) {
		$(this).parent().find('.shipping_number_show').hide();
		$(this).parent().find('.shipping_number_edit').show();

		$(this).parent().find('.edit_shipping_number_link').hide();
		$(this).parent().find('.cancel_shipping_number_link').show();
		e.preventDefault();
	});

	$('.cancel_shipping_number_link').unbind('click').click(function(e) {
		$(this).parent().find('.shipping_number_show').show();
		$(this).parent().find('.shipping_number_edit').hide();

		$(this).parent().find('.edit_shipping_number_link').show();
		$(this).parent().find('.cancel_shipping_number_link').hide();
		e.preventDefault();
	});
</script>
<?php }} ?>
