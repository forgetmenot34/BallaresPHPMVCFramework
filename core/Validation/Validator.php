<?php

namespace Core\Validation;

class Validator
{

    public static function required(
        string|null $value
    ): bool
    {
        return trim($value ?? '') !== '';
    }

    public static function min(
        string $value,
        int $min
    ): bool
    {
        return strlen(trim($value)) >= $min;
    }

    public static function max(
        string $value,
        int $max
    ): bool
    {
        return strlen(trim($value)) <= $max;
    }



    public static function numeric(
        mixed $value
    ): bool
    {
        return is_numeric($value);
    }

    public static function email(
        string $value
    ): bool
    {
        return filter_var(
            $value,
            FILTER_VALIDATE_EMAIL
        ) !== false;
    }
}