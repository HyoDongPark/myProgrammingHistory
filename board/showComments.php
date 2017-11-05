<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-28
 * Time: 오후 4:29
 */

    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    //<--------------------------------------------------------------------------------------->
    $pid = $_GET['hide'];
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);

    $query = "select board_id , user_id , contents , reg_date from board where board_pid = ".$pid;
    $selectView = mysql_query($query);

    while ($print = mysql_fetch_array($selectView)) {
        echo "<tr>
                    <td> $print[user_id] </td>
                    <td> $print[contents] </td>
                    <td> $print[reg_date] </td>
                    <td><a id='$print[board_id]' onclick='deleteComments(event)'>삭제</a></td>
                  </tr>";
    };