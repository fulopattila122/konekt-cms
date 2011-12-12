<?php /* Smarty version Smarty-3.1.5, created on 2011-12-05 02:00:57
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_admin_add_image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2445262174edc07358d1ea9-81344496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5616b92a9a9d2784eb461c737e59e2551fe06a8f' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_admin_add_image.tpl',
      1 => 1323042653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2445262174edc07358d1ea9-81344496',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edc073595fa2',
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edc073595fa2')) {function content_4edc073595fa2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/fulop/Documents/WebProjects/delides.com/www/lib/Smarty/plugins/function.html_options.php';
?><div id="post">
   <div class="content">
   <!-- The data encoding type, enctype, MUST be specified as below -->
   <form enctype="multipart/form-data" method="POST" action="/__addimage_do">
    Product:  <?php echo smarty_function_html_options(array('name'=>'product_id','options'=>$_smarty_tpl->tpl_vars['products']->value),$_smarty_tpl);?>

    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="image" type="file" />
    <input type="submit" value="Send File" />
   </form>      
   </div>
</div>
<?php }} ?>