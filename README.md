# Laboratory Management System

The **Laboratory Management System** is a simple PHP-based web application designed to manage laboratory operations, including patient information, test records, test lists with pricing, and billing. This project is intended for educational purposes, providing a hands-on experience with web development using PHP, CSS, JavaScript, and Bootstrap.

## Features

- **Patient Information Management:** Add, update, and view patient details.
- **Test Management:** Record patient tests and manage test details.
- **Test List and Pricing:** Maintain a list of available tests along with their prices.
- **Billing System:** Generate and manage bills for patient tests.
- **Responsive Design:** Uses Bootstrap for a mobile-friendly interface.

## Technologies Used

- **PHP:** Backend logic and server-side scripting.
- **CSS:** Styling the application.
- **JavaScript:** Client-side interactions.
- **Bootstrap:** Responsive design framework.
- **Hack:** Additional scripting functionalities.

## Getting Started

To run this project on your local machine using XAMPP, follow the steps below:

### Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) installed on your local machine.

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/abdurehman760/laboratory-management-system.git
   
Set up the Database:

Open XAMPP Control Panel and start Apache and MySQL.
Access phpMyAdmin by navigating to http://localhost/phpmyadmin in your web browser.
Create a new database named lab.
Import the SQL file located in the db directory of the project (db/lab.sql) to the lab database.
Configure Database Connection:

Open the file includes/connection.php.
Update the database connection details as per your local server configuration, especially the database password.
php
Copy code
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = ''; // Set your database password here
$dbName = 'lab';
Run the Application:

Place the project folder in the htdocs directory of your XAMPP installation.
Open your web browser and navigate to http://localhost/laboratory-management-system to access the application.
Custom Domain Setup
If you want to set up a custom domain for this application on your local server, follow these instructions (update this with your specific instructions or a valid link).

Download Bootstrap Theme
The project uses a Bootstrap theme. Download the theme here.

Usage
Manage Patient Records: Add and manage patient details through the user interface.
Manage Tests and Pricing: Keep track of available tests and their associated costs.
Billing: Generate invoices for patient tests and manage payments.
Contributing
Contributions are welcome! Please fork the repository and submit a pull request for any improvements or new features.

License
This project is for educational purposes and is not intended for commercial use.
