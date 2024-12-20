<?php
// import numbers, set default safe value
$reports = explode("\n", file_get_contents('../input.txt'));
$safereports = 0;

// loop through reports
foreach ($reports as $report) {
    echo "<br>$report<br>";
    $currentreport = explode(" ", $report);

    // ignore empty rows
    if (count($currentreport) <= 1) {
        break;
    }

    $safelevels = 0; // needs to equal array count to pass
    $prev = 0; // previous value
    $direction = false; // direction of level values

    foreach ($currentreport as $item){
        // set first level of this report and mark as safe
        if (! $prev) {
            $prev = $item;
            $safelevels++;
            continue;
        }

        // if not set, which direction are the levels going?
        if ( ! $direction){
            $direction = ($item > $prev) ? 'ASC' : 'DESC';
        }

        // if values are moving the wrong direction or not moving, not safe
        if (
            $item > $prev && $direction == 'DESC' ||
            $item < $prev && $direction == 'ASC' ||
            $item == $prev) {
                echo "$prev $item wrong direction<br>";
                $prev = $item;
                break;
         }


        // check for maximum difference of 3
        if (abs($item - $prev) > 3) {
            echo "$prev $item greater than 3 apart<br>";
            $prev = $item;
            break;
        }

        // it's safe
        $safelevels++;
        $prev = $item;
    }

    // do the number of safe levels match the number of levels?
    if ($safelevels == count($currentreport)) {
        echo "SAFE<br>";
        $safereports++;
    }
}

?>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>2a</h1>
        <p>Safe: <?php echo $safereports; ?></p>
    </body>
</html>

