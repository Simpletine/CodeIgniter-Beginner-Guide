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

namespace App\Validation;

class ProductRules
{
    public function valid_product_name(string $str, ?string &$error = null): bool
    {
        if (preg_match('/^[a-zA-Z0-9\s]+$/', $str)) {
            return true;
        }

        $error = 'The {field} field must contain only alphabetic characters, numbers, and spaces.';

        return false;
    }

    public function valid_sku(string $str, ?string &$error = null): bool
    {
        if (preg_match('/^[a-zA-Z0-9-]+$/', $str)) {
            return true;
        }

        $error = 'The {field} field must contain only alphanumeric characters and hyphens.';

        return false;
    }

    public function valid_price(string $str, ?string &$error = null): bool
    {
        if (is_numeric($str) && (float) $str > 0) {
            return true;
        }

        $error = 'The {field} field must be a positive number.';

        return false;
    }

    public function valid_quantity(string $str, ?string &$error = null): bool
    {
        if (ctype_digit($str) && (int) $str >= 0) {
            return true;
        }

        $error = 'The {field} field must be a non-negative integer.';

        return false;
    }

    public function valid_category(string $str, ?string &$error = null): bool
    {
        $validCategories = ['Electronics', 'Books', 'Clothing', 'Home', 'Beauty', 'Toys']; // Example categories

        if (in_array($str, $validCategories, true)) {
            return true;
        }

        $error = 'The {field} field must be a valid category.';

        return false;
    }

    public function valid_description(string $str, ?string &$error = null): bool
    {
        if (strlen($str) >= 10 && strlen($str) <= 1000) {
            return true;
        }

        $error = 'The {field} field must be between 10 and 1000 characters.';

        return false;
    }

    public function valid_image_url(string $str, ?string &$error = null): bool
    {
        if (filter_var($str, FILTER_VALIDATE_URL) && preg_match('/\.(jpg|jpeg|png|gif)$/', $str)) {
            return true;
        }

        $error = 'The {field} field must be a valid image URL.';

        return false;
    }
}
