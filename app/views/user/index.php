<?php ob_start(); ?>
<h1><?= htmlspecialchars($data['title']) ?></h1>
<a href="/user/create">Create New User</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data['users'] as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td>
            <a href="/user/edit/<?= htmlspecialchars($user['id']) ?>">Edit</a> |
            <a href="/user/delete/<?= htmlspecialchars($user['id']) ?>" onclick="return confirm('Delete this user?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php $content = ob_get_clean(); include __DIR__ . '/../layouts/main.php'; ?> 