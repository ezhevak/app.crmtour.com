<?php
/* Smarty version 3.1.30, created on 2017-02-21 15:51:15
  from "648a464782c5cbc6b29f2fc10a8fd1eb099eded1" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ac45d39c7b81_64732533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ac45d39c7b81_64732533 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><strong>&nbsp;</strong></p>
<table>
<tbody>
<tr>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /> Директор<br /><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
<br /> <br /> ________________<br /> (<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
<em>)</em></p>
<p>&nbsp;</p>
</td>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /> <br /> <br /> <br /> _______________<br /> (<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<em>)</em>&nbsp;</p>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p><strong>АКТ № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
<br /> надання послуг</strong></p>
<p><strong>&lt;br style="page-break-after: always"&gt;</strong></p>
<p>Ми, що нижче підписалися, представник Виконавця і представник Замовника (Туриста), уклали цей акт про те, що Виконавець виконав роботи (надав послуги) згідно договору №$data.DealNo} від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 р.</p>
<table width="100%">
<tbody>
<tr>
<td width="26">
<p>№ п/п</p>
</td>
<td width="113">
<p>Назва роботи (послуги)</p>
</td>
<td width="110">
<p>Од. вим.</p>
</td>
<td width="53">
<p>К-сть</p>
</td>
<td width="75">
<p>Ціна, грн</p>
</td>
<td width="61">
<p>Сума, грн</p>
</td>
</tr>
<tr>
<td width="26">
<p>&nbsp;</p>
</td>
<td width="113">
<p>&nbsp;<strong>Послуги з бронювання туристичних послуг</strong></p>
</td>
<td width="110">
<p>&nbsp;Пос.</p>
</td>
<td width="53">
<p>&nbsp;1</p>
</td>
<td width="75">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</p>
</td>
<td width="61">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>Всього, <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
 , (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremiaString'];?>
)</p>
<p>Послуги виконані повністю, сторони претензій одна до одної не мають.</p>
<p><strong>від Виконавця&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;від Замовника&nbsp;</strong></p>
<p>М.П./Підпис&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Підпис</p>
<p>Дата_________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Дата___________</p><?php }
}
