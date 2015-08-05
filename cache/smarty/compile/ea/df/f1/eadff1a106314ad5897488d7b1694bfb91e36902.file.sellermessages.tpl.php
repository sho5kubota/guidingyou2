<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 14:26:54
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilesellermessenger/views/templates/front/sellermessages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163783621955c05b2e982205-86150996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eadff1a106314ad5897488d7b1694bfb91e36902' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilesellermessenger/views/templates/front/sellermessages.tpl',
      1 => 1438669610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163783621955c05b2e982205-86150996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'base_dir_ssl' => 0,
    'isSeller' => 0,
    'sellermessages' => 0,
    'sellermessage' => 0,
    'hide_email' => 0,
    'sellerinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c05b2ebe7562_99113150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c05b2ebe7562_99113150')) {function content_55c05b2ebe7562_99113150($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="withAdditional"><?php echo smartyTranslate(array('s'=>'My Seller Account','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</h1>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('22','whats-guide-member'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink"><?php echo smartyTranslate(array('s'=>'Explanation of guide membar','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript">
    function openMessageForm(id_replyto) {
        $("tr#trMessageForm_" + id_replyto).show();
    }

    function closeMessageForm(id_replyto) {
        $("tr#trMessageForm_" + id_replyto).hide();
    }
    function onSubmitMessageForm(id_replyto) {
        msg = $("#reply_message_" + id_replyto).val();
        if (msg == "") {
            alert("<?php echo smartyTranslate(array('s'=>'You must enter your reply message.','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
");
            return false;
        }
        return true;
    }
    
    function toggle_sellermessage(id_agile_sellermessage,to_status) {
        var url = "<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
" + "modules/agilesellermessenger/ajax_sellermessage.php";
        /** _agile_ alert(url); _agile_ **/
        $.post(url, { id_agile_sellermessage: id_agile_sellermessage, status: to_status },
            function(data) {
                if (data != '')
                    alert(data);
                else {
                    if(to_status == 1){
                        $("#img_message_active_on_" + id_agile_sellermessage).show();
                        $("#img_message_active_off_" + id_agile_sellermessage).hide();
                    }
                    else{
                        $("#img_message_active_on_" + id_agile_sellermessage).hide();
                        $("#img_message_active_off_" + id_agile_sellermessage).show();
                    }
                }
            });
    }
    
</script>
<?php if (isset($_smarty_tpl->tpl_vars['isSeller']->value)&&$_smarty_tpl->tpl_vars['isSeller']->value) {?>
<div id="block-history" class="block-center table-responsive clearfix">
    <?php if ($_smarty_tpl->tpl_vars['sellermessages']->value&&count($_smarty_tpl->tpl_vars['sellermessages']->value)) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<span><?php echo smartyTranslate(array('s'=>'Only approved messages will be shown on the product Q&A tab, please use the icons below to toggle the status of the message.','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
 <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/enabled.gif" /> <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/disabled.gif" /> </span>
    <table id="sellermessage-list" class="std">
        <thead>
	        <tr>
		        <th class="first_item"><?php echo smartyTranslate(array('s'=>'ID','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'From','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Product Name','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</th>
		        <th class="item"><?php echo smartyTranslate(array('s'=>'Message','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</th>
		        <th class="last_item" style="width:5px"><?php echo smartyTranslate(array('s'=>'Action','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</th>
	        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['sellermessage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sellermessage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sellermessages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['sellermessage']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['sellermessage']->iteration=0;
 $_smarty_tpl->tpl_vars['sellermessage']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['sellermessage']->key => $_smarty_tpl->tpl_vars['sellermessage']->value) {
$_smarty_tpl->tpl_vars['sellermessage']->_loop = true;
 $_smarty_tpl->tpl_vars['sellermessage']->iteration++;
 $_smarty_tpl->tpl_vars['sellermessage']->index++;
 $_smarty_tpl->tpl_vars['sellermessage']->first = $_smarty_tpl->tpl_vars['sellermessage']->index === 0;
 $_smarty_tpl->tpl_vars['sellermessage']->last = $_smarty_tpl->tpl_vars['sellermessage']->iteration === $_smarty_tpl->tpl_vars['sellermessage']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['sellermessage']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['index']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['sellermessage']->last;
?>
	        <tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['index']%2) {?>alternate_item<?php }?>">
		        <td class="history_link bold">
			        <?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>

		        </td>
		        <td>
		            <p style="overflow:hidden;white-space:nowrap;"> 
		            <?php echo nl2br($_smarty_tpl->tpl_vars['sellermessage']->value['from_name']);?>
<br />
		            <?php if (!$_smarty_tpl->tpl_vars['hide_email']->value) {?><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['from_email'];?>
<br /><?php }?>
		            <?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['date_add'];?>
<br />
		            <?php if (($_smarty_tpl->tpl_vars['sellerinfo']->value->id_seller==$_smarty_tpl->tpl_vars['sellermessage']->value['id_seller'])) {?>
                        <?php echo smartyTranslate(array('s'=>'Status','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
:
	                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/enabled.gif" id="img_message_active_on_<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
" style="cursor:pointer;display:<?php if ($_smarty_tpl->tpl_vars['sellermessage']->value['active']==0) {?>none<?php }?>" onclick="toggle_sellermessage(<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
,0)" />
	                    <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
img/admin/disabled.gif" id="img_message_active_off_<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
" style="cursor:pointer;display:<?php if ($_smarty_tpl->tpl_vars['sellermessage']->value['active']==1) {?>none<?php }?>" onclick="toggle_sellermessage(<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
,1)" />
	                <?php }?>    
		            </p>
		        </td>
		        <td><a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_product'];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_tmp3);?>
"><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['product'];?>
</a></td>
		        <td>
				<?php echo nl2br($_smarty_tpl->tpl_vars['sellermessage']->value['message']);?>

				<?php if (!empty($_smarty_tpl->tpl_vars['sellermessage']->value['attpsname1'])||!empty($_smarty_tpl->tpl_vars['sellermessage']->value['attpsname2'])||!empty($_smarty_tpl->tpl_vars['sellermessage']->value['attpsname3'])) {?>
					<br><br>				
					<strong><?php echo smartyTranslate(array('s'=>'Attachments','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</strong><br>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilesellermessenger','sellermessages',array(),true);?>
?filename=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attpsname1'];?>
&id_seller=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_seller'];?>
" title="<?php echo smartyTranslate(array('s'=>'View file','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attshname1'];?>
</a><br>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilesellermessenger','sellermessages',array(),true);?>
?filename=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attpsname2'];?>
&id_seller=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_seller'];?>
" title="<?php echo smartyTranslate(array('s'=>'View file','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attshname2'];?>
</a><br>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilesellermessenger','sellermessages',array(),true);?>
?filename=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attpsname3'];?>
&id_seller=<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_seller'];?>
" title="<?php echo smartyTranslate(array('s'=>'View file','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['attshname3'];?>
</a><br>
				<?php }?>

				
				</td>
		        <td>
		        <?php if (($_smarty_tpl->tpl_vars['sellerinfo']->value->id_seller==$_smarty_tpl->tpl_vars['sellermessage']->value['id_seller']&&$_smarty_tpl->tpl_vars['sellermessage']->value['is_customer_message'])) {?>
				<button type="submit" class="button btn btn-default"  onclick="openMessageForm(<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
)">
					<span><?php echo smartyTranslate(array('s'=>'Reply','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
&nbsp;<i class="icon-mail-reply"></i></span>
				</button>
		        <?php }?>
		        </td>
	        </tr>
            <tr id="trMessageForm_<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
" style="display:none;"><td colspan="7" align="center">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('agilesellermessenger','sellermessages',array(),true);?>
" id="messageForm_<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
" onsubmit="return onSubmitMessageForm(<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
)">
                <div>
					<input type="hidden" name="id_agile_sellermessage" value="<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
" />
					<textarea rows="7" style="width:100%" name="reply_message" id="reply_message_<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
"></textarea>
					<p style="margin:1em 1em 1em 1em;"><?php echo smartyTranslate(array('s'=>'Please note, the orignal message will be inluded automatically.','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</p>
					<button type="submit" name="submitReplyMessage" class="button btn btn-default">
						<span><?php echo smartyTranslate(array('s'=>'Send','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
&nbsp;<i class="icon-chevron-right right"></i></span>
					</button>
					<button type="button" name="cancelReplyMessage"  class="btn btn-default" onclick="closeMessageForm(<?php echo $_smarty_tpl->tpl_vars['sellermessage']->value['id_agile_sellermessage'];?>
)">
						<i class="icon-remove"></i>&nbsp;<?php echo smartyTranslate(array('s'=>'Cancel','mod'=>'agilesellermessenger'),$_smarty_tpl);?>

					</button>
                </div>
            </form>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <p class="warning"><?php echo smartyTranslate(array('s'=>'You do not yet have a message.','mod'=>'agilesellermessenger'),$_smarty_tpl);?>
</p>
    <?php }?>
</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/front/seller_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
