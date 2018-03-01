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
    $newString = str_replace(" ", "", mb_strtolower(func_get_arg(0)));

    function utf8_strrev($str){
        preg_match_all('/./us', $str, $ar);
        return implode(array_reverse($ar[0]));
    }

    function checkPalindrom($newString)
    {
        $revString = utf8_strrev($newString);
        if ($newString == $revString) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function messagePalindrom($newString)
    {
        if (checkPalindrom($newString) === true) {
            echo "Палиндром – строка, одинаково читающаяся в обоих направлениях";
        } else {
            echo "Не палиндром";
        }
    }
    messagePalindrom($newString);
}