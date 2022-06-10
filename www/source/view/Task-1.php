<?php
// Task 1.
$currentNum = 6;
include('source/view/layouts/header.php');

function myArrowFunc(int $num): string
{
    return str_repeat("<", $num) . str_repeat(">", $num);
}

$result = myArrowFunc($currentNum);
?>
Task 1.
Number: <?php echo $currentNum ?>
<br>
Result: <?php echo $result ?>
<br>
<br>
<br>
<a href="/">Back To Main</a>