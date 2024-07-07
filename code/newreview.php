<!DOCTYPE html>
<html>
    <style>



body {
  background-color: #e8e8e8;
  margin: 0;
}

/* Navigation Bar */
.navtop {
  background-color: #6a9eff;
  height: 60px;
  width: 100%;
  border: 0;
}

.navtop div {
  display: flex;
  margin: 0;
  max-width: 1000px;
  padding: 0 10px;
  width: 100%;
  height: 100%;
  justify-content: flex-start;
  align-items: center;
}

.navtop div h1,
.navtop div a {
  display: inline-flex;
  align-items: center;
}

.navtop div h1 {
  flex: 1;
  font-size: 24px;
  padding: 0;
  margin: 0;
  color: #000000;
  font-weight: normal;
}

.navtop div a {
  padding: 0 20px;
  text-decoration: none;
  color: #c5d2e5;
  font-weight: bold;
}

.navtop div a i {
  padding: 2px 8px 0 0;
}

.navtop div a:hover {
  color: #ecf0f6;
}

/* Content */
.content {
  max-width: 1000px;
  width: 100%;
  margin: 0 auto;
  padding: 0 10px;
}

.content h2 {
  margin: 0;
  padding: 25px 0;
  font-size: 22px;
  border-bottom: 1px solid #ebebeb;
  color: #666666;
}

/* Reviews */
.review_image {
  position: relative;
  text-align: center;
  margin-bottom: 20px;
}

.review_image img {
  width: 100%;
  height: auto;
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
}

.image_textbu {
  transition: transform 0.3s ease-in-out;
}

.image_textbu {
  transform: scale(1.1);
}

.reviews {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.reviews .overall_rating {
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.reviews .write_review_btn,
.reviews .write_review button {
  display: inline-block;
  background-color: #001d7d;
  color: #fff;
  text-decoration: none;
  margin: 10px 0 0 0;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 14px;
  font-weight: 600;
  border: 0;
}

.reviews .write_review_btn:hover,
.reviews .write_review button:hover {
  background-color: #006f09;
}

.reviews .write_review {
  display: none;
  padding: 20px 0 10px 0;
  border: 1px solid #ddd;
  border-radius: 25px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.reviews .review {
  padding: 20px 0;
  border-bottom: 5px solid #eee;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.reviews .write_review textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  height: 150px;
  margin-top: 10px;
}

.reviews .write_review input {
  display: block;
  width: 250px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  margin-top: 10px;
}

.reviews .write_review button {
  cursor: pointer;
}

.reviews .review {
  padding: 20px 0;
  border-bottom: 1px solid #eee;
}

.reviews .review .name {
  padding: 0 0 3px 0;
  margin: 0;
  font-size: 18px;
  color: #555555;
}

.reviews .review .rating {
  letter-spacing: 2px;
  font-size: 22px;
  color: #F5A624;
}

.reviews .review .date {
  color: #777777;
  font-size: 14px;
}

.reviews .review .content {
  padding: 5px 0;
}

.reviews .review:last-child {
  border-bottom: 0;
}

<style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1">
  <title>Reviews System</title>
  <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
  <nav class="navtop">
    <div>
      <h1>Reviews System</h1>
    </div>
  </nav>
  <div class="content home">
    <h2>Reviews</h2>
    <div class="review_image">
      <img src="../hyberdad.jpg" alt="Review Image">
      <div class="image_text">Heading on the Photo</div>
    </div>

    <div class="reviews"></div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const reviews_page_id = 1;

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
