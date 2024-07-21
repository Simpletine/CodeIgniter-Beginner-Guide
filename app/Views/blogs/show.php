<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($blog['title']) ?></title>
</head>
<body>
    <h1><?= esc($blog['title']) ?></h1>
    <p><?= esc($blog['content']) ?></p>
    <a href="/blogs">Back to All Blogs</a>
</body>
</html>
