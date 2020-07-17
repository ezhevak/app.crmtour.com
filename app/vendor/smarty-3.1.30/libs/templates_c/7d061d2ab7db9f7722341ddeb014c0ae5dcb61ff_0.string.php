<?php
/* Smarty version 3.1.30, created on 2019-08-12 08:55:10
  from "7d061d2ab7db9f7722341ddeb014c0ae5dcb61ff" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d50ff3eb6f7d2_97847771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d50ff3eb6f7d2_97847771 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="584">
<tbody>
<tr>
<td colspan="2" width="328">&nbsp;Постачальник</td>
<td colspan="4" width="256"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td colspan="2" rowspan="4" width="328">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="128">ЄДРПОУ&nbsp; <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</td>
<td colspan="2" width="128">т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
&nbsp;</td>
</tr>
<tr>
<td colspan="4" width="256">
<p>IBAN: <?php echo $_smarty_tpl->tpl_vars['account']->value['BankIban'];?>
</p>
<p>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</p>
</td>
</tr>
<tr>
<td colspan="4" width="256">Платник податку на загальних підставах</td>
</tr>
<tr>
<td colspan="4" width="256">Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</td>
</tr>
<tr>
<td colspan="2" width="328">&nbsp;Одержувач</td>
<td colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
</tr>
<tr>
<td colspan="2" width="328">&nbsp;Платник</td>
<td colspan="4" width="256">той самий&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="584">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td colspan="2" width="328">&nbsp;Договір №</td>
<td colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td colspan="2" rowspan="2" width="328">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="128">РАХУНОК-ФАКТУРА №&nbsp;</td>
<td colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;</td>
</tr>
<tr>
<td colspan="2" width="128">Дата рахунку</td>
<td colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</td>
</tr>
<tr>
<td width="190">№</td>
<td width="138">Назва послуги:</td>
<td width="64">Од.</td>
<td width="64">Кількість</td>
<td width="64">Ціна з ПДВ</td>
<td width="64">Сума з ПДВ</td>
</tr>
<tr>
<td width="190">1</td>
<td width="138">За туристичні послуги, без ПДВ.</td>
<td width="64">грн.</td>
<td width="64">1</td>
<td width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
<td width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
</tr>
<tr>
<td width="190">2</td>
<td width="138">За послуги бронювання, в т.ч ПДВ</td>
<td width="64">пос.</td>
<td width="64">1</td>
<td width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
<td width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
</tr>
<tr>
<td colspan="4" width="456">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="64">Всього з ПДВ:</td>
<td width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
</tr>
<tr>
<td colspan="4" width="456">&nbsp;&nbsp;Виписав (ла):</td>
<td colspan="2" width="128">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="background-color: #ffffff;"><em>&nbsp;Призначення платежу: За туристичні послуги, послуги бронювання згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; в т.ч.&nbsp;ПДВ <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['VAT'];?>
 </strong>грн.. Платник <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong>.</em></span></h4><?php }
}
