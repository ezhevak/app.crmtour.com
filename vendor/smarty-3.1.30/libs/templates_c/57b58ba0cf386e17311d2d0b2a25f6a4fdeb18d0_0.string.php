<?php
/* Smarty version 3.1.30, created on 2018-08-21 20:45:58
  from "57b58ba0cf386e17311d2d0b2a25f6a4fdeb18d0" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7c4fd6727285_49194575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c4fd6727285_49194575 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" /></span></p>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Підтвердження Вашого бронювання (ваучер) №&nbsp;<span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</span>для:</span></h4>
<p>&lt;table&gt;<br />&lt;thead&gt;<br />&lt;tr&gt;<br />&lt;th&gt;Прізвище&lt;/th&gt;<br />&lt;th&gt;Ім'я&lt;/th&gt;<br />&lt;/tr&gt;<br />&lt;/thead&gt;<br /><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?><br />&lt;tr&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;<br />&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;<br />&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
<br />&lt;/table&gt;</p>
<p><span style="color: #000000; font-size: 14pt;">Дані бронювання:</span></p>
<table width="807">
<tbody>
<tr>
<td width="379"><span style="color: #000000; font-size: 10pt;">Назва готелю:</span></td>
<td width="428"><span style="color: #000000; font-size: 10pt;">&nbsp;</span><br /><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Назва послуги:</span></td>
<td><span style="color: #000000; font-size: 10pt;">Підтвердження бронювання готелю</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Дата та час заїзду:</span></td>
<td><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 14:00</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Дата та час виїзду:</span></td>
<td><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 12:00</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Кількість ночей:</span></td>
<td><span style="color: #000000; font-size: 10pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</span></td>
</tr>
<tr>
<td>
<p><span style="font-size: 10pt;"><span style="color: #000000;">Тип номеру та тип розміщ</span><span style="color: #000000;">ення:</span></span></p>
</td>
<td><span style="color: #000000; font-size: 10pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Харчування:</span></td>
<td><span style="color: #000000; font-size: 10pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Строк аннуляції бронювання без штрафних санкцій:</span></td>
<td><span style="color: #000000; font-size: 10pt;">за добу до заселення</span></td>
</tr>
</tbody>
</table>
<p><span style="font-size: 10pt; color: #000000;">Дата видачі ваучера - <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
<p><span style="font-size: 10pt; color: #000000;"><span style="color: #000000;">Розмір фінансового забезпечення цивільної відповідальності туроператора або межі відповідальності за договором&nbsp;20000 євро&nbsp;</span></span></p>
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_4.png" /></span></p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.png" /></p><?php }
}
