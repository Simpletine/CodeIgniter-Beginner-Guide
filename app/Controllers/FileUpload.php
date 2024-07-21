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

class FileUpload extends BaseController
{
    public function index()
    {
        // Load the file upload form view
        return view('upload_form');
    }

    public function upload()
    {
        // Check if the form was submitted and the file is valid
        $file = $this->request->getFile('userfile');

        if ($file->isValid() && ! $file->hasMoved()) {
            // Set a new random name for the file
            $newName = $file->getRandomName();

            // Move the file to the designated upload directory
            $file->move(WRITEPATH . 'uploads', $newName);

            // Provide feedback to the user
            return redirect()->back()->with('message', 'File uploaded successfully');
        }

        // Handle the file upload error
        return redirect()->back()->with('error', 'Failed to upload the file');
    }
}
