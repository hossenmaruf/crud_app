<?php


class crudApp
{

    private $conn;

    public function __construct()
    {

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname = 'crud_app';


        

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die('Database Connection Error');
        }
    }



    public function addData($data)
    {

        $stu_name = $data['stu_name'];
        $stu_roll = $data['stu_roll'];
        $stu_img = $_FILES['stu_img']['name'];
        $tmp_name = $_FILES['stu_img']['tmp_name'];

        $query = "INSERT INTO students( stu_name , stu_roll , stu_img ) VALUE ('$stu_name' , $stu_roll , '$stu_img')" ;

        
//       $db_connection_check =   mysqli_query($this->conn, $query);
// var_dump($db_connection_check);


        if (mysqli_query($this->conn, $query)) {

            move_uploaded_file($tmp_name, 'upload/'. $stu_img ) ;

            return "Information added successfully";
        }
    }
}

?>
