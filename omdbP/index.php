<?php
include('includes/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Search Website</title>
    <!-- font awesome icons cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel = "stylesheet" href = "main.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    
    <div class = "wrapper">
        <?php
        include('includes/header.php');
        ?>
        <!-- end of logo -->
        <!-- search container -->
        <div class = "search-container">
            <div class = "search-element">
                <h3>Search Movie:</h3>
                <input type = "text" class = "form-control" placeholder="Search Movie Title ..." id = "movie-search-box" onkeyup="findMovies()" onclick = "findMovies()">

                <div class = "search-list" id = "search-list">
                    <!-- list here -->
                    <!-- <div class = "search-list-item">
                        <div class = "search-item-thumbnail">
                            <img src = "medium-cover.jpg">
                        </div>
                        <div class = "search-item-info">
                            <h3>Guardians of the Galaxy Vol. 2</h3>
                            <p>2017</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end of search container -->

        <!-- result container -->
        <div class = "container">
            <div class = "result-container">
                <div class = "result-grid" id = "result-grid">
                    <!-- movie information here -->
                    <!-- <div class = "movie-poster">
                        <img src = "medium-cover.jpg" alt = "movie poster">
                    </div>
                    <div class = "movie-info">
                        <h3 class = "movie-title">Guardians of the Galaxy Vol. 2</h3>
                        <ul class = "movie-misc-info">
                            <li class = "year">Year: 2017</li>
                            <li class = "rated">Ratings: PG-13</li>
                            <li class = "released">Released: 05 May 2017</li>
                        </ul>
                        <p class = "genre"><b>Genre:</b> Action, Adventure, Comedy</p>
                        <p class = "writer"><b>Writer:</b> James Gunn, Don Abnett, Andy Lanning</p>
                        <p class = "actors"><b>Actors: </b>Chris Pratt, Zoe Saldana, Dave Bautista</p>
                        <p class = "plot"><b>Plot:</b> The Guardians struggle to keep together as a team while dealing with their personal family issues, notably Star-Lord's ecounter with his father the ambitious celestial being Ego.</p>
                        <p class = "language"><b>Language:</b> English</p>
                        <p class = "awards"><b><i class = "fas fa-award"></i></b> Nominated for 1 Oscar</p>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end of result container -->
    </div>


    <!-- movie app js -->
    <script src = "script.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<?php

    if (isset($_POST['add'])) {
        if(empty($_SESSION['id'])){
            echo "<script>alert('Please Login First.');window.location.href='index.php';</script>";
        } else {
            $imdbID = $_POST['imdbID'];
            $playlist = $_POST['playlist'];
            $image = $_POST['image'];
            $name = $_POST['name'];
            $userId = $_SESSION['id'];
            if ($playlist == 1) {

                $check = "SELECT * from private where userId = '$userId' and imdbID = '$imdbID'";
                $res = mysqli_query($con,$check);
                if (mysqli_num_rows($res) > 0) {
                    echo "<script>alert('Movie already saved in your private playlist.');window.location.href='index.php';</script>";
                } else {
                    $insert = "Insert into private (userId, playlist, imdbID, image, name) values ('$userId', '$playlist', '$imdbID', '$image', '$name')";
                    $rest = mysqli_query($con,$insert);
                    if($rest){
                        echo "<script>alert('Movie saved in your private playlist.');window.location.href='index.php';</script>";
                    } else {
                        echo "<script>alert('Something went wrong.');window.location.href='index.php';</script>";
                    }
                }
                
            }

            if ($playlist == 0) {

                $check = "SELECT * from public where userId = '$userId' and imdbID = '$imdbID'";
                $res = mysqli_query($con,$check);
                if (mysqli_num_rows($res) > 0) {
                    echo "<script>alert('Movie already saved in your public playlist.');window.location.href='index.php';</script>";            
                } else {
                    $insert = "Insert into public (userId, playlist, imdbID, image, name) values ('$userId', '$playlist', '$imdbID', '$image', '$name')";
                    $rest = mysqli_query($con,$insert);
                    if($rest){
                        echo "<script>alert('Movie saved in your private playlist.');window.location.href='index.php';</script>";
                    } else {
                        echo "<script>alert('Something went wrong.');window.location.href='index.php';</script>";
                    }
                }
                
            }
        }

    }

?>