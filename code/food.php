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
      color: #fff;
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
      <div class="logo">EAT</div>
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
            <a href="zamzam.php"><img src="../pictures/kings2.jpg" alt="Kings"></a>
            <h3>Kings Family Dhaba</h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Beside IITH, Kandi</h3></a>

      </div>
      <div class="place-card">
            <a href="kings.php"><img src="../pictures/zam3.jpg" alt="zamzam"></a>
            <h3>Zamzam </h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Near Sangareddy</h3></a>
      </div>
      <div class="place-card">
            <a href="canteen.php"><img src="../pictures/can1.jpg" alt="canteen"></a>
            <h3>Canteen </h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Inside IITH</h3></a>
      </div>
      <div class="place-card">
            <a href="mess.php"><img src="../pictures/mess.jpg" alt="mess"></a>
            <h3>Mess</h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Inside IITH</h3></a>
      </div>
      <div class="place-card">
            <a href="grill.php"><img src="../pictures/grilland1.jpg" alt="grilland"></a>
            <h3>Grilland</h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="pista.php"><img src="../pictures/pista1.jpg" alt="pista"></a>
            <h3>Pista House </h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="raja.php"><img src="../pictures/raj3.jpg" alt="raja"></a>
            <h3>Rajadani</h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="udipe.php"><img src="../pictures/udipi1.jpg" alt="udipe"></a>
            <h3>Udipe </h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Location</h3></a>
      </div>
      <div class="place-card">
            <a href="vantillu.php"><img src="../pictures/van2.jpg" alt="vantillu"></a>
            <h3>Vantillu </h3>
            <a href= 'https://goo.gl/maps/LsNE3MgBMYtAhf3Q8'><h3>Location</h3></a>
      </div>
      
    </div>
  </main>
  

  <footer>
    <p>&copy; 2023 TripAdvisor. All rights reserved.</p>
  </footer>
</body>
</html>