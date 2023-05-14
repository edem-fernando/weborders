<?php


namespace App\Suport;


/**
 * Class Utils
 * @package App\Suport
 */
class Utils
{
    /**
     * @param string|null $date
     * @return string|null
     * @throws \Exception
     */
    public static function convertToDateTime(?string $date): ?string
    {
        if (!$date) {
            return null;
        }

        $date = new \DateTime($date);
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @param string|null $date
     * @param string $format
     * @return string|null
     */
    public static function convertToDateFormat(?string $date, string $format = 'd/m/Y') : ?string
    {
        try {
            if (!$date) {
                throw new \Exception('');
            }

            $dateTime = new \DateTime($date);
            return $dateTime->format($format);
        } catch (\Exception $exception) {
            return '';
        }
    }

    /**
     * @param string $document
     * @return string
     */
    public static function convertDocument(string $document): string
    {
        return preg_replace('/[^0-9]/is', '', $document);
    }

    /**
     * @param float $value
     * @return string
     */
    public static function convertMoneyBr(float $value): string
    {
        return number_format($value, 2, ',', '.');
    }

    /**
     * @param string $value
     * @return float
     */
    public static function convertMoneyApp(string $value): float
    {
        $replace = str_replace(['.', ','], ['', '.'], $value);
        return floatval(number_format($replace, 2, '.', ''));
    }

    /**
     * @param string $document
     * @return bool
     */
    public static function validateDocument(string $document): bool
    {
        $document = preg_replace('/[^0-9]/is', '', $document);
        if (strlen($document) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $document)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $document[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($document[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param string $date
     * @return bool
     */
    public static function validateDate(string $date): bool
    {
        try {
            $array = explode('-', $date);
            return checkdate($array[1], $array[2], $array[0]);
        }
        catch (\Exception $ex) {
            return false;
        }
    }

    /**
     * @param string $date
     * @param string $format
     * @return bool
     */
    public static function validateDatetime(string $date, string $format = 'Y-m-d H:i:s'): bool
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
    /**
     * @param mixed $phone
     * @return string
     */
    public static function removePhoneMask($phone): string
    {
        return str_replace(['-', ')', '(', ' '], [''], $phone);
    }
    
    /**
     * @param mixed $zip
     * @return string
     */
    public static function removeZipcodeMask($zip): string
    {
        return str_replace(['-', '.', ' '], [''], $zip);
    }
    
    public static function limitWords(string $string, int $limit, string $pointer = "..."): string
    {
        $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
        $arrWords = explode(" ", $string);
        $numWords = count($arrWords);

        if ($numWords < $limit) {
            return $string;
        }

        $words = implode(" ", array_slice($arrWords, 0, $limit));
        return "{$words}{$pointer}";
    }

    public static function limitChars(string $string, int $limit, string $pointer = "..."): string
    {
        $string = trim(filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS));
        if (mb_strlen($string) <= $limit) {
            return $string;
        }

        $chars = mb_substr($string, 0, mb_strrpos(mb_substr($string, 0, $limit), " "));
        return "{$chars}{$pointer}";
    }
}
