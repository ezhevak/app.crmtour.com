<?php
/* Smarty version 3.1.30, created on 2018-01-18 11:30:18
  from "e2f798e15ccf7e258d1eb4a81532bf8cf7df3d04" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a60692ad2b964_19657074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a60692ad2b964_19657074 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="666">
<tbody>
<tr>
<td colspan="6" width="384">Додаток 2</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">до Положення про ведення касових операцій</td>
<td width="19">&nbsp;</td>
<td style="text-align: center;" width="263">
<h5><strong><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</strong></h5>
</td>
</tr>
<tr>
<td colspan="6" width="384">у національній валюті в Україні</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp; (найменування підприємства (установи, організації))</td>
</tr>
<tr>
<td colspan="6" width="384">Типова форма № КО-1</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">&nbsp;</td>
<td style="text-align: center;" width="263">Квитанція</td>
</tr>
<tr>
<td width="64">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td width="19">&nbsp;</td>
<td style="text-align: center;" width="263">до прибуткового касового ордера № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
-1</td>
</tr>
<tr>
<td colspan="6" width="384">Ідентифікаційний&nbsp;</td>
<td width="19">&nbsp;</td>
<td style="text-align: center;" width="263">від &ldquo;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&rdquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
 р.</td>
</tr>
<tr>
<td colspan="6" width="384">код ЄДРПОУ&nbsp;&nbsp;</td>
<td width="19">Л</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</td>
<td width="19">і</td>
<td width="263">Прийнято від<strong> <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">н</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center;" colspan="6" width="384"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
<td width="19">і</td>
<td width="263">Підстава: <strong>за туристичні послуги згідно догвору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong></td>
</tr>
<tr>
<td style="text-align: center;" colspan="6" width="384">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (найменування підприємства (установи, організації))</td>
<td width="19">я</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">&nbsp;</td>
<td width="263">Сума:<strong> &nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</strong></td>
</tr>
<tr>
<td colspan="6" width="384">Прибутковий касовий ордер № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
-1</td>
<td width="19">в</td>
<td width="263">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (словами)</td>
</tr>
<tr>
<td colspan="6" width="384">від &ldquo;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDay'];?>
&rdquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealMonth'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealYear'];?>
 р.</td>
<td width="19">і</td>
<td width="263"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</strong></td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">д</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td width="64">Кореспондую-чий рахунок, субрахунок</td>
<td width="64">Код аналітичного рахунку</td>
<td width="64">Сума цифрами</td>
<td width="64">Код цільового призначення</td>
<td width="64">&nbsp;</td>
<td rowspan="2" width="64">&nbsp;</td>
<td width="19">р</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td width="64">&nbsp;</td>
<td width="64">&nbsp;</td>
<td width="64">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
<td width="64">&nbsp;</td>
<td width="64">&nbsp;</td>
<td width="19">і</td>
<td width="263">М.П.&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">з</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">Прийнято від:</td>
<td width="19">у</td>
<td width="263">Головний&nbsp;бухгалтер (Директор)</td>
</tr>
<tr>
<td colspan="6" width="384"><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;_______________________ <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</td>
</tr>
<tr>
<td colspan="6" width="384">Підстава: за туристичні послуги згідно догвору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис, прізвище, ініціали)</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">Сума <?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</td>
<td width="19">&nbsp;</td>
<td width="263">Касир/менеджер ___________________ <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (словами)</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис, прізвище, ініціали)</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">Додатки: _________________________________________________________</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">_________________________________________________________________</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">Головний&nbsp;бухгалтер (Директор) ________________________________ <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис, прізвище, ініціали)</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">Одержав касир/менеджер ______________________________ <?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис, прізвище, ініціали)</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
<tr>
<td colspan="6" width="384">&nbsp;</td>
<td width="19">&nbsp;</td>
<td width="263">&nbsp;</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p><?php }
}
