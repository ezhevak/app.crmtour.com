<?php
/* Smarty version 3.1.30, created on 2017-01-26 23:56:05
  from "9adcc04f045211a906471e984148d83019e94674" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_588a70757eefb6_56860139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_588a70757eefb6_56860139 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;ДОГОВІР №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/strong&gt;&lt;/h3&gt;
&lt;h3 style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;на туристичне обслуговування&lt;/strong&gt;&lt;/h3&gt;
&lt;table style=&quot;width: 1088px; border-color: #ffffff;&quot;&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 515px;&quot;&gt;м.Київ&lt;/td&gt;
&lt;td style=&quot;width: 571px; text-align: right;&quot;&gt;&amp;laquo;&lt;span style=&quot;text-decoration: underline;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&lt;/span&gt;&amp;raquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;nbsp;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Товариство з обмеженою відповідальністю &amp;laquo;ДІВУАР&amp;raquo;, надалі - &amp;laquo;ТУРОПЕРАТОР&amp;raquo; (ліцензія Державної туристичної адміністрації України АВ 566623 от 08.04.2011р.), в особі директора Колихан О.А., що діє на підставі Статуту, з одного боку, та гр. &lt;strong&gt;&lt;em&gt;Вишневецкий Алексей&lt;/em&gt;&lt;/strong&gt;&lt;strong&gt;&lt;em&gt;,&lt;/em&gt;&lt;/strong&gt; надалі - &amp;laquo;ТУРИСТ&amp;raquo;, який діє на підставі цивільної правосуб'єктності, з іншого боку, надалі також спільно іменовані &amp;laquo;Сторони&amp;raquo;, а кожна окремо &amp;mdash; &amp;laquo;Сторона&amp;raquo;, уклали даний Договір про наступне:&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;Предмет Договору.&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;1.1. Туроператор зобов'язується відповідно до оформленої відповідно до цього Договору заявки Туриста на бронювання (надалі - &amp;laquo;Заявка&amp;raquo;) забезпечити надання комплексу туристичних послуг (туристичний продукт), а Турист зобов'язується на умовах даного Договору прийняти та оплатити послуги Туроператора.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;1.2. Заявка оформлюється у 2-х примірниках за формою, прийнятою у діяльності Туроператора, підписується Туристом та&amp;nbsp;є невід'ємною&amp;nbsp;частиною&amp;nbsp;даного&amp;nbsp;Договору.&amp;nbsp;Туроператор&amp;nbsp;у&amp;nbsp;разі необхідності надає допомогу Туристу у заповненні Заявки.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;1.3. Туроператор на підставі Заявки визначає туристичний продукт, що відповідає вимогам Туриста та бронює його. Туроператор після здійснення Туристом платежу, передбаченого п. 2.3. цього&amp;nbsp;Договору, видає Туристу&amp;nbsp;ваучер,&amp;nbsp;путівку&amp;nbsp;або&amp;nbsp;інший&amp;nbsp;документ&amp;nbsp;відповідно&amp;nbsp;до&amp;nbsp;умов відповідного туристичного продукту, що підтверджує право Туриста&amp;nbsp;на&amp;nbsp;отримання заброньованого туристичного продукту.&lt;/p&gt;
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
