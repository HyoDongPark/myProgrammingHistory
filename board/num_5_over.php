<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-25
 * Time: 오후 7:39
 */

    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    //<--------------------------------------------------------------------------------------->
    $value = $_POST['hideValue'];
    //<--------------------------------------------------------------------------------------->
    $min = $value - 3;
    $max = $value + 3;
    $su = 0;
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $select = "select * from board where board_pid = 0";
    $selectView = mysql_query($select);
    $sql_num_row = mysql_num_rows($selectView);
    //<--------------------------------------------------------------------------------------->
    $sel = $sql_num_row / 5;
    $sell = ceil($sel);
    //<--------------------------------------------------------------------------------------->
    if($max == $sell || $max > $sell) {
        $max = $sell;
    }
    //<--------------------------------------------------------------------------------------->
    for ($i = $min; $i < $max; $i++) {
        if($i == $min) {
            echo "<li><a href='http://localhost/board/writeList.html' onclick='' id='0' name='page'><<</a></li>";
        }
        //<--------------------------------------------------------------------------------------->
        else {
            $su = $i + 1;
            echo "<li><a href='#' onclick='page_Next(event)' id='$i' name='page'>$su</a></li>";
            if($i == $max - 1) {
                $value = $max - 1;
                echo "<li><a href='#' onclick='page_Next(event)' id='$value' name='page'>>></a></li>";
                break;
            }
        }
        //<--------------------------------------------------------------------------------------->
    }
    //<--------------------------------------------------------------------------------------->