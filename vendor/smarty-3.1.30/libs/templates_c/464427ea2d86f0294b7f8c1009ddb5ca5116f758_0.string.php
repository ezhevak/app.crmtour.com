<?php
/* Smarty version 3.1.30, created on 2017-03-20 14:04:07
  from "464427ea2d86f0294b7f8c1009ddb5ca5116f758" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cfc537534951_74223852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cfc537534951_74223852 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table width="879">
<tbody>
<tr>
<td width="233">РОЗРАХУНКОВА КВИТАНЦІЯ</td>
<td width="12">&nbsp;</td>
<td colspan="5" rowspan="2" width="634">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
</tr>
<tr>
<td width="233">&nbsp;Форма № РК-1</td>
<td width="12">&nbsp;</td>
</tr>
<tr>
<td width="233">Серія АААА</td>
<td width="12">&nbsp;</td>
<td colspan="5" width="634">&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td width="233">№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
<td width="12">&nbsp;</td>
<td colspan="5" width="634">&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</td>
</tr>
<tr>
<td width="233">&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</td>
<td width="12">&nbsp;</td>
<td width="378">Назва товару (послуги) **</td>
<td width="64">Вартість одиниці виміру</td>
<td width="64">ПДВ (%)</td>
<td width="64">Акцизний податок (ставка)</td>
<td width="64">Вартість</td>
</tr>
<tr>
<td width="233">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
<td width="12">&nbsp;</td>
<td rowspan="5" width="378">За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</td>
<td rowspan="5" width="64">шт.</td>
<td rowspan="5" width="64">&nbsp;без ПДВ</td>
<td rowspan="5" width="64">&nbsp;</td>
<td rowspan="5" width="64"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
</tr>
<tr>
<td width="233">&nbsp;Сума розрахунку:</td>
<td width="12">&nbsp;</td>
</tr>
<tr>
<td width="233"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
<td width="12">&nbsp;</td>
</tr>
<tr>
<td width="233">всього:</td>
<td width="12">&nbsp;</td>
</tr>
<tr>
<td width="233"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</td>
<td width="12">&nbsp;</td>
</tr>
<tr>
<td width="233">У т.ч. за ставками</td>
<td width="12">&nbsp;</td>
<td width="378">Сума розрахунку (грн, коп.)</td>
<td colspan="4" width="256"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</td>
</tr>
<tr>
<td width="233">ПДВ _%:без ПДВ</td>
<td width="12">&nbsp;</td>
<td width="378">Розрахунок провів</td>
<td colspan="4" width="256">&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</td>
</tr>
<tr>
<td width="233">Акциз. под. &lsaquo;ставка&rsaquo;: -</td>
<td width="12">&nbsp;</td>
<td style="text-align: right;" colspan="5" width="634">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
)</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}
