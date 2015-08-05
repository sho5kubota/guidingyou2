<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 15:54:07
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/products/informations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101321552655c06f9fa7d815-68867786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca47d80d4d7c142bbc67ab231c0582d3e8e27db2' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/agilemultipleseller/views/templates/front/products/informations.tpl',
      1 => 1438586513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101321552655c06f9fa7d815-68867786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isoTinyMCE' => 0,
    'theme_css_dir' => 0,
    'ad' => 0,
    'product_detail' => 0,
    'base_dir' => 0,
    'check_product_association_ajax' => 0,
    'id_language' => 0,
    'languages' => 0,
    'class_input_ajax' => 0,
    'product' => 0,
    'categories' => 0,
    'new_categories' => 0,
    'category' => 0,
    'cat' => 0,
    'is_agilesellerlistoptions_installed' => 0,
    'HOOK_PRODYCT_LIST_OPTIONS' => 0,
    'currency' => 0,
    'order_out_of_stock' => 0,
    'countries' => 0,
    'country' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c06fa0064896_48326640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c06fa0064896_48326640')) {function content_55c06fa0064896_48326640($_smarty_tpl) {?>    <script type="text/javascript">
      var iso = "<?php echo $_smarty_tpl->tpl_vars['isoTinyMCE']->value;?>
";
      var pathCSS = "<?php echo $_smarty_tpl->tpl_vars['theme_css_dir']->value;?>
";
      var ad = "<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
";
    </script>
	<script type="text/javascript">
    $(document).ready(function() {

    var stateStr = '<?php echo $_smarty_tpl->tpl_vars['product_detail']->value->state[1];?>
';

    if(stateStr != '') {

      var country = '<?php echo $_smarty_tpl->tpl_vars['product_detail']->value->country[1];?>
';

      $.ajax({
        'type': 'POST',
        'url': baseDir + 'modules/ajax_state_prod.php',
        'data': 'country='+country,
        success: function(data) {
          var obj = jQuery.parseJSON(data);

          if(obj.contain_state) {
            $.each(obj.states, function(index, value) {

              if(stateStr == value.name)
                $('#id_state').append('<option selected="selected" value="'+ value.name +'">'+ value.name +'</option>');
              else
                 $('#id_state').append('<option value="'+ value.name +'">'+ value.name +'</option>');
            });

            $('.id_state_prod').fadeIn("slow");
          } else {
             $('#id_state').val('');
             $('.id_state_prod').hide();
          }

        }
     });

      $('.id_state_prod').show();
    }
    else {
      $('#id_state').val('');
      $('.id_state_prod').hide();
    }
    tinySetup(
    {
    selector: ".rte" ,
    toolbar1 : "code,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup"
    });

    $("#available_for_order").click(function(){
    if ($(this).is(':checked'))
    {
    $('#show_price').attr('checked', 'checked');
    $('#show_price').attr('disabled', 'disabled');
    }
    else
    {
    $('#show_price').removeAttr('disabled');
    }
    });
    });

    function changeMyLanguage(field, fieldsString, id_language_new, iso_code)
    {
    changeLanguage(field, fieldsString, id_language_new, iso_code);
    $("img[id^='language_current_']").attr("src","<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
img/l/" + id_language_new + ".jpg");
    }
  </script>

  <!-- CHECK IF HAS STATE AND IF HAVE SHOW STATE -->
  <script type="text/javascript">
  $(document).ready(function() {

    $('#id_country').on('change', function() {
      var country = $('#id_country').val();

     $.ajax({
        'type': 'POST',
        'url': baseDir + 'modules/ajax_state_prod.php',
        'data': 'country='+country,
        success: function(data) {
          var obj = jQuery.parseJSON(data);

          if(obj.contain_state) {
            $.each(obj.states, function(index, value) {

              $('#id_state').append('<option value="'+ value.name +'">'+ value.name +'</option>');
            });

            $('.id_state_prod').fadeIn("slow");
          } else {
             $('#id_state').val('');
             $('.id_state_prod').fadeOut("slow");
          }

        }
     });
     
    });

  });
  </script>




<?php if (isset($_smarty_tpl->tpl_vars['check_product_association_ajax']->value)&&$_smarty_tpl->tpl_vars['check_product_association_ajax']->value) {?>
<?php $_smarty_tpl->tpl_vars['class_input_ajax'] = new Smarty_variable('check_product_name ', null, 0);?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['class_input_ajax'] = new Smarty_variable('', null, 0);?>
<?php }?>




<input type="hidden" name="state">
<div id="product-informations" class="panel product-tab">
  <input type="hidden" name="submitted_tabs[]" value="Informations" />
  <h3 class="tab"><?php echo smartyTranslate(array('s'=>'Information','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</h3>
  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="name_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span class="label-tooltip" data-toggle="tooltip"
				title="<?php echo smartyTranslate(array('s'=>'Invalid characters:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 &lt;&gt;;=#{}">
        <?php echo smartyTranslate(array('s'=>'Title:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php ob_start();?><?php if (!$_smarty_tpl->tpl_vars['product']->value->id||Configuration::get('PS_FORCE_FRIENDLY_PRODUCT')) {?><?php echo "copy2friendlyUrl";?><?php }?><?php $_tmp3=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_class'=>((string)$_smarty_tpl->tpl_vars['class_input_ajax']->value).$_tmp3." updateCurrentText",'input_value'=>$_smarty_tpl->tpl_vars['product']->value->name,'input_name'=>'name'), 0);?>

    </div>
  </div>




  
  

  


  
  <div class="form-group" <?php if (empty($_smarty_tpl->tpl_vars['categories']->value)) {?> style="display:none;" <?php }?>>
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="id_category_default">
      <span>
          <?php echo smartyTranslate(array('s'=>'Category','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <div class="row">
        <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <select id="id_category_default" name="id_category_default">
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
            <optgroup label="<?php echo $_smarty_tpl->tpl_vars['category']->value['name_main'];?>
">
              <?php if (count($_smarty_tpl->tpl_vars['category']->value['child'])>0) {?>
                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                  <option <?php if ($_smarty_tpl->tpl_vars['product']->value->id_category_default==$_smarty_tpl->tpl_vars['cat']->value['id_category']) {?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</option>
                <?php } ?>
              <?php }?>
            </optgroup>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>



  
  

  
  <div class="form-group" <?php if ($_smarty_tpl->tpl_vars['is_agilesellerlistoptions_installed']->value) {?><?php } else { ?>style="display:none;"<?php }?>>
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
      <span>
        <?php echo smartyTranslate(array('s'=>'List Options','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
 
        <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_PRODYCT_LIST_OPTIONS']->value;?>

        </div>
    </div>
  </div>

  
  
  

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="price">
      <span>
        <?php echo smartyTranslate(array('s'=>'Retail Price','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <div class="row">
        <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <div class="input-group">
            <input type="text" name="price" id="price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
" class="form-control"/>
            <span class="input-group-addon">(<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
)</span>
          </div>
           <small>Note: ０１２３４５ String is Not Available</small>
        </div>
      </div>
    </div>
  </div>

  
 

  
  <div class="form-group" style="display:none">
      <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="out_of_stock">
        <?php echo smartyTranslate(array('s'=>'When out of stock','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </label>
      <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
        <p class="radio">
          <label for="out_of_stock_1" class="control-label">
            <input id="out_of_stock_1" type="radio" value="0" class="out_of_stock" name="out_of_stock" <?php if ($_smarty_tpl->tpl_vars['product']->value->out_of_stock==0) {?> checked <?php }?> >
            <?php echo smartyTranslate(array('s'=>'Deny orders','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

          </label>
        </p>
        <p class="radio">
          <label for="pack_product" class="control-label">
            <input id="out_of_stock_2" type="radio" value="1" class="out_of_stock" name="out_of_stock"  <?php if ($_smarty_tpl->tpl_vars['product']->value->out_of_stock==1) {?> checked <?php }?> >
                <?php echo smartyTranslate(array('s'=>'Allow orders','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
:
          </label>
        </p>
        <p class="radio">
          <label for="out_of_stock_3" class="control-label">
            <input id="out_of_stock_3" type="radio" value="2" class="out_of_stock" name="out_of_stock" <?php if ($_smarty_tpl->tpl_vars['product']->value->out_of_stock==2) {?> checked <?php }?>>
              <?php echo smartyTranslate(array('s'=>'Default','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
:
              <?php if ($_smarty_tpl->tpl_vars['order_out_of_stock']->value==1) {?>
              <?php echo smartyTranslate(array('s'=>'Allow orders','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

              <?php } else { ?>
              <?php echo smartyTranslate(array('s'=>'Deny orders','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

              <?php }?>
              <?php echo smartyTranslate(array('s'=>' as set in Preferences'),$_smarty_tpl);?>

            </label>
        </p>
          </div>
    </div>

  
  

  
  

  
  

  
  

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
      <?php echo smartyTranslate(array('s'=>'Status:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

    </label>
    <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
      <p class="radio">
        <label for="active_on" class="control-label">
          <input type="radio" name="active" id="active_on" value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->active||!$_smarty_tpl->tpl_vars['product']->value->isAssociatedToShop()) {?>checked="checked" <?php }?> />
            <?php echo smartyTranslate(array('s'=>'Enabled','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

          </label>
      </p>
      <p class="radio">
        <label for="active_off" class="control-label">
          <input type="radio" name="active" id="active_off" value="0" <?php if (!$_smarty_tpl->tpl_vars['product']->value->active&&$_smarty_tpl->tpl_vars['product']->value->isAssociatedToShop()) {?>checked="checked"<?php }?> />
            <?php echo smartyTranslate(array('s'=>'Disabled','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

          </label>
      </p>
    </div>
  </div>

  
  <div class="form-group" style="display:none">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="visibility">
      <?php echo smartyTranslate(array('s'=>'Visibility:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <div class="row">
        <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <select name="visibility" id="visibility">
            <option value="both" <?php if ($_smarty_tpl->tpl_vars['product']->value->visibility=='both') {?>selected="selected"<?php }?> ><?php echo smartyTranslate(array('s'=>'Everywhere','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
            <option value="catalog" <?php if ($_smarty_tpl->tpl_vars['product']->value->visibility=='catalog') {?>selected="selected"<?php }?> ><?php echo smartyTranslate(array('s'=>'Catalog only','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
            <option value="search" <?php if ($_smarty_tpl->tpl_vars['product']->value->visibility=='search') {?>selected="selected"<?php }?> ><?php echo smartyTranslate(array('s'=>'Search only','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
            <option value="none" <?php if ($_smarty_tpl->tpl_vars['product']->value->visibility=='none') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Nowhere','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  
  <div style="display:none" id="product_options" class="form-group" <?php if (!$_smarty_tpl->tpl_vars['product']->value->active) {?>style="display:none"<?php }?> >
    <div class="col-lg-12">
      <div class="form-group">
        <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="available_for_order">
          <?php echo smartyTranslate(array('s'=>'Options','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

        </label>
        <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
          <div class="checkbox agile-padding-left20" >
            <input type="checkbox" name="available_for_order" id="available_for_order" value="1" class="comparator" <?php if ($_smarty_tpl->tpl_vars['product']->value->available_for_order) {?>checked<?php }?>  />
              <label for="available_for_order"><?php echo smartyTranslate(array('s'=>'available for order','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
            </div>
          <div class="checkbox agile-padding-left20" >
            <input type="checkbox" name="show_price" id="show_price" value="1" class="comparator" <?php if ($_smarty_tpl->tpl_vars['product']->value->show_price) {?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['product']->value->available_for_order) {?>disabled="disabled"<?php }?>/>
              <label for="show_price"><?php echo smartyTranslate(array('s'=>'show price','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
            </div>
          <div class="checkbox agile-padding-left20" >
            <input type="checkbox" name="online_only" id="online_only" value="1" class="comparator" <?php if ($_smarty_tpl->tpl_vars['product']->value->online_only) {?>checked="checked"<?php }?> />
              <label for="online_only"><?php echo smartyTranslate(array('s'=>'online only (not sold in store)','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</label>
            </div>
        </div>
      </div>
    </div>
  </div>

    
    <div class="form-group" style="display:none">
      <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="condition">
        <?php echo smartyTranslate(array('s'=>'Condition','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </label>
      <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
        <div class="row">
          <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
            <select name="condition" id="condition">
              <option value="new" <?php if ($_smarty_tpl->tpl_vars['product']->value->condition=='new') {?>selected="selected"<?php }?> ><?php echo smartyTranslate(array('s'=>'New','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
              <option value="used" <?php if ($_smarty_tpl->tpl_vars['product']->value->condition=='used') {?>selected="selected"<?php }?> ><?php echo smartyTranslate(array('s'=>'Used','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
              <option value="refurbished" <?php if ($_smarty_tpl->tpl_vars['product']->value->condition=='refurbished') {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Refurbished','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    
    

    
    





<div class="form-group">
      <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="description_short_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
        <span class="label-tooltip" data-toggle="tooltip"
          title="<?php echo smartyTranslate(array('s'=>'Appears in the product list(s), and on the top of the product page.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
          <?php echo smartyTranslate(array('s'=>'Short description','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

        </span>
      </label>
    <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/textarea_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_name'=>'description_short','input_value'=>$_smarty_tpl->tpl_vars['product']->value->description_short,'default_row'=>10,'class'=>"rte",'max'=>400), 0);?>

    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="description_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span class="label-tooltip" data-toggle="tooltip"
        title="<?php echo smartyTranslate(array('s'=>'Appears in the body of the product page','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
        <?php echo smartyTranslate(array('s'=>'Description:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/textarea_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_name'=>'description','input_value'=>$_smarty_tpl->tpl_vars['product']->value->description,'default_row'=>10,'class'=>"rte",'max'=>400), 0);?>

    </div>
  </div>




   
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="address">
      <span>
        <?php echo smartyTranslate(array('s'=>'Location','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['product']->value->address,'input_name'=>'address'), 0);?>

    </div>
  </div>


   
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="address2">
      <span>
        <?php echo smartyTranslate(array('s'=>'Location (Line 2)','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['product']->value->address2,'input_name'=>'address2'), 0);?>

    </div>
  </div>


   
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="city">
      <span>
        <?php echo smartyTranslate(array('s'=>'City','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['product']->value->city,'input_name'=>'city'), 0);?>

    </div>
  </div>

  <div class="form-group id_state_prod">
    <label for="id_state" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required">
      <span><?php echo smartyTranslate(array('s'=>'State','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <div class="row">
        <div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <select name="state" id="id_state">
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3 required" for="country">
      <span>
        <?php echo smartyTranslate(array('s'=>'Country','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <div class="row">
        <div class="agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
          <select id="id_country" name="country">
            
            
            <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['country']->key;
?>
                <option <?php if ($_smarty_tpl->tpl_vars['product_detail']->value->country[1]==$_smarty_tpl->tpl_vars['country']->value['name']) {?> selected="selected"<?php }?>
                value="<?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
">
                  <?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>

                </option>
              <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </div>




<div class="form-group">
    <label for="longitude" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
      <span><?php echo smartyTranslate(array('s'=>'Longitude','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
    </label>
    <div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
      <div class="row">
        <div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3 agile-col-xl-2">
          <input type="text" id="longitude" name="longitude" class="form-control" value="<?php if (isset($_POST['longitude'])) {?><?php echo $_POST['longitude'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['product']->value->longitude)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->longitude, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="latitude" class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
      <span><?php echo smartyTranslate(array('s'=>'Latitude','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
    </label>
    <div class=" agile-col-sm-7 agile-col-md-7 agile-col-lg-7 agile-col-xl-7">
      <div class="row">
        <div class="agile-col-sm-5 agile-col-md-4 agile-col-lg-3 agile-col-xl-2">
          <input type="text" id="latitude" name="latitude" class="form-control" value="<?php if (isset($_POST['latitude'])) {?><?php echo $_POST['latitude'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['product']->value->latitude)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->latitude, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?>" />
        </div>
      </div>
    </div>
  </div>




<div class="form-group">
    <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
      <span><?php echo smartyTranslate(array('s'=>'Map','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span>
    </label>
    <div class=" agile-col-sm-9 agile-col-md-9 agile-col-lg-9 agile-col-xl-9">
      <div class="row">
        <div class="agile-col-sm-12 agile-col-md-12 agile-col-lg-12 agile-col-xl-12">
          <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."./templates/googlemap_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
      </div>
    </div>
  </div>



  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_keywords_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span class="label-tooltip" data-toggle="tooltip"
        title="<?php echo smartyTranslate(array('s'=>'Tags separated by commas (e.g. dvd, dvd player, hifi)','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 - <?php echo smartyTranslate(array('s'=>'Forbidden characters:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 !&lt;;&gt;;?=+#&quot;&deg;{}_$%">
        <?php echo smartyTranslate(array('s'=>'Meta Tags','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php ob_start();?><?php if (!$_smarty_tpl->tpl_vars['product']->value->id||Configuration::get('PS_FORCE_FRIENDLY_PRODUCT')) {?><?php echo "copy2friendlyUrl";?><?php }?><?php $_tmp4=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_class'=>((string)$_smarty_tpl->tpl_vars['class_input_ajax']->value).$_tmp4." updateCurrentText",'input_value'=>$_smarty_tpl->tpl_vars['product']->value->meta_keywords,'input_name'=>'meta_keywords'), 0);?>

    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_description_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span>
        <?php echo smartyTranslate(array('s'=>'Meta Description','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php ob_start();?><?php if (!$_smarty_tpl->tpl_vars['product']->value->id||Configuration::get('PS_FORCE_FRIENDLY_PRODUCT')) {?><?php echo "copy2friendlyUrl";?><?php }?><?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_class'=>((string)$_smarty_tpl->tpl_vars['class_input_ajax']->value).$_tmp5." updateCurrentText",'input_value'=>$_smarty_tpl->tpl_vars['product']->value->meta_description,'input_name'=>'meta_description'), 0);?>

    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="meta_title_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span>
        <?php echo smartyTranslate(array('s'=>'Meta Title','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php ob_start();?><?php if (!$_smarty_tpl->tpl_vars['product']->value->id||Configuration::get('PS_FORCE_FRIENDLY_PRODUCT')) {?><?php echo "copy2friendlyUrl";?><?php }?><?php $_tmp6=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_class'=>((string)$_smarty_tpl->tpl_vars['class_input_ajax']->value).$_tmp6." updateCurrentText",'input_value'=>$_smarty_tpl->tpl_vars['product']->value->meta_title,'input_name'=>'meta_title'), 0);?>

    </div>
  </div>

  
  <div class="form-group">
    <label class="control-label agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="link_rewrite_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
      <span class="label-tooltip" data-toggle="tooltip"
        title="<?php echo smartyTranslate(array('s'=>'Leave it empty if you want the system to generate one for you','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
        <?php echo smartyTranslate(array('s'=>'Friendly URL','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

      </span>
    </label>
    <div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
      <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['agilemultipleseller_views']->value)."/templates/front/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['product']->value->link_rewrite,'input_name'=>'link_rewrite'), 0);?>

    </div>
  </div>

<div class="form-group">
  <label class="control-label  agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="tags_<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
">
    <span class="label-tooltip" data-toggle="tooltip"
      title="<?php echo smartyTranslate(array('s'=>'Each tag has to be followed by a comma. The following characters are forbidden: %s','sprintf'=>'!&lt;;&gt;;?=+#&quot;&deg;{}_$%','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
      <?php echo smartyTranslate(array('s'=>'Tags:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>

    </span>
  </label>
  <div class="agile-col-md-8 agile-col-lg-8 agile-col-xl-8">
    <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
    <div class="row">
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
      
      <script type="text/javascript">
        $().ready(function () {
        var input_id = 'tags_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
';
        $('#'+input_id).tagify({delimiters: [13,44], addTagPrompt: '<?php echo smartyTranslate(array('s'=>'Add tag','mod'=>'agilemultipleseller','js'=>1),$_smarty_tpl);?>
'});
        $('#product_form').submit( function() {
        $(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
        });
        });
      </script>
      
      <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
      <div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
">
        <div class="col-lg-9">
          <?php }?>
          <input type="text" id="tags_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="tagify updateCurrentText" name="tags_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" value="<?php echo smarty_modifier_htmlentitiesUTF8($_smarty_tpl->tpl_vars['product']->value->getTags($_smarty_tpl->tpl_vars['language']->value['id_lang'],true));?>
" />
          <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
        </div>
        
      </div>
      <?php }?>
      <?php } ?>
      <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
    </div>
    <?php }?>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

  $('#saveInfo').click(function() {
    alert("<?php echo smartyTranslate(array('s'=>'Please upload your image after saving information.','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
");
  });

});

</script>

  


<div class="form-group agile-align-center">
    <button id="saveInfo" type="submit" class="agile-btn agile-btn-default" name="submitProduct" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
">
    <i class="icon-save "></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Save','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</span></button >

   
   </div>
   
    <script type="text/javascript">
      hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['id_language']->value;?>
);
    </script>

</div> <!-- product-informations -->

<?php }} ?>
