<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if(isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $query = "DELETE from posts WHERE post_id = {$post_id} ";
        $delete_posts_query = mysqli_query($connection,$query);
        header("Location: posts.php");
        checkQuery($delete_posts_query);
    }
    ?>

    <?php
    $query = "SELECT * FROM users";
    $select_users= mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password= $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];



        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";

//        $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
//        $select_category_id = mysqli_query($connection,$query);
//        while ($row = mysqli_fetch_assoc($select_category_id)) {
//            $cat_id = $row['cat_id'];
//            $cat_title = $row['cat_title'];
//            echo "<td>{$cat_title}</td>";
//        }

        echo "<td>$user_email</td>";
//        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
//        $select_post_id_query = mysqli_query($connection,$query);
//        while ($row = mysqli_fetch_assoc($select_post_id_query)) {
//            $post_id = $row['post_id'];
//            $post_title = $row['post_title'];
//            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//        }


        echo "<td>$user_role</td>";
        echo "<td><a href='comments.php?approve='>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove='>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete='>DELETE</a></td>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>
<?php
    if(isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = {$the_comment_id} ";
        $approve_comment_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }

    if(isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = {$the_comment_id} ";
        $unapprove_comment_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }

    if(isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
        $delete_comment_query = mysqli_query($connection,$query);
        header("Location: comments.php");
    }
?>