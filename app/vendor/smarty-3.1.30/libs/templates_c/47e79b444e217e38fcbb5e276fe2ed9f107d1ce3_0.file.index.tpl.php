<?php
/* Smarty version 3.1.30, created on 2017-01-13 17:16:15
  from "/home/zhevak/crmtour.com/app/examples/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5878ef3fef5371_36230686',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47e79b444e217e38fcbb5e276fe2ed9f107d1ce3' => 
    array (
      0 => '/home/zhevak/crmtour.com/app/examples/index.tpl',
      1 => 1484206855,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5878ef3fef5371_36230686 (Smarty_Internal_Template $_smarty_tpl) {
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
