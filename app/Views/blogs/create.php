<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($page_title ?? 'SimpleTine') ?></title>
</head>

<body>
    <h1>Create Blog</h1>
    <?php if (session()->has('errors')) : ?>
    <div style="color: red;">
        <ul>
            <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <form action="<?= base_url('blogs/store') ?>" method="post">
        <?= csrf_field() ?>

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?= old('title') ?>"><br>

        <label for="content">Content</label>
        <textarea id="content" name="content"><?= old('content') ?></textarea><br>

        <button type="submit">Create Blog</button>
    </form>
</body>

</html>