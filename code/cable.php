<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1">
  <title>Reviews System</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="reviews.css" rel="stylesheet" type="text/css">
  <style>
    /* Additional CSS for image and transition effects */
    .review_image {
      position: relative;
      text-align: center;
      margin-bottom: 5px; /* Add some spacing between the image and the reviews */
    }

    .review_image img {
      width: 100%;/A
      height: 100%;
    }
    .slideshow {
  position: relative;
  height: 600px; /* Adjust the height as needed */
  overflow: hidden;
}

.slideshow img {
  width: 100%;
  height: auto;
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
  position: absolute;
  top: 0;
  left: 0;
}

.slideshow img.active {
  opacity: 1;
}

.image_text {
  position: absolute;
  top: 90%;
  left: 30%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-size: 24px;
  font-weight: bold;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
  transition: transform 0.3s ease-in-out; /* Added transition property */

}
.image_text:hover {
  transform: scale(1.1);
}

.prev_arrow,
.next_arrow {
  position: absolute;
  top: 50%;
  transform: scale(1.1);
  color:  #666699;
  font-size: 36px;
  cursor: pointer;
  z-index: 2;
  transition: transform 0.3s ease-in-out; /* Added transition property */

}

.prev_arrow {
  left: 10px;
}

.next_arrow {
  right: 10px;
}
.prev_arrow:hover,
.next_arrow:hover {
  transform: scale(1.1);
}

    .image_text {
      position: absolute;
      top: 85%;
      left: 30%;
      transform: translate(-50%, -50%);
      color:   #b3b3cc;
      font-size: 45px;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
    .image_textbu{
      transition: transform 0.1s ease-in-out;
    }
    .image_textbu{
      transform: scale(1.01);
    }

    .reviews .write_review_btn {
      margin-left: 20px; 
      transition: transform 0.1s ease-in-out;
    }

    .reviews .write_review_btn:hover {
      transform: scale(1.05);
    }
    #home-button {
  width: 30px;
  height: 30px;
}

  </style>
</head>
<body>
<nav class="navtop">
  <div>
    <centre>
    <a href="../home.php"> <h1 style= 'font-size: 55px; font-family: Tahoma'>Explore Eats</h1></a>
</centre>  
  </div>
</nav>


  <div class="content home">

    <div class="review_image">
  <div class="slideshow">
    <img src="../pictures/cable1.jpg" alt="Review Image">
    <img src="../pictures/cable2.jpg" alt="Review Image">
    <img src="../pictures/cable3.jpg" alt="Review Image">
  </div>
  <div class="image_text">Cable Bridge</div>
  <a class="prev_arrow" onclick="changeSlide(-1)">&#10094;</a>
  <a class="next_arrow" onclick="changeSlide(1)">&#10095;</a>
</div>


    <div class="reviews"></div>

    <script>
      let slideIndex = 0;
  let slides = document.querySelectorAll('.slideshow img');

  function showSlide(index) {
    if (index < 0) {
      slideIndex = slides.length - 1;
    } else if (index >= slides.length) {
      slideIndex = 0;
    }

    slides.forEach((slide) => {
      slide.classList.remove('active');
    });

    slides[slideIndex].classList.add('active');
  }

  function changeSlide(n) {
    slideIndex += n;
    showSlide(slideIndex);
  }

  setInterval(() => {
    changeSlide(1);
  }, 4000);

      document.addEventListener('DOMContentLoaded', () => {
        const reviews_page_id = 12;

        fetch(`reviews.php?page_id=${reviews_page_id}`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not OK');
            }
            return response.text();
          })
          .then(data => {
            document.querySelector(".reviews").innerHTML = data;

            const writeReviewBtn = document.querySelector(".reviews .write_review_btn");
            const writeReviewForm = document.querySelector(".reviews .write_review form");

            writeReviewBtn.addEventListener('click', (event) => {
              event.preventDefault();
              document.querySelector(".reviews .write_review").style.display = 'block';
              document.querySelector(".reviews .write_review input[name='name']").focus();
            });

            writeReviewForm.addEventListener('submit', (event) => {
              event.preventDefault();
              fetch(`reviews.php?page_id=${reviews_page_id}`, {
                  method: 'POST',
                  body: new FormData(writeReviewForm)
              })
              .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not OK');
                }
                return response.text();
              })
              .then(data => {
                document.querySelector(".reviews .write_review").innerHTML = data;
              })
              .catch(error => {
                console.error('Error:', error);
                // Display an error message to the user
              });
            });
          })
          .catch(error => {
            console.error('Error:', error);
            // Display an error message to the user
          });
      });
    </script>
  </div>
</body>
</html>
