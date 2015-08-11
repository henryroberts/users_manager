<?php

/**
 * Created by PhpStorm.
 * User: Anh Đức
 * Date: 8/8/2015
 * Time: 10:02 PM
 */
class database {
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const data = 'qlthanhvien';
    public $conn;
    public $result;
    public  function connect() {
        $this->conn = @mysql_connect(database::host,database::user, database::pass);
        if($this->conn){
            $dbSelect = @mysql_select_db(database::data,$this->conn);
            if($dbSelect) {
                @mysql_query('SET NAMES UTF8');
            }
        }
        else {
            echo 'không kết nối được tới database';
        }
    }
    public function query($sql){
        if($this->conn){
            $this->_result = mysql_query($sql);
        }
    }
    public function num_rows() {
        if ($this->result) {
            $rows = mysql_num_rows($this->result);
            return $rows;
        }
    }
    public function fetch(){
        if($this->result){
            $row = mysql_fetch_assoc($this->result);
            return $row;
        }
    }
    function __destruct() {
        if($this->conn) {
            mysql_close($this->conn);
        }
    }
}