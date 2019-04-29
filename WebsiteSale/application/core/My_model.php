<?php
include 'Database.php';
Class My_model extends Database{

    var $table = '';
    
   

    public function buldQueryParams($params) {
        $default = [
            "select" => "",
            "from" => "",
            "params" => "",
            "values" => "",
            "where" => "",
            "other"=>""
        ];
        $this->queryParams = array_merge($default, $params);
        return $this;
    }

    public function buildCondition($condition) {
        if (trim($condition)) {
            return "where " . $condition;
        }
        return "";
    }

    public function select() {
        $sql = "select " . $this->queryParams["select"] . " from " . $this->table . " " . $this->buildCondition($this->queryParams["where"]) . " ".$this->queryParams["other"];
        // var_dump($sql) ; die ; 
        $this->setQuery($sql);
        return $this;
        
    }
//
//    public function selectOne() {
//        $this->queryParams["other"] = "limit 1";
//        $data = $this->select();
//        if ($data) {
//            return $data[0];
//        }
//        return [];
//    }
//
//    public function insert() {
//        $sql = "insert into " . $this->table  . $this->queryParams["params"] . " values" . $this->queryParams["values"];                     
//        $result = $this->query($sql);
//        if ($result) {
//            return self::$connectionIntance->lastInsertId();
//        } else {
//            return false;
//        }
//    }
//
//    public function update() {
//        $sql = "update " . $this->table  . " set " . $this->queryParams["value"] . " " . $this->buildCondition($this->queryParams["where"]);
//        // var_dump($sql) ; die() ; 
//        return $this->query($sql);
//    }
//
//    public function delete() {
//        $sql = "delete from " . $this->table  . $this->buildCondition($this->queryParams["where"]) . " " . $this->queryParams["other"];
//        return $this->query($sql);
//    }
//    
    
}

?>