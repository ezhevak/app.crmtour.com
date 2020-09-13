<?php
/* Smarty version 3.1.30, created on 2017-01-16 15:32:36
  from "53a86dc7a0b6b1bb789acafb011235c2ff9f9687" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587ccb740a6310_54681906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587ccb740a6310_54681906 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&lt;table&gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?><br />&nbsp;&nbsp;&nbsp; &lt;tr&gt;&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;&lt;/tr&gt;<br /><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
<br />&lt;/table&gt;</p><?php }
}
