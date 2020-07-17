<?php
/* Smarty version 3.1.30, created on 2019-01-11 17:57:06
  from "9ed9e68628a0fee4c3896abc2c49261519c15083" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c38bcd2e0b492_23407606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38bcd2e0b492_23407606 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" width="404" height="96" /></span></p>
<h4 style="text-align: right;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;</span></span></h4>
<h4 style="text-align: right;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelJurAddress'];?>
</span></span></h4>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Бронювання номеру - гарантійний лист</span></h4>
<p><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Просимо забронювати номер для наших гостей:</span></p>
<p><span style="font-size: 12pt;">&lt;table&gt; &lt;thead&gt; &lt;tr&gt; &lt;th&gt;Прізвище&lt;/th&gt; &lt;th&gt;Ім'я&lt;/th&gt; &lt;/tr&gt; &lt;/thead&gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?> &lt;tr&gt; &lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt; &lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt; &lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 &lt;/table&gt;</span></p>
<p><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Дані для бронювання:</span></p>
<table width="807">
<tbody>
<tr>
<td style="width: 462.222px;"><span style="color: #000000; font-size: 12pt;">Період проживання:</span></td>
<td style="width: 524.444px;"><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
&nbsp; &nbsp;-&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
&nbsp;</span></td>
</tr>
<tr>
<td style="width: 462.222px;">
<p><span style="font-size: 12pt;"><span style="color: #000000;">Кількість номерів та розміщення:</span></span></p>
</td>
<td style="width: 524.444px;"><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
<br /></span></td>
</tr>
<tr>
<td style="width: 462.222px;">
<p><span style="font-size: 12pt;"><span style="color: #000000;">Тип номеру, тип розміщ</span><span style="color: #000000;">ення, харчування:</span></span></p>
</td>
<td style="width: 524.444px;"><span style="color: #000000; font-size: 12pt;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['AdditionalServices'];?>
</span></td>
</tr>
<tr>
<td style="width: 462.222px;"><span style="color: #000000; font-size: 12pt;">Форма оплати:</span></td>
<td style="width: 524.444px;"><span style="color: #000000; font-size: 12pt;">безготівкова</span></td>
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
