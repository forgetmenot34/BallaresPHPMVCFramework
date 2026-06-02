<?php

namespace Core\Validation;

class Validator
{

    public static function required(
        mixed $value
    ): bool
    {
        return trim((string)($value ?? '')) !== '';
    }

    public static function min(
        mixed $value,
        int $min
    ): bool
    {
        return strlen(
            trim((string)($value ?? ''))
        ) >= $min;
    }


    public static function max(
        mixed $value,
        int $max
    ): bool
    {
        return strlen(
            trim((string)($value ?? ''))
        ) <= $max;
    }


    public static function numeric(
        mixed $value
    ): bool
    {
        return is_numeric($value);
    }



    public static function email(
        mixed $value
    ): bool
    {
        return filter_var(
            $value,
            FILTER_VALIDATE_EMAIL
        ) !== false;
    }
}