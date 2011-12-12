<?php /* Smarty version Smarty-3.1.5, created on 2011-12-05 01:29:19
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_product_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2189042664edb9882cddf27-54979111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77de404adffa3cba0768d80e4176e0b5d920384d' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_product_category.tpl',
      1 => 1323041293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2189042664edb9882cddf27-54979111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4edb98831eb33',
  'variables' => 
  array (
    'category' => 0,
    'products' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4edb98831eb33')) {function content_4edb98831eb33($_smarty_tpl) {?><div id="category">
   <div class="content">
   <h1 style="margin-bottom: 97px;"><?php echo $_smarty_tpl->tpl_vars['category']->value['Name'];?>
</h1>
   <div class="browsertn">
   <pre>
   <?php echo print_r($_smarty_tpl->tpl_vars['products']->value);?>

   <!--foreach $products as $product
      $product|print_r
   /foreach -->
   </pre>
   </div>
   <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
      <?php echo print_r($_smarty_tpl->tpl_vars['product']->value['Translation']);?>

   <?php } ?>
   
   </div>
   <div style="height: 37px;"></div>
</div>
<?php }} ?>