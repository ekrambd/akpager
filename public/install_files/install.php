<?php include 'php/boot.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="install/">

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
    <title><?= get_title() ?> - Installation</title>
    <!-- Base URL -->
    <?php $errors = $_SESSION['errors'] ?>
    <script>
        var path_prefix = '<?= PREFIX ;?>';
        var prev_url = '<?= prev_url(); ?>';
        var current_url = '<?= url();?>';
        var next_url = '<?= next_url();?>';
    </script>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />

    <link href="/install_files/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/install_files/assets/css/styles.css" rel="stylesheet" />
    <link href="/install_files/assets/css/feather.css" rel="stylesheet" />

    <script src="/install_files/assets/js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="invisible"></div>
    <div id="app-layout">
        <?php if (isset($fatalError)): ?>
            <div class="card-body">
                <div class="callout callout-danger"><?= $fatalError ?></div>
            </div>
        <?php else: ?>
        <div class="card">
            <div class="card-header">
                <h1><?= get_title() ?></h1>
            </div>
            <!-- current page start -->
            <?php get_page_content() ?>
            <!-- current page end  -->
        </div>
        <?php endif ; ?>
    <div class="invisible"></div>

    <script src="/install_files/assets/js/pages/<?= CURRENT_PATH ?>.js"></script>
</body>
</html>
<?php endPage(); ?>
