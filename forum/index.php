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

    .carousel-item img {
        height: 65vh;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <!-- slider start here -->


    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/slider1.avif" class="d-block w-100" alt="..." data-bs-interval="10000">
            </div>
            <div class="carousel-item">
                <img src="./img/slider2.jpg" class="d-block w-100" alt="..." data-bs-interval="20000">
            </div>
            <div class="carousel-item">
                <img src="./img/slider3.avif" class="d-block w-100" alt="..." data-bs-interval="30000">
            </div>
            <div class="carousel-item">
                <img src="./img/slider4.jpg" class="d-block w-100" alt="..." data-bs-interval="40000">
            </div>
            <div class="carousel-item">
                <img src="./img/slider5.jpg" class="d-block w-100" alt="..." data-bs-interval="50000">
            </div>
            <div class="carousel-item">
                <img src="./img/slider6.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container start here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center">iDiscuss - Browse Categories</h2>

        <div class="row my-4">
            <!-- Fetch all the categories -->
        <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_discription'];
                // <!-- use a for loop to iterate through categories -->
  
  
        echo ' <div class="col-md-4 my-2">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary" style="width: 18rem;">
                    <img src="img/card-'.$id.'.jpg"
                        class="card-img-top" alt="image for that category">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'" class="link-underline link-underline-opacity-0">'.$cat.'</a></h5>
                        <p class="card-text">'.substr($desc,0,90).'...</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
              </div>' ;
      }


      ?>
        </div>

    </div>

    <?php include 'partials/_footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>