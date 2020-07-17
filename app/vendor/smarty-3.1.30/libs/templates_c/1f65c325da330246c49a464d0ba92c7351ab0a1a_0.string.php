<?php
/* Smarty version 3.1.30, created on 2020-02-24 14:48:14
  from "1f65c325da330246c49a464d0ba92c7351ab0a1a" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e53c60e018bb6_49977432',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e53c60e018bb6_49977432 (Smarty_Internal_Template $_smarty_tpl) {
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
<p>UA82 321842 00000 26004053017503</p>
<p>В ПАТ КБ &laquo;ПРИВАТБАНК&raquo;</p>
<p>МФО банка 321842</p>
<p>є&nbsp; платником податку на прибуток на загальних умовах</p>
<p>Адреса: м. Київ 04071, Введенська 1, оф.А</p>
<p>Тел. +38 044501755</p>
<p>Моб. +38&nbsp;0675023878</p>
</td>
</tr>
<tr>
<td width="140">
<p><strong><u>Платник:</u></strong></p>
</td>
<td width="472">
<p><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>РАХУНОК</strong></span></p>
<p style="text-align: center;"><span style="font-size: 12pt;"><strong>№ <?php echo $_smarty_tpl->tpl_vars['data']->value['Act'];?>
</strong><strong>&nbsp;&nbsp;</strong><strong>від&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ActDate'];?>
</strong><strong>&nbsp;року</strong></span></p>
<table width="630">
<tbody>
<tr>
<td width="38">
<p>№</p>
</td>
<td width="404">
<p>Предмет розрахунку</p>
</td>
<td width="76">
<p>Кіл-ть</p>
</td>
<td width="112">
<p>Сума</p>
</td>
</tr>
<tr>
<td width="38">
<p>1</p>
</td>
<td width="404">
<p>Організація ділової подорожі за кордон, згідно договору № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
 від&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</p>
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
<p>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p><strong>Вартість туру:&nbsp; &nbsp;</strong>&nbsp; курс 25,74</p>
<p><strong>Всього до сплати</strong>:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</p>
<p>Рахунок дійсний до сплати 20.02.2020 року.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>Директор&nbsp; ТОВ &laquo;Дівуар&raquo;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Колихан О.А</strong></p><?php }
}
