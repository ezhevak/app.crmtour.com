<?php
/* Smarty version 3.1.30, created on 2018-08-08 16:12:47
  from "0050fb8e86ba3f8eef5d2aaa47af421b80694c8b" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b6aec4fb12495_58169497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b6aec4fb12495_58169497 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
<tbody>
<tr>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br />Директор<br /><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
<br /><br />________________<br />(<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
<em>)</em></p>
</td>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<br /><br /><br />_______________<br />(<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<em>)</em></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: center;"><strong>АКТ № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
<br />надання послуг</strong></h4>
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
<p>1&nbsp;</p>
</td>
<td width="113">
<p>&nbsp;<strong>Туристичні послуги, без ПДВ</strong></p>
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
<td width="26">&nbsp;2</td>
<td width="113">
<p><strong>Послуги бронювання, в т.ч. ПДВ</strong></p>
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
