<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="container p-5">
        <div class="text-center">
            <h2>OUR TEAM</h2>
            <p class="lead my-3">“There's no other way to say it: we'd be lost without you.” “I can't believe how lucky I am to have such a great team.” “It's incredible how often you go above and beyond.” “I know I've been busy lately, but I just had to tell you what a great job you're doing.”</p>
            <div class="card-group">
                <div class="card">
                    <img src="./img/our-team/Ashish.jpg" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ashish Khandal</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This card has even longer content than the first to show that equal
                            height action.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/our-team/Ashish.jpg" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dinesh Sharma</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./img/our-team/Deepak.jpg" class="card-img-top h-50" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Deepak Sharma</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <div class="d-inline-block text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                class="d-inline-block text-gray mb-2 text-secondary" style="width:9%;" viewBox="0 0 975.036 975.036">
                <path
                    d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                </path>
            </svg>
            <p class="lead text-body-secondary">Edison bulb retro cloud bread echo park, helvetica stumptown taiyaki
                taxidermy 90's cronut
                +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY tote bag drinking vinegar cronut
                adaptogen squid fanny pack vaporware. Man bun next level coloring book skateboard four loko knausgaard.
                Kitsch keffiyeh master cleanse direct trade indigo juice before they sold out gentrify plaid gastropub
                normcore XOXO 90's pickled cindigo jean shorts. Slow-carb next level shoindigoitch ethical authentic, yr
                scenester sriracha forage franzen organic drinking vinegar.</p>
            <span class="d-inline-block rounded mt-4 mb-3 bg-primary" style="width:50px; height:5px;"></span>
            <h5 class="text-gray-900 font-medium title-font tracking-wider text-sm">DINESH SHARMA</h5>
            <p class="text-black-50 fs-6">Senior Product Designer</p>
        </div>


    </div>
    
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>