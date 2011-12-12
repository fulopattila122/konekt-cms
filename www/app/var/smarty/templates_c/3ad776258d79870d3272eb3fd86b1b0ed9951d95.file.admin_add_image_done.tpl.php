<?php /* Smarty version Smarty-3.1.5, created on 2011-12-05 02:09:02
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/admin_add_image_done.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12118225284edc0b9ec83af0-87692405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ad776258d79870d3272eb3fd86b1b0ed9951d95' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/admin_add_image_done.tpl',
      1 => 1323043211,
      2 => 'file',
    ),
    '3e2e0bbda5d68298f3c234bc73fa96f5ee1e7c9f' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_layout.tpl',
      1 => 1323043184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12118225284edc0b9ec83af0-87692405',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edc0b9ee22f4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edc0b9ee22f4')) {function content_4edc0b9ee22f4($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("delikates_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("delikates_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


  <h1>So you added a picture</h1>
  <img src="/media/<?php echo $_smarty_tpl->tpl_vars['thimg']->value;?>
" />
  <img src="/media/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
" />

<?php echo $_smarty_tpl->getSubTemplate ("delikates_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>