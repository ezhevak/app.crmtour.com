<?php
/* Smarty version 3.1.30, created on 2017-12-20 14:20:21
  from "33b2eee4f7781d97816417ceacaa09b9437a0705" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3a558531a706_95914523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3a558531a706_95914523 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="height: 695px;" width="879">
<tbody>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>РОЗРАХУНКОВА КВИТАНЦІЯ</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 96px;" colspan="5" rowspan="2" width="634">
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>&nbsp;Форма № РК-1</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>Серія АААА</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h3>&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h3>&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</h3>
</td>
</tr>
<tr style="height: 119px;">
<td style="width: 258px; height: 119px;" width="233">
<h3>&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h3>
</td>
<td style="width: 17px; height: 119px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 119px;" width="378">
<h3>Назва товару (послуги) **</h3>
</td>
<td style="width: 75px; height: 119px;" width="64">
<h3>Вартість одиниці виміру</h3>
</td>
<td style="width: 71px; height: 119px;" width="64">
<h3>ПДВ (%)</h3>
</td>
<td style="width: 84px; height: 119px;" width="64">
<h3>Акцизний податок (ставка)</h3>
</td>
<td style="width: 216px; height: 119px;" width="64">
<h3>Вартість</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>&nbsp; <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 240px;" rowspan="5" width="378">
<h3>За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h3>
</td>
<td style="width: 75px; height: 240px;" rowspan="5" width="64">
<h3>шт.</h3>
</td>
<td style="width: 71px; height: 240px;" rowspan="5" width="64">
<h3>&nbsp;без ПДВ</h3>
</td>
<td style="width: 84px; height: 240px;" rowspan="5" width="64">&nbsp;</td>
<td style="width: 216px; height: 240px;" rowspan="5" width="64">
<h3><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>&nbsp;Сума розрахунку:</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>всього:</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>У т.ч. за ставками</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h3>Сума розрахунку (грн, коп.)</h3>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h3><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>ПДВ _%:без ПДВ</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h3>Розрахунок провів</h3>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h3><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3>Акциз. под. &lsaquo;ставка&rsaquo;: -</h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="text-align: right; width: 865px; height: 48px;" colspan="5" width="634">
<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
)</h3>
</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}
