{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($HOOK_HOME_TAB_CONTENT) && $HOOK_HOME_TAB_CONTENT|trim}
    {if isset($HOOK_HOME_TAB) && $HOOK_HOME_TAB|trim}
	<div class="container info-banners">
	{getBelvgBlockContent id="ib1"} 
	{getBelvgBlockContent id="ib2"}
	{getBelvgBlockContent id="ib3"}
	{getBelvgBlockContent id="ib4"}
	</div>
	<div class="container">
	<a href="#">{getBelvgBlockContent id="sb1"} </a>
	<a href="#">{getBelvgBlockContent id="sb2"} </a>
	<a href="#">{getBelvgBlockContent id="sb3"} </a>
        <a href="#">{getBelvgBlockContent id="sb4"} </a>
	<a href="#">{getBelvgBlockContent id="sb5"} </a>
	<a href="#">{getBelvgBlockContent id="sb6"} </a> 
	</div>
	
	<div class="promo-banners">
	{getBelvgBlockContent id="promo-title"}
	<ul class="promo-slider">
	<li>{getBelvgBlockContent id="promo1"} </li>
	<li>{getBelvgBlockContent id="promo2"}</li>
<!--{**
	<li>{getBelvgBlockContent id="promo3"} </li>
**}-->
	</ul>
<!--{**
	<button class="btn btn-default" type="button">Shop now !</button>
**}-->
	</div>
	<div class="pop_tours">
	{getBelvgBlockContent id="poptour-title"}
	<ul class="slider_popular_tours">
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=japan">{getBelvgBlockContent id="p1"} </a></li>
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=usa">{getBelvgBlockContent id="p2"}</a></li>
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=china">{getBelvgBlockContent id="p5"} </a></li>
<!--{**
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=italy">{getBelvgBlockContent id="p3"} </a></li>
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=france">{getBelvgBlockContent id="p4"} </a></li>
**}-->
	</ul>
	</div>
	<div class="clearfix"></div>
    <!-- <ul id="home-page-tabs" class="nav nav-tabs">
			{$HOOK_HOME_TAB}
		</ul> -->
	{/if}
	<div class="tab-content">				
	{$HOOK_HOME_TAB_CONTENT}
	{getBelvgBlockContent id="test"}
	<div class="foo_wrapper">
	{getBelvgBlockContent id="foo1"}
	{getBelvgBlockContent id="foo2"}
	{getBelvgBlockContent id="foo3"}
	</div>
	{getBelvgBlockContent id="discount"}
	</div>
{/if}

{if isset($HOOK_HOME) && $HOOK_HOME|trim}
	<div class="clearfix">{$HOOK_HOME}</div>
{/if}

<script type="text/javascript">
checkSize();
$("img[src='http://guiding-you.co//img/cms/fb_search_compressed.jpg']").click(function(event){
	console.log('alex');
$('#search_block_top').addClass('search_show');
});
$(".icosearch").click(function(event){
	$('#search_block_top').addClass('search_show');
});
window.addEventListener("resize", checkSize);
function checkSize() {
	var a = $(document).width();
	if(a < 600){
		$('.formsearch').css('display','inline-block');
		$('.formsearch').css('width','700px');
		$('.formsearch input').css('height','50px');
		$('.formsearch input').css('margin-bottom','3px');
		$('.formsearch input').css('margin-top','3px');
		
		$('#searchtitle').css('line-height','37px');


	} else {
		$('.formsearch').css('display','inline-flex');
		$('.formsearch').css('width','100%');
		$('.formsearch input').css('height','50px');
		$('#searchtitle').css('line-height','0px');
	}
}

$('.foo_banner div').first().css('cursor', 'pointer');
$('.foo_banner div').first().on('click', function() {
	$('#search_block_top').addClass('search_show');
});
$("img[src='http://guiding-you.co//img/cms/fb_search_compressed.jpg']").css('cursor', 'pointer');

</script>
<style type="text/css">
.icosearch{
	cursor: pointer;
}
.search_show{
	background:rgba(255, 148, 0, 0.87);
}
</style>