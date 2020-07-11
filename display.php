<?php

include 'conn.php';


if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else{
    $page = 1;
}

$num_per_page = 03;
$start_from = ($page-1)*03;


    $q = "select * from slist limit $start_from, $num_per_page";

    $query = mysqli_query($con,$q);

   
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="container">
        <div class="col-lg-12">
            <br><br>
            <h1 class="text-warning text-center"> Display Table Data</h1>
            <br>


            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-dark text-white text-center">
                    <td> ID </td>
                    <td> Username </td>
                    <td> Password </td>
                    <td>Add</td>
                    <td> Delete </td>
                    <td> Update </td>
                </tr>

    <?php

        include 'conn.php';

          
            $q = "select * from slist";

            $query = mysqli_query($con,$q);

            while($res = mysqli_fetch_array($query)){

    ?>


                <tr class="text-center">
                    <td> <?php  echo $res['Id'];  ?> </td>
                    <td> <?php  echo $res['username'];  ?> </td>
                    <td> <?php  echo $res['password'];  ?> </td>
                    <td> <button class="btn-primary btn"> <a href="insert1.php?id=<?php  echo $res['Id']; echo $res['username']; echo $res['password'];  ?>" class="text-white"> Add</a></button> </td>
                    <td> <button class="btn-danger btn"> <a href="delete1.php?id=<?php  echo $res['Id'];  ?>" class="text-white"> Delete</a></button> </td>
                    <td> <button class="btn-primary btn"> <a href="update.php?id=<?php  echo $res['Id'];  ?>" class="text-white"> Update</a></button>  </td>
                </tr>
<?php
            }
        
?>
        </table>

        <?php
            $q = "select * from slist";
            $query = mysqli_query($con,$q);
            $total_record = mysqli_num_rows($query);
            
            $total_page = ceil($total_record/$num_per_page);
                    if($page>1)
                    {
                        echo "<a href='display.php?page=".($page-1)." ' class='btn btn-danger'>Previous</a>";
                    }


            
            for($i=1;$i<$total_page;$i++)
            {
                echo "<a href='display.php?page=".$i." ' class='btn btn-primary'></a>";
            }


            if($i>$page)
            {
                echo "<a href='display.php?page=".($page+1)." ' class='btn btn-danger'>Next</a>";
            }

        ?>



        </div>

    </body>
</html>