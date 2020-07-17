<?php
/* Smarty version 3.1.30, created on 2017-02-11 10:11:54
  from "7f55b8c05ee2a7fce96299e90d26341b8c23358e" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589ec74a88cd12_73145788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589ec74a88cd12_73145788 (Smarty_Internal_Template $_smarty_tpl) {
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
&lt;p&gt;&amp;nbsp;&amp;lt;table&amp;gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&lt;/p&gt;
&lt;p&gt;&lt;br /&gt; &amp;lt;thead&amp;gt;&lt;br /&gt; &amp;lt;tr&amp;gt;&lt;br /&gt; &amp;lt;th&amp;gt;Фамилия&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Имя&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Тип документа&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;First Name&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Last Name/th&amp;gt;&amp;lt;th&amp;gt;Серия номер&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Действующий&amp;lt;/th&amp;gt;&amp;lt;th&amp;gt;Кем выдан&amp;lt;/th&amp;gt;&lt;br /&gt; &amp;lt;/tr&amp;gt;&lt;/p&gt;
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
&lt;p&gt;&amp;nbsp;&lt;/p&gt;<?php }
}
