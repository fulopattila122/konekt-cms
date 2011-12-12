<?php /* Smarty version Smarty-3.1.5, created on 2011-12-04 17:57:53
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:707162344edb9881bf4513-86866892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73d3decaf92d300fd955a3d5789b5e2fd98f45d4' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/category.tpl',
      1 => 1323014179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '707162344edb9881bf4513-86866892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edb9882c1a46',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edb9882c1a46')) {function content_4edb9882c1a46($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("delikates_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_product_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>