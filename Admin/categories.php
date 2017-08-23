<?PHP
include "includes/header.php";
if(isset($_GET['delete'])){

   $cat_id = $_GET['delete'];

   $sql = "DELETE FROM categories WHERE cat_id ='$cat_id'";

   $result = mysqli_query($conn, $sql);
   if(!$result){
         die('Query FAILED : '.mysqli_error($conn) );
     }else
     {
       header("location:categories.php"); 
       echo '<div class="alert alert-success"> Category Successfully deleted!</div>';

     }



}

if(isset($_POST['editCat'])){

    $cat_id = $_POST['edit_cat_id'];
    $cat_title = $_POST['edit_cat_title'];  

   $sql = "UPDATE `categories` SET `cat_title` = '$cat_title' WHERE `categories`.`cat_id` = $cat_id ";
    echo $sql;
   $result = mysqli_query($conn, $sql);
   if(!$result){
         die('Query FAILED : '.mysqli_error($conn) );
     }else
     {
       header("location:categories.php"); 
       echo '<div class="alert alert-success"> Category Successfully updated!</div>';

     }



}


?>

    <div id="wrapper">

        <!-- Navigation -->
        <?PHP
    include "includes/navigation.php";
?>


            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome to Admin
                                <small>Author</small>
                            </h1>
                            <div class="col-lg-6">

                                <?PHP

                                    if(isset($_POST['submit'])){
                                                    $cat_title = $_POST['cat_title'];
                                                    //$cat_id = $_POST['cat_title'];
                                         if($cat_title == "" || empty($cat_title))
                                         {
                                             echo "This field should not be empty!!";
                                         }else{
                                            $sql = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
                                             
                                             $result = mysqli_query($conn, $sql);
                                             
                                             if(!$result){
                                                 die('Query FAILED : '.mysqli_error($conn) );
                                             }else
                                             echo '<div class="alert alert-success">New Category Successfully added!</div>';
                                                     
                                         }
                                            
                                    }

                                
                                
                                ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="cat_title">Category Title</label>
                                            <input type="text" class="form-control" name="cat_title">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Add category">
                                        </div>
                                    </form>
                                    
                                    <?PHP
                                        if(isset($_GET['edit'])){

                                           $cat_id = $_GET['edit'];

                                           $sql = "SELECT * FROM categories WHERE cat_id ='$cat_id'";

                                           $result = mysqli_query($conn, $sql);
                                           if(!$result){
                                                 die('Query FAILED : '.mysqli_error($conn) );
                                             }else
                                             {
                                               $row = mysqli_fetch_array($result);
                                               $cat_title = $row['cat_title'];
                                               $cat_id = $row['cat_id'];
                                                
                                               echo '                        <form action="" method="post">
                                                                                <div class="form-group">
                                                                                    <label for="cat_title">Category Title</label>
                                                                                    <input type="text" class="form-control" name="edit_cat_title" value="'.$cat_title.'">
                                                                                    <input type="hidden" class="form-control" name="edit_cat_id" value="'.$cat_id.'">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="submit" class="btn btn-primary" name="editCat" value="Edit category">
                                                                                </div>
                                                                            </form>';

                                             }



                                        }                                
                                
                                ?>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Category</td>
                                            <td>Edit</td>
                                            <td>Delete</td>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            
                                            $sql = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $sql);

                                        ?>

                                            <?php    
                                        while($row = mysqli_fetch_assoc($result)){
                                            $cat_title = $row['cat_title'];
                                            $cat_id = $row['cat_id'];
                                            echo '<tr><td>'.$cat_id.'</td>';
                                            echo '<td>'.$cat_title.'</td>';
                                           
                                            echo '<td><a href="categories.php?edit='.$cat_id.'" class="btn btn-primary">Edit</a></td>';                                            
                                            echo '<td><a href="categories.php?delete='.$cat_id.'" class="btn btn-danger">Delete</a></td>';

                                            echo '</tr>';
                                      }

                                        ?>
<!--Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\CMS_edwin\admin\includes\navigation.php:102) in C:\xampp\htdocs\CMS_edwin\admin\categories.php on line 61-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

            <?PHP
    include "includes/footer.php";
?>
