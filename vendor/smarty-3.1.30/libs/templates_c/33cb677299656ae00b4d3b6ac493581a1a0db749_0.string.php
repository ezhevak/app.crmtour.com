<?php
/* Smarty version 3.1.30, created on 2018-08-21 20:07:34
  from "33cb677299656ae00b4d3b6ac493581a1a0db749" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7c46d6a7c5f1_34829841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c46d6a7c5f1_34829841 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_1.png" /></span></h4>
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
<table width="807">
<tbody>
<tr>
<td width="379"><span style="color: #000000;">Готель:</span></td>
<td width="428"><span style="color: #000000;">&nbsp;</span><br /><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Номер бронювання:</span></td>
<td><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Назва послуги:</span></td>
<td><span style="color: #000000;">Підтвердження бронювання готелю</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Дата та час заїзду:</span></td>
<td><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 14:00</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Дата та час виїзду:</span></td>
<td><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 12:00</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Кількість ночей:</span></td>
<td><span style="color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Тип номеру:</span></td>
<td><span style="color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Харчування:</span></td>
<td><span style="color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000;">Строк аннуляції бронювання без штрафних санкцій:</span></td>
<td><span style="color: #000000;">за добу до заселення</span></td>
</tr>
</tbody>
</table>
<h4><span style="font-size: 12pt; color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></h4>
<h4><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_2.png" /></span></h4><?php }
}
