<?php
// Function to generate the array with numbers from 1 to 40
function generateArray() {
    return range(1, 40);
}

// Function to mark multiples of n in the array
function markMultiples(&$array, $factor) {
    foreach ($array as &$value) {
        if ($value % $factor == 0) {
            $value = "$value multiple of $factor";
        }
    }
}

// Get the factor from the URL parameter
$factor = isset($_GET['factor']) ? intval($_GET['factor']) : null;

// Generate the array
$array = generateArray();

// If a valid factor is provided, mark the multiples
if ($factor && $factor > 0) {
    markMultiples($array, $factor);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Multiples Indicator</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<div>
    Original Array
    <ul style="margin-top:1px;">
        (
        <?php foreach (generateArray() as $key => $value): ?>
            <li>[<?= $key ?>] => <?php echo htmlspecialchars($value); ?></li>
        <?php endforeach; ?>
        )
    </ul>
</div>
  
<div>
Modified Array
    <ul style="margin-top:1px;">
        (
        <?php foreach ($array as $key => $value): ?>
            <li>[<?= $key ?>] => <?php echo htmlspecialchars($value); ?></li>
        <?php endforeach; ?>
        )
    </ul>
</div>
</body>
</html>
