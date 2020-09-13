<?php
/* Smarty version 3.1.30, created on 2017-12-21 18:14:41
  from "83f00858be550dd434170b12d91b35b6ff43d686" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3bddf1a1e7f2_76066538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3bddf1a1e7f2_76066538 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>Первій тестовій шаблон на&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>доеашневшнвкшнквн&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorName'];?>
</p>
<p>жвоащ<?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceNum'];?>
</p>
<p><strong>оашщегавщш&nbsp;</strong><?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p>
<p>ИНН&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['TaxCode'];?>
</p>
<p>Мобильный телефон&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PhoneMob'];?>
</p>
<p>Домашний телефон&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['EmailHome'];?>
</p>
<p><strong>Дата вылета:&nbsp;</strong><?php echo $_smarty_tpl->tpl_vars['data']->value['FlightAArrivalDate'];?>
</p>
<p style="text-align: center;">Турклуб соверует сделку № <em><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></em></p>
<p>ФИО туриста:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></p>
<p>Название организации:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</strong></p>
<p>&nbsp;</p>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<p>&nbsp;</p>
<p>&nbsp;</p><?php }
}
