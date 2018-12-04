    <?php
    if(isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}' ) ";

        $create_post_query = mysqli_query($connection,$query);
        checkQuery($create_post_query);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <br>
            <select name="post_category_id" id="">
                <?php
                $query = "SELECT * FROM category";
                $select_category = mysqli_query($connection,$query);
                checkQuery($select_category);
                while ($row = mysqli_fetch_assoc($select_category)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="post_author">Author</label>
            <input type="text" class="form-control" name="author">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status">
        </div>
        <div class="form-group">
            <label for="post_image">Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
        </div>
    </form>
</body>
</html>