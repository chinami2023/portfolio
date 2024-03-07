<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['contact'] === '') {
        $error['contact'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Japanese front end deveroper, junior front end deveroper, portfolio, BCIT student">
    <meta name="description" content="I stay close to people,listen carefully to their words, and create a website that will please them. This is a portfolio website of junior front end deveroper, Chinami Harashima">
    <link rel="icon" href="../img/logo.ico">
    <link rel="stylesheet" href="https://use.typekit.net/udr2uyo.css">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
    <!-- お問合せフォーム画面 -->
    <div class="container">
        <form action="" method="POST" novalidate>
            <p>Contact</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputName">Name</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">require</p>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="name" id="inputName" class="form-control" value="<?php echo htmlspecialchars($post['name']); ?>" required autofocus>
                        <?php if ($error['name'] === 'blank'): ?>
                            <p class="error_msg">※Please add your name</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputEmail">Email</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">require</p>
                    </div>
                    <div class="col-8">
                        <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo htmlspecialchars($post['email']); ?>" required>
                        <?php if ($error['email'] === 'blank'): ?>
                            <p class="error_msg">※Please enter your name</p>
                        <?php endif; ?>
                        <?php if ($error['email'] === 'email'): ?>
                            <p class="error_msg">※*Please enter your email address correctly!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="inputContent">Inquiry Details</label>
                    </div>
                    <div class="col-2">
                        <p class="require_item">Require</p>
                    </div>
                    <div class="col-8">
                        <textarea name="contact" id="inputContent" rows="10" class="form-control" required><?php echo htmlspecialchars($post['contact']); ?></textarea>
                        <?php if ($error['contact'] === 'blank'): ?>
                            <p class="error_msg">※Please fill in your inquiry</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 offset-4">
                    <button type="submit">Go to confirmation.</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>