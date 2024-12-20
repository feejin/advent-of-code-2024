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

// sort both arrays
sort($l1);
sort($l2);

// loop through arrays and find difference between pairs
for ($i=0; $i<count($l1); $i++) {
    $answer += abs($l2[$i] - $l1[$i]);
}
?>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>1a</h1>
        <p><?php echo $answer; ?></p>
    </body>
</html>

