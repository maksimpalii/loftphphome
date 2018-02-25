<pre>
<?php
echo "Task №1" . PHP_EOL;
$name = "Максим";
$age = 32;
echo "Меная зовут: $name" . PHP_EOL;
echo "Мне $age лет" . PHP_EOL;
echo '“!|\/’”\\' . PHP_EOL . "\n";

echo "Task №2" . PHP_EOL;
$images = 80;
$felt_tip = 23;
$pencil = 40;
echo "Всего: $images рисунков" . PHP_EOL;
echo "$felt_tip фломастерами" . PHP_EOL;
echo "$pencil карандашами" . PHP_EOL;
echo "Остальные красками - ?" . PHP_EOL;
$paint = $images - ($felt_tip + $pencil);
echo "Рисунков красками: " . $images . " -(" . $felt_tip . "+" . $pencil . ") = " . $paint . PHP_EOL . "\n";

echo "Task №3" . PHP_EOL;
const DEBUG = 'constant variable';
//define('DEBUG', 'constant variable');
if (defined('DEBUG')) {
    echo "Константа существует" . PHP_EOL;
} else {
    echo "Константа не существует" . PHP_EOL;
}
echo "Значение константы: " . DEBUG . PHP_EOL . "\n";

echo "Task №4" . PHP_EOL;
$age = 30;
if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать" . PHP_EOL . "\n";
} elseif ($age > 65) {
    echo "Вам пора на пенсию" . PHP_EOL . "\n";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать" . PHP_EOL . "\n";
} else {
    echo "Неизвестный возраст" . PHP_EOL . "\n";
}

echo "Task №5" . PHP_EOL;
$day = 5;
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день" . PHP_EOL . "\n";
        break;
    case 6:
    case 7:
        echo "Это выходной день" . PHP_EOL . "\n";
        break;
    default:
        echo "Неизвестный день" . PHP_EOL . "\n";
}

echo "Task №6" . PHP_EOL;
$bmw = ["model" => "", "speed" => "", "doors" => "", "year" => ""];
$bmw = ["model" => "x5", "speed" => 120, "doors" => 5, "year" => "2015"];
$toyota = ["model" => "4x4", "speed" => 100, "doors" => 4, "year" => "2013"];
$opel = ["model" => "x3", "speed" => 180, "doors" => 5, "year" => "2017"];
$cars = ["bmw" => $bmw, "toyota" => $toyota, "opel" => $opel];

foreach ($cars as $key => $mass) {
    echo "CAR " . $key . PHP_EOL;
    foreach ($mass as $key2 => $value) {
        echo "$value ";
    }
    echo "\n";
}
echo "\n";

echo "Task №7" . PHP_EOL;
echo "<table border='1'>";
for ($tr = 1; $tr <= 10; $tr++) {
    echo "<tr>";
    for ($td = 1; $td <= 10; $td++) {
        if ($tr % 2 == 0 && $td % 2 == 0) {
            echo "<td>(" . $tr * $td . ")</td>";
        } elseif ($tr % 2 == 1 && $td % 2 == 1) {
            echo "<td>[" . $tr * $td . "]</td>";
        } else {
            echo "<td>" . $tr * $td . "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>" . PHP_EOL . "\n";

echo "Task №8" . PHP_EOL;
$str = "123 456";
echo $str . PHP_EOL;
$arr = explode(' ', $str);
//var_dump($arr);
$i = count($arr) - 1;
$arr2 = [];
while ($i >= 0) {
    $arr2[$i] = $arr[$i];
    $i--;
}
//var_dump($arr2);
$str_back = join('|', $arr2);
echo $str_back;

