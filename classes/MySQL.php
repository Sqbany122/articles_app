<?php 

class MySQL {

    public $connect;

    public function __construct(){
        $connection = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        mysqli_query($connection, "SET CHARSET utf8");
        mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

        if (mysqli_connect_errno() != 0){
            echo '<p>Connection error: ' . mysqli_connect_error() . '</p>';
        }
        else {
            $this->connect = $connection;
        }
    }

    public function query($query){
        $query_result = $this->connect->query($query);
        $result = array();
        if($query_result->num_rows > 1) {
            while($row = $query_result->fetch_assoc()){
                array_push($result, $row);
            }
        } elseif ($query_result->num_rows) {
            $result = $query_result->fetch_assoc();
        } 

        return $result;
    }

    public function __destruct(){
        $this->connect->close();
    }

}