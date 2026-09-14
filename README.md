# Carlinho-Conexoes 

A simplified Instagram-clone web application built for educational purposes. It focuses on core CRUD mechanics, asynchronous UI updates via Fetch API, and responsive web design.

## Features
- **Strict Dark Mode**: Sleek `#000000` and `#121212` color scheme.
- **Fully Responsive**: Centralized 600px feed on Desktop, fluid edge-to-edge layout on Mobile.
- **Dynamic Feed**: Posts fetched dynamically from a MySQL database using PHP PDO.
- **Asynchronous Likes**: Users can like posts and watch the counter update in real-time without refreshing the page (Vanilla JS Fetch API).
- **Post Creation**: Simple UI to submit external image URLs and captions.

## Project Structure
\`\`\`text
/
├── banco.sql       # Database schema and mock data
├── db.php          # Secure PDO Database connection
├── index.php       # Main Feed (Frontend + Backend read logic)
├── postar.php      # Form & POST request handler for new posts
├── curtir.php      # PHP endpoint for processing likes
├── script.js       # AJAX logic for the Like button
├── style.css       # Responsiveness and Dark Mode styles
└── vercel.json     # Configuration for Vercel deployment (optional)
\`\`\`

## Technologies Used
- **Frontend**: HTML5, CSS3, JavaScript (ES6)
- **Backend**: PHP 8+
- **Database**: MySQL
