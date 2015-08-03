        <form method="post" action="{$agilepayoal_redirect_url}" class="std" id="expresscheckout_hidden_form">
            <input type="hidden" name="sl_expresscheckout_id_country" id="sl_expresscheckout_id_country" value="{$sl_country}" />
            <input type="hidden" name="sl_expresscheckout_id_state" id="sl_expresscheckout_id_state" value="{if isset($sl_state)}{$sl_state}{else}0{/if}" />
			<input type="hidden" id="sl_agilepaypalexpress_cycle_base" name="sl_agilepaypalexpress_cycle_base" value="{$cycle_base}">
            <input type="hidden" name="sl_agilepaypalexpress_cycle" id="sl_agilepaypalexpress_cycle" value="" />
            <input type="hidden" name="sl_agilepaypalexpress_cycle_num" id="sl_agilepaypalexpress_cycle_num" value="" />
        </form>
