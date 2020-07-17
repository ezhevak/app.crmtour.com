<?php
/* Smarty version 3.1.30, created on 2018-04-07 19:20:26
  from "1684be2e586373a69e28061b2b3772260c667c16" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac8efca965bd9_75339969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac8efca965bd9_75339969 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><strong>ДОГОВІР ПРО НАДАННЯ ТУРИСТИЧНИХ ПОСЛУГ № <span style="background-color: #ffffff; color: #ff0000;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></strong></p>
<p>&nbsp;</p>
<p style="text-align: center;">Цей договір укладений<strong><span style="color: #ff0000;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&nbsp; &nbsp; &nbsp; </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>В місті &nbsp;Херсон</p>
<p><strong>МІЖ:</strong></p>
<p>Турагентом<strong> ФОП Цуркан Ігор Миколайович (Туристська фірма &laquo;</strong><strong>ANEX</strong> <strong>tour</strong> <strong>Admiral</strong><strong>&raquo;)</strong>, що діє на підставі Агентського договору на реалізацію &nbsp;турпродукту від імені та за дорученням Туроператора<strong> Товариство з обмеженою відповідальністю &laquo;Джоін АП!&raquo;</strong>, (надалі &ndash; <strong>Туроператор</strong>) (ліцензія № 1597 видана Міністерством економічного розвитку і торгівлі 04.12.2015 року., діє безстроково, розмір фінансового забезпечення ТУРОПЕРАТОРА складає 20 000 (двадцять тисяч) ЄВРО), що знаходиться за адресою: 02121, м. Київ, вул. Харківське шосе, буд. 201-203, літ. 2 А, код ЄДРПОУ 38729427), в особі Виконавчого директора Сєроухова Д.Г, який діє на підставі Статуту, і &nbsp;</p>
<p>Громадянин (ка)</p>
<p><span style="font-size: 12pt; color: #ff0000;"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
<br /></strong><span style="color: #000000;">Адреса проживання:&nbsp;</span><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['Address'];?>
</strong></span></p>
<p><span style="font-size: 12pt; color: #ff0000;"><span style="color: #000000;">Дата народження:&nbsp;</span><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['DateBirth'];?>
</strong></span></p>
<p><span style="font-size: 12pt; color: #ff0000;"><span style="background-color: #ffffff; color: #000000;">Паспорт:</span><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
 </strong><span style="background-color: #ffffff; color: #000000;">Виданий:&nbsp;</span><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedBy'];?>
&nbsp; </strong><span style="color: #000000;">Дата видачі:</span><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedDate'];?>
</strong></span></p>
<p>&nbsp;(паспорт, серія, номер, ким виданий, коли, адреса реєстрації, ідентифікаційний номер, також дані всіх повнолітніх та неповнолітніх осіб, які приймають участь у турі, в т.ч. й самого замовника, якщо він також є Туристом), який діє за усним дорученням від імені інших туристів<strong>&nbsp;</strong></p>
<p><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</p>
<table>
<thead>
<tr>
<th>Имя</th>
<th>Фамилия</th>
<th>Дата рождения</th>
<th>Тип документа</th>
<th>First Name</th>
<th>Last Name</th>
<th>Серия номер</th>
<th>Действующий</th>
<th>Кем выдан</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</td>
<td><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
</td>
</tr>
</tbody>
</table>
<p>надалі Турист, з другого боку, названі в подальшому &laquo;Сторони&raquo;, керуючись ст. ст. 901-907 ЦК України, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ст. ст. 295-305 ГК України, ст. ст. 18-24 Закону України &laquo;Про туризм&raquo;, іншими нормативними актами, що регулюють відносини у сфері туристичної діяльності, уклали даний Договір про наступне:</p>
<ol>
<li><strong> Визначення термінів</strong></li>
</ol>
<p>Терміни, що використовуються у цьому Договорі, означають:</p>
<p><strong>Агент (турагент)</strong> ,<strong>Туроператор, Турпродукт, Турист </strong>в даному договорі розуміються у значенні, викладеному в Законі України &laquo;Про туризм&raquo;.</p>
<p><strong>Ваучер</strong> &ndash;<strong>&nbsp; </strong>форма письмового договору на&nbsp; туристичне або на екскурсійне обслуговування. <strong>Візова підтримка&nbsp; </strong>- <strong>консультації та послуги з підготовки документів до посольства/консульства/міграційної служби (не входить до складу турпродукту).</strong></p>
<p><strong>Лист бронювання</strong> &ndash; письмовий запит про надання Турпродукту, отриманий в оригіналі чи по факсу за підписом Турагента та Туриста і який містить перелік необхідних для оформлення Турпродукта послуг, у тому числі прізвище, ім'я та по батькові Туриста. В даному Договорі Лист бронювання вважається офертою Туриста, тобто пропозицією на укладення Договору на туристичне обслуговування.</p>
<p><strong>Ціна туристичного продукту (вартість)</strong> &ndash; спеціальні пропозиції Туроператора зазначені на сайті, в каталогах та інших в тому числі і рекламних матеріалах туроператора, відомості щодо максимально можливої вартості послуг яку може сплатити Турист при придбанні Туропродукту. До цієї суми можуть бути включені вартість послуг, які надає туроператор, транспортні компанії, страхові компанії та інші суб&rsquo;єкти туристичної діяльності, а також консультаційні-інформаційні послуги з підбору Туру які Туристу надає безпосередньо Турагент.</p>
<p><strong>Транзитні кошти</strong> &ndash; такі грошові кошти, що сплачені Туристом Туроператору через Турагента, які не є доходом та власністю Турагента.</p>
<p><strong>Підтвердження Замовлення (акцепт)</strong> &ndash; підтвердження Туроператора по електронних, факсимільних, поштових засобах зв'язку на Лист бронювання Туриста через Турагента, у якому міститься згода Туроператора на надання Турпродукта. Така відповідь Туроператора може бути надана у вигляді рахунку, виписаного на ім&rsquo;я Турагента відповідно до бронювання Туриста через Турагента. Підтвердження Замовлення в даному Договорі вважається акцептом Туроператора, тобто підтвердженням бажання укласти Договір на туристичне обслуговування з Туристом.</p>
<p><strong>Ануляція</strong> &ndash; зроблена Туристом через Турагента письмова відмова від замовленого та/чи придбаного в Туроператора Турпродукта чи його частини.</p>
<p><strong>Зміна Листа бронювання Турагента</strong> &ndash; скасування попереднього Замовлення та подання нового Замовлення, що має відмінність від раніше поданого.</p>
<p><strong>Вид транспортного засобу</strong> &ndash; пристрій призначений для пасажирських перевезень, що здійснюється <strong>&nbsp;</strong>автомобільним, залізничним, морським, річковим, авіаційним та іншим транспортом.</p>
<p><strong>Категорія транспортного засобу (клас)</strong> &ndash; віднесення до одного чи іншого класу транспортного засобу визначається рівнем комфорту, вартістю даного транспортного засобу, виробником та рівнем оздоблення (економ-клас, <a href="http://uk.wikipedia.org/wiki/%D0%91%D1%96%D0%B7%D0%BD%D0%B5%D1%81-%D0%BA%D0%BB%D0%B0%D1%81">бізнес-клас</a>, <a href="http://uk.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D0%B4%D1%81%D1%82%D0%B0%D0%B2%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B8%D0%B9_%D0%BA%D0%BB%D0%B0%D1%81">представницький клас</a>).</p>
<p><strong>Вид і спосіб забезпечення&nbsp; харчування під час туристичної подорожі</strong> &ndash; система обслуговування туристів в готельно-ресторанній сфері, що позначається в цьому Договорі та інших необхідних для подорожі Туриста документах наступним чином: RO &ndash; відсутнє харчування; ВВ &ndash; тільки сніданок; НВ &ndash; напівпансіон (сніданок, вечеря), FB &ndash; повний пансіон (сніданок, обід, вечеря), АІ &ndash; все включено,&nbsp; UAL- ультра все включено.</p>
<p><strong>Реклам́ація</strong> &ndash; це претензія, яка пред&rsquo;являється Туристом через Турагента Туроператору в зв'язку з невідповідністю якості послуг за умовами <a href="http://uk.wikipedia.org/wiki/%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D1%96%D1%80">Договору</a>.</p>
<p><strong>Прайс (прайс-лист)</strong> &ndash; документ, що надається Туроператором Турагенту і містить описання Турпродукту, право на реалізацію якого надається Агенту, його вартість, перелік послуг, що входять до нього. Прайс також може містити розмір винагороди, що надається Агенту при реалізації останнім вказаного у Прайсі Турпродукту.</p>
<p><strong>Комерційний курс Туроператора</strong> &ndash; грошовий еквівалент в іноземній валюті до гривні України, що визначений Туроператором та оприлюднений на сайті, що застосовується Туроператором при визначенні суми сплати туристичного продукту, який належить Туроператору.</p>
<p><strong>Високий сезон </strong>- це період найбільшої діяльної активності в туризмі, період найбільш високих тарифів на туристичні послуги, визначається по кожному з напрямків туристичних подорожей окремо. Інформація про умови продажу туристичного продукту та терміни високого сезону по кожному з напрямків викладена на офіційному сайті компанії <a href="http://joinup.ua/">http://joinup.ua/</a>.</p>
<p><strong>Акції &ndash; </strong>спеціальні пропозиції, найбільш вигідні для Туристів (в т.ч.&nbsp; акція &laquo;раннє бронювання&raquo;), інформація про умови продажу туристичного продукту, терміни бронювання та ануляції викладені на офіційному сайті компанії <a href="http://joinup.ua/">http://joinup.ua/</a>, дані положення викладені на сайті мають силу договору.</p>
<p><strong>Документи на отримання Турпродукту</strong> &ndash; матеріальна цінність створена туроператором на користь туристів на їх замовлення через Турагента, має встановлену Туроператором ціну. До зазначених документів належить (ваучер, страховий поліс, авіаквитки та/або інші проїзні документи).</p><?php }
}
