/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

var instantSearchQueries = [];
$(document).ready(function()
{
	if (typeof blocksearch_type == 'undefined')
		return;
	if (typeof instantsearch != 'undefined' && instantsearch)		
		$("#search_query_" + blocksearch_type).keyup(function(){
			if($(this).val().length > 4)
			{
				stopInstantSearchQueries();
				instantSearchQuery = $.ajax({
					url: search_url + '?rand=' + new Date().getTime(),
					data: {
						instantSearch: 1,
						id_lang: id_lang,
						q: $(this).val()
					},
					dataType: 'html',
					type: 'POST',
					headers: { "cache-control": "no-cache" },
					async: true,
					cache: false,
					success: function(data){
						if($("#search_query_" + blocksearch_type).val().length > 0)
						{
							tryToCloseInstantSearch();
							$('#center_column').attr('id', 'old_center_column');
							$('#old_center_column').after('<div id="center_column" class="' + $('#old_center_column').attr('class') + '">'+data+'</div>');
							$('#old_center_column').hide();
							// Button override
							ajaxCart.overrideButtonsInThePage();
							$("#instant_search_results a.close").click(function() {
								$("#search_query_" + blocksearch_type).val('');
								return tryToCloseInstantSearch();
							});
							return false;
						}
						else
							tryToCloseInstantSearch();
					}
				});
				instantSearchQueries.push(instantSearchQuery);
			}
			else
				tryToCloseInstantSearch();
		});
	var	keyword;

	/* TODO Ids aa blocksearch_type need to be removed*/
	var width_ac_results = 	$("#search_query_" + blocksearch_type+"modal").parent('form').width();
	if (typeof ajaxsearch != 'undefined' && ajaxsearch)
		$("#search_query_" + blocksearch_type+"modal").autocomplete(
			search_url,
			{
				minChars: 1,
				max: 10,
				width: (700),
				selectFirst: false,
				scroll: false,
				dataType: "json",
				formatItem: function(data, i, max, value, term) {
					return value;
				},
				parse: function(data) {
					var mytab = new Array();
					for (var i = 0; i < data.length; i++)
					{
						console.log(data);
						if(typeof data[i][0].countryflg != 'undefined'){
							mytab[mytab.length] = { data: data[i][0], value: ' Country '+ data[i][0].country };
							keyword = data[i][0].countryflg;
						}
						else if(typeof data[i][0].cityflg != 'undefined'){
							if(data[i][0].state == null){
								mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' City > '+ data[i][0].city };	
							} else {
								mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' State >' +data[i][0].state + ' City > '+ data[i][0].city };	
							}
							keyword = data[i][0].cityflg;
							
						}
						else if(typeof data[i][0].stateflg != 'undefined'){
							mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' State > '+ data[i][0].state };
							keyword = data[i][0].stateflg;
						}
						else if(typeof data[i][0].allflg != 'undefined'){
							for(var x = 0; x < data[0].length; x++){
								mytab[mytab.length] = { data: data[0][x], value: 'Country > '+data[0][x].country + ' State > '+ data[0][x].state };
							}
							if(typeof data[1] != 'undefined'){

							console.log(data);
							
							for(var x = 0; x < 5; x++){
								mytab[mytab.length] = { data: data[1][x], value: 'Country > '+data[1][x].country + ' City > '+ data[1][x].city };
							
							}

							}

							
							
						}
					}
						
					return mytab;
				},
				extraParams: {
					ajaxSearch: 1,
					id_lang: id_lang
				}
			}
		)
		.result(function(event, data, formatted) {
			console.log(data);
			
			if(typeof data.countryflg != 'undefined'){
				$('#search_query_' + blocksearch_type+"modal").val(data.country);
				// document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_original='+data.country+'&search_cat=0&search_words=';
			} else if(typeof data.stateflg != 'undefined'){
				$('#search_query_' + blocksearch_type+"modal").val(data.country+' '+data.state);
				// document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_state='+data.state+'&search_original='+data.state+'&search_cat=0&search_words=';
			} else if (typeof data.cityflg != 'undefined'){
				$('#search_query_' + blocksearch_type+"modal").val(data.country+' '+data.city);
				if(data.state == null){
					// document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_city='+data.city+'&search_original='+data.city+'&search_cat=0&search_words=';
				} else{
					// document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_state='+data.state+'&search_city='+data.city+'&search_original='+data.city+'&search_cat=0&search_words=';
				}

			} else if (typeof data.allflg != 'undefined'){
				
					$('#search_query_' + blocksearch_type+"modal").val(data.allflg);
					// document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_city='+data.city+'&search_original='+data.allflg+'&search_cat=0&search_words=';
				

			}
		});

var width_ac_results2 = 	$("#search_query_" + blocksearch_type).parent('form').width();
if (typeof ajaxsearch != 'undefined' && ajaxsearch)
$("#search_query_" + blocksearch_type).autocomplete(
			search_url,
			{
				minChars: 1,
				max: 10,
				width: (width_ac_results2 > 0 ? width_ac_results2 : 500),
				selectFirst: false,
				scroll: false,
				dataType: "json",
				formatItem: function(data, i, max, value, term) {
					return value;
				},
				parse: function(data) {
					var mytab = new Array();
					for (var i = 0; i < data.length; i++)
					{
						if(typeof data[i][0].countryflg != 'undefined'){
							mytab[mytab.length] = { data: data[i][0], value: ' Country '+ data[i][0].country };
							keyword = data[i][0].countryflg;
						}
						else if(typeof data[i][0].cityflg != 'undefined'){
							if(data[i][0].state == null){
								mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' City > '+ data[i][0].city };	
							} else {
								mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' State >' +data[i][0].state + ' City > '+ data[i][0].city };	
							}
							keyword = data[i][0].cityflg;
							
						}
						else if(typeof data[i][0].stateflg != 'undefined'){
							mytab[mytab.length] = { data: data[i][0], value: 'Country > '+data[i][0].country+ ' State > '+ data[i][0].state };
							keyword = data[i][0].stateflg;
						}
						else if(typeof data[0][0].allflg != 'undefined'){
console.log(data);
							for(var x = 0; x < data[0].length; x++){
								mytab[mytab.length] = { data: data[0][x], value: 'Country > '+data[0][x].country + ' State > '+ data[0][x].state };
							}
							if(typeof data[1] != 'undefined'){
							console.log(data);
							
							for(var x = 0; x < data[0].length; x++){
								mytab[mytab.length] = { data: data[1][x], value: 'Country > '+data[1][x].country + ' City > '+ data[1][x].city };
							
							}

							}
						}

					}
						
					return mytab;
				},
				extraParams: {
					ajaxSearch: 1,
					id_lang: id_lang
				}
			}
		)
		.result(function(event, data, formatted) {
			console.log(data);
			
			if(typeof data.countryflg != 'undefined'){
				$('#search_query_' + blocksearch_type).val(data.country);
				//document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_original='+data.country+'&search_cat=0&search_words=';
			} else if(typeof data.stateflg != 'undefined'){
				$('#search_query_' + blocksearch_type).val(data.country+' '+data.state);
				//document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_state='+data.state+'&search_original='+data.state+'&search_cat=0&search_words=';
			} else if (typeof data.cityflg != 'undefined'){
				$('#search_query_' + blocksearch_type).val(data.country+' '+data.city);
				if(data.state == null){
					//document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_city='+data.city+'&search_original='+data.city+'&search_cat=0&search_words=';
				} else{
					//document.location.href = 'search?controller=search&orderby=position&orderway=desc&search_loc='+data.country+'&search_state='+data.state+'&search_city='+data.city+'&search_original='+data.city+'&search_cat=0&search_words=';
				}

			} else if (typeof data.allflg != 'undefined'){
				$('#search_query_' + blocksearch_type).val(data.allflg);
			}
		});
});
function tryToCloseInstantSearch()
{
	if ($('#old_center_column').length > 0)
	{
		$('#center_column').remove();
		$('#old_center_column').attr('id', 'center_column');
		$('#center_column').show();
		return false;
	}
}

function stopInstantSearchQueries()
{
	for(i=0;i<instantSearchQueries.length;i++)
		instantSearchQueries[i].abort();
	instantSearchQueries = new Array();
}