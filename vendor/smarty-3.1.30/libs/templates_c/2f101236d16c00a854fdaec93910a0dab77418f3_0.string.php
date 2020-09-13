<?php
/* Smarty version 3.1.30, created on 2018-11-15 15:31:22
  from "2f101236d16c00a854fdaec93910a0dab77418f3" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5bed752aea38c5_81383211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bed752aea38c5_81383211 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><span style="font-size: 14pt;"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.s-t-v.com.ua/wp-content/uploads/2017/04/shapkata.png" width="985" height="125" /></span></p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr style="height: 48px;">
<td style="width: 296px; height: 48px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Постачальник</span></td>
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 192px;" colspan="2" rowspan="4" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 347px; height: 48px;" colspan="2" width="221"><span style="font-size: 14pt;"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></span></td>
<td style="width: 538px; height: 48px;" colspan="2" width="283"><span style="font-size: 14pt;"><em>т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</em></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Є платником єдиного податку, 3 група, 5%, не платник ПДВ</em></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</em></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 48px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Одержувач</span></td>
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 48px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Платник</span></td>
<td style="width: 885px; height: 48px;" colspan="4" width="171"><span style="font-size: 14pt;"><strong>той самий&nbsp;&nbsp;&nbsp;</strong></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 1181px; height: 48px;" colspan="6" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 48px;" colspan="2" width="40"><span style="font-size: 14pt;">&nbsp;Договір №</span></td>
<td style="width: 885px; height: 48px;" colspan="4" width="171"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 96px;" colspan="2" rowspan="2"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 347px; height: 48px;" colspan="2" width="221"><span style="font-size: 14pt;"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></span></td>
<td style="width: 538px; height: 48px;" colspan="2" width="120"><span style="font-size: 14pt;"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 347px; height: 48px;" colspan="2" width="221"><span style="font-size: 14pt;"><strong>Дата рахунку</strong></span></td>
<td style="width: 538px; height: 48px;" colspan="2" width="120"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 55px; height: 48px;" width="40"><span style="font-size: 14pt;"><strong>№</strong></span></td>
<td style="width: 241px; height: 48px;" width="173"><span style="font-size: 14pt;"><strong>Назва послуги:</strong></span></td>
<td style="width: 239px; height: 48px;" width="171"><span style="font-size: 14pt;"><strong>Од.</strong></span></td>
<td style="width: 108px; height: 48px;" width="50"><span style="font-size: 14pt;"><strong>Кількість</strong></span></td>
<td style="width: 268px; height: 48px;" width="120"><span style="font-size: 14pt;"><strong>Ціна без ПДВ</strong></span></td>
<td style="width: 270px; height: 48px;" width="163"><span style="font-size: 14pt;"><strong>Сума без ПДВ</strong></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 55px; height: 48px;" width="40"><span style="font-size: 14pt;">1</span></td>
<td style="width: 241px; height: 48px;" width="173"><span style="font-size: 14pt;">За туристичні послуги</span></td>
<td style="width: 239px; height: 48px;" width="171"><span style="font-size: 14pt;">грн.</span></td>
<td style="width: 108px; height: 48px;" width="50"><span style="font-size: 14pt;">1</span></td>
<td style="width: 268px; height: 48px;" width="120"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
<td style="width: 270px; height: 48px;" width="163"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 643px; height: 144px;" colspan="4" rowspan="3" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
<td style="width: 268px; height: 48px;" width="120"><span style="font-size: 14pt;">Разом без&nbsp; ПДВ:</span></td>
<td style="width: 270px; height: 48px;" width="163"><span style="font-size: 14pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 268px; height: 48px;" width="120"><span style="font-size: 14pt;">ПДВ:</span></td>
<td style="width: 270px; height: 48px;" width="163"><span style="font-size: 14pt;">0</span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 268px; height: 48px;" width="120"><span style="font-size: 14pt;"><strong>Всього з ПДВ:</strong></span></td>
<td style="width: 270px; height: 48px;" width="163"><span style="font-size: 14pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 296px; height: 48px;" colspan="2"><span style="font-size: 14pt;">&nbsp;<strong>Всього на суму:</strong></span></td>
<td style="width: 885px; height: 48px;" colspan="4" width="504"><span style="font-size: 14pt;"><strong> <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></span></td>
</tr>
<tr style="height: 48px;">
<td style="width: 1181px; height: 48px;" colspan="6"><span style="font-size: 14pt;">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</span></td>
</tr>
<tr style="height: 48px;">
<td style="text-align: right; width: 643px; height: 48px;" colspan="4" width="40"><span style="font-size: 14pt;">&nbsp;&nbsp;Виписав (ла):</span></td>
<td style="width: 538px; height: 48px;" colspan="2" width="283"><span style="font-size: 14pt;">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</span></td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><span style="font-size: 14pt;"><em>&nbsp;Призначення платежу: За туристичні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; без ПДВ. Платник <strong> <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em><em>.</em></span></h4>
<p><span style="font-size: 14pt;"><em><img style="float: right;" src="https://www.s-t-v.com.ua/wp-content/uploads/2018/11/Pechat__.jpg" width="250" height="274" /></em></span></p><?php }
}
