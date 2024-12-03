<?php
// import numbers, set default safe value
$reports = explode("\n", file_get_contents('../input.txt'));
$safereports = 0;

function isValidSequence($report) {
    $errors = 0;
    $direction = null; // Ascending (1) or Descending (-1)

    for ($i = 1; $i < count($report); $i++) {
        $difference = $report[$i] - $report[$i - 1];

        // Determine the direction based on the first valid difference
        if ($direction === null && $difference !== 0) {
            $direction = $difference > 0 ? 1 : -1;
        }

        // Check if the current number follows the direction and is within range
        if (($direction === 1 && ($difference < 1 || $difference > 3)) ||  // Ascending but out of range
            ($direction === -1 && ($difference > -1 || $difference < -3))  // Descending but out of range
        ) {
            $errors++;
        }

        // If there are more than 1 violation, the sequence is invalid
        if ($errors > 1) {
            return false;
        }
    }

    return true;
}

// loop through reports
foreach ($reports as $report) {
    echo "<br><strong>$report</strong><br>";
    $currentreport = explode(" ", $report);

    // ignore empty rows
    if (count($currentreport) <= 1) {
        break;
    } else {
        if (isValidSequence($currentreport)) {
            echo "SAFE<br>";
            $safereports++;
        }
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

