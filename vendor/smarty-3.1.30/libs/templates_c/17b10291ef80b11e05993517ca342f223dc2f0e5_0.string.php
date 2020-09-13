<?php
/* Smarty version 3.1.30, created on 2020-03-07 12:35:20
  from "17b10291ef80b11e05993517ca342f223dc2f0e5" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e6378e8c88085_61471326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6378e8c88085_61471326 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalBankIban'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['BankIban'];?>
</p>
<p>&nbsp;</p>
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['PhoneMob'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
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
<th>Имя</th>
<th>Фамилия</th>
<th>Дата рождения</th>
<th>Тип документа</th>
<th>First Name</th>
<th>Last Name</th>
<th>Серия номер</th>
<th>Действующий</th>
<th>Кем выдан</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
</td>
</tr>
</tbody>
</table><?php }
}
