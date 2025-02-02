<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    #main-container {
        min-height: 80vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>


    <!-- Search Result here -->
    <div class="container my-3" id="main-container">
        <h1>Search results for <em>"<?php echo $_GET['search']; ?>"</em></h1>

        <?php 
        $noResults = true;
        $query = $_GET["search"];
        $sql = "select * from `threads` where match (thread_title, thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        $noResult = false;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = true;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $url = "thread.php?threadid=".$thread_id;
            $noResults = false;
            
            // Display the search result
            echo '    <div class="result py-3">
                            <h3> <a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
                            <p>'.$desc.'</p>

                        </div>';
            
            }

        if ($noResults) {
            echo '<div class="jumbotron jumbotron-fluid  container my-4 px-auto py-4 bg-body-secondary">
                    <div class="container">
                        <p class="display-4">No Results Found...</p>
                        <p class="lead"> Suggestions:
                        <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                        </ul>
                        </p>
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