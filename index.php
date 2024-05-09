<?php // if not APP_INSTALLED yet, redirect to public dir
if ( ! file_exists(__DIR__.'/.env') || ! (preg_match('/APP_INSTALLED=(true|1)/', file_get_contents(__DIR__.'/.env')))) {
    header("Location: public");
    die();
}
?><html lang="en">
<head>
    <title>.htaccess error</title>
    <style>
        body {
            background: rgb(250, 250, 250);
            color: rgba(0, 0, 0, 0.87);
            padding: 30px;
        }
        .card {
            background: rgb(255, 255, 255);
            margin: auto;
            border: 1px solid rgba(0, 0, 0, 0.12);
            padding: 25px;
            border-radius: 4px;
            max-width: 800px;
            text-align: center;
        }
        h1 {
            margin: 0 0 10px;
        }
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="card">
    <h1>Could not find .htaccess file</h1>
</div>
</body>
</html>
