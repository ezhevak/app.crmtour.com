<?php
/* Smarty version 3.1.30, created on 2017-02-21 16:57:17
  from "92e461b0c835f761ddc0bba63a06f5b7742637ad" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ac554d6ec650_06133790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ac554d6ec650_06133790 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="717">
<tbody>
<tr>
<td width="40">&nbsp;</td>
<td width="173">Постачальник</td>
<td colspan="4" width="504"><strong>Фізична особа-підприємець "Євсеєнко Ольга Ігорівна"</strong></td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="2" width="221">ЄДРПОУ 3059313522</td>
<td colspan="2" width="283">т/ф (044) 599 55 41&nbsp;</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="4" width="504">Р/р 26009052625893 в ПАТ КБ &laquo;Приватбанк&raquo; МФО 300711&nbsp;</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="4" width="504">Є платником єдиного податку, 3 група, 5%, не платник ПДВ</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="4" width="504">Поштова.адреса: Україна, 01010, м. Київ, вул. І. Мазепи, 3-Б, оф. 231</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">Одержувач</td>
<td colspan="4" width="504">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">Платник</td>
<td width="171">той самий</td>
<td width="50">&nbsp;</td>
<td width="120">&nbsp;</td>
<td width="163">&nbsp;</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td width="171">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="120">&nbsp;</td>
<td width="163">&nbsp;</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">Договір №</td>
<td width="171">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
<td width="50">&nbsp;</td>
<td width="120">&nbsp;</td>
<td width="163">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="2" width="221"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></td>
<td width="120"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></td>
<td width="163">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td width="120"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong></td>
<td width="163">&nbsp;</td>
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
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td width="171">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="120">Разом без&nbsp; ПДВ:</td>
<td width="163"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td width="171">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="120">ПДВ:</td>
<td width="163">0</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td width="171">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="120"><strong>Всього з ПДВ:</strong></td>
<td width="163"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="173"><strong>Всього на суму:</strong></td>
<td colspan="4" width="504"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="173">без ПДВ</td>
<td width="171">&nbsp;</td>
<td width="50">&nbsp;</td>
<td width="120">&nbsp;</td>
<td width="163">&nbsp;</td>
</tr>
<tr>
<td width="40">&nbsp;</td>
<td width="173">&nbsp;</td>
<td colspan="2" width="221">Виписав (ла):</td>
<td colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p><?php }
}
