<?php
/* Smarty version 3.1.30, created on 2020-01-28 11:44:02
  from "c6f0434762425d6dca3e73011f7122bdcb2a5365" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e300262cbb570_37129721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e300262cbb570_37129721 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.jpg" alt="" width="476" height="113" /></p>
<table style="height: 820px;" width="584">
<tbody>
<tr style="height: 49px;">
<td style="height: 49px; width: 300px;" colspan="2" width="328">&nbsp;Постачальник</td>
<td style="height: 49px; width: 1002px;" colspan="4" width="256"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr style="height: 49px;">
<td style="height: 213px; width: 300px;" colspan="2" rowspan="4" width="328">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 49px; width: 427px;" colspan="2" width="128">ЄДРПОУ&nbsp; <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</td>
<td style="height: 49px; width: 575px;" colspan="2" width="128">т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
&nbsp;</td>
</tr>
<tr style="height: 66px;">
<td style="height: 66px; width: 1002px;" colspan="4" width="256">IBAN: <?php echo $_smarty_tpl->tpl_vars['account']->value['BankIban'];?>
<br />Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 1002px;" colspan="4" width="256">Платник податку на загальних підставах</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 1002px;" colspan="4" width="256">Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 300px;" colspan="2" width="328">&nbsp;Одержувач</td>
<td style="height: 49px; width: 1002px;" colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 300px;" colspan="2" width="328">&nbsp;Платник</td>
<td style="height: 49px; width: 1002px;" colspan="4" width="256">той самий&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 1302px;" colspan="6" width="584">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 300px;" colspan="2" width="328">&nbsp;Договір №</td>
<td style="height: 49px; width: 1002px;" colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr style="height: 49px;">
<td style="height: 98px; width: 300px;" colspan="2" rowspan="2" width="328">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 49px; width: 427px;" colspan="2" width="128">РАХУНОК-ФАКТУРА №&nbsp;</td>
<td style="height: 49px; width: 575px;" colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 427px;" colspan="2" width="128">Дата рахунку</td>
<td style="height: 49px; width: 575px;" colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 45px;" width="190">№</td>
<td style="height: 49px; width: 255px;" width="138">Назва послуги:</td>
<td style="height: 49px; width: 311px;" width="64">Од.</td>
<td style="height: 49px; width: 116px;" width="64">Кількість</td>
<td style="height: 49px; width: 287px;" width="64">Ціна з ПДВ</td>
<td style="height: 49px; width: 288px;" width="64">Сума з ПДВ</td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 45px;" width="190">1</td>
<td style="height: 49px; width: 255px;" width="138">За туристичні послуги, без ПДВ.</td>
<td style="height: 49px; width: 311px;" width="64">грн.</td>
<td style="height: 49px; width: 116px;" width="64">1</td>
<td style="height: 49px; width: 287px;" width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
<td style="height: 49px; width: 288px;" width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
</tr>
<tr style="height: 66px;">
<td style="height: 66px; width: 45px;" width="190">2</td>
<td style="height: 66px; width: 255px;" width="138">За послуги бронювання, сервісний збір, в т.ч ПДВ</td>
<td style="height: 66px; width: 311px;" width="64">пос.</td>
<td style="height: 66px; width: 116px;" width="64">1</td>
<td style="height: 66px; width: 287px;" width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
<td style="height: 66px; width: 288px;" width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
</tr>
<tr style="height: 51px;">
<td style="height: 51px; width: 727px;" colspan="4" width="456">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 51px; width: 287px;" width="64"><span style="font-size: 12pt;"><strong>Всього з ПДВ:</strong></span></td>
<td style="height: 51px; width: 288px;" width="64"><span style="font-size: 12pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</strong></span></td>
</tr>
<tr style="height: 49px;">
<td style="height: 49px; width: 727px;" colspan="4" width="456">&nbsp;&nbsp;Виписав (ла):</td>
<td style="height: 49px; width: 575px;" colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
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
