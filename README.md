# service-date-rus

Сервис для форматирования дат с поддержкой русского календаря

Соответствует БОСТ 000006-7528 "О задании формата даты и времени в программном коде для русского календаря" http://avr3.ru/doHmJp

Таблица всех форматов:
https://docs.google.com/document/d/1aD4oE2K8KftErG1d6NJyruXTvY4SPrkMhSw3r80nr6Q/edit?usp=sharing

Функция преобразовывает строку форматирования в готовую строку с датой и временем по заданным параметрам.

В строке форматирования по мимо стандартных которая допускает функция date() (https://www.php.net/manual/ru/function.date.php) могут использоваться дополнителные коды:

- b - порядковое лето от сотворения мира в звездном храме (по русскому календарю)
- k - месяц по русски полный с маленькой буквы (родительный падеж, например: 1 февраля) по григорианскому календарю
- K - месяц по русски сокращенная версия 3 буквы по григорианскому календарю
- V - флаг священного лета 0 - нет 1 - да (для русского календаря)
- x - номер элемента лета 1-9 по русскому календарю (см ниже)
- X - номер образа лета 1-16 по русскому календарю (см ниже)
- C - День месяца рус от 1 до 41

## Инсталяция

Для инсталяции библиотеки используйте composer:

```json
{
    "require": {
        "i-avatar777/service-date-rus": "*"
    }
}
```

Или через команду

```
composer require i-avatar777/service-date-rus
```

## Список элементов лет

```       
1 Земля (Чёрный) 
2 Звезда (Красный) 
3 Огонь (Алый) 
4 Солнце (Златый) 
6 Свага (Небесный) 
7 Океан (Синий) 
8 Луна (ФиоЛѣтовый) 
9 Бог (Белый)
```

## Список образов лет

```       
1 Путь (странник)
2 Жрец
3 Жрица
4 Мiр (Явь)
5 Свиток
6 Феникс
7 Лис (Навь)
8 Дракон
9 Змей
10 Орёл
11 Дельфин
12 Конь
13 Пёс
14 Тур (бык)
15 Хоромы (дом)
16 Капище (храм)
```

## Пример использования

```
use iAvatar777\services\DateRus\DateRus;

echo DateRus::format('b/Y');
```
Выдаст
```
7528/2020
```

## Ссылки

БОСТ №000006-7528 О задании формата даты и времени в программном коде для русского календаря
https://github.com/i-avatar777/kon/blob/master/%D0%91%D0%9E%D0%A1%D0%A2/%D0%91%D0%9E%D0%A1%D0%A2000006-7528.md

Русский Славяно-Арийский Календарь
http://energodar.net/ha-tha.php?str=vedy%2Fkalendar 

Функция date
https://www.php.net/manual/ru/function.date.php