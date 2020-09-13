<?php
/* Smarty version 3.1.30, created on 2019-04-03 21:30:53
  from "494fddc19c635d359bc15cc2f4096247377a0e57" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ca4fbdd5665e1_13744831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca4fbdd5665e1_13744831 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td colspan="2" width="40">&nbsp;Постачальник</td>
<td colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="221"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td colspan="2" width="283"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Р/р&nbsp;26009019349601&nbsp; &nbsp; &nbsp; &nbsp;МФО 300346&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; АТ &laquo;Альфа-Банк&raquo;</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Є платником єдиного податку, 3 група</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</em></td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Одержувач</td>
<td colspan="4" width="504"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Платник</td>
<td colspan="4" width="171"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
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
<td width="120"><strong>Ціна без ПДВ</strong></td>
<td width="163"><strong>Сума без ПДВ</strong></td>
</tr>
<tr>
<td width="40">1</td>
<td width="173">За туристичні послуги</td>
<td width="171">грн.</td>
<td width="50">1</td>
<td width="120"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr>
<td colspan="4" rowspan="3" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="120">Разом без&nbsp; ПДВ:</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr>
<td width="120">ПДВ:</td>
<td width="163">0</td>
</tr>
<tr>
<td width="120"><strong>Всього з ПДВ:</strong></td>
<td width="163"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></td>
</tr>
<tr>
<td colspan="2">&nbsp;<strong>Всього на суму:</strong></td>
<td colspan="4" width="504"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></td>
</tr>
<tr>
<td colspan="6">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="text-align: right;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td colspan="2" width="283">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
&nbsp;</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><em>Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</strong>без ПДВ. Платник<strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em></h4>
<h4 style="text-align: justify;"><em>.</em></h4><?php }
}
