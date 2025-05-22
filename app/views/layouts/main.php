<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($data['title']) ? htmlspecialchars($data['title']) : 'Portfolio Site' ?></title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php if (isset($content)) echo $content; ?>
    </div>
    <script src="/public/assets/js/main.js"></script>
</body>
</html> 