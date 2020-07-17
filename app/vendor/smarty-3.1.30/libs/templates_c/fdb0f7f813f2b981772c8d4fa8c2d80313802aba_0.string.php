<?php
/* Smarty version 3.1.30, created on 2018-04-09 15:10:46
  from "fdb0f7f813f2b981772c8d4fa8c2d80313802aba" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5acb5846173b46_41832463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5acb5846173b46_41832463 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 60.3336%;">
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>Туристична агенція</strong></span></p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>"ANEX tour Admiral"</strong></span></p>
<p style="text-align: center;"><span style="font-size: 12pt;">(ФОП Цуркан І.М.) ІПН 27585096720</span></p>
<p style="text-align: center;"><span style="font-size: 12pt;">Виписка з Єдиного реєстру</span></p>
<p style="text-align: center;"><span style="font-size: 12pt;">серія АВ №857882 від 09.09.2013р.</span></p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>КВИТАНЦІЯ №<?php echo $_smarty_tpl->tpl_vars['data']->value['Invoice'];?>
</strong></span></p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>від <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</strong></span></p>
<p><span style="font-size: 12pt;">Прийнято від&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></span></p>
<p><span style="font-size: 12pt;">Підстава:&nbsp; <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealTypeName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
 з <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 по&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 договір №<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong></span></p>
<p><span style="font-size: 12pt;">Сума:<strong> <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></span></p>
<p>&nbsp;</p>
<p><span style="font-size: 12pt;">ПДВ не передбачено</span></p>
<p><span style="font-size: 12pt;">Касир_____________________<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</span></p>
</td>
<td style="width: 39.6664%;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table><?php }
}
