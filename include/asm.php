<?php
echo "Nhập số tự nhiên a: ";
$a = intval(trim(fgets(STDIN)));

echo "Nhập số tự nhiên b: ";
$b = intval(trim(fgets(STDIN)));

echo "Nhập số tự nhiên c: ";
$c = intval(trim(fgets(STDIN)));

$max = $a;

if ($b > $max) {
    $max = $b;
}

if ($c > $max) {
    $max = $c;
}

echo "Số lớn nhất trong ba số là: $max\n";
?>