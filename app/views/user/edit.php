<?php ob_start(); ?>
<h1><?= htmlspecialchars($data['title']) ?></h1>
<form method="post" action="/user/update/<?= htmlspecialchars($data['user']['id']) ?>">
    <label>Username: <input type="text" name="username" value="<?= htmlspecialchars($data['user']['username']) ?>" required></label><br><br>
    <label>Password: <input type="password" name="password" placeholder="Leave blank to keep current"></label><br><br>
    <button type="submit">Update</button>
</form>
<?php $content = ob_get_clean(); include __DIR__ . '/../layouts/main.php'; ?> 