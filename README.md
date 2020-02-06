# service-date-rus

Сервис для форматирования дат с поддержкой русского календаря

https://docs.google.com/document/d/1aD4oE2K8KftErG1d6NJyruXTvY4SPrkMhSw3r80nr6Q/edit?usp=sharing

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