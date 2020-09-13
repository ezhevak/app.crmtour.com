<?php
/* Smarty version 3.1.30, created on 2016-12-29 10:34:51
  from "/home/crane/studio-z.com.ua/crmm/examples/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5864caab939071_08118709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4493b023b595f14b71004d1c3a0f1627f4fd6e1f' => 
    array (
      0 => '/home/crane/studio-z.com.ua/crmm/examples/index.tpl',
      1 => 1483000489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5864caab939071_08118709 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>Smarty</title>
  </head>
  <body>
    Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
    <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
	  <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </body>
</html><?php }
}
