<!DOCTYPE html>
<html>
<head>
  <title>TripAdvisor</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
    background-color: #00a680;
    color: #fff;
    padding: 30px; /* Increase the padding for a bigger header */
    text-align: center;
   }

   .logo {
    font-size: 36px; /* Increase the font size for a bigger title */
    font-weight: bold;
    font-family: "Your Creative Font", Arial, sans-serif; /* Replace "Your Creative Font" with the actual font you want to use */
   }


  .logo {
    font-size: 40px;
    font-weight: bold;
    text-align: center; /* Center the logo text */
    margin: 0 auto; /* Center the logo horizontally */ 
   }


    nav ul {
      list-style: none;
      display: flex;
    }

    nav ul li {
      margin-right: 15px;
    }

    nav ul li a {
      color: #F8F8BE;
      text-decoration: none;
    
    }

    main {
   text-align: center;
   padding-top: 0; /* Remove the padding-top */
 } 

    .grid-container {
     display: grid;
     grid-template-columns: repeat(3, 1fr); /* Change to 3 columns */
     grid-gap: 20px;
     justify-items: center;
     max-width: 1200px; /* Limit the maximum width of the grid */
     margin: 0 auto; /* Center the grid horizontally */
   }


   .place-card {
     display: flex; /* Use flexbox to center content vertically */
     flex-direction: column;
     width: 300px;
     padding: 20px;
     margin: 10px;
     border: 1px solid #ddd;
     border-radius: 5px;
     text-align: center; /* Center text horizontally */
     background-color: #f2f2f2; /* Add a background color to the cards */
     box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a box shadow for a subtle effect */
     transition: transform 0.5s ease;
    }
    .place-card:hover {
      transform: scale(1.1);
    }


    .place-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
    }

    .place-card h3 {
      margin-top: 10px;
    }

    .place-card p {
      margin-top: 5px;
      color: #666;
    }

    footer {
      background-color: #f2f2f2;
      padding: 10px;
      text-align: center;
    }

    footer p {
      margin: 0;
    }
   

    .search-bar {
   margin-bottom: 20px;
    display: flex;
   justify-content: center; /* Center the search bar horizontally */
   margin-top: 20px;
   }

 .search-bar input[type="text"] {
   padding: 10px;
    width: 300px;
   font-size: 16px;
   border: none;
   border-radius: 25px; /* Add border radius for a rounded input */
   box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a box shadow for a subtle effect */
  }

   .search-bar button {
   padding: 10px 20px;
   font-size: 16px;
   background-color: #00a680;
   color: #fff;
   border: none;
   border-radius: 25px; /* Add border radius for a rounded button */
   cursor: pointer;
   transition: background-color 0.3s ease; /* Add a transition effect */
   }

   .search-bar button:hover {
   background-color: #008e6c; /* Change the background color on hover */
   }

  </style>
</head>
<body>
  <header>
    <nav>
      <div class="logo">EXPLORE</div>
    </nav>
  </header>

  <main>
    <div class="search-bar">
        <form method="POST" action="search.php">
            <input type="text" name="search_text" placeholder="Search...">
            <button type="submit" name="search_button">Search</button>
        </form>
    </div>
  
    <div class="grid-container">
          <div class="place-card">
            <a href="charminar.php"><img src="../pictures/Charminar1.jpg" alt="CHarminar"></a>
            <h3>Charminar</h3>
            <a href= 'https://goo.gl/maps/2qvgagLLAzo4zJSM7'><h3>Old City Hyderabad</h3></a>

      </div>
      <div class="place-card">
            <a href="husan.php"><img src="../pictures/hussainsagar2.jpg" alt="husan"></a>
            <h3>Hussain Sagar</h3>
            <a href= 'https://goo.gl/maps/H74EhV2aMKKfb5jo8'><h3>Necklace Road</h3></a>
      </div>
      <div class="place-card">
            <a href="cable.php"><img src="../pictures/cable1.jpg" alt="cable"></a>
            <h3>Cable Bridge</h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Jubilee Hills</h3></a>
      </div>
      <div class="place-card">
            <a href="gol.php"><img src="../pictures/golconda1.jpg" alt="golkonda"></a>
            <h3>Golconda</h3>
            <a href= 'https://goo.gl/maps/JFHwD7wH1E7PVG7e6'><h3>Ibrahim Bagh</h3></a>
      </div>
      <div class="place-card">
            <a href="ramoji.php"><img src="../pictures/Ramoji1.jpg" alt="ramoji"></a>
            <h3>Ramoji Film City</h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="wonderla.php"><img src="../pictures/wonderla1.jpg" alt="wonderls"></a>
            <h3>Wondrella</h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="shilpa.php"><img src="../pictures/shilpa1.jpg" alt="shilpa"></a>
            <h3>Shilpa Ramam</h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="salar.php"><img src="../pictures/salar3.jpg" alt="salar"></a>
            <h3>salarjung Museum</h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="snow.php"><img src="../pictures/snow1.jpg" alt="snow"></a>
            <h3>Snow World </h3>
            <a href= 'https://goo.gl/maps/kxKf69vmVpCAtYdq5'><h3>Location</h3></a>
      </div>
      
    </div>
  </main>
  

  <footer>
    <p>&copy; 2023 TripAdvisor. All rights reserved.</p>
  </footer>
</body>
</html>