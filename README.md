# SQLMovieTheater

Welcome to our Movie Database PHP App! This application allows you to retrieve and add data from a database of movies, including movie genres and actors with their roles. The app features a search bar with Ajax functionality for quick and efficient searches. Additionally, it utilizes the Leaflet API to provide an interactive map feature.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Technologies Used](#technologies-used)

## Features
1. **Movie Data Retrieval**: The app allows you to fetch and display information about movies, genres, and actors from the database.
2. **Data Addition**: You can add new movie entries, genres, actors, and their roles through the app's user interface.
3. **Search Bar with Ajax**: A dynamic search bar enables you to quickly find specific movie titles, genres, or actors without refreshing the page.
4. **Leaflet API Integration**: The app integrates the Leaflet API, providing an interactive map feature for movie locations or theaters.
5. **Sass and CSS**: The styles are built using Sass, which offers better organization and maintainability of CSS code.
6. **Responsive Design**: The app is designed to be responsive and provide an optimal experience on various devices.

## Installation
1. Clone the repository to your local machine:

```bash
git clone https://github.com/x0-3/SQLMovieTheater.git
```

2. Navigate to the project folder:

```bash
cd SQLMovieTheater
```

3. Start a local PHP development server:

```bash
php -S localhost:8000
```

4. Open your web browser and access the app at `http://localhost:8000`.

## Database Setup
1. Locate the SQL database file inside the `sql` directory of the project.

2. Create a MySQL database and import the provided SQL dump file (`db.sql`) to set up the necessary tables and initial data.

3. Update the database configuration in the PHP files (`Connect.php`) to connect the app to your database.

```php
// Connect.php

const HOST = "localhost";
const DB = "movietheater";
const USER = "YOUR_USERNAME";
const PASS = "YOUR_PASSWORD";
```

## Usage
1. Once the app is running, you can explore the movie database, search for movies, genres, and actors using the search bar.
2. Add new movies, genres, actors, and their roles through the provided interface.
3. Interact with the Leaflet API integrated map to view movie locations or theater information.

## Technologies Used
- PHP
- CSS & Sass
- JavaScript
- MySQL Database
- Leaflet API

