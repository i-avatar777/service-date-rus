# service-date-rus

Сервис для форматирования дат с поддержкой русского календаря

https://docs.google.com/document/d/1aD4oE2K8KftErG1d6NJyruXTvY4SPrkMhSw3r80nr6Q/edit?usp=sharing

Функция преобразовывает строку форматирования в готовую строку с датой и временем по заданным параметрам.

В строке форматирования по мимо стандартных которая допускает функция date() (https://www.php.net/manual/ru/function.date.php) могут использоваться дополнителные коды:

- b - порядковое лето от сотворения мира в звездном храме
- k - месяц по русски полный с маленькой буквы (? падеж, например: 1 февраля) по григорианскому календарю
- K - месяц по русски сокращенная версия 3 буквы по григорианскому календарю
- V - флаг священного лета 0 - нет 1 - да
- x - номер элемента лета 1-9 по русскому календарю
- X - номер образа лета 1-16 по русскому календарю

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

## Пример использования

```
use iAvatar777\services\DateRus\DateRus;

echo DateRus::format('b/Y');

```
Выдаст
```
7528/2020
```

## Функция date

https://www.php.net/manual/ru/function.date.php