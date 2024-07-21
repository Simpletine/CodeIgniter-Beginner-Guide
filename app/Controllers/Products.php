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

class Products extends BaseController
{
    public function create()
    {
        // Define validation rules
        $rules = [
            'product_name' => 'required|valid_product_name',
            'sku'          => 'required|valid_sku',
            'price'        => 'required|valid_price',
            'quantity'     => 'required|valid_quantity',
            'category'     => 'required|valid_category',
            'description'  => 'required|valid_description',
            'image_url'    => 'required|valid_image_url',
        ];

        // Validate the input
        if (! $this->validate($rules)) {
            // Validation failed
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validation passed, proceed with further logic
        // e.g., save to the database

        return redirect()->to('/products')->with('message', 'Product added successfully!');
    }
}
