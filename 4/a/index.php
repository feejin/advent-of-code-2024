<?php
// import numbers, set default safe value
$data = file_get_contents('../input.txt');

// start at zero
$answer = 0;

// get line length
$rows = explode("\n", $data);
$l = strlen($rows[0]);

// strip newlines from data
$data = str_replace("\n", "", $data);

// horizontal instances
foreach ($rows as $row) {
    $xmas = substr_count($row, 'XMAS');
    $samx = substr_count($row, 'SAMX');
    $answer += $xmas + $samx;
}

// look for x's
for ($i = 0; $i < strlen($data); $i++) {
    if ($data[$i] == 'X') {
        if (findXmas($i, $l, $data)) {
            $answer++;
        }
    } elseif ($data[$i] == 'S') {
        if (findSamx($i, $l, $data)) {
            $answer++;
        }
    }
}

function findXmas($i, $l, $data) {
    // vertical
    if (@$data[$i + $l] == 'M' && @$data[$i + ($l * 2)] == 'A' && @$data[$i + ($l * 3)] == 'S') {
        // echo $data[$i] . $data[$i + $l] . $data[$i + ($l * 2)] . $data[$i + ($l * 3)] . "<br>";
        return true;
    }

    // diagonal backwards
    if (($i % $l) >= 3){
        if (@$data[$i + ($l-1)] == 'M' && @$data[$i + (($l * 2)-2)] == 'A' && @$data[$i + (($l * 3)-3)] == 'S') {
            // echo $data[$i] . $data[$i + ($l-1)] . $data[$i + (($l * 2)-2)] . $data[$i + (($l * 3)-3)] . "<br>";
            return true;
        }
    }

    // diagonal forwards
    if (($i % $l) <= ($l-4)){
        if (@$data[$i + ($l+1)] == 'M' && @$data[$i + (($l * 2)+2)] == 'A' && @$data[$i + (($l * 3)+3)] == 'S') {
            // echo $data[$i] . $data[$i + ($l+1)] . $data[$i + (($l * 2)+2)] . $data[$i + (($l * 3)+3)] . "<br>";
            return true;
        }
    }

    return false;
}

function findSamx($i, $l, $data) {
    // vertical
    if (@$data[$i + $l] == 'A' && @$data[$i + ($l * 2)] == 'M' && @$data[$i + ($l * 3)] == 'X') {
        // echo $data[$i] . $data[$i + $l] . $data[$i + ($l * 2)] . $data[$i + ($l * 3)] . "<br>";
        return true;
    }

    // diagonal backwards
    if (($i % $l) >= 3){
        if (@$data[$i + ($l-1)] == 'A' && @$data[$i + (($l * 2)-2)] == 'M' && @$data[$i + (($l * 3)-3)] == 'X') {
            // echo $data[$i] . $data[$i + ($l-1)] . $data[$i + (($l * 2)-2)] . $data[$i + (($l * 3)-3)] . "<br>";
            return true;
        }
    }

    // diagonal forwards
    if (($i % $l) <= ($l-4)){
        if (@$data[$i + ($l+1)] == 'A' && @$data[$i + (($l * 2)+2)] == 'M' && @$data[$i + (($l * 3)+3)] == 'X') {
            // echo $data[$i] . $data[$i + ($l+1)] . $data[$i + (($l * 2)+2)] . $data[$i + (($l * 3)+3)]  . "<br>";
            return true;
        }
    }

    return false;
}
?>
<html>
    <?php include '../../includes/head.php' ?>
    <body>
        <h1>3a</h1>
        <p><?php echo $answer; ?></p>
    </body>
</html>

