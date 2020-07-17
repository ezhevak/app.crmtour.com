<?php
/* Smarty version 3.1.30, created on 2019-02-20 15:36:25
  from "0d61c0405c44cf83aa0e8771ffa70ab825e2b0b9" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5c6d57d9289162_40531067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6d57d9289162_40531067 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table>
<tbody>
<tr>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br />Директор<br /><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
<br /><br />________________<br />(Євсеєнко Ольга Ігорівна<em>)</em></p>
</td>
<td width="319">
<p>ЗАТВЕРДЖУЮ<br /><br /><br /><br />_______________<br />(<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<em>)</em></p>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: center;"><strong>АКТ № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
<br />надання послуг</strong></h4>
<p>Ми, що нижче підписалися, представник Виконавця і представник Замовника (Туриста), уклали цей акт про те, що Виконавець, за докученням Туроператора виконав роботи (надав послуги) згідно договору №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
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
<p><strong>Туристичні послуги, надані Туроператором через Турагента та винагорода агента.<br /></strong></p>
</td>
<td width="110">
<p>&nbsp;Пос.</p>
</td>
<td width="53">
<p>&nbsp;1</p>
</td>
<td width="75">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
<td width="61">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>Всього , <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
 грн. Всього (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
)&nbsp;</p>
<p>Послуги виконані повністю, сторони претензій одна до одної не мають.</p>
<p><strong>від Виконавця&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;від Замовника&nbsp;</strong></p>
<p>М.П./Підпис&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Підпис</p>
<p>Дата_________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Дата___________</p><?php }
}
