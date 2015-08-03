<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209336243855bf247aa08dd8-31679368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9166d0724b691bbe061df4bbac7a37a9b5a9dfa' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/themes/traveler/index.tpl',
      1 => 1438586515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209336243855bf247aa08dd8-31679368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME_TAB_CONTENT' => 0,
    'HOOK_HOME_TAB' => 0,
    'HOOK_HOME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247aabdf91_61881097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247aabdf91_61881097')) {function content_55bf247aabdf91_61881097($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)) {?>
	<div class="container info-banners">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"ib1"),$_smarty_tpl);?>
 
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"ib2"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"ib3"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"ib4"),$_smarty_tpl);?>

	</div>
	<div class="container">
	<a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb1"),$_smarty_tpl);?>
 </a>
	<a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb2"),$_smarty_tpl);?>
 </a>
	<a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb3"),$_smarty_tpl);?>
 </a>
        <a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb4"),$_smarty_tpl);?>
 </a>
	<a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb5"),$_smarty_tpl);?>
 </a>
	<a href="#"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"sb6"),$_smarty_tpl);?>
 </a> 
	</div>
	
	<div class="promo-banners">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"promo-title"),$_smarty_tpl);?>

	<ul class="promo-slider">
	<li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"promo1"),$_smarty_tpl);?>
 </li>
	<li><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"promo2"),$_smarty_tpl);?>
</li>
<!---->
	</ul>
<!---->
	</div>
	<div class="pop_tours">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"poptour-title"),$_smarty_tpl);?>

	<ul class="slider_popular_tours">
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=japan"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"p1"),$_smarty_tpl);?>
 </a></li>
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=usa"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"p2"),$_smarty_tpl);?>
</a></li>
	<li><a href="./search?controller=search&orderby=position&orderway=desc&search_loc=china"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"p5"),$_smarty_tpl);?>
 </a></li>
<!---->
	</ul>
	</div>
	<div class="clearfix"></div>
    <!-- <ul id="home-page-tabs" class="nav nav-tabs">
			<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value;?>

		</ul> -->
	<?php }?>
	<div class="tab-content">				
	<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value;?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"test"),$_smarty_tpl);?>

	<div class="foo_wrapper">
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"foo1"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"foo2"),$_smarty_tpl);?>

	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"foo3"),$_smarty_tpl);?>

	</div>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getBelvgBlockContent'][0][0]->getBlockContent(array('id'=>"discount"),$_smarty_tpl);?>

	</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME']->value)) {?>
	<div class="clearfix"><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>
</div>
<?php }?>

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
</style><?php }} ?>
