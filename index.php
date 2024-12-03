<?php
$items = [
'1/a/',
'1/b/',
'2/a/',
'2/b/'
];
?>
<html>
    <?php include 'includes/head.php' ?>
    <body>
        <h1>Advent of Code 2024</h1>
        <ul>
            <?php foreach ($items as $item) : ?>
            <li><a href="<?php echo $item ?>"><?php echo str_replace('/', '', $item) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
