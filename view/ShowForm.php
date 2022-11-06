<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Sing in</title>
</head>
<body class="text-secondary">
<?php
foreach ($posts as $post){
    ?> <p>
        <span> <?php echo $post['name']; ?></span>
        <span> <?php echo $post['head']; ?></span>
        <span> <?php echo $post['body']; ?></span>
    </p> <?php
}?>
</body>
<style>
    span {margin: 10px}

</style>