<?php
/* Smarty version 3.1.30, created on 2017-12-20 14:19:14
  from "3a646e6e59f05115339d7968ac0ee3ef8f67212e" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3a55429edcb3_85183075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3a55429edcb3_85183075 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="height: 695px;" width="879">
<tbody>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>РОЗРАХУНКОВА КВИТАНЦІЯ</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 96px;" colspan="5" rowspan="2" width="634">
<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>&nbsp;Форма № РК-1</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>Серія АААА</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h4>&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h4>&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</h4>
</td>
</tr>
<tr style="height: 119px;">
<td style="width: 258px; height: 119px;" width="233">
<h4>&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h4>
</td>
<td style="width: 17px; height: 119px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 119px;" width="378">
<h4>Назва товару (послуги) **</h4>
</td>
<td style="width: 75px; height: 119px;" width="64">
<h4>Вартість одиниці виміру</h4>
</td>
<td style="width: 71px; height: 119px;" width="64">
<h4>ПДВ (%)</h4>
</td>
<td style="width: 84px; height: 119px;" width="64">
<h4>Акцизний податок (ставка)</h4>
</td>
<td style="width: 216px; height: 119px;" width="64">
<h4>Вартість</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>&nbsp; <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 240px;" rowspan="5" width="378">
<h4>За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h4>
</td>
<td style="width: 75px; height: 240px;" rowspan="5" width="64">
<h4>шт.</h4>
</td>
<td style="width: 71px; height: 240px;" rowspan="5" width="64">
<h4>&nbsp;без ПДВ</h4>
</td>
<td style="width: 84px; height: 240px;" rowspan="5" width="64">&nbsp;</td>
<td style="width: 216px; height: 240px;" rowspan="5" width="64">
<h4><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>&nbsp;Сума розрахунку:</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>всього:</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>У т.ч. за ставками</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h4>Сума розрахунку (грн, коп.)</h4>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h4><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>ПДВ _%:без ПДВ</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h4>Розрахунок провів</h4>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h4><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</h4>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h4>Акциз. под. &lsaquo;ставка&rsaquo;: -</h4>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="text-align: right; width: 865px; height: 48px;" colspan="5" width="634">
<h4>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
)</h4>
</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}
