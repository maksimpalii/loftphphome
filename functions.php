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

