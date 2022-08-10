<?php


include("function.php");

$objCrudAdmin = new crudApp();

if (isset($_POST['add_info'])) {

    $return_msg =   $objCrudAdmin->addData($_POST);
}


$stu_data =   $objCrudAdmin->displayData();

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
                echo $return_msg;
            }   ?>

            <input class="form-control mb-2" type="text" name="stu_name" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="number" name="stu_roll" placeholder="Enter Your Roll">


            <label for="image"> Upload Your Image</label>

            <input class="form-control mb-2" type="file" name="stu_img">

            <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">



        </form>






    </div>


    <div class="containter my-4 p-4 shadow">

        <table class="table table-dark">
            <thead>
                <tr>

                    <th> ID</th>
                    <th> NAME</th>
                    <th> ROLL</th>
                    <th> IMAGE</th>
                    <th> ACTION </th>


                </tr>



            </thead>

            <tbody>


                <?php while ($stu_datas = mysqli_fetch_assoc($stu_data)) {    ?>

                    <tr>

                        <td> <?php echo $stu_datas['id']; ?> </td>
                        <td> <?php echo $stu_datas['stu_name']; ?> </td>
                        <td> <?php echo $stu_datas['stu_roll']; ?> </td>
                        <td> <img style="height: 50px;"   src="upload/<?php echo $stu_datas['stu_img']    ?> "> </td>
                        <td>

                            <a class="btn btn-success" href="#"> Edit </a>
                            <a class="btn btn-warning" href="#"> Deleted </a>





                        </td>


                    </tr>

                <?php } ?>

            </tbody>



        </table>





    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>