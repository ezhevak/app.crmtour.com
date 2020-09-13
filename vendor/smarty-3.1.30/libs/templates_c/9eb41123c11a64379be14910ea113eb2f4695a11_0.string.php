<?php
/* Smarty version 3.1.30, created on 2018-01-14 17:08:25
  from "9eb41123c11a64379be14910ea113eb2f4695a11" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5b7269a17894_56905848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5b7269a17894_56905848 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td style="width: 368px;" colspan="2" width="40">&nbsp;Постачальник</td>
<td style="width: 706px;" colspan="4" width="504">ФОП Саввіна Христина Борисівна</td>
</tr>
<tr>
<td style="width: 368px;" colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 308px;" colspan="2" width="221"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td style="width: 398px;" colspan="2" width="283"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr>
<td style="width: 706px;" colspan="4" width="504"><em>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 у ПАТ КБ "ПРИВАТБАНК"</em></td>
</tr>
<tr>
<td style="width: 706px;" colspan="4" width="504"><em>Є платником єдиного податку, 3 група, 5%, не платник ПДВ</em></td>
</tr>
<tr>
<td style="width: 706px;" colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</em></td>
</tr>
<tr>
<td style="width: 368px;" colspan="2" width="40">&nbsp;Одержувач</td>
<td style="width: 706px;" colspan="4" width="504"><strong>ФОП Саввіна Христина Борисівна</strong></td>
</tr>
<tr>
<td style="width: 368px;" colspan="2" width="40">&nbsp;Платник</td>
<td style="width: 706px;" colspan="4" width="171"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr>
<td style="width: 1074px;" colspan="6" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="width: 368px;" colspan="2" width="40">&nbsp;Договір №</td>
<td style="width: 706px;" colspan="4" width="171"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td style="width: 368px;" colspan="2" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 308px;" colspan="2" width="221"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></td>
<td style="width: 398px;" colspan="2" width="120"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></td>
</tr>
<tr>
<td style="width: 308px;" colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td style="width: 398px;" colspan="2" width="120"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong></td>
</tr>
<tr>
<td style="width: 41px;" width="40"><strong>№</strong></td>
<td style="width: 327px;" width="173"><strong>Назва послуги:</strong></td>
<td style="width: 228px;" width="171"><strong>Од.</strong></td>
<td style="width: 80px;" width="50"><strong>Кількість</strong></td>
<td style="width: 199px;" width="120"><strong>Ціна без ПДВ</strong></td>
<td style="width: 199px;" width="163"><strong>Сума без ПДВ</strong></td>
</tr>
<tr>
<td style="width: 41px;" width="40">1</td>
<td style="width: 327px;" width="173">
<p>За туристичні послуги&nbsp;<em>згідно рахунку</em> <em>№ </em><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong><em>&nbsp;від&nbsp;</em><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong><strong><em>&nbsp;</em></strong><em>без ПДВ. Платник</em><strong><em>&nbsp;</em></strong><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong><em>Платник</em> <em><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</em></p>
</td>
<td style="width: 228px;" width="171">грн.</td>
<td style="width: 80px;" width="50">1</td>
<td style="width: 199px;" width="120"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
<td style="width: 199px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
</tr>
<tr>
<td style="width: 676px;" colspan="4" rowspan="3" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 199px;" width="120">Разом без&nbsp; ПДВ:</td>
<td style="width: 199px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
</tr>
<tr>
<td style="width: 199px;" width="120">ПДВ:</td>
<td style="width: 199px;" width="163">0</td>
</tr>
<tr>
<td style="width: 199px;" width="120"><strong>Всього з ПДВ:</strong></td>
<td style="width: 199px;" width="163">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</p>
</td>
</tr>
<tr>
<td style="width: 368px;" colspan="2">&nbsp;<strong>Всього на суму:</strong></td>
<td style="width: 706px;" colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</td>
</tr>
<tr>
<td style="width: 1074px;" colspan="6">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="text-align: right; width: 676px;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td style="width: 398px;" colspan="2" width="283"><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;">&nbsp;</h4><?php }
}
