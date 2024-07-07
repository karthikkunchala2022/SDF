<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <style>
        /* Add your custom styles for the search results page here */
        /* For example: */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: pink;
        }

        .search-results {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: grey;
            padding: 20px;
            border-radius: 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.5s ease;
            width: 350px;
            height: 400px;
            margin: 10px;
        }

        .card h2 {
            color: #000000;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .no-results {
            font-size: 48px;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
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

    if (isset($_POST['search_button'])) {
        $searchText = $_POST['search_text'];
        $query = "SELECT * FROM search_list WHERE name LIKE '%$searchText%'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo '<div class="search-results">';
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $phpFile = $row['phpFile'];
                echo '<section class="card" onclick="redirectToPhp(\'' . $phpFile . '\')">';
                echo '<h2>' . $name . '</h2>';
                echo '</section>';
            }
            echo '</div>';
        } else {
            echo '<h1 class="no-results">No matching results found.</h1>';
        }
    }

    $conn->close();
    ?>

    <script>
        function redirectToPhp(phpFile) {
            window.location.href =  phpFile;
        }
    </script>
</body>
</html>
