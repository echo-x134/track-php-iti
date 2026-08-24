<?php




class DB
{
    protected $dbhost;
    protected $dbType;
    protected $dbName;
    protected $userName;
    protected $password;
    protected $connection;
    function __construct($host, $type, $dbname, $password, $uName)
    {

        $this->dbhost = $host;
        $this->dbType = $type;
        $this->dbName = $dbname;
        $this->userName = $uName;
        $this->password = $password;
        // $connection = new PDO("$dbType:host=$dbhost;dbname=$dbName", $userName, $password);

        $this->connection = new PDO("$this->dbType:host=$this->dbhost;dbname=$this->dbName", $this->userName, $this->password);
    }

    // select all Data
    function index($table)
    {
        try {
            //code...
            $query = "select * from $table";
            $sqlQuery = $this->connection->prepare($query);
            $sqlQuery->execute();
            $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Error $e) {
            //throw $th;

            echo $e->getMessage();
        }
    }

    function show($table, $id)
    {
        try {
            //code...
            $query = "select * from $table where id=:id";
            $sqlQuery = $this->connection->prepare($query);
            $sqlQuery->execute([
                "id" => $id
            ]);
            $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Error $e) {

            echo $e->getMessage();
        }
    }
    function create($table ,$data) {

     try {
        /**
         * [
         * "userName>'user',
         * "userEmail=>'password',
         * "userPassword=>'password',
         * 
         * 
         * ]
         */

        /**
         * 
         * 
         */

        $dataKeys= array_keys($data); // array  ==> string  [name , email , password ]=>name , email , password
        $stringDataKeys=implode(',',$dataKeys);

        $dataValues=array_values($data);
        $stringDataValues="'".implode("','",$dataValues)."'"; // 'name','email','password'
            //code...
            // $query = "insert into $table($stringDataKeys)values($stringDataValues)";
            $query = "insert into $table($stringDataKeys)values(?,?,?)";
            $sqlQuery = $this->connection->prepare($query);
           $result= $sqlQuery->execute([

                $dataValues['name'],
                $dataValues['email'],
                $dataValues['password'],
            ]);
           if($result)
            {
                return "created successfully";
            }else{
                 return "check your data ";
            }
        
        } catch (Error $e) {

            echo $e->getMessage();
        }
    }

    function delete() {}

    function update() {}
}

$db=new DB("localhost","mysql","iti_sm_php_g2_2026","1234","root");
// var_dump($db);