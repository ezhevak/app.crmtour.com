<?php
/* Smarty version 3.1.30, created on 2017-12-20 15:33:22
  from "57517cf1caab9dfa572edf4888097e5dadfbc080" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3a66a2254698_97563696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3a66a2254698_97563696 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.s-t-v.com.ua/wp-content/uploads/2017/04/shapkata.png" width="985" height="125" /></p>
<table style="border-color: #034c85; background-color: #f7feff;" width="717">
<tbody>
<tr>
<td style="width: 296px;" colspan="2" width="40">&nbsp;Постачальник</td>
<td style="width: 885px;" colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
</tr>
<tr>
<td style="width: 296px;" colspan="2" rowspan="4" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 347px;" colspan="2" width="221"><em>ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['account']->value['BankCode'];?>
</em></td>
<td style="width: 538px;" colspan="2" width="283"><em>т/ф <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</em></td>
</tr>
<tr>
<td style="width: 885px;" colspan="4" width="504"><em>Р/р <?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
 в <?php echo $_smarty_tpl->tpl_vars['account']->value['BankName'];?>
 МФО <?php echo $_smarty_tpl->tpl_vars['account']->value['BankMFO'];?>
</em></td>
</tr>
<tr>
<td style="width: 885px;" colspan="4" width="504"><em>Є платником єдиного податку, 3 група, 5%, не платник ПДВ</em></td>
</tr>
<tr>
<td style="width: 885px;" colspan="4" width="504"><em>Поштова.адреса: <?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</em></td>
</tr>
<tr>
<td style="width: 296px;" colspan="2" width="40">&nbsp;Одержувач</td>
<td style="width: 885px;" colspan="4" width="504"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</td>
</tr>
<tr>
<td style="width: 296px;" colspan="2" width="40">&nbsp;Платник</td>
<td style="width: 885px;" colspan="4" width="171"><strong>той самий&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td style="width: 1181px;" colspan="6" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="width: 296px;" colspan="2" width="40">&nbsp;Договір №</td>
<td style="width: 885px;" colspan="4" width="171"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&nbsp;&nbsp;&nbsp;</strong></td>
</tr>
<tr>
<td style="width: 296px;" colspan="2" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 347px;" colspan="2" width="221"><strong>РАХУНОК-ФАКТУРА №&nbsp;</strong></td>
<td style="width: 538px;" colspan="2" width="120"><strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp;</td>
</tr>
<tr>
<td style="width: 347px;" colspan="2" width="221"><strong>Дата рахунку</strong></td>
<td style="width: 538px;" colspan="2" width="120"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PayDateMod'];?>
</td>
</tr>
<tr>
<td style="width: 55px;" width="40"><strong>№</strong></td>
<td style="width: 241px;" width="173"><strong>Назва послуги:</strong></td>
<td style="width: 239px;" width="171"><strong>Од.</strong></td>
<td style="width: 108px;" width="50"><strong>Кількість</strong></td>
<td style="width: 268px;" width="120"><strong>Ціна без ПДВ</strong></td>
<td style="width: 270px;" width="163"><strong>Сума без ПДВ</strong></td>
</tr>
<tr>
<td style="width: 55px;" width="40">1</td>
<td style="width: 241px;" width="173">За консультаційні послуги</td>
<td style="width: 239px;" width="171">грн.</td>
<td style="width: 108px;" width="50">1</td>
<td style="width: 268px;" width="120"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
<td style="width: 270px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr>
<td style="width: 643px;" colspan="4" rowspan="3" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td style="width: 268px;" width="120">Разом без&nbsp; ПДВ:</td>
<td style="width: 270px;" width="163"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</td>
</tr>
<tr>
<td style="width: 268px;" width="120">ПДВ:</td>
<td style="width: 270px;" width="163">0</td>
</tr>
<tr>
<td style="width: 268px;" width="120"><strong>Всього з ПДВ:</strong></td>
<td style="width: 270px;" width="163"><strong><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySum'];?>
</strong></td>
</tr>
<tr>
<td style="width: 296px;" colspan="2">&nbsp;<strong>Всього на суму:</strong></td>
<td style="width: 885px;" colspan="4" width="504"><strong> <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['PaySumString'];?>
</strong></td>
</tr>
<tr>
<td style="width: 1181px;" colspan="6">&nbsp;без ПДВ&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="text-align: right; width: 643px;" colspan="4" width="40">&nbsp;&nbsp;Виписав (ла):</td>
<td style="width: 538px;" colspan="2" width="283">&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</td>
</tr>
</tbody>
</table>
<h4 style="text-align: justify;"><em>&nbsp;Призначення платежу: За консультаційні послуги згідно рахунку № <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong>&nbsp; від <strong>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</strong>&nbsp; без ПДВ. Платник <strong> <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['payment']['Payer'];?>
</strong></em><em>.</em></h4><?php }
}
