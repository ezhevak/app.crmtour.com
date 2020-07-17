<?php
/* Smarty version 3.1.30, created on 2019-01-14 14:20:32
  from "0e03fe2862bcb83dbbf9d7ca4b325208a934d3ec" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c3c7e90be47e4_22647057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3c7e90be47e4_22647057 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><span style="color: #000000; font-size: 18pt;"><img src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" width="269" height="64" /></span></p>
<p style="text-align: right;"><span style="font-size: 12pt;"><span class="fontstyle0" style="color: #000000;"><span style="color: #000000;">Готель <?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;&nbsp;</span></span></span></p>
<p style="text-align: right;"><span style="font-size: 12pt;"><span class="fontstyle0" style="color: #000000;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
,&nbsp;</span></span></span></p>
<p style="text-align: right;"><span style="font-size: 12pt;"><span class="fontstyle0" style="color: #000000;"><span style="color: #000000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelJurAddress'];?>
</span></span></span></p>
<p style="text-align: center;"><span class="fontstyle0" style="color: #000000; font-size: 14pt;">Бронювання номеру - гарантійний лист</span></p>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;">Шановні коллеги, дякуємо за співпрацю та просимо забронювати номер/номери для наших гостей.</span></p>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000; font-size: 12pt;">Період проживання:&nbsp; &nbsp;&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
&nbsp; &nbsp;-&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
&nbsp;</strong><br /></span></span></p>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000; font-size: 12pt;"><span style="font-size: 12pt;"><span style="color: #000000;">Тип номеру, кількісь номерів, тип розміщення, харчування:&nbsp; <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['AdditionalServices'];?>
</strong></span></span></span></span></p>
<p><strong><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000; font-size: 12pt;"><span style="font-size: 12pt;"><span style="color: #000000;">Гості:</span></span></span></span></strong></p>
<p>&lt;table font-size: 12pt;&gt; &lt;thead&gt; &lt;tr&gt; &lt;th font-size: 12pt;&gt;Прізвище&lt;/th&gt; &lt;th font-size: 12pt;&gt;Ім'я&lt;/th&gt; &lt;/tr&gt; &lt;/thead&gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?> &lt;tr&gt; &lt;td font-size: 12pt;&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt; &lt;td font-size: 12pt;&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt; &lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 &lt;/table&gt;</p>
<p><span class="fontstyle0" style="color: #000000; font-size: 12pt;"><span style="color: #000000; font-size: 12pt;"><span style="font-size: 12pt;"><span style="color: #000000;">Форма оплати:&nbsp;</span></span></span></span><span style="background-color: #ffffff; color: #000000; font-size: 16px;">безготівкова</span></p>
<p><span style="color: #000000; font-size: 12pt;">Просимо виставити рахунок для безготівкової оплати.</span></p>
<p><span style="color: #000000; font-size: 12pt;">Одразу після виїзду гостей просимо вислати акт наданих послуг&nbsp; на нашу фактичну адресу: м.Київ, 01010, вул. Івана Мазепи 3-Б, оф 231.</span></p>
<p><span style="font-size: 12pt; color: #000000;">Директор Коваль І.І.</span></p>
<p><span style="font-size: 12pt; color: #000000;">Дата підписання - <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
<p><img style="float: right;" src="https://www.s-t-v.com.ua/wp-content/uploads/2019/01/PECHAT_NOVAYA2.png" width="219" height="201" /></p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.png" width="789" height="125" /></p><?php }
}
