<?php
/* Smarty version 3.1.30, created on 2017-02-17 15:11:28
  from "ab17a7baea1d54615aa968273362c5818738b565" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a6f6801e8c87_71620782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a6f6801e8c87_71620782 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h5 style="text-align: justify;"><strong>ДОГОВІР № <?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
</strong></h5>
<p style="text-align: justify;"><strong>з туристом (турагентом)&nbsp; про надання </strong><strong>(</strong><strong>бронювання) туристичних послуг</strong></p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; м. Київ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 &nbsp;р.</p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Товариство з обмеженою відповідальністю &ldquo;АЗАРІЯ&rdquo; (Туроператор),&nbsp; в особі директора Соломахи Г.M.,&nbsp; що діє на підставі Статуту та ліцензії на туроператорську діяльність Державної туристичної адміністрації України АА&nbsp; №505339 від 29.01.2010 р. &nbsp;від імені і за дорученням якого на підставі агентського договору № <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorDealNum'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDateStart'];?>
&nbsp; р. укладає&nbsp; цей Договір <?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
 (Турагент), що є платником єдиного податку&nbsp;в особі <?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
 , який діє на підставі Державної реєстрації&nbsp;у подальшому Фірма, з одного боку,</p>
<p style="text-align: justify;">та Громадянин (ка) <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 &nbsp;паспорт <?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
, що діє на підставі особистого волевиявлення, який (а) діє від свого імені та від імені осіб, які уповноважили його (її) по довіреності на укладення даного Договору, а саме:</p>
<p style="text-align: justify;"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>Громодянин(ка) <?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
 <br /><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</p>
<p style="text-align: justify;">кожний з яких надалі - "Турист", з другого боку, а разом надалі - "Сторони", уклали цей договір, про наступне:</p>
<p style="text-align: justify;"><strong>&nbsp;ПРЕДМЕТ ДОГОВОРУ</strong></p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Предметом цього Договору є туристичні&nbsp; послуги, які Туроператор&nbsp;зобов&rsquo;язується надати через Фірму Туристу &nbsp;згідно туристичного ваучеру (путівки), програми перебування, правилам покупки та анулювання авіа- (залізничних, автобусних) білетів, турів, медичного страхування, обумовленими письмово умовами та строками поїздки при умові своєчасної сплати послуг туристом.</p>
<ol style="text-align: justify;">
<li><strong>ІНФОРМАЦІЯ ПРО ЗАМОВЛЕНІ (ЗАБРОНЬОВАНІ) ПОСЛУГИ</strong>
<ul>
<li>1. Країна та місце відвідування: <?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
, &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
</li>
<li>2. Строк перебування: з&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;_______&rdquo;&nbsp;&nbsp; _______________________&nbsp;&nbsp; 201__ &nbsp;р.&nbsp;&nbsp; по&nbsp;&nbsp;&nbsp; &ldquo;_______&rdquo;__________________________ 201__ &nbsp;р.</li>
</ul>
</li>
</ol>
<p style="text-align: justify;">Виїзд із Києва <?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
,&nbsp; приїзд до Києва <?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
</p>
<ul style="text-align: justify;">
<li>3. Маршрут (пункт) туру: _____________________________________________________________________________________________</li>
<li>4. Транспортні умови: придбання (бронювання) авіа / з/д / автобусних квитків: так&nbsp; /&nbsp; ні. Вид транспортного засобу &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
</li>
<li>5. Готель(і) <?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
 &nbsp;Розрахунковий час: 12-00/14-00 (___________)</li>
<li>6. Категорія номеру <?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
 &nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RoomViewName'];?>
</li>
<li>7. Кількість людей (розміщення): <?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
</li>
<li>8. Види і способи харчування: <?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
</li>
<li>9. Трансфер: <?php echo $_smarty_tpl->tpl_vars['data']->value['TransferName'];?>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</li>
<li>10. Правила в'їзду: віза / терміни дії і оформлення_________________________________________________________________________</li>
<li>11. Програма та види екскурсійного обслуговування _______________________________________________________________________</li>
<li>12. Страхування туриста &ndash; обов&rsquo;язкове на суму _________________________ СК&nbsp;&nbsp; ____________________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
<li>13. Поїздка індивідуальна / групова_____________________________________________________________________________________</li>
<li>14. Додаткові послуги: ________________________________________________________________________________________________</li>
<li>15. Приймаючою стороною у&nbsp; країні перебування Туриста є:&nbsp; _______________________________________________________________</li>
</ul>
<p style="text-align: justify;">Даний Договір є невід'ємною частиною агентського договору № <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorDealNum'];?>
 по реалізації туристичних продуктів від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDateStart'];?>
 р.</p>
<ul style="text-align: justify;">
<li>16. Вартість послуг становить:&nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorInvoceSum'];?>
</li>
<li>17. Предоплата становить : <?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
</li>
<li>18. Комісійна винагорода становить:&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumPremia'];?>
</li>
</ul>
<ol style="text-align: justify;" start="2">
<li><strong>ПРАВА ТА ОБОВ&rsquo;ЯЗКИ СТОРІН</strong>
<ul>
<li><strong>1. Туроператор&nbsp;зобов&rsquo;язується через Фірму:</strong>
<ul>
<li>1.1. Надати Туристу послуги у обсязі та строки, у кількості та якості, які обумовлені в п. п. 1.1. &ndash; 1.18. цього Договору. Додержуватися умов надання комплексу туристичних послуг, про які був поінформований споживач до укладення договору на туристичне обслуговування, крім випадків, коли про зміну таких умов повідомлено споживача до укладення договору або якщо зміни внесено на підставі угоди, укладеної між сторонами договору.</li>
<li>1.2. Забезпечити Туриста документами, що необхідні для підтвердження статусу Туриста:<u>авіаквитки, медичний страховий поліс, ваучер на трансфер та</u> <u>готель, інфоліст </u><u>(</u><u>програма туру) та ін.:</u>__________________________________________________________</li>
<li>1.3. Придбати від імені та за рахунок Туриста авіа- (залізничні, автобусні) квитки для поїздки за маршрутом, які є окремим договором пасажирського перевезення Туриста з перевізником. Квиток необхідно зберегти на випадок пред&rsquo;явлення претензій перевізнику;</li>
<li>1.4. Інформувати споживачів про умови надання туристичних послуг, а саме надати достовірні відомості про умови договору на туристичне обслуговування які містять відомості про: місце надання туристичних послуг; програму туристичного обслуговування; характеристику транспортних засобів, що здійснюють перевезення, зокрема їх вид і категорію; характеристику готелів та інших об&rsquo;єктів, призначених для надання послуг з тимчасового розміщення, у тому числі місце їх розташування, категорію, відомості про підтвердження відповідності послуг готелю встановленим вимогам; строки і порядок оплати готельного обслуговування; види і способи забезпечення харчування під час туристичної подорожі; мінімальну кількість туристів у групі; а також інформування туриста про те, що туристична подорож не відбудеться через недобір групи, не пізніше ніж за три дні до початку туристичної подорожі; ціну туристичних послуг.</li>
<li>1.5. До укладення договору на туристичне обслуговування споживачеві туристичного продукту надається інформація про:</li>
</ul>
</li>
</ul>
</li>
</ol>
<p style="text-align: justify;">- основні вимоги до оформлення в&rsquo;їзних/виїзних документів (паспорт, дозвіл (віза) на в&rsquo;їзд/виїзд до країни тимчасового перебування),&nbsp; у тому числі строк їх оформлення;</p>
<p style="text-align: justify;">-медичні застереження стосовно здійснення туристичної подорожі, зокрема протипоказання через певні захворювання, особливості фізичного стану (фізичні недоліки) і вік туристів, а також умови безпеки туристів у країні (місці) тимчасового перебування;</p>
<p style="text-align: justify;">-туроператора (турагента), його місцезнаходження, поштові реквізити, контактний телефон, наявність ліцензії на провадження туристичної діяльності, сертифікатів відповідності та інші відомості відповідно до законодавства про захист прав споживачів;</p>
<p style="text-align: justify;">-керівника групи та засоби зв&rsquo;язку з ним у разі здійснення туристичної подорожі за кордон чи перебування за кордоном неповнолітньої та/або малолітньої особи з метою встановлення законними представниками неповнолітньої або малолітньої особи прямого зв&rsquo;язку з нею;</p>
<p style="text-align: justify;">-час та місце проміжних зупинок і транспортних сполучень та категорію місця, яке споживач займатиме в певному виді транспортного засобу;</p>
<p style="text-align: justify;">- види і тематику екскурсійного обслуговування, порядок здійснення зустрічей і проводів, супроводу туристів;</p>
<p style="text-align: justify;">- стан навколишнього природного середовища, санітарного та епідеміологічного благополуччя;</p>
<p style="text-align: justify;">- назву, адресу та контактний телефон представництв туроператора або організації (організацій), уповноваженої туроператором на прийняття скарг і претензій туристів, а також адреси і телефони дипломатичних установ України у країні (місці) тимчасового перебування або місцевих служб, до яких можна звернутися у разі виникнення труднощів під час туристичної подорожі;</p>
<p style="text-align: justify;">- порядок забезпечення туроператором обов&rsquo;язкового та/або добровільного страхування туристів, розмір, порядок і умови виплати страхового відшкодування, а також можливість та умови добровільного страхування витрат, пов&rsquo;язаних з розірванням договору на туристичне обслуговування за ініціативою туриста, страхування майна;</p>
<p style="text-align: justify;">- розмір фінансового забезпечення туроператора (турагента) на випадок його неплатоспроможності (банкрутства) та кредитну установу, яка надала таке забезпечення.</p>
<ul style="text-align: justify;">
<li><strong>2. Туроператор&nbsp;має право:</strong>
<ul>
<li>2.1. Змінити ціни туристичного продукту після укладення договору на туристичне обслуговування лише у разі необхідності врахування зміни тарифів на транспортні послуги, запровадження нових або підвищення діючих ставок податків і зборів та інших обов&rsquo;язкових платежів, зміни курсу гривні до іноземної валюти, в якій виражена вартість туристичного продукту.Зміна ціни туристичного продукту можлива не пізніш як за 20 днів до початку туристичної подорожі. При цьому збільшення ціни туристичного продукту не може перевищувати п&rsquo;яти відсотків його початкової ціни. У разі якщо ціна туристичного продукту вища за початкову ціну на п&rsquo;ять відсотків, турист має право відмовитися від виконання договору, а туроператор (турагент) зобов&rsquo;язаний повернути йому раніше сплачену суму.</li>
</ul>
</li>
<li>3. <strong>Турист зобов&rsquo;язується:</strong></li>
<li>3.1. Дотримуватись умов та правил, що обумовлені цим Договором;</li>
<li>3.2. Виконувати митні та прикордонні правила, мати при собі :</li>
<li><em><u>Пасп</u></em><em><u>орт громадянина України для виїзду за кордон (дійсний 3-6 міс по закінченні строку туру). Діти, з 5 років повинні бути не тількі вписані в паспорт батьків, але і ОБОВЯЗКОВО мати фотографію у паспорті батьків .</u></em></li>
<li><em><u>Діти, котрим ще не виповнилось 16 років та які подорожують без батьків (або у супроводі одного з них), повинні&nbsp; мати при собі&nbsp; НОТАРІАЛЬНО ЗАВІРЕНИЙ ДОЗВІЛ&nbsp; від батьків ( або другого з батьків) на те, що дитина у&nbsp; вказані строки подорожує&nbsp; у супроводі&nbsp; довіреної&nbsp; особи. </u></em></li>
<li style="text-align: justify;">3.3. Поважати політичний та соціальний устрій, традиції, звичаї, релігійні вірування країни (місцевості) перебування;</li>
<li style="text-align: justify;">3.4. Дотримуватися правил поведінки та вимог щодо збереження об`єктів історії та культури, природи;</li>
<li style="text-align: justify;">3.5. Не порушувати громадський порядок, дотримуватися вимог законів, які діють на території країни перебування;</li>
<li style="text-align: justify;">3.6. Дотримуватися правил внутрішнього розпорядку та протипожежної безпеки в місцях проживання та перебування;</li>
<li style="text-align: justify;">3.7. Довести до відома Фірми інформацію, що дає можливість останній припустити несприятливий результат придбання турпослуг;</li>
<li style="text-align: justify;">3.8. Повідомити представника Фірми та/або представника організації, уповноваженого Фірмою на прийняття претензій туристів в країні тимчасового перебування в письмовому вигляді, телефоном чи факсом про свої претензії щодо невиконання чи неналежного виконання туристичних послуг протягом трьох діб з моменту виникнення останніх, для своєчасного вжиття заходів з їх усунення. В іншому разу претензії Фірмою до розгляду не приймаються.</li>
<li>3.9 протягом 14 (чотирнадцяти) календарних днів після повернення з туристичної подорожі в Україну з&rsquo;явитися в офіс ТУРАГЕНТА для підписання Акту наданих послуг. При не з&rsquo;явленні для підписання Акту&nbsp; або ненадання обґрунтованої відмови від підписання, Акт вважається таким, що прийнятий без зауважень та підписаний двома Сторонами.</li>
<li>4. <strong>Права Туриста:</strong></li>
<li>4.1. Отримати інформацію, консультацію щодо послуг, що надаються за цим Договором;</li>
<li>4.2. Отримати комплекс послуг згідно з п.п. 1.1. - 1.18. цього Договору за програмою перебування;</li>
<li>4.3. Одержання медичної допомоги у разі захворювання відповідно до умов страхування, згідно з договором страхування;</li>
<li>4.4. Турист вправі відмовитися від виконання договору на туристичне обслуговування до початку туристичної подорожі за умови відшкодування туроператору (турагенту) фактично здійснених ним документально підтверджаних витрат, пов`язаних із відмовою.&nbsp;</li>
</ul>
<ol style="text-align: justify;" start="3">
<li><strong>ВІДПОВІДАЛЬНІСТЬ СТОРІН</strong></li>
</ol>
<p>1. У разі анулювання поїздки з вини Фірми або Туроператора, Туристу повертається повна вартість сплачених ним послуг.</p>
<p>2. Якщо Турист відмовляється від поїздки більш ніж за 21 днів від початку туру, Фірма утримує з Туриста штрафні санкції, у розмірі мінімального стягу за розгляд і опрацювання замовлення, котрий становить 100 грн. за кожного Туриста. При відмові Туриста менш ніж за 21 днів від початку тура, Фірма утримує з Туриста вартість понесених Фірмою витрат на момент відмови у розмірі:</p>
<table>
<tbody>
<tr>
<td width="324">
<p>&nbsp;- менш ніж за 21 днів &ndash; 25% вартості туру;</p>
<p>- менш ніж за 14 днів &ndash; 50% вартості туру;</p>
<p>- менш ніж за 7 дні &ndash; 100 % вартості туру.</p>
</td>
<td width="361">
<p><strong>&nbsp;&nbsp; у період з 20 грудня по 10 січня включно, та інші святкові дні</strong></p>
<p>&nbsp;- більше 21 днів &ndash; 10%&nbsp; вартості туру;</p>
<p>&nbsp;-&nbsp; менш ніж за 21 днів &ndash; 80% вартості туру;</p>
<p>&nbsp;- менш ніж за 7 дні &ndash; 100 % вартості туру.</p>
</td>
</tr>
</tbody>
</table>
<ul style="text-align: justify;">
<li>3. Якщо на момент відмови Туриста від туру Туроператором через Фірму&nbsp;вже викуплено авіаквиток, відкрито візу, зроблено інші витрати, які входять до вартості самого туру,&nbsp;&nbsp; їх вартість Туристу не повертаються.</li>
<li>4. Фірма не несе відповідальності за відмову іноземного посольства (консульства) у наданні віз Туристу за маршрутом туру згідно з п. 1.2. цього Договору, якщо у встановлені посольством (консульством) терміни Фірмою було надано всі необхідні документи в іноземне посольство (консульство).</li>
<li>5. <u>Фірма не несе відповідальність за скасування чи зміну часу відправлення/прибуття, пункту призначення авіарейсів і пов'язаних з цим змін програми туру.</u> <u>Час відправлення/прибуття авіарейсу може змінюватись&nbsp; не більш ніж на 24 години. Всі претензії, позови, пов&lsquo;язані з неналежним наданням транспортних послуг пред&rsquo;являються безпосередньо&nbsp; ПЕРЕВІЗНИКУ, що здійснює виконання авіарейсу, у відповідності з Правилами повітряних перевезень пасажирів і багажу. </u></li>
<li>6. У разі неможливості здійснення поїздки Туристом з причин, що не залежать від Фірми (в тому числі в разі рішення консульських закладів туристу відмовлено у видачі віз, якщо туристу відмовлено в можливості виїзду по авіаквитку або в проживанні в готелю через відсутність належних документів, порушення&nbsp; правопорядку, перебування туриста в стані алкогольного або наркотичного сп&rsquo;яніння або порушення ним інших правил поведінки в громадських місцях, правил проїзду або перевезення багажу, або через відмови Туриста з інших причин), з Туриста утримуються штрафні санкції, граничний розмір яких вказаний у пункті 3.2.</li>
<li>7. Фірма не компенсує грошові витрати Туриста за сплачені ним туристичні послуги, якщо Турист в період обслуговування на свій розсуд або через із свої інтереси не користувався всіма або частиною послуг, обумовлених цим Договором, і не компенсує Туристу витрати, які виходять за рамки обумовлених в п.п. 1.1. &ndash; 1.18. цього Договору.</li>
<li>8. Фірма не відповідає за якість самостійно придбаних Туристом послуг чи товарів.</li>
<li>9. Фірма не несе відповідальності за збереження багажу, цінностей і документів Туриста протягом всього періоду туру і на транспорті.</li>
<li>10. Фірма не несе відповідальності за правильність оформлення закордонного паспорта Туриста.</li>
<li>11. Турист несе відповідальність за дійсність та достовірність документів, що він надає, та інформації, а також за всі збитки та наслідки, що виникли в разі недостовірності останніх.</li>
<li>12. Фірма не несе відповідальності за збитки, що виникли у Туриста, пов&rsquo;язані з його винними діями (бездіяльністю), до яких зокрема відносяться: нез&rsquo;явлення чи запізнення до місця надання туристичної послуги, несвоєчасне чи неповне надання Фірмі інформації, необхідної для оформлення документів, що дають право на в&rsquo;їзд (виїзд) в країну (з країни), перебування в стані алкогольного чи наркотичного сп&rsquo;яніння, тощо.</li>
<li>13. Фірма не несе відповідальності за дії прикордонних, митних та інших офіційних служб України та країн, які відвідує або перетинає Турист. У випадку конфлікту Туриста з цими службами вартість сплачених Туристом послуг згідно з п. 1.16. цього Договору не повертається.</li>
<li>14. У випадку порушення Туристом діючих правил проїзду, реєстрації та перевезення багажу, та завдання збитків транспортній компанії або порушення правил проживання та завдання збитків в готелі і невиконання законодавства країни перебування, Турист самостійно сплачує штрафи та компенсує, в разі необхідності, збитки в розмірах, передбачених чинним законодавством на місці виникнення конфлікту.</li>
<li>15. Фірма не несе відповідальності, якщо послуги, &nbsp;що надаються згідно з цим&nbsp; Договором, не відповідають уавленням Туриста, а також у разі зміни погодних умов.</li>
<li>16. Туроператор несе перед туристом відповідальність за невиконання або неналежне виконання умов договору на туристичне обслуговування, крім випадків, якщо:</li>
</ul>
<p>- невиконання або неналежне виконання умов договору на туристичне обслуговування сталося з вини туриста;</p>
<p>- невиконання або неналежне виконання умов договору на туристичне обслуговування сталося з вини третіх осіб, не пов&rsquo;язаних з наданням послуг, зазначених у цьому договорі, та жодна із сторін про їх настання не знала і не могла знати заздалегідь;</p>
<p>- невиконання або неналежне виконання умов договору на туристичне обслуговування сталося внаслідок настання форс-мажорних обставин або є результатом подій, які туроператор (турагент) та інші суб&rsquo;єкти туристичної діяльності, які надають туристичні послуги, включені до туристичного продукту, не могли передбачити.</p>
<ul style="text-align: justify;">
<li>17. Всі претензії та пропозиції з організації туру приймаються Фірмою не пізніше 14 днів після дати закінчення туру згідно з п. 1.2. цього Договору, за умови надання Туристом наступних документів: даного договору; документа, що підтверджує невиконання чи неналежне виконання туристичних послуг та/або несвоєчасного вжиття заходів з їх усунення,&nbsp; затвердженого представником Фірми,&nbsp; або представником організації, уповноваженого Фірмою на прийняття претензій туристів в країні тимчасового перебування.</li>
</ul>
<ol style="text-align: justify;" start="4">
<li><strong>ФОРС-МАЖОР</strong>
<ul>
<li>1. Форс-мажорними Сторони вважають такі обставини, що не залежать від волі Сторін, які роблять неможливою поїздку, зокрема такі як: війни, стихійні лиха, землетрус повінь, пожежі, державні перевороти, епідемії, рішення органів влади чи заборона на авіаперевезення в даному напрямку, які можуть бути документально підтверджені компетентними органами.</li>
<li>2. Під час виникнення форс-мажорних обставин Фірма повертає Туристу всю вартість туру, окрім сум, що вже перераховані Фірмою і не можуть бути повернені її партнерами.</li>
</ul>
</li>
</ol>
<ol style="text-align: justify;" start="5">
<li><strong>ЗМІНА ТА ПРИПИНЕННЯ ДІЇ ДОГОВОРУ</strong>
<ul>
<li>1. Кожна із сторін договору на туристичне обслуговування до початку туристичної подорожі може вимагати внесення змін до цього договору або його розірвання у зв&rsquo;язку із зміною істотних умов договору та обставин, якими вони керувалися під час укладення договору, зокрема у разі:</li>
</ul>
</li>
</ol>
<p>- погіршення умов туристичної подорожі, зміни її строків;</p>
<p>-&nbsp; непередбаченого підвищення тарифів на транспортні послуги;</p>
<p>-&nbsp; запровадження нових або підвищення діючих ставок податків і зборів, інших обов&rsquo;язкових платежів;</p>
<p>-&nbsp; істотної зміни курсу гривні до іноземної валюти, в якій виражена ціна туристичного продукту;</p>
<p>-&nbsp; домовленості сторін.</p>
<ul style="text-align: justify;">
<li>2. Туроператор (турагент) зобов&rsquo;язаний не пізніш як через один день з дня, коли йому стало відомо про зміну обставин, якими сторони керувалися під час укладення договору на туристичне обслуговування, та не пізніш як за три дні до початку туристичної подорожі повідомити туриста про таку зміну обставин з метою надання йому можливості відмовитися від виконання договору без відшкодування шкоди туроператору (турагенту) або внести зміни до договору, змінивши ціну туристичного обслуговування.&nbsp;</li>
<li>3. Сторони можуть вносити зміни, доповнення та додадки до цього Договору за умови згоди обох Сторін в письмовому вигляді. Вказані зміни, доповнення та додатки є невід&rsquo;ємною частиною цього Договору.</li>
<li>4. В разі недобору в групі вказаної в п. 1.13. цього Договору кількості туристів Фірма за 3 діб до початку туру згідно п. 1.2. цього Договору інформує Туриста про те, що тур не відбудеться з причини недобору групи. Своєчасне виконання Турагентом цієї вимоги є підставою для розірвання цього Договору за ініціативою Турагента, при цьому Туристу відшкодовуються всі витрати згідно п.п. 1.16.-1.18.&nbsp; цього Договору.</li>
</ul>
<ol style="text-align: justify;" start="6">
<li><strong>ІНШІ УМОВИ</strong>
<ul>
<li>1. Категорія готелю (інших місць розміщення) вказується в цьому Договорі у відповідності до класифікації за законодавством країни тимчасового перебування. Суттєвою умовою цього Договору по розміщенню Туриста є тільки категорія готелю, інших місць розміщення.</li>
<li>2. Заселення в номер раніш розрахункового часу, рівно як і виселення з номеру пізніше розрахункового часу, тягнуть зобов&rsquo;язання по сплаті вартості повної доби проживання в готелі, незалежно від фактично проведеного часу в номері готелю до/після настання розрахункового часу.</li>
<li>3. Якщо будь яка послуга не обговорюється окремо, то вважається, &nbsp;що вона не входить до вартості туру.</li>
</ul>
</li>
</ol>
<ol style="text-align: justify;" start="7">
<li><strong>ПРИКІНЦЕВІ ПОЛОЖЕННЯ</strong>
<ul>
<li>1. Цей Договір набирає чинності з моменту сплати Туристом вартості туру (внесення предоплати) і діє до повного виконання Сторонами зобов&rsquo;язань за цим Договором.</li>
<li>2. Цей Договір складено в двох примірниках для кожної із Сторін, які мають однакову юридичну силу.</li>
<li>3. Всі спори між Сторонами, з яких не було досягнуто згоди, розв&rsquo;язуються у відповідно до чинного законодавства України.</li>
</ul>
</li>
</ol>
<ol style="text-align: justify;" start="8">
<li><strong>РЕКВІЗИТИ СТОРІН</strong></li>
</ol>
<p style="text-align: justify;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Туроператор :Товариство з обмеженою відповідальністю &ldquo;Азарія&rdquo;</strong></p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Адреса: 01135, м. Київ, пр-т. Перемоги, 9 Код ЄДРПОУ: 16460933 Тел. (044) 236 49 53, 236 60 14, 236 82 02, 236 19 12; Факс 236 00 66</p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Розмір фінансового забезпечення Фірми на випадок її неплатоспроможності чи неспроможності становить суму, еквівалентну 20 000 Євро&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; та надан ВАТ ТФБ &ldquo;Контракт&rdquo;: 01025, м. Київ, вул. Воздвиженська, 58.</p>
<p style="text-align: justify;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ФІРМА (Турагент):&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
 &nbsp; &nbsp;&nbsp;</strong></p>
<p style="text-align: justify;"><strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong><?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
, &nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
,&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeEmail'];?>
<strong>&nbsp; &nbsp; &nbsp;&nbsp;</strong></p>
<p style="text-align: justify;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ТУРИСТ: &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
 &nbsp; &nbsp;&nbsp;</strong></p>
<p style="text-align: justify;">&nbsp;&nbsp; Цей Договір, складений при повному розумінні сторонами предмету договору, прочитаний повністю, відповідає їх намірам і містить всі&nbsp;&nbsp;&nbsp; &nbsp;істотні умови, щодо яких сторони бажали домовитися. Туристом необхідні документи отримано, з правилами поведінки, умовами страхування, правилами перетину митного кордону, медичними застереженнями стосовно здійснення поїдки ознайомлено, а також &nbsp;вся інформація,&nbsp; що надана туроператором (турагентом) містить достовірні відомості про умови договору на туристичне обслуговування та про умови надання туристичних послуг і доводена до Туриста у доступній, наочній формі, є розбірливою та&nbsp; зрозумілою. Турист надає згоду на обробку його персональних даних та персональних даних інших осіб, які зазначаються Туристом в листі бронювання (заяві на бронювання, анкеті, тощо)&nbsp; від його імені та за дорученням, Туроператором та Турагентом, з&nbsp; метою забезпечення надання туристичного продукту в об'ємі необхідному для досягнення зазначеної мети. Право визначення об'єму обробки персональних даних Турист надає Туроператору та Турагенту. Включення персональних даних Туриста до бази персональних даних Туроператора та Турагента відбувається в момент укладення цього Договору. Турист підтверджує свою обізнаність про таке включення, про свої права, визначені у законі України &laquo;Про захист персональних даних&raquo;, про мету збору даних та осіб, яким передаються його персональні дані.На підтвердження чого є&nbsp; підписи Сторін під текстом цього Договору.</p>
<h6 style="text-align: justify;"><strong>9.&nbsp; ПІДПИСИ СТОРІН</strong></h6>
<table>
<tbody>
<tr>
<td>ЗА ТУРОПЕРАТОРА Фірма:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>ТУРИСТ&nbsp;</td>
</tr>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
</td>
<td>&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
</tr>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
 <?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeEmail'];?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Підпис______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
&nbsp;</td>
<td>Підпис_______________________&nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify;"><strong>&nbsp;</strong></p><?php }
}