<?php /* Smarty version Smarty-3.1.5, created on 2011-12-03 19:10:57
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_blogpost_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9687280084eda3fe7700c61-86365560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e056d10919655979ef0f9aff0234fbef346dff' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_blogpost_content.tpl',
      1 => 1322932179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9687280084eda3fe7700c61-86365560',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4eda3fe776715',
  'variables' => 
  array (
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4eda3fe776715')) {function content_4eda3fe776715($_smarty_tpl) {?><div id="post">
   <div class="content">
<?php echo $_smarty_tpl->tpl_vars['post']->value['Content'];?>

   </div>
</div>
<?php }} ?>