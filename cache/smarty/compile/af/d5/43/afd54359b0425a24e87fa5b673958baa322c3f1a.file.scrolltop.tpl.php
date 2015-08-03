<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 16:21:14
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/scrolltop/tpl/scrolltop.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127581796455bf247a935b69-76110938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd54359b0425a24e87fa5b673958baa322c3f1a' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/scrolltop/tpl/scrolltop.tpl',
      1 => 1438586514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127581796455bf247a935b69-76110938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scrollParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf247a979464_44777039',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf247a979464_44777039')) {function content_55bf247a979464_44777039($_smarty_tpl) {?>
<script>
var scrolltotop = {
	setting: { 
		
			startline:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['startline'];?>
, scrollto: 0, scrollduration:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['scrollduration'];?>
, fadeduration:[<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['fadeinduration'];?>
, <?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['fadeoutduration'];?>
]
		
	},
	controlHTML: 
		'<img style="width:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['width'];?>
px; height:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['height'];?>
px" src="<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['image'];?>
" />'
	,
	controlattrs: {
		
			offsetx:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['offsetx'];?>
, offsety:<?php echo $_smarty_tpl->tpl_vars['scrollParams']->value['offsety'];?>

			
	},
	anchorkeyword: '#top',
	state: {isvisible:false, shouldvisible:false},
	scrollup:function(){
		if (!this.cssfixedsupport)
			this.$control.css({opacity:0})
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1)
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},

	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},
	
	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer', zIndex:9999})
				.attr({title:'Scroll Back to Top'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='')
				mainobj.$control.css({width:mainobj.$control.width()})
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}
$(document).ready(function(){
	scrolltotop.init();
});
</script>
<?php }} ?>
