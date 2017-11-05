<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-25
 * Time: 오후 2:08
 */

    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    $su = 0;
    //<--------------------------------------------------------------------------------------->
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $select = "select * from board WHERE board_pid = 0";
    $selectView = mysql_query($select);
    $sql_num_row = mysql_num_rows($selectView);
    //<--------------------------------------------------------------------------------------->
    $sel = $sql_num_row / 5;
    $sell = ceil($sel);

    //<--------------------------------------------------------------------------------------->
    if($sell < 5) {
        for ($i = -1; $i <= $sell; $i++) {
            if($i == -1) {
                $va = $i + 1;
                echo "<li><a href='http://localhost/board/writeList.html' onclick='' id='$va' name='page'><<</a></li>";
            }
            else if($i == $sell) {
                $temp = $sell - 1;
                echo "<li><a href='#' onclick='page_Next(event)' id='$temp' name='page'>>></a></li>";
                break;
            }
            else {
                $su = $i + 1;
                echo "<li><a href='#' onclick='page_Next(event)' id='$i' name='page'>$su</a></li>";
            }
        }
    }
    //<--------------------------------------------------------------------------------------->
    else {
        for ($i = -1; $i < $sell + 1; $i++) {
            if($i == -1) {
                $va = $i + 1;
                echo "<li><a href='http://localhost/board/writeList.html' onclick='' id='$va' name='page'><<</a></li>";
            }
            else {
                $su = $i + 1;
                echo "<li><a href='#' onclick='page_Next(event)' id='$i' name='page'>$su</a></li>";
                if($i == 4) {
                    $value = $sell - 1;
                    echo "<li><a href='#' onclick='page_Next(event)' id='$value' name='page'>>></a></li>";
                    break;
                }
            }
        }
    }
    //<--------------------------------------------------------------------------------------->