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

use App\Models\Blogs as ModelsBlogs;

class Blogs extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new ModelsBlogs();
    }

    // List all blogs
    public function index()
    {
        $page_title = 'Blogs';
        $blogs      = $this->blogModel->findAll();

        return view('blogs/index', compact('page_title', 'blogs'));
    }

    // Show create blog form
    public function create()
    {
        $page_title = 'Create Blog';

        return view('blogs/create', compact('page_title'));
    }

    // Store a new blog
    public function store()
    {
        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        if ($this->blogModel->save($data)) {
            return redirect()->to('/blogs');
        }

        return redirect()->back()->withInput()->with('errors', $this->blogModel->errors());
    }

    // Show a single blog
    public function show($id)
    {
        $page_title = 'Blogs';
        $blog       = $this->blogModel->find($id);

        return view('blogs/show', compact('page_title', 'blog'));
    }

    // Show edit blog form
    public function edit($id)
    {
        $page_title = 'Edit Blog';
        $blog       = $this->blogModel->find($id);

        return view('blogs/edit', compact('page_title', 'blog'));
    }

    // Update a blog
    public function update($id)
    {
        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        if ($this->blogModel->update($id, $data)) {
            return redirect()->to('/blogs');
        }

        return redirect()->to("/blogs/edit/{$id}")->withInput()->with('errors', $this->blogModel->errors());
    }

    // Delete a blog
    public function delete($id)
    {
        $this->blogModel->delete($id);

        return redirect()->to('/blogs');
    }
}
