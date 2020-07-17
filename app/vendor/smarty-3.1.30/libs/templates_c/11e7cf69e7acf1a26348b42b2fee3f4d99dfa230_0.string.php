<?php
/* Smarty version 3.1.30, created on 2018-10-09 15:46:18
  from "11e7cf69e7acf1a26348b42b2fee3f4d99dfa230" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bbca31a5657a1_04395600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbca31a5657a1_04395600 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="height: 695px;" width="879">
<tbody>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">РОЗРАХУНКОВА КВИТАНЦІЯ</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 96px;" colspan="5" rowspan="2" width="634">
<h3><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">&nbsp;Форма № РК-1</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">Серія АААА</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h3><span style="font-size: 14pt;">&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 865px; height: 48px;" colspan="5" width="634">
<h3><span style="font-size: 14pt;">&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</span></h3>
</td>
</tr>
<tr style="height: 119px;">
<td style="width: 258px; height: 119px;" width="233">
<h3><span style="font-size: 14pt;">&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Договору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</span></h3>
</td>
<td style="width: 17px; height: 119px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 119px;" width="378">
<h3><span style="font-size: 14pt;">Назва товару (послуги) **</span></h3>
</td>
<td style="width: 75px; height: 119px;" width="64">
<h3><span style="font-size: 14pt;">Вартість одиниці виміру</span></h3>
</td>
<td style="width: 71px; height: 119px;" width="64">
<h3><span style="font-size: 14pt;">ПДВ (%)</span></h3>
</td>
<td style="width: 84px; height: 119px;" width="64">
<h3><span style="font-size: 14pt;">Акцизний податок (ставка)</span></h3>
</td>
<td style="width: 216px; height: 119px;" width="64">
<h3><span style="font-size: 14pt;">Вартість</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">&nbsp; <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 240px;" rowspan="5" width="378">
<h3><span style="font-size: 14pt;">За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
 згідно Договору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</span></h3>
</td>
<td style="width: 75px; height: 240px;" rowspan="5" width="64">
<h3><span style="font-size: 14pt;">шт.</span></h3>
</td>
<td style="width: 71px; height: 240px;" rowspan="5" width="64">
<h3><span style="font-size: 14pt;">&nbsp;без ПДВ</span></h3>
</td>
<td style="width: 84px; height: 240px;" rowspan="5" width="64">&nbsp;</td>
<td style="width: 216px; height: 240px;" rowspan="5" width="64">
<h3><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">&nbsp;Сума розрахунку:</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">всього:</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">У т.ч. за ставками</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h3><span style="font-size: 14pt;">Сума розрахунку (грн, коп.)</span></h3>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h3><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">ПДВ _%:без ПДВ</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="width: 419px; height: 48px;" width="378">
<h3><span style="font-size: 14pt;">Розрахунок провів</span></h3>
</td>
<td style="width: 446px; height: 48px;" colspan="4" width="256">
<h3><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</span></h3>
</td>
</tr>
<tr style="height: 48px;">
<td style="width: 258px; height: 48px;" width="233">
<h3><span style="font-size: 14pt;">Акциз. под. &lsaquo;ставка&rsaquo;: -</span></h3>
</td>
<td style="width: 17px; height: 48px;" width="12">&nbsp;</td>
<td style="text-align: right; width: 865px; height: 48px;" colspan="5" width="634">
<h3><span style="font-size: 14pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
)</span></h3>
</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}
