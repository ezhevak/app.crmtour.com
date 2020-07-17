<?php
/* Smarty version 3.1.30, created on 2020-02-11 15:31:02
  from "804ec7841b587044864aecace13528f6513498ea" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e42ac96c709b6_70670836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e42ac96c709b6_70670836 (Smarty_Internal_Template $_smarty_tpl) {
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
<td colspan="2" width="221"><em><?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
</em></td>
<td colspan="2" width="283"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>&nbsp;Р/р UA3730034600000<?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 ,&nbsp;ЄДРПОУ&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
 ,&nbsp;&nbsp;МФО банка&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Є платником єдиного податку, 3 група, 5%, не платник ПДВ</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</em></td>
</tr>
<tr>
<td colspan="2" width="40">&nbsp;Одержувач</td>
<td colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
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
<td colspan="2" width="120"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td colspan="2" width="120"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
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
<td colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="color: #ff0000;"><em>Призначення платежу: За туристичні послуги згідно договору № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</strong>без ПДВ. Платник<strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em></span></h4>
<h4 style="text-align: justify;"><em>.</em></h4><?php }
}
