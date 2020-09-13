<?php
/* Smarty version 3.1.30, created on 2017-01-16 15:31:19
  from "e4fa42ff8157cc08394d50548b8daca432bafbea" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587ccb27b500e4_06867768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587ccb27b500e4_06867768 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;p&gt;&amp;lt;table&amp;gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;&lt;br /&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;br /&gt;&amp;lt;/table&amp;gt;&lt;/p&gt;<?php }
}
