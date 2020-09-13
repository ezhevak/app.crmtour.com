<?php
/* Smarty version 3.1.30, created on 2017-01-16 15:22:21
  from "536b354781881b68a402b131ff569a0bb46442e0" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587cc90d8168a5_49179184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587cc90d8168a5_49179184 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h6 style=&quot;text-align: center;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/h6&gt;
&lt;p&gt;&lt;strong&gt;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value;?>
&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&amp;lt;table&amp;gt; <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>&lt;/p&gt;
&lt;pre class=&quot;programlisting&quot;&gt;  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contact']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
    &amp;lt;tr&amp;gt;&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
&amp;lt;/td&amp;gt;&amp;lt;/tr&amp;gt;
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
&lt;br /&gt;&amp;lt;/table&amp;gt;&lt;/pre&gt;
&lt;pre class=&quot;lang-php prettyprint prettyprinted&quot;&gt;&lt;code&gt;&amp;nbsp;&lt;/code&gt;&lt;/pre&gt;<?php }
}
