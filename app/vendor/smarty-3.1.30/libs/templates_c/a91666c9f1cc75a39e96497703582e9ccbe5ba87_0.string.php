<?php
/* Smarty version 3.1.30, created on 2017-02-13 19:14:11
  from "a91666c9f1cc75a39e96497703582e9ccbe5ba87" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a1e96310ce78_93648801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a1e96310ce78_93648801 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;table style=&quot;width: 1071px;&quot;&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;РОЗРАХУНКОВА КВИТАНЦІЯ&lt;/td&gt;
&lt;td style=&quot;width: 10px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 128px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 115px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;Форма № РК-1&lt;/td&gt;
&lt;td style=&quot;width: 10px;&quot; rowspan=&quot;13&quot;&gt;
&lt;p&gt;л&lt;/p&gt;
&lt;p&gt;і&lt;/p&gt;
&lt;p&gt;н&lt;/p&gt;
&lt;p&gt;і&lt;/p&gt;
&lt;p&gt;я&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;в&lt;/p&gt;
&lt;p&gt;і&lt;/p&gt;
&lt;p&gt;д&lt;/p&gt;
&lt;p&gt;р&lt;/p&gt;
&lt;p&gt;и&lt;/p&gt;
&lt;p&gt;в&lt;/p&gt;
&lt;p&gt;у&lt;/p&gt;
&lt;/td&gt;
&lt;td style=&quot;width: 638px;&quot; colspan=&quot;6&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;Серія АААА&lt;/td&gt;
&lt;td style=&quot;width: 638px;&quot; colspan=&quot;6&quot;&gt;&amp;nbsp; ІД &amp;lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&amp;rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/td&gt;
&lt;td style=&quot;width: 638px;&quot; colspan=&quot;6&quot;&gt;&amp;nbsp;ПН &amp;lsaquo;індивідуальний податковий номер платника ПДВ&amp;rsaquo; - не платник ПДВ&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 243px;&quot; colspan=&quot;2&quot; rowspan=&quot;2&quot;&gt;Назва товару (послуги) **&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot; rowspan=&quot;2&quot;&gt;Вартість одиниці виміру&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot; rowspan=&quot;2&quot;&gt;ПДВ (%)&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot; rowspan=&quot;2&quot;&gt;Акцизний податок (ставка)&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot; rowspan=&quot;2&quot;&gt;Вартість&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;Сума розрахунку&lt;/td&gt;
&lt;td style=&quot;width: 243px;&quot; colspan=&quot;2&quot;&gt;
&lt;p&gt;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента&lt;/p&gt;
&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;шт.&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;без ПДВ&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
&lt;/td&gt;
&lt;td style=&quot;width: 243px;&quot; colspan=&quot;2&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;всього:&lt;/td&gt;
&lt;td style=&quot;width: 243px;&quot; colspan=&quot;2&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
&lt;/td&gt;
&lt;td style=&quot;width: 243px;&quot; colspan=&quot;2&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;У т.ч. за ставками&lt;/td&gt;
&lt;td style=&quot;width: 128px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 355px;&quot; colspan=&quot;4&quot;&gt;Сума розрахунку (грн, коп.)&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;ПДВ _%:без ПДВ&lt;/td&gt;
&lt;td style=&quot;width: 128px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 115px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 93px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;Акциз. под. &amp;lsaquo;ставка&amp;rsaquo;: -&lt;/td&gt;
&lt;td style=&quot;width: 336px;&quot; colspan=&quot;3&quot;&gt;Розрахунок провів&lt;/td&gt;
&lt;td style=&quot;width: 64px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 83px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 155px;&quot;&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td style=&quot;width: 421px;&quot;&gt;&amp;nbsp;&lt;/td&gt;
&lt;td style=&quot;width: 638px;&quot; colspan=&quot;6&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; (підпис)&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
)&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;<?php }
}
