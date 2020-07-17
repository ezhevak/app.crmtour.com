<?php
/* Smarty version 3.1.30, created on 2017-01-16 17:16:41
  from "02823f53295f7e6dce2ff0a1ce750fc3973d1f4c" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587ce3d9637e21_92795542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587ce3d9637e21_92795542 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h1 style=&quot;text-align: center;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/h1&gt;
&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
&lt;/span&gt;&lt;/p&gt;
&lt;p&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
&lt;/span&gt;&lt;/p&gt;
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
&lt;p&gt;&lt;strong&gt;DSDSDS&lt;/strong&gt;&lt;/p&gt;<?php }
}
