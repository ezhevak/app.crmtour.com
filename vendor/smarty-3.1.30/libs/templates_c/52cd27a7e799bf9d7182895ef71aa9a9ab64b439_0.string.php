<?php
/* Smarty version 3.1.30, created on 2017-04-11 12:13:00
  from "52cd27a7e799bf9d7182895ef71aa9a9ab64b439" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ec9e1cccab21_95240254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ec9e1cccab21_95240254 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><strong>З А Я В К А</strong></p>
<p style="text-align: center;"><strong>до Договору </strong><strong>№<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;<strong>від &laquo;<span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
</span>&raquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
</strong></p>
<p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp; Комплекс туристичних послуг, який надається туристу:</p>
<p>&nbsp;</p>
<table width="649">
<tbody>
<tr>
<td width="147">
<p><strong>Напрямок:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Дата заїзду:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 - <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Кіл-ть ночей:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Готель:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelStarsName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Розміщення:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Харчування:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Тип номеру:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Трансфер:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['TransferName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Транспорт:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
</p>
<p>Рейс <?php echo $_smarty_tpl->tpl_vars['data']->value['FlightA'];?>
 &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightAArrivalDate'];?>
 -&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightADepartureDate'];?>
</p>
<p>Рейс <?php echo $_smarty_tpl->tpl_vars['data']->value['FlightB'];?>
 &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBArrivalDate'];?>
 -&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBDepartureDate'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Страхування:</strong></p>
</td>
<td width="502">
<p>Так</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Віза:</strong></p>
</td>
<td width="502">
<p>ні</p>
</td>
</tr>
</tbody>
</table>
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

&lt;/table&gt;</pre>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Менеджер: <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Турист: <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>&nbsp;</p>
<p>Директор ТОВ &laquo;Дівуар&raquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p><?php }
}
