<?php
/* Smarty version 3.1.30, created on 2017-03-06 14:17:48
  from "c2eaef414e8bdc1bff89ae5a2940510439bf079b" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bd536cd9f743_33838306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58bd536cd9f743_33838306 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td colspan="2" width="40">&nbsp;Постачальник</td>
<td colspan="4" width="504"><strong>Фізична особа-підприємець "Євсеєнко Ольга Ігорівна"</strong></td>
</tr>
<tr>
<td colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td colspan="2" width="221"><em>ЄДРПОУ 3059313522</em></td>
<td colspan="2" width="283"><em>т/ф (044) 599 55 41&nbsp;</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Р/р 26009052625893 в ПАТ КБ &laquo;Приватбанк&raquo; МФО 300711&nbsp;</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Є платником єдиного податку, 3 група, 5%, не платник ПДВ</em></td>
</tr>
<tr>
<td colspan="4" width="504"><em>Поштова.адреса: Україна, 01010, м. Київ, вул. І. Мазепи, 3-Б, оф. 231</em></td>
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
<td width="120"><strong>Ціна без ПДВ</strong></td>
<td width="163"><strong>Сума без ПДВ</strong></td>
</tr>
<tr>
<td width="40">1</td>
<td width="173">За туристичні послуги</td>
<td width="171">грн.</td>
<td width="50">1</td>
<td width="120"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
</tr>
<tr>
<td colspan="4" rowspan="3" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="120">Разом без&nbsp; ПДВ:</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
</tr>
<tr>
<td width="120">ПДВ:</td>
<td width="163">0</td>
</tr>
<tr>
<td width="120"><strong>Всього з ПДВ:</strong></td>
<td width="163"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</strong></td>
</tr>
<tr>
<td colspan="2">&nbsp;<strong>Всього на суму:</strong></td>
<td colspan="4" width="504"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</strong></td>
</tr>
<tr>
<td colspan="6">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="text-align: right;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><em>&nbsp;Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; без ПДВ. Платник <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong>.</em></h4><?php }
}
