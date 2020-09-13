<?php
/* Smarty version 3.1.30, created on 2017-02-13 10:44:17
  from "a36c20e56f14f86790015bf1766fd93449c12d4e" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a171e1da6175_72455373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a171e1da6175_72455373 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;h1 style=&quot;text-align: center;&quot;&gt;Договор № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/h1&gt;
&lt;p&gt;Hello &amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
&lt;/p&gt;
&lt;p&gt;Hello &amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers']['contact']['TaxCode'];?>
&lt;/p&gt;
&lt;p&gt;Всем добрый день!&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Hello &amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['contact']->value['PhoneMob'];?>
&lt;/p&gt;
&lt;p&gt;||||||||||||||||||||&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedDate'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedBy'];?>
&lt;/p&gt;
&lt;p&gt;||||||||||||||||||||&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBDepartureDate'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBDepartureDate'];?>
&lt;/p&gt;
&lt;p&gt;&lt;br /&gt;&amp;lt;table&amp;gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&amp;lt;/table&amp;gt;&lt;/p&gt;
&lt;p&gt;Рабочий пример печати участников с документами НАЧАЛО&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&amp;lt;table&amp;gt;&lt;br /&gt; &amp;lt;thead&amp;gt;&lt;br /&gt; &amp;lt;tr&amp;gt;&lt;br /&gt; &amp;lt;th&amp;gt;Фамилия&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Имя&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Тип документа&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;First Name&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Last Name/th&amp;gt;&amp;lt;th&amp;gt;Серия номер&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Действующий&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Кем выдан&amp;lt;/th&amp;gt;&lt;br /&gt; &amp;lt;/tr&amp;gt;&lt;/p&gt;
&lt;p&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;lt;tr&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&amp;lt;/td&amp;gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;/tr&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&amp;lt;/table&amp;gt;&lt;/p&gt;
&lt;p&gt;Рабочий пример печати участников с документами КОНЕЦ&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;br /&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>Громодянин(ка) <?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
 &amp;lt;br&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/p&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['documents']->value[0]['SeriaNum'];?>
&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;table&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 50%;&quot;&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;ТУРОПЕРАТОР:&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
&lt;/p&gt;
&lt;p&gt;Тел.: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
&amp;nbsp;&lt;/p&gt;
&lt;p&gt;Факс: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeFax'];?>
&lt;/p&gt;
&lt;p&gt;Моб:&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeMobile'];?>
&lt;/p&gt;
&lt;p&gt;Ел.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeEmail'];?>
&lt;/p&gt;
&lt;p&gt;р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
&lt;/p&gt;
&lt;p&gt;в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
, МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
&lt;/p&gt;
&lt;p&gt;Код&amp;nbsp; ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&lt;/p&gt;
&lt;p&gt;Ліцензія <?php echo $_smarty_tpl->tpl_vars['account']->value['LicenseNum'];?>
 от <?php echo $_smarty_tpl->tpl_vars['account']->value['LicenseDate'];?>
&lt;/p&gt;
&lt;p&gt;на туроператорську діяльність&lt;/p&gt;
&lt;p&gt;Директор <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
&lt;/p&gt;
&lt;p&gt;_______________ <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;td style=&quot;width: 50%;&quot;&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;ТУРИСТ:&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;П.І.Б туриста:&lt;span style=&quot;text-decoration: underline;&quot;&gt;&amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&lt;/span&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;Паспорт номер: _____________________________&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;Виданий: ____________________________________&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;Адреса:&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;Телефон:&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;E-mail:&lt;/p&gt;
&lt;p style=&quot;text-align: right;&quot;&gt;Підпис туриста&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; _________________&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;lt;table border='1'&amp;gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&amp;lt;/table&amp;gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;nbsp;&lt;/p&gt;<?php }
}
