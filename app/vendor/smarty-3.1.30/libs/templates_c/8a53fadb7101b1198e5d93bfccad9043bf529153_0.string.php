<?php
/* Smarty version 3.1.30, created on 2019-01-11 18:01:24
  from "8a53fadb7101b1198e5d93bfccad9043bf529153" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c38bdd432d667_08947708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38bdd432d667_08947708 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" width="404" height="96" /></span></p>
<h4 style="text-align: right;"><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;</span></span></h4>
<h4 style="text-align: right;"><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelJurAddress'];?>
</span></span></h4>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Бронювання номеру - гарантійний лист</span></h4>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Просимо забронювати номер для наших гостей:</span></p>
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
<th>Прізвище</th>
<th>Ім'я</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</td>
</tr>
</tbody>
</table>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Дані для бронювання:</span></p>
<table width="807">
<tbody>
<tr>
<td style="width: 461.111px;"><span style="color: #000000; font-size: 12pt;">Період проживання:</span></td>
<td style="width: 525.556px;"><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
&nbsp; &nbsp;-&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
&nbsp;</span></td>
</tr>
<tr>
<td style="width: 461.111px;">
<p><span style="font-size: 12pt;"><span style="color: #000000;">Кількість номерів та розміщення:</span></span></p>
</td>
<td style="width: 525.556px;"><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
<br /></span></td>
</tr>
<tr>
<td style="width: 461.111px;">
<p><span style="font-size: 12pt;"><span style="color: #000000;">Тип номеру, тип розміщ</span><span style="color: #000000;">ення, харчування:</span></span></p>
</td>
<td style="width: 525.556px;"><span style="color: #000000; font-size: 12pt;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['AdditionalServices'];?>
</span></td>
</tr>
<tr>
<td style="width: 461.111px;"><span style="color: #000000; font-size: 12pt;">Форма оплати:</span></td>
<td style="width: 525.556px;"><span style="color: #000000; font-size: 12pt;">безготівкова</span></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p><span style="font-size: 12pt; color: #000000;">Просимо виставити рахунок для безготівкової оплати.</span></p>
<p><span style="font-size: 12pt; color: #000000;">Директор Коваль І.І.</span></p>
<p><span style="font-size: 12pt; color: #000000;">Дата підписання - <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
<p><img style="float: right;" src="https://www.s-t-v.com.ua/wp-content/uploads/2019/01/PECHAT_NOVAYA2.png" width="250" /></p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.png" width="883" height="140" /></p><?php }
}
