<?php
namespace App\Helpers;

/**
 * Class StringHelper
 *
 * A comprehensive static utility class for string operations.
 *
 * Index of Methods:
 * - sanitize(string): string — Sanitize a string for output
 * - toUpper(string): string — Convert string to uppercase
 * - toLower(string): string — Convert string to lowercase
 * - trim(string, ?string): string — Trim whitespace or characters from both ends
 * - ltrim(string, ?string): string — Trim from the left
 * - rtrim(string, ?string): string — Trim from the right
 * - length(string): int — Get string length
 * - contains(haystack, needle): bool — Check if string contains substring
 * - startsWith(haystack, needle): bool — Check if string starts with substring
 * - endsWith(haystack, needle): bool — Check if string ends with substring
 * - replace(search, replace, subject): string — Replace all occurrences
 * - replaceArray(search, replacements, subject): string — Replace sequentially
 * - replaceFirst(search, replace, subject): string — Replace first occurrence
 * - replaceLast(search, replace, subject): string — Replace last occurrence
 * - substr(string, start, ?length): string — Get substring
 * - before(subject, search): string — Get substring before search
 * - after(subject, search): string — Get substring after search
 * - between(subject, from, to): string — Get substring between
 * - ucfirst(string): string — Uppercase first character
 * - lcfirst(string): string — Lowercase first character
 * - ucwords(string): string — Uppercase words
 * - isEmpty(?string): bool — Check if string is empty or null
 * - isAlpha(string): bool — Check if string is alphabetic
 * - isAlnum(string): bool — Check if string is alphanumeric
 * - isNumeric(string): bool — Check if string is numeric
 * - slugify(string, delimiter): string — Slugify a string
 * - studly(string): string — Convert to StudlyCase
 * - camel(string): string — Convert to camelCase
 * - snake(string, delimiter): string — Convert to snake_case
 * - padLeft(string, length, padString): string — Pad left
 * - padRight(string, length, padString): string — Pad right
 * - repeat(string, times): string — Repeat string
 * - wordCount(string): int — Count words
 * - wordWrap(string, width, break, cut): string — Wrap words
 * - reverse(string): string — Reverse string
 */
class StringHelper {
    /**
     * Sanitize a string for safe HTML output.
     *
     * @param string $data
     * @return string
     */
    public static function sanitize($data) {
        return htmlspecialchars(strip_tags($data));
    }
    /**
     * Convert a string to uppercase (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function toUpper($string) {
        return mb_strtoupper($string);
    }
    /**
     * Convert a string to lowercase (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function toLower($string) {
        return mb_strtolower($string);
    }
    /**
     * Trim whitespace or specified characters from both ends of a string.
     *
     * @param string $string
     * @param string|null $characters
     * @return string
     */
    public static function trim(string $string, ?string $characters = null): string
    {
        return $characters === null ? trim($string) : trim($string, $characters);
    }

    /**
     * Trim whitespace or specified characters from the left side of a string.
     *
     * @param string $string
     * @param string|null $characters
     * @return string
     */
    public static function ltrim(string $string, ?string $characters = null): string
    {
        return $characters === null ? ltrim($string) : ltrim($string, $characters);
    }

    /**
     * Trim whitespace or specified characters from the right side of a string.
     *
     * @param string $string
     * @param string|null $characters
     * @return string
     */
    public static function rtrim(string $string, ?string $characters = null): string
    {
        return $characters === null ? rtrim($string) : rtrim($string, $characters);
    }

    /**
     * Get the length of a string (multibyte safe).
     *
     * @param string $string
     * @return int
     */
    public static function length(string $string): int
    {
        return mb_strlen($string);
    }

    /**
     * Check if a string contains a given substring.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function contains(string $haystack, string $needle): bool
    {
        return mb_strpos($haystack, $needle) !== false;
    }

    /**
     * Check if a string starts with a given substring.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function startsWith(string $haystack, string $needle): bool
    {
        return mb_substr($haystack, 0, mb_strlen($needle)) === $needle;
    }

    /**
     * Check if a string ends with a given substring.
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function endsWith(string $haystack, string $needle): bool
    {
        $length = mb_strlen($needle);
        if ($length === 0) {
            return true;
        }
        return mb_substr($haystack, -$length) === $needle;
    }

    /**
     * Replace all occurrences of the search string with the replacement string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replace(string $search, string $replace, string $subject): string
    {
        return str_replace($search, $replace, $subject);
    }

    /**
     * Replace sequential occurrences of the search string with replacements from the array.
     *
     * @param string $search
     * @param array $replacements
     * @param string $subject
     * @return string
     */
    public static function replaceArray(string $search, array $replacements, string $subject): string
    {
        foreach ($replacements as $replace) {
            $subject = preg_replace('/' . preg_quote($search, '/') . '/', $replace, $subject, 1);
        }
        return $subject;
    }

    /**
     * Replace the first occurrence of the search string with the replacement string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replaceFirst(string $search, string $replace, string $subject): string
    {
        $pos = mb_strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return mb_substr($subject, 0, $pos) . $replace . mb_substr($subject, $pos + mb_strlen($search));
    }

    /**
     * Replace the last occurrence of the search string with the replacement string.
     *
     * @param string $search
     * @param string $replace
     * @param string $subject
     * @return string
     */
    public static function replaceLast(string $search, string $replace, string $subject): string
    {
        $pos = mb_strrpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }
        return mb_substr($subject, 0, $pos) . $replace . mb_substr($subject, $pos + mb_strlen($search));
    }

    /**
     * Get a substring of a string (multibyte safe).
     *
     * @param string $string
     * @param int $start
     * @param int|null $length
     * @return string
     */
    public static function substr(string $string, int $start, ?int $length = null): string
    {
        return $length === null ? mb_substr($string, $start) : mb_substr($string, $start, $length);
    }

    /**
     * Get the part of a string before the first occurrence of a substring.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function before(string $subject, string $search): string
    {
        $pos = mb_strpos($subject, $search);
        return $pos === false ? $subject : mb_substr($subject, 0, $pos);
    }

    /**
     * Get the part of a string after the first occurrence of a substring.
     *
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function after(string $subject, string $search): string
    {
        $pos = mb_strpos($subject, $search);
        return $pos === false ? $subject : mb_substr($subject, $pos + mb_strlen($search));
    }

    /**
     * Get the part of a string between two substrings.
     *
     * @param string $subject
     * @param string $from
     * @param string $to
     * @return string
     */
    public static function between(string $subject, string $from, string $to): string
    {
        $start = mb_strpos($subject, $from);
        if ($start === false) return '';
        $start += mb_strlen($from);
        $end = mb_strpos($subject, $to, $start);
        if ($end === false) return '';
        return mb_substr($subject, $start, $end - $start);
    }

    /**
     * Uppercase the first character of a string (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function ucfirst(string $string): string
    {
        return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
    }

    /**
     * Lowercase the first character of a string (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function lcfirst(string $string): string
    {
        return mb_strtolower(mb_substr($string, 0, 1)) . mb_substr($string, 1);
    }

    /**
     * Uppercase the first character of each word in a string (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function ucwords(string $string): string
    {
        return mb_convert_case($string, MB_CASE_TITLE);
    }

    /**
     * Check if a string is empty or null.
     *
     * @param string|null $string
     * @return bool
     */
    public static function isEmpty(?string $string): bool
    {
        return $string === null || $string === '';
    }

    /**
     * Check if a string contains only alphabetic characters.
     *
     * @param string $string
     * @return bool
     */
    public static function isAlpha(string $string): bool
    {
        return ctype_alpha($string);
    }

    /**
     * Check if a string contains only alphanumeric characters.
     *
     * @param string $string
     * @return bool
     */
    public static function isAlnum(string $string): bool
    {
        return ctype_alnum($string);
    }

    /**
     * Check if a string is numeric.
     *
     * @param string $string
     * @return bool
     */
    public static function isNumeric(string $string): bool
    {
        return is_numeric($string);
    }

    /**
     * Slugify a string (convert to URL-friendly format).
     *
     * @param string $string
     * @param string $delimiter
     * @return string
     */
    public static function slugify(string $string, string $delimiter = '-'): string
    {
        $string = preg_replace('~[^\\pL\\d]+~u', $delimiter, $string);
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        $string = preg_replace('~[^-a-z0-9]+~i', '', $string);
        $string = trim($string, $delimiter);
        $string = preg_replace('~-+~', $delimiter, $string);
        return mb_strtolower($string);
    }

    /**
     * Convert a string to StudlyCase.
     *
     * @param string $string
     * @return string
     */
    public static function studly(string $string): string
    {
        return str_replace(' ', '', mb_convert_case(str_replace(['-', '_'], ' ', $string), MB_CASE_TITLE));
    }

    /**
     * Convert a string to camelCase.
     *
     * @param string $string
     * @return string
     */
    public static function camel(string $string): string
    {
        $studly = self::studly($string);
        return mb_strtolower(mb_substr($studly, 0, 1)) . mb_substr($studly, 1);
    }

    /**
     * Convert a string to snake_case.
     *
     * @param string $string
     * @param string $delimiter
     * @return string
     */
    public static function snake(string $string, string $delimiter = '_'): string
    {
        $string = preg_replace('/[A-Z]/', $delimiter . '$0', $string);
        $string = strtolower($string);
        $string = preg_replace('/' . preg_quote($delimiter, '/') . '+/', $delimiter, $string);
        return trim($string, $delimiter);
    }

    /**
     * Pad a string to the left to a certain length with another string.
     *
     * @param string $string
     * @param int $length
     * @param string $padString
     * @return string
     */
    public static function padLeft(string $string, int $length, string $padString = ' '): string
    {
        return str_pad($string, $length, $padString, STR_PAD_LEFT);
    }

    /**
     * Pad a string to the right to a certain length with another string.
     *
     * @param string $string
     * @param int $length
     * @param string $padString
     * @return string
     */
    public static function padRight(string $string, int $length, string $padString = ' '): string
    {
        return str_pad($string, $length, $padString, STR_PAD_RIGHT);
    }

    /**
     * Repeat a string a given number of times.
     *
     * @param string $string
     * @param int $times
     * @return string
     */
    public static function repeat(string $string, int $times): string
    {
        return str_repeat($string, $times);
    }

    /**
     * Count the number of words in a string.
     *
     * @param string $string
     * @return int
     */
    public static function wordCount(string $string): int
    {
        return str_word_count($string);
    }

    /**
     * Wrap a string to a given number of characters.
     *
     * @param string $string
     * @param int $width
     * @param string $break
     * @param bool $cut
     * @return string
     */
    public static function wordWrap(string $string, int $width = 75, string $break = "\n", bool $cut = false): string
    {
        return wordwrap($string, $width, $break, $cut);
    }

    /**
     * Reverse a string (multibyte safe).
     *
     * @param string $string
     * @return string
     */
    public static function reverse(string $string): string
    {
        return implode('', array_reverse(mb_str_split($string)));
    }
    // Add more string functions as needed
} 