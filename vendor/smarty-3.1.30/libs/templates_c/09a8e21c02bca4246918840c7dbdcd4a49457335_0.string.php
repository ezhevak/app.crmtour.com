<?php
/* Smarty version 3.1.30, created on 2018-01-20 18:42:52
  from "09a8e21c02bca4246918840c7dbdcd4a49457335" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a63718c004500_09238876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a63718c004500_09238876 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><strong>Л И С Т&nbsp;&nbsp;&nbsp; Б Р О Н Ю В А Н Н Я</strong></p>
<p><strong>&nbsp;Назва агенції: _____ТА "Загадочный Мир"_____</strong></p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; Юр.&nbsp; назва: _____ФОП Саввіна Христина Борисівна_____</strong></p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Телефони: _____+38 057 755 50 51, +38 099 425 03 03_____</strong></p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Адреса: _____61168, м. Харків, вул. Героїв Праці, 7_____</strong></p>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; E-mail: <a href="mailto:_____info@zamir.in.ua">_____info@zamir.in.ua. ks@zamir.in.ua</a>______</strong></p>
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
<th>Имя</th>
<th>Фамилия</th>
<th>Дата рождения</th>
<th>Тип документа</th>
<th>First Name</th>
<th>Last Name</th>
<th>Серия номер</th>
<th>Действующий</th>
<th>Кем выдан</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
</td>
</tr>
</tbody>
</table>
<p><strong>Деталі замовлення:</strong></p>
<p>Дати заїзду: <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
</p>
<p>Країна: <?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
</p>
<p>Курорт: <?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</p>
<p>Готель: <?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
</p>
<p>Розміщення: <?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</p>
<p>Харчування: <?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</p>
<p>Маршрут _______________________________________________________________________________________________________________</p>
<p>Трансфери: _____________________________________________________________________________________________________________</p>
<p>Вид та категорія транспортного засобу <?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
</p>
<p>Страховка <?php echo $_smarty_tpl->tpl_vars['data']->value['Insurance'];?>
</p>
<p>Екскурсії _________________________________________________________________________________________________________________</p>
<p>Отримання візи <?php echo $_smarty_tpl->tpl_vars['data']->value['Visa'];?>
</p>
<p><strong>Додаткова інформація:</strong></p>
<p>____________________________________________________________________________________________________________________________</p>
<p><em>В разі неправильного оформлення закордонних паспортів туристів (прострочений термін дії, дитина не вписана або не вклеєна її фотографія), а також у разі відсутності необхідних нотаріальних дозволів, - Туроператор за виконання умов Договору відповідальності не несе. </em></p>
<p><em>Відповідно до вимог Закону України &laquo;Про захист персональних даних&raquo;, а також мети обробки персональних даних, яка виходить з положень установчих документів Туроператора, Закону України &laquo;Про туризм&raquo; - надання туристичних послуг, Турист надає свою добровільну згоду на збір та використання його персональних даних Туроператором для виконання умов даного Договору.</em></p>
<p>&nbsp;</p>
<p><strong>Підписи Сторін: </strong></p>
<p>ВІДПОВІДАЛЬНИЙ МЕНЕДЖЕР /___________________________________/ <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</p>
<p>&nbsp;</p>
<p>ТУРИСТ /___________________________________________________/ <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>&nbsp;</p>
<p>Дата заявки: <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
/</p>
<p>&nbsp;</p><?php }
}
