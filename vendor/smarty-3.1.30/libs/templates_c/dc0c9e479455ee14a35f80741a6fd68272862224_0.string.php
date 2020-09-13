<?php
/* Smarty version 3.1.30, created on 2017-02-20 14:30:38
  from "dc0c9e479455ee14a35f80741a6fd68272862224" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58aae16ecfa300_90190461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58aae16ecfa300_90190461 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="width: 1071px;">
<tbody>
<tr>
<td style="width: 421px;">РОЗРАХУНКОВА КВИТАНЦІЯ</td>
<td style="width: 10px;">&nbsp;</td>
<td style="width: 128px;">&nbsp;</td>
<td style="width: 115px;">&nbsp;</td>
<td style="width: 93px;">&nbsp;</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 421px;">&nbsp;Форма № РК-1</td>
<td style="width: 10px;" rowspan="13">
<p>л</p>
<p>і</p>
<p>н</p>
<p>і</p>
<p>я</p>
<p>&nbsp;</p>
<p>в</p>
<p>і</p>
<p>д</p>
<p>р</p>
<p>и</p>
<p>в</p>
<p>у</p>
</td>
<td style="width: 638px;" colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; РОЗРАХУНКОВА КВИТАНЦІЯ Серія АААА № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
</tr>
<tr>
<td style="width: 421px;">Серія АААА</td>
<td style="width: 638px;" colspan="6">&nbsp; ІД &lsaquo;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
&rsaquo; <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td style="width: 421px;">№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</td>
<td style="width: 638px;" colspan="6">&nbsp;ПН &lsaquo;індивідуальний податковий номер платника ПДВ&rsaquo; - не платник ПДВ</td>
</tr>
<tr>
<td style="width: 421px;">&nbsp;За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</td>
<td style="width: 243px;" colspan="2" rowspan="2">Назва товару (послуги) **</td>
<td style="width: 93px;" rowspan="2">Вартість одиниці виміру</td>
<td style="width: 64px;" rowspan="2">ПДВ (%)</td>
<td style="width: 83px;" rowspan="2">Акцизний податок (ставка)</td>
<td style="width: 155px;" rowspan="2">Вартість</td>
</tr>
<tr>
<td style="width: 421px;">&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</td>
</tr>
<tr>
<td style="width: 421px;">&nbsp;Сума розрахунку</td>
<td style="width: 243px;" colspan="2">
<p>За туристичні послуги для <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 згідно Догоговору на туристичне обслуговування <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
, в тому числі, винагорода агента</p>
</td>
<td style="width: 93px;">шт.</td>
<td style="width: 64px;">&nbsp;без ПДВ</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
</tr>
<tr>
<td style="width: 421px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
<td style="width: 243px;" colspan="2">&nbsp;</td>
<td style="width: 93px;">&nbsp;</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 421px;">всього:</td>
<td style="width: 243px;" colspan="2">&nbsp;</td>
<td style="width: 93px;">&nbsp;</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 421px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
<td style="width: 243px;" colspan="2">&nbsp;</td>
<td style="width: 93px;">&nbsp;</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 421px;">У т.ч. за ставками</td>
<td style="width: 128px;">&nbsp;</td>
<td style="width: 355px;" colspan="4">Сума розрахунку (грн, коп.)</td>
<td style="width: 155px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</td>
</tr>
<tr>
<td style="width: 421px;">ПДВ _%:без ПДВ</td>
<td style="width: 128px;">&nbsp;</td>
<td style="width: 115px;">&nbsp;</td>
<td style="width: 93px;">&nbsp;</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 421px;">Акциз. под. &lsaquo;ставка&rsaquo;: -</td>
<td style="width: 336px;" colspan="3">Розрахунок провів</td>
<td style="width: 64px;">&nbsp;</td>
<td style="width: 83px;">&nbsp;</td>
<td style="width: 155px;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
</td>
</tr>
<tr>
<td style="width: 421px;">&nbsp;</td>
<td style="width: 638px;" colspan="6">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (підпис)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
)</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p><?php }
}
