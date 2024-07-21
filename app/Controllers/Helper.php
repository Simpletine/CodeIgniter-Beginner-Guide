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

namespace App\Controllers;

class Helper extends BaseController
{
    public function index()
    {
        // Get the current date and time
        $today = date('Y-m-d');

        // Format the current date and time using a custom format helper function
        $formattedDate = format_date($today, 'd M y, l');

        // Output the current date and time
        echo "Current date: {$today} <br>";

        // Output the formatted date and time
        echo "Formatted date: {$formattedDate} <br>";

        // Define a multi-dimensional array with fruits, vegetables, and grains
        $multiDimensionalArray = [
            'fruits'     => ['apple', 'orange', 'banana'],
            'vegetables' => [
                'root'  => ['carrot', 'potato'],
                'leafy' => ['spinach', 'lettuce'],
            ],
            'grains' => ['rice', 'wheat'],
        ];

        // Output the multi-dimensional array before flattening
        echo 'Before flatten: <br>';
        echo '<pre>' . print_r($multiDimensionalArray, true) . '</pre>';

        // Flatten the multi-dimensional array using a custom helper function
        $flattenedArray = array_flatten($multiDimensionalArray);

        // Output the flattened array
        echo 'After flatten: <br>';
        echo '<pre>' . print_r($flattenedArray, true) . '</pre>';
    }
}
