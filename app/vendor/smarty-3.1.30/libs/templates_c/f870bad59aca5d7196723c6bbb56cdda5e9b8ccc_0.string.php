<?php
/* Smarty version 3.1.30, created on 2018-05-05 14:21:01
  from "f870bad59aca5d7196723c6bbb56cdda5e9b8ccc" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aed939d079902_23810115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aed939d079902_23810115 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</p>
<p> </p>
<p>Привет Андрей <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
</p>
<p>Участники тура</p>
<p> </p>
<pre><table>
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
<p> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?></p>
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
<p><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</p>
</table></pre>
<p> </p><?php }
}
