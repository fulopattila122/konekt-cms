<?php /* Smarty version Smarty-3.1.5, created on 2011-12-04 21:44:43
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:945530174edbcdab9b3ee0-68392894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9015ea9c528a8b4ab33f7432a0effc0b30b6bdfa' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/group.tpl',
      1 => 1323027768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '945530174edbcdab9b3ee0-68392894',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edbcdaba86ea',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edbcdaba86ea')) {function content_4edbcdaba86ea($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("delikates_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_product_group.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>