<?php
require 'functions.php';

$array_task1 = ['строка 1', 'строка 2', 'строка 3'];
$array_task2 = [23, 2, 1.4];

task1($array_task1);
echo task1($array_task1, true) . PHP_EOL;
echo '<br>';

task2($array_task2, '/');
echo '<br>';

task3('+', 1, 2, 3, 5.2);
echo PHP_EOL;

task4(12, 8);
echo PHP_EOL;

task5('m Ad aM');
echo PHP_EOL;

task6();
echo PHP_EOL;

task7();
echo PHP_EOL;

task8();
echo PHP_EOL;

task9('anothertest.txt', 'Hello again!');