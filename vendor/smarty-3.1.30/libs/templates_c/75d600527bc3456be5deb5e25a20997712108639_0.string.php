<?php
/* Smarty version 3.1.30, created on 2020-06-19 19:14:17
  from "75d600527bc3456be5deb5e25a20997712108639" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5eece459ee5a49_17514868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eece459ee5a49_17514868 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p class="western" align="center"><span style="font-size: 10pt;"><span lang="uk-UA"><strong>Договір Турагента з Замовником турпослуг/Туристом про надання </strong></span></span></p>
<p class="western" align="center"><span style="font-size: 10pt;"><span lang="uk-UA"><strong>інформаційно-консультаційних та посередницьких послуг </strong></span><span style="color: #000000;"><span lang="uk-UA">№ <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</span></span></span></p>
<p class="western" lang="uk-UA">&nbsp;</p>
<blockquote>
<p class="western" align="justify"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
</span></p>
</blockquote>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<blockquote>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
, надалі ТУРАГЕНТ (розмір фінансової гарантії відповідальності Турагента складає еквівалент суми 2000 євро, яка надана АТ "Комерційний Банк "Глобус", згідно Договору про надання банківської гарантії виконання зобов&rsquo;язань № 14463/ЮГ-19 від 15 липня 2019 р.), в особі <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
, що діє на підставі запису в ЄДР, та за дорученням ТОВ &laquo;Пегас Туристик&raquo; (надалі &ndash; ТУРОПЕРАТОР. Ліцензія туроператора AE №185517 від 19.10.2012 р. Банківська гарантія на 20000 євро видана ПАТ &laquo;Кредит Європа Банк&raquo; строком до 22.10.2020 р.) та на підставі Агентського договору з ТУРОПЕРАТОРОМ, з одного боку та ЗАМОВНИК <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&nbsp;</span><span lang="uk-UA">, з іншого боку (надалі &ndash; ТУРИСТ) разом поіменовані Сторони, уклали цей Договір про наступне:</span></span></p>
</blockquote>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>1. ПРЕДМЕТ ДОГОВОРУ</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">1.1. ТУРАГЕНТ, на підставі замовлення ТУРИСТА, за встановлену цим Договором плату, зобов&rsquo;язується надати консультаційно-інформаційні послуги в сфері туризму, з метою придбання ТУРИСТОМ туристичних послуг, сформованих ТУРОПЕРАТОРОМ, для споживання ТУРИСТОМ та/або вказаних ним осіб, а ТУРИСТ зобов&rsquo;язується сплатити вартість послуг ТУРАГЕНТА і суму для розрахунку з ТУРОПЕРАТОРОМ та/або іншими надавачами туристичних послуг. </span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>2. ЗАМОВЛЕННЯ НА ПРИДБАННЯ ТУРПОСЛУГ</strong></span></span></p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"><strong>2.1. Туристична подорож здійснюється у складі (вказуються кількість туристів та відомості про них; при подорожі туриста/ів з дітьми, дата народження дитини вказується обов&rsquo;язково</strong></span></span>):</span></p>
<p><span style="font-size: 10pt;"> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
 </span></p>
<table>
<thead>
<tr>
<th><span style="font-size: 10pt;">Имя</span></th>
<th><span style="font-size: 10pt;">Фамилия</span></th>
<th><span style="font-size: 10pt;">Дата рождения</span></th>
<th><span style="font-size: 10pt;">Тип документа</span></th>
<th><span style="font-size: 10pt;">First Name</span></th>
<th><span style="font-size: 10pt;">Last Name</span></th>
<th><span style="font-size: 10pt;">Серия номер</span></th>
<th><span style="font-size: 10pt;">Действующий</span></th>
</tr>
</thead>
<tbody>
<tr>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['DateBirth'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
</span></td>
<td><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
</span></td>
</tr>
</tbody>
</table>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.2. Країна та місце призначення:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="5">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.3. Термін подорожі:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr valign="bottom">
<td width="319" height="5">
<p><span style="font-size: 10pt;">з <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
</span></p>
</td>
<td width="319">
<p><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">по <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
</span></span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.4. Транспортне обслуговування*:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="6">
<p lang="uk-UA"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
, (<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightA'];?>
;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightB'];?>
)</span></p>
</td>
</tr>
<tr>
<td valign="top" width="653">
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Вид транспортного засобу (літак, потяг, автобус, автомобіль); маршрут. *Графік руху за маршрутом; аеропорт, дата та час вильоту, тип літака або інші характеристики можуть буди змінені Туроператором.</span></span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.5. Розміщення в готелі (в т.ч. транзитне):</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="6">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</span></p>
</td>
</tr>
<tr>
<td valign="top" width="653">
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">вказується: назва готелю; категорія; тип номеру; розміщення. В разі обрання подорожі за системою &laquo;Рулетка&raquo;, вказується назва &laquo;</span></span><span style="font-family: Arial, sans-serif;"><span lang="en-US">Roulette</span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">&raquo; та категорія без назви готелю</span></span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.6. Термін проживання у готелі: </span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr valign="bottom">
<td width="319" height="6">
<p><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">з**:</span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"> <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
</span></span></span></p>
</td>
<td width="319">
<p><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">по**: <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
</span></span></span></p>
</td>
</tr>
<tr>
<td colspan="2" valign="bottom" width="653">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;">** Поселення та виселення з готелю (звільнення номеру) здійснюється в залежності від часу вильоту літака та з урахуванням розрахункової години, що встановлена у готелі.</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.7. Трансфер:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="6">
<p lang="uk-UA"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['TransferName'];?>
</span></p>
</td>
</tr>
<tr>
<td valign="top" width="653">
<p lang="uk-UA" align="justify"><span style="font-family: Arial, sans-serif; font-size: 10pt;">VIP, індивідуальний, груповий, без трансферу, між готелями</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.8. Харчування:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="6">
<p lang="en-US"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</span></p>
</td>
</tr>
<tr>
<td valign="top" width="653">
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">NO, BB, HB, </span></span><span style="font-family: Arial, sans-serif;"><span lang="en-US">FB, </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">AI, UAI, інше</span></span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><strong>2.9. Страхування:</strong> <input checked="checked" type="checkbox" /> З послугою страхування (заповнити форму) <input type="checkbox" /> Без страхування (в разі наявності свого страхового полісу. Вказати в п..2.10)</span></p>
<center>
<table width="665" cellspacing="0" cellpadding="7">
<tbody>
<tr valign="bottom">
<td width="273" height="6">
<p align="center"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['Insurance'];?>
</span></p>
</td>
<td width="94">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><span style="font-family: Arial, sans-serif;">____________</span>&nbsp;</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><span style="font-family: Arial, sans-serif;">____________</span>&nbsp; &nbsp; &nbsp;</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">____________</span></p>
</td>
</tr>
<tr valign="top">
<td width="273">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">Назва страхової компанії</span></p>
</td>
<td width="94">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">зона дії</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">покриття по</span></p>
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">медичних витратах</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">покриття по</span></p>
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">нещасному випадку</span></p>
</td>
<td width="76">
<p lang="uk-UA" align="center"><span style="font-family: Arial, sans-serif; font-size: 10pt;">франшиза</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p align="center"><span style="font-family: 'Courier New', monospace; font-size: 10pt;"><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"><input type="checkbox" /> </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Активний відпочинок</span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"> <input type="checkbox" /> </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Візовий ризик</span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"> <input type="checkbox" /> </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Страхування фінансових ризиків</span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"> <input type="checkbox" /> </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Громадянська відповідальність </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA"><input type="checkbox" /> </span></span><span style="font-family: Arial, sans-serif;"><span lang="uk-UA">Інше (вказати)</span></span> <span style="font-family: Arial, sans-serif;"><span lang="uk-UA">&ensp;&ensp;&ensp;&ensp;&ensp;</span></span></span></p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: 'Courier New', monospace; font-size: 10pt;">2.10. Додаткові послуги або інші умови подорожі:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="5">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['AdditionalServices'];?>
</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="en-US" align="justify">&nbsp;</p>
<p align="justify"><span style="font-family: Arial, sans-serif; font-size: 10pt;"><strong><span lang="en-US">2</span><span lang="uk-UA">.1</span><span lang="en-US">1</span><span lang="uk-UA">. Загальна вартість туристичних послуг, замовлених Туристом</span>, <span lang="uk-UA">на дату підписання цього договору становить: </span></strong></span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr valign="bottom">
<td width="93" height="6">
<p><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
</span></p>
</td>
<td width="546">
<p><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
</span></p>
</td>
</tr>
<tr valign="bottom">
<td width="93">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;">Вартість цифрами в грн..</span></p>
</td>
<td width="546">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;">Вартість прописом у грн.</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;">що складає:</span></p>
<center>
<table width="667" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td valign="bottom" width="653" height="6">
<p><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumEquivalent'];?>
</span></p>
</td>
</tr>
<tr>
<td valign="top" width="653">
<p lang="uk-UA"><span style="font-family: Arial, sans-serif; font-size: 10pt;">за комерційним курсом ТУРОПЕРАТОРА, який наведений на сайті www.pegast.com.ua</span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p class="western" lang="uk-UA" align="center">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>3. ПРАВА ТА ОБОВ&rsquo;ЯЗКИ СТОРІН</strong></span></span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>3.1. ТУРАГЕНТ зобов&rsquo;язується:</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.1. Інформувати ТУРИСТА про: основні вимоги пропонованих до оформлення виїзних/в&rsquo;їзних документів та правила в&rsquo;їзду до країни тимчасового перебування; медичні застереження стосовно здійснення туристичної поїздки; місцезнаходження, поштові реквізити ТУРОПЕРАТОРА; умови перебування в країні тимчасового перебування туриста; характеристику готелів, у тому числі відомості про правила тимчасового перебування; умови обов&rsquo;язкового страхування; розміри фінансового забезпечення; строки і порядок оплати готельного обслуговування; програму туру та можливі зміни в програмі; дату і час початку та закінчення туристичного обслуговування; ціну і порядок здійснення оплати; характеристику транспортних засобів, що здійснюють перевезення; місце перебування організації, уповноваженої ТУРОПЕРАТОРОМ на прийняття претензій ТУРИСТІВ.<br />3.1.2. Ознайомити ТУРИСТА із звичаями місцевого населення, з їх релігійними віруваннями, пам'ятниками архітектури, природи, історії, культури тощо. Проінформувати про стан навколишнього середовища, про санітарно-епідеміологічні правила перебування в країні (місці) подорожі, шляхом передачі йому Пам&rsquo;ятки туриста при відвідуванні країни до якої здійснюється подорож/тур та т. і.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.3. Направити ТУРОПЕРАТОРУ замовлення (у складі договору або окремим листом) на придбання туристичних послуг, складене у відповідності до отриманого від ТУРИСТА завдання. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.4. Після підтвердження ТУРОПЕРАТОРОМ готовності (згоди) надати замовлені туристичні послуги, ТУРАГЕНТ зобов&rsquo;язаний повідомити про це ТУРИСТА. При неможливості для ТУРОПЕРАТОРА надати вказані послуги, ТУРАГЕНТ має право запропонувати ТУРИСТУ альтернативний туристичний продукт. Якщо нова пропозиція не влаштує ТУРИСТА, він має право відмовитися від неї і вимагати повернення сплачених коштів.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.5. Передати ТУРИСТУ, отримані від ТУРОПЕРАТОРА:туристичний ваучер, страховий поліс, авіаквитки тощо.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.6. Проінформувати ТУРИСТА про те, що ТУРОПЕРАТОР має право змінити замовлений готель за умови, що інший готель буде аналогічної або вищої категорії сервісного чи цінового обслуговування, згідно з інформацією про готелі, яка надається уповноваженим органом країни його знаходження або адміністрацією готелю.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.1.7. Перерахувати ТУРОПЕРАТОРУ вартість туристичних послуг, сплачених ТУРИСТОМ, на умовах та в строки, встановлені ТУРОПЕРАТОРОМ. </span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>3.2. ТУРАГЕНТ має право:</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.2.1. Змінити ціну туристичного продукту у випадку та у розмірі, дозволеному чинним законодавством, але не більше ніж на 5% від початкової ціни туру. У випадку зміни вартості туристичних послуг, ТУРИСТ має право відмовитись та вимагати повернення раніше сплачених коштів.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.2.2. При несплаті (неповній оплаті) ТУРИСТОМ зробленого замовлення (бронювання) в обумовлені строки, ТУРАГЕНТ має право анулювати таке замовлення на умовах цього Договору.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>3.3. ТУРИСТ зобов&rsquo;язаний:</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.3.1. Своєчасно надати документи, необхідні для оформлення туру (поїздки), і сплатити вартість замовленого туру одразу або частинами. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.3.2. Виконувати митні, прикордонні та санітарно-епідеміологічні правила України та країн тимчасового перебування.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.3.3. Поважати політичний та соціальний устрій, традиції, звичаї, релігійні вірування країни (місцевості) перебування. Не порушувати громадський порядок, дотримуватись законів, що діють в країні перебування.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.3.4. Дотримуватись правил внутрішнього розпорядку та протипожежної безпеки в місцях проживання і перебування; правил поведінки та вимог щодо збереження об&rsquo;єктів історії і культури, природи в країні туру.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.3.5. Повідомити представника ТУРОПЕРАТОРА в країні тимчасового перебування про факт ненадання чи неналежного надання туристичних послуг, якщо безпосередній надавач послуг (готель, авіаперевізник, страхова тощо) упродовж 2-х діб з моменту виникнення претензій, не усунув недоліки, що стали причиною претензій. </span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>3.4. ТУРИСТ має право:</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.4.1. Отримати інформацію, консультацію щодо послуг, які надаються за цим Договором.</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"><span lang="uk-UA">3.4.2.</span></span> <span style="color: #000000;"><span lang="uk-UA">Отримати комплекс придбаних туристичних послуг.</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"><span lang="uk-UA">3.4.3.</span></span> <span style="color: #000000;"><span lang="uk-UA">Отримати медичну допомогу у разі захворювання відповідно до умов страхування.</span></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">3.4.4. Відмовитися від туристичних послуг на умовах цього Договору і Додатку №1 до нього, подавши ТУРАГЕНТУ письмове повідомлення про відмову від замовлення. </span></span></p>
<p class="western" lang="uk-UA" align="center">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>4. ВІДПОВІДАЛЬНІСТЬ СТОРІН</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.1. При невиконанні або належному виконанні умов договору з вини ТУРОПЕРАТОРА, він несе майнову відповідальність перед ТУРИСТОМ. Розмір такої відповідальності обмежена сумою, яку ТУРИСТ сплатив ТУРОПЕРАТОРУ.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.2. У випадку ненадання з вини ТУРОПЕРАТОРА підтвердженого та оплаченого туристичного продукту, останній компенсує вартість ненаданого турпродукту (його частини) шляхом надання іншої турпослуги (туру), або повертає вартість ненаданих послуг.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.3. Якщо в порушенні умов договору винен ТУРАГЕНТ, то зазначена відповідальність лежить на ТУРАГЕНТІ. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.4. При відмові від замовлених послуг, ТУРИСТ зобов&rsquo;язаний відшкодувати витрати, понесені ТУРОПЕРАТОРОМ і ТУРАГЕНТОМ на виконання його замовлення. Розмір таких витрат стягується у формі неустойки і збитків, що вираховуються на дату ануляції туру згідно з Додатком №1 до цього Договору, який є його невід&rsquo;ємною частиною. Після настання календарної дати завершення туру, ТУРОПЕРАТОР здійснює підрахунок витрат, фактично понесених на виконання замовлення, що було анульоване. Якщо розмір цих витрат виявиться меншим за суму, утриману ТУРОПЕРАТОРОМ при ануляції замовлення (туру), ТУРОПЕРАТОР упродовж місяця поверне ТУРИСТУ надлишково утримані кошти. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.5. ТУРАГЕНТ не несе відповідальності:</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;">- </span><span style="color: #000000;"><span lang="uk-UA">за відмову іноземного посольства (консульства) у наданні віз ТУРИСТУ за маршрутом туру згідно цього Договору, якщо у встановлені посольством (консульством) терміни ТУРАГЕНТ подав усі необхідні документи до посольства (консульства);</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за відміну або зміну часу відправлення і прибуття транспортних засобів і пов&rsquo;язаними з цим змінами об&rsquo;єму і строків туристичних послуг, зміну типу літака, аеропорту вильоту/прильоту тощо. У цих випадках відповідальність перед ТУРИСТОМ, згідно Правил пасажирських авіаперевезень, несуть Туроператор та/або Авіаперевізники;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;">- </span><span style="color: #000000;"><span lang="uk-UA">за якість самостійно придбаних ТУРИСТОМ послуг чи товарів;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;">- </span><span style="color: #000000;"><span lang="uk-UA">за збереження багажу, цінностей і документів ТУРИСТА упродовж всього періоду туру і на транспорті;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;">- </span><span style="color: #000000;"><span lang="uk-UA">за правильність оформлення закордонного паспорта ТУРИСТА; ТУРИСТ несе відповідальність за дійсність та достовірність документів, що він надає, та інформації, а також за негативні наслідки, що виникли недостовірністю останніх;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за збитки, що виникли у ТУРИСТА, пов&rsquo;язані з його діями (бездіяльністю), до яких зокрема відносяться: неприбуття чи запізнення до місця надання туристичної послуги, несвоєчасне чи неповне надання інформації, необхідної для оформлення документів, що дають право на в&rsquo;їзд (виїзд) в країну (з країни), перебування в стані алкогольного чи наркотичного сп&rsquo;яніння, тощо;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за дії прикордонних, митних та інших офіційних служб України та інших країн, які відвідує або перетинає ТУРИСТ. У випадку конфлікту ТУРИСТА з цими службами, вартість сплачених ТУРИСТОМ послуг не повертається;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">якщо послуги</span></span><span style="color: #000000;">, </span><span style="color: #000000;"><span lang="uk-UA">що надаються згідно цього Договору, не відповідають попереднім уявленням ТУРИСТА про них, а також</span></span><span style="color: #000000;"> у раз</span><span style="color: #000000;"><span lang="uk-UA">і настання погодних умов, що завадили ТУРИСТУ скористатися замовленими послугами;</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за якість послуг, що входять до складу турпродукту, сформованого ТУРОПЕРАТОРОМ; за якість послуг транспортних організацій; об&rsquo;єктів розміщення (готелів), страхової компанії тощо; </span></span></span></p>
<p align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за обставини, які знаходяться поза контролем ТУРАГЕНТА (заміну ТУРОПЕРАТОРОМ готелю на готель подібної категорії, втрату особистих речей, страхові випадки, можливі неточності допущені в готельних та інших рекламних проспектах і буклетах, ті, що виготовлені без участі ТУРАГЕНТА і є додатковим матеріалом);</span></span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"> - </span><span style="color: #000000;"><span lang="uk-UA">за незручності, завдані ТУРИСТУ у зв&rsquo;язку з проведенням на території країни перебування будівельних чи ремонтних робіт.</span></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.6. ТУРАГЕНТ не компенсує ТУРИСТУ витрати за придбані ним додаткові послуги, та якщо ТУРИСТ у період обслуговування на свій розсуд не користувався всіма або частиною замовлених та оплачених послуг.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.7. У випадку порушення ТУРИСТОМ правил проїзду, реєстрації та перевезення багажу, нанесення збитків транспортній компанії, або порушення правил проживання, завдання збитків готелю тощо, ТУРИСТ самостійно сплачує штрафи та компенсує збитки, завдані його діями.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">4.8. Усі претензії та пропозиції по організації туру приймаються ТУРАГЕНТОМ не пізніше 14 днів після дати закінчення туру, за умови надання ТУРИСТОМ доказів, що підтверджують ненадання чи неналежне надання туристичних послуг та/або несвоєчасне вжиття заходів по їх усуненню. ТУРАГЕНТ не розглядає претензії ТУРИСТА до якості наданих послуг, що ґрунтуються лише на суб&rsquo;єктивній оцінці ТУРИСТА.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>5. ЗМІНА ТА ПРИПИНЕННЯ ДІЇ ДОГОВОРУ</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">5.1. Сторони можуть внести зміни та доповнення до цього Договору за їх згодою, що оформлюються у письмовому вигляді. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">5.2. У разі недобору групи, ТУРАГЕНТ за отриманим від ТУРОПЕРАТОРА повідомленням інформує ТУРИСТА про те, що тур не відбудеться. Своєчасне виконання ТУРАГЕНТОМ цієї вимоги є підставою для відшкодовування витрат, сплачених ТУРИСТОМ на придбання туру.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>6. ІНШІ УМОВИ</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">6.1. Категорія готелю (інших місць розміщення) вказується в цьому Договорі у відповідності до класифікації за правилами та/або законодавством країни тимчасового перебування. </span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">6.2. Заселення до номеру раніше розрахункового часу, як і виселення з номеру пізніше розрахункового часу, тягнуть зобов&rsquo;язання сплатити вартість повної доби проживання в готелі, незалежно від фактично проведеного часу в номері готелю.</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"><span lang="uk-UA">6.3. Якщо послуга не зазначену у туристичному ваучері,</span></span> <span style="color: #000000;"><span lang="uk-UA">то вважається,</span></span> <span style="color: #000000;"><span lang="uk-UA">що вона не входить до вартості туру.</span></span></span></p>
<p class="western" lang="uk-UA" align="center">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>7. ПРИКІНЦЕВІ ПОЛОЖЕННЯ</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">7.1. Цей Договір набирає чинності з моменту сплати ТУРИСТОМ вартості туру (внесення передоплати) і діє до повного виконання Сторонами зобов&rsquo;язань, прийнятих ними за цим Договором. Договір складено у двох примірниках для кожної із Сторін, які мають однакову юридичну силу.</span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">7.2. Усі спори між Сторонами, з яких не було досягнуто згоди, розв&rsquo;язуються у судовому порядку.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">7.3. Підписанням цього договору ТУРИСТ, враховуючи вимоги ЗУ &laquo;Про захист персональних даних&raquo;, надає ТУРОПЕРАТОРУ і ТУРАГЕНТУ згоду на обробку його персональних даних (та персональних даних фізичних осіб, що слідують з ним) з метою використання цих відомостей для наданні туристичних послуг за цим Договором.</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span style="color: #000000;"><span lang="uk-UA">7.4. Цей Договір пов'язаний з Аген</span></span><span style="color: #000000;">т</span><span style="color: #000000;"><span lang="uk-UA">ським договором</span></span> <span style="color: #000000;"><span lang="uk-UA">ТУРАГЕНТА </span></span><span style="color: #000000;">з ТУРОПЕРАТОРОМ</span><span style="color: #000000;"><span lang="uk-UA"> з реалізації туристичних продуктів.</span></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">7.5. Перевезення ТУРИСТА може здійснюватися рейсом іншої авіакомпанії, що перебуває у договірних відносинах з Авіакомпанією, авіаквитки якої було видано на початку туру. Туроператор гарантує доставку Туриста з міста початку до міста завершення туру. Фактичні аеропорти міста вильоту та міста призначення можуть відрізнятися від зазначених в авіаквитку.</span></span></p>
<p class="western" lang="uk-UA" align="center">&nbsp;</p>
<p class="western" align="center"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA"><strong>8. ФОРС-МАЖОР.</strong></span></span></p>
<p class="western" align="justify"><span style="color: #000000; font-size: 10pt;"><span lang="uk-UA">8.1. Обставини непереборної сили (форс-мажору), що перешкоджають ТУРОПЕРАТОРУ або ТУРАГЕНТУ надати туристичні послуги, передбачені цим договором, звільняють вказаних осіб від відповідальності за невиконання чи неналежне виконання зобов&rsquo;язання, проте не звільняють від обов&rsquo;язку надати аналогічні або такі самі туристичні послуги, після припинення обставин непереборної сили. </span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="center"><span style="font-size: 10pt;"><strong>РЕКВІЗИТИ СТОРІН</strong></span></p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<center>
<table style="height: 969px;" width="697" cellspacing="0" cellpadding="7">
<tbody>
<tr style="height: 60px;">
<td style="height: 60px;" width="326" height="2">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>ТУРАГЕНТ:</strong></span></span></p>
</td>
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 60px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>ТУРИСТ:</strong></span></span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 120px;" rowspan="2" width="326" height="2">
<p class="western" lang="ru-RU"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalName'];?>
</span></p>
</td>
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 120px;" rowspan="2" width="326">
<p class="western"><span style="font-size: 10pt;"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
</tr>
<tr style="height: 106px;">
<td style="height: 106px;" width="326" height="42">
<p class="western"><span style="font-size: 10pt;">Адреса: </span></p>
<p class="western"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeAddress'];?>
</span></p>
</td>
<td style="height: 106px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 106px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">Дата народження: <?php echo $_smarty_tpl->tpl_vars['data']->value['DateBirth'];?>
</span></span></p>
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">Паспорт:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedBy'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ukrIssuedDate'];?>
</span></span></p>
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">Місцепроживання</span>:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['Address'];?>
</span></p>
</td>
</tr>
<tr style="height: 83px;">
<td style="height: 83px;" width="326" height="2">
<p class="western"><span style="font-size: 10pt;">Тел.:</span></p>
<p class="western"><span style="font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeMobile'];?>
</span></p>
</td>
<td style="height: 83px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 83px;" width="326">
<p class="western"><span style="font-size: 10pt;">Тел.: Моб.:<?php echo $_smarty_tpl->tpl_vars['data']->value['PhoneMob'];?>
</span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 180px;" rowspan="3" width="326" height="2">
<p class="western"><span style="color: #000000; font-size: 10pt;">ЄДРПОУ <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['TaxNumber'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;">П\р&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalAccountNum'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;">Банк: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalBankName'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;"><?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalBankIban'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;">МФО&nbsp;<?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalMFO'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;">E-mail: <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['LegalOfficeEmail'];?>
</span></p>
<p class="western"><span style="color: #000000; font-size: 10pt;">Cайт: cosmotravel.com.ua</span></p>
<p class="western">&nbsp;</p>
</td>
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 60px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="en-US">E</span>-<span lang="en-US">mail</span>:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['EmailHome'];?>
</span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 420px;" rowspan="7" width="326">
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA"><em>Підтверджую</em></span><em>, </em><span lang="uk-UA"><em>що</em></span><em> з </em><span lang="uk-UA"><em>умовами</em></span><em> Договору я </em><span lang="uk-UA"><em>ознайомлений</em></span><em> та </em><span lang="uk-UA"><em>згодний</em></span><em>.</em></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><em>Мною отримано від </em><span lang="uk-UA"><em>Турагета</em></span><em>: один екземпляр Договору </em><span lang="uk-UA"><em>та</em></span> <span lang="uk-UA"><em>Додаток 1 </em></span><em>до нього, а також інформація, необхідна для здійснення закордонної туристичної подорожі і туристичного обслуговування за цим Договором; роз&rsquo;яснені права, обов&rsquo;язки і правила поведінки, умови страхування, порядок відшкодування завданих збитків, умови відмови від послуг, медичні застереження стосовно здійснення туристичної поїздки, а також правила перетину державних кордонів, митні правила України та країни тимчасового перебування, правила поведінки за кордоном.</em></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA"><em>Підтверджую</em></span><em>, </em><span lang="uk-UA"><em>що</em></span><em> вся </em><span lang="uk-UA"><em>інформація</em></span><em> доведена до </em><span lang="uk-UA"><em>відома</em></span> <span lang="uk-UA"><em>всіх</em></span> <span lang="uk-UA"><em>учасників</em></span> <span lang="uk-UA"><em>туристичної</em></span> <span lang="uk-UA"><em>подорожі</em></span><em>.</em></span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 180px;" rowspan="3" width="326" height="2">
<p class="western"><span style="font-size: 10pt;"><strong>Фінансова гарантія 2000 євро</strong> за договором №<span lang="uk-UA">Г</span>-<span lang="uk-UA">123456</span>-<span lang="uk-UA">5</span> від 17.<span lang="uk-UA">10</span>.201<span lang="uk-UA">7</span> p. з ТОВ &laquo;Фінансова компанія &laquo;Фангарант Груп&raquo;&raquo; до 17.<span lang="uk-UA">10</span>.201<span lang="uk-UA">8</span> р.</span></p>
</td>
<td style="height: 60px;" valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 120px;" rowspan="2" width="326" height="2">
<p class="western"><span style="font-size: 10pt;"><strong>Реквізити для оплати турпродукту вказані у рахунку.</strong></span></p>
</td>
<td style="height: 60px;" valign="top" width="3">
<p class="western">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" valign="top" width="3">
<p class="western">&nbsp;</p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" width="326" height="9">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>Директор <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
</strong></span></span></p>
</td>
<td style="height: 60px;" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 60px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>Турист <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></span></span></p>
</td>
</tr>
<tr style="height: 60px;">
<td style="height: 60px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">підпис</span> М.П.</span></p>
</td>
<td style="height: 60px;" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td style="height: 60px;" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">підпис</span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<center>
<table width="697" cellspacing="0" cellpadding="7">
<tbody>
<tr>
<td rowspan="2" width="326" height="2">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td valign="top" width="3">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td rowspan="2" width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA"><em>Документи</em></span><em>, </em><span lang="uk-UA"><em>що</em></span> <span lang="uk-UA"><em>необхідні</em></span><em> для </em><span lang="uk-UA"><em>туристичної</em></span> <span lang="uk-UA"><em>подорожі</em></span></span></p>
<p class="western"><span style="font-size: 10pt;"><em>у </em><span lang="uk-UA"><em>відповідності</em></span><em> до умов </em><span lang="uk-UA"><em>цього </em></span><em>Договору</em><span lang="uk-UA"><em> в</em></span><em> т.ч. </em><span lang="uk-UA"><em>пам&rsquo;ятки</em></span> <span lang="uk-UA"><em>подорожуючим</em></span> <span lang="uk-UA"><em>отримані</em></span><em>:</em></span></p>
</td>
</tr>
<tr>
<td valign="top" width="3">
<p class="western">&nbsp;</p>
</td>
</tr>
<tr>
<td valign="bottom" width="326" height="9">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td valign="bottom" width="3">
<p class="western" lang="ru-RU" align="center">&nbsp;</p>
<p class="western" lang="ru-RU" align="center">&nbsp;</p>
</td>
<td width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>Дата</strong></span><span lang="ru-RU"> ________________________</span></span></p>
</td>
</tr>
<tr>
<td valign="bottom" width="326">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td valign="bottom" width="3">
<p class="western" lang="ru-RU" align="center">&nbsp;</p>
</td>
<td width="326">
<p class="western" lang="uk-UA">&nbsp;</p>
</td>
</tr>
<tr>
<td valign="bottom" width="326" height="9">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td valign="bottom" width="3">
<p class="western" lang="ru-RU" align="center">&nbsp;</p>
</td>
<td width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="ru-RU"><strong>Турист&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</strong></span></span></p>
</td>
</tr>
<tr>
<td valign="bottom" width="326">
<p class="western" lang="ru-RU">&nbsp;</p>
</td>
<td valign="bottom" width="3">
<p class="western" lang="ru-RU" align="center">&nbsp;</p>
</td>
<td width="326">
<p class="western"><span style="font-size: 10pt;"><span lang="uk-UA">підпис</span></span></p>
</td>
</tr>
</tbody>
</table>
</center>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="center"><span style="font-size: 10pt;"><strong>ДОДАТОК №1 до Договору про надання інформаційно-консультаційних</strong></span></p>
<p class="western" lang="uk-UA" align="center"><span style="font-size: 10pt;"><strong>та посередницьких послуг при замовленні турпродукту &laquo;ПЕГАС ТУРИСТИК&raquo;</strong></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">1. Розмір неустойки (штрафу), яку Замовник/Турист зобов&rsquo;язаний сплатити при відмові від замовлення, що було виконано Туроператором становить:</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">за 31 і більше днів до початку надання туристичних послуг &ndash; </span>3<span lang="uk-UA">0 у.е. за 1-го туриста;</span></span></p>
<p class="western" lang="uk-UA" align="justify"><span style="font-size: 10pt;">від 30 до 22 днів до початку надання туристичних послуг &ndash; 10% від вартості турпродукту;</span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 21 до 15 днів до початку надання туристичних послуг &ndash; 25% від вартості турпродукту;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 14 до 8 днів до початку надання туристичних послуг &ndash; 50% від вартості турпродукту;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 7 до 5 днів до початку надання туристичних послуг &ndash; 60% від вартості турпродукту;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 4 до 2 днів до початку надання туристичних послуг &ndash; 75% від вартості турпродукту; </span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">за 1 день до початку надання туристичних послуг &ndash; 90% від вартості турпродукту;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">у день вильоту та після початку надання туристичних послуг &ndash; 100% вартості турпродукту.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">2. При відмові від новорічного, різдвяного, канікулярного або травневого туру, що повністю або частково (один день і більше) припадає на період з </span><span lang="uk-UA"><strong>24 грудня по 10 січня; з 20 березня по 2 квітня; з 25 квітня по 13 травня; з 22 жовтня по 12 листопада, </strong></span><span lang="uk-UA">а також на державні свята України або у дні проведення на території країни перебування заходів, що характеризується підвищеним попитом на турпослуги у такій країні в цей період - штраф (неустойка) для Замовника/Туриста становитиме:</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">за 61 більше днів до початку надання туристичних послуг &mdash; 30 y.e.</span> <span lang="uk-UA">за 1-го туриста;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 60 до 41 дня до початку надання туристичних послуг &mdash; 50%;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 40 до 15 днів до початку надання туристичних послуг &mdash; 75% ; </span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 14 до 2 днів до початку надання туристичних послуг &mdash; 90%;</span></span></p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">від 1 до 0 днів до початку надання туристичних послуг &mdash; 100%.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify"><span style="font-size: 10pt;"><strong>3. При підрахунку строку, за який відбувається відмова від замовленого турпродукту, дні вильоту та ануляції не враховуються!</strong></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">4. Непокритими неустойкою (штрафом), що вказані вище, є витрати на авіаперевезення, що були у складі турпродукту, а також консульський збір, якщо такий збір сплачувався.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA"> 5. При відмові від туристичної послуги, яка була замовлена не у складі туристичного продукту, а як елемент до індивідуального туру (Fully Independent Travelling &ndash; </span><span lang="en-US">FIT</span><span lang="uk-UA">), наприклад: авіаперевезення, проживання в готелі, трансфер в таких країнах як: Австрія, Азербайджан, Бахрейн, Бразилія, Венесуела, Вірменія, Німеччина, Ісландія, Італія, Латвія, Маврикій, Мальдіви, Мальта, Португалія, Сейшельські острови, Туреччина (Стамбул), Франція, Шрі-Ланка, розмір неустойки (штрафу), повідомляється Замовнику/Туристу у письмовій формі при замовленні такої послуги. </span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;"><span lang="uk-UA">Розмір неустойки, розрахованої по зазначеними вище показникам є орієнтиром для обчислення збитків (витрат) Туроператора при анулюванні замовлення в певний період до дня отримання послуг. Проте, визначена наперед сума збитків може бути змінена Туроператором до суми його фактичних витрат по виконанню такого замовлення після з&rsquo;ясування суми цих витрат.</span></span></p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify"><span style="font-size: 10pt;">З умовами ануляції заявки/броні (відмови від замовлених турпослуг) ознайомлений і погоджуюсь. </span></p>
<p class="western" lang="en-US" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify"><span style="font-size: 10pt;">Прізвище, ім&rsquo;я, по-батькові Замовника/Туриста&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&nbsp; (підпис) _______________</span></p>
<p class="western" lang="en-US" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" lang="uk-UA" align="justify">&nbsp;</p>
<p class="western" align="justify"><span style="font-size: 10pt;">Турагентство/Турагент <?php echo $_smarty_tpl->tpl_vars['data_ext']->value['legalData']['SignerFIO'];?>
 (п<span lang="uk-UA">і</span>дпис) <span lang="uk-UA">__________________</span></span></p><?php }
}
