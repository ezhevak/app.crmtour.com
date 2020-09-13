<?php
/* Smarty version 3.1.30, created on 2019-01-11 17:30:41
  from "f73bc5d1b3943773fd192839bb5599623d8794aa" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c38b6a1b6a5e4_56310368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c38b6a1b6a5e4_56310368 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" width="404" height="96" /></span></p>
<h4 style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Підтвердження Вашого бронювання (ваучер) №&nbsp;<span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</span>для:</span></h4>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Прізвище&lt;/th&gt;
	&lt;th&gt;Ім'я&lt;/th&gt;
	&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<p><span style="color: #000000; font-size: 10pt;">Даним ваучером підтверджується бронювання готелю:</span></p>
<table width="807">
<tbody>
<tr>
<td width="379"><span style="color: #000000; font-size: 10pt;">Назва, адреса готелю:</span></td>
<td width="428"><span style="color: #000000; font-size: 10pt;">&nbsp;</span><br /><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelJurAddress'];?>
</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Дата та час заїзду&nbsp; - дата та час виїзду:</span></td>
<td><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 14:00&nbsp; -&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 12:00</span></td>
</tr>
<tr>
<td><span style="color: #000000; font-size: 10pt;">Кількість ночей:</span></td>
<td><span style="color: #000000; font-size: 10pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
</span></td>
</tr>
<tr>
<td>
<p><span style="font-size: 10pt;"><span style="color: #000000;">Тип номеру, тип розміщ</span><span style="color: #000000;">ення, харчування:</span></span></p>
</td>
<td><span style="color: #000000; font-size: 10pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
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
<p><span style="color: #000000; font-size: 18pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_4.png" width="907" height="287" /></span></p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.png" width="883" height="140" /></p><?php }
}
