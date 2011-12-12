<?php /* Smarty version Smarty-3.1.5, created on 2011-12-03 17:33:34
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/blogpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1634845564eda3fe75fff99-19681600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '045be43b46ec0d38216407f921a6058c0abefa6c' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/blogpost.tpl',
      1 => 1322926398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1634845564eda3fe75fff99-19681600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4eda3fe76a3e6',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4eda3fe76a3e6')) {function content_4eda3fe76a3e6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("delikates_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_blogpost_content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>