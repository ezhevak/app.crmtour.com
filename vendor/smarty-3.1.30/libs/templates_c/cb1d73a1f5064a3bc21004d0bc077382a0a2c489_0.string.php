<?php
/* Smarty version 3.1.30, created on 2017-01-16 15:03:15
  from "cb1d73a1f5064a3bc21004d0bc077382a0a2c489" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587cc4935bec23_22329000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587cc4935bec23_22329000 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/strong&gt;&lt;/h3&gt;
&lt;p&gt;&lt;strong&gt;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value;?>
&lt;/strong&gt;&lt;/p&gt;
&lt;pre class=&quot;programlisting&quot;&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value, 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
  &amp;lt;hr /&amp;gt;
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contact']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
    <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
&amp;lt;br /&amp;gt;
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/pre&gt;<?php }
}
