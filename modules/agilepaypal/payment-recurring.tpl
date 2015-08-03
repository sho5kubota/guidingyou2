<div class="required  select" style=" display:{if intval($displayrepeating) == 0}none{/if}">
                <label for="agilepaypalexpress_cycle" style="display:{if $recurringOnly == 1}none{/if}" >{l s='Repeat? ' mod='agilepaypal'}</label>
	            <select name="agilepaypalexpress_cycle" id="agilepaypalexpress_cycle" style="{if $recurringOnly == 1} visibility: hidden {/if}" onchange="agilePaypalToggleRecurringOpions()">
                {if $recurringOnly != 1}
                <option value="">{l s='One time only' mod='agilepaypal'}</option>
                  {/if}
                  {if $recurringdaily AND ($cycle_base==1 OR $membership_interval == 'DAY')}<option value="D">{l s='Every' mod='agilepaypal'} {$cycle_base} {l s='Day(s)' mod='agilepaypal'}</option>{/if}
	                {if $recurringweekly AND ($cycle_base==1 OR $membership_interval == 'WEEK')}<option value="W">{l s='Every' mod='agilepaypal'} {$cycle_base} {l s='Weeks(s)' mod='agilepaypal'}</option>{/if}
	                {if $recurringmonthly AND ($cycle_base==1 OR $membership_interval == 'MONTH')}<option value="M">{l s='Every' mod='agilepaypal'} {$cycle_base} {l s='Month(s)' mod='agilepaypal'}</option>{/if}
	                {if $recurringyearly AND ($cycle_base==1 OR $membership_interval == 'YEAR')}<option value="Y">{l s='Every' mod='agilepaypal'} {$cycle_base} {l s='Year(s)' mod='agilepaypal'}</option>{/if}
	            </select>
              <span id="span_agilepaypalexpress_cycle_num" style="display:{if $recurringOnly != 1} none {/if}">
              <select name="agilepaypalexpress_cycle_num" id="agilepaypalexpress_cycle_num" style="{if $recurringOnly == 1} visibility: hidden {/if}">
                <option value="">{l s='Until cancelled' mod='agilepaypal'}</option>
                {if $recurringOnly != 1}
                  <option value="1">1</option>
	                <option value="2">2</option>
	                <option value="3">3</option>
	                <option value="4">4</option>
	                <option value="5">5</option>
	                <option value="6">6</option>
	                <option value="7">7</option>
	                <option value="8">8</option>
	                <option value="9">9</option>
	                <option value="10">10</option>
	                <option value="11">11</option>
	                <option value="12">12</option>
	                <option value="13">13</option>
	                <option value="14">14</option>
	                <option value="15">15</option>
	                <option value="16">16</option>
	                <option value="17">17</option>
	                <option value="18">18</option>
	                <option value="19">19</option>
	                <option value="20">20</option>
	                <option value="21">21</option>
	                <option value="22">22</option>
	                <option value="23">23</option>
	                <option value="24">24</option>
                {/if}
	            </select>{if $recurringOnly != 1}&nbsp;{l s='Times' mod='agilepaypal'}{/if}
              </span>
				<br>
        {if $recurringOnly != 1}
          <span style="color:red;">
			{l s='Repeat option for Paypal users only.' mod='agilepaypal'}
		</span>
        {/if}
            </div> 
