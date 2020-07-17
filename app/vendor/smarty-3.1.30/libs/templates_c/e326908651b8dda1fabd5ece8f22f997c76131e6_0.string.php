<?php
/* Smarty version 3.1.30, created on 2017-03-20 13:46:51
  from "e326908651b8dda1fabd5ece8f22f997c76131e6" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cfc12b71bac1_47050897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cfc12b71bac1_47050897 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="width: 1071px;">
<tbody>
<tr>
<td style="width: 421px;">
<h6>РОЗРАХУНКОВА КВИТАНЦІЯ</h6>
<h6>&nbsp;Форма № РК-1</h6>
</td>
<td style="width: 10px;" rowspan="13">
<h6>л</h6>
<h6>і</h6>
<h6>н</h6>
<h6>і</h6>
<h6>я</h6>
<h6>&nbsp;</h6>
<h6>в</h6>
<h6>і</h6>
<h6>д</h6>
<h6>р</h6>
<h6>и</h6>
<h6>в</h6>
<h6>у</h6>
</td>
<td style="width: 638px;" colspan="6">
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>Серія АААА</h6>
</td>
<td style="width: 638px;" colspan="6">
<h6>&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</h6>
</td>
<td style="width: 638px;" colspan="6">
<h6>&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h6>
</td>
<td style="width: 243px;" colspan="2" rowspan="2">
<h6>Назва товару (послуги) **</h6>
</td>
<td style="width: 93px;" rowspan="2">
<h6>Вартість одиниці виміру</h6>
</td>
<td style="width: 64px;" rowspan="2">
<h6>ПДВ (%)</h6>
</td>
<td style="width: 83px;" rowspan="2">
<h6>Акцизний податок (ставка)</h6>
</td>
<td style="width: 155px;" rowspan="2">
<h6>Вартість</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>&nbsp;Сума розрахунку</h6>
</td>
<td style="width: 243px;" colspan="2">
<h6>За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</h6>
</td>
<td style="width: 93px;">
<h6>шт.</h6>
</td>
<td style="width: 64px;">
<h6>&nbsp;без ПДВ</h6>
</td>
<td style="width: 83px;">
<h6>&nbsp;</h6>
</td>
<td style="width: 155px;">
<h6><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</h6>
</td>
<td style="width: 243px;" colspan="6" rowspan="3">
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>всього:</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySumString'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>У т.ч. за ставками</h6>
</td>
<td style="width: 128px;">
<h6>&nbsp;</h6>
</td>
<td style="width: 355px;" colspan="4">
<h6>Сума розрахунку (грн, коп.)</h6>
</td>
<td style="width: 155px;">
<h6><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>ПДВ _%:без ПДВ</h6>
</td>
<td style="width: 128px;" colspan="6">
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>Акциз. под. &lsaquo;ставка&rsaquo;: -</h6>
</td>
<td style="width: 336px;" colspan="5">
<h6>Розрахунок провів</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
<h6>&nbsp;</h6>
</td>
<td style="width: 155px;">
<h6>&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</h6>
</td>
</tr>
<tr>
<td style="width: 421px;">
<h6>&nbsp;</h6>
</td>
<td style="width: 638px;" colspan="6">
<h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
)</h6>
</td>
</tr>
</tbody>
</table>
<h6>&nbsp;</h6><?php }
}
