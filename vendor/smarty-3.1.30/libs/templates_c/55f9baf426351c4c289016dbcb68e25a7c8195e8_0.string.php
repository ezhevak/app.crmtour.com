<?php
/* Smarty version 3.1.30, created on 2019-04-16 10:36:54
  from "55f9baf426351c4c289016dbcb68e25a7c8195e8" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cb58616d4a159_81719483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb58616d4a159_81719483 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="width: 100%; border-style: none;" border="0">
<tbody>
<tr>
<td style="width: 47.5%;">
<p>ЗАТВЕРДЖУЮ<br />Директор</p>
<p>ТОВАРИСТВО З ОБМЕЖЕНОЮ ВІДПОВІДАЛЬНІСТЮ &laquo;ДІВУАР&raquo;</p>
<p><br />________________<br />(Колихан Ольга Анатоліївна<em>)</em></p>
</td>
<td style="width: 52.5%;">
<p>ЗАТВЕРДЖУЮ<br /><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerPosition'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
<br /><br /><br />_______________<br />(<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
<em>)</em></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: center;">&nbsp;</h4>
<h4 style="text-align: center;"><strong>АКТ №<?php echo $_smarty_tpl->tpl_vars['data']->value['Act'];?>
 від&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
<br />надання послуг</strong></h4>
<div>Ми, що нижче&nbsp; підписалися, представник Виконавця ТОВ "ДІВУАР", в особі директора Колихан О.А., яка діє на підставі Статуту та представник Замовника <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerPosition'];?>
 <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
, яка діє на підставі <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerBasis'];?>
, уклали цей акт про те, що Виконавець виконав роботи (надав послуги) згідно договору №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
.</div>
<table width="100%">
<tbody>
<tr>
<td width="26">
<p>№ п/п</p>
</td>
<td width="113">
<p>Назва роботи (послуги)</p>
</td>
<td width="110">
<p>Од. вим.</p>
</td>
<td width="53">
<p>К-сть</p>
</td>
<td width="75">
<p>Ціна, грн</p>
</td>
<td width="61">
<p>Сума, грн. Без ПДВ</p>
</td>
</tr>
<tr>
<td width="26">
<p>1</p>
</td>
<td width="113">
<p><strong>За туристичні послуги за межами України</strong></p>
</td>
<td width="110">
<p>&nbsp;грн</p>
</td>
<td width="53">
<p>&nbsp;1</p>
</td>
<td width="75">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
<td width="61">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>Загальна вартість послуг склала:<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
, без ПДВ.&nbsp;</p>
<p>Послуги виконані повністю, сторони претензій одна до одної не мають.</p>
<p>&nbsp;</p>
<table style="height: 323px; width: 100%; border-collapse: collapse; border-style: none;" border="0">
<tbody>
<tr>
<td style="width: 12.5%;">
<p><strong>Виконавець</strong></p>
<p><strong>ТОВ "ДІВУАР"</strong></p>
<p>&nbsp;</p>
<p>ЄДРПОУ 34191464,</p>
<p>Р/р 26004053017503</p>
<p>ПАТ КБ &laquo;Приватбанк&raquo; МФО 321842</p>
<p>Юридична адреса: Україна, 04071, м. Київ, Введенська 1, оф "А"</p>
<p>Фактична адреса: Україна, 04071, м. Київ, Введенська 1, оф "А"</p>
<p>тел. (044) 501-75-55</p>
<p>моб. (067)&nbsp;502-38-72</p>
<p>Email. travel@divuar.con.ua</p>
<p>Ліцензія АВ 566623 від 08.04.2011 на туроператорську діяльність</p>
<p>&nbsp;</p>
<p>Дата&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
 &nbsp;</p>
<p>&nbsp;</p>
<p>Директор ___________________________&nbsp;Колихан О. А.</p>
<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; М.П.</p>
</td>
<td style="width: 12.5%;">
<p><strong>Замовник</strong></p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
</p>
<p>&nbsp;</p>
<p>ЄДРПОУ: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['TaxNumber'];?>
</p>
<p>Р/р: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalAccountNum'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalBankName'];?>
</p>
<p>МФО <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalMFO'];?>
</p>
<p>&nbsp;</p>
<p>Юридична адреса: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeAddress'];?>
</p>
<p>Фактична адреса: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalFactAddress'];?>
</p>
<p><br />Тел. <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficePhone'];?>
</p>
<p>Моб.&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeMobile'];?>
</p>
<p>Email:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeEmail'];?>
</p>
<p>&nbsp;</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['TaxForm'];?>
</p>
<p>&nbsp;</p>
<p>Дата&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerPosition'];?>
 __________________<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; М.П.</p>
</td>
</tr>
</tbody>
</table>
<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></p><?php }
}
