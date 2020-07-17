<?php
/* Smarty version 3.1.30, created on 2017-01-16 15:30:52
  from "39a4f1b523e7816338bc6b7864282e5f986ecaab" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587ccb0c815747_71973281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587ccb0c815747_71973281 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table><?php }
}
