<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\I18n\Time;

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
if (! function_exists('array_flatten')) {
    /**
     * Flattens a multi-dimensional array into a single-dimensional array.
     *
     * @param array $array The multi-dimensional array.
     *
     * @return array The flattened array.
     */
    function array_flatten(array $array): array
    {
        $result = [];
        array_walk_recursive($array, static function ($a) use (&$result) {
            $result[] = $a;
        });

        return $result;
    }
}

if (! function_exists('format_date')) {
    /**
     * Formats a date according to the specified format.
     *
     * @param string $date   The date string.
     * @param string $format The format to use.
     *
     * @return string The formatted date.
     */
    function format_date(string $date, string $format = 'Y-m-d H:i:s'): string
    {
        return Time::parse($date)->format($format);
    }
}
