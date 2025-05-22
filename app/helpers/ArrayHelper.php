<?php
namespace App\Helpers;

class ArrayHelper {
    /**
     * Class ArrayHelper
     *
     * A comprehensive static utility class for array operations.
     *
     * Index of Methods:
     * - isAssoc(array): bool — Check if array is associative
     * - isMulti(array): bool — Check if array is multidimensional
     * - flatten(array): array — Flatten a multidimensional array
     * - get(array, key, default): mixed — Get value by dot notation
     * - set(array&, key, value): void — Set value by dot notation
     * - has(array, key): bool — Check if key exists by dot notation
     * - pluck(array, key): array — Extract values by key
     * - first(array, callback, default): mixed — First element or by callback
     * - last(array, callback, default): mixed — Last element or by callback
     * - where(array, callback): array — Filter by callback
     * - except(array, keys): array — Exclude keys
     * - only(array, keys): array — Include only keys
     * - map(callback, array): array — Map callback
     * - filter(array, callback, mode): array — Filter array
     * - reduce(array, callback, initial): mixed — Reduce array
     * - merge(...arrays): array — Merge arrays
     * - unique(array, flags): array — Unique values
     * - values(array): array — Array values
     * - keys(array): array — Array keys
     * - sort(array&, flags): array — Sort array
     * - ksort(array&, flags): array — Sort by keys
     * - reverse(array, preserve_keys): array — Reverse array
     * - chunk(array, size, preserve_keys): array — Chunk array
     * - slice(array, offset, length, preserve_keys): array — Slice array
     * - search(needle, haystack, strict): int|string|false — Search value
     * - sum(array): number — Sum values
     * - count(array): int — Count elements
     * - column(array, column_key, index_key): array — Return column
     * - arrayToString(array, delimiter, keyValueGlue): string — Implode array
     * - stringToArray(string, delimiter): array — Explode string
     * - toJson(array, options, depth): string — Array to JSON
     * - fromJson(string, assoc, depth, options): array|object — JSON to array/object
     * - arrayCombine(array $keys, array $values): array — Combine two arrays: one for keys, one for values
     */
    /**
     * Check if an array is associative.
     */
    public static function isAssoc(array $arr): bool
    {
        if ([] === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * Check if array is multidimensional.
     */
    public static function isMulti(array $array): bool
    {
        return count($array) !== count($array, COUNT_RECURSIVE);
    }

    /**
     * Flatten a multidimensional array.
     */
    public static function flatten(array $array): array
    {
        $result = [];
        array_walk_recursive($array, function ($a) use (&$result) {
            $result[] = $a;
        });
        return $result;
    }

    /**
     * Safely get a value from a nested array using dot notation.
     */
    public static function get(array $array, $key, $default = null)
    {
        if (is_null($key)) return $array;
        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }
        return $array;
    }

    /**
     * Set a value in a nested array using dot notation.
     */
    public static function set(array &$array, $key, $value): void
    {
        if (is_null($key)) {
            $array = $value;
            return;
        }
        $keys = explode('.', $key);
        while (count($keys) > 1) {
            $k = array_shift($keys);
            if (!isset($array[$k]) || !is_array($array[$k])) {
                $array[$k] = [];
            }
            $array = &$array[$k];
        }
        $array[array_shift($keys)] = $value;
    }

    /**
     * Check if a key exists in a nested array using dot notation.
     */
    public static function has(array $array, $key): bool
    {
        if (empty($array) || is_null($key)) return false;
        foreach (explode('.', $key) as $segment) {
            if (is_array($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * Extract values from a list of arrays/objects by key.
     */
    public static function pluck(array $array, $key): array
    {
        $results = [];
        foreach ($array as $item) {
            if (is_array($item) && array_key_exists($key, $item)) {
                $results[] = $item[$key];
            } elseif (is_object($item) && isset($item->$key)) {
                $results[] = $item->$key;
            }
        }
        return $results;
    }

    /**
     * Get the first element that passes a callback, or the first element.
     */
    public static function first(array $array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            foreach ($array as $item) {
                return $item;
            }
            return $default;
        }
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }
        return $default;
    }

    /**
     * Get the last element that passes a callback, or the last element.
     */
    public static function last(array $array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) return $default;
            return end($array);
        }
        foreach (array_reverse($array, true) as $key => $value) {
            if ($callback($value, $key)) {
                return $value;
            }
        }
        return $default;
    }

    /**
     * Filter array by callback.
     */
    public static function where(array $array, callable $callback): array
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * Return array except for given keys.
     */
    public static function except(array $array, $keys): array
    {
        $keys = (array)$keys;
        return array_diff_key($array, array_flip($keys));
    }

    /**
     * Return array with only given keys.
     */
    public static function only(array $array, $keys): array
    {
        $keys = (array)$keys;
        return array_intersect_key($array, array_flip($keys));
    }

    /**
     * Map callback across array.
     */
    public static function map(callable $callback, array $array): array
    {
        return array_map($callback, $array);
    }

    /**
     * Filter array with optional callback and mode.
     */
    public static function filter(array $array, callable $callback = null, int $mode = 0): array
    {
        return array_filter($array, $callback, $mode);
    }

    /**
     * Reduce array to a single value.
     */
    public static function reduce(array $array, callable $callback, $initial = null)
    {
        return array_reduce($array, $callback, $initial);
    }

    /**
     * Merge multiple arrays.
     */
    public static function merge(...$arrays): array
    {
        return array_merge(...$arrays);
    }

    /**
     * Return unique values from array.
     */
    public static function unique(array $array, int $flags = SORT_STRING): array
    {
        return array_unique($array, $flags);
    }

    /**
     * Return all values from array.
     */
    public static function values(array $array): array
    {
        return array_values($array);
    }

    /**
     * Return all keys from array.
     */
    public static function keys(array $array): array
    {
        return array_keys($array);
    }

    /**
     * Sort array by values.
     */
    public static function sort(array &$array, int $flags = SORT_REGULAR): array
    {
        sort($array, $flags);
        return $array;
    }

    /**
     * Sort array by keys.
     */
    public static function ksort(array &$array, int $flags = SORT_REGULAR): array
    {
        ksort($array, $flags);
        return $array;
    }

    /**
     * Reverse the order of array elements.
     */
    public static function reverse(array $array, bool $preserve_keys = false): array
    {
        return array_reverse($array, $preserve_keys);
    }

    /**
     * Split array into chunks.
     */
    public static function chunk(array $array, int $size, bool $preserve_keys = false): array
    {
        return array_chunk($array, $size, $preserve_keys);
    }

    /**
     * Extract a slice of the array.
     */
    public static function slice(array $array, int $offset, int $length = null, bool $preserve_keys = false): array
    {
        return array_slice($array, $offset, $length, $preserve_keys);
    }

    /**
     * Search for a value in the array.
     */
    public static function search($needle, array $haystack, bool $strict = false)
    {
        return array_search($needle, $haystack, $strict);
    }

    /**
     * Sum values in the array.
     */
    public static function sum(array $array)
    {
        return array_sum($array);
    }

    /**
     * Count elements in the array.
     */
    public static function count(array $array): int
    {
        return count($array);
    }

    /**
     * Return the values from a single column in the input array.
     */
    public static function column(array $array, $column_key, $index_key = null): array
    {
        return array_column($array, $column_key, $index_key);
    }

    /**
     * Convert an array to a string using a delimiter (optionally glue key=>value pairs).
     */
    public static function arrayToString(array $array, string $delimiter = ',', string $keyValueGlue = ':'): string
    {
        $pairs = [];
        foreach ($array as $key => $value) {
            $pairs[] = is_string($key) ? $key . $keyValueGlue . $value : $value;
        }
        return implode($delimiter, $pairs);
    }

    /**
     * Convert a string to an array using a delimiter.
     */
    public static function stringToArray(string $string, string $delimiter = ','): array
    {
        return explode($delimiter, $string);
    }

    /**
     * Convert an array to a JSON string.
     */
    public static function toJson(array $array, int $options = 0, int $depth = 512): string
    {
        return json_encode($array, $options, $depth);
    }

    /**
     * Convert a JSON string to an array or object.
     */
    public static function fromJson(string $json, bool $assoc = true, int $depth = 512, int $options = 0)
    {
        return json_decode($json, $assoc, $depth, $options);
    }

    /**
     * Combine two arrays: one for keys, one for values.
     * Throws ValueError if arrays are not of equal length (PHP 8.2 behavior).
     *
     * @param array $keys
     * @param array $values
     * @return array
     * @throws ValueError
     */
    public static function arrayCombine(array $keys, array $values): array
    {
        return array_combine($keys, $values);
    }
    // Add more as needed
} 