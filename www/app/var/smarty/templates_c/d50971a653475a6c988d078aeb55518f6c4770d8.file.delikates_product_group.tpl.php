<?php /* Smarty version Smarty-3.1.5, created on 2011-12-04 21:44:43
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_product_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19058694314edbcdaba9c969-50415077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd50971a653475a6c988d078aeb55518f6c4770d8' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_product_group.tpl',
      1 => 1323019510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19058694314edbcdaba9c969-50415077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'group' => 0,
    'categories' => 0,
    'category' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edbcdabb8174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edbcdabb8174')) {function content_4edbcdabb8174($_smarty_tpl) {?><div id="category">
   <div class="content">
   <h1 style="margin-bottom: 97px;"><?php echo $_smarty_tpl->tpl_vars['group']->value['Name'];?>
</h1>
   <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
      <div class="category group<?php echo $_smarty_tpl->tpl_vars['category']->value['Group'];?>
 cat<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
         <a href="/<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
/delikates/<?php echo $_smarty_tpl->tpl_vars['group']->value['Slug'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['Slug'];?>
/"><img src="/images/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
.jpg" /></a>
         <center><h2><?php echo $_smarty_tpl->tpl_vars['category']->value['Name'];?>
</h2></center>
      </div>
   <?php } ?>
   
   </div>
   <div style="height: 37px;"></div>
</div>
<?php }} ?>