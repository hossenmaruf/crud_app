<?php


include("function.php");

$objCrudAdmin = new crudApp();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'edit') {
        $id = $_GET['id'];

        $previous_data =  $objCrudAdmin->displayDataByID($id);
    }
}

if (isset($_POST['edit_btn'])) {

    $msg   =    $objCrudAdmin->update_data($_POST);
}





?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD APP</title>
</head>

<body>

    <div class="containter my-4 p-4 shadow">

        <h2> <a style="text-decoration:none ;" href="index.php"> Student DataBase </a> </h2>


        <form class="form" action="" method="POST" enctype="multipart/form-data">


            <?php if (isset($return_msg)) {
                echo $msg;
            }   ?>

            <!-- nich ei 2line a problem , na hole $previous_data variable a problem or server ei problem -->



            <input class="form-control mb-2" type="text" name="u_stu_name" value=" <?php echo $previous_data['stu_name']; ?> ">
            <input class="form-control mb-2" type="number" name="u_stu_roll" value="<?php echo $previous_data['stu_roll']; ?>">



            <label for="image"> Upload Your Image</label>

            <input class="form-control mb-2" type="file" name="u_stu_img">


            <input type="hidden" name="stu_id" value=" <?php echo $previous_data['id'];   ?>  ">


            <input type="submit" value="Update Information" name="edit_btn" class="form-control bg-warning">



        </form>






    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>