<?php
/* Smarty version 3.1.30, created on 2017-01-26 12:16:14
  from "b46a4bb7fd6e0f6ff809edf51181e11f4cb32117" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5889cc6e15ce92_98603240',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5889cc6e15ce92_98603240 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;ДОГОВІР №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/strong&gt;&lt;/h3&gt;
&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;на туристичне обслуговування&lt;/strong&gt;&lt;/h3&gt;
&lt;table style=&quot;width: 1088px;&quot;&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 515px;&quot;&gt;м.Київ&lt;/td&gt;
&lt;td style=&quot;width: 571px; text-align: right;&quot;&gt;&amp;laquo;___&amp;raquo; Листопад 2016&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Товариство з обмеженою відповідальністю &amp;laquo;ДІВУАР&amp;raquo;, надалі - &amp;laquo;ТУРОПЕРАТОР&amp;raquo; (ліцензія Державної туристичної адміністрації України АВ 566623 от 08.04.2011р.), в особі директора Колихан О.А., що діє на підставі Статуту, з одного боку, та гр. &lt;strong&gt;&lt;em&gt;Вишневецкий Алексей&lt;/em&gt;&lt;/strong&gt;&lt;strong&gt;&lt;em&gt;,&lt;/em&gt;&lt;/strong&gt; надалі - &amp;laquo;ТУРИСТ&amp;raquo;, який діє на підставі цивільної правосуб'єктності, з іншого боку, надалі також спільно іменовані &amp;laquo;Сторони&amp;raquo;, а кожна окремо &amp;mdash; &amp;laquo;Сторона&amp;raquo;, уклали даний Договір про наступне:&lt;/p&gt;
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
