<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= esc($page_title ?? 'SimpleTine') ?></title>
</head>

<body>
    <h1>Edit Blog</h1>
    <?php if (session()->has('errors')) : ?>
    <div style="color: red;">
        <ul>
            <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <form action="/blogs/update/<?= $blog['id'] ?>" method="post">
        <?= csrf_field() ?>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?= esc($blog['title']) ?>">
        <label for="content">Content</label>
        <textarea id="content" name="content"><?= esc($blog['content']) ?></textarea>
        <button type="submit">Update</button>
    </form>
</body>

</html>
