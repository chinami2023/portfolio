<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sending a mail from contact forma
    $to = 'info@chinamiharashima.com';
    $from = $post['email'];
    $subject = 'We got a message from the contact';
    $body = <<<EOT
Name： {$post['name']}
email： {$post['email']}
Contents：
{$post['contact']}
EOT;
    // var_dump($body);
    // exit();
    mb_send_mail($to, $subject, $body, "From: {$from}");

    // going Thank You page
    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
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
    <!-- Contact form -->
    <div class="container">
        <form action="" method="POST">
            <p>Contact</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputName">Name</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo htmlspecialchars($post['name']); ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputEmail">Email</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo htmlspecialchars($post['email']); ?></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-3">
                        <label for="inputContent">Contact contents</label>
                    </div>
                    <div class="col-9">
                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-3">
                    <a href="index.php">Return</a>
                    <button type="submit">Sent</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>