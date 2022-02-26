<?php 

    /*
    * PDO database class
    * Connect to database
    * Create prepared statements
    * Bind values
    * Return rows and results
    */

    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct()
        {
            // set DSN
            $dsn = 'mysql:host =' . $this->host . 
            ';dbname=' . $this->dbname;

            $option = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // Prepare statement with query 
        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        //Bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_int($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_int($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                       
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->stmt->execute();
        }

        // Get results set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        // Get single record as obj
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);

        }

        // Get row count 
        public function rowCount(){
            return $this->stmt->rowCount();

        }
    }