<?php
/* Smarty version 3.1.30, created on 2019-11-16 12:17:25
  from "946d921b57c7a922de26d75df81c1a7b67883840" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5dcfccb56bf765_66938980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dcfccb56bf765_66938980 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>&nbsp;</p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td style="width: 327px;" colspan="2" width="40">&nbsp;Постачальник</td>
<td style="width: 981px;" colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 384px;" colspan="2" width="221"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td style="width: 597px;" colspan="2" width="283"><em>т/ф&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><em>Р/р UA 57 300346 000 0026009019349601&nbsp; &nbsp; &nbsp; &nbsp;МФО 300346&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; АТ &laquo;Альфа-Банк&raquo;</em></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><em>Є платником єдиного податку, 3 група</em></td>
</tr>
<tr>
<td style="width: 981px;" colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
</em></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40">&nbsp;Одержувач</td>
<td style="width: 981px;" colspan="4" width="504"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40">&nbsp;Платник</td>
<td style="width: 981px;" colspan="4" width="171"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></td>
</tr>
<tr>
<td style="width: 1308px;" colspan="6" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" width="40">&nbsp;Договір №</td>
<td style="width: 981px;" colspan="4" width="171"><span style="font-size: 18pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2" rowspan="2"><span style="font-size: 18pt;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 384px;" colspan="2" width="221"><span style="font-size: 18pt;"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></span></td>
<td style="width: 597px;" colspan="2" width="120"><span style="font-size: 18pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;</span></td>
</tr>
<tr>
<td style="width: 384px;" colspan="2" width="221"><span style="font-size: 18pt;"><strong>Дата рахунку</strong></span></td>
<td style="width: 597px;" colspan="2" width="120"><span style="font-size: 18pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp;</span></td>
</tr>
<tr>
<td style="width: 61px;" width="40"><span style="font-size: 18pt;"><strong>№</strong></span></td>
<td style="width: 266px;" width="173"><span style="font-size: 18pt;"><strong>Назва послуги:</strong></span></td>
<td style="width: 264px;" width="171"><span style="font-size: 18pt;"><strong>Од.</strong></span></td>
<td style="width: 120px;" width="50"><span style="font-size: 18pt;"><strong>Кількість</strong></span></td>
<td style="width: 298px;" width="120"><span style="font-size: 18pt;"><strong>Ціна без ПДВ</strong></span></td>
<td style="width: 299px;" width="163"><span style="font-size: 18pt;"><strong>Сума без ПДВ</strong></span></td>
</tr>
<tr>
<td style="width: 61px;" width="40"><span style="font-size: 18pt;">1</span></td>
<td style="width: 266px;" width="173"><span style="font-size: 18pt;">За туристичні послуги</span></td>
<td style="width: 264px;" width="171"><span style="font-size: 18pt;">грн.</span></td>
<td style="width: 120px;" width="50"><span style="font-size: 18pt;">1</span></td>
<td style="width: 298px;" width="120"><span style="font-size: 18pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 18pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr>
<td style="width: 711px;" colspan="4" rowspan="3" width="40"><span style="font-size: 18pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 298px;" width="120"><span style="font-size: 18pt;">Разом без&nbsp; ПДВ:</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 18pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr>
<td style="width: 298px;" width="120"><span style="font-size: 18pt;">ПДВ:</span></td>
<td style="width: 299px;" width="163"><span style="font-size: 18pt;">0</span></td>
</tr>
<tr>
<td style="width: 298px;" width="120"><span style="font-size: 18pt;"><strong>Всього з ПДВ:</strong></span></td>
<td style="width: 299px;" width="163"><span style="font-size: 18pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 327px;" colspan="2"><span style="font-size: 18pt;">&nbsp;<strong>Всього на суму:</strong></span></td>
<td style="width: 981px;" colspan="4" width="504"><span style="font-size: 18pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></span></td>
</tr>
<tr>
<td style="width: 1308px;" colspan="6"><span style="font-size: 18pt;">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr>
<td style="text-align: right; width: 711px;" colspan="4" width="40"><span style="font-size: 18pt;">&nbsp;&nbsp;Виписав (ла):</span></td>
<td style="width: 597px;" colspan="2" width="283">
<p><span style="font-size: 18pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
&nbsp;</span></p>
<p><span style="font-size: 18pt;"><?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</span></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="font-size: 18pt;"><em>Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp;</strong>без ПДВ. Платник<strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em></span></h4>
<h4 style="text-align: justify;"><span style="font-size: 18pt;"><em>.</em></span></h4><?php }
}
