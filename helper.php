<?php 

    class Connection {
        protected $servername   = "localhost";
        protected $username     = "root";
        protected $password     = "";
        protected $dbname       = "proyek";
        protected $conn;

        public function __construct()
        {
            session_start();
            $conn = mysqli_connect($this->servername,$this->username, $this->password, $this->dbname);
            if($conn->connect_error)
                die("Connection Failed : ". mysqli_connect_error());
            else{
                $this->conn = $conn;
            }
        }
        public function getConnection()
        {
            return $this->conn;
        }
        public function __destruct()
        {
            $this->conn->close();
        }
    }
    function alert($message) {
        echo "<script>alert('$message')</script>";
    }
