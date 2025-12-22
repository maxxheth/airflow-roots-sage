<?php

namespace App\Support;

use stdClass;

/**
 * Helper class for creating clean DTOs from arrays.
 * Reduces verbosity when building data objects in View Composers.
 */
class DTO
{
    /**
     * Create a stdClass object from an associative array.
     *
     * @param array<string, mixed> $data
     * @return stdClass
     */
    public static function make(array $data): stdClass
    {
        $object = new stdClass();
        
        foreach ($data as $key => $value) {
            $object->{$key} = $value;
        }
        
        return $object;
    }

    /**
     * Create an array of stdClass objects from an array of arrays.
     *
     * @param array<int, array<string, mixed>> $items
     * @return array<int, stdClass>
     */
    public static function collection(array $items): array
    {
        return array_map(fn($item) => self::make($item), $items);
    }
}
