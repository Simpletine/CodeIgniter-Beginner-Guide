<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($page_title ?? 'SimpleTine') ?></title>
</head>

<body>
    <h1>All Blogs</h1>
    <a href="/blogs/create">Create New Blog</a>
    <ul>
        <?php foreach ($blogs as $blog): ?>
        <li>
            <a href="/blogs/<?= $blog['id'] ?>"><?= esc($blog['title']) ?></a>
            <a href="/blogs/edit/<?= $blog['id'] ?>">Edit</a>
            <a href="/blogs/delete/<?= $blog['id'] ?>">Delete</a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
