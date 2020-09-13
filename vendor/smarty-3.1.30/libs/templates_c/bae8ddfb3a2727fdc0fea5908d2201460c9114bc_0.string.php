<?php
/* Smarty version 3.1.30, created on 2017-08-22 11:40:46
  from "bae8ddfb3a2727fdc0fea5908d2201460c9114bc" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599bee0ec94c66_04685059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599bee0ec94c66_04685059 (Smarty_Internal_Template $_smarty_tpl) {
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
<h4><strong>№</strong></h4>
</td>
<td style="width: 747px; height: 100px;" valign="top">
<h4><strong>Товари (роботи, послуги)</strong></h4>
</td>
<td style="width: 49px; height: 100px;" valign="top">
<h4><strong>Од</strong> <strong>.</strong></h4>
</td>
<td style="width: 127px; height: 100px;" valign="top">
<h4><strong>Кількість</strong></h4>
</td>
<td style="width: 255px; height: 100px;" valign="top">
<h4 align="right"><strong>Ціна</strong> <strong>без</strong> <strong>ПДВ</strong></h4>
</td>
<td style="width: 147px; height: 100px;" valign="top">
<h4 align="right"><strong>Сума</strong> <strong>без</strong> <strong>ПДВ</strong></h4>
</td>
</tr>
<tr style="height: 100px;">
<td style="width: 49px; height: 185px;" rowspan="2" valign="top">
<h4><strong>1</strong></h4>
</td>
<td style="width: 747px; height: 185px;" rowspan="2" valign="top">
<h4>За туристичні та інформаційно-консультативнші послуги <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</h4>
</td>
<td style="width: 49px; height: 185px;" rowspan="2" valign="top">
<h4>грн.</h4>
<h4>&nbsp;</h4>
</td>
<td style="width: 127px; height: 185px;" rowspan="2" valign="top">
<h4>1.000</h4>
<h4 align="right">&nbsp;</h4>
</td>
<td style="width: 255px; height: 100px;" valign="top">
<h4 align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h4>
</td>
<td style="width: 147px; height: 100px;" valign="top">
<h4 align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h4>
</td>
</tr>
<tr style="height: 85px;">
<td style="width: 255px; height: 85px;" valign="bottom">
<h4 align="right"><strong>Разом&nbsp;:</strong></h4>
</td>
<td style="width: 147px; height: 85px;" valign="top">
<h4>&nbsp;</h4>
<h4 align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</h4>
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
