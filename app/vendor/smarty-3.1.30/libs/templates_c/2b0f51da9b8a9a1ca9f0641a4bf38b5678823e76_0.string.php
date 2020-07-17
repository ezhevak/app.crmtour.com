<?php
/* Smarty version 3.1.30, created on 2018-09-10 16:49:03
  from "2b0f51da9b8a9a1ca9f0641a4bf38b5678823e76" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b96764f1774d4_16764694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b96764f1774d4_16764694 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</p>
<table>
<thead>
<tr>
<th><span style="font-size: 18pt;">Прізвище</span></th>
<th><span style="font-size: 18pt;">Ім'я</span></th>
</tr>
</thead>
<tbody>
<tr>
<td><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</span></td>
<td><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</span></td>
</tr>
</tbody>
</table><?php }
}
