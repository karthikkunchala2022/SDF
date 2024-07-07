<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle the click event on the account button
function showAccountOptions() {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

    $accountBox = '<div class="account-box">
                        <div class="profile-info">
                            <p><strong>Username:</strong> ' . $username . '</p>
                            <p><strong>Email:</strong> ' . $email . '</p>
                        </div>
                        <div class="options">
                            <a href="logout.php"><img src="../pictures/logout.png" alt="Logout"></a>
                        </div>
                    </div>';

    echo $accountBox;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(../pictures/hyd.jpg);
            background-size: cover;
            background-position: 0px;
        }

        header {
            color: #ffffff;
            padding: 100px;
            text-align: 500px;
            display: flex;
            margin-top: 10px;
            margin-left: 600px;
            justify-content: space-between;
            align-items: center;
        }
        header a {
            text-decoration: none;
            color: #fff;
        }
    .about-section {
     background-color: #F4EFEA;
    padding: 30px;
    border-radius: 10px;
    margin: 20px auto;
    width: 95%;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.about-section h2 {
    color: #000000;
    font-size: 40px;
    margin-bottom: 20px;
}

.about-section p {
    color: #4A171E;
    margin-bottom: 10px;
}


        
        nav {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        nav a {
            text-decoration: none;
            color: #333;
            padding: 0 10px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }
        
        nav a:hover {
            background-color: #ffffff;
            color: #413f3f;
        }
        
        main {
            padding: 20px;
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px auto;
            max-width: 1300px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        section {
            margin-bottom: 20px;
            cursor: pointer; 
        }
        
        h2 {
            color: #3b3b3b; 
            margin-bottom: 10px;
        }
        
        p {
            color: #504e4e;
        }
        
        .search-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 170px; 
        }
        
        .search-bar input[type="text"] {
            padding: 15px;
            font-size: 20px;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            width: 600px;
            text-align: center;
        }
        
        .search-bar button {
            padding: 15px 30px;
            font-size: 20px;
            background-color: #2b2b2c; 
            color: #fff;
            border: none;
            border-radius: 30px;
            margin-left: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .search-bar button:hover {
            background-color: #6278dd; 
        }
        
        .card-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-top: auto; 
            margin-bottom: 150px; 
        }
        
        .card {

            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.5s ease;
            width: 500px;
            height: 500px;
            margin: 10px;
            border-radius: 550px;

        }

        .card img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            border-radius: 50%; 
       }
        
        .card:hover {
            transform: scale(1.15);
         
        }
        
        .hide-account .account-image {
            display: none;
        }
        
        .hide-account .account-options {
            margin-top: 10px;
        }
        
        
        .card h2 {
            color:  #bf80ff;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .card p {
            color: #292929;
        }
        
        footer {
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .option-card {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 5px;
        }
        
        
        footer a {
            color: #000000;
            margin: 0 10px;
            text-decoration: none;
        }
        
        /* Updated CSS */
        .account-box {
            background-color: bpink; 
            padding: 10px;
            margin-top: 10px;
            position: absolute;
            right: 0;
            top: 100px;
            width: 300px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: none;
            transition: all 0.3s ease;
            transform: scale(1.2);
            z-index: 2;
        }
        
        .account-box a {
            text-decoration: none;
            color: #333;
            padding: 12px 25px;
            transition: background-color 0.3s ease;
            display: block;
        }
        
        .account-box a:hover {
            background-color: #f1f1f1;
        }
        
        .account-box p {
            margin: 12px;
        }
        
        .account-box img {
            width: 50px;
            height: 50px;
            margin-right: 12px;
        }
        
        .account:hover .account-box {
            display: block;
        }
        
        .show-account-box {
            display: block;
            height: 300px;
        }
        
        .account-image {
            cursor: pointer;
            outline: none;

        }
        .image-container {
            width: 90%;
            height: 0;
            padding-bottom: 90%;
            overflow: hidden;
            border-radius: 50%;
            position: relative;
            }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            }


        
        .account-options {
            display: flex;
            flex-direction: column;
            margin-top: 25px;
        }
    </style>
</head>
<body>
<!-- ...existing code... -->
<header>
<h1 style="font-size: 90px; color: #bb99ff; font-weight: bold; position: absolute;  ">ExploreEats</h1>
    <div class="account" style="position: absolute; top: 0; right: 0;padding: 50px">
        <button class="account-image" onclick="showAccountOptions()">
            <img src="../pictures/account.png" alt="Account" width="30" height="40">
        </button>
        <div id="accountOptions" class="account-box"></div>
    </div>
</header>



<main>
    <div class="search-bar">
        <form method="POST" action="search.php">
            <input type="text" name="search_text" placeholder="Search...">
            <button type="submit" name="search_button">Search</button>
        </form>
    </div>

    <div class="card-container">
        <section id="places" class="card" onclick="redirectToPhp('fun.php')">
            <h2>Places</h2>
            <div class="image-container">
                <a href="fun.php"><img src="../pictures/place.jpg" alt="Places"></a>
            </div>
        </section>

        <section id="food" class="card" onclick="redirectToPhp('food.php')">
            <h2>Food</h2>
            <div class="image-container">
                <a href="food.php"><img src="../pictures/food.png" alt="Food"></a>
            </div>
        </section>
    </div>
    <section id="about" class="about-section">
        <div class="about-content">
            <h2>About Us</h2>
          <pstyle="font-family:'Gil Sans', sans-serif;">Welcome to ExploreEats, the user-friendly website dedicated to collecting and managing reviews of restaurants near the Indian Institute of Technology Hyderabad (IITH) and popular tourist places in Hyderabad. Our mission is to provide reliable and up-to-date information to help users make informed choices about dining options and attractions in the vibrant city. </p>
          <pstyle="font-family:'Gil Sans', sans-serif;">What sets ExploreEats apart is our commitment to authenticity and unbiased reviews, encouraging users to share their honest thoughts and experiences.Easily navigate our platform to search for restaurants near IITH or explore our curated collection of top tourist attractions in Hyderabad. Each listing offers detailed information, user reviews, ratings, and photos. Join our community by creating an account to access additional features like bookmarking, writing reviews, and engaging in discussions. </p>
          <pstyle="font-family:'Gil Sans', sans-serif;">We appreciate user feedback as we continuously improve our platform to enhance your experience. Start your journey with ReviewMe today and become part of a vibrant community shaping the restaurant and tourism scene in Hyderabad.</p>
        </div>
    </section>
</main> 


<footer>
<a href="https://www.facebook.com" class="social-media"><img src="../pictures/facebook-icon.png" alt="Facebook" width="20" height="20"></a>
<a href="https://www.twitter.com" class="social-media"><img src="../pictures/twitter-icon.png" alt="Twitter" width="20" height="20"></a>
<a href="https://instagram.com/zomato?igshid=MzRlODBiNWFlZA==" class="social-media"><img src="../pictures/instagram.jpg" alt="Instagram" width="60" height="60"></a>
<a href="https://www.linkedin.com" class="social-media"><img src="../pictures/linkedin-icon.png" alt="LinkedIn" width="20" height="20"></a>
<p>&copy; 2023 Your Website. All rights reserved.</p>
</footer>

    <!-- Display the account options -->
  <?php showAccountOptions(); ?>

<script>
    function toggleAccountOptions() {
        var accountOptions = document.getElementById("accountOptions");

        // Toggle the display of account options
        if (accountOptions.style.display === "block") {
            accountOptions.style.display = "none";
        } else {
            accountOptions.innerHTML = '<p style ="color: green">Welcome, ' +'</p>' +
                '<a href="profile2.php"><button class="option-card"><img src="../pictures/profile.png" alt="Profile" width="20" height="20">Profile</button></a>' +
                '<a href="index.php"><button class="option-card"><img src="../pictures/logout.png" alt="Logout" width="20" height="20">Logout</button></a>';
            accountOptions.style.display = "block";
        }
    }

    // Event listener for account button click
    var accountButton = document.querySelector('.account-image');
    accountButton.addEventListener('click', toggleAccountOptions);

    // Event listener for clicking outside the account options box
    document.body.addEventListener('click', function (event) {
        var accountOptions = document.getElementById("accountOptions");
        var accountButton = document.querySelector('.account-image');

        // Check if the clicked element is outside the account options box
        if (!accountOptions.contains(event.target) && !accountButton.contains(event.target)) {
            accountOptions.style.display = "none";
        }
    });
</script>

</body>
</html>