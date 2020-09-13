<?php
/* Smarty version 3.1.30, created on 2020-02-24 16:55:22
  from "f6b6868981aece9c0820f6ae1b4e33f2a675710c" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e53e3dae5adb7_33068942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53e3dae5adb7_33068942 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p><img src="https://divuar.com.ua/wp-content/uploads/2020/02/logo_divuar_на-бланк.jpg" alt="" width="370" height="160" /></p>
<table>
<tbody>
<tr>
<td width="140">
<p><strong><u>Постачальник:</u></strong></p>
</td>
<td width="472">
<p><strong>ТОВ &laquo;ДІВУАР&raquo;</strong></p>
<p>ЭДРПОУ 34191464</p>
<p>рахунок&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['BankAccount'];?>
</p>
<p>В ПАТ КБ &laquo;ПРИВАТБАНК&raquo; МФО банка 321842</p>
<p>Ліцензія № <?php echo $_smarty_tpl->tpl_vars['account']->value['LicenseNum'];?>
 від&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['LicenseDate'];?>
</p>
<p>є&nbsp; платником податку на прибуток на загальних умовах</p>
<p>Адреса: м. Київ 04071, Введенська 1, оф.А</p>
<p>Тел. +38044501755</p>
<p>Моб. +380675023878</p>
</td>
</tr>
<tr>
<td width="140">
<p><strong><u>Платник:</u></strong></p>
</td>
<td width="472">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>РАХУНОК</strong></span></p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>№ <?php echo $_smarty_tpl->tpl_vars['data']->value['Act'];?>
</strong><strong>&nbsp;&nbsp;</strong><strong>від&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
</strong><strong>&nbsp;року</strong></span></p>
<table width="630">
<tbody>
<tr>
<td width="38">
<p><strong>№</strong></p>
</td>
<td width="404">
<p><strong>Предмет розрахунку</strong></p>
</td>
<td width="76">
<p><strong>Кіл-ть</strong></p>
</td>
<td width="112">
<p><strong>Сума, грн</strong></p>
</td>
</tr>
<tr>
<td width="38">
<p>1</p>
</td>
<td width="404">
<p>Туристичні послуги&nbsp;згідно договору № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 р.</p>
</td>
<td width="76">
<p>2</p>
</td>
<td width="112">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
<tr>
<td colspan="3" width="518">
<p><strong>Всього без ПДВ</strong></p>
</td>
<td width="112">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</p>
</td>
</tr>
<tr>
<td colspan="3" width="518">
<p><strong>ПДВ</strong></p>
</td>
<td width="112">0,00</td>
</tr>
<tr>
<td colspan="3" width="518">
<p><strong>Всього з ПДВ</strong></p>
</td>
<td width="112">
<p><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</strong></p>
</td>
</tr>
</tbody>
</table>
<p><strong>Вартість туру:&nbsp; </strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumEquivalent'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealCurrencyName'];?>
&nbsp; \ курс <?php echo $_smarty_tpl->tpl_vars['data']->value['CommercialCourse'];?>
</p>
<p><strong>Всього до сплати</strong>:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</p>
<p>Рахунок дійсний до сплати&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
 року</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>Директор&nbsp; ТОВ &laquo;Дівуар&raquo;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Колихан О.А</strong></p><?php }
}
