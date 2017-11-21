<?php

class Model
{
    private $_conn;
    private $_dbconfig;
    public function __construct($_config) {
        $this->_dbconfig = $_config;
        $this->_conn = $this->_connect($this->_dbconfig);
        mysqli_set_charset($this->_conn, "utf8");
    }

    private function _connect($cf) {
        $conn = new \mysqli($cf['db_host'], $cf['db_user'], $cf['db_password'], $cf['db_name']);
        if($conn->connect_error){
            die("连接失败：".$this->connect_error);
        }
        return $conn;
    }

    public function doQuery($sql) {
        return $this->_conn->query($sql);
    }

    public function select($tableName, $fields='*', $where='') {
        if(empty($tableName)) return ;
        if($fields !== '*'){
            if(is_array($fields)){
                $fields = implode(',', $fields);
            }
        }
        $sql = "SELECT {$fields} FROM `{$this->_dbconfig['db_pre']}{$tableName}` {$where}";
        $result = $this->_conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        return ;
    }

    public function insert($insert='', $tableName) {
        if(empty($insert)) return ;
        if(is_array($insert)){
            $key_arr = array_keys($insert);
            $keys = $values = '';
            foreach ($key_arr as $k => $v) {
                $keys .= '`'.$v.'`,';
            }
            $keys = substr($keys, 0, -1);
            
            $value_arr = array_values($insert);
            foreach ($value_arr as $k => $v) {
                $values .= "'".$v."',";
            }
            $values = substr($values, 0, -1);
        }
        $sql = "INSERT INTO `{$this->_dbconfig['db_pre']}{$tableName}`({$keys}) values ({$values})";
        return $this->_conn->query($sql);
    }

    public function findOne($tableName, $param='*', $where) {
        if($param != '*'){
            $param = implode(',', $param);
        }
        $sql = "SELECT {$param} FROM `{$this->_dbconfig['db_pre']}{$tableName}` WHERE {$where}";
        $result = $this->_conn->query($sql);
        return $result->fetch_assoc();
    }

    public function findMore($tableName, $param, $where) {
        if($param != '*'){
            $param = implode(',', $param);
        }
        if(!empty($where)) $where = ' WHERE '.$where;
        $sql = "SELECT {$param} FROM `{$this->_dbconfig['db_pre']}{$tableName}` {$where} ORDER BY ID DESC";
        $result = $this->_conn->query($sql);
        return $result->fetch_all(MYSQL_ASSOC);
    }

}