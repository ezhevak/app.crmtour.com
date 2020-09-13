<?php
/* Smarty version 3.1.30, created on 2017-08-22 11:42:31
  from "055165c30291f0e0155658ef463d521875bd40a9" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599bee77a895e1_51587930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599bee77a895e1_51587930 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><strong><u>Постачальник</u></strong></p>
<p style="padding-left: 150px;">&nbsp;ТОВ "Тураеро"</p>
<p style="padding-left: 150px;">ЄДРПОУ 38927580, тел. 341051</p>
<p style="padding-left: 150px;">Р/р 26003050235892 в ПАТ КБ &laquo;Приват Банк&raquo;, МФО 305299</p>
<p style="padding-left: 150px;">Є платником єдиного податку на прибуток 5%</p>
<p style="padding-left: 150px;">Адреса 49000, М.Дніпропетровськ, пр. К.Маркса, 81</p>
<p>&nbsp;</p>
<p><u>Одержувач</u> <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 ,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PhoneMob'];?>
</p>
<p><strong><u>Платник</u></strong> той самий</p>
<p><strong><u>Замовлення</u></strong> Без замовлення</p>
<p style="text-align: center;" align="center"><strong>Рахунок</strong> <strong>-</strong> <strong>фактура</strong> <strong>№</strong> <strong>СФ</strong> <strong>-00<?php echo $_smarty_tpl->tpl_vars['data']->value['Invoice'];?>
 </strong><strong>від</strong> <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceDate'];?>
&nbsp;<strong>р</strong> <strong>.</strong></p>
<table style="width: 1376px;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 100px;">
<td style="width: 49px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u0"><strong>№</strong></h3>
</td>
<td style="width: 747px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u1"><strong>Товари (роботи, послуги)</strong></h3>
</td>
<td style="width: 49px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u2"><strong>Од</strong> <strong>.</strong></h3>
</td>
<td style="width: 127px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u3"><strong>Кількість</strong></h3>
</td>
<td style="width: 255px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u4" align="right"><strong>Ціна</strong> <strong>без</strong> <strong>ПДВ</strong></h3>
</td>
<td style="width: 147px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6u5" align="right"><strong>Сума</strong> <strong>без</strong> <strong>ПДВ</strong></h3>
</td>
</tr>
<tr style="height: 100px;">
<td style="width: 49px; height: 185px;" rowspan="2" valign="top">
<h3 id="mcetoc_1bo4hmo6u6"><strong>1</strong></h3>
</td>
<td style="width: 747px; height: 185px;" rowspan="2" valign="top">
<h3 id="mcetoc_1bo4hmo6u7">За туристичні та інформаційно-консультативнші послуги <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</h3>
</td>
<td style="width: 49px; height: 185px;" rowspan="2" valign="top">
<h3 id="mcetoc_1bo4hmo6u8">грн.</h3>
<h3 id="mcetoc_1bo4hmo6u9">&nbsp;</h3>
</td>
<td style="width: 127px; height: 185px;" rowspan="2" valign="top">
<h3 id="mcetoc_1bo4hmo6ua">1.000</h3>
<h3 id="mcetoc_1bo4hmo6ub" align="right">&nbsp;</h3>
</td>
<td style="width: 255px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6uc" align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h3>
</td>
<td style="width: 147px; height: 100px;" valign="top">
<h3 id="mcetoc_1bo4hmo6ud" align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h3>
</td>
</tr>
<tr style="height: 85px;">
<td style="width: 255px; height: 85px;" valign="bottom">
<h3 id="mcetoc_1bo4hmo6ue" align="right"><strong>Разом&nbsp;:</strong></h3>
</td>
<td style="width: 147px; height: 85px;" valign="top">
<h3 id="mcetoc_1bo4hmo6uf">&nbsp;</h3>
<h3 id="mcetoc_1bo4hmo6ug" align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h3>
</td>
</tr>
</tbody>
</table>
<p><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
 грн. 00 коп</strong></p>
<p><strong>Без</strong> <strong>ПДВ</strong></p>
<p>&nbsp;</p>
<p style="text-align: right;"><strong>Виписав(ла): Корягіна А.П.</strong></p>
<p style="text-align: right;"><strong>Рахунок дійсний до сплати до: <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceDate'];?>
&nbsp;</strong></p><?php }
}
