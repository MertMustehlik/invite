<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CommonHelper
{
    public function limitText(string $text = null, int $length = 30, $ellipsis = '...'): ?string
    {
        return $text ? Str::limit($text, $length, $ellipsis) : null;
    }

    public function getFirstCharacter(string $string = null, bool $uppercase = true): ?string
    {
        if(!$string) return '';

        $firstCharacter = $string[0];
        return $uppercase ? strtoupper($firstCharacter) : $firstCharacter;
    }

     public function defaultDateFormat(): string
    {
        return "d-m-Y";
    }

    public function defaultDateTimeFormat($seconds = true): string
    {
        $format = "d-m-Y H:i"; //d F Y H:i

        if ($seconds) {
            $format .= ':s';
        }
        return $format;
    }

    public function formatDecimalInput($value): ?float
    {
        if ($value === null) {
            return null;
        }

        return (float) str_replace(['.', ','], ['', '.'], $value);
    }

    public function getIyzicoCallbackUrl(): string
    {
        return route('payments.iyzico.threed-callback');
    }

    public function generateTransactionId(): string
    {
        return random_int(10, 99) . $this->generateRandomChars(2) . time() . $this->generateRandomChars(2) . random_int(10, 99);
    }

    public function generateRandomChars($length = 1): string
    {
        $chars = '';
        for ($i = 0; $i < $length; $i++) {
            $chars .= chr(random_int(65, 90));
        }
        return $chars;
    }
}