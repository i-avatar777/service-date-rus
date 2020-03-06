<?php

function calc($time2) {

// Доля 1/1296 Славяно-Арийской Части Часа
    $Dolja_SlavAri = 0;

// количество (с нулями) Частей (каждая 1/144 Часа) Славяно-Арийского часа
    $Chasti = "";

// Час Славяно-Арийский (1/16 суток)
    $Chas_SlavAri = 4;

// Название Славяно-Арийского Часа
    $Chas = "";

// Время суток
    $Jar = "";

// день недели форматированный
    $Dni = "";

// день недели int
    $Dni_int = null;

// Число Славяно-Арийского Месяца (в чётный месяц - 40 дней, в нечётный - 41)
    $Chislo_SlavAri = 21;

// Славяно-Арийский Месяц (1-9)
    $Mes_SlavAri = 3;

// Славяно-Арийский Месяц (РАБГДЭВХТ)
    $Mes = "Бейлетъ";

// Лето в Круге Лет - Круг - 16 Лет = 15 Простых Лет + 1 Священное Лето (все 9 Месяцев по 41 дню)
    $Krug_Let = 6;

// Название Лета ("первое" - Звёздного Храма)
    $Krug = "";

// Лето в Круге Жизни - Цикл 144 Лета = 9 Кругов Лет
    $Krug_Zizni = 102;

// Лето от Сотворения Мира в Звёздном Храме (Победы над Аримами) на полночь 1 января 1970 года от Р.Х.
    $S_M_Z_H = 7478;

// Чертог, где находится Ярило-Солнце
    $Chertog = "";


    $today = $time2;
    $mSec_Greg = $today * 1000; // миллисекунд от полночи 1 января 1970 года до "сейчас"

//	Эти удальцы "привязали" функцию getTime() к "Гринвичу" - по сему надо "добавлять свой пояс"
//	a в функцию getTimezoneOffset(), которая должна возвращать различие в минутах между
//	локальным и универсальным временем, "воткнули минус" - посему и мы "на их минус" ... "свой"
    $mSec_SlavAri = $mSec_Greg + 21600000; // миллисекунд от 16:000 21 Бейлетъ 7478 лета от С.М.З.Х. до "сейчас"

//	определяем зимнее или летнее время и отнимаем 3600000 миллисекунд, если летнее время
//$mSec_SlavAri = $mSec_SlavAri - (((new Date(2010, 0, 1)).getTimezoneOffset() - new Date().getTimezoneOffset())) * 60 * 1000;

// остаток миллисекунд в новых (текущих) сутка - сегодня
    $Vrem_SlavAri = ($mSec_SlavAri % 86400000);

// Славяно-Арийский час "числом" (текущий)
    $Chas_SlavAri = round($Vrem_SlavAri / 5400000.00);

// Славяно-Арийских частей часа (текущих)
    $Chast_SlavAri = round(($Vrem_SlavAri % 5400000) / 37500.00);

// прошло целых дней от 21 Бейлетъ 7478 от С.М.З.Х. до "сейчас"
    $Dney_SlavAri = round(1.00 * ($mSec_SlavAri / 86400000));

// День недели "числом" + "1", чтобы Понедельникъ был "1", а не "0" и Вторникъ - "2" т.д.
    $Den_SlavAri = 1 + round($Dney_SlavAri % 9.00);

//
    if ($Den_SlavAri == 1) $Dni = "<b>Понедельникъ</b><br> 1 день недели<br>день Земли-Хорса (Меркурия)";
    if ($Den_SlavAri == 2) $Dni = "<b>Вторникъ</b><br> 2 день недели<br>день Земли-Ореи (Марса)";
    if ($Den_SlavAri == 3) $Dni = "<b>Тритейникъ</b><br> 3 день недели<br>день Земли-Перуна (Юпитера)";
    if ($Den_SlavAri == 4) $Dni = "<b>Четверикъ</b><br> 4 день недели<br>день Земли-Варуны (Урана)";
    if ($Den_SlavAri == 5) $Dni = "<b>Пятница</b><br> 5 день недели<br>день Земли-Индры (Хирона)";
    if ($Den_SlavAri == 6) $Dni = "<b>Шестица</b><br> 6 день недели<br>день Земли-Стрибога (Сатурна)";
    if ($Den_SlavAri == 7) $Dni = "<b>Седьмица</b><br> 7 день недели<br>день Земли-Сварога (Дэи)";
    if ($Den_SlavAri == 8) $Dni = "<b>Осьмица</b><br> 8 день недели<br>день Земли-Мерцаны (Венеры)";
    if ($Den_SlavAri == 9) $Dni = "<b>Неделя</b><br> 9 день недели<br>день Ярилы-Солнца";
    if ($Chast_SlavAri < 10) $Chasti = "00" . $Chast_SlavAri;
    if ($Chast_SlavAri >= 10 && $Chast_SlavAri < 100) $Chasti = "0" . $Chast_SlavAri;
    if ($Chast_SlavAri >= 100) $Chasti = $Chast_SlavAri;
    if ($Chas_SlavAri >= 0 && $Chas_SlavAri < 4) $Jar = "Вечер";
    if ($Chas_SlavAri >= 4 && $Chas_SlavAri < 8) $Jar = "Ночь";
    if ($Chas_SlavAri >= 8 && $Chas_SlavAri < 12) $Jar = "Утро";
    if ($Chas_SlavAri >= 12 && $Chas_SlavAri <= 15) $Jar = "День";
    if ($Chas_SlavAri == 0) $Chas_SlavAri = 16; // у Наших Пращуров не было "пустого" часа (по аналогии 0:00 - можно считать как 24:00 :)
    if ($Chas_SlavAri == 16) $Chas = "<b>Поудани </b>(завершённый путь дня)  ";
    if ($Chas_SlavAri == 1) $Chas = "<b>Паобедъ</b>  ";
    if ($Chas_SlavAri == 2) $Chas = "<b>Вечиръ</b> (появление звёздной росы на Небесах)  ";
    if ($Chas_SlavAri == 3) $Chas = "<b>Ничь</b> (нечётное время трех Лун)  ";
    if ($Chas_SlavAri == 4) $Chas = "<b>Полничь</b> (полный путь Лун)  ";
    if ($Chas_SlavAri == 5) $Chas = "<b>Заутра</b> (звёздное утешение росы)  ";
    if ($Chas_SlavAri == 6) $Chas = "<b>Заура</b> (звёздное сияние, Зоря)  ";
    if ($Chas_SlavAri == 7) $Chas = "<b>Заурнице</b> (окончание звёздного сияния)  ";
    if ($Chas_SlavAri == 8) $Chas = "<b>Настя</b> (утренняя Зоря)  ";
    if ($Chas_SlavAri == 9) $Chas = "<b>Сваоръ</b> (восход Солнца доброго дня на Небесах)  ";
    if ($Chas_SlavAri == 10) $Chas = "<b>Утрось</b> (успокоение росы)  ";
    if ($Chas_SlavAri == 11) $Chas = "<b>Поутрось</b> (путь собирания успокоенной росы)  ";
    if ($Chas_SlavAri == 12) $Chas = "<b>Обестна</b> (обедня, совместное собрание) ";
    if ($Chas_SlavAri == 13) $Chas = "<b>Обесть </b>(обед, трапеза, время принятия пищи)  ";
    if ($Chas_SlavAri == 14) $Chas = "<b>Подани</b> (отдых после трапезы)  ";
    if ($Chas_SlavAri == 15) $Chas = "<b>Утдайни</b> (время окончания деяний)  ";

//
// 	доля [графическое отображение - переменная dol; цифрой - переменная dolya] в 1296 раз меньше части,
//	то есть = 37500 / 1296 = 28.93518518... миллисекунд
//	точность не имеет особого значения так как обновление (корректировка) производиться раз в 100 миллисекунд
// 	а сам компьютер считает интервалы времени в тиках: 1 сек = 18,2 тика (!!!)
//
    $dol = "0000";
    $dolya = round((($Vrem_SlavAri % 5400000) % 37500) / 28.93518518);

//
//	если убрать этот "кусок" - доли будут "молотить без остановок"
//
    $dolya = ((round($dolya / 16) * 16 + 1295) % 1296) + 1;

//
    if ($dolya < 10) $dol = "000" . $dolya;
    if ($dolya >= 10 && $dolya < 100) $dol = "00" . $dolya;
    if ($dolya >= 100 && $dolya < 1000) $dol = "0" . $dolya;
    if ($dolya >= 1000) $dol = $dolya;

    $localtime = $today;
    $h = date('G', $localtime);
    $m = (int)date('m', $localtime);
    $s = (int)date('s', $localtime);
    $yy = date('Y', $localtime);
    $y = date('y', $localtime);
    $l = date('n', $localtime) - 1;
    if ($l == 0) $l = "Январь - Зима";
    if ($l == 1) $l = "Февраль - Зима";
    if ($l == 2) $l = "Март - Весна";
    if ($l == 3) $l = "Апрель - Весна";
    if ($l == 4) $l = "Май - Весна";
    if ($l == 5) $l = "Июнь - Лето";
    if ($l == 6) $l = "Июль - Лето";
    if ($l == 7) $l = "Август - Лето";
    if ($l == 8) $l = "Сентябрь - Осень";
    if ($l == 9) $l = "Октябрь - Осень";
    if ($l == 10) $l = "Ноябрь - Осень";
    if ($l == 11) $l = "Декабрь - Зима";
    $d = (int)date('j', $localtime);
    if ($d == 1) $d = "Понедельник";
    if ($d == 2) $d = "Вторник";
    if ($d == 3) $d = "Среда";
    if ($d == 4) $d = "Четверг";
    if ($d == 5) $d = "Пятница";
    if ($d == 6) $d = "Суббота";
    if ($d == 0) $d = "Воскресенье";
//$da = localtime.getDate();
    $hh = ($h < 10 ? "0" : "") . $h;
    $mm = ($m < 10 ? "0" : "") . $m;
    $ss = ($s < 10 ? "0" : "") . $s;

//	теперь займемся собственно расчетом Числа, Месяца и Лета
//	отправной параметр - Dney_SlavAri число целых дней от 21 Бейлетъ 7478 от С.М.З.Х. до "сейчас"
//  зная, что Бейлетъ - третий Месяц (из 9), а Лето 7478 от С.М.З.Х было 102 Лето в Круге Жизни (из 144)
//  и 6 Лето в Круге Лет (из 16) воспользуемся этой информацией и "перейдем" к новолетию 7479 Лета от С.М.З.Х.
//	цикличностью не забывая, что каждое 16 Лето - Священное - то есть все Месяцы - по 41 дню.
//	21 день в Месяце Бейлетъ (c 21-ое по 41-ое), еще 120 дней (3 Месяца по 40 дней) и 123 дня (3 Месяца по 41 дню)
    $Dney_SlavAri = $Dney_SlavAri - 264;    //Получим число дней между Новолетием 7479 Лета от С.М.З.Х. и по вчерашний день включительно

// Следующее Число первое
    $Chislo_SlavAri = 1;

// Следующий Месяц Рамхатъ, то есть "первый"
    $Mes_SlavAri = 1;

// исходное	Krug_Let = 6  +  1
    $Krug_Let = 7;

// Исходное	Krug_Zizni = 102  +  1
    $Krug_Zizni = 103;

// Исходное S_M_Z_H = 7478   +   1
    $S_M_Z_H = 7479;

//	осталось посчитать от Новолетия 7479 до "вчера"
    while ($Dney_SlavAri > 0) {
        // отнимает (в цикле while) число полных Простых Лет
        if ($Krug_Let != 16 && $Dney_SlavAri >= 365) {
            $Dney_SlavAri = $Dney_SlavAri - 365;
            $Chislo_SlavAri = 1;
            $Mes_SlavAri = 1;
            $Krug_Let = $Krug_Let + 1;
            $Krug_Zizni = $Krug_Zizni + 1;
            $S_M_Z_H = $S_M_Z_H + 1;
        }

        // отнимает (в цикле while) число полных Священных Лет
        if ($Krug_Let == 16 && $Dney_SlavAri >= 369) {
            $Dney_SlavAri = $Dney_SlavAri - 369;
            $Chislo_SlavAri = 1;
            $Mes_SlavAri = 1;
            $Krug_Let = 1;
            if ($Krug_Zizni == 144) $Krug_Zizni = 1; else $Krug_Zizni = $Krug_Zizni + 1;
            $S_M_Z_H = $S_M_Z_H + 1;
        }

        // отнимает (в цикле while) для Простого Лета число полных нечетных Месяцев - по 41 дню
        if ($Krug_Let != 16 && $Dney_SlavAri < 365 && $Dney_SlavAri >= 41 && $Mes_SlavAri != 2 && $Mes_SlavAri != 4 && $Mes_SlavAri != 6 && $Mes_SlavAri != 8) {
            $Dney_SlavAri = $Dney_SlavAri - 41;
            $Chislo_SlavAri = 1;
            if ($Mes_SlavAri == 9) {
                $Mes_SlavAri = 1;
                $Krug_Let = $Krug_Let + 1;
                $Krug_Zizni = $Krug_Zizni + 1;
                $S_M_Z_H = $S_M_Z_H + 1;
            } else $Mes_SlavAri = $Mes_SlavAri + 1;
        }

        // отнимает (в цикле while) для Простого Лета число полных четных Месяцев - по 40 дней
        if ($Krug_Let != 16 && $Dney_SlavAri < 365 && $Dney_SlavAri >= 40 && $Mes_SlavAri != 1 && $Mes_SlavAri != 3 && $Mes_SlavAri != 5 && $Mes_SlavAri != 7 && $Mes_SlavAri != 9) {
            $Dney_SlavAri = $Dney_SlavAri - 40;
            $Chislo_SlavAri = 1;
            $Mes_SlavAri = $Mes_SlavAri + 1;
        }

        // отнимает (в цикле while) для Священного Лета число полных Месяцев - по 41 дню
        if ($Krug_Let == 16 && $Dney_SlavAri >= 41 && $Dney_SlavAri < 369) {
            $Dney_SlavAri = $Dney_SlavAri - 41;
            $Chislo_SlavAri = 1;
            if ($Mes_SlavAri == 9) {
                $Mes_SlavAri = 1;
                $Krug_Let = 1;
                if ($Krug_Zizni == 144) $Krug_Zizni = 1; else $Krug_Zizni = $Krug_Zizni + 1;
                $S_M_Z_H = $S_M_Z_H + 1;
            } else $Mes_SlavAri = $Mes_SlavAri + 1;
        }

        // отнимает (в цикле while) для Простого Лета число дней в нечетных Месяцах - которые по 41 дню
        if ($Krug_Let != 16 && $Dney_SlavAri > 0 && $Dney_SlavAri < 41 && $Mes_SlavAri != 2 && $Mes_SlavAri != 4 && $Mes_SlavAri != 6 && $Mes_SlavAri != 8) {
            $Dney_SlavAri = $Dney_SlavAri - 1;
            if ($Chislo_SlavAri == 41) {
                $Chislo_SlavAri = 1;
                if ($Mes_SlavAri == 9) {
                    $Mes_SlavAri = 1;
                    $Krug_Let = $Krug_Let + 1;
                    $Krug_Zizni = $Krug_Zizni + 1;
                    $S_M_Z_H = $S_M_Z_H + 1;
                } else $Mes_SlavAri = $Mes_SlavAri + 1;
            } else $Chislo_SlavAri = $Chislo_SlavAri + 1;
        }

        // отнимает (в цикле while) для Простого Лета число дней в четных Месяцах - которые по 40 дней
        if ($Krug_Let != 16 && $Dney_SlavAri > 0 && $Dney_SlavAri < 40 && $Mes_SlavAri != 1 && $Mes_SlavAri != 3 && $Mes_SlavAri != 5 && $Mes_SlavAri != 7 && $Mes_SlavAri != 9) {
            $Dney_SlavAri = $Dney_SlavAri - 1;
            if ($Chislo_SlavAri == 40) {
                $Chislo_SlavAri = 1;
                $Mes_SlavAri = $Mes_SlavAri + 1;
            } else $Chislo_SlavAri = $Chislo_SlavAri + 1;
        }

        // отнимает (в цикле while) для Священного Лета число дней в Месяце - которые все по 41 дню
        if ($Krug_Let == 16 && $Dney_SlavAri > 0 && $Dney_SlavAri < 41) {
            $Dney_SlavAri = $Dney_SlavAri - 1;
            if ($Chislo_SlavAri == 41) {
                $Chislo_SlavAri = 1;
                if ($Mes_SlavAri == 9) {
                    $Mes_SlavAri = 1;
                    $Krug_Let = 1;
                    if ($Krug_Zizni == 144) $Krug_Zizni = 1; else $Krug_Zizni = $Krug_Zizni + 1;
                    $S_M_Z_H = $S_M_Z_H + 1;
                } else $Mes_SlavAri = $Mes_SlavAri + 1;
            } else $Chislo_SlavAri = $Chislo_SlavAri + 1;
        }
    }

// Название Месяцев Славяно-Арийского Календаря (Коляды Даръ):
//
    if ($Mes_SlavAri == 1) $Mes = "<b>Рамхатъ</b><br>Сороковник Божественного Начала<br><b>Оусень</b>";
    if ($Mes_SlavAri == 2) $Mes = "<b>Айл&#1123;тъ</b><br>Сороковник Новых Даров<br><b>Зима</b>";
    if ($Mes_SlavAri == 3) $Mes = "<b>Бейл&#1123;тъ</b><br>Сороковник Белаго Сияния и Покоя Мира<br><b>Зима</b>";
    if ($Mes_SlavAri == 4) $Mes = "<b>Гэйл&#1123;тъ </b><br>Сороковник Вьюг и Стужи<br><b>Зима</b>";
    if ($Mes_SlavAri == 5) $Mes = "<b>Дайл&#1123;тъ</b><br>Сороковник Пробуждения Природы<br><b>Весна</b>";
    if ($Mes_SlavAri == 6) $Mes = "<b>Эл&#1123;тъ</b><br>Сороковник Посева и Наречения<br><b>Весна</b>";
    if ($Mes_SlavAri == 7) $Mes = "<b>Вэйл&#1123;тъ</b><br>Сороковник Ветров<br><b>Весна</b>";
    if ($Mes_SlavAri == 8) $Mes = "<b>Хейл&#1123;тъ</b><br>Сороковник Получения Даров Природы<br><b>Оусень</b>";
    if ($Mes_SlavAri == 9) $Mes = "<b>Тайл&#1123;тъ</b><br>Сороковник Завершения<br><b>Оусень</b>";

//
//
// Чертог, где находится Ярило-Солнце: в "переходной день" смена Чертога произходит в 14:000 (Подани - начало Времени отдыха после трапезы)
//   или в 15:00 - советского зимнего времени или в 16:00 - летнего времени
//
    if ($Mes_SlavAri == 1 && $Chislo_SlavAri == 1) $Chertog = "Ярило-Солнце Переходит из Чертога Девы в Чертог Вепря ";
    if ($Mes_SlavAri == 1 && $Chislo_SlavAri == 22) $Chertog = "Ярило-Солнце Переходит из Чертога Вепря в Чертог Шуки ";
    if ($Mes_SlavAri == 2 && $Chislo_SlavAri == 4) $Chertog = "Ярило-Солнце Переходит из Чертога Щуки в Чертог Лебедя ";
    if ($Mes_SlavAri == 2 && $Chislo_SlavAri == 25) $Chertog = "Ярило-Солнце Переходит из Чертога Лебедя в Чертог Змея ";
    if ($Mes_SlavAri == 3 && $Chislo_SlavAri == 7) $Chertog = "Ярило-Солнце Переходит из Чертога Змея в Чертог Ворона ";
    if ($Mes_SlavAri == 3 && $Chislo_SlavAri == 29) $Chertog = "Ярило-Солнце Переходит из Чертога Ворона в Чертог Медведя ";
    if ($Mes_SlavAri == 4 && $Chislo_SlavAri == 12) $Chertog = "Ярило-Солнце Переходит из Чертога Медведя в Чертог Бусла (Журавля) ";
    if ($Mes_SlavAri == 4 && $Chislo_SlavAri == 37) $Chertog = "Ярило-Солнце Переходит из Чертога Бусла (Журавля) в Чертог Волка ";
    if ($Mes_SlavAri == 5 && $Chislo_SlavAri == 22) $Chertog = "Ярило-Солнце Переходит из Чертога Волка в Чертог Лисы ";
    if ($Mes_SlavAri == 6 && $Chislo_SlavAri == 4) $Chertog = "Ярило-Солнце Переходит из Чертога Лисы в Чертог Тура ";
    if ($Mes_SlavAri == 6 && $Chislo_SlavAri == 26) $Chertog = "Ярило-Солнце Переходит из Чертога тура в Чертог Лося ";
    if ($Mes_SlavAri == 7 && $Chislo_SlavAri == 9) $Chertog = "Ярило-Солнце Переходит из Чертога Лося в Чертог Финиста ";
    if ($Mes_SlavAri == 7 && $Chislo_SlavAri == 31) $Chertog = "Ярило-Солнце Переходит из Чертога Финиста в Чертог Коня ";
    if ($Mes_SlavAri == 8 && $Chislo_SlavAri == 13) $Chertog = "Ярило-Солнце Переходит из Чертога Коня в Чертог Орла ";
    if ($Mes_SlavAri == 8 && $Chislo_SlavAri == 35) $Chertog = "Ярило-Солнце Переходит из Чертога Орла в Чертог Расы (Леопарда) ";
    if ($Mes_SlavAri == 9 && $Chislo_SlavAri == 18) $Chertog = "Ярило-Солнце Переходит из Чертога Расы (Леопарда) в Чертог Девы ";
    if ($Mes_SlavAri == 1 && $Chislo_SlavAri > 1 && $Chislo_SlavAri < 22) $Chertog = "Ярило-Солнце в Чертоге Вепря, Бог-Покровитель РАМХАТ ";
    if ($Mes_SlavAri == 1 && $Chislo_SlavAri > 22) $Chertog = "Ярило-Солнце в Чертоге Щуки, Богиня-Покровительница РОЖАНА ";
    if ($Mes_SlavAri == 2 && $Chislo_SlavAri < 4) $Chertog = "Ярило-Солнце в Чертоге Щуки, Богиня-Покровительница РОЖАНА ";
    if ($Mes_SlavAri == 2 && $Chislo_SlavAri > 4 && $Chislo_SlavAri < 25) $Chertog = "Ярило-Солнце в Чертоге Лебедя, Богиня-Покровительница МАКОШЬ ";
    if ($Mes_SlavAri == 2 && $Chislo_SlavAri > 25) $Chertog = "Ярило-Солнце в Чертоге Змея, Бог-Покровитель СЕМАРГЛ ";
    if ($Mes_SlavAri == 3 && $Chislo_SlavAri < 7) $Chertog = "Ярило-Солнце в Чертоге Змея, Бог-Покровитель СЕМАРГЛ ";
    if ($Mes_SlavAri == 3 && $Chislo_SlavAri > 7 && $Chislo_SlavAri < 29) $Chertog = "Ярило-Солнце в Чертоге Ворона, Бог-Покровитель КОЛЯДА ";
    if ($Mes_SlavAri == 3 && $Chislo_SlavAri > 29) $Chertog = "Ярило-Солнце в Чертоге Медведя, Бог-Покровитель СВАРОГ ";
    if ($Mes_SlavAri == 4 && $Chislo_SlavAri < 12) $Chertog = "Ярило-Солнце в Чертоге Медведя, Бог-Покровитель СВАРОГ ";
    if ($Mes_SlavAri == 4 && $Chislo_SlavAri > 12 && $Chislo_SlavAri < 37) $Chertog = "Ярило-Солнце в Чертоге Бусла (Аиста), Бог-Покровитель РОД ";
    if ($Mes_SlavAri == 4 && $Chislo_SlavAri > 37) $Chertog = "Ярило-Солнце в Чертоге Волка, Бог-Покровитель ВЕЛЕС ";
    if ($Mes_SlavAri == 5 && $Chislo_SlavAri < 22) $Chertog = "Ярило-Солнце в Чертоге Волка, Бог-Покровитель ВЕЛЕС ";
    if ($Mes_SlavAri == 5 && $Chislo_SlavAri > 22) $Chertog = "Ярило-Солнце в Чертоге Лисы, Богиня-Покровительница МАРЕНА ";
    if ($Mes_SlavAri == 6 && $Chislo_SlavAri < 4) $Chertog = "Ярило-Солнце в Чертоге Лисы, Богиня-Покровительница МАРЕНА ";
    if ($Mes_SlavAri == 6 && $Chislo_SlavAri > 4 && $Chislo_SlavAri < 26) $Chertog = "Ярило-Солнце в Чертоге Тура, Бог-Покровитель КРЫШЕНЬ ";
    if ($Mes_SlavAri == 6 && $Chislo_SlavAri > 26) $Chertog = "Ярило-Солнце в Чертоге Лося, Богиня-Покровительница ЛАДА ";
    if ($Mes_SlavAri == 7 && $Chislo_SlavAri < 9) $Chertog = "Ярило-Солнце в Чертоге Лося, Богиня-Покровительница ЛАДА ";
    if ($Mes_SlavAri == 7 && $Chislo_SlavAri > 9 && $Chislo_SlavAri < 31) $Chertog = "Ярило-Солнце в Чертоге Финиста, Бог-Покровитель ВЫШЕНЬ ";
    if ($Mes_SlavAri == 7 && $Chislo_SlavAri > 31) $Chertog = "Ярило-Солнце в Чертоге Коня, Бог-Покровитель КУПАЛА ";
    if ($Mes_SlavAri == 8 && $Chislo_SlavAri < 13) $Chertog = "Ярило-Солнце в Чертоге Коня, Бог-Покровитель КУПАЛА  ";
    if ($Mes_SlavAri == 8 && $Chislo_SlavAri > 13 && $Chislo_SlavAri < 35) $Chertog = "Ярило-Солнце в Чертоге Орла - Бог-Покровитель ПЕРУН ";
    if ($Mes_SlavAri == 8 && $Chislo_SlavAri > 35) $Chertog = "Ярило-Солнце в Чертоге Раса (Леопарда), Бог-Покровитель ТАРХ ";
    if ($Mes_SlavAri == 9 && $Chislo_SlavAri < 18) $Chertog = "Ярило-Солнце в Чертоге Раса (Леопарда), Бог-Покровитель ТАРХ ";
    if ($Mes_SlavAri == 9 && $Chislo_SlavAri > 18) $Chertog = "Ярило-Солнце в Чертоге Девы, Богиня-Покровительница ДЖИВА";

    $element_int = 0;
    $element_str = '';

//
//	можно теперь и со стихиями определиться (девять залов):
//
    if (in_array($Krug_Zizni, [1, 2, 19, 20, 37, 38, 55, 56, 73, 74, 91, 92, 109, 110, 127, 128]) >= 0) {
        $Krug = "Земного (Черного)";
        $element_str = "Земного (Черного)";
        $element_int = 1;
    }
    if (in_array($Krug_Zizni, [129, 130, 3, 4, 21, 22, 39, 40, 57, 58, 75, 76, 93, 94, 111, 112]) >= 0) {
        $Krug = "Звездного (Красного)";
        $element_str = "Звездного (Красного)";
        $element_int = 2;
    }
    if (in_array($Krug_Zizni, [113, 131, 5, 23, 41, 59, 77, 95, 114, 132, 6, 24, 42, 60, 78, 96]) >= 0) {
        $Krug = "Огненного (Алого)";
        $element_str = "Огненного (Алого)";
        $element_int = 3;
    }
    if (in_array($Krug_Zizni, [97, 98, 115, 116, 133, 134, 7, 8, 25, 26, 43, 44, 61, 62, 79, 80]) >= 0) {
        $Krug = "Солнечного (Златого)";
        $element_str = "Солнечного (Златого)";
        $element_int = 4;
    }
    if (in_array($Krug_Zizni, [81, 99, 117, 135, 9, 27, 45, 63, 82, 100, 118, 136, 10, 28, 46, 64]) >= 0) {
        $Krug = "Древесного (Зеленого)";
        $element_str = "Древесного (Зеленого)";
        $element_int = 5;
    }
    if (in_array($Krug_Zizni, [65, 83, 101, 119, 137, 11, 29, 47, 66, 84, 102, 120, 138, 12, 30, 48]) >= 0) {
        $Krug = "Свага (Небесного)";
        $element_str = "Свага (Небесного)";
        $element_int = 6;
    }
    if (in_array($Krug_Zizni, [49, 67, 85, 103, 121, 139, 13, 31, 50, 68, 86, 104, 122, 140, 14, 32]) >= 0) {
        $Krug = "Морского (Синего)";
        $element_str = "Морского (Синего)";
        $element_int = 7;
    }
    if (in_array($Krug_Zizni, [33, 51, 69, 87, 105, 123, 141, 15, 34, 52, 70, 88, 106, 124, 142, 16]) >= 0) {
        $Krug = "Лунного (Фиолетового)";
        $element_str = "Лунного (Фиолетового)";
        $element_int = 8;
    }
    if (in_array($Krug_Zizni, [17, 35, 53, 71, 89, 107, 125, 143, 18, 36, 54, 72, 90, 108, 126, 144]) >= 0) {
        $Krug = "Божественного (Белого)";
        $element_str = "Божественного (Белого)";
        $element_int = 9;
    }

// шестнадцать хором:
    $image_int = 0;
    $image_str = '';

    if (in_array($Krug_Zizni, [1, 129, 113, 97, 81, 65, 49, 33, 17]) >= 0) {
        $Krug = $Krug . " Странника (Пути) ";
        $image_str = "Странника (Пути)";
        $image_int = 1;
    }
    if (in_array($Krug_Zizni, [2, 130, 114, 98, 82, 66, 50, 34, 18]) >= 0) {
        $Krug = $Krug . " Жреца ";
        $image_str = "Жрец";
        $image_int = 2;
    }
    if (in_array($Krug_Zizni, [19, 3, 131, 115, 99, 83, 67, 51, 35]) >= 0) {
        $Krug = $Krug . " Жрицы (Девы) ";
        $image_str = "Жрица (Дева)";
        $image_int = 3;
    }
    if (in_array($Krug_Zizni, [20, 4, 132, 116, 100, 84, 68, 52, 36]) >= 0) {
        $Krug = $Krug . " Мира (Яви) ";
        $image_str = "Мiр (Явь)";
        $image_int = 4;
    }
    if (in_array($Krug_Zizni, [37, 21, 5, 133, 117, 101, 85, 69, 53]) >= 0) {
        $Krug = $Krug . " Свитока ";
        $image_str = "Свиток";
        $image_int = 5;
    }
    if (in_array($Krug_Zizni, [38, 22, 6, 134, 118, 102, 86, 70, 54]) >= 0) {
        $Krug = $Krug . " Феникса ";
        $image_str = "Феникс";
        $image_int = 6;
    }
    if (in_array($Krug_Zizni, [55, 39, 23, 7, 135, 119, 103, 87, 71]) >= 0) {
        $Krug = $Krug . " Лиса (Навь) ";
        $image_str = "Лис (Навь)";
        $image_int = 7;
    }
    if (in_array($Krug_Zizni, [56, 40, 24, 8, 136, 120, 104, 88, 72]) >= 0) {
        $Krug = $Krug . " Дракона ";
        $image_str = "Дракон";
        $image_int = 8;
    }
    if (in_array($Krug_Zizni, [73, 57, 41, 25, 9, 137, 121, 105, 89]) >= 0) {
        $Krug = $Krug . " Змея ";
        $image_str = "Змей";
        $image_int = 9;
    }
    if (in_array($Krug_Zizni, [74, 58, 42, 26, 10, 138, 122, 106, 90]) >= 0) {
        $Krug = $Krug . " Орла ";
        $image_str = "Орёл";
        $image_int = 10;
    }
    if (in_array($Krug_Zizni, [91, 75, 59, 43, 27, 11, 139, 123, 107]) >= 0) {
        $Krug = $Krug . " Дельфина ";
        $image_str = "Дельфин";
        $image_int = 11;
    }
    if (in_array($Krug_Zizni, [92, 76, 60, 44, 28, 12, 140, 124, 108]) >= 0) {
        $Krug = $Krug . " Коня ";
        $image_str = "Конь";
        $image_int = 12;
    }
    if (in_array($Krug_Zizni, [109, 93, 77, 61, 45, 29, 13, 141, 125]) >= 0) {
        $Krug = $Krug . " Пса ";
        $image_str = "Пёс";
        $image_int = 13;
    }
    if (in_array($Krug_Zizni, [110, 94, 78, 62, 46, 30, 14, 142, 126]) >= 0) {
        $Krug = $Krug . " Тура (быка) ";
        $image_str = "Тур (бык)";
        $image_int = 14;
    }
    if (in_array($Krug_Zizni, [127, 111, 95, 79, 63, 47, 31, 15, 143]) >= 0) {
        $Krug = $Krug . " Хоромы (дом) ";
        $image_str = "Хоромы (дом)";
        $image_int = 15;
    }
    if (in_array($Krug_Zizni, [128, 112, 96, 80, 64, 48, 32, 16, 144]) >= 0) {
        $Krug = $Krug . " Капище (храм) ";
        $image_str = "Капище (храм)";
        $image_int = 16;
    }

    return [
        // Доля
        'Dolja'         => $dolya,
        'DoljaFormat'   => $dol,

        // Часть
        'Chasti'        => $Chast_SlavAri,
        'ChastiFormat'  => $Chasti,

        // Час
        'Chas'          => $Chas_SlavAri,
        'ChasFormat'    => $Chas,

        // время суток
        'JarFormat'     => $Jar,

        // День недели
        'Dni'           => $Den_SlavAri,
        'DniFormat'     => $Dni,

        // День месяца
        'Chislo'        => $Chislo_SlavAri,

        // Месяц
        'Mes'           => $Mes_SlavAri,
        'MesMesFormat'  => $Mes,

        // Лето в Круге Лет - Круг - 16 Лет = 15 Простых Лет + 1 Священное Лето (все 9 Месяцев по 41 дню)
        'Krug_Let'      => $Krug_Let,
        'KrugFormat'    => $Krug,

        // Элемент
        'Element'       => $element_int,
        'ElementFormat' => $element_str,

        // Образ
        'Image'         => $image_int,
        'ImageFormat'   => $image_str,

        // Лето в Круге Жизни - Цикл 144 Лета = 9 Кругов Лет
        'Krug_Zizni'    => $Krug_Zizni,

        // Лето от Сотворения Мира в Звёздном Храме (Победы над Аримами) на полночь 1 января 1970 года от Р.Х.
        'S_M_Z_H'       => $S_M_Z_H,

        // Чертог, где находится Ярило-Солнце
        'Chertog'       => $Chertog,
        'ChertogFormat' => $Chertog
    ];
}
