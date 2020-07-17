<?php
/* Smarty version 3.1.30, created on 2019-11-16 12:18:39
  from "6fedbba049d5a8360cf5385fb8f6104c0b774ee4" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5dcfccff56fad5_39771955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcfccff56fad5_39771955 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td style="width: 327px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Постачальник</span></td>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" rowspan="4" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 384px;" colspan="2" width="221"><span style="font-size: 14pt;"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></span></td>
<td style="width: 597px;" colspan="2" width="283"><span style="font-size: 14pt;"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></span></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Р/р UA 57 300346 000 0026009019349601&nbsp; &nbsp; &nbsp; &nbsp;МФО 300346&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; АТ &laquo;Альфа-Банк&raquo;</em></span></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Є платником єдиного податку, 3 група</em></span></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</em></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Одержувач</span></td>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Платник</span></td>
<td style="width: 981px;" colspan="4" width="171"><span style="font-size: 14pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 1308px;" colspan="6" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Договір №</span></td>
<td style="width: 981px;" colspan="4" width="171"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" rowspan="2"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 384px;" colspan="2" width="221"><span style="font-size: 14pt;"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></span></td>
<td style="width: 597px;" colspan="2" width="120"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;</span></td>
</tr>
<tr>
<td style="width: 384px;" colspan="2" width="221"><span style="font-size: 14pt;"><strong>Дата рахунку</strong></span></td>
<td style="width: 597px;" colspan="2" width="120"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp;</span></td>
</tr>
<tr>
<td style="width: 61px;" width="40"><span style="font-size: 14pt;"><strong>№</strong></span></td>
<td style="width: 266px;" width="173"><span style="font-size: 14pt;"><strong>Назва послуги:</strong></span></td>
<td style="width: 264px;" width="171"><span style="font-size: 14pt;"><strong>Од.</strong></span></td>
<td style="width: 120px;" width="50"><span style="font-size: 14pt;"><strong>Кількість</strong></span></td>
<td style="width: 298px;" width="120"><span style="font-size: 14pt;"><strong>Ціна без ПДВ</strong></span></td>
<td style="width: 299px;" width="163"><span style="font-size: 14pt;"><strong>Сума без ПДВ</strong></span></td>
</tr>
<tr>
<td style="width: 61px;" width="40"><span style="font-size: 14pt;">1</span></td>
<td style="width: 266px;" width="173"><span style="font-size: 14pt;">За туристичні послуги</span></td>
<td style="width: 264px;" width="171"><span style="font-size: 14pt;">грн.</span></td>
<td style="width: 120px;" width="50"><span style="font-size: 14pt;">1</span></td>
<td style="width: 298px;" width="120"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr>
<td style="width: 711px;" colspan="4" rowspan="3" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 298px;" width="120"><span style="font-size: 14pt;">Разом без&nbsp; ПДВ:</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr>
<td style="width: 298px;" width="120"><span style="font-size: 14pt;">ПДВ:</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 14pt;">0</span></td>
</tr>
<tr>
<td style="width: 298px;" width="120"><span style="font-size: 14pt;"><strong>Всього з ПДВ:</strong></span></td>
<td style="width: 299px;" width="163"><span style="font-size: 14pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2"><span style="font-size: 14pt;">&nbsp;<strong>Всього на суму:</strong></span></td>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 1308px;" colspan="6"><span style="font-size: 14pt;">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr>
<td style="text-align: right; width: 711px;" colspan="4" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;Виписав (ла):</span></td>
<td style="width: 597px;" colspan="2" width="283">
<p><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
&nbsp;</span></p>
<p><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</span></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="font-size: 14pt;"><em>Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</strong>без ПДВ. Платник<strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em></span></h4>
<h4 style="text-align: justify;"><span style="font-size: 14pt;"><em>.</em></span></h4><?php }
}
