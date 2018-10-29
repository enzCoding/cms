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
                        Category
                    </h1>
                    <div class="col-xs-6">
                        <!-- Add Category Function-->
                        <?php
                            insert_category();
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
                        <!-- UPDATE AND EDIT CATEGORY-->
                        <?php
                        if (isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/edit_categories.php";
                        }
                        ?>
                    </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Display Category Table -->
                                <?php findAllCategories();?>
                                <!-- Delete Category -->
                                <?php deleteCategory(); ?>
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
