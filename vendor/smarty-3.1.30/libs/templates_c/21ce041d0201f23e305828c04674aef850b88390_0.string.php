<?php
/* Smarty version 3.1.30, created on 2017-02-20 21:32:34
  from "21ce041d0201f23e305828c04674aef850b88390" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ab44526aa4f8_66692227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ab44526aa4f8_66692227 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1 style="text-align: center;">Догово №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h1>
<p><span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
</span></p>
<p><span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</span></p>
<p>Новые данные по сумме:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</p>
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['TaxCode'];?>
 -&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['Address'];?>
</p>
<p><span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'][1]['documents'][0]['SeriaNum'];?>
</span></p>
<p><span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'][0]['documents'][0]['IssuedBy'];?>
</span></p>
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['contact']->value['PhoneMob'];?>
</p>
<p>&nbsp;</p>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
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
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
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

&lt;/table&gt;
 </pre><?php }
}
