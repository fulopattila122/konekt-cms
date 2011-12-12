<?php /* Smarty version Smarty-3.1.5, created on 2011-12-04 19:08:48
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3542621134eda414ecba271-17196314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c11e1e1c3993d5dd35981ac3342cdea199ba61a' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_menu.tpl',
      1 => 1323018525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3542621134eda414ecba271-17196314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4eda414ed1492',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4eda414ed1492')) {function content_4eda414ed1492($_smarty_tpl) {?>   <!-- MENU MENU MENUU -->
   <div id="menubar">
      <img src="/images/delikates-design-logo.jpg" />
      <div id="menuinner">
           <ul>
            <?php if ($_smarty_tpl->tpl_vars['lang']->value=='hu'){?>
               <li><a href="/hu/">NYITÓLAP</a></li>
               <li><a href="/hu/delikates/kiegeszitok">KIEGÉSZÍTŐK</a></li>
               <li><a href="/hu/delikates/kollekciok">KOLLEKCIÓK</a></li>
               <li><a href="/hu/menyasszonyi-ruhak">MENYASSZONYI RUHÁK</a></li>
               <li><a href="/hu/rolunk">DELIKATES</a></li>
               <li><a href="http://delikat.wordpress.com/" target="_blank">BLOG</a></li>
               <li><a href="/hu/kontakt">KONTAKT</a></li>
            <?php }else{ ?>
               <li><a href="/ro/">ACASĂ</a></li>
               <li><a href="/ro/delikates/accesorii">ACCESORII</a></li>
               <li><a href="/ro/delikates/collectii">COLLECȚII</a></li>
               <li><a href="/ro/rochii-de-mireasa">ROCHII DE MIREASĂ</a></li>
               <li><a href="/ro/despre-noi">DELIKATES</a></li>
               <li><a href="http://delikat.wordpress.com/" target="_blank">BLOG</a></li>
               <li><a href="/ro/contact">CONTACT</a></li>
            <?php }?>
           </ul>
      </div>
   </div>
   <div class="clearfix"></div>
   <!-- END OF MENUUU, IN THE RICSENZŐ -->  

<?php }} ?>