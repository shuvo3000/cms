<?php

include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";

$sql = "SELECT * FROM POSTS";

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php


            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
//                        $post_ = $row['post_'];
//                        $post_ = $row['post_'];

                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?PHP echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?PHP echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?PHP echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?PHP echo $post_image;?>" alt="">
                <hr>
                <p><?PHP echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php
                // echo '<li><a href="#">'.$cat_title.'</a></li>';
            }

            ?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
        <?php
        include "includes/sidebar.php";


        ?>


    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php
    include "includes/footer.php";


    ?>
