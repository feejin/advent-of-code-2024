<?php
// import numbers
$locationpairs = file_get_contents('../input.txt');

// setup empty arrays for numbers and answer
$l1 = $l2 = [];
$answer = 0;

// convert numbers into two arrays
$pattern = '/^(\d{5})\s{3}(\d{5})$/m';
if (preg_match_all($pattern, $locationpairs, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $match) {
        $l1[] = $match[1];
        $l2[] = $match[2];
    }
}

// multiply l1 values by occurences in l2
$l2counts = array_count_values($l2);
foreach ($l1 as $l1value) {
    $l2count = $l2counts[$l1value] ?? 0;
    $answer += $l2count * $l1value;
    // echo $l1value . " x " . $l2count . " = " . ($l2count * $l1value) . "<br>";
}
?>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>1b</h1>
        <p><?php echo $answer; ?></p>
    </body>
</html>
