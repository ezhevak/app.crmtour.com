<?php
/* Smarty version 3.1.30, created on 2018-01-22 11:23:20
  from "f62597929204a9be22418ec60d6f06cf05ea349d" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a65ad882f7da2_59971465',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a65ad882f7da2_59971465 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="height: 722px;" width="879">
<tbody>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">РОЗРАХУНКОВА КВИТАНЦІЯ</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 100px;" colspan="5" rowspan="2" width="634">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">&nbsp;Форма № РК-1</td>
<td style="height: 50px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">Серія АА</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 50px;" colspan="5" width="634">&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 50px;" colspan="5" width="634">&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</td>
</tr>
<tr style="height: 122px;">
<td style="height: 122px;" width="233">&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
<td style="height: 122px;" width="12">&nbsp;</td>
<td style="height: 122px;" width="378">Назва товару (послуги) **</td>
<td style="height: 122px;" width="64">Вартість одиниці виміру</td>
<td style="height: 122px;" width="64">ПДВ (%)</td>
<td style="height: 122px;" width="64">Акцизний податок (ставка)</td>
<td style="height: 122px;" width="64">Вартість</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 250px;" rowspan="5" width="378">За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
<td style="height: 250px;" rowspan="5" width="64">шт.</td>
<td style="height: 250px;" rowspan="5" width="64">&nbsp;без ПДВ</td>
<td style="height: 250px;" rowspan="5" width="64">&nbsp;</td>
<td style="height: 250px;" rowspan="5" width="64"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">&nbsp;Сума розрахунку:</td>
<td style="height: 50px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
<td style="height: 50px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">всього:</td>
<td style="height: 50px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</td>
<td style="height: 50px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">У т.ч. за ставками</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 50px;" width="378">Сума розрахунку (грн, коп.)</td>
<td style="height: 50px;" colspan="4" width="256"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">ПДВ _%:без ПДВ</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="height: 50px;" width="378">Розрахунок провів</td>
<td style="height: 50px;" colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</td>
</tr>
<tr style="height: 50px;">
<td style="height: 50px;" width="233">&nbsp;</td>
<td style="height: 50px;" width="12">&nbsp;</td>
<td style="text-align: right; height: 50px;" colspan="5" width="634">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
)</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}