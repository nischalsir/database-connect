---

# PHP Signup and Login System with Dashboard

This project is a PHP-based signup and login system connected to a SQL database. After successful login, users are redirected to a dashboard where the signed-up user data is displayed using Swiper.js. The project is set up to work with XAMPP.

## Features

- **User Signup:** Users can create an account by providing their details.
- **User Login:** Registered users can log in using their credentials.
- **Dashboard:** After login, the user is redirected to `dashboard.php`, which displays the signed-up user data in a swiper card format using Swiper.js.
- **Database Integration:** The project uses a SQL database to store user information.

## Prerequisites

- XAMPP or any similar local server environment
- PHP 7.4 or higher
- MySQL 5.7 or higher

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/repo-name.git
   ```

2. **Set up the database:**
   - Open XAMPP and start Apache and MySQL.
   - Open `phpMyAdmin` and create a new database.
   - Import the SQL file provided in the `database` folder to set up the required tables.

3. **Configure the project:**
   - Ensure that your `database.php` file (or equivalent) is correctly configured with your database credentials.

4. **Run the project:**
   - Place the project folder in the `htdocs` directory of your XAMPP installation.
   - Open a web browser and go to `http://localhost/your-project-folder`.

## Usage

1. **Sign Up:**
   - Go to the signup page and fill in the required fields.
   - Submit the form to create a new account.

2. **Log In:**
   - Go to the login page and enter your credentials.
   - If the login is successful, you will be redirected to the dashboard.

3. **Dashboard:**
   - The dashboard will display the signed-up users' data in a swiper card format.

## Project Structure

- **index.php:** The main entry point of the application.
- **signup.php:** Handles user registration.
- **login.php:** Handles user authentication.
- **dashboard.php:** Displays user data after login.
- **database/**: Contains the SQL file to create the necessary database and tables.

## License

This project is licensed under the MIT License.

---

Feel free to customize this further according to your needs!
