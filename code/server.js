const express = require('express');
const axios = require('axios');
require('dotenv').config();

const app = express();
const PORT = 3000;

// Endpoint to exchange the authentication code for an access token and user information
app.get('/google/callback', async (req, res) => {
  const { code } = req.query;

  try {
    // Exchange the authorization code for an access token
    const { data } = await axios.post('https://oauth2.googleapis.com/token', {
      code,
      client_id: process.env.CLIENT_ID,
      client_secret: process.env.CLIENT_SECRET,
      redirect_uri: 'http://localhost:3000/google/callback',
      grant_type: 'authorization_code',
    });

    // Use the access token to retrieve user information
    const { access_token, id_token } = data;
    const userInfo = await axios.get(`https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=${access_token}`);

    // Perform further actions with the user information (e.g., store in a database, generate a session, etc.)
    console.log(userInfo.data);

    // Redirect the user to the desired page after successful authentication
    res.redirect('/dashboard');
  } catch (error) {
    console.error('Google authentication error:', error.message);
    res.redirect('/error');
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
app.get('/google/signin', (req, res) => {
    const redirectUrl = 'https://hyd.com/callback'; // Replace with your actual callback URL
    const googleAuthUrl = `https://accounts.google.com/o/oauth2/v2/auth?response_type=code&scope=email%20profile&redirect_uri=${redirectUrl}&client_id=${process.env.CLIENT_ID}`;
  
    res.redirect(googleAuthUrl);
  });
  
