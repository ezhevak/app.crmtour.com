<?php
/* Smarty version 3.1.30, created on 2020-02-24 14:33:16
  from "1815ea99174bb82736e7134f84877d36d46bd096" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e53c28ca24139_01170319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53c28ca24139_01170319 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><img style="float: left;" src="https://divuar.com.ua/wp-content/uploads/2020/02/logo_divuar_на-бланк.jpg" alt="" width="370" height="160" /></p>
<p style="text-align: center;"><strong>З А Я В К А</strong></p>
<p style="text-align: center;"><strong>до Договору </strong><strong>№<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;<strong>від &laquo;<span style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
</span>&raquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
</strong></p>
<p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp; Комплекс туристичних послуг, який надається туристу:</p>
<table width="649">
<tbody>
<tr>
<td width="147">
<p><strong>Напрямок:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</p>
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
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Insurance'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Віза:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['Visa'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Додаткові послуги:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['AdditionalServices'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Туристична подорож здійснюється у складі (вказуються кількість туристів та відомості про них)</p>
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
<th>Last Name</th>
<th>First Name</th>
<th>Дата народження</th>
<th>Паспорт</th>
<th>Дійсний до</th>
</tr>
<tr>
<th><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</th>
<th><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</th>
<th><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</th>
<th><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</th>
<th><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</th>
</tr>
</thead>
</table>
<p><br /><br /></p>
<p>Менеджер: <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p>&nbsp;</p>
<p>Турист&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_________________________ <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>&nbsp;</p>
<p>Директор ТОВ &laquo;Дівуар&raquo; &nbsp; _______________________ &nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p><?php }
}
