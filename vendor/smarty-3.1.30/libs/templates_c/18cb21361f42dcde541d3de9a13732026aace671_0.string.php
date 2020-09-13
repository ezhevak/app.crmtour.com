<?php
/* Smarty version 3.1.30, created on 2018-08-21 20:03:47
  from "18cb21361f42dcde541d3de9a13732026aace671" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b7c45f397c348_39417905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7c45f397c348_39417905 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h4><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_1.png" /></span></h4>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 18pt;">Підтвердження Вашого бронювання для:</span></h4>
<pre><span style="font-size: 12pt; color: #000000;">&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Ім'я&lt;/th&gt;
	&lt;th&gt;Прізвище&lt;/th&gt;
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
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</span></pre>
<table class="NormalTable" style="height: 1048px;">
<tbody>
<tr style="height: 103px;">
<td style="height: 103px;">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Готель:</span></h4>
</td>
<td style="height: 103px;">
<h4><span style="font-size: 12pt; color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Номер бронювання:</span></h4>
</td>
<td style="height: 103px;" width="200">
<h4><span style="font-size: 12pt; color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></h4>
</td>
</tr>
<tr style="height: 71px;">
<td style="height: 71px;" width="200">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Назва послуги:</span></h4>
</td>
<td style="height: 71px;" width="200">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Підтвердження бронювання готелю</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Дата та час заїзду:</span></h4>
</td>
<td style="height: 103px;" width="200">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 14:00</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Дата та час виїзду:</span></h4>
</td>
<td style="height: 103px;" width="200">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 12:00</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle3" style="color: #000000; font-size: 12pt;">Кількість ночей:</span></h4>
</td>
<td style="height: 103px;">
<h4><span style="font-size: 12pt; color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Тип номеру:</span></h4>
</td>
<td style="height: 103px;">
<h4><span style="font-size: 12pt; color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;" width="200">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Харчування:</span></h4>
</td>
<td style="height: 103px;">
<h4><span style="font-size: 12pt; color: #000000;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</span></h4>
</td>
</tr>
<tr style="height: 103px;">
<td style="height: 103px;">
<h4><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span class="fontstyle0">Строк аннуляції бронювання без штрафних санкцій:</span></span></h4>
</td>
<td style="height: 103px;">
<h4><span style="font-size: 12pt; color: #000000;">за добу до заселення</span></h4>
</td>
</tr>
</tbody>
</table>
<h4><span style="font-size: 12pt; color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></h4>
<h4><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_2.png" /></span></h4><?php }
}
