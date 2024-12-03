<pre>
<?php
// import numbers, set default safe value
$data = file_get_contents('../input.txt');

// start at zero
$answer = 0;
$fragments = '';

// extract up to first don't
$pattern = '/^(mul\((.*?))don\'t\(\)/m';
if (preg_match_all($pattern, $data, $matches, PREG_PATTERN_ORDER)) {
    foreach ($matches[1] as $match) {
        $fragments .= $match;
    }
}

// extract do - don't blocks
$pattern = '/do\(\)(.*?)don\'t\(\)/m';
if (preg_match_all($pattern, $data, $matches, PREG_PATTERN_ORDER)) {
    foreach ($matches[1] as $match) {
        $fragments .= $match;
    }
}

// extract muls
$pattern = '/mul\((\d+),(\d+)\)/m';
if (preg_match_all($pattern, $fragments, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $match) {
        $answer += $match[1] * $match[2];
    }
}
?>
</pre>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>3a</h1>
        <p><?php echo $answer; ?></p>
    </body>
</html>

