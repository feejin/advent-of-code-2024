<?php
// import data
$data = file_get_contents('../input.txt');

// start at zero
$answer = 0;
$matches = 0;

// get line length
$rows = explode("\n", $data);
$l = strlen($rows[0]);

// horizontal instances
foreach ($rows as $row) {
    $xmas = substr_count($row, 'XMAS');
    $samx = substr_count($row, 'SAMX');
    $answer += $xmas + $samx;
}

// strip newlines from data
$data = str_replace("\n", "", $data);

// look for x's
for ($i = 0; $i < strlen($data); $i++) {
    if ($data[$i] == 'X') {
        if ($matches = findXmas($i, $l, $data)) {
            // echo "XMAS $matches <br>";
            $answer += $matches;
        }
    } elseif ($data[$i] == 'S') {
        if ($matches = findSamx($i, $l, $data)) {
            // echo "SAMX $matches <br>";
            $answer += $matches;
        }
    }
}

function findXmas($i, $l, $data) {
    $matches = 0;

    // vertical
    if (@$data[$i + $l] == 'M' && @$data[$i + ($l * 2)] == 'A' && @$data[$i + ($l * 3)] == 'S') {
        // echo $data[$i] . $data[$i + $l] . $data[$i + ($l * 2)] . $data[$i + ($l * 3)] . "<br>";
        $matches++;
    }

    // diagonal backwards
    if (($i % $l) >= 3){
        if (@$data[$i + ($l-1)] == 'M' && @$data[$i + (($l * 2)-2)] == 'A' && @$data[$i + (($l * 3)-3)] == 'S') {
            // echo $data[$i] . $data[$i + ($l-1)] . $data[$i + (($l * 2)-2)] . $data[$i + (($l * 3)-3)] . "<br>";
            $matches++;
        }
    }

    // diagonal forwards
    if (($i % $l) <= ($l-4)){
        if (@$data[$i + ($l+1)] == 'M' && @$data[$i + (($l * 2)+2)] == 'A' && @$data[$i + (($l * 3)+3)] == 'S') {
            // echo $data[$i] . $data[$i + ($l+1)] . $data[$i + (($l * 2)+2)] . $data[$i + (($l * 3)+3)] . "<br>";
            $matches++;
        }
    }

    return $matches;
}

function findSamx($i, $l, $data) {
    $matches = 0;

    // vertical
    if (@$data[$i + $l] == 'A' && @$data[$i + ($l * 2)] == 'M' && @$data[$i + ($l * 3)] == 'X') {
        // echo $data[$i] . $data[$i + $l] . $data[$i + ($l * 2)] . $data[$i + ($l * 3)] . "<br>";
        $matches++;
    }

    // diagonal backwards
    if (($i % $l) >= 3){
        if (@$data[$i + ($l-1)] == 'A' && @$data[$i + (($l * 2)-2)] == 'M' && @$data[$i + (($l * 3)-3)] == 'X') {
            // echo $data[$i] . $data[$i + ($l-1)] . $data[$i + (($l * 2)-2)] . $data[$i + (($l * 3)-3)] . "<br>";
            $matches++;
        }
    }

    // diagonal forwards
    if (($i % $l) <= ($l-4)){
        if (@$data[$i + ($l+1)] == 'A' && @$data[$i + (($l * 2)+2)] == 'M' && @$data[$i + (($l * 3)+3)] == 'X') {
            // echo $data[$i] . $data[$i + ($l+1)] . $data[$i + (($l * 2)+2)] . $data[$i + (($l * 3)+3)]  . "<br>";
            $matches++;
        }
    }

    return $matches;
}
?>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>3a</h1>
        <p><?php echo $answer; ?></p>
    </body>
</html>

