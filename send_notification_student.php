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

include "header.php";
include "connection.php";
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
                            <h2>Send message to student</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form name="form1" action="" method="post" class="col-lg-6" encrypt="multipart/form-data">
                                <table class="table ">
                                    <tr>
                                        <td>
                                            <select class="form-control" name="dusername" >
                                                <?php
                                                $res=mysqli_query($link,"select * from student_registration");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    ?><option value="<?php echo $row["username"]?>">
                                                    <?php echo $row["username"]."(".$row["enrollment"].")"; ?>
                                                </option><?php
                                                }
                                                ?>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="title" placeholder="Enter Title" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Message: <br>
                                            <textarea name="msg" class="form-control">

                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="submit1" class="form-control" value="Send Message" style="background-color:blue;color:white ">
                                        </td>
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
mysqli_query($libk,"insert into messages values('','$_SESSSION[librarian]','$_POST[dusername]','$POST[title]','$POST_[msg]','n') ");


    ?>

    <script type="text/javascript">
        alert("Message sent succesfully");
    </script>

    <?php



}
?>




<?php
include "footer.php";

?>