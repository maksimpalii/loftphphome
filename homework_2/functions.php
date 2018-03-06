<?php

function task1($arr = array("строка 1"), $trigger = false)
{
    if (is_bool($trigger) === true && $trigger == true) {
        $arr_line = implode(" ", $arr);
        return $arr_line;
    } else {
        foreach ($arr as $key => $value) {
            echo "<p>$value</p>";
        }
    }
    return 0;
}


function task2($arr, $action = NULL)
{
    function is_numArray($arr)
    {
        foreach ($arr as $key => $value) {
            if (is_numeric($value) == false) {
                return false;
            }
        }
        return 0;
    }

    if ($arr == NULL || count($arr) < 2) {
        echo "data array is NULL or < 2";
    } elseif (is_numArray($arr) === false) {
        echo "в данных есть символы";
    } else {
        $result = $arr[0];
        switch ($action) {
            case '-':
                for ($i = 1; $i < count($arr); $i++) {
                    $result -= $arr[$i];
                }
                echo $result;
                break;
            case '+':
                for ($i = 1; $i < count($arr); $i++) {
                    $result += $arr[$i];
                }
                echo $result;
                break;
            case '/':
                for ($i = 1; $i < count($arr); $i++) {
                    if ($arr[$i] == 0) {
                        $result = "нв '0' делить нельзя!";
                        break;
                    } else {
                        $result /= $arr[$i];
                    }
                }
                echo $result;
                break;
            case '*':
                for ($i = 1; $i < count($arr); $i++) {
                    $result *= $arr[$i];
                }
                echo $result;
                break;
            default:
                echo "нет действия или не верное";
        }
    }
}

function task3()
{
    function is_numerArray($newArr)
    {
        foreach ($newArr as $key => $value) {
            if (is_numeric($value) == false) {
                return false;
            }
        }
        return 0;
    }

    $numargs = func_num_args();
    $firstArg = func_get_arg(0);

    if ($numargs > 2) {
        //echo "ok";
        if (is_string($firstArg)) {
            //echo "певрое string";
            $newArr = func_get_args();
            unset($newArr[0]);
            if (is_numerArray($newArr) === false) {
                echo "не числа";
            } else {
                //echo "ok numeric" .PHP_EOL;
                $result = $newArr[1];
                switch ($firstArg) {
                    case '-':
                        for ($i = 2; $i <= count($newArr); $i++) {
                            $result -= $newArr[$i];
                        }
                        echo $result;
                        break;
                    case '+':
                        for ($i = 2; $i <= count($newArr); $i++) {
                            $result += $newArr[$i];
                        }
                        echo $result;
                        break;
                    case '/':
                        for ($i = 2; $i <= count($newArr); $i++) {
                            if ($newArr[$i] == 0) {
                                $result = "нв '0' делить нельзя!";
                                break;
                            } else {
                                $result /= $newArr[$i];
                            }
                        }
                        echo $result;
                        break;
                    case '*':
                        for ($i = 2; $i <= count($newArr); $i++) {
                            $result *= $newArr[$i];
                        }
                        echo $result;
                        break;
                    default:
                        echo "нет действия или не верное";
                }
            }
        } else {
            echo "Первый агрумент не строка";
        }
    } else {
        echo "мало данных";
    }
}

function task4()
{
    function is_intArray($newArr)
    {
        foreach ($newArr as $key => $value) {
            if (is_int($value) == false) {
                return false;
            }
        }
        return 0;
    }

    $numargs = func_num_args();
    //echo $numargs;

    $newArr = func_get_args();
    // print_r($newArr);

    if ($numargs == 2) {
        if (is_intArray($newArr) === false) {
            echo "не число или не целое";
        } else {
            if ($newArr[0] <= 0 || $newArr[1] <= 0) {
                echo "не должно быть меньше или равно '0'!";
            } else {
                echo "<table border='1'>";
                for ($tr = 1; $tr <= $newArr[1]; $tr++) {
                    echo "<tr>";
                    for ($td = 1; $td <= $newArr[0]; $td++) {
                        echo "<td>" . $tr * $td . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>" . PHP_EOL . "\n";
            }
        }
    } else {
        echo "только два параметра";
    }
}

function task5()
{
    $incomString = str_replace(" ", "", mb_strtolower(func_get_arg(0)));

    //вариант развернуть строку кирилицу
    function utf8_strrev($str){
        preg_match_all('/./us', $str, $ar);
        return implode(array_reverse($ar[0]));
    }

     function checkPalindrom($incomString)
    {
        $revString = '';
        for( $i = mb_strlen($incomString, "UTF-8"); $i >= 0; $i-- ){
            $revString .= mb_substr( $incomString, $i, 1, "UTF-8" );
        }

        if ($incomString == $revString) {
        //if ($incomString == utf8_strrev($incomString)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function messagePalindrom($incomString)
    {
        if (checkPalindrom($incomString) === true) {
            echo "Палиндром – строка, одинаково читающаяся в обоих направлениях";
        } else {
            echo "Не палиндром";
        }
    }
    messagePalindrom($incomString);
}

function task6(){
    echo date("d.m.Y H:i") .PHP_EOL;
    echo mktime(0, 0, 0, 02, 24, 2016) . PHP_EOL;
    echo date("d.m.Y H:i:s", mktime(0, 0, 0, 02, 24, 2016));
}

function task7(){
    $stringFirst = "Карл у Клары украл Кораллы";
    echo $stringFirst .PHP_EOL;
    echo str_replace('К', '', $stringFirst) .PHP_EOL . "\n";
    $stringSecond = "Две бутылки лимонада";
    $findArr = array("Две", "лимонада");
    $replaceArr   = array("Три", "кваса");
    echo $stringSecond .PHP_EOL;
    echo str_replace($findArr, $replaceArr, $stringSecond);
}
function task8(){
    function openRead($filename){
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize ($filename));
        echo $contents;
    }
    openRead("test.txt");
}
function task9($filename = 'anothertest.txt', $text = 'Hello again!'){
    $openFileWrite = fopen($filename, "w");
    $writeText = fwrite($openFileWrite, $text);
    if ($writeText) {
        echo "Запись успешна";
    }
    else{
        echo "Ошибка при записи";
    }
    fclose($openFileWrite);
}