<?php
/**
 * Created by PhpStorm.
 * User: Anh Đức
 * Date: 8/8/2015
 * Time: 10:20 PM
 */
include_once 'database.php';
class users extends database {
    protected $users_id;
    protected $users_name;
    protected $users_acc;
    protected $users_pass;
    protected $users_email;
    protected $users_lv;

    public function __contruct() {
        $this->connect();
    }
    public function set_users_id($users_id) {
        $this->users_id = $users_id;
    }
    public function get_users_id() {
        $users_id = $this->users_id;
        return $users_id;
    }
    public function set_users_name($users_name) {
        $this->users_name = $users_name;
    }
    public function get_users_name() {
        $users_name = $this->users_name;
        return $users_name;
    }
    public function set_users_acc($users_acc) {
        $this->users_acc = $users_acc;
    }
    public function get_users_acc() {
        $users_acc = $this->users_acc;
        return $users_acc;
    }
    public function set_users_pass($users_pass) {
        $this->users_pass = $users_pass;
    }
    public function get_users_pass() {
        $users_pass = $this->users_pass;
        return $users_pass;
    }
    public function set_users_email($users_email) {
        $this->users_email = $users_email;
    }
    public function get_users_email() {
        $users_email = $this->users_email;
        return $users_email;
    }
    public function set_users_lv($users_lv) {
        $this->users_lv = $users_lv;
    }
    public function get_users_lv() {
        $users_lv = $this->users_lv;
        return $users_lv;
    }

    public function login() {
        $sql = "SELECT * FROM users WHERE account = '$this->users_acc' AND password = '$this->users_pass'";
        $this->query($sql);
        if($this->num_rows() > 0) {
            $_SESSION['usersacc'] = $this->users_acc;
            $_SESSION['level'] = $this->users_lv;
        }
        else {
            return 'acc not valid';
        }
    }
    public function add_user() {
        $sql = "SELECT * FROM users WHERE users_acc = '$this->users_acc'";
        $this->query($sql);
        if($this->num_rows() > 0) {
            echo 'user exist';
        }
        else {
            $sql = "INSERT INTO users (users_name, users_acc, users_pass, users_email, users_lv)
                    VALUES ('$this->users_name','$this->users_acc', '$this->users_pass', '$this->users_email', $this->users_lv)";
            $this->query($sql);
        }
    }
    public function edit_users() {
        $sql = "SELECT * FROM users WHERE users_acc = '$this->users_acc' AND users_id != '$this->users_id'";
        $this->query($sql);
        if($this->num_rows() > 0) {
            return 'users_exist';
        }
        else {
            $sql = "UPDATE users SET users_acc = '$this->users_acc', users_name = '$this->users_name',
            users_email = '$this->users_email', users_pass = '$this->users_pass', users_lv = '$this->users_lv'
            WHERE user_id = '$this->users_id'";
            $this->query($sql);
        }
    }
    public function del_users() {
        $sql = "DELETE FROM users WHERE users_id = '$this->users_id'";
        $this->query($sql);
    }
}