<?php
/* Smarty version 3.1.30, created on 2019-09-26 16:08:33
  from "02a1a0ada9d266cd6cd93fb8188a9a07344da718" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d8cb8516f0167_16948315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8cb8516f0167_16948315 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_3.png" alt="" width="476" height="113" /></p>
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
<td colspan="4" width="256">IBAN: <?php echo $_smarty_tpl->tpl_vars['account']->value['BankIban'];?>
<br />Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
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
</strong>.</em></span></h4>
<p><span style="background-color: #ffffff;"><em><img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/08/Screenshot_5.png" alt="" width="1060" height="168" /></em></span></p><?php }
}
