<?php
/* Smarty version 3.1.30, created on 2020-02-26 14:30:51
  from "11e421e74273898740392d4c7529e26709851fa2" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e5664fb936061_38072364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5664fb936061_38072364 (Smarty_Internal_Template $_smarty_tpl) {
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
<p><strong>Країна, місто:</strong></p>
</td>
<td width="502">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Дата туру:</strong></p>
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
<p><strong>Назва готелю:</strong></p>
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
<p><strong>Тип номеру:&nbsp;</strong></p>
</td>
<td width="502">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
&nbsp;</p>
</td>
</tr>
<tr>
<td width="147">
<p><strong>Харчування:</strong></p>
</td>
<td width="502">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
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
<p>Туристична подорож здійснюється у складі (вказуються кількість туристів та відомості про них)</p>
<table>
<thead>
<tr>
<td>
<p><strong>Прізвище (латинською)</strong></p>
</td>
<td>
<p><strong>Ім'я (латинською)</strong></p>
</td>
<td>
<p><strong>Дата народження</strong></p>
</td>
<td>
<p><strong>Паспорт</strong></p>
</td>
<td>
<p><strong>Дійсний до</strong></p>
</td>
</tr>
<tr>
<td>
<p><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</p>
</td>
<td>
<p><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</p>
</td>
<td>
<p>&nbsp;</p>
</td>
<td>
<p>&nbsp;</p>
</td>
<td>&nbsp;</td>
</tr>
</thead>
</table>
<p><br />Менеджер: <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
<p>&nbsp;</p>
<p>Турист&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;_________________________&nbsp; &nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>&nbsp;</p>
<p>Директор ТОВ &laquo;Дівуар&raquo; &nbsp; _________________________&nbsp; &nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p><?php }
}
