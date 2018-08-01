<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rest api example</title>
</head>
<body>
    <div>
        <?php if (!$user) { ?>
            <p><a href="/login">Login</a></p>
        <?php } else { ?>
            <p><?php echo 'Hello, ' . $user; ?></p>
            <p><a href="/logout">Logout</a></p>
            <p>------------------------</p>
            <p><a href="/">Home</a></p>
            <p><a href="/products">Products</a></p>
        <?php } ?>
    </div>

    <div>
        <?php if ($template) {?>
            <?php include TEMPLATE_PATH . $template; ?>
        <?php } ?>
    </div>
</body>
</html>