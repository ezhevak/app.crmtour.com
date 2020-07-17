<?php
/* Smarty version 3.1.30, created on 2017-02-13 21:03:31
  from "e1045f88ab8f7e2a55439862918eff58b367aa82" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a20303128851_03976358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a20303128851_03976358 (Smarty_Internal_Template $_smarty_tpl) {
?>
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;&amp;nbsp;ДОГОВІР № &lt;/strong&gt;&lt;em&gt;&lt;u&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;br /&gt;&lt;/u&gt;&lt;/em&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;НА ТУРИСТИЧНЕ ОБСЛУГОВУВАННЯ&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;м. Київ &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Товариство з обмеженою відповідальністю &amp;laquo;ТЕЗ ТУР&amp;raquo; (м. Київ, вул. Червоноармійська, 63, оф. 2; ліцензія Державної служби туризму і курортів на туроператорську діяльність серія АВ, № 566448 від 04.02.2011р.; тел. (044) 495-55-05), надалі Туроператор від імені та за дорученням якого на підставі агентського договору № <?php echo $_smarty_tpl->tpl_vars['data']->value['OperatorDealNum'];?>
 від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDateStart'];?>
 р. укладає цей Договір&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
 ,в особі&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
 , надалі Турагент з одного боку&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;та Громадянин (ка) Турист (Замовник) <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&amp;nbsp;&lt;/strong&gt; паспорт <?php echo $_smarty_tpl->tpl_vars['data']->value['ukrSeriaNum'];?>
, що діє на підставі особистого волевиявлення&lt;strong&gt;, який (а) діє від свого імені та від імені осіб, які уповноважили його (її) по довіреності&amp;nbsp; на укладення даного Договору, а саме:&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>Громодянин(ка) <?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
 &amp;lt;br&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;кожний з яких надалі - &quot;Турист&quot;, з другого боку, а разом надалі - &quot;Сторони&quot;, уклали цей договір, про наступне&lt;/strong&gt;:&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&lt;u&gt;&amp;nbsp;1.&amp;nbsp;&lt;/u&gt;&lt;/strong&gt;&lt;strong&gt;&lt;u&gt;ПРЕДМЕТ ДОГОВОРУ&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;1.1.Туроператор відповідно до замовлення, поданого Туристом&lt;strong&gt;(тами)&lt;/strong&gt; Турагенту (Додаток № 1 до цього Договору), за плату зобов&amp;rsquo;язується&amp;nbsp; надати Туристу&lt;strong&gt;(там) &lt;/strong&gt;комплекс туристичних послуг (туристичний продукт, Турпродукт).&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;1.2*Туроператор виконує свої обов&amp;rsquo;язки перед Туристами, як перед солідарними кредиторами.&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;1.3*Туристи виконують свої обов&amp;rsquo;язки перед Туроператором, як солідарні боржники&lt;/strong&gt;.&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;*пункти застосовуються у випадку укладення цього Договору з групою туристів&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&lt;u&gt;&amp;nbsp;2.&amp;nbsp;&lt;/u&gt;&lt;/strong&gt;&lt;strong&gt;&lt;u&gt;ОБОВ&amp;rsquo;ЯЗКИ СТОРІН&lt;/u&gt;&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;2.1. Туроператор зобов&amp;rsquo;язується:&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.1.1. Забронювати замовлені Туристом&lt;strong&gt;(тами)&lt;/strong&gt; туристичні послуги та забезпечити його&lt;strong&gt;(їх)&lt;/strong&gt; через Турагента необхідними документами, які посвідчують право Туриста&lt;strong&gt;(тів)&lt;/strong&gt; на отримання туристичних послуг, наприклад, ваучер, страховий поліс, авіаквитки на авіарейси згідно з графіком відправлення за маршрутом, вказаним в замовленні. Передача Туристу&lt;strong&gt;(там)&lt;/strong&gt; документів може здійснюватись в аеропорту вильоту представником Туроператора.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.1.2. Надати Туристу&lt;strong&gt;(там)&lt;/strong&gt; через Турагента інформацію, передбачену чинним законодавством України.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.1.3. Протягом 25 (двадцяти п&amp;rsquo;яти) робочих днів з моменту відмови Туриста(&lt;strong&gt;тів&lt;/strong&gt;) від цього Договору повернути йому&lt;strong&gt;(їм)&lt;/strong&gt; грошові кошти, за виключенням сум, зазначених в п. 2.2.10 цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Туроператор також повертає Туристу&lt;strong&gt;(там) &lt;/strong&gt;через Турагента усі сплачені Туристом&lt;strong&gt;(тами)&lt;/strong&gt; кошти протягом трьох банківських днів з моменту настання скасувальної обставини, визначеної у п. 6.2 цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;2.2. Турист(и) зобов&amp;rsquo;язується (ються):&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.1. Своєчасно надати документи, необхідні для оформлення поїздки (Туру): закордонний паспорт, ______________________________ _______________________ ________________________________(інші документи).&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.2. Оплатити Туроператору через Турагента до початку туру вартість замовленого туристичного продукту до&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateFullPay'];?>
.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.3. Не пізніше ніж за 2 (дві) години до часу вильоту (виїзду), якщо про інші строки не попередить Турагент, прибути на вказане Турагентом місце реєстрації. При перебуванні у турі дотримуватись вказівок гідів приймаючої сторони та повідомлень, розміщених в готелі на інформаційних стендах щодо часу вильоту (виїзду) рейсів та часу початку реєстрації.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.4. Дотримуватись правил перебування в країні тимчасового перебування, звичаїв, традицій місцевого населення, а також митних правил та правил в&amp;rsquo;їзду/виїзду до/з країни тимчасового перебування; не порушувати громадський порядок та вимоги законів, чинних на території країни тимчасового перебування; дотримуватись правил внутрішнього розпорядку та протипожежної безпеки в місцях розміщення та перебування. Правила в&amp;rsquo;їзду до країни (місця) тимчасового перебування та перебування там містяться на офіційному сайті туроператора www.tez-tour.com, у його каталогах, а також про них Туриста&lt;strong&gt;(тів)&lt;/strong&gt; інформує Турагент. Підписанням цього договору Турист&lt;strong&gt;(и)&lt;/strong&gt;&amp;nbsp; підтверджує&lt;strong&gt;(ють)&lt;/strong&gt;, що він&lt;strong&gt;(вони)&lt;/strong&gt; ознайомлений&lt;strong&gt;(і)&lt;/strong&gt; з усіма зазначеними правилами.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.5. Своєчасно, та в повному обсязі здійснити оплату за використання додаткових послуг в місцях&amp;nbsp; перебування.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.6. Оплатити вартість в&amp;rsquo;їзної візи при проходженні паспортного контролю, якщо придбання візи у спрощений спосіб передбачено законодавством країни, до якої в&amp;rsquo;їжджає&lt;strong&gt;(ють)&lt;/strong&gt; Турист&lt;strong&gt;(и)&lt;/strong&gt;.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.7. У випадку невідповідності умов туру умовам даного Договору повідомити про це Туроператора через Турагента не пізніше двох тижнів з моменту закінчення подорожі. При цьому до претензії повинен додаватись акт, складений Туристом&lt;strong&gt;(тами)&lt;/strong&gt; та уповноваженим працівником організації, що надавала йому послуги&amp;nbsp; та завірений підписом представника приймаючої сторони&amp;nbsp; в країні перебування, копія цього Договору, копія документа про сплату Туристом&lt;strong&gt;(тами)&lt;/strong&gt; вартості Турпродукту та інші матеріали, які підтверджують факт невідповідності умов туру умовам даного Договору. Відсутність претензії, поданої Туристом&lt;strong&gt;(тами)&lt;/strong&gt; у зазначені строки, свідчить про належне виконання Туроператором зобов&amp;rsquo;язань за цим Договором.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.8. При відмові Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору повернути Турагенту Ваучер, страховий поліс та інші документи, що надають право Туристу&lt;strong&gt;(там)&lt;/strong&gt; на отримання туристичних послуг.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.9. Дотримуватись вимог чинного законодавства України щодо перетину Державного кордону України, а також прикордонних та митних правил інших країн, через (до) які (яких) подорожує&lt;strong&gt;(ють)&lt;/strong&gt; Турист&lt;strong&gt;(и)&lt;/strong&gt;.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&amp;laquo;2.2.10. Відшкодувати Туроператору його витрати, пов&amp;rsquo;язані з відмовою Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору&amp;nbsp; до початку подорожі або при зміні замовлення. Відмовою Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору, зокрема, вважається нездійснення ним&lt;strong&gt;(и)&lt;/strong&gt; оплати&amp;nbsp; вартості туристичного продукту в зазначений&amp;nbsp; у п. 2.2.2 Договору строк. Зазначені витрати відповідно до укладених Туроператором угод з основними партнерами, які надають туристичні послуги для реалізації, складають:&lt;/p&gt;
&lt;table&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td&gt;&lt;strong&gt;Термін відмови туриста(тів) від Договору до початку подорожі&lt;/strong&gt;&lt;/td&gt;
&lt;td&gt;Сума, що підлягає стягненню з Туриста(тів) (витрати Туроператора)&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 7 днів до 4 днів&lt;/td&gt;
&lt;td&gt;-30 (тридцять) відсотків від вартості Турпродукта*;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 3 днів&amp;nbsp; до 2 днів&lt;/td&gt;
&lt;td&gt;-50 (п'ятдесят) відсотків від вартості Турпродукта*;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 1дня і менше&lt;/td&gt;
&lt;td&gt;- 100 (сто) відсотків від вартості Турпродукта*.&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;*Тут до вартості Турпродукта не включена вартість квитків на чартерні та регулярні авіарейси.&lt;br /&gt;Вартість авіаперевезення до/з країн, в&amp;rsquo;їзд до яких для громадян України потребує попереднього оформлення візи, стягується в розмірі 100 (ста) відсотків вартості авіаперевезення при відмові Туриста&lt;strong&gt;(ів)&lt;/strong&gt; від Договору у строк від 21 дня і менше до початку подорожі.*Тут до вартості Турпродукта не включена вартість квитків на чартерні та регулярні авіарейси.&amp;nbsp;Вартість авіаперевезення до/з країн, в&amp;rsquo;їзд до яких для громадян України не потребує попереднього оформлення візи, або до/з безвізових для громадян України країн, &amp;nbsp;стягується в розмірі 100 (ста) відсотків вартості авіаперевезення при відмові Туриста(ів) від Договору у строк від 14 днів і менше до початку подорожі.&amp;nbsp;Вартість авіаперевезення на чартерних авіарейсах зазначена на сайті Туроператора&amp;nbsp;&lt;a href=&quot;http://www.tez-tour.com&quot;&gt;www.tez-tour.com&lt;/a&gt;.&amp;nbsp;Вартість авіаперевезення на регулярних авіарейсах Туроператор повідомляє Туристу&lt;strong&gt;(ам) &lt;/strong&gt;через Турагента&amp;nbsp; при укладенні цього Договору&lt;strong&gt;.&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;При відмові Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору за яким&amp;nbsp; подорож починається у період Новорічних та Різдвяних свят (з 20 грудня по 10 січня), у період Травневих свят (з 26 квітня по 10 травня) у періоди виставок, ярмарок&amp;nbsp; або при зміні Заявки, з Туриста&lt;strong&gt;(тів)&lt;/strong&gt; стягується на користь Туроператора його витрати&amp;nbsp; із забезпечення надання Туристу&lt;strong&gt;(там)&lt;/strong&gt; туристичного продукту. Ці витрати відповідно до укладених Туроператором угод з основними партнерами, які надають туристичні послуги для реалізації, складають:&lt;/p&gt;
&lt;table&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td&gt;Термін відмови туриста(тів) від Договору до початку подорожі&lt;/td&gt;
&lt;td&gt;Сума, що підлягає стягненню з Туриста(тів) (витрати Туроператора)&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 14 днів до 8 днів&lt;/td&gt;
&lt;td&gt;-30 (тридцять) відсотків від вартості Турпродукта*;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 7 днів до 2 днів&lt;/td&gt;
&lt;td&gt;-50 (п'ятдесят) відсотків від вартості Турпродукта*;&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Від 1 дня та менше&lt;/td&gt;
&lt;td&gt;- 100 (сто) відсотків від вартості Турпродукта*.&lt;br /&gt;&lt;br /&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;*Тут до вартості Турпродукта не включена вартість квитків на чартерні та регулярні авіарейси.&lt;br /&gt;Вартість авіаперевезення до/з країн, в&amp;rsquo;їзд до яких для громадян України потребує попереднього оформлення візи, стягується в розмірі 100 (ста) відсотків вартості авіаперевезення при відмові Туриста(ів)&amp;nbsp;від Договору у строк від 21 дня і менше до початку подорожі.*Тут до вартості Турпродукта не включена вартість квитків на чартерні та регулярні авіарейси.&amp;nbsp;Вартість авіаперевезення до/з країн, в&amp;rsquo;їзд до яких для громадян України не потребує попереднього оформлення візи, або до/з безвізових для громадян України країн, &amp;nbsp;стягується в розмірі 100 (ста) відсотків вартості авіаперевезення при відмові Туриста(ів) від Договору у строк від 14 днів і менше до початку подорожі.&amp;nbsp;Вартість авіаперевезення на чартерних авіарейсах зазначена на сайті Туроператора&amp;nbsp;&lt;a href=&quot;http://www.tez-tour.com&quot;&gt;www.tez-tour.com&lt;/a&gt;.&amp;nbsp;Вартість авіаперевезення на регулярних авіарейсах Туроператор повідомляє Туристу(ам)&amp;nbsp;через Турагента&amp;nbsp; при укладенні цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br /&gt;2.2.11. Якщо розмір витрат Туроператора, яких він зазнав через відмову Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору, перевищує розміри, зазначені в п. 2.2.10, Турист&lt;strong&gt;(и)&lt;/strong&gt; відшкодовує&lt;strong&gt;(ють)&lt;/strong&gt; Туроператору витрати у повному обсязі.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;2.2.12. Після закінчення подорожі прибути до представництва держави, яке надало Туристу&lt;strong&gt;(там)&lt;/strong&gt; туристичну візу з умовою явки до такого представництва упродовж 15 днів з моменту повернення Туриста&lt;strong&gt;(тів)&lt;/strong&gt; в Україну.&lt;/p&gt;
&lt;ol start=&quot;3&quot;&gt;
&lt;li&gt;&lt;strong&gt;&lt;u&gt; ВІДПОВІДАЛЬНІСТЬ СТОРІН&lt;/u&gt;&lt;/strong&gt;&lt;/li&gt;
&lt;/ol&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.1. У випадку невиконання або неналежного виконання умов даного Договору сторони несуть відповідальність згідно чинного законодавства України та умов цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.2. Турист&lt;strong&gt;(и)&lt;/strong&gt; несе&lt;strong&gt;(уть)&lt;/strong&gt; відповідальність за пошкодження майна або здійснення протиправних дій під час поїздки, згідно з чинним законодавством країни тимчасового перебування.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.3. У випадку порушення Туристом&lt;strong&gt;(тами)&lt;/strong&gt;, який використовує туристичні послуги Туроператора, діючих правил проїзду, реєстрації чи провозу багажу, нанесення збитків майну транспортної компанії чи порушення правил проживання в готелі або недотримання законодавства країни перебування, штрафи стягуються з Туриста&lt;strong&gt;(тів)&lt;/strong&gt; в розмірах, передбачених відповідними правилами і нормами транспортної компанії, готелю, країни перебування. Туроператор в даному випадку відповідальності не несе.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.4. Турист&lt;strong&gt;(и)&lt;/strong&gt; несе&lt;strong&gt;(уть)&lt;/strong&gt; відповідальність за використання Ваучера, страхового поліса та інших документів, які повинні ним повертатися відповідно до п. 2.2.8. цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.5. У випадку відмови Туроператора від виконання даного Договору, Турист&lt;strong&gt;(и)&lt;/strong&gt; має&lt;strong&gt;(ють)&lt;/strong&gt; право на відшкодування збитків, підтверджених у встановленому порядку та заподіяних внаслідок розірвання даного Договору, крім випадку, коли це відбулося з вини Туриста&lt;strong&gt;(тів)&lt;/strong&gt;.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Однією з причин відмови Туроператора від цього Договору є не отримання ним впродовж трьох банківських днів з моменту укладення цього Договору грошових коштів від Турагента, які він отримав від Туриста(&lt;strong&gt;ів&lt;/strong&gt;) за тур. У відповідності до п. 4.3 агентського договору, укладеного між Туроператором та Турагентом, в такому разі Турагент зобов&amp;rsquo;язується негайно повернути Туристу (&lt;strong&gt;ам&lt;/strong&gt;) отримані від нього (них) усі грошові кошти за тур, а також відшкодувати у повному об&amp;rsquo;ємі збитки, заподіяні в наслідок розірвання Договору на туристичне обслуговування.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.6. У випадках скасування чи зміни часу відправлення та/чи прибуття авіарейсів і пов'язаними з цим змінами тривалості і програми туру, претензії приймаються Туроператором (перевізником за договором) до розгляду. При цьому на Туроператора поширюються всі умови та обмеження відповідальності, які встановлені Правилами повітряних перевезень&amp;nbsp; пасажирів і багажу, Правилами фактичного перевізника, міжнародними конвенціями в галузі повітряних перевезень та іншими нормативними актами в сфері перевезень.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;У випадках скасування чи зміни часу відправлення та/чи прибуття регулярних рейсів, відмови у перевезенні на регулярному рейсі і пов'язаними з цим змінами тривалості і програми туру Туроператор, як агент з продажу перевезень авіакомпанії, передає претензії Туриста&lt;strong&gt;(тів)&lt;/strong&gt; на розгляд авіакомпанії,&amp;nbsp; яка уклала з Туристом&lt;strong&gt;(тами)&lt;/strong&gt; за посередництва Туроператора&amp;nbsp; договір&lt;strong&gt;(и)&lt;/strong&gt; перевезення.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.7. Туроператор не несе відповідальності за схоронність багажу, цінностей та документів Туристів&amp;nbsp; протягом усього періоду перебування у подорожі.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.8. Туроператор не несе відповідальності, якщо рішенням влади чи відповідних осіб Туристу&lt;strong&gt;(там)&lt;/strong&gt; відмовлено в можливості в'їзду чи виїзду внаслідок порушення правопорядку або інших причин, або якщо внаслідок будь-яких інших причин, незалежних від Туроператора, Турист&lt;strong&gt;(и)&lt;/strong&gt; не скористався&lt;strong&gt;(лися)&lt;/strong&gt; Турпродуктом.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.9. Туроператор не несе відповідальності щодо відшкодування грошових витрат Туриста&lt;strong&gt;(тів)&lt;/strong&gt; за оплачені послуги, якщо Турист&lt;strong&gt;(и)&lt;/strong&gt; у період обслуговування за своїм розсудом чи в зв'язку із своїми інтересами не скористався&lt;strong&gt;(лися)&lt;/strong&gt; всіма чи частиною запропонованих та сплачених послуг та не відшкодовує Туристу&lt;strong&gt;(там)&lt;/strong&gt; витрати, що виходять за межі послуг, обумовлених цим Договором.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.10. Туроператор не несе відповідальності за витрати Туриста&lt;strong&gt;(тів)&lt;/strong&gt;, пов&amp;rsquo;язані із настанням страхового випадку. У разі настання страхового випадку, претензії та заяви по витратах Турист&lt;strong&gt;(и)&lt;/strong&gt; пред&amp;rsquo;являє&lt;strong&gt;(ють)&lt;/strong&gt; в страхову компанію, вказану в страховому полісі.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.11. Туроператор не несе відповідальності за відмову посольства іноземної&amp;nbsp; держави у видачі віз Туристу&lt;strong&gt;(там)&lt;/strong&gt; за маршрутом туристичного продукту.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.12. У випадку невиїзду Туриста&lt;strong&gt;(тів)&lt;/strong&gt; внаслідок неправильного оформлення паспортних, візових та інших документів, Туроператор відповідальності не несе, за винятком випадків коли Туроператор взяв на себе обов&amp;rsquo;язок з оформлення таких документів.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.13. Розміри відшкодувань, визначені в п. 2.2.10 цього Договору, не розповсюджуються на випадки відмови Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від цього Договору, за яким він придбаває спеціальний тур (тури в Австрію, Андору, Білорусію, Болгарію, Угорщину, Грецію, Грузію, Домініканську республіку, Індонезію, Іспанію,&amp;nbsp; Італію,&amp;nbsp; на Кіпр, Кубу, в Китай, Латвію, Литву, на Маврикій, Мальдіви, в Мексику, ОАЕ, Португалію, на Сейшели, в Таїланд, у Францію, в Чехію, на Шрі-Ланку, в Естонію, &amp;nbsp;тури по Україні, тури раннього бронювання, а також інші тури, визначені Туроператором, як спеціальні, про що інформується(&lt;strong&gt;ються)&lt;/strong&gt; Турист&lt;strong&gt;(и)&lt;/strong&gt; через Турагента). Інформація про розміри стягнень за відмову Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від виконання цього Договору, за яким він придбаває спеціальний тур, розміщується на офіційному сайті Туроператора www.tez-tour.com, з якою Турагент ознайомлює Туриста&lt;strong&gt;(тів)&lt;/strong&gt;.&amp;nbsp; Підписання цього договору підтверджує згоду Туриста&lt;strong&gt;(тів)&lt;/strong&gt; з розмірами зазначених стягнень&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.14. Не заселення Туриста&lt;strong&gt;(тів)&lt;/strong&gt; в номер готелю в дату, вказану в замовленні, з причин, що не залежать від дій Туроператора та/або готелю, вважається відмовою Туриста&lt;strong&gt;(тів)&lt;/strong&gt; від виконання цього Договору (строк від одного дня і менше) і тягне за собою застосування п.2.2.10 цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.15. Якщо Турист&lt;strong&gt;(и)&lt;/strong&gt; неправомірно з власної ініціативи залишився&lt;strong&gt;(лися)&lt;/strong&gt; в країні тимчасового перебування&amp;nbsp; після закінчення строку туру, він&lt;strong&gt;(вони)&lt;/strong&gt; зобов&amp;rsquo;язаний&lt;strong&gt;(і)&lt;/strong&gt; компенсувати Туроператору усі його витрати, пов&amp;rsquo;язані з таким неправомірним вчинком.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.16. У випадку, визначеному у ч. 11 ст. 20 закону України &amp;laquo;Про туризм&amp;raquo;, Туроператор виплачує Туристу&lt;strong&gt;(там)&lt;/strong&gt; компенсацію у розмірі 500 грн. на один ваучер.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;3.17. У випадку порушення Туристом&lt;strong&gt;(тами)&lt;/strong&gt; п. 2.2.12 цього Договору, Туроператор має право стягнути з Туриста&lt;strong&gt;(тів)&lt;/strong&gt;&amp;nbsp; штраф у розмірі еквівалентному 500 євро за комерційним курсом Туроператора.&lt;/p&gt;
&lt;ol start=&quot;4&quot;&gt;
&lt;li&gt;&lt;strong&gt;&lt;u&gt; ЗАГАЛЬНА ВАРТІСТЬ ТУРИСТИЧНИХ ПОСЛУГ&lt;/u&gt;&lt;/strong&gt;&lt;/li&gt;
&lt;/ol&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;4.1. Загальна вартість туристичного продукту, замовленого Туристом&lt;strong&gt;(тами)&lt;/strong&gt; (цифрами та прописом) <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSum'];?>
 грн. <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumString'];?>
, що складає еквівалент <?php echo $_smarty_tpl->tpl_vars['data']->value['DealSumEquivalent'];?>
 дол. США &lt;em&gt;(або Євро)&lt;/em&gt; за комерційним курсом Туроператора, який наведений на сайті &lt;a href=&quot;http://www.www.tez-tour.com&quot;&gt;www.www.tez-tour.com&lt;/a&gt;. Передплата за договором становить&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['PrePaySum'];?>
. Повну оплату по договору провести &amp;nbsp;в строк до <?php echo $_smarty_tpl->tpl_vars['data']->value['DateFullPay'];?>
.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;4.2. Оплата Туроператору через Турагента вартості замовлених туристичних послуг проводитися у готівковій або безготівковій формі за домовленістю&amp;nbsp; з Турагентом.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;4.3. Збільшення ціни Турпродукту можливе з моменту укладення цього Договору і до початку туристичної подорожі. При цьому збільшення ціни Турпродукту не може перевищувати п'яти відсотків його початкової ціни, яка визначена у п.4.1 цього Договору. У разі збільшення ціни Турпродукту, Турист&lt;strong&gt;(и)&lt;/strong&gt; до початку подорожі зобов&amp;rsquo;язується&lt;strong&gt;(ються)&lt;/strong&gt; доплатити його вартість. Повідомленням Туриста&lt;strong&gt;(тів)&lt;/strong&gt; про збільшення ціни Турпродукту є рахунок Туроператора, виставлений Турагенту для перерахування останнім коштів, отриманих від Туриста &lt;strong&gt;(тів)&lt;/strong&gt;.&lt;/p&gt;
&lt;p&gt;4.4. Платниками за цим договором можуть бути Турист (Замовник) - довірена особа, або &amp;nbsp;кожна із осіб (Туристів) зазначених в Договорі або в Заявці (Додатку №1 до цього договору).&lt;/p&gt;
&lt;ol start=&quot;5&quot;&gt;
&lt;li&gt;&lt;strong&gt;&lt;u&gt; ПОРЯДОК ВИРІШЕННЯ СУПЕРЕЧОК&lt;/u&gt;&lt;/strong&gt;&lt;/li&gt;
&lt;/ol&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;5.1. Всі суперечки, які можуть виникнути в ході виконання даного Договору, Сторони зобов&amp;rsquo;язуються&amp;nbsp; вирішувати шляхом переговорів, а у випадку недосягнення згоди &amp;ndash; згідно чинного законодавства України.&lt;/p&gt;
&lt;ol start=&quot;6&quot;&gt;
&lt;li&gt;&lt;strong&gt;&lt;u&gt; ДОДАТКОВІ УМОВИ&lt;/u&gt;&lt;/strong&gt;&lt;/li&gt;
&lt;/ol&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.1. Даний Договір укладений в двох примірниках українською мовою, що мають однакову юридичну силу, по одному примірнику для кожної Сторони.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.2. Сторони погодилися з тим, що їх права та обов'язки за цим договором, крім обов'язку Туроператора повернути Туристу&lt;strong&gt;(там)&lt;/strong&gt; сплачені ним&lt;strong&gt;(и)&lt;/strong&gt; кошти в строк, вказаний в п.2.1.3.цього договору, припиняються при настанні скасувальної обставини, якою є відмова партнерів Туроператора, які надають туристичні послуги для реалізації, у наданні таких послуг. Про настання скасувальної обставини, а також про її зникнення Туроператор повідомляє Туриста&lt;strong&gt;(тів)&lt;/strong&gt; через Турагента .&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.3. Даний Договір набуває сили з моменту підписання і діє до повного виконання сторонами своїх зобов&amp;rsquo;язань.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.4. Туроператор у випадку виникнення обставин непереборної сили має право за погодженням з Туристом&lt;strong&gt;(тами)&lt;/strong&gt; замінити замовлений готель або номер у готелі на рівноцінний або вищої категорії без зниження в класі обслуговування.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.5. Підписанням цього Договору Турист&lt;strong&gt;(и)&lt;/strong&gt; надає&lt;strong&gt;(ють)&lt;/strong&gt; згоду на обробку його&lt;strong&gt;(їх)&lt;/strong&gt;&amp;nbsp; персональних даних Туроператором та Турагентом&amp;nbsp; з метою забезпечення надання туристичного продукту в обсязі, необхідному для досягнення зазначеної мети. Право визначення обсягу обробки персональних даних Турист&lt;strong&gt;(и)&lt;/strong&gt; надає&lt;strong&gt;(ють)&lt;/strong&gt; Туроператору та Турагенту.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;Включення персональних даних Туриста&lt;strong&gt;(тів)&lt;/strong&gt; до бази персональних даних Турагента відбувається в момент укладення цього Договору.&amp;nbsp; Підписанням цього Договору Турист&lt;strong&gt;(и)&lt;/strong&gt; засвідчує&lt;strong&gt;(ють)&lt;/strong&gt; свою обізнаність про таке включення, про свої права,&amp;nbsp; визначені у&amp;nbsp; законі України &amp;laquo;Про захист персональних даних&amp;raquo;,&amp;nbsp; про мету збору даних та осіб, яким передаються його персональні дані.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.6. Перевезення Туриста&lt;strong&gt;(тів)&lt;/strong&gt; може здійснюватися рейсом будь-якої авіакомпанії, незалежно від того, яка авіакомпанія зазначена у авіаквитку. Туроператор гарантує авіаперевезення Туриста&lt;strong&gt;(тів)&lt;/strong&gt; з міста вильоту до міста призначення. Аеропорти міста вильоту та міста призначення можуть відрізнятися від зазначених в&amp;nbsp; авіаквитку.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.7. Сторони домовились, що зміна умов Договору з ініціативи Туроператора проводиться шляхом направлення відповідної пропозиції через Турагента Туристу&lt;strong&gt;(там)&lt;/strong&gt;, який&lt;strong&gt;(і)&lt;/strong&gt; в письмовій формі протягом доби з моменту отримання такої пропозиції повідомляє&lt;strong&gt;(ють)&lt;/strong&gt; через Турагента Туроператора про своє рішення. Не надходження відповіді Туриста&lt;strong&gt;(тів)&lt;/strong&gt;, поданої ним через Турагента,&amp;nbsp; протягом зазначеного в даному пункті строку Сторони вважають згодою Туриста&lt;strong&gt;(тів) &lt;/strong&gt;на зміну умов даного Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.8. Усі правовідносини, що виникають з цього Договору або пов'язані із ним, у тому числі пов'язані із дійсністю, укладенням, виконанням, зміною та припиненням цього Договору, тлумаченням його умов, визначенням наслідків недійсності або порушення Договору, регламентуються цим Договором та відповідними нормами чинного в Україні законодавства, а також застосовними до таких правовідносин звичаями ділового обороту на підставі принципів добросовісності, розумності та справедливості.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.9. Після набрання чинності цим Договором всі попередні переговори за ним, листування, попередні договори, протоколи про наміри та будь-які інші усні або письмові домовленості Сторін з питань, що так чи інакше стосуються цього Договору, втрачають юридичну силу, але можуть братися до уваги при тлумаченні умов цього Договору.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.10. Сторони несуть повну відповідальність за правильність вказаних ними у цьому Договорі реквізитів та зобов'язуються своєчасно у письмовій формі повідомляти іншу Сторону про їх зміну, а у разі неповідомлення несуть ризик настання пов'язаних із цим несприятливих наслідків.&lt;/p&gt;
&lt;p style=&quot;text-align: justify;&quot;&gt;6.11. Додаткові угоди та додатки до цього Договору є його невід'ємними частинами і мають юридичну силу у разі, якщо вони викладені у письмовій формі та підписані Сторонами..&lt;/p&gt;
&lt;ol start=&quot;7&quot;&gt;
&lt;li&gt;&lt;strong&gt;&lt;u&gt; РЕКВІЗИТИ СТОРІН&lt;/u&gt;&lt;/strong&gt;&lt;/li&gt;
&lt;/ol&gt;
&lt;p&gt;&amp;bdquo;Мною отримана вся необхідна інформація, передбачена&amp;nbsp;законом України &amp;bdquo;Про туризм&amp;rdquo;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;ЗА ТУРОПЕРАТОРА&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; ТУРИСТ(И*)&amp;nbsp;&amp;nbsp; &lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['Name'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeAddress'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['FactAddress'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficePhone'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['OfficeMobile'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; <?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;Підпис______________________&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Підпис_______________________&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;*зазначається ПІБ та інші дані кожного з туристів разом з підписом. Допускається підписання&amp;nbsp; представником, які має належним чином оформлені повноваження&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&lt;!-- pagebreak --&gt;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;Додаток №1 до договору на туристичне обслуговування від <?php echo $_smarty_tpl->tpl_vars['data']->value['DealDate'];?>
 &amp;nbsp;№ &amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DealNo'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;ЗАМОВЛЕННЯ&lt;/strong&gt;&lt;/p&gt;
&lt;p style=&quot;text-align: center;&quot;&gt;&lt;strong&gt;(програма туристичного обслуговування)&lt;/strong&gt;&lt;/p&gt;
&lt;table&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;Дата початку/закінчення туристичного обслуговування&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;3&quot; width=&quot;475&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateArrival'];?>
 /&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DateDeparture'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td rowspan=&quot;3&quot; width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Перевезення&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Вид / категорія ТЗ*&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['Transport'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Відправлення дата/час/місце (дані можуть змінюватись відповідно до розкладу)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightAArrivalDate'];?>
 -&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightADepartureDate'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Повернення дата/час/місце&amp;nbsp;(дані можуть змінюватись відповідно до розкладу)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBArrivalDate'];?>
 -&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlightBDepartureDate'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td rowspan=&quot;7&quot; width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Розміщення&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Готель/категорія&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelName'];?>
 /&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['HotelStars'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Розташування готелю&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['DirectionName'];?>
 /&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['RegionName'];?>
&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Підтвердження відповідності&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;Відповідність послуг готелю встановленим вимогам підтверджена готелем&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Строк перебування в готелі&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['AmountNight'];?>
 ночей&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Порядок оплати&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;Окремо не встановлюються. Вартість готельного обслуговування включена до вартості турпродукту.&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Номер (standart, інше)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;&amp;nbsp;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FlatTypeName'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;142&quot;&gt;
&lt;p&gt;Тип (SNG, DBL, DBL+EX.BED, інше)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;333&quot;&gt;
&lt;p&gt;<?php echo $_smarty_tpl->tpl_vars['data']->value['PlacingTypeName'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;Харчування&lt;/strong&gt;&amp;nbsp; (BB, HB, ALL,&amp;nbsp; інше)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;3&quot; width=&quot;475&quot;&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['FeedName'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;Екскурсії&lt;/strong&gt;(так або ні/назва)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;3&quot; width=&quot;475&quot;&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;Трансфер&lt;/strong&gt;(груповий, індивідуальний, vip)&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;3&quot; width=&quot;475&quot;&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['TransferName'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td rowspan=&quot;2&quot; width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;strong&gt;Страхування&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;2&quot; width=&quot;151&quot;&gt;
&lt;p&gt;&lt;strong&gt;Страховик, що здійснює обов&amp;rsquo;язкове медичне та від&amp;nbsp; нещасного випадку страхування &lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td width=&quot;323&quot;&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['Insurance'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td colspan=&quot;2&quot; width=&quot;151&quot;&gt;
&lt;p&gt;&lt;strong&gt;Страховик, що здійснює добровільне страхування&amp;nbsp; &lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;/td&gt;
&lt;td width=&quot;323&quot;&gt;
&lt;p&gt;&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['Insurance'];?>
&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td width=&quot;225&quot;&gt;
&lt;p&gt;&lt;strong&gt;Інші послуги&lt;/strong&gt;&lt;/p&gt;
&lt;/td&gt;
&lt;td colspan=&quot;3&quot; width=&quot;475&quot;&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;p&gt;&lt;strong&gt;* ТЗ &amp;ndash; транспортний засіб&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;&lt;em&gt;ПАСПОРТНІ ДАНІ ТУРИСТА&lt;/em&gt;&lt;/p&gt;
&lt;p&gt;&lt;em&gt;(латинськими літерами, як в закордонному паспорті)&lt;/em&gt;&lt;/p&gt;
&lt;pre&gt;&amp;lt;table&amp;gt;
&amp;lt;thead&amp;gt;
&amp;lt;tr&amp;gt;
	&amp;lt;th&amp;gt;Фамилия&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Имя&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Тип документа&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;First Name&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Last Name&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Серия номер&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Действующий&amp;lt;/th&amp;gt;
	&amp;lt;th&amp;gt;Кем выдан&amp;lt;/th&amp;gt;
&amp;lt;/tr&amp;gt;
&amp;lt;/thead&amp;gt;
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_ext']->value['contactmembers'], 'contact', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
&amp;lt;tr&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['FirstName'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['LastName'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['DocTypeName'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['FirstName'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['LastName'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['SeriaNum'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['Valid'];?>
&amp;lt;/td&amp;gt;
	&amp;lt;td&amp;gt;<?php echo $_smarty_tpl->tpl_vars['contact']->value['documents'][0]['IssuedBy'];?>
&amp;lt;/td&amp;gt;
&amp;lt;/tr&amp;gt;<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

&amp;lt;/table&amp;gt;&amp;nbsp;&lt;/pre&gt;
&lt;p&gt;&amp;nbsp;&lt;strong&gt;Підпис Турагента_________________ &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['account']->value['DirectorName'];?>
 &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/strong&gt;&lt;/p&gt;
&lt;p&gt;&amp;nbsp;&lt;/p&gt;
&lt;p&gt;&lt;strong&gt;Підпис Туриста (тів)______________________&amp;nbsp;<?php echo $_smarty_tpl->tpl_vars['data']->value['ContactFullName'];?>
&lt;/strong&gt;&lt;/p&gt;<?php }
}
