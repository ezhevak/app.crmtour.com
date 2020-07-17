<?php
/* Smarty version 3.1.30, created on 2017-03-17 13:15:37
  from "b7ff9fd9e76f5c35be50c06344a01e0375a30b44" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cbc559065705_44528373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cbc559065705_44528373 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
<tbody>
<tr>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /> Директор<br /><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
<br /> <br /> ________________<br /> (<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
<em>)</em></p>
</td>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /> <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<br /> <br /> <br /> _______________<br /> (<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<em>)</em></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: center;"><strong>АКТ № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
<br /> надання послуг</strong></h4>
<p>Ми, що нижче підписалися, Туроператор, в особі Директора <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 &nbsp;і представник Замовника (Туриста), уклали цей акт про те, що Виконавець виконав роботи (надав послуги) згідно договору №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
.</p>
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
<p>&nbsp;<strong>Туристичні послуги</strong></p>
</td>
<td width="110">
<p>&nbsp;Грн.</p>
</td>
<td width="53">
<p>&nbsp;1</p>
</td>
<td width="75">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</p>
</td>
<td width="61">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</p>
</td>
</tr>
<tr>
<td width="26">&nbsp;</td>
<td width="113">
<p><strong>Послуги бронювання</strong></p>
</td>
<td width="110">
<p>Пос.</p>
</td>
<td width="53">
<p>1</p>
</td>
<td width="75">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</p>
</td>
<td width="61">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</p>
</td>
</tr>
<tr>
<td width="26">&nbsp;</td>
<td width="113">
<p><strong>Всього</strong></p>
</td>
<td width="110">&nbsp;</td>
<td width="53">&nbsp;</td>
<td width="75">&nbsp;</td>
<td width="61">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>Всього , <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
 &nbsp;грн. Всього (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
)&nbsp;</p>
<p>Послуги виконані повністю, сторони претензій одна до одної не мають.</p>
<p><strong>від Туроператора &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;від Туриста</strong></p>
<p>М.П./Підпис&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Підпис</p>
<p>Дата_________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Дата___________</p><?php }
}
