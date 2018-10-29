<?php include "includes/admin_header.php"?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                //Check form empty and insert category
                                if($cat_title == "" || empty($cat_title)) {
                                    echo "This field should not be empty";
                                } else {
                                    $query = "INSERT INTO category(cat_title) ";
                                    $query .= "VALUE('{$cat_title}') ";
                                    $create_category = mysqli_query($connection,$query);
                                    if(!$create_category){
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }
                                }
                            }
                        ?>
                        <!-- Add Cateogry Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category
                                    <input class="form-control" type="text" name="cat_title">
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php
                        if (isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/edit_categories.php";
                        }
                        ?>
                    </div>
                        <!-- Display Category Table -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM category";
                                $select_category_admin = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($select_category_admin)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='category.php?delete={$cat_id}'</a>Delete</td>";
                                    echo "<td><a href='category.php?edit={$cat_id}'</a>Update</td>";
                                    echo "</tr>";
                                }
                                ?>

                                <?php
                                    if(isset($_GET['delete'])) {
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";
                                        $delete_query = mysqli_query($connection,$query);
                                        header("Location: category.php");
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"?>