<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <?php if (session()->has('message')): ?>
        <p><?= session('message') ?></p>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <p><?= session('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
        <label for="userfile">Choose a file:</label>
        <input type="file" name="userfile" id="userfile">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
