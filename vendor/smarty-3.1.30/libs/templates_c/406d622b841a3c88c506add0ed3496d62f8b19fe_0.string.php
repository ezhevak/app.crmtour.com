<?php
/* Smarty version 3.1.30, created on 2018-08-21 20:13:18
  from "406d622b841a3c88c506add0ed3496d62f8b19fe" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7c482e62eca0_67643808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c482e62eca0_67643808 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_1.png" width="894" height="167" /></span></p>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 18pt;">Підтвердження Вашого бронювання для:</span></h4>
<p><span style="font-size: 12pt; color: #000000;">&lt;table&gt; &lt;thead&gt; &lt;tr&gt; &lt;th&gt;Ім'я&lt;/th&gt; &lt;th&gt;Прізвище&lt;/th&gt; &lt;/tr&gt; &lt;/thead&gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?> &lt;tr&gt; &lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt; &lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt; &lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 &lt;/table&gt;</span></p>
<p><span style="font-size: 18pt; color: #000000;">Дані бронювання:</span></p>
<table width="807">
<tbody>
<tr>
<td width="379"><span style="color: #000000; font-size: 12pt;">Готель:</span></td>
<td width="428"><span style="color: #000000; font-size: 12pt;">&nbsp;</span><br /><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 12pt;">Номер бронювання:</span></td>
<td><span style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
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
<td><span style="color: #000000; font-size: 12pt;">Тип номеру:</span></td>
<td><span style="color: #000000; font-size: 12pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
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
<p><span style="font-size: 12pt; color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_2.png" width="1047" height="568" /></span></p><?php }
}
