<?php /* Smarty version Smarty-3.1.19, created on 2015-08-04 17:10:29
         compiled from "/Applications/MAMP/htdocs/testguidingyou2/modules/smartsellerblog/views/templates/front/smartblogform.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92507203655c081856cdf22-49664035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2657c1bdcefea7fb000a7c0872bfc09e1bff28ed' => 
    array (
      0 => '/Applications/MAMP/htdocs/testguidingyou2/modules/smartsellerblog/views/templates/front/smartblogform.tpl',
      1 => 1438675866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92507203655c081856cdf22-49664035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post' => 0,
    'blog' => 0,
    'link' => 0,
    'hasOwnerShip' => 0,
    'id_blog' => 0,
    'modules_dir' => 0,
    'youtube_preview' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55c081858826f7_86834544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c081858826f7_86834544')) {function content_55c081858826f7_86834544($_smarty_tpl) {?> 
<!-- <pre><?php echo print_r($_smarty_tpl->tpl_vars['post']->value);?>
</pre> -->
<div id="agile">
	<div class="panel">
		<?php if (!isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>
			<?php $_smarty_tpl->tpl_vars["id_blog"] = new Smarty_variable("0", null, 0);?>
		<?php } else { ?>
			<?php $_smarty_tpl->tpl_vars["id_blog"] = new Smarty_variable($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'], null, 0);?>
		<?php }?>
		
		<h1 class="withAdditional"><?php echo smartyTranslate(array('s'=>'My Guiding Blog','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</h1>
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink('22','whats-guide-member'), ENT_QUOTES, 'UTF-8', true);?>
" class="additionalLink"><?php echo smartyTranslate(array('s'=>'Explanation of guide membar','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
</a>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ("modules/agilemultipleseller/views/templates/front/seller_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="row" <?php if ($_smarty_tpl->tpl_vars['hasOwnerShip']->value==1) {?><?php } else { ?>style="display:none;"<?php }?>>
		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('smartsellerblog','smartform',array('id_smart_blog_post'=>$_smarty_tpl->tpl_vars['id_blog']->value),true);?>
" enctype="multipart/form-data" method="post" class="form-horizontal std">
			<h3><?php echo smartyTranslate(array('s'=>'Create new blog','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</h3>

			<input type="hidden" name="id_smart_blog_post" 
			<?php if (!isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>
			value="<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'];?>
"
			<?php }?>
			 />

			 <input type="hidden" name="id_author" 
			<?php if (!isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>
			value="<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_author'];?>
"
			<?php }?>
			 />

			<div class="form-group">
				<label class="control-label col-sm-3 col-md-3 col-lg-3 col-xl-3 required" for="title">
					<span><?php echo smartyTranslate(array('s'=>'Title','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<input type="text" name="title" id="title" class="form-control" 
					<?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>
					value="<?php echo $_smarty_tpl->tpl_vars['blog']->value['meta_title'];?>
"
					<?php } elseif (!empty($_smarty_tpl->tpl_vars['post']->value['title'])) {?>
					value="<?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
"
					<?php }?>
					/>
				</div>	
			</div>

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="short_description">
					<span><?php echo smartyTranslate(array('s'=>'Short Description','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<textarea class="textarea"  cols="26" rows="13" id="short_description" name="short_description"><?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?><?php echo $_smarty_tpl->tpl_vars['blog']->value['short_description'];?>
<?php } elseif (!empty($_smarty_tpl->tpl_vars['post']->value['short_description'])) {?><?php echo $_smarty_tpl->tpl_vars['post']->value['short_description'];?>
<?php }?></textarea>
				</div>	


			</div>

			<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
			<script type="text/javascript">
        tinymce.init({
            selector: ".textarea"
        });
    </script>

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="content">
					<span><?php echo smartyTranslate(array('s'=>'Content','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<textarea class="textarea"  cols="26" rows="13" id="content" name="content"><?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?><?php echo $_smarty_tpl->tpl_vars['blog']->value['content'];?>
<?php } elseif (!empty($_smarty_tpl->tpl_vars['post']->value['content'])) {?><?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>
<?php }?></textarea>
				</div>	
			</div>

			<div class="form-group">
		      <label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3">
		        <span class="label-tooltip" data-toggle="tooltip"
		          title="<?php echo smartyTranslate(array('s'=>'Format:','mod'=>'agilemultipleseller'),$_smarty_tpl);?>
 JPG, GIF, PNG.">
		          <?php echo smartyTranslate(array('s'=>'Add Images','mod'=>'smartsellerblog'),$_smarty_tpl);?>

		        </span>
		      </label>

		      <div id="img_upload" class="agile-col-md-7 agile-col-lg-7 agile-col-xl-5" >
						<input <?php if (!isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>disabled="disabled"<?php }?> name="img"  type="file" class="form-control" >
						<!-- <input <?php if (empty($_smarty_tpl->tpl_vars['blog']->value)) {?>disabled="disabled"<?php }?> name="img"  type="file" class="form-control file" data-overwrite-initial="false" data-min-file-count="1"> -->
		      </div>
		    </div>


		     <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>
		    <div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span><?php echo smartyTranslate(array('s'=>'Active Image','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<img src="<?php echo $_smarty_tpl->tpl_vars['modules_dir']->value;?>
/smartblog/images/<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_author'];?>
/<?php echo $_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'];?>
-home-default.jpg">
				</div>	
			</div>
			<?php }?>
		    

			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span><?php echo smartyTranslate(array('s'=>'Youtube URL','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div id="youtube" class="col-sm-7 col-md-5 col-lg-5 col-xl-5">
					<input  <?php if (!isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>disabled="disabled"<?php }?> type="text" name="youtube" class="form-control" <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?>value="<?php echo $_smarty_tpl->tpl_vars['blog']->value['youtube'];?>
"<?php }?> />
				</div>	
			</div>

			<style>
				.videoWrapper {
					position: relative;
					padding-bottom: 56.25%; /* 16:9 */
					padding-top: 25px;
					height: 0;
				}
				.videoWrapper iframe {
					position: absolute;
					top: 0;
					left: 0;
					width: 100%;
					height: 100%;
				}
			</style>

			<script>
				
		
				$(document).ready(function() {

					$('#youtube').on('click', function() {
					if($('#youtube input').attr('disabled') == 'disabled')
						alert('Please save the blog first');
					});

					$('#img_upload').on('click', function() {
					if($('#img_upload input').attr('disabled') == 'disabled')
						alert('Please save the blog first');
					});
				});
		

			</script>



			<?php if (!empty($_smarty_tpl->tpl_vars['youtube_preview']->value)) {?>
			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span><?php echo smartyTranslate(array('s'=>'Youtube Preview','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
					<div class="videoWrapper">
					<?php echo $_smarty_tpl->tpl_vars['youtube_preview']->value;?>

					</div>
				</div>	
			</div>
			<?php }?>


			<div class="form-group">
				<label class="control-label agile-col-sm-3 agile-col-md-3 agile-col-lg-3 agile-col-xl-3" for="embed_youtube">
					<span><?php echo smartyTranslate(array('s'=>'Status','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span>
				</label>

				<div class="agile-col-md-7 agile-col-lg-5 agile-col-xl-5">
					<select name="active">
						<option value="1" <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?> && $blog['active'] == 1}selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Publish','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</option>
						<option value="0" <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['id_smart_blog_post'])) {?> && $blog['active'] == 0}selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Unpublish','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</option>
					</select>
				</div>	
			</div>


			<div class="form-group agile-align-center">
				<button id="Save" type="submit" class="agile-btn agile-btn-default" name="saveBlog" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'smartsellerblog'),$_smarty_tpl);?>
">
				<i class="icon-save"></i>&nbsp;<span><?php echo smartyTranslate(array('s'=>'Save','mod'=>'smartsellerblog'),$_smarty_tpl);?>
</span></button>
			</div>

		</form>
		</div>
	</div>
</div><?php }} ?>
