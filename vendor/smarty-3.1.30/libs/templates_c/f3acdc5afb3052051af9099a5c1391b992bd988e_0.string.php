<?php
/* Smarty version 3.1.30, created on 2017-01-19 14:56:07
  from "f3acdc5afb3052051af9099a5c1391b992bd988e" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5880b767c05015_00312307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5880b767c05015_00312307 (Smarty_Internal_Template $_smarty_tpl) {
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
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;lt;table border='1'&amp;gt;<?php
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
&lt;p&gt;&lt;strong&gt;размещение&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
&lt;/strong&gt;&lt;/p&gt;<?php }
}
