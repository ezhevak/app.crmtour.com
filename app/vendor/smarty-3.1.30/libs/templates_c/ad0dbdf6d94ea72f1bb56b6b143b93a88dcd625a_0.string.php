<?php
/* Smarty version 3.1.30, created on 2017-08-21 15:26:51
  from "ad0dbdf6d94ea72f1bb56b6b143b93a88dcd625a" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_599ad18b267a21_64682635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599ad18b267a21_64682635 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><strong><u>Постачальник</u></strong></p>
<p style="padding-left: 150px;">&nbsp;ТОВ "Тураеро"</p>
<p style="padding-left: 150px;">ЄДРПОУ 38927580, тел. 341051</p>
<p style="padding-left: 150px;">Р/р 26003050235892 в ПАТ КБ &laquo;Приват Банк&raquo;, МФО 305299</p>
<p style="padding-left: 150px;">Є платником єдиного податку на прибуток 5%</p>
<p style="padding-left: 150px;">Адреса 49000, М.Дніпропетровськ, пр. К.Маркса, 81</p>
<p>&nbsp;</p>
<p><u>Одержувач</u> <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&nbsp;</p>
<p><strong><u>Платник</u></strong> той самий</p>
<p><strong><u>Замовлення</u></strong> Без замовлення</p>
<p style="text-align: center;" align="center"><strong>Рахунок</strong> <strong>-</strong> <strong>фактура</strong> <strong>№</strong> <strong>СФ</strong> <strong>-00<?php echo $_smarty_tpl->tpl_vars['data']->value['Invoice'];?>
 </strong><strong>від</strong> <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceDate'];?>
&nbsp;<strong>р</strong> <strong>.</strong></p>
<table border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td valign="top" width="35">
<p><strong>№</strong></p>
</td>
<td valign="top" width="287">
<p><strong>Назва</strong></p>
</td>
<td valign="top" width="31">
<p><strong>Од</strong> <strong>.</strong></p>
</td>
<td valign="top" width="103">
<p><strong>Кількість</strong></p>
</td>
<td valign="top" width="103">
<p align="right"><strong>Ціна</strong> <strong>без</strong> <strong>ПДВ</strong></p>
</td>
<td valign="top" width="103">
<p align="right"><strong>Сума</strong> <strong>без</strong> <strong>ПДВ</strong></p>
</td>
</tr>
<tr>
<td valign="top" width="35">
<p><strong>1</strong></p>
</td>
<td valign="top" width="287">
<p>За туристичні та інформаційно-консультативнші послуги <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
</td>
<td valign="top" width="31">
<p>шт.</p>
</td>
<td valign="top" width="103">
<p>1.000</p>
</td>
<td valign="top" width="103">
<p align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
<td valign="top" width="103">
<p align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
<tr>
<td colspan="2" valign="top" width="322">&nbsp;</td>
<td rowspan="2" valign="top" width="31">&nbsp;</td>
<td colspan="2" rowspan="2" valign="bottom" width="206">
<p align="right"><strong>Знижка</strong> <strong>: </strong> <strong>Всього</strong> <strong>:</strong></p>
</td>
<td valign="top" width="103">&nbsp;</td>
</tr>
<tr>
<td colspan="2" valign="top" width="322">&nbsp;</td>
<td valign="top" width="103">
<p align="right"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
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
