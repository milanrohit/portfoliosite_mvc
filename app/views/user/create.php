<?php ob_start(); ?>
<h1><?= htmlspecialchars($data['title']) ?></h1>
<form method="post" action="/user/store">
    <label>Username: <input type="text" name="username" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Create</button>
</form>
<?php $content = ob_get_clean(); include __DIR__ . '/../layouts/main.php'; ?> 