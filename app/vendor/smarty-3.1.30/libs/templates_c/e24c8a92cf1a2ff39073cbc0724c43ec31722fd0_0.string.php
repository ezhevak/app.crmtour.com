<?php
/* Smarty version 3.1.30, created on 2017-02-10 20:28:53
  from "e24c8a92cf1a2ff39073cbc0724c43ec31722fd0" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589e06655e38c6_71620812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589e06655e38c6_71620812 (Smarty_Internal_Template $_smarty_tpl) {
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
&lt;p&gt;&lt;br /&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
 &amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];
echo $_smarty_tpl->tpl_vars['contact']->value['PhoneMob'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value[$_smarty_tpl->tpl_vars['documents']->value]['SeriaNum'];?>
&lt;/p&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['documents']->value[0]['SeriaNum'];?>
&lt;/p&gt;
&lt;p&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&amp;lt;table&amp;gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&amp;lt;/table&amp;gt;&lt;/p&gt;
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
