<?php ob_start(); ?>
<h1><?= htmlspecialchars($data['title']) ?></h1>
<p>Welcome to the Admin Panel. Here you can manage your portfolio content.</p>
<?php $content = ob_get_clean();
include __DIR__ . '/../layouts/main.php'; 