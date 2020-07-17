<?php
/* Smarty version 3.1.30, created on 2018-05-06 22:36:30
  from "0eab56d1e7ccd15ee91162b90bd3fd1258488051" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aef593ee175b6_66130878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aef593ee175b6_66130878 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</p>
<p>&nbsp;</p>
<p>Привет Андрей&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
</p>
<p>Участники ту</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&lt;table&gt;<br />&lt;thead&gt;<br />&lt;tr&gt;<br />&lt;th&gt;Имя&lt;/th&gt;<br />&lt;th&gt;Фамилия&lt;/th&gt;<br />&lt;th&gt;Дата рождения&lt;/th&gt;<br />&lt;th&gt;Тип документа&lt;/th&gt;<br />&lt;th&gt;First Name&lt;/th&gt;<br />&lt;th&gt;Last Name&lt;/th&gt;<br />&lt;th&gt;Серия номер&lt;/th&gt;<br />&lt;th&gt;Действующий&lt;/th&gt;<br />&lt;th&gt;Кем выдан&lt;/th&gt;<br />&lt;/tr&gt;<br />&lt;/thead&gt;<br />&lt;tbody&gt;<br />&lt;span&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&lt;/span&gt;<br />&lt;tr&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;<br />&lt;/tr&gt;<br />&lt;span&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/span&gt;</p><?php }
}
