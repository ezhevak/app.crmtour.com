<?php
/* Smarty version 3.1.30, created on 2017-02-09 15:27:14
  from "13333e29f8fb6ad2d8bc45d54151bf38e1daa5e9" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589c6e320d5445_30904389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589c6e320d5445_30904389 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h1 style=&quot;text-align: center;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/h1&gt;
&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;Новые данные по сумме:&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'][0]['documents'][0]['SeriaNum'];?>
&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['contact']->value['PhoneMob'];?>
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
 &amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['contact']->value['PhoneMob'];
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/p&gt;<?php }
}
