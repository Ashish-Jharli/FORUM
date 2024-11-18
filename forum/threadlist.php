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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    $noResult = false;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = true;
        $catname = $row['category_name'];
        $catdesc = $row['category_discription'];
    }

    ?>

    <?php 
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method=='POST') {
        // insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your thread has been addded! Please wait for community to repond.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
    ?>

    <!-- Category container start here -->
    <div class="container my-4 px-auto py-4 bg-body-secondary">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;  ?> Forums</h1>
            <p class="lead"><?php echo $catdesc;  ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No spam / Advertising / Self-promote in the forum is allowed. Do not post
                copyright-infringing material. Do not post "offensive" posts, link or image. ... Do not cross post
                questions. Do not PM users asking for help. ... Remain respectful of ohter members at all times.</p>
            <a href="#" class="btn btn-success btn-lg">Learn more</a>
        </div>
    </div>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {

    echo'<div class="container">
            <h1 class="py-2">Start a Discussion</h1>
            <form action="'. $_SERVER["REQUEST_URI"].'" method="post">
                <div class="form-group py-2">
                    <label for="title" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                </div>
                <div class="form-group py-2">
                    <label for="desc">Ellaborate Your Concern</label>
                    <textarea class="form-control" name="desc" rows="3" id="desc"></textarea>
                </div>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';

    }else {
        echo '<div class="container">
                <h1 class="py-2">Start a Discussion</h1>
                <p class="lead"> You are not logged in. Please login to be able to start a Discuss.</p>
            </div>';
    }
?>


    <div class="container mb-5" id="ques">
        <h1 class="py-2">Browse Questions</h1>
        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_time = $row['timestamp'];
                
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
              
    echo '<div class="d-flex container my-4 px-auto py-4 bg-body-secondary">
            <div class="flex-shrink-0">
                <img src="./img/userdefault.png" width="54" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">
                    <a class="text-dark btn-light link-underline link-underline-opacity-0" href="thread.php?threadid='.$id.'">'.$title.'</a>
                </h5>
            '.$desc.' </div>
            <h5 class="mt-0">Asked by: '. $row2['user_email'] .' at '.$thread_time.'</h5>
        </div>';
        
    }
    
    // echo var_dump($noResult);
          if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid  container my-4 px-auto py-4 bg-body-secondary">
                    <div class="container">
                        <p class="display-4">No Threads Found...</p>
                        <p class="lead">Be the first person to ask a question.</p>
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