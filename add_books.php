<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>

    <script type="text/javascript">
        window.location="login.php";
    </script>

    <?php
}

include "connection.php";
include "header.php";


?>

    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3></h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Books Info</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <form name="form1" action="" method="post" class="col-lg-6" encrypt="multipart/form-data">
                           <table class="table table-bordered">
                               <tr>
                                   <td> <input type="text" class="form-control" placeholder="Books Name" name="books_name" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="file" name="r1" required=""/></td>
                               </tr>

                               <tr>
                                   <td> <input type="text"  class="form-control" placeholder="Books Author Name " name="books_author_name" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="text"  class="form-control" placeholder="Publications  Name " name="books_publication_name" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="text"  class="form-control" placeholder="Books Purchase Date " name="books_purchase_date" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="text"  class="form-control" placeholder="Books Price " name="books_price" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="text"  class="form-control" placeholder="Books Quantity" name="books_qty" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="text" class="form-control" placeholder="Available Quantity" name="available_qty" required=""/></td>
                               </tr>
                               <tr>
                                   <td> <input type="submit" name="submit1" class="btn btn-default submit" style="background-color: blue ; color:white " value="Insert Books Details " required=""/></td>
                               </tr>
                           </table>


                            </form>







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php
if(isset($_POST["submit1"]))
{
    $msg = "";

    // $tm=md5(time());
    $image = $_FILES['r1']['name'];
   // $dst="./books_image/".$tm.$fnm;
   // $dst1="books_image/".$tm.$fnm;


    $target = "books_image/".basename($_FILES['r1']['name']);


    mysqli_query($link,"insert into add_books values('','$_POST[books_name]','$image',''$_POST[books_author_name]','$_POST[books_publication_name]','$_POST[books_purchase_date]','$_POST[books_price]','$_POST[books_qty]','$_POST[available_qty]','$_SESSION[librarian]')");


    if( move_uploaded_file($_FILES["r1"]["tmp_name"],$target)){
        $msg = "zxcvbnm";
    }
    else{
        $msg = "QQWERTYUIO";
    }
    ?>

    <script type="text/javascript">
        alert("Books Inserted Successfully ");

    </script>

    <?php

}

?>
<?php
include "footer.php";

?>