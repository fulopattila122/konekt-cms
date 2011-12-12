<?php /* Smarty version Smarty-3.1.5, created on 2011-12-03 18:19:54
         compiled from "/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15558028874eda3fe777ef65-67107969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '607c4e41a2215467034651c97d75d5174cd08be5' => 
    array (
      0 => '/home/fulop/Documents/WebProjects/delides.com/www/app/Artkonekt/Delikates/View/templates/delikates_footer.tpl',
      1 => 1322929192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15558028874eda3fe777ef65-67107969',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4eda3fe779924',
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4eda3fe779924')) {function content_4eda3fe779924($_smarty_tpl) {?>   </div>
   <div class="clearfix"></div>
   <!-- THE BIG FOOTER -->
   <div id="footer">
      <div class="inner">
         <div class="third">
         Izé mutyuri<br />
         Hozé mütyüri<br />
         Zézó tyumuró<br />
         Muty zazare<br />
         </div>
         <div class="third">
            <?php if ($_smarty_tpl->tpl_vars['lang']->value=='hu'){?>
               Language: <strong>Magyar</strong> - <a href="/ro/">Română</a>
            <?php }else{ ?>
               Language: <strong>Română</strong> - <a href="/hu/">Magyar</a>
            <?php }?>
         </div>
         <div class="third">
            Dzz
         </div>
      </div>
   </div>
   <!-- END OF THE BIG FOOTER -->
</body>
</html>

<?php }} ?>