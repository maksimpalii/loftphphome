<?php

function task1($arr = array("строка 1"), $trigger = false)
{
    //$numargs = func_num_args();
    //echo "Количество аргументов: $numargs\n";
    //print_r(func_get_arg(0));

    if (is_bool($trigger) === true && $trigger == true) {
        $arr_line = implode(" ", $arr);
        return $arr_line;
    } else {
        foreach ($arr as $key => $value) {
            echo "<p>$value</p>";
        }
    }
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

