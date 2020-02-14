<?php

namespace iAvatar777\services\DateRus;


class DateRus {

    /**
     * @param $format
     * @param null $date
     * @param array $options
     *               - day - int - день месяца рус
     * @return false|string
     */
    public static function format ($format, $date = null, $options = []) {
        if (is_null($date)) $date = time();

        $formatTable = [
            'b',
            'k',
            'K',
            'V',
            'x',
            'X',
            'C',
        ];

        $f = $format;
        foreach ($formatTable as $k) {
            switch ($k) {
                case 'b':
                    $v = self::formatLeto($date);
                    break;
                case 'k':
                    $v = self::formatMesStr($date);
                    break;
                case 'K':
                    $v = self::formatMesStr3($date);
                    break;
                case 'V':
                    $v = self::formatIsSvyat($date);
                    break;
                case 'x':
                    $v = self::formatElement($date);
                    break;
                case 'X':
                    $v = self::formatImage($date);
                    break;
                case 'C':
                    $v = self::formatDayRus($date, $options);
                    break;
            }
            $f = str_replace($k, $v, $f);
        }

        return date($f, $date);
    }

    public static function formatDayRus($date, $options = [])
    {
        if (isset($options['day'])) {
            return $options['day'];
        }

        return 0;
    }

    public static function formatImage($date)
    {
        $y = date('Y');
        $y = (int)$y;
        $y1 = $y + 5508;
        if (date('m') >= 9 && date('d') >= 21) {
            $y1++;
        }
        $y4 = $y1 - (7376 - (144*20) );

        $y2 = (int)($y4/144);
        $y3 = $y4 - ($y2 * 144);

        $element_int = 0;
        $element_str = '';
        $Krug_Zizni = $y3;
        $result = $y3 % 16;
        if ($result == 0) $result = 16;

        return $result;
    }

    public static function formatElement($date)
    {
        $y = date('Y');
        $y = (int)$y;
        $y1 = $y + 5508;
        if (date('m') >= 9 && date('d') >= 21) {
            $y1++;
        }
        $y4 = $y1 - (7376 - (144*20) );

        $y2 = (int)($y4/144);
        $y3 = $y4 - ($y2 * 144);

        $element_int = 0;
        $element_str = '';
        $Krug_Zizni = $y3;

        if (in_array($Krug_Zizni, [1, 2, 19, 20, 37, 38, 55, 56, 73, 74, 91, 92, 109, 110, 127, 128])) {
            $element_int = 1;
        }
        if (in_array($Krug_Zizni, [129, 130, 3, 4, 21, 22, 39, 40, 57, 58, 75, 76, 93, 94, 111, 112])) {
            $element_int = 2;
        }
        if (in_array($Krug_Zizni, [113, 131, 5, 23, 41, 59, 77, 95, 114, 132, 6, 24, 42, 60, 78, 96])) {
            $element_int = 3;
        }
        if (in_array($Krug_Zizni, [97, 98, 115, 116, 133, 134, 7, 8, 25, 26, 43, 44, 61, 62, 79, 80])) {
            $element_int = 4;
        }
        if (in_array($Krug_Zizni, [81, 99, 117, 135, 9, 27, 45, 63, 82, 100, 118, 136, 10, 28, 46, 64])) {
            $element_int = 5;
        }
        if (in_array($Krug_Zizni, [65, 83, 101, 119, 137, 11, 29, 47, 66, 84, 102, 120, 138, 12, 30, 48])) {
            $element_int = 6;
        }
        if (in_array($Krug_Zizni, [49, 67, 85, 103, 121, 139, 13, 31, 50, 68, 86, 104, 122, 140, 14, 32])) {
            $element_int = 7;
        }
        if (in_array($Krug_Zizni, [33, 51, 69, 87, 105, 123, 141, 15, 34, 52, 70, 88, 106, 124, 142, 16])) {
            $element_int = 8;
        }
        if (in_array($Krug_Zizni, [17, 35, 53, 71, 89, 107, 125, 143, 18, 36, 54, 72, 90, 108, 126, 144])) {
            $element_int = 9;
        }

        return $element_int;
    }

    public static function formatLeto($date)
    {
        $y = date('Y');
        $y = (int)$y;
        $y1 = $y + 5508;
        if (date('m') >= 9 && date('d') >= 21) {
            $y1++;
        }
        $y4 = $y1 - (7376 - (144*20) );

        $y2 = (int)($y4/144);
        $y3 = $y4 - ($y2 * 144);

        $element_int = 0;
        $element_str = '';
        $Krug_Zizni = $y3;

        return $y1;
    }

    public static function formatIsSvyat($date)
    {
        $y = date('Y');
        $y = (int)$y;
        $y1 = $y + 5508;
        if (date('m') >= 9 && date('d') >= 21) {
            $y1++;
        }
        $y4 = $y1 - (7376 - (144*20) );

        $y2 = (int)($y4/144);
        $y3 = $y4 - ($y2 * 144);

        $element_int = 0;
        $element_str = '';
        $Krug_Zizni = $y3;

        return ($y3 % 16 == 0)? 1 : 0;
    }

    public static function formatMesStr($date)
    {
        $m1 = date('n', $date);
        $m = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря',
        ];

        return $m[$m1];
    }

    public static function formatMesStr3($date)
    {
        $m1 = date('n', $date);
        $m = [
            1 => 'янв',
            2 => 'фев',
            3 => 'мар',
            4 => 'апр',
            5 => 'май',
            6 => 'июн',
            7 => 'июл',
            8 => 'авг',
            9 => 'сен',
            10 => 'окт',
            11 => 'ноя',
            12 => 'дек',
        ];

        return $m[$m1];
    }
}

?>