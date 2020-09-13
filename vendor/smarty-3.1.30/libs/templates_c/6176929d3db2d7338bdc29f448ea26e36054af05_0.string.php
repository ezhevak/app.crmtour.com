<?php
/* Smarty version 3.1.30, created on 2020-01-28 11:54:38
  from "6176929d3db2d7338bdc29f448ea26e36054af05" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e3004de95c1f6_02255145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3004de95c1f6_02255145 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.jpg" alt="" width="476" height="113" /></p>
<table style="height: 820px;" width="584">
<tbody>
<tr style="height: 49px;">
<td style="height: 49px; width: 398px;" colspan="2" width="328">&nbsp;Постачальник</td>
<td style="height: 49px; width: 904px;" colspan="4" width="256"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr style="height: 49px;">
<td style="height: 213px; width: 398px;" colspan="2" rowspan="4" width="328"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="height: 49px; width: 329px;" colspan="2" width="128"><span style="font-size: 14pt;">ЄДРПОУ&nbsp; <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</span></td>
<td style="height: 49px; width: 575px;" colspan="2" width="128"><span style="font-size: 14pt;">т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
&nbsp;</span></td>
</tr>
<tr style="height: 66px;">
<td style="height: 66px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">IBAN: <?php echo $_smarty_tpl->tpl_vars['account']->value['BankIban'];?>
</span><br /><span style="font-size: 14pt;">Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">Платник податку на загальних підставах</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 398px;" colspan="2" width="328"><span style="font-size: 14pt;">&nbsp;Одержувач</span></td>
<td style="height: 49px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 398px;" colspan="2" width="328"><span style="font-size: 14pt;">&nbsp;Платник</span></td>
<td style="height: 49px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">той самий&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 1302px;" colspan="6" width="584"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 398px;" colspan="2" width="328"><span style="font-size: 14pt;">&nbsp;Договір №</span></td>
<td style="height: 49px; width: 904px;" colspan="4" width="256"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 98px; width: 398px;" colspan="2" rowspan="2" width="328"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="height: 49px; width: 329px;" colspan="2" width="128"><span style="font-size: 14pt;">РАХУНОК-ФАКТУРА №&nbsp;</span></td>
<td style="height: 49px; width: 575px;" colspan="2" width="128"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 329px;" colspan="2" width="128"><span style="font-size: 14pt;">Дата рахунку</span></td>
<td style="height: 49px; width: 575px;" colspan="2" width="128"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 94px;" width="190"><span style="font-size: 14pt;">№</span></td>
<td style="height: 49px; width: 304px;" width="138"><span style="font-size: 14pt;">Назва послуги:</span></td>
<td style="height: 49px; width: 213px;" width="64"><span style="font-size: 14pt;">Од.</span></td>
<td style="height: 49px; width: 116px;" width="64"><span style="font-size: 14pt;">Кількість</span></td>
<td style="height: 49px; width: 287px;" width="64"><span style="font-size: 14pt;">Ціна з ПДВ</span></td>
<td style="height: 49px; width: 288px;" width="64"><span style="font-size: 14pt;">Сума з ПДВ</span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 94px;" width="190"><span style="font-size: 14pt;">1</span></td>
<td style="height: 49px; width: 304px;" width="138"><span style="font-size: 14pt;">За туристичні послуги, без ПДВ.</span></td>
<td style="height: 49px; width: 213px;" width="64"><span style="font-size: 14pt;">грн.</span></td>
<td style="height: 49px; width: 116px;" width="64"><span style="font-size: 14pt;">1</span></td>
<td style="height: 49px; width: 287px;" width="64"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</span></td>
<td style="height: 49px; width: 288px;" width="64"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</span></td>
</tr>
<tr style="height: 66px;">
<td style="height: 66px; width: 94px;" width="190"><span style="font-size: 14pt;">2</span></td>
<td style="height: 66px; width: 304px;" width="138"><span style="font-size: 14pt;">За послуги бронювання, сервісний збір, в т.ч ПДВ</span></td>
<td style="height: 66px; width: 213px;" width="64"><span style="font-size: 14pt;">пос.</span></td>
<td style="height: 66px; width: 116px;" width="64"><span style="font-size: 14pt;">1</span></td>
<td style="height: 66px; width: 287px;" width="64"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</span></td>
<td style="height: 66px; width: 288px;" width="64"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</span></td>
</tr>
<tr style="height: 51px;">
<td style="height: 51px; width: 727px;" colspan="4" width="456"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="height: 51px; width: 287px;" width="64"><span style="font-size: 14pt;"><strong>Всього з ПДВ:</strong></span></td>
<td style="height: 51px; width: 288px;" width="64"><span style="font-size: 14pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</strong></span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 727px;" colspan="4" width="456"><span style="font-size: 14pt;">&nbsp;&nbsp;Виписав (ла):</span></td>
<td style="height: 49px; width: 575px;" colspan="2" width="128"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</span></td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="background-color: #ffffff;"><em>&nbsp;Призначення платежу: За туристичні послуги, послуги бронювання згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; в т.ч.&nbsp;ПДВ <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['VAT'];?>
 </strong>грн.. Платник <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong>.</em></span></h4>
<p><span style="background-color: #ffffff;"><em><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.jpg" alt="" width="1060" height="168" /></em></span></p><?php }
}
