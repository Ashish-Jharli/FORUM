<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    $noResult = false;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = true;
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        // Query the users table to find out the name of Original Poster (OP)
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
    }
    ?>


    <?php 
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method=='POST') {
            // insert into comment db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your comment has been addded!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
        ?>



    <!-- Category container start here -->
    <div class="container my-4 px-auto py-4 bg-body-secondary">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;  ?></h1>
            <p class="lead"><?php echo $desc;  ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No spam / Advertising / Self-promote in the forum is allowed. Do not post
                copyright-infringing material. Do not post "offensive" posts, link or image. ... Do not cross post
                questions. Do not PM users asking for help. ... Remain respectful of ohter members at all times.</p>
            <p>Posted by: <b><em><?php echo $posted_by; ?></em></b></p>
        </div>
    </div>
    <hr>

    <?php 
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {
        
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class="form-group py-2">
        <label for="comment">Type your comment</label>
        <textarea class="form-control" name="comment" rows="3" id="comment"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">

        </div>
        <button type="submit" class="btn btn-success">Post Comment</button>
        </form>
        </div>';
        
    } else {
        echo ' <div class="container">
                <h1 class="py-2">Post a Comment</h1>
                <p class="lead">You are not logged in. Please login to be able to post comments.</p>
            </div>';
    }
?>


    <div class="container mb-5" id="ques">
        <h1 class="py-2">Discussions</h1>

        <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        
        $thread_user_id = $row['comment_by'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
              

    echo '<div class="d-flex container my-4 px-auto py-4 bg-body-secondary">
            <div class="flex-shrink-0">
                <img src="./img/userdefault.png" width="54" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">'. $row2['user_email'] .' at '.$comment_time.'</h5>
                '.$content.'
            </div>
        </div>';
        
            }
            
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid  container my-4 px-auto py-4 bg-body-secondary">
                    <div class="container">
                        <p class="display-4">No Comments Found...</p>
                        <p class="lead">Be the first person to comment.</p>
                    </div>
                </div>';
            }
            
            ?>


    </div>


    <?php include 'partials/_footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>