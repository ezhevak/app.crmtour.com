<?php
/* Smarty version 3.1.30, created on 2017-04-12 10:52:39
  from "6362518f337f9a24e1cad577c395692e776ea18f" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58eddcc7ec1176_08161281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58eddcc7ec1176_08161281 (Smarty_Internal_Template $_smarty_tpl) {
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
<tr>
<td width="147">
<p><strong>Екскурсії:</strong></p>
</td>
<td width="502">
<p></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p>
<table>
<thead>
<tr>
<th>Прізвище, і&rsquo;мя туриста</th>
<th>Дата народження</th>
<th>Паспорт</th>
<th>Дійсний до:</th>
</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</td>
</tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>
<p>&nbsp;</p>
<p>Менеджер: <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Турист: <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>&nbsp;</p>
<p>Директор ТОВ &laquo;Дівуар&raquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p><?php }
}
