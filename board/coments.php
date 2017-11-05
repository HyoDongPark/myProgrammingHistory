<?php
/**
 * Created by PhpStorm.
 * User: Siro
 * Date: 2017-07-28
 * Time: 오후 3:36
 */
    define("HOST" , "localhost");
    define("USER" , "root");
    define("PASSWORD" , "autoset");
    define("DB_NAME" , "text_board");
    define("TABLE_NAME", "board");
    //<--------------------------------------------------------------------------------------->
    $pid = $_POST['hide'];
    $userid = $_POST['hide_ui'];
    $contents = $_POST['coContents'];
    //<--------------------------------------------------------------------------------------->
    $hits = 0;
    $Current_time = date("Y-m-d H:i:s");
    //<--------------------------------------------------------------------------------------->
    //$contents = str_replace("\n" , "<br />" , $contents);
    @$db_con = mysql_connect(HOST , USER , PASSWORD);
    mysql_select_db(DB_NAME, $db_con);
    //<--------------------------------------------------------------------------------------->
    $query = "insert into board (board_id,board_pid,user_id, user_name, subject, contents, hits , reg_date) ";
    $query .= "values ('','$pid','$userid' ,' ' ,' ' ,'$contents' , '$hits' , '$Current_time')";
    mysql_query($query);

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