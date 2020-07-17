<?php
/* Smarty version 3.1.30, created on 2018-01-21 17:35:07
  from "100827d0a94673e163355bf44e9500a126329a94" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a64b32b6d46d2_85379022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a64b32b6d46d2_85379022 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p style="text-align: center;"><strong>ДОГОВІР № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></p>
<p style="text-align: center;"><strong>на туристичне обслуговування</strong></p>
<p style="text-align: justify;">м. Харків&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 р.</p>
<p style="text-align: justify;"><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
, назване у подальшому &laquo;Турагент&raquo; (розмір фінансової гарантії відповідальності Турагента складає еквівалент суми 2000&nbsp;Євро, яка надана Комерційним Банком &laquo;Глобус&raquo;, згідно Договору про надання банківської гарантії виконання зобов&rsquo;язань №68 від 06 березня 2014 р.), в особі <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
, що діє на підставі Державної реєстрації, який діє від імені та за дорученням Туроператора ТОВ &laquo;Туристична Компанія &laquo;Анекс Тур&raquo; (адреса: 02121, м. Київ, вул. Харківське шосе, 201-203,2А, група нежилих прим.№53,офіс № 1, тел.&nbsp;(044) 591 1 591, ліцензія на право заняття туроператорською діяльністю Серія AГ № 581096 від 17 травня 2012 року) на підставі Договору №&nbsp;410А/14&nbsp; від 24.04.2014 р., з одного боку та <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
, названий у подальшому &laquo;Турист&raquo;, з другого боку, названі в подальшому &laquo;Сторони&raquo;, уклали даний Договір про наступне:<strong><u>&nbsp;</u></strong></p>
<ol style="text-align: justify;">
<li><strong><u> ПРЕДМЕТ ДОГОВОРУ</u></strong></li>
</ol>
<p style="text-align: justify;">1.1. Турагент зобов&rsquo;язується відповідно до замовлення Туриста й особам, що слідують з ним, забезпечити надання комплексу туристичних послуг (туристичний продукт) Туристу, а Турист зобов&rsquo;язується на умовах даного Договору прийняти та оплатити їх.</p>
<p style="text-align: justify;">1.2*Туроператор виконує свої обов&rsquo;язки перед Туристами, як перед солідарними кредиторами.</p>
<p>1.3*Туристи виконують свої обов&rsquo;язки перед Туроператором, як солідарні боржники.</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *пункти застосовуються у випадку укладення цього Договору з групою туристів</p>
<ol style="text-align: justify;" start="2">
<li><strong><u> УМОВИ ТА СТРОКИ ТУРИСТИЧНОЇ ПОДОРОЖІ (ЗАМОВЛЕННЯ)</u></strong></li>
</ol>
<p style="text-align: justify;">2.1. Туристична подорож здійснюється у складі (вказуються кількість туристів та відомості про них; при подорожі туриста/ів з дітьми, дата народження дитини вказується обов&rsquo;язково): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
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
<p style="text-align: justify;">&nbsp;2.2. Країна та місце призначення: <?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</p>
<p style="text-align: justify;">2.3. Термін подорожі: з <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 р. по <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 &nbsp;р.</p>
<p style="text-align: justify;">&nbsp;2.4. Транспортне обслуговування*:&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
</p>
<p style="text-align: justify;">&nbsp;2.5. Розміщення в готелі (в т.ч. транзитне):&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RoomViewName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</p>
<p style="text-align: justify;">(вказується: назва готелю; категорія; тип номеру; в разі обрання подорожі за системою &laquo;Рулетка&raquo;, вказується назва &laquo;Roulette&raquo; та категорія без назви готелю)</p>
<p style="text-align: justify;">2.6. Поселення до готелю** <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 р. Виселення з готелю** <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
 р.</p>
<p style="text-align: justify;">2.7. Трансфер: <?php echo $_smarty_tpl->tpl_vars['data']->value['TransferName'];?>
 Харчування: <?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
 &nbsp;Страховик:____________________________________</p>
<p style="text-align: justify;">&nbsp; (VIP, індивідуальний, груповий, без трансферу, між готелями)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (NO, BB, HB, AI, UAI, інше)</p>
<p style="text-align: justify;">2.8. Додаткові або інші умови подорожі, додаткові послуги (побажання***): ____________________________________________</p>
<p style="text-align: justify;">&nbsp;2.9. Інші суб'єкти туристичної діяльності, які надають туристичні послуги, включені до туристичного продукту (у тому числі приймаюча сторона): ___________________________________________________________________________________________</p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(вказується: їх місцезнаходження та реквізити)</p>
<p style="text-align: justify;">_______________________________________________________________________________________________________________________________________________________________________________________________</p>
<p style="text-align: justify;"><strong>*</strong> Графік руху за маршрутом, аеропорт, дату та час вильоту, тип літака або інші характеристики можуть буди змінені Туроператором.</p>
<p style="text-align: justify;"><strong>**</strong> Поселення та виселення з готелю (звільнення номеру) здійснюється в залежності від часу вильоту літака та з урахуванням розрахункової години, передбаченої готелем за місцевим часом. Турист самостійно сплачує всі витрати, що виникли внаслідок порушення ним розрахункової години.</p>
<p style="text-align: justify;"><strong>***</strong> Додаткові побажання приймаються, але не гарантуються.</p>
<ol style="text-align: justify;" start="3">
<li><strong><u>ВАРТІСТЬ ТУРИСТИЧНИХ ПОСЛУГ </u></strong></li>
</ol>
<p style="text-align: justify;">3.1. Загальна вартість туристичних послуг, замовлених Туристом становить:&nbsp;</p>
<p style="text-align: justify;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
 грн. (<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
).</p>
<p style="text-align: justify;">3.2. Оплата Турпродукту може бути проведена фізичними чи юридичними особами у будь-якій формі, що не суперечить чинному законодавству України. Оплату Турпродукту Турист може здійснити самостійно на розрахунковий рахунок Туроператора. Оплата туристом вартості витрат відповідно до п. 6.1. цього Договору проводиться у безготівковій формі.</p>
<p style="text-align: justify;">3.3. У випадку несплати або неповної оплати Туристом вартості туристичних послуг у строки, передбачені п. 5.2.1. Договору, Турагент має право відмовити Туристу в наданні туристичних послуг, при цьому Турист відшкодовує Турагенту фактично понесені витрати по бронюванню і оформленню туру.</p>
<ol style="text-align: justify;" start="4">
<li><strong><u> ПРАВА СТОРІН</u></strong></li>
</ol>
<p style="text-align: justify;"><strong>4.1. <u>Турагент має право</u>:</strong></p>
<p style="text-align: justify;">4.1.1. Внести зміни у зміст туру та графік руху за маршрутом; змінити аеропорт, дату та час вильоту, тип літака або інші характеристики Турпродукту. У випадку, якщо Турист скористався запропонованими йому альтернативними послугами, послуги за Договором вважаються наданими належним чином.</p>
<p style="text-align: justify;">4.1.2. Змінити вартість туристичного продукту, погодженої Сторонами, при цьому перевищення ціни туристичного продукту не повинно бути більше ніж 5% від його первісної ціни. У разі перевищення ціни туристичного продукту більше ніж 5% первісної ціни турист має право відмовитися від виконання договору, а Турагент зобов'язаний повернути йому всі раніше сплачені кошти.</p>
<p style="text-align: justify;">4.1.3. Замінити замовлений готель або інший об&rsquo;єкт розміщення (в тому числі і під час туру), за умови, що новий готель (об&rsquo;єкт розміщення) буде аналогічного або вищого класу. Категорія готелю визначається офіційними органами країни розташування готелю. В цьому випадку, обов&rsquo;язки Турагента з розміщення Туриста вважаються виконаними і Турист не має права на пред&rsquo;явлення будь-яких претензій щодо умов його розташування та оплати.</p>
<p style="text-align: justify;">4.1.4. Розірвати даний Договір без відшкодування Туристу матеріальних і моральних збитків, у випадку не оформлення в&rsquo;їзних віз Туристу Посольством країни слідування.</p>
<p style="text-align: justify;">4.1.5. Відмовити в наданні туристичних послуг, в разі неповної або несвоєчасної оплати туру. В даному випадку для Туриста настають наслідки передбачені п. 6.1 Договору.</p>
<p style="text-align: justify;"><strong>4.2.</strong> <strong><u>Турист має право</u></strong><strong>:</strong></p>
<p style="text-align: justify;">4.2.1. Отримати туристичні послуги, а також отримувати інформацію, консультації протягом туристичної подорожі.</p>
<p style="text-align: justify;">4.2.2. Відмовитися від замовленого Турпродукту, при цьому сплативши Турагенту реально понесені останнім витрати, пов'язані з виконанням зобов'язань за даним Договором. Заява про відмову Туриста від туристичних послуг в письмовій формі приймається Турагентом до виконання з дня отримання такої заяви. В даному випадку для Туриста настають наслідки передбачені п. 6.1 Договору.</p>
<ol style="text-align: justify;" start="5">
<li><strong><u> ОБОВ&rsquo;ЯЗКИ СТОРІН</u></strong></li>
</ol>
<p style="text-align: justify;"><strong>5.1. <u>Турагент зобов&rsquo;язується</u>:</strong></p>
<p style="text-align: justify;">5.1.1.Надати Туристу повну та достовірну інформацію, передбачену чинним законодавством України та зокрема ст.19<sup>1</sup>,20 Закону України &laquo;Про туризм&raquo;.</p>
<p style="text-align: justify;">5.1.2. Забезпечити бронювання туристичних послуг відповідно до п. 2 Договору.</p>
<p style="text-align: justify;">5.1.3. Організувати оформлення документів.</p>
<p style="text-align: justify;">5.1.4. Забезпечити Туриста необхідними документами: ваучерами, страховими полісами (пам&rsquo;яткою), авіаквитками на авіарейси згідно з графіком відправлення за маршрутом, вказаними у п. 2 Договору.</p>
<p style="text-align: justify;">5.1.5. Негайно інформувати Туриста про зміни в замовлених послугах, при їх наявності.</p>
<p style="text-align: justify;">5.1.6. Перевіряти у Туриста наявність та правильність оформлення необхідних паспортних та візових документів.</p>
<p style="text-align: justify;">5.1.7. Довести до відома Туристів, що строк дії договору страхування починається з дати останніх підтверджених змін до Турпродукту та повної його оплати Турагентом.</p>
<p style="text-align: justify;"><strong>5.2. <u>Турист зобов&rsquo;язується: </u></strong></p>
<p style="text-align: justify;">5.2.1. Оплатити вартість туристичного продукту протягом _________ днів (годин) з моменту підписання даного Договору.</p>
<p style="text-align: justify;">5.2.2. Своєчасно надати документи, які необхідні для оформлення поїздки (Туру). Документи повинні бути оформлені у встановленому законодавством порядку і надані Турагенту не пізніше , ніж за чотирнадцять денів до початку подорожі. Турагент не несе відповідальності за правильність оформлення закордонного паспорту Туриста.</p>
<p style="text-align: justify;">5.2.3. Прибути до аеропорту за дві години до офіційно повідомленого часу вильоту літака.</p>
<p style="text-align: justify;">5.2.4. Дотримуватись вимог чинного законодавства України щодо перетину Державного кордону України, а також прикордонних, митних правил та правил в&rsquo;їзду/виїзду до/з країни тимчасового перебування, санітарних правил; поважати звичаї, традиції місцевого населення, політичний та соціальний лад країни перебування; не порушувати суспільний порядок та вимоги законів, чинних на території країни тимчасового перебування; не порушувати права та законні інтереси інших громадян; дотримуватись правил поведінки на борту літака, дотримуватись правил внутрішнього розпорядку та протипожежної безпеки в місцях розміщення та перебування. Виконувати інші обов&rsquo;язки, передбачені чинним законодавством України та законодавством країни тимчасового перебування.</p>
<p style="text-align: justify;">5.2.5. Оплатити вартість в&rsquo;їзної візи при проходженні паспортного контролю, якщо віза не була оформлена заздалегідь.</p>
<p style="text-align: justify;">5.2.6. У випадку виникнення у Туриста претензій, щодо якості послуг які надаються, Турист зобов&rsquo;язаний негайно в письмовій формі надати претензію представнику сторони, яка приймає, та повідомити про це Турагента протягом доби. Усі пред&cent;явлені претензії Туристів повинні містити: прізвище, ім'я та по-батькові Туриста, період і місце його перебування, а також супроводжуватися актом, складеним Туристом, уповноваженим працівником організації, що надавала послуги Туристу, та завіреним підписом представника Туроператора в країні перебування. Претензії повинні бути направлені Туроператору не пізніше 14 календарних днів із дня закінчення Туру. Разом з претензією Туроператору надається копія Договору Турагента з Туристом, інші документи, що мають відношення до інциденту.</p>
<p style="text-align: justify;">5.2.7. Надати достовірні дані про порушення законодавства, митного та візового режиму, якщо такі мали місце в минулому. В разі виникнення негативних наслідків з причини надання недостовірних, недійсних, невірно оформлених та підроблених даних чи документів і виникнення в зв&rsquo;язку з цим матеріальних збитків Турагента, Турист компенсує всі понесені збитки.</p>
<p style="text-align: justify;">5.2.8. Самостійно сплачувати додаткові послуги, що обрані ним (Туристом) за власним бажанням: транспортні послуги (не передбачені умовами договору), обслуговування за кордоном України (не передбачене умовами договору), а також інші послуги, що не передбачені умовами Договору в місцях проживання та перебування.</p>
<p style="text-align: justify;">5.2.9. Повернутися до України в терміни, передбачені умовами туру та чинною візою.</p>
<p style="text-align: justify;">5.2.10. Виконувати умови та правила, передбачені цим Договором.</p>
<p style="text-align: justify;">5.2.11. Під час здійснення туристичної подорожі, дотримуватись правил особистої безпеки та збереження особистого майна.</p>
<p style="text-align: justify;">5.2.12. Пройти профілактику у відповідності до міжнародних медичних вимог, в разі здійснення подорожі до країни (місця) тимчасового перебування, в якій існує високий ризик захворювання на інфекційну хворобу.</p>
<p style="text-align: justify;">5.2.13. У випадку відмови від цього Договору до початку поїздки сплатити Турагенту грошові кошти згідно з п.4.2.2. цього Договору.</p>
<p style="text-align: justify;">5.2.14. Відшкодувати Турагенту/Туроператору збитки, заподіяні своїми неправомірними діями, у тому числі, але не обмежуючись:</p>
<ul>
<li style="text-align: justify;">через порушення, пов&rsquo;язані з неналежним оформленням документів для перетину Державного кордону України;</li>
<li style="text-align: justify;">через порушення Туристом візового режиму в країні перебування, виплатити Турагенту/Туроператору штрафні санкції імміграційних служб країни перебування Туриста і всі можливі витрати по його депортації.</li>
</ul>
<p>5.2.15 Протягом 14 (чотирнадцяти) календарних днів після повернення з туристичної подорожі в Україну з&rsquo;явитися в офіс ТУРАГЕНТА для підписання Акту наданих послуг. При не з&rsquo;явленні для підписання Акту&nbsp; або ненадання обґрунтованої відмови від підписання, Акт вважається таким, що прийнятий без зауважень та підписаний двома Сторонами.</p>
<ol style="text-align: justify;" start="6">
<li><strong><u>ВІДПОВІДАЛЬНІСТЬ СТОРІН</u></strong></li>
</ol>
<p style="text-align: justify;">6.1. За відмову Туриста від Турпродукту (частково або повністю) з будь-яких причин, Турист зобов&rsquo;язується сплатити Турагенту витрат за послуги, понесені останнім у зв&rsquo;язку з виконанням замовлення Туриста.</p>
<p style="text-align: justify;">6.2. Якщо до складу Туру входить в&rsquo;їзна віза то, на доповнення до п. 6.1, настає додаткова відповідальність за відмову від Туру:</p>
<p style="text-align: justify;">- якщо документи Туриста не надавались до посольства, вартість послуг з оформлення візи повертається в повному обсязі;</p>
<p style="text-align: justify;">- якщо до моменту відмови від туру віза проставлена в паспорті, вартість фактичних витрат з її оформлення не повертається.</p>
<p style="text-align: justify;">6.3. Зміна умов Туру за ініціативою Туриста після його сплати, а також несвоєчасне надання Туристом Турагенту необхідних документів прирівнюється до відмови від туру і породжує наслідки, передбачені п.6.1 даного Договору.</p>
<p style="text-align: justify;">6.4. Турист несе відповідальність за пошкодження майна або здійснення протиправних дій під час поїздки, згідно з чинним законодавством країни тимчасового перебування.</p>
<p style="text-align: justify;">6.5. Турагент/Туроператор не несе відповідальності та не сплачує будь-які компенсації за можливі порушення та дії, які не належать до його компетенції, а саме:</p>
<p style="text-align: justify;">- за зміну розкладу, відміну, затримку авіарейсу, заміну літака одного типу на інший, закриття аеропортів, з метеорологічних, технічних та інших причин, що призвело до зміни програми Туру, за транспортне перевезення Туриста, збереження документів та особистих речей Туриста, втрату або псування багажу під час перевезення. В даному випадку відповідальність за вищевикладене несе Перевізник. Взаємовідносини між пасажиром (Туристом) та Перевізником регулюються договором на перевезення, підтвердженням якого є виданий Туристу квиток, згідно чинного законодавства України;</p>
<p style="text-align: justify;">- за неможливість здійснення Туристом подорожі, перенесення її на більш пізніші терміни, призупинення подорожі, шкоду, що викликана діями консульської, митної та імміграційної служб України та зарубіжних країн;</p>
<p style="text-align: justify;">- відшкодування витрат при настанні страхових випадків, що передбачені договором страхування. При настанні страхового випадку Турист зобов&rsquo;язаний діяти у відповідності до інструкції, яка викладена у страховому полісі (пам&rsquo;ятці);</p>
<p style="text-align: justify;">- за готельне обслуговування (несмачна їжа, висока вартість додаткових послуг, відключення води та електропостачання, прибирання кімнат і території та таке інше) та негативні наслідки споживчих послуг, самостійно придбаних туристом у будь-яких суб&rsquo;єктів ринку туристичних послуг у країні перебування/відпочинку туриста.</p>
<p style="text-align: justify;">6.6. Турагент/Туроператор не приймає претензії та не несе відповідальності по претензіях, які пов&rsquo;язані з деякими відхиленнями щодо обслуговування, яке надають готелі, мотелі, пансіонати (несмачна їжа, висока вартість додаткових послуг, відключення води та електропостачання, прибирання кімнат і території та таке інше) та негативними наслідками споживчих послуг, самостійно придбання туристом у будь-яких суб&rsquo;єктів ринку туристичних послуг у країні перебування/відпочинку туриста.</p>
<p style="text-align: justify;">6.7. У випадку порушення Туристом програми обслуговування, норм та правил поведінки в країні перебування, правил митного та прикордонного контролю, правил поведінки на борту літака, транспортних перевезень (порушення правопорядку у стані алкогольного або наркотичного сп&rsquo;яніння), а також порушення інших загальноприйнятих правил поведінки, що стало причиною зняття Туриста з рейсу, затримки компетентними органами, доставлення (перебування) Туриста до (в) медичних закладів країни перебування, з вищевказаних причин, що призвело до додаткових матеріальних витрат Туриста, Турагент/Туроператор не несе відповідальності, вартість Туру не повертається, будь-які інші компенсації не виплачуються.</p>
<p style="text-align: justify;">6.8. За невиконання або неналежне виконання умов даного Договору, винна Сторона сплачує іншій Стороні завдані цим, документально підтверджені збитки.</p>
<p style="text-align: justify;">6.9. У випадку анулювання подорожі з вини Турагента Туристу повертається повна вартість сплачених останнім послуг протягом 14 днів.</p>
<p style="text-align: justify;">6.10. Турагент/Туроператор не несе відповідальності по відшкодуванню матеріальних затрат Туриста за сплачені туристичні послуги, якщо Турист під час туристичної подорожі, керуючись особистими інтересами, не скористався всіма або частиною наданих Турагентом туристичних послуг, достроково припинив термін перебування в Турі.</p>
<p style="text-align: justify;">6.11. Турагент/Туроператор (сторона яка приймає Туриста в країні тимчасового перебування), не несуть відповідальності за втрату, пропажу цінностей, документів, особистих речей Туриста під час здійснення туристичної подорожі.</p>
<p style="text-align: justify;">6.12. Турист, що підписав Договір, представляє інтереси всіх туристів, про яких зроблене замовлення, несе відповідальність перед Турагентом та цими туристами, за вибір послуг, правильність повідомлених даних, своєчасну оплату послуг та виплату штрафів, в разі відмови від подорожі.</p>
<p style="text-align: justify;">6.13. Турагент/Туроператор не несе відповідальності за рішення (дії) прикордонних, митних служб країн, через (до) які (яких) подорожує Турист, а також інших установ щодо неможливості в&rsquo;їзду Туриста або осіб що подорожують разом з ним, відповідно до умов цього Договору та заявки, на територію цих країн. В даному випадку Турист самостійно сплачує витрати пов&rsquo;язані з депортацією (вартість транспортного перевезення, адміністративні штрафи, пеня та інші платежі). Будь-які компенсації не виплачуються.</p>
<p style="text-align: justify;">6.14. У випадку відмови в&rsquo;їзду на територію країни туристичної подорожі одному із туристів, що подорожує групою, відповідно до умов цього Договору з причин передбачених п. 6.13 Договору, Договір не припиняється для інших туристів в групі (такі туристи продовжують подорож відповідно до умов Договору). В даному випадку претензії на дії відповідних органів країн подорожі для розгляду не приймаються, компенсації не виплачуються.</p>
<p style="text-align: justify;">6.15. Турагент не несе відповідальності за неналежне виконання умов Договору, якщо це сталося внаслідок надання Туристом Турагенту документів та недостовірних відомостей (неповнота, недостовірність, неправильність оформлення документів та ін.).</p>
<p style="text-align: justify;">6.16. У випадку невиїзду Туриста внаслідок втрати документів, запізнення на рейс на початку та в кінці туристичної подорожі з причин особистого характеру та ін., Турагент/Туроператор не несе відповідальності і компенсації не сплачує.</p>
<p style="text-align: justify;">6.17. Турагент/Туроператор не несе відповідальність за будь-які незручності, завдані Туристу в зв'язку з проведенням на території країни перебування будівельних та ремонтних робіт, які відбуваються за рішенням або з відома місцевих влад будь-якими державними або приватними особами.</p>
<p style="text-align: justify;">6.18. При порушенні Туристом Правил перевезення пасажирів та багажу, до нього (Туриста) застосовуються штрафні санкції передбачені Перевізником.</p>
<p style="text-align: justify;">6.19. Зміна або заміна будь-яких даних Туриста тягне за собою зміну умов попереднього бронювання (вартість туру й т.п.). У випадку внесення будь-яких змін до документів, виправлення неточностей у записах документах Туриста, останній погоджується з усіма додатковими оплатами.</p>
<p style="text-align: justify;">6.20. У випадку невиконання зобов'язань по оплаті Туру (п. 5.2.1) Турист зобов'язаний сплатити Турагенту пеню в розмірі 0.3% від вартості Туру (п. 3.1), за кожен день прострочки платежу до моменту сплати.</p>
<p style="text-align: justify;">6.21. Турагент не несе відповідальність за підвищення вартості авіаквитків та зобов&rsquo;язується інформувати Туриста про зміну вартості авіаквитків, відразу після отримання інформації від Туроператора.</p>
<ol style="text-align: justify;" start="7">
<li><strong><u> ПОРЯДОК ВИРІШЕННЯ СУПЕРЕЧОК</u></strong></li>
</ol>
<p style="text-align: justify;">7.1. Всі суперечки, які можуть виникнути в ході виконання даного Договору, Сторони зобов&rsquo;язуються вирішувати шляхом переговорів, а у випадку недосягнення згоди &ndash; згідно чинного законодавства України.</p>
<p style="text-align: justify;">7.2. У випадку визнання претензій Туриста та відшкодування йому з боку Турагента спричиненої шкоди, Турист підписує відповідні фінансові документи про це, а також письмову заяву про відмову від пред&rsquo;явлення майнових та інших претензій до Турагента.</p>
<ol style="text-align: justify;" start="8">
<li><strong><u> ДОДАТКОВІ УМОВИ</u></strong></li>
</ol>
<p style="text-align: justify;">8.1. Заміна готелю або номеру за власним бажанням Туриста може бути здійснена тільки за додаткову плату.</p>
<p style="text-align: justify;">8.2. В разі задоволення претензій з якими звертається Турист в країні перебування, відповідно до п. 5.2.6, шляхом надання альтернативних послуг, і турист ними не скористався, то вважається що Турагент і сторона, яка приймає, виконали свої зобов&rsquo;язання належним чином і претензії по тому ж самому питанню до розгляду не приймаються.</p>
<p style="text-align: justify;">8.3. Претензії та заяви Турагент приймає безпосередньо від особи, що підписала Договір.</p>
<p style="text-align: justify;">8.4. Претензії стосовно клімату, місцевих традицій, тривалості авіаперельоту до розгляду не приймаються.</p>
<p style="text-align: justify;">8.5. У випадку настання страхового випадку, претензії по збитках Турист пред&rsquo;являє в страхову компанію, вказану в страховому полісі (пам&rsquo;ятки).</p>
<p style="text-align: justify;">8.6. Адміністрація готелів країни перебування може тимчасово змінювати склад устаткування номерів, змінювати харчування, особливо на початку та в кінці сезону. Деякі розваги, що рекламуються, враховуючи використання спортивного устаткування, можуть бути оплатними. Устаткування, що зображене на рекламних фотографіях, необов&rsquo;язково може бути в наявності протягом сезону. Турагент не володіє інформацією про можливі плани адміністрації готелів щодо проведення будівельних та ремонтних робіт в курортній зоні.</p>
<p style="text-align: justify;">8.7. Квитки, які придбані за чартерною програмою поверненню не підлягають.</p>
<p style="text-align: justify;">8.8. Для зміни зворотної дати вильоту за чартерною програмою Турист має звернутись до гіда в країні перебування за придбанням нового квитка на іншу дату вильоту. Вартість невикористаного квитка не повертається.</p>
<p style="text-align: justify;">8.9. Зміна умов Туру тягне за собою скасування попереднього замовлення та подання нового. В даному випадку Турист сплачує штраф передбачений п. 6.1 Договору.</p>
<p style="text-align: justify;">8.10. Підписанням даного договору Турист, враховуючи вимоги Закону України &laquo;Про захист персональних даних&raquo;, підтверджує та надає Туроператору та Турагенту згоду на обробку його персональних даних (та персональних даних будь-яких фізичних осіб, що слідують з ним), які були або будуть передані Туроператору та Турагенту у зв&rsquo;язку або на виконання даного договору та замовлення туру. Турист засвідчує і гарантує , що він має всі необхідні правові підстави для передачі вищезгаданих персональних даних Туроператору та Турагенту для їх подальшої обробки з метою організації та надання Туристу будь-яких туристичних послуг, без будь-якого обмеження строком та способом, у т.ч. для їх використання і поширення, зміни, передачі чи надання доступу до них третім особам у випадках, передбачених чинним законодавством України, а також для передачі Туроператором та Турагентом персональних даних для обробки третім особам та здійснення відносно них будь-яких інших дій, якщо це пов&rsquo;язано із захистом прав Туроператора та Турагента за ними, або якщо це необхідно для реалізації Туроператором та Турагентом прав та обов&rsquo;язків, передбачених законом.</p>
<p style="text-align: justify;">Право визначення об&rsquo;єму обробки персональних даних Турист надає Туроператору та Турагенту.</p>
<p style="text-align: justify;">Турист звільняє Туроператора та Турагента від будь-якої відповідальності, у тому числі за будь-яку моральну шкоду, майнові збитки, неотриманні доходи (вигоду), завдані будь-яким особам внаслідок будь-яких суперечок,претензій, вимог або судових спорів щодо або у зв&rsquo;язку з персональними даними. Турист приймає на себе повну відповідальність перед такими третіми особами, у тому числі за відшкодування збитків та шкоди.</p>
<p style="text-align: justify;">Турист зобов&rsquo;язується відшкодувати Туроператору та Турагенту будь-які майнові збитки, моральну шкоду, неотриманні доходи (вигоди), в т.ч. судові витрати та витрати на консультаційні послуги, що виникли внаслідок порушення Туристом зазначених вище засвідчень і гарантій, або у разі задоволення судом позову до Туроператора та Турагента про відшкодування збитків або шкоду у зв&rsquo;язку з переданими Туристом персональними даними.</p>
<p style="text-align: justify;">Вищенаведені зобов&rsquo;язання, засвідчення і гарантії є необмеженими строком, вони є безумовними і безвідкличними.</p>
<ol style="text-align: justify;" start="9">
<li><strong><u> ФОРС-МАЖОРНІ ОБСТАВИНИ</u></strong></li>
</ol>
<p style="text-align: justify;">9.1. Сторони звільняються від майнової відповідальності за невиконання зобов&cent;язань, передбачених Договором, при виникненні форс-мажорних обставин, а саме:</p>
<p style="text-align: justify;">- Повінь, землетрус, цунамі, епідемії й інші стихійні явища природи;</p>
<p style="text-align: justify;">- Пожежі, вибухи, виходи з ладу чи ушкодження комп&rsquo;ютерної техніки, каналів зв&rsquo;язку, транспортних засобів;</p>
<p style="text-align: justify;">- Страйк, саботаж, локаут і інші непередбачені ситуації, що безпосередньо вплинули на виконання умов даного Договору та унеможливлюють це;</p>
<p style="text-align: justify;">- Оголошена чи неоголошена війна, революція, масові безладдя;</p>
<p style="text-align: justify;">- Законні чи незаконні дії органів державної влади.</p>
<p style="text-align: justify;">9.2. Сторона, для якої створилася неможливість виконання прийнятих на себе зобов'язань, внаслідок дії форс-мажорних обставин, зобов'язана протягом 24 годин в письмовій формі повідомити іншу Сторону про час настання і припинення дії даних обставин.</p>
<p style="text-align: justify;">9.3. Належним доказом настання форс мажорних обставин та терміну їхньої дії є наявність довідки, виданої відповідними компетентними органами відповідної країни.</p>
<p style="text-align: justify;"><strong><u>10.РОЗІРВАННЯ, ЗМІНИ ТА ДОПОВНЕННЯ ДОГОВОРУ</u></strong></p>
<p style="text-align: justify;">10.1. Кожна зі сторін Договору може вимагати розірвання Договору або внесення змін та доповнень до нього в зв&rsquo;язку з істотними змінами обставин, з яких вони виходили при укладенні Договору. Побажання Туриста щодо змін умов Туру, або про відмову від туру приймаються до розгляду в письмовій формі.</p>
<p style="text-align: justify;">10.2. Турист вправі відмовитись від виконання Договору до початку туристичної подорожі за умови сплати Турагенту фактичних витрат в повному обсязі за послуги, які були надані до отримання повідомлення про відмову, а також сплати штрафних санкцій у відповідності до п. 6.1 Договору.</p>
<p style="text-align: justify;">10.3. Турагент вправі відмовитись від виконання Договору тільки за умови повного відшкодування Туристу вартості сплаченого ним Туру.</p>
<p style="text-align: justify;">10.4. Турагент вправі розірвати Договір при невиконанні Туристом умов передбачених п. 5.2.1 Договору.</p>
<p style="text-align: justify;">10.5. Всі зміни та доповнення до Договору укладаються в письмовій формі за взаємною згодою та підписами Сторін.</p>
<p style="text-align: justify;"><strong><u>11.ЗАКЛЮЧНІ ПОЛОЖЕННЯ</u></strong></p>
<p style="text-align: justify;">11.1. Факт підписання Договору свідчить про те, що Турист отримав інформацію щодо туристичного обслуговування за Договором в повному обсязі, яка була йому надана у відповідності з вимогами Закону України &laquo;Про туризм&raquo;, законодавства про захист прав споживачів.</p>
<ol style="text-align: justify;" start="12">
<li><strong><u> СТРОК ДІЇ ДОГОВОРУ</u></strong></li>
</ol>
<p style="text-align: justify;">12.1. Даний Договір набирає чинності з моменту підписання його сторонами і діє до моменту виконання сторонами своїх зобов&rsquo;язань.</p>
<p style="text-align: justify;">12.2. Зобов&rsquo;язання Турагента щодо виконання умов Договору виникає тільки після сплати Туристом вартості туристичного обслуговування в повному обсязі та надання всіх необхідних для оформлення туристичної подорожі документів та відомостей.</p>
<pre>&lt;div style="page-break-before: always;"&gt;</pre>
<p style="text-align: justify;">12.3. Даний Договір укладений в двох примірниках українською мовою, що мають однакову юридичну силу, по одному примірнику для кожної Сторони.</p>
<ol style="text-align: justify;" start="13">
<li><strong><strong><u> АДРЕСИ СТОРІН</u></strong></strong>
<table>
<tbody>
<tr>
<td width="340">
<p style="text-align: center;"><strong>Турагент:</strong></p>
</td>
<td width="369">
<p style="text-align: center;"><strong>Турист: &nbsp;</strong></p>
</td>
</tr>
<tr>
<td width="340">
<p>&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
</p>
<p>ТРЦ "Караван"</p>
<p>рах. № 26004052328313</p>
<p>у ПАТ КБ "ПРИВАТБАНК"</p>
<p>МФО 351533</p>
<p>ЄДРПОУ 2875914543</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeMobile'];?>
</p>
<p><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeEmail'];?>
</p>
<p>http://zamir.in.ua/</p>
</td>
<td width="369">
<p><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p>Паспорт:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
, виданий&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedBy'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedDate'];?>
</p>
<p>Адреса реєстрації: <?php echo $_smarty_tpl->tpl_vars['data']->value['Address'];?>
</p>
<p>Номер телефону: <?php echo $_smarty_tpl->tpl_vars['data']->value['PhoneMob'];?>
</p>
<p>Електронна пошта: <?php echo $_smarty_tpl->tpl_vars['data']->value['EmailHome'];?>
</p>
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="340">
<p>&nbsp;</p>
<p>______________________/Саввіна Христина Борисівна</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>______________________/Менеджер:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ManagerName'];?>
</p>
</td>
<td width="369">
<p>&nbsp;</p>
<p>______________________/<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
</td>
</tr>
</tbody>
</table>
</li>
</ol>
<p style="text-align: justify;"><strong>&laquo;Мною отримана вся необхідна інформація, передбачена законом України &laquo;Про туризм&raquo; та всі необхідні документи, для туристичної подорожі&raquo;.</strong></p>
<p style="text-align: justify;">_____________________________________ &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <em>(П.І.Б., підпис Туриста)</em></p><?php }
}
