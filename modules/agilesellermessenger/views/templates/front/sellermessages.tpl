{capture name=path}<a href="{$link->getPageLink('my-account', true)}">{l s='My Account' mod='agilesellermessenger'}</a><span class="navigation-pipe">{$navigationPipe}</span>{l s='My Seller Account'  mod='agilesellermessenger'}{/capture}

<h1 class="withAdditional">{l s='My Seller Account' mod='agilesellermessenger'}</h1>
<a href="{$link->getCMSLink('22','whats-guide-member')|escape:'html'}" class="additionalLink">{l s ='Explanation of guide membar' mod='agilemultipleseller'}</a>
{include file="$tpl_dir./errors.tpl"}

{include file="$agilemultipleseller_views./templates/front/seller_tabs.tpl"}

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
            alert("{l s='You must enter your reply message.' mod='agilesellermessenger'}");
            return false;
        }
        return true;
    }
    
    function toggle_sellermessage(id_agile_sellermessage,to_status) {
        var url = "{$base_dir_ssl}" + "modules/agilesellermessenger/ajax_sellermessage.php";
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
{if isset($isSeller) AND $isSeller}
<div id="block-history" class="block-center table-responsive clearfix">
    {if $sellermessages && count($sellermessages)}
	{include file="$tpl_dir./pagination.tpl"}
	<span>{l s='Only approved messages will be shown on the product Q&A tab, please use the icons below to toggle the status of the message.' mod='agilesellermessenger'} <img src="{$base_dir_ssl}img/admin/enabled.gif" /> <img src="{$base_dir_ssl}img/admin/disabled.gif" /> </span>
    <table id="sellermessage-list" class="std">
        <thead>
	        <tr>
		        <th class="first_item">{l s='ID' mod='agilesellermessenger'}</th>
		        <th class="item">{l s='From' mod='agilesellermessenger'}</th>
		        <th class="item">{l s='Product Name' mod='agilesellermessenger'}</th>
		        <th class="item">{l s='Message' mod='agilesellermessenger'}</th>
		        <th class="last_item" style="width:5px">{l s='Action' mod='agilesellermessenger'}</th>
	        </tr>
        </thead>
        <tbody>
        {foreach from=$sellermessages item=sellermessage name=myLoop}
	        <tr class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if} {if $smarty.foreach.myLoop.index % 2}alternate_item{/if}">
		        <td class="history_link bold">
			        {$sellermessage.id_agile_sellermessage}
		        </td>
		        <td>
		            <p style="overflow:hidden;white-space:nowrap;"> 
		            {$sellermessage.from_name|nl2br}<br />
		            {if !$hide_email}{$sellermessage.from_email}<br />{/if}
		            {$sellermessage.date_add}<br />
		            {if ($sellerinfo->id_seller==$sellermessage.id_seller)}
                        {l s='Status' mod='agilesellermessenger'}:
	                    <img src="{$base_dir_ssl}img/admin/enabled.gif" id="img_message_active_on_{$sellermessage.id_agile_sellermessage}" style="cursor:pointer;display:{if $sellermessage.active==0}none{/if}" onclick="toggle_sellermessage({$sellermessage.id_agile_sellermessage},0)" />
	                    <img src="{$base_dir_ssl}img/admin/disabled.gif" id="img_message_active_off_{$sellermessage.id_agile_sellermessage}" style="cursor:pointer;display:{if $sellermessage.active==1}none{/if}" onclick="toggle_sellermessage({$sellermessage.id_agile_sellermessage},1)" />
	                {/if}    
		            </p>
		        </td>
		        <td><a href="{$link->getProductLink({$sellermessage.id_product})}">{$sellermessage.product}</a></td>
		        <td>
				{$sellermessage.message|nl2br}
				{if !empty($sellermessage.attpsname1) OR !empty($sellermessage.attpsname2) OR !empty($sellermessage.attpsname3) }
					<br><br>				
					<strong>{l s='Attachments' mod='agilesellermessenger'}</strong><br>
					<a href="{$link->getModuleLink('agilesellermessenger', 'sellermessages', [], true)}?filename={$sellermessage.attpsname1}&id_seller={$sellermessage.id_seller}" title="{l s='View file' mod='agilesellermessenger'}">{$sellermessage.attshname1}</a><br>
					<a href="{$link->getModuleLink('agilesellermessenger', 'sellermessages', [], true)}?filename={$sellermessage.attpsname2}&id_seller={$sellermessage.id_seller}" title="{l s='View file' mod='agilesellermessenger'}">{$sellermessage.attshname2}</a><br>
					<a href="{$link->getModuleLink('agilesellermessenger', 'sellermessages', [], true)}?filename={$sellermessage.attpsname3}&id_seller={$sellermessage.id_seller}" title="{l s='View file' mod='agilesellermessenger'}">{$sellermessage.attshname3}</a><br>
				{/if}

				
				</td>
		        <td>
		        {if ($sellerinfo->id_seller==$sellermessage.id_seller AND $sellermessage.is_customer_message)}
				<button type="submit" class="button btn btn-default"  onclick="openMessageForm({$sellermessage.id_agile_sellermessage})">
					<span>{l s='Reply' mod='agilesellermessenger'}&nbsp;<i class="icon-mail-reply"></i></span>
				</button>
		        {/if}
		        </td>
	        </tr>
            <tr id="trMessageForm_{$sellermessage.id_agile_sellermessage}" style="display:none;"><td colspan="7" align="center">
            <form method="post" action="{$link->getModuleLink('agilesellermessenger', 'sellermessages', [], true)}" id="messageForm_{$sellermessage.id_agile_sellermessage}" onsubmit="return onSubmitMessageForm({$sellermessage.id_agile_sellermessage})">
                <div>
					<input type="hidden" name="id_agile_sellermessage" value="{$sellermessage.id_agile_sellermessage}" />
					<textarea rows="7" style="width:100%" name="reply_message" id="reply_message_{$sellermessage.id_agile_sellermessage}"></textarea>
					<p style="margin:1em 1em 1em 1em;">{l s='Please note, the orignal message will be inluded automatically.' mod='agilesellermessenger' }</p>
					<button type="submit" name="submitReplyMessage" class="button btn btn-default">
						<span>{l s='Send' mod='agilesellermessenger'}&nbsp;<i class="icon-chevron-right right"></i></span>
					</button>
					<button type="button" name="cancelReplyMessage"  class="btn btn-default" onclick="closeMessageForm({$sellermessage.id_agile_sellermessage})">
						<i class="icon-remove"></i>&nbsp;{l s='Cancel' mod='agilesellermessenger'}
					</button>
                </div>
            </form>
            </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    {else}
        <p class="warning">{l s='You do not yet have a message.' mod='agilesellermessenger'}</p>
    {/if}
</div>
{/if}
{include file="$agilemultipleseller_views./templates/front/seller_footer.tpl"}

