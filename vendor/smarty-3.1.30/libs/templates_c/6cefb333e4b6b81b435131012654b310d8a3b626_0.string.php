<?php
/* Smarty version 3.1.30, created on 2017-03-17 13:32:06
  from "6cefb333e4b6b81b435131012654b310d8a3b626" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cbc9367d1be8_95955865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cbc9367d1be8_95955865 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td colspan="2" width="40">&nbsp;Постачальник</td>
<td colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="221"><em>ЄДРПОУ&nbsp; <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td colspan="2" width="283"><em>т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
&nbsp;</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Платник податку на загальних підставах</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</em></td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Одержувач</td>
<td colspan="4" width="504"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Платник</td>
<td colspan="4" width="171"><strong>той самий&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td colspan="6" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Договір №</td>
<td colspan="4" width="171"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td colspan="2" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="221"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></td>
<td colspan="2" width="120"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;</td>
</tr>
<tr>
<td colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td colspan="2" width="120"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp;</td>
</tr>
<tr>
<td width="40"><strong>№</strong></td>
<td width="173"><strong>Назва послуги:</strong></td>
<td width="171"><strong>Од.</strong></td>
<td width="50"><strong>Кількість</strong></td>
<td width="120"><strong>Ціна з ПДВ</strong></td>
<td width="163"><strong>Сума з ПДВ</strong></td>
</tr>
<tr>
<td width="40">1</td>
<td width="173">За туристичні послуги, без ПДВ.</td>
<td width="171">грн.</td>
<td width="50">1</td>
<td width="120"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</td>
</tr>
<tr>
<td width="40">2</td>
<td width="173">За послуги бронювання, в т.ч ПДВ</td>
<td width="171">пос.</td>
<td width="50">1</td>
<td width="120"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</td>
</tr>
<tr>
<td colspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="120"><strong>Всього з ПДВ:</strong></td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
</tr>
<tr>
<td style="text-align: right;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><em>&nbsp;Призначення платежу: За туристичні послуги, послуги бронювання згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; в т.ч.&nbsp;ПДВ. Платник <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong>.</em></h4><?php }
}
