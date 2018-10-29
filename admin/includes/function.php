
<?php
    function insert_category() {
        global $connection;
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
    }

    function findAllCategories() {
        global $connection;
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
    }

    function deleteCategory(){
        global $connection;
        if(isset($_GET['delete'])) {
            $the_cat_id = $_GET['delete'];
            $query = "DELETE FROM category WHERE cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection,$query);
            header("Location: category.php");
        }
    }















?>