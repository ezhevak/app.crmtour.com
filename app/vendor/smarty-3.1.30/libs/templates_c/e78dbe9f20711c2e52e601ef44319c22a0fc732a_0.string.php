<?php
/* Smarty version 3.1.30, created on 2018-01-16 18:05:56
  from "e78dbe9f20711c2e52e601ef44319c22a0fc732a" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a5e22e4a6ed47_04383304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a5e22e4a6ed47_04383304 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><strong>ДОГОВІР ПРО НАДАННЯ ТУРИСТИЧНИХ ПОСЛУГ № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<p style="text-align: justify;">&nbsp;</p>
<p style="text-align: left;">&nbsp;&nbsp; Цей договір укладений <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 в місті Харків</p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<p style="text-align: justify;">&nbsp;</p>
<p style="text-align: justify;"><strong>МІЖ:</strong></p>
<p style="text-align: justify;">Фізичною особою підприємцем Саввіною Христиною Борисівною, надалі Турагент, що діє від імені та за дорученням Туроператора Дочірнє підприємство &laquo;А.Е.Т. Джоін ап!&raquo; (А.Е.Т. Join Up) (ліцензія АВ № 392347 Державної служби туризму і курортів від 14.03.2008 р., розмір фінансового забезпечення ТУРОПЕРАТОРА складає 20 000 (двадцять тисяч) ЄВРО). Гарантія № 3866/02-02 від &laquo;25&raquo; грудня 2007 року. Гарантія видана &laquo;А.Е.Т. Join Up!&raquo; &nbsp;що знаходиться за адресою: 04075, м. Київ, вул. Лісова, буд. 66-Б, кв.6, код ЄДРПОУ 31408096), в особі Генерального директора Альби Юрія Івановича, на підставі Агентського договору № 5788 від 07.05.2014 року, з одного боку, і &nbsp;</p>
<p style="text-align: justify;">Громадянин (ка)</p>
<p style="text-align: justify;"><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p style="text-align: justify;">паспорт ______________ № __________________________________</p>
<p style="text-align: justify;">виданий _________________________________________________________&nbsp;України в ________________________________ області, __________________________ р.,</p>
<p style="text-align: justify;">мешкає за адресою: _______________________________________________________________________________________________________________________________,</p>
<p style="text-align: justify;">який діє за усним дорученням від імені інших туристів</p>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<pre>&lt;table&gt;
&lt;thead&gt;
&lt;tr&gt;
	&lt;th&gt;Имя&lt;/th&gt;
	&lt;th&gt;Фамилия&lt;/th&gt;
	&lt;th&gt;Дата рождения&lt;/th&gt;
	&lt;th&gt;Тип документа&lt;/th&gt;
	&lt;th&gt;First Name&lt;/th&gt;
	&lt;th&gt;Last Name&lt;/th&gt;
	&lt;th&gt;Серия номер&lt;/th&gt;
	&lt;th&gt;Действующий&lt;/th&gt;
	&lt;th&gt;Кем выдан&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&lt;tr&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
&lt;/td&gt;
	
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&lt;/td&gt;
	&lt;td&gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&lt;/td&gt;
&lt;/tr&gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&lt;/table&gt;</pre>
<p style="text-align: justify;">надалі Турист, з другого боку, названі в подальшому &laquo;Сторони&raquo;, керуючись ст. ст. 901-907 ЦК України, ст. ст. 295-305 ГК України, ст. ст. 18-24 Закону України &laquo;Про туризм&raquo;, іншими нормативними актами, що регулюють відносини у сфері туристичної діяльності, уклали даний Договір про наступне:</p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<ol style="text-align: justify;">
<li><strong> Визначення термінів</strong></li>
</ol>
<p style="text-align: justify;">Терміни, що використовуються у цьому Договорі, означають:</p>
<p style="text-align: justify;"><strong>Агент (турагент)</strong> ,<strong>Туроператор, Турпродукт, Турист </strong>в даному договорі розуміються у значенні, викладеному в Законі України &laquo;Про туризм&raquo;.</p>
<p style="text-align: justify;"><strong>Ваучер</strong> &ndash;<strong>&nbsp; </strong>форма письмового договору на&nbsp; туристичне або на екскурсійне обслуговування. <strong>Візова підтримка&nbsp; </strong>- <strong>консультації та послуги з підготовки документів до посольства/консульства/міграційної служби (не входить до складу турпродукту).</strong></p>
<p style="text-align: justify;"><strong>Лист бронювання</strong> &ndash; письмовий запит про надання Турпродукту, отриманий в оригіналі чи по факсу за підписом Турагента та Туриста і який містить перелік необхідних для оформлення Турпродукта послуг, у тому числі прізвище, ім'я та по батькові Туриста. В даному Договорі Лист бронювання вважається офертою Туриста, тобто пропозицією на укладення Договору на туристичне обслуговування.</p>
<p style="text-align: justify;"><strong>Ціна туристичного продукту (вартість)</strong> &ndash; спеціальні пропозиції Туроператора зазначені на сайті, в каталогах та інших в тому числі і рекламних матеріалах туроператора, відомості щодо максимально можливої вартості послуг яку може сплатити Турист при придбанні Туропродукту. До цієї суми можуть бути включені вартість послуг, які надає туроператор, транспортні компанії, страхові компанії та інші суб&rsquo;єкти туристичної діяльності, а також консультаційні-інформаційні послуги з підбору Туру які Туристу надає безпосередньо Турагент.</p>
<p style="text-align: justify;"><strong>Транзитні кошти</strong> &ndash; такі грошові кошти, що сплачені Туристом Туроператору через Турагента, які не є доходом та власністю Турагента.</p>
<p style="text-align: justify;"><strong>Підтвердження Замовлення (акцепт)</strong> &ndash; підтвердження Туроператора по електронних, факсимільних, поштових засобах зв'язку на Лист бронювання Туриста через Турагента, у якому міститься згода Туроператора на надання Турпродукта. Така відповідь Туроператора може бути надана у вигляді рахунку, виписаного на ім&rsquo;я Турагента відповідно до бронювання Туриста через Турагента. Підтвердження Замовлення в даному Договорі вважається акцептом Туроператора, тобто підтвердженням бажання укласти Договір на туристичне обслуговування з Туристом.</p>
<p style="text-align: justify;"><strong>Ануляція</strong> &ndash; зроблена Туристом через Турагента письмова відмова від замовленого та/чи придбаного в Туроператора Турпродукта чи його частини.</p>
<p style="text-align: justify;"><strong>Зміна Листа бронювання Турагента</strong> &ndash; скасування попереднього Замовлення та подання нового Замовлення, що має відмінність від раніше поданого.</p>
<p style="text-align: justify;"><strong>Вид транспортного засобу</strong> &ndash; пристрій призначений для пасажирських перевезень, що здійснюється <strong>&nbsp;</strong>автомобільним, залізничним, морським, річковим, авіаційним та іншим транспортом.</p>
<p style="text-align: justify;"><strong>Категорія транспортного засобу (клас)</strong> &ndash; віднесення до одного чи іншого класу транспортного засобу визначається рівнем комфорту, вартістю даного транспортного засобу, виробником та рівнем оздоблення (економ-клас, <a href="http://uk.wikipedia.org/wiki/%D0%91%D1%96%D0%B7%D0%BD%D0%B5%D1%81-%D0%BA%D0%BB%D0%B0%D1%81">бізнес-клас</a>, <a href="http://uk.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D0%B4%D1%81%D1%82%D0%B0%D0%B2%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B8%D0%B9_%D0%BA%D0%BB%D0%B0%D1%81">представницький клас</a>).</p>
<p style="text-align: justify;"><strong>Вид і спосіб забезпечення&nbsp; харчування під час туристичної подорожі</strong> &ndash; система обслуговування туристів в готельно-ресторанній сфері, що позначається в цьому Договорі та інших необхідних для подорожі Туриста документах наступним чином: RO &ndash; відсутнє харчування; ВВ &ndash; тільки сніданок; НВ &ndash; напівпансіон (сніданок, вечеря), FB &ndash; повний пансіон (сніданок, обід, вечеря), АІ &ndash; все включено,&nbsp; UAL- ультра все включено.</p>
<p style="text-align: justify;"><strong>Реклам́ація</strong> &ndash; це претензія, яка пред&rsquo;являється Туристом через Турагента Туроператору в зв'язку з невідповідністю якості послуг за умовами <a href="http://uk.wikipedia.org/wiki/%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D1%96%D1%80">Договору</a>.</p>
<p style="text-align: justify;"><strong>Прайс (прайс-лист)</strong> &ndash; документ, що надається Туроператором Турагенту і містить описання Турпродукту, право на реалізацію якого надається Агенту, його вартість, перелік послуг, що входять до нього. Прайс також може містити розмір винагороди, що надається Агенту при реалізації останнім вказаного у Прайсі Турпродукту.</p>
<p style="text-align: justify;"><strong>Комерційний курс Туроператора</strong> &ndash; грошовий еквівалент в іноземній валюті до гривні України, що визначений Туроператором та оприлюднений на сайті, що застосовується Туроператором при визначенні суми сплати туристичного продукту, який належить Туроператору.</p>
<p style="text-align: justify;"><strong>Високий сезон </strong>&ndash; 25 квітня &ndash; 10 травня, 01 липня &ndash; 31 серпня, 24 грудня &ndash; 15 січня</p>
<p style="text-align: justify;">&nbsp;</p>
<ol style="text-align: justify;" start="2">
<li><strong> Предмет Договору</strong></li>
</ol>
<p style="text-align: justify;"><strong>2.1. Туроператор через Турагента</strong> зобов&rsquo;язується відповідно до заявки Туриста на бронювання (надалі &ndash; <strong>Лист бронювання</strong>) забезпечити надання комплексу туристичних послуг (туристичний продукт), а Турист зобов&rsquo;язується на умовах даного Договору прийняти та оплатити їх.</p>
<p style="text-align: justify;"><strong>Істотні умови договору</strong></p>
<p style="text-align: justify;">1) строк перебування у місці надання туристичних послуг із зазначенням дат початку та закінчення туристичного обслуговування __ з <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 по <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
;</p>
<p style="text-align: justify;">2) характеристика транспортних засобів, що здійснюють перевезення, зокрема їх вид і категорія, а також дата, час і місце відправлення та повернення (якщо перевезення входить до складу туристичного продукту) __<?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
;</p>
<p style="text-align: justify;">3) готелі та інші аналогічні засоби розміщення, їх місце розташування, категорія, а також відомості про підтвердження відповідності послуг готелю встановленим вимогам, строк і порядок оплати готельного обслуговування __<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
, Standard room, <?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
</p>
<p style="text-align: justify;">4) види і способи забезпечення харчування __<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
;</p>
<p style="text-align: justify;">5) мінімальна кількість туристів у групі (у разі потреби) та у зв&rsquo;язку з цим триденний строк інформування туриста про те, що туристична подорож не відбудеться через недобір групи __________________________________________________________________________________________________________________________________________________________________________________________________;</p>
<p style="text-align: justify;">6) програма туристичного обслуговування ____________________________________________________________________________________________________________________________________________________;</p>
<p style="text-align: justify;">7) види екскурсійного обслуговування та інші послуги, включені до вартості туристичного продукту __________________________________________________________________________________________________________________________________________________________________________________________________;</p>
<p style="text-align: justify;">8) інші суб&rsquo;єкти туристичної діяльності (їх місцезнаходження та реквізити), які надають туристичні послуги, включені до туристичного продукту________________________________________________________________________________________________________________________________________________________________________________________;</p>
<p style="text-align: justify;">9) страховик, що здійснює обов&rsquo;язкове та/або добровільне страхування туристів за бажанням туриста, інших ризиків, пов&rsquo;язаних з наданням туристичних послуг _15&nbsp;000 $_;</p>
<p style="text-align: justify;">10) правила в&rsquo;їзду до країни (місця) тимчасового перебування та перебування там зазначаються у відповідному Додатку до цього Договору;</p>
<p style="text-align: justify;">12) необхідність оформлення візи _<?php echo $_smarty_tpl->tpl_vars['data']->value['Visa'];?>
,</p>
<p style="text-align: justify;">11) вартість туристичного обслуговування&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
 (гривня),</p>
<p style="text-align: justify;">Інформаційно-консультаційні послуги з підбору Турпродукту <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremiaString'];?>
 (гривня).</p>
<ol style="text-align: justify;" start="3">
<li><strong> Права та обов&rsquo;язки сторін.</strong></li>
</ol>
<p style="text-align: justify;"><strong>3.1. Туроператор через Турагента зобов&rsquo;язується:</strong></p>
<p style="text-align: justify;"><strong>3.1.1. </strong>Надати Туристу всю інформацію, що передбачена чинним законодавством України.</p>
<p style="text-align: justify;"><strong>3.1.2. </strong>Забезпечити бронювання туристичних послуг відповідно до Листа бронювання Туриста.</p>
<p style="text-align: justify;"><strong>3.1.3. </strong>Забезпечити Туриста необхідними документами відповідно до кількості Туристів: ваучер, страховий поліс, авіаквитки на авіарейсах згідно з графіком відправлення за маршрутом, вказаним в Листі бронювання.</p>
<p style="text-align: justify;"><strong>3.1.4. </strong>Надати документ, що підтверджує оплату Туристом вартості туристичних послуг, згідно із Листом бронювання та на умовах даного Договору (корінець прибуткового ордеру, квитанція, касовий чек тощо).</p>
<p style="text-align: justify;"><strong>3.2. Туроператор через Турагента має право:</strong></p>
<p style="text-align: justify;"><strong>3.2.1</strong> На отримання від Туриста необхідної персональної інформації, з метою реалізації бронювання та забезпечення надання туристичних послуг;</p>
<p style="text-align: justify;"><strong>3.2.2</strong> На відшкодування Туристом збитків Туроператора/Турагента, завданих його неправомірними діями, в тому числі і порушенням умов цього Договору;</p>
<p style="text-align: justify;"><strong>3.2.3</strong> Відмовитися від виконання Договору у випадках передбачених даним Договором та Законом України &laquo;Про туризм&raquo;;</p>
<p style="text-align: justify;"><strong>3.2.4 </strong>На будь-які зміни тривалості, маршруту та інших параметрів туристичних послуг, що входять до складу Туристичного продукту за погодженням з Туристом. В разі якщо це пов&rsquo;язано з необхідністю гарантування безпеки Туриста Туроператор черезТурагента має право в односторонньому порядку змінювати тривалість, маршрут та інші параметри туристичних послуг.</p>
<p style="text-align: justify;"><strong>3.2.5. </strong>На зміну ціни туристичного продукту після укладення договору на туристичне обслуговування у випадках передбачених Законом України &laquo;Про туризм&raquo;;</p>
<p style="text-align: justify;"><strong>3.2.6.</strong> На внесення змін до умов цього договору або його розірвання у зв&rsquo;язку із зміною істотних умов договору та обставин, якими Сторони керувались під час&nbsp; укладання договору.</p>
<p style="text-align: justify;"><strong>3.3. Турист зобов&rsquo;язується:</strong></p>
<p style="text-align: justify;"><strong>3.3.1. </strong>Надати інформацію Туроператору через Турагента про бажаний туристичний маршрут і повідомити свої вимоги до нього при оформленні Листа бронювання.</p>
<p style="text-align: justify;"><strong>3.3.2. </strong>Своєчасно подати Туроператору через Турагента належно оформлені документи, необхідні для виконання зобов&rsquo;язань (оформлення поїздки (туру) Туроператора. Оплатити, у встановлений цим Договором термін, вартість Туристичного продукту.</p>
<p style="text-align: justify;"><strong>3.3.3</strong>. Дотримуватись правил перебування в країні тимчасового перебування, звичаїв, традицій місцевого населення, а також митних правил та правила в&rsquo;їзду (виїзду) до країни тимчасового перебування; не порушування суспільного порядку та вимоги законів, чинних на території країни тимчасового перебування; дотримування правил внутрішнього розпорядку та протипожежної безпеки в місцях розміщення та перебування.</p>
<p style="text-align: justify;"><strong>3.3.4. </strong>Прибути не пізніше ніж за 2 години до часу виїзду (вильоту) на вказане місце збору групи.</p>
<p style="text-align: justify;"><strong>3.3.5. </strong>Оплатити фактично понесені Туроператором/Турагентом витрати, у тому числі і штрафні санкції, у випадку відмови від даного Договору до початку поїздки.</p>
<p style="text-align: justify;"><strong>3.3.6. </strong>Відшкодовувати збитки, заподіяні Турагенту/Туроператору своїми неправомірними діями.</p>
<p style="text-align: justify;"><strong>3.3.7.</strong> При відмові від виконання цього Договору повернути Туроператору через Турагента Ваучер, страховий поліс та інші документи, що надають право Туристу на отримання туристичних послуг.</p>
<p style="text-align: justify;"><strong>3.3.8. </strong>Своєчасно та в повному обсязі здійснити оплату за використання додаткових послуг в місцях проживання та перебування.</p>
<p style="text-align: justify;"><strong>3.3.9.</strong> Оплатити вартість в&rsquo;їзної візи та послуг з візової підтримки в разі такої необхідності.</p>
<p style="text-align: justify;"><strong>3.4</strong>. <strong>Турист має право на:</strong></p>
<p style="text-align: justify;"><strong>3.4.1. </strong>Необхідну і достовірну інформацію, що передує укладенню цього Договору, передбаченої ст.ст. 19-1, 20 Закону України &laquo;Про туризм&raquo;, ЗУ &laquo;Про захист прав споживачів&raquo; та іншу інформацію, необхідну Туристу для безпечного використання туристичного продукту.</p>
<p style="text-align: justify;"><strong>3.4.2. </strong>Вільне обрання туристичних послуг при замовленні Турпродукту;</p>
<p style="text-align: justify;"><strong>3.4.3. </strong>Отримання комплексу туристичних послуг відповідно до прийнятого та оформленого Листа бронювання;</p>
<p style="text-align: justify;"><strong>3.4.4. </strong>Відшкодування збитків, заподіяних внаслідок невиконання або неналежного виконання умов Договору іншою Стороною при дотриманні вимог, передбачених п. 8 цього Договору;</p>
<p style="text-align: justify;"><strong>3.4.5. </strong>Відмовитися від замовленого Турпродукту з урахуванням наслідків, передбачених цим Договором<strong>;</strong></p>
<ol style="text-align: justify;" start="4">
<li><strong> Порядок виконання договору</strong></li>
</ol>
<p style="text-align: justify;"><strong>4.1.</strong> Інформація Туроператора про програми та розцінки на кожний туристичний продукт, що надається через Турагента Туристу, а також інша інформація, що надається відповідно до умов цього Договору та Закону України &laquo;Про туризм&raquo;, є невід&rsquo;ємною умовою для виконання цього Договору.</p>
<p style="text-align: justify;"><strong>4.2.</strong> За умовами даного Договору, Туроператор через Турагента погоджує із Туристом істотні умови Договору про туристичне обслуговування та заповнює Лист бронювання (встановленого Туроператором) у двох екземплярах або користується системою онлайн бронювання.</p>
<p style="text-align: justify;"><strong>4.3. </strong>Лист бронювання заповнюється в обов&rsquo;язковому порядку повністю.</p>
<p style="text-align: justify;"><strong>4.4.</strong> Лист бронювання або онлайн бронювання в даному випадку вважається безвідкличною офертою Туриста, тобто пропозицією укладення договору.</p>
<p style="text-align: justify;"><strong>4.5.</strong> Після належного оформлення Листа бронювання Турагент здійснює замовлення в системі он-лайн, направляє його засобами електронного, факсимільного чи поштового зв&rsquo;язку Туроператору.</p>
<p style="text-align: justify;"><strong>4.7.</strong> Підтвердження замовлення має містити інформацію про можливість надання всіх істотних умов даного Договору.</p>
<p style="text-align: justify;"><strong>4.8.</strong> Після фактичного отримання Турагентом Підтвердження замовлення Туриста Турагент має право на укладення договору з Туристом на туристичне обслуговування.</p>
<p style="text-align: justify;"><strong>4.9.</strong> Турагент має право на укладення Договору на туристичне обслуговування і до моменту фактичного отримання Підтвердження замовлення від Туроператора, однак в даному випадку даний Договір на туристичне обслуговування вступає в силу в частині виконання своїх зобов&rsquo;язань Туроператором тільки після отримання Турагентом Підтвердження замовлення від Туроператора.</p>
<p style="text-align: justify;"><strong>4.10.</strong> Турагент несе самостійну відповідальність перед Туристом за збитки, заподіяні останньому внаслідок укладення між туристом і Турагентом договору без акцептованого Туроператором замовлення. В такому випадку Турагент вважається таким, що діяв від свого імені.</p>
<p style="text-align: justify;"><strong>4.11.</strong> Туроператор через Турагента&nbsp; відмовляє Туристу в укладенні договору на туристичне обслуговування, якщо:</p>
<p style="text-align: justify;">а) строк чинності візи з моменту перетину кордону країни, на в&rsquo;їзд до якої видана віза, є меншим&nbsp; тривалості перебування Туриста у цій країні;</p>
<p style="text-align: justify;">б) віза використана за кількістю в&rsquo;їздів (виїздів) до (з) відповідної країни;</p>
<p style="text-align: justify;">в) строк чинності закордонного паспорта з моменту перетину кордону країни, до якої подорожує Турист, є меншим від строку встановленого компетентними органами цієї країни;</p>
<p style="text-align: justify;">г) не оформлені, не правильно оформлені документи, що дають право&nbsp; на виїзд дітей за кордон України, а саме:</p>
<p style="text-align: justify;">- відсутнє нотаріально засвідчене клопотання батьків або законних представників батьків чи дітей у разі потреби самостійного виїзду неповнолітнього за кордон;</p>
<p style="text-align: justify;">- не вписані відомості про дітей, які їдуть за кордон разом з батьками (законними представниками) в паспорти батьків чи одного з батьків (законних представників);</p>
<p style="text-align: justify;">- не вклеєні в паспорти батьків (законних представників) та не скріплені печаткою фотографії дітей віком від 5 до 18 років.</p>
<p style="text-align: justify;"><strong>4.12.</strong> Передача Туристу виїзних документів туристів (проїзні документи, страхові поліси, ваучери, закордонні паспорти туристів, в разі тимчасового їх зберігання Турагентом), здійснюються в офісі Турагента, електронною поштою або в системі он-лайн бронювання не пізніше, ніж за 24 години до початку туру. Передача документів може здійснюватись безпосередньо Туристу в аеропорту вильоту представником Турагента /Туроператора, за домовленістю Сторін.</p>
<p style="text-align: justify;"><strong>4.13.</strong> Зміна ціни туристичного продукту після Підтвердження бронювання допускається лише у разі необхідності врахування зміни тарифів на транспортні послуги, запровадження нових або підвищення діючих ставок податків і зборів та інших обов&rsquo;язкових платежів, зміни курсу гривні до іноземної валюти, в якій виражена вартість туристичного продукту.</p>
<p style="text-align: justify;"><strong>4.14.</strong> Зміна ціни туристичного продукту можлива не пізніш як за 20 днів до початку туристичної подорожі. При цьому збільшення ціни туристичного продукту не може перевищувати п&rsquo;яти відсотків його початкової ціни. У разі якщо ціна туристичного продукту вища за початкову ціну на п&rsquo;ять відсотків, Турист має право відмовитися від виконання договору, а Туроператор через Турагента зобов&rsquo;язаний повернути йому раніше сплачену суму.</p>
<p style="text-align: justify;"><strong>4.14.1.</strong> Сторони домовилися, що у разі збільшення комерційного курсу Туроператора вартість неоплаченого або неповністю оплаченого туристичного продукту (туристичної послуги) у строки передбачені умовами оплати туру пропорційно збільшується.</p>
<p style="text-align: justify;"><strong>4.15.</strong> Кожна із Сторін даного Договору до початку туристичної подорожі Туриста може вимагати внесення змін до цього Договору або його розірвання у зв&rsquo;язку із зміною істотних умов договору та обставин, якими вони керувалися під час укладення договору, зокрема у разі:</p>
<p style="text-align: justify;">1) погіршення умов туристичної подорожі, зміни її строків;</p>
<p style="text-align: justify;">2) непередбаченого підвищення тарифів на транспортні послуги;</p>
<p style="text-align: justify;">3) запровадження нових або підвищення діючих ставок податків і зборів, інших обов&rsquo;язкових платежів;</p>
<p style="text-align: justify;">4) істотної зміни курсу гривні до іноземної валюти, в якій виражена ціна туристичного продукту;</p>
<p style="text-align: justify;">5) відмови партнера Туроператора в наданні заброньованого та оплаченого Турпродукту;</p>
<p style="text-align: justify;">6) в разі відмови посольства (консульства) в наданні Туристу візи;</p>
<p style="text-align: justify;"><strong>4.16.</strong> Туроператор через Турагента вправі відмовитися від виконання договору лише за умови повного відшкодування Туристу збитків, підтверджених у встановленому порядку та заподіяних внаслідок розірвання договору, крім випадку, якщо це відбулося з вини Туриста.</p>
<p style="text-align: justify;"><strong>4.17.</strong> Турист вправі відмовитися від виконання договору на туристичне обслуговування до початку туристичної подорожі за умови відшкодування Туроператору&nbsp; фактично здійснених ним документально підтверджених витрат, пов&rsquo;язаних із відмовою.</p>
<p style="text-align: justify;"><strong>4.18.</strong> Якщо під час виконання договору на туристичне обслуговування Туроператор не в змозі надати значну частину туристичного продукту, щодо якого відповідно до договору на туристичне обслуговування сторони досягли згоди, Туроператор&nbsp; повинен з метою продовження туристичного обслуговування вжити альтернативних заходів без покладення додаткових витрат на туриста, а в разі потреби відшкодувати йому різницю між запропонованими послугами і тими, які були надані.</p>
<p style="text-align: justify;"><strong>4.19.</strong> У випадку вжиття альтернативних заходів до дати початку Туру Туроператор через Турагента надає Туристу відповідне повідомлення, вказавши, що саме змінено.</p>
<p style="text-align: justify;"><strong>4.20.</strong> У випадку, якщо Турист скористався запропонованою йому альтернативною послугою, претензії щодо ненадання послуг, що обумовлені в Листі бронювання та Договорі на туристичне обслуговування вважаються необґрунтованими, а послуги за Договором наданими належним чином і в повному обсязі. Туроператор вважається таким, що виконав в повному обсязі свій обов&rsquo;язок перед Туристом.</p>
<p style="text-align: justify;"><strong>4.21.</strong> У разі неможливості здійснення альтернативних заходів або відмови Туриста від них Туроператор зобов&rsquo;язаний надати Туристу без додаткової оплати еквівалентний транспорт для повернення до місця відправлення або іншого місця, на яке погодився Турист, а також відшкодувати вартість ненаданих туристичних послуг і виплатити компенсацію у розмірі, визначеному в даному договорі.</p>
<p style="text-align: justify;"><strong>4.22.</strong> Туроператор &nbsp;несе перед Туристом відповідальність за невиконання або неналежне виконання умов даного Договору, крім випадків, якщо:</p>
<p style="text-align: justify;">невиконання або неналежне виконання умов договору сталося з вини Туриста;</p>
<p style="text-align: justify;">невиконання або неналежне виконання умов договору сталося з вини третіх осіб, не пов&rsquo;язаних з наданням послуг, зазначених у цьому договорі, та жодна із сторін про їх настання не знала і не могла знати заздалегідь;</p>
<p style="text-align: justify;">невиконання або неналежне виконання умов договору сталося внаслідок настання форс-мажорних обставин, які вказані в даному Договорі або є результатом подій, які Туроператор/Турагент та інші суб&rsquo;єкти туристичної діяльності, які надають туристичні послуги, включені до туристичного продукту, не могли передбачити.</p>
<p style="text-align: justify;"><strong>4.23.</strong> Після отримання підтвердження та всіх необхідних документів для здійснення подорожі Туристом відмова останнім від фактичного отримання послуг не позбавляє Туроператора права на отримання оплати вартості туристичних послуг згідно замовлення.</p>
<p style="text-align: justify;">&nbsp;</p>
<ol style="text-align: justify;" start="5">
<li><strong> Порядок розрахунків</strong></li>
</ol>
<p style="text-align: justify;"><strong>5.1.</strong> Під час заповнення Листа бронювання, Турист здійснює Туроператору через Турагента передплату в розмірі не менше 30 % від загальної вартості замовленого туристичного продукту&nbsp; та Супутніх послуг. Якщо Лист бронювання оформлюється менш ніж за 14 днів до початку замовленого Туру або дата початку якого припадає на Високий сезон/Акції Турист здійснює 100 (сто) % оплату вартості замовленого ним Туристичного продукту&nbsp; та Супутніх послуг.</p>
<p style="text-align: justify;"><strong>5.2. </strong>Після отримання підтвердження на Тур, Туроператор через Турагента запрошує Туриста для підписання Договору на туристичне обслуговування та здійснення остаточної оплати замовленого Туру та Супутніх послуг. Турист повинен здійснити повну оплату вартості за замовлений Тур та Супутні послуги за вирахуванням передоплати Туроператору (безпосередньо або через &nbsp;Турагента) протягом 1-го банківського дня після підтвердження Туру. Датою виконання зобов&rsquo;язань з оплати є дата зарахування коштів на поточний рахунок Турагента. За згодою Сторін допускається підтвердження оплати копією платіжного документа. У призначенні платежу Турист вказує реквізити рахунку, відповідно до якого здійснюється оплата. У разі нездійснення оплати в зазначений строк, підтвердження на Тур автоматично анулюється, збитки Туроператора/Турагента &nbsp;покладаються на Туриста.</p>
<p style="text-align: justify;"><strong>5.3. </strong>Послуги Турагента за інформаційно-консультаційні послуги з підбору Турпродукту Турист оплачує окремо. Вартість таких послуг встановлюється Турагентом самостійно та становить суму грошових коштів яка є не більшою різниці вартості Туристичного продукту, що зазначено на сайті Туроператора та вартості Туристичного продукту, що зазначений в Підтвердженні бронювання або рахунку Туроператора.</p>
<p style="text-align: justify;"><strong>5.4. </strong>У разі зміни вартості Туру та Супутніх послуг Туроператор через Турагента погоджує цю зміну з Туристом. Турист повинен здійснити повну оплату вартості за замовлений Тур та Супутні послуги протягом 1-го банківського дня після узгодження нової ціни за замовлений ним Тур та Супутні послуги.</p>
<p style="text-align: justify;"><strong>5.5. </strong>У разі збільшення транспортних тарифів, комерційного курсу валют, введення нових або підвищення діючих ставок податків, зборів та інших обов&rsquo;язкових платежів Туроператор через Турагента надає Туристу рахунок на оплату, розмір якої підлягає перерахуванню Туристом Туроператору (безпосередньо або через &nbsp;Турагента)&nbsp; протягом 1-го банківського дня. В разі неналежного виконання Туристом обов&rsquo;язку з оплати рахунку, відповідне замовлення анулюється Туроператором через Турагента з повідомленням Туриста, та в такому разі застосовується відповідальність, передбачена пунктом 7.2 даного Договору.</p>
<p style="text-align: justify;">&nbsp;</p>
<ol style="text-align: justify;" start="6">
<li><strong> Умови компенсації за ненадані послуги.</strong></li>
</ol>
<p style="text-align: justify;"><strong>6.1. </strong>У випадку невиконання умов даного Договору з боку Туроператора/Турагента, Турист має право вимагати повернення оплачених коштів за ненадані послуги, за умови дотримання вимог п. 3.3. даного Договору.</p>
<p style="text-align: justify;"><strong>6.2.</strong> У випадку відмови Туроператора/Турагента від виконання даного Договору, Турист має право на відшкодування підтверджених документально збитків, крім випадку, коли це відбулося з вини Туриста.</p>
<p style="text-align: justify;"><strong>6.3.</strong> У випадку невиїзду Туриста внаслідок неправильного оформлення паспорта та інших необхідних для виїзду за кордон документів, надання недостовірної інформації стосовно паспортних та інших даних Туриста, всі фінансові витрати по поїздці (ануляції) несе Турист.</p>
<p style="text-align: justify;"><strong>6.4. </strong>У випадку настання страхового випадку, претензії по збитках Турист пред&rsquo;являє в страхову компанію, вказану в страховому полісі.</p>
<p style="text-align: justify;"><strong>6.5. </strong>У випадку дострокового припинення Туристом терміну перебування в поїздці, та (або) невикористання замовлених послуг, з будь-яких причин, Туроператор/Турагент не несе відповідальності за такі дії Туриста та не здійснює компенсації за не отримані послуги.</p>
<p style="text-align: justify;"><strong>6.6. </strong>У випадку невідповідності умов туру умовам даного Договору, Турист зобов&rsquo;язаний повідомити&nbsp; Туроператора через Турагента або представника приймаючої сторони у найкоротший термін, для надання можливості усунення вказаних невідповідностей. В разі якщо Турист не повідомив Туроператора через Турагента або представника приймаючої сторони про наявність зауважень до послуг або невідповідності послуг, заявленим в Договорі однак належним чином прийняв їх, тобто використав, претензії в даному випадку Туроператором/Турагентом не приймаються.</p>
<p style="text-align: justify;">Для отримання компенсації за ненадані послуги у країні тимчасового перебування Туристу необхідно скласти Акт невідповідності послуг за власним підписом та підписом представника приймаючої сторони. В разі можливості пред&rsquo;явити Туроператору через Турагента офіційний письмовий документ, виданий третьою особою, що надає послуги, які включені до Туристичного продукту, з підтвердженням факту неможливості надання послуг.</p>
<p style="text-align: justify;"><strong>6.7.</strong> Відповідальність за скасування чи зміну часу відправлення та прибуття транспортних засобів та пов'язані із цим зміни обсягу і строків Туру несе перевізник, відповідно до Правил міжнародних пасажирських перевезень. Туроператор/ Турагент не несе відповідальності за збитки, спричинені туристу у випадку відміни рейсу перевізником, зміни часу відправлення/прибуття транспортних засобів перевізника, а також пов&rsquo;язані з цим зміни програми туру. Всі претензії, позови, пов&lsquo;язані з неналежним наданням транспортних послуг, ненаданням транспортних послуг або їх затримка, що призвело до збитків пред&rsquo;являються безпосередньо перевізникам у відповідності з Правилами повітряних перевезень пасажирів і багажу.</p>
<p style="text-align: justify;"><strong>6.8. </strong>Сторони цього договору усвідомлюють та погоджуються, що Туроператор діє, як агент від компаній перевізників та надавачів готельних послуг і виступає, як посередник між Туристом та вказаними надавачами послуг без набуття для себе зобов&lsquo;язань виступати як надавач &nbsp;готельних та/або послуг з авіаперевезення. До зазначеного пункту не застосовується положення вимог п.2. статті 903 Цивільного Кодексу України.&nbsp; &nbsp;&nbsp;&nbsp;</p>
<p style="text-align: justify;">&nbsp;</p>
<ol style="text-align: justify;" start="7">
<li><strong> Відповідальність сторін.</strong></li>
</ol>
<p style="text-align: justify;"><strong>7.1. </strong>Турист має право відмовитись від виконання даного Договору, за умови оплати&nbsp; Туроператору (безпосередньо або через Турагента) фактично понесених ним витрат за послуги, надані до цього повідомлення, не пізніше дати&nbsp; початку туру. Заява про відмову Туриста від надання туристичних послуг в письмовій&nbsp;формі приймається Туроператором через Турагента до виконання з дня отримання такої заяви.</p>
<p style="text-align: justify;"><strong>7.2. </strong>У випадку відмови від виконання даного Договору, у тому числі внаслідок відмови посольства країни відвідування у видачі візи туристу (надалі по тексту &ndash; відмова) Турист сплачує Туроператору через Турагента штраф &nbsp;в наступних розмірах:</p>
<p style="text-align: justify;">- за відмову від поїздки в терміни 30-21 день до початку подорожі - 15% загальної вартості туристичних послуг;</p>
<p style="text-align: justify;">- за відмову від поїздки в терміни 20-15 днів до початку подорожі - 50% загальної вартості туристичних послуг;</p>
<p style="text-align: justify;">- за відмову від поїздки в терміни 14-8 днів до початку подорожі &ndash; 85 % загальної вартості туристичних послуг;</p>
<p style="text-align: justify;">- за відмову від поїздки в терміни 7-1 день до початку подорожі &ndash; 100 % загальної вартості туристичних послуг;</p>
<p style="text-align: justify;">- при відмові від поїздки, що припадає на високий сезон -&nbsp;&nbsp; 100% вартості туристичних послуг;</p>
<p style="text-align: justify;">- при відмові від замовлення, по акції &laquo;раннє бронювання&raquo;, або по інших акціях, якщо таке положення було зазначене в умовах проведення акції -&nbsp;&nbsp; 100% вартості туристичних послуг;</p>
<p style="text-align: justify;">Сторони погодили та встановили, що строк та термін високого сезону встановлюється Туроператором самостійно, інформація про зазначений сезон доноситься Туроператором через Турагента до Туриста у зручній для Туроператора формі, зокрема на сайті <a href="http://joinup.ua/">http://joinup.ua/</a>.</p>
<p style="text-align: justify;">Наведений розмір витрат може бути змінено. Розмір виплат, що зобов&rsquo;язаний сплатити Турист, залежить від домовленостей Туроператора з партнером по організації туру. Якщо партнером Туроператора встановлений інший розмір витрат, ніж передбачений умовами даного договору, Турист зобов&rsquo;язаний сплатити вказані витрати, визначені партнером, з урахуванням інших положень даного договору. Для з&rsquo;ясування розміру можливих витрат Турист має право здійснювати запити до Турагента, який в свою чергу зобов&rsquo;язаний повідомити Туриста про можливі витрати, кожного із партнерів Туроператора по туру.</p>
<p style="text-align: justify;">* Туроператор через Турагента виставляє Туристу на суму витрат рахунок, який Турист повинен сплатити впродовж двох банківських днів з моменту виставлення такого рахунку Туроператором через Турагента.</p>
<p style="text-align: justify;">* У випадку відмови Посольства в наданні візи, Туроператор через Турагента здійснює всі можливі дії для повернення платежів за винятком фактично понесених витрат за послуги надані Турагентом (Туроператором).</p>
<p style="text-align: justify;">* Візовий збір сплачений в Посольство (Консульство) за розглядання питання про видачу візи не повертаються незалежно від результатів розглядання документів або строків ануляції.</p>
<p style="text-align: justify;">* Турист зобов&rsquo;язаний з&rsquo;явитися &nbsp;до представництва держави, яке надало йому туристичну візу з умовою явки упродовж 15 днів після повернення в Україну. За невиконання зазначеного обов&rsquo;язку Турист сплачує Турагенту штраф у розмірі, еквівалентному 1000 євро.</p>
<p style="text-align: justify;">* У випадку надання Туристом завідомо неправдивих та/або сфальсифікованих документів для отримання візи, Турист зобов&rsquo;язується сплатити Туроператору (безпосередньо або через Турагента) штраф у розмірі вартості туристичного продукту для такого Туриста.</p>
<p style="text-align: justify;"><strong>7.3.</strong> Турист несе відповідальність за пошкодження ним майна або здійснення протиправних дій пiд час поїздки, згідно з чинним законодавством країни тимчасового перебування.</p>
<p style="text-align: justify;"><strong>7.4. </strong>При анулюванні турів що припадають на Високий сезон, акційні пропозиції, державні свята, у періоди виставок, ярмарок, а також при зміні прізвищ в документах, Турист зобов&rsquo;язаний відшкодувати збитки Туроператора/Турагента у розмірі 100% вартості туру, незалежно від строків відмови.</p>
<p style="text-align: justify;"><strong>7.5.</strong> У випадку, якщо Туроператором/Турагентом авіаквитки заброньовані або виписані по спеціальному (блочному/тур пакетному/туроператорському) тарифу авіакомпанії, 100% штраф від вартості квитків незалежно від строків відмови. При цьому слід мати на увазі, що вартість авіаквитків на чартерні рейси, а також вартість авіаквитків на регулярні рейси, які продані по тарифам перевізника є таким, що не повертаються.</p>
<p style="text-align: justify;"><strong>7.6</strong>. У випадку порушення Туристом, який використовує туристичні&nbsp; послуги Туроператора, діючих правил проїзду, реєстрації чи провозу багажу, нанесення збитків майну транспортної компанії чи порушення правил проживання в готелі, порушення правил перетину кордону та неповернення в країну постійного місце проживання, після закінчення надання Туроператором туристичного обслуговування або недотримання законодавства країни перебування, штрафи стягуються з Туриста в розмірах, передбачених відповідними правилами і нормами транспортної компанії, готелю, країни перебування та іншими уповноваженими органами. Туроператор в даному випадку відповідальності не несе.</p>
<p style="text-align: justify;"><strong>7.7.</strong> Турист несе відповідальність за використання Ваучера, страхового поліса та інших документів.</p>
<p style="text-align: justify;"><strong>7.8.</strong> Туроператор/Турагент не несе відповідальності за схоронність багажу, цінностей та документів Туристів протягом усього періоду перебування у подорожі.</p>
<p style="text-align: justify;"><strong>7.9.</strong> Туроператор/Турагент не несе відповідальності перед Туристом у випадках: виникнення форс - мажорних обставин, визначених Договором, а також таких обставин, при яких виконання Замовлення виявиться неможливим; відмови конкретного консульства/дипломатичної установи іноземної держави у видачі Туристу візи/дозволу на в&rsquo;їзд/виїзд (про що Турагент невідкладно інформує Туриста, але не пізніше ніж за 48 годин з моменту, коли про це стало відомо Туроператору та Турагенту); в разі невчасного та/або неповного подання Туристом Турагенту для подальшого надання Туроператору необхідних для оформлення Туристичного продукту документів; в разі подання Туристом іншій Стороні неправдивих та/або завідомо неправдивих даних та інформації щодо себе, та/або підроблених чи не чинних документів; в разі, якщо Турагенту чи Туроператору стане відомо про придбання Туристом Туристичного продукту з метою, відмінною від туризму (тобто з метою влаштування на оплачувану роботу за кордоном, метою прохання про політичний притулок, тощо), і Турагент та Туроператор зможуть мотивувати і довести це шляхами, не забороненими чинним законодавством;</p>
<p style="text-align: justify;"><strong>7.10.</strong> Туроператор/Турагент не несе відповідальності щодо відшкодування грошових витрат Туриста за оплачені послуги, якщо Турист у період обслуговування за своїм розсудом чи в зв'язку із своїми інтересами не скористався всіма чи частиною запропонованих та сплачених послуг та не відшкодовує витрати, що виходять за межі послуг, обумовлених цим Договором.</p>
<ol style="text-align: justify;" start="7">
<li><strong> 11. </strong>У випадку одночасного настання таких обставин:</li>
</ol>
<p style="text-align: justify;">- відсутність Ануляції при наявності порушення зобов&rsquo;язань згідно цього Договору;</p>
<p style="text-align: justify;">- відсутність оплати Туристом Турпродукта згідно пункту 5.1. цього Договору;</p>
<p style="text-align: justify;">- неявка туриста на рейс;</p>
<p style="text-align: justify;">на Туриста накладається штраф у розмірі 100 (сто) відсотків від загальної вартості Турпродукта.</p>
<p style="text-align: justify;"><strong>7.12. </strong>Туроператор не володіє інформацією про плани проведення на території готелю або прилеглої до готелю території в країні перебування будівельних та ремонтних робіт, що здійснюються за рішенням адміністрації готелю або з відома місцевих влад будь-якими державними або приватними особами відповідно та не несе відповідальності за будь-які незручності, що завдані Туристу в зв&rsquo;язку з цим.</p>
<p style="text-align: justify;"><strong>7.13.</strong> Туроператор не несе відповідальність в разі, якщо Турист не скористався туристичним продуктом або спожив його не повністю з причин, що не залежать від Туроператора, а саме: відмову консульської установи у видачі візи або, якщо візу було отримано пізніше ніж дата вильоту, також відповідальність для Туроператора відсутня в разі скасування, заміни, перенесення, затримка авіарейсу та/або наземного трансферу в зв&lsquo;язку із чим Турист не скористався турпродуктом та/або отримав його неповністю. Будь які причини, обставини в наслідок яких Туристом послуга спожита та/або спожита не повно не створює зобов&lsquo;язання для Туроператора, якщо ці причини/обставини не залежали від останнього.</p>
<p style="text-align: justify;"><strong>7.14.</strong> В разі настання обставин передбачених в п.7.13. кошти за отриманий туристичний продукт поверненню не підлягають.</p>
<p style="text-align: justify;">&nbsp; <strong>7.15.</strong> Туроператор/Турагент має право на притримання виконання взятих на себе за даним Договором зобов&rsquo;язань, у випадку якщо Турист оплатив туристичний продукт не в повному розмірі або порушив інші зобов&rsquo;язання по даному Договору.</p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<ol style="text-align: justify;" start="8">
<li><strong> Порядок вирішення спорів</strong></li>
</ol>
<p style="text-align: justify;"><strong>8.1. </strong>Всі претензії Туриста з питань обслуговування за кордоном або на території України приймаються до розгляду в письмовому вигляді, за наявності Акту, підписаного представником приймаючої сторони в країні перебування Туриста протягом 14 днів з моменту закінчення туру. Претензія повинна бути оформлена в письмовому вигляді в двох примірниках з документальним підтвердженням обставин, викладених у претензії.</p>
<p style="text-align: justify;"><strong>8.2.</strong> Претензії, подані чи заявлені Туристом з порушенням п. 8.1. даного Договору, Туроператором до розгляду не приймаються.</p>
<p style="text-align: justify;"><strong>8.3.</strong> Туроператор/Турагент не приймає претензії та не несе відповідальності по претензіям, що пов&rsquo;язані з деякими відхиленнями щодо обслуговування, яке надають готелі, мотелі, пансіонати (несмачна їжа, несправності в роботі кондиціонера, висока вартість додаткових послуг, відключення води та електропостачання, прибирання кімнат та території, ненадійне підключення до мережі Інтернет &nbsp;т. і.). Туроператор не володіє інформацією про можливі плани адміністрації готелів щодо проведення будівельних та ремонтних робіт в курортній зоні.</p>
<p style="text-align: justify;"><strong>8.4.</strong> Усі спори, що виникають з цього Договору або пов'язані з ним, включаючи розгляд претензій, вирішуються відповідно до положень цієї статті, і перш за все - шляхом переговорів між Сторонами. У разі якщо розбіжності не можуть бути вирішені шляхом переговорів, спірне питання передається до суду згідно із підсудністю і підвідомчістю такого спору, що передбачено чинним законодавством України.</p>
<p style="text-align: justify;"><strong>8.5.</strong> Сторони не звільняються від виконання своїх зобов'язань за цим Договором як за наявністю будь-якого спору, розбіжностей чи претензій, так і за умови передачі спірного питання на судовий розгляд згідно з цим Договором.</p>
<ol style="text-align: justify;" start="9">
<li><strong> Форс мажорні обставини</strong></li>
</ol>
<p style="text-align: justify;"><strong>9.1.</strong> Сторони звільняються від майнової відповідальності за невиконання зобов&cent;язань, передбачених Договором, при виникненні форс-мажорних обставин, а саме: повінь, землетрус, цунамі, епідемії й інші стихійні явища природи, що віднесені в даній місцевості до розряду стихійних; лісові пожежі, вибухи, виходи з ладу чи ушкодження транспортних засобів; страйк, саботаж, локаут, оголошена чи неоголошена війна, революція, масові безладдя, терористичних актів, аварій і інші непередбачені ситуації, що безпосередньо вплинули&nbsp; на виконання умов даного Договору; несприятливі погодні умови, що не є стихійними явищами, але які приводять до неможливості надання послуг в повному обсязі та належної якості, прийняття державними органами нормативних актів, що призвели&nbsp; до неможливості належного виконання&nbsp; сторонами зобов&rsquo;язань, які вони взяли на себе відповідно до умов даного Договору; інших подій в країні перебування чи регіоні, що несуть в собі загрозу життю,&nbsp; здоров&rsquo;ю та особистій безпеці туристам, а також інших обставин , які не залежать&nbsp;&nbsp; від&nbsp; волі сторін.</p>
<p style="text-align: justify;"><strong>9.2.</strong> Сторона, для якої створилася неможливість виконання прийнятих на себе зобов'язань, внаслідок дії форс-мажорних обставин, зобов'язана в письмовій формі повідомити іншу Сторону про час настання, можливу тривалість та вірогідну дату припинення дії даних обставин, підтвердивши наявність дії форс-мажорних обставин відповідними документами (довідками торгово-промислової палати і т.д.).</p>
<p style="text-align: justify;"><strong>9.3.</strong> При настанні будь-якої вищевказаної форс-мажорної обставини, за згодою сторін, дія чинного Договору або подовжується, або переноситься, або припиняється.</p>
<ol style="text-align: justify;" start="10">
<li><strong> Термін дії Договору</strong></li>
</ol>
<p style="text-align: justify;"><strong>10.1</strong>. Договір вступає в силу з моменту його підписання і діє до закінчення терміну Туру<strong>. </strong>В частині фінансових взаємовідносин діє до моменту повного розрахунку сторін по Договору.</p>
<p style="text-align: justify;"><strong>10.2.</strong> Договір може бути розірваний достроково, з ініціативи однієї із сторін, але не раніше дати проведення усіх взаєморозрахунків.</p>
<p style="text-align: justify;"><strong>10.3.</strong> Дія даного Договору припиняється в такому разі:</p>
<p style="text-align: justify;">а)&nbsp; достроково за взаємною згодою Сторін;</p>
<p style="text-align: justify;">б)&nbsp; достроково з ініціативи однієї із Сторін в порядку, передбаченому цим Договором;</p>
<p style="text-align: justify;">в)&nbsp; в інших випадках, передбачених чинним законодавством України.</p>
<p style="text-align: justify;"><strong>10.4. Внесення змін та доповнень до договору:</strong></p>
<p style="text-align: justify;"><strong>10.4.1. </strong>Зміни до цього договору вносяться за згодою сторін, водночас Сторони погодили, що Туроператор вправі змінити суттєві умови договору, зокрема дати здійснення авіаперевезення, зміну готелю, тощо. Погодження з боку Туриста зміни умов договору свідчить споживання Туристом іншої та/або заміненої послуги. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;</strong></p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<ol style="text-align: justify;" start="11">
<li><strong> Заключні положення</strong></li>
</ol>
<p style="text-align: justify;"><strong>11.1. </strong>Цей Договір складений українською мовою в двох примірниках, що мають однакову юридичну силу, по одному для кожної із Сторін.</p>
<p style="text-align: justify;"><strong>11.2.</strong> Відповідно до вимог Закону України &laquo;Про захист персональних даних&raquo;, а також мети обробки персональних даних, яка виходить з положень установчих документів Туроператора і Турагента, Закону України &laquo;Про туризм&raquo; - надання туристичних послуг, Турист надає свою добровільну згоду на збір та</p>
<p style="text-align: justify;">використання його персональних даних Туроператором і Турагентом для виконання умов даного Договору.</p>
<p style="text-align: justify;"><strong>11.3.</strong> Сторонам, що підписали цей Договір, зрозумілі умови Договору.</p>
<p style="text-align: justify;"><strong>11.4. </strong>Підписанням цього договору Турист підтверджує факт надання йому всієї необхідної інформації для здійснення туристичної подорожі.</p>
<p style="text-align: justify;"><strong>11.5.</strong> З моменту підписання цього Договору, всі попередні усні або письмові домовленості Сторін, що так чи інакше стосуються цього Договору, втрачають юридичну силу та не можуть братися до уваги при тлумаченні умов цього Договору.</p>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<ol style="text-align: justify;" start="12">
<li><strong> Реквізити та підписи сторін</strong></li>
</ol>
<p style="text-align: justify;"><strong>&nbsp;</strong></p>
<table width="709">
<tbody>
<tr>
<td style="width: 892px;" width="340">
<p style="text-align: center;"><strong>Турагент:</strong></p>
</td>
<td style="width: 1011px;" width="369">
<p style="text-align: center;"><strong>Турист:</strong></p>
</td>
</tr>
<tr>
<td style="width: 892px;" width="340">
<p style="text-align: center;"><u>ФОП</u>__<u>Саввіна</u>_<u>Х.</u>_<u>Б.</u></p>
<p style="text-align: center;"><u>м.</u>_<u>Харків,</u>_<u>вул.</u>_<u>Героїв</u>_<u>Праці,</u>_<u>7&nbsp;</u><u>ТРЦ</u>_<u>"Караван"</u></p>
<p style="text-align: center;"><u>рах.</u>_<u>№</u>_<u>26004052328313</u></p>
<p style="text-align: center;"><u>в&nbsp;</u><u>ПАТ</u>_<u>КБ</u>_<u>"ПРИВАТБАНК"</u></p>
<p style="text-align: center;"><u>МФО</u>_<u>351533</u></p>
<p style="text-align: center;"><u>ЄДРПОУ</u>_<u>2875914543</u></p>
<p>&nbsp;</p>
</td>
<td style="width: 1011px;" width="369">
<p style="text-align: center;">Ф.І.О. __<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
___</p>
<p style="text-align: center;">Адреса реєстрації: __<?php echo $_smarty_tpl->tpl_vars['data']->value['Address'];?>
__</p>
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 892px;" width="340">
<p>&nbsp;</p>
<p style="text-align: center;">______________________________/Саввіна Х.Б.</p>
</td>
<td style="width: 1011px;" width="369">
<p>&nbsp;</p>
<p style="text-align: center;">______________________/<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
</td>
</tr>
<tr>
<td style="width: 892px;" width="340">
<p>&nbsp;</p>
</td>
<td style="width: 1011px;" width="369">
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify;"><strong>&nbsp;</strong></p><?php }
}
