<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 14:29:34
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerpayments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158131908855c05bce6c4373-57878271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8b8f1a314e197ebfe517c1263d0c71c8d5de7ab' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/sellerpayments.tpl',
      1 => 1438669006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158131908855c05bce6c4373-57878271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'seller_exists' => 0,
    'paymentinfo_paypal' => 0,
    'is_agileagilecashondelivery_installed' => 0,
    'paymentinfo_cod' => 0,
    'is_agilegooglecheckout_installed' => 0,
    'paymentinfo_gcheckout' => 0,
    'is_agilebankwire_installed' => 0,
    'paymentinfo_bankwire' => 0,
    'is_agilepaybycheque_installed' => 0,
    'paymentinfo_agilepaybycheque' => 0,
    'sellerinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c05bce9a3613_50281027',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c05bce9a3613_50281027')) {function content_55c05bce9a3613_50281027($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
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


<?php if (isset($_smarty_tpl->tpl_vars['seller_exists']->value)&&$_smarty_tpl->tpl_vars['seller_exists']->value) {?>
<div id="agile">
<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilemultipleseller','sellerpayments',array(),true);?>
" method="post" class="std" id="add_adress">
	<fieldset class="agile-seller-payment">
		<legend><strong></strng><?php echo smartyTranslate(array('s'=>'Your Paypal Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</strong></legend>
	    <input type="hidden"  name="id_paymentinfo_paypal" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_paypal']->value->id;?>
" />
		<div class="checkbox">
			<input type="checkbox" id="paypal_in_use" name ="paypal_in_use"  alt="if you want to use this payment type." value="1" <?php if ($_smarty_tpl->tpl_vars['paymentinfo_paypal']->value->in_use==1) {?>checked="checked"<?php }?> />
			<label for="paypal_in_use"><?php echo smartyTranslate(array('s'=>'In Use','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
		</div>
		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="paypal_email">
				<span><?php echo smartyTranslate(array('s'=>'Paypal Account Email','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
				<input type="text" id="paypal_email" size="80" name="paypal_email" value="<?php if (isset($_POST['paypal_email'])) {?><?php echo $_POST['paypal_email'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_paypal']->value->info1)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_paypal']->value->info1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
	</fieldset>
    <br>

	<fieldset class="agile-seller-payment" style="display:<?php if (isset($_smarty_tpl->tpl_vars['is_agileagilecashondelivery_installed']->value)&&$_smarty_tpl->tpl_vars['is_agileagilecashondelivery_installed']->value) {?><?php } else { ?>none<?php }?>;">
		<legend><strong></strng><?php echo smartyTranslate(array('s'=>'Your Cash On Delivery','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</strong></legend>
	    <input type="hidden"  name="id_paymentinfo_cod" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_cod']->value->id;?>
" />
		<div class="checkbox">
			<input type="checkbox" id="cod_in_use" name ="cod_in_use"  alt="if you want to use this payment type." value="1" <?php if ($_smarty_tpl->tpl_vars['paymentinfo_cod']->value->in_use==1) {?>checked="checked"<?php }?> />
			<label for="cod_in_use"><?php echo smartyTranslate(array('s'=>'In Use','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
		</div>
		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="agilecashondelivery_notes">
				<span><?php echo smartyTranslate(array('s'=>'Notes at order','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
				<input type="text" id="cod_notes" size="80" name="cod_notes" value="<?php if (isset($_POST['cod_notes'])) {?><?php echo $_POST['cod_notes'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_cod']->value->info1)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_cod']->value->info1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
	</fieldset>
    <br>

	<fieldset class="agile-seller-payment" style="display:<?php if ($_smarty_tpl->tpl_vars['is_agilegooglecheckout_installed']->value) {?><?php } else { ?>none<?php }?>;">
		<legend><strong></strng><?php echo smartyTranslate(array('s'=>'Your Google Checkout Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</strong></legend>
	    <input type="hidden" name="id_paymentinfo_gcheckout" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->id;?>
" />
		<div class="checkbox">
		    <input type="checkbox" id="gcheckout_in_use" name ="gcheckout_in_use" tip="if you want to use this payment type." value="1" <?php if ($_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->in_use==1) {?>checked="checked"<?php }?> />
			<label for="gcheckout_in_use"><?php echo smartyTranslate(array('s'=>'In Use','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
		</div>
		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="gcheckout_merchant_id">
				<span><?php echo smartyTranslate(array('s'=>'Google Checkout Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
				<input type="text"  name="gcheckout_merchant_id"  size="80" value="<?php if (isset($_POST['gcheckout_merchant_id'])) {?><?php echo $_POST['gcheckout_merchant_id'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->info1)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->info1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="gcheckout_key">
				<span><?php echo smartyTranslate(array('s'=>'Google API Key','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <input type="text" name="gcheckout_key" value="<?php if (isset($_POST['gcheckout_key'])) {?><?php echo $_POST['gcheckout_key'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->info2)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_gcheckout']->value->info2, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
	</fieldset>
    <br>
	<fieldset class="agile-seller-payment" style="display:<?php if ($_smarty_tpl->tpl_vars['is_agilebankwire_installed']->value) {?><?php } else { ?>none<?php }?>;">
		<legend><strong></strng><?php echo smartyTranslate(array('s'=>'Your Bank Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</strong></legend>
	    <input type="hidden" name="id_paymentinfo_bankwire" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->id;?>
" />
		<div class="checkbox">
		        <input type="checkbox" id="bankwire_in_use" name ="bankwire_in_use" tip="if you want to use this payment type." value="1" <?php if ($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->in_use==1) {?>checked="checked"<?php }?> />
			<label for="bankwire_in_use"><?php echo smartyTranslate(array('s'=>'In Use','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="bankwire_accountowner">
				<span><?php echo smartyTranslate(array('s'=>'Bank Account Owner','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <input type="text" name="bankwire_accountowner"  size="80" value="<?php if (isset($_POST['bankwire_accountowner'])) {?><?php echo $_POST['bankwire_accountowner'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info1)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="bankwire_accountdetails">
				<span><?php echo smartyTranslate(array('s'=>'Bank Account Details','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <textarea rows="3"  name="bankwire_accountdetails"><?php if (isset($_POST['bankwire_accountdetails'])) {?><?php echo $_POST['bankwire_accountdetails'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info2)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info2, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?></textarea>
			</div>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="bankwire_bankaddress">
				<span><?php echo smartyTranslate(array('s'=>'Bank Address','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <textarea rows="3" name="bankwire_bankaddress"><?php if (isset($_POST['bankwire_bankaddress'])) {?><?php echo $_POST['bankwire_bankaddress'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info3)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_bankwire']->value->info3, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?></textarea>
			</div>
		</div>
	</fieldset>
    <br>
	<fieldset class="agile-seller-payment" style=";display:<?php if ($_smarty_tpl->tpl_vars['is_agilepaybycheque_installed']->value) {?><?php } else { ?>none<?php }?>;">
		<legend><strong></strng><?php echo smartyTranslate(array('s'=>'Your Check Account','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</strong></legend>
	    <input type="hidden" name="id_paymentinfo_agilepaybycheque" value="<?php echo $_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->id;?>
" />
		<div class="checkbox">
		        <input type="checkbox" id="agilepaybycheque_in_use" name ="agilepaybycheque_in_use" tip="if you want to use this payment type." value="1" <?php if ($_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->in_use==1) {?>checked="checked"<?php }?> />
			<label for="agilepaybycheque_in_use"><?php echo smartyTranslate(array('s'=>'In Use','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="agilepaybycheque_address">
				<span><?php echo smartyTranslate(array('s'=>'To the order of','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <input type="text" name="agilepaybycheque_paytoname" value="<?php if (isset($_POST['agilepaybycheque_paytoname'])) {?><?php echo $_POST['agilepaybycheque_paytoname'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->info1)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->info1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
 		<div class="form-group">
			<label class="control-label agile-col-sm-4 agile-col-md-3 agile-col-lg-2 agile-col-xl-2" for="agilepaybycheque_address">
				<span><?php echo smartyTranslate(array('s'=>'Address','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
			</label>
			<div class="agile-col-sm-8 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
		        <input type="text" name="agilepaybycheque_address" value="<?php if (isset($_POST['agilepaybycheque_address'])) {?><?php echo $_POST['agilepaybycheque_address'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->info2)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paymentinfo_agilepaybycheque']->value->info2, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
			</div>
		</div>
	</fieldset>
    <br>
	<p class="submit2">
		<center>
		    <input type="hidden" name="id_sellerinfo" value="<?php echo intval($_smarty_tpl->tpl_vars['sellerinfo']->value->id);?>
" />
			<button type="submit" class="agile-btn agile-btn-default" name="submitSellerinfo" id="submitSellerinfo" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
			<i class="icon-save"></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span></button >
		</center>
	</p>
</form> 
</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
