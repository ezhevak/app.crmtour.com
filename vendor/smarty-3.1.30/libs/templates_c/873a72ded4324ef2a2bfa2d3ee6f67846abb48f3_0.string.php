<?php
/* Smarty version 3.1.30, created on 2018-08-21 20:38:22
  from "873a72ded4324ef2a2bfa2d3ee6f67846abb48f3" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7c4e0e636e50_89418742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c4e0e636e50_89418742 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_1.png" width="894" height="167" /></span></p>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Підтвердження Вашого бронювання (ваучер) №&nbsp;<span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</span>для:</span></h4>
<h4>&lt;table&gt;<br />&lt;thead&gt;<br />&lt;tr&gt;<br />&lt;th&gt;Прізвище&lt;/th&gt;<br />&lt;th&gt;Ім'я&lt;/th&gt;<br />&lt;/tr&gt;<br />&lt;/thead&gt;<br /><?php
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
<br />&lt;/table&gt;</h4>
<p><span style="font-size: 14pt; color: #000000;">Дані бронювання:</span></p>
<table width="807">
<tbody>
<tr>
<td width="379"><span style="color: #000000; font-size: 12pt;">Назва готелю:</span></td>
<td width="428"><span style="color: #000000; font-size: 12pt;">&nbsp;</span><br /><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Назва послуги:</span></td>
<td><span style="color: #000000; font-size: 12pt;">Підтвердження бронювання готелю</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Дата та час заїзду:</span></td>
<td><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 14:00</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Дата та час виїзду:</span></td>
<td><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 12:00</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Кількість ночей:</span></td>
<td><span style="color: #000000; font-size: 12pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</span></td>
</tr>
<tr>
<td>
<p><span style="color: #000000; font-size: 12pt;">Тип номеру та тип розміщ</span><span style="color: #000000; font-size: 12pt;">ення:</span></p>
</td>
<td><span style="color: #000000; font-size: 12pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Харчування:</span></td>
<td><span style="color: #000000; font-size: 12pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Строк аннуляції бронювання без штрафних санкцій:</span></td>
<td><span style="color: #000000; font-size: 12pt;">за добу до заселення</span></td>
</tr>
</tbody>
</table>
<p><span style="font-size: 12pt; color: #000000;">Дата видачі ваучера - <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
<p><span style="font-size: 12pt; color: #000000;"><span style="color: #000000;"><span style="font-size: 12pt;">Розмір фінансового забезпечення цивільної відповідальності туроператора або межі відповідальності за договором&nbsp;</span><span style="font-size: 12pt;">20000 євро</span>&nbsp;</span></span></p>
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_2.png" width="1047" height="568" /></span></p><?php }
}
