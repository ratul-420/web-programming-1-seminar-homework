# Currency Exchange Web Application
 
## Authors

- Ratul Fahim Muntashir (H1566N)

- Islam Md Aminul (PQFBDZ)
 
## Project Overview

A simple currency exchange web application built with PHP using the Front Controller pattern. Features include user registration/login, image gallery, contact form, message viewing, and responsive design.
 
## Features

- Front Controller pattern (`index.php`)

- Dynamic menu and templates

- User registration, login, logout

- Main page with intro, video, YouTube, and Google Map

- Image gallery with upload (only for logged-in users)

- Contact form with client/server validation, stores messages in DB

- Messages page (only for logged-in users)

- Responsive design with CSS
 
## Project Structure

```

/currency-exchange/

│

├── index.php

├── config.php

├── controllers/

│   ├── mainpage.php

│   ├── images.php

│   ├── contact.php

│   ├── messages.php

│   ├── login.php

│   ├── logout.php

├── templates/

│   ├── header.php

│   ├── menu.php

│   ├── footer.php

├── uploads/

├── css/

│   └── style.css

├── README.md

```
 
## Database Setup

1. Create a database in Nethely.hu phpMyAdmin.

2. Run the following SQL to create tables:

    ```sql

    CREATE TABLE users (

        id INT AUTO_INCREMENT PRIMARY KEY,

        family_name VARCHAR(50),

        surname VARCHAR(50),

        login_name VARCHAR(50) UNIQUE,

        password VARCHAR(255)

    );
 
    CREATE TABLE images (

        id INT AUTO_INCREMENT PRIMARY KEY,

        filename VARCHAR(255),

        user_id INT,

        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    );
 
    CREATE TABLE messages (

        id INT AUTO_INCREMENT PRIMARY KEY,

        name VARCHAR(100),

        email VARCHAR(100),

        message TEXT,

        user_id INT,

        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    );

    ```
 
## How to Run

1. Upload all files to your Nethely.hu `www` directory using FTP.

2. Make sure the `uploads/` folder exists and is writable.

3. Update `config.php` with your database credentials.

4. Access your site at `yourdomain.nhely.hu`.
 
## Version Control

- All code is versioned on GitHub.

- Each group member commits their own work with clear summaries.
 
---
 