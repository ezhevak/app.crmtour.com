<?php
/* Smarty version 3.1.30, created on 2018-01-21 15:07:50
  from "b545c836cc95e69f1a64808d6bbfc22f3c31cbc5" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6490a6a27bf2_05546869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6490a6a27bf2_05546869 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2" width="40">&nbsp;Постачальник</td>
<td style="height: 50px;" colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 210px;" colspan="2" rowspan="5" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 43px;" colspan="2" width="221"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td style="height: 43px;" colspan="2" width="283"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="4" width="504"><em>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
&nbsp; в ПАТ КБ "ПРИВАТБАНК" (ЄДРПОУ 14360570, МФО 380269) </em></td>
</tr>
<tr style="height: 17px;">
<td style="height: 17px;" colspan="4"><em>Картковий рахунок&nbsp;5168 7456 0116 3527 (КБ "ПриватБанк)</em></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="4" width="504"><em>Є платником єдиного податку, 2 група, не платник ПДВ</em></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</em></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2" width="40">&nbsp;Одержувач</td>
<td style="height: 50px;" colspan="4" width="504"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2" width="40">&nbsp;Платник</td>
<td style="height: 50px;" colspan="4" width="171"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="6" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2" width="40">&nbsp;Договір №</td>
<td style="height: 50px;" colspan="4" width="171"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 100px;" colspan="2" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 50px;" colspan="2" width="221"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></td>
<td style="height: 50px;" colspan="2" width="120"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td style="height: 50px;" colspan="2" width="120"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="40"><strong>№</strong></td>
<td style="height: 50px;" width="173"><strong>Назва послуги:</strong></td>
<td style="height: 50px;" width="171"><strong>Од.</strong></td>
<td style="height: 50px;" width="50"><strong>Кількість</strong></td>
<td style="height: 50px;" width="120"><strong>Ціна без ПДВ</strong></td>
<td style="height: 50px;" width="163"><strong>Сума без ПДВ</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="40">1</td>
<td style="height: 50px;" width="173">За туристичні послуги</td>
<td style="height: 50px;" width="171">грн.</td>
<td style="height: 50px;" width="50">1</td>
<td style="height: 50px;" width="120"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
<td style="height: 50px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 150px;" colspan="4" rowspan="3" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="height: 50px;" width="120">Разом без&nbsp; ПДВ:</td>
<td style="height: 50px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="120">ПДВ:</td>
<td style="height: 50px;" width="163">0</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="120"><strong>Всього з ПДВ:</strong></td>
<td style="height: 50px;" width="163"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="2">&nbsp;<strong>Всього на суму:</strong></td>
<td style="height: 50px;" colspan="4" width="504"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" colspan="6">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="text-align: right; height: 50px;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td style="height: 50px;" colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><em>Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;від&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</strong>без ПДВ. Платник<strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em></h4><?php }
}
