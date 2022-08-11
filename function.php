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

        $query = "INSERT INTO students( stu_name , stu_roll , stu_img ) VALUE ('$stu_name' , $stu_roll , '$stu_img')";

        // mysqli_query($this->conn, $query);



        // $db_connection_check =   mysqli_query($this->conn, $query);
        //  var_dump($db_connection_check);


        if (mysqli_query($this->conn, $query)) {

            move_uploaded_file($tmp_name, 'upload/' . $stu_img);

            return "Information added successfully";
        }
    }


    public function displayData()
    {

        $query = "SELECT * FROM students";
        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_query($this->conn, $query);
            return $returnData;
        }
    }

    public function displayDataByID($id)
    {

        $query = "SELECT * FROM students WHERE id = $id  ";

        if (mysqli_query($this->conn, $query)) {
            $returnData = mysqli_query($this->conn, $query);
            $student_data = mysqli_fetch_assoc($returnData);
            return $student_data;
        }
    }

    public function delete_data($id)
    {

        $catch_img  = "SELECT * FROM students WHERE id = $id ";
        $delete_stu_info = mysqli_query($this->conn, $catch_img);
        $stu_info_for_delete = mysqli_fetch_assoc($delete_stu_info);
        $delete_stu_img = $stu_info_for_delete['stu_img'];
        $query = " DELETE FROM students WHERE id = $id  ";
        
        if (mysqli_query($this->conn, $query)) {
            unlink('upload/'.$delete_stu_img);
            return "deleted successfully";
        }
    }

    public function update_data($data)
    {


        $stu_name =  $data['u_stu_name'];
        $stu_roll = $data['u_stu_roll'];
        $stu_id = $data['stu_id'];

        $stu_img = $_FILES['u_stu_img']['name'];


        $tmp_name = $_FILES['u_stu_img']['tmp_name'];

        $query = "UPDATE  students SET stu_name = '$stu_name' , 
           stu_roll = '$stu_roll' , stu_img = '$stu_img'  WHERE id =  $stu_id  ";


        if (mysqli_query($this->conn, $query)) {

            move_uploaded_file($tmp_name, 'upload/' . $stu_img);
            return "update 100/100";
        }
    }

   
}
