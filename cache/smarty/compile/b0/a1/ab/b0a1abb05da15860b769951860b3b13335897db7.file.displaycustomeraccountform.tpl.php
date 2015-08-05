<?php /* Smarty version Smarty-3.1.19, created on 2015-08-03 17:36:06
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/hook/displaycustomeraccountform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184734242155bf3606b96677-30167274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0a1abb05da15860b769951860b3b13335897db7' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/hook/displaycustomeraccountform.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184734242155bf3606b96677-30167274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir_ssl' => 0,
    'sellerinfo' => 0,
    'countries' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55bf3606c03598_67704690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bf3606c03598_67704690')) {function content_55bf3606c03598_67704690($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
modules/agilemultipleseller/js/AgileStatesManagement.js"></script>
<script type="text/javascript">
  idSelectedCountry = <?php if (isset($_POST['id_state'])) {?><?php echo intval($_POST['id_state']);?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['sellerinfo']->value->id_state)) {?><?php echo intval($_smarty_tpl->tpl_vars['sellerinfo']->value->id_state);?>
<?php } else { ?>false<?php }?><?php }?>;
  <?php if (isset($_smarty_tpl->tpl_vars['countries']->value)) {?>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('agileCountries'=>$_smarty_tpl->tpl_vars['countries']->value),$_smarty_tpl);?>

  <?php }?>

  $(document).ready(function() {
    selleraccountsignup();

      $("a#seller_terms").fancybox({
         'type' : 'iframe',
         'width':600,
        'height':600
      });
  });

  function selleraccountsignup()
  {
    if($("input[class='seller_account_signup_check']").is(':checked') )
    {
         $(".agile_account_creation").show();;
    } else
    {
        $(".agile_account_creation").hide();;
    }
  }
</script>

<?php }} ?>
