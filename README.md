---

# Database Connect

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

### Step 1: Clone the Repository

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/database-connect.git
   ```

### Step 2: Set Up the Database

1. **Start XAMPP:**
   - Open XAMPP and start the `Apache` and `MySQL` modules.

2. **Open phpMyAdmin:**
   - In your web browser, go to `http://localhost/phpmyadmin/`.

3. **Create a New Database:**
   - Click on the `New` button in the left sidebar.
   - Enter a name for your database (e.g., `database_connect`) in the `Database name` field.
   - Choose the collation `utf8mb4_general_ci` from the dropdown.
   - Click the `Create` button.

4. **Import `class.sql`:**
   - After creating the database, click on the name of the database you just created in the left sidebar to open it.
   - Click on the `Import` tab in the top menu.
   - Click the `Choose File` button and navigate to the `database` folder of the project directory.
   - Select the `class.sql` file.
   - Ensure the format is set to `SQL`.
   - Click the `Go` button to import the database structure and data.

5. **Verify the Import:**
   - After the import process completes, you should see a message indicating a successful import.
   - Your database should now contain the tables and data defined in `class.sql`.

### Step 3: Configure the Project

1. **Update Database Configuration:**
   - Open the `configs/connect.php` file in your project directory.
   - Ensure that the database credentials (hostname, username, password, and database name) match your XAMPP configuration.

### Step 4: Run the Project

1. **Move the Project Files:**
   - Place the project folder (`database-connect`) into the `htdocs` directory of your XAMPP installation (typically found in `C:\xampp\htdocs\`).

2. **Access the Project:**
   - Open a web browser and go to `http://localhost/database-connect/` to view the project.

## Usage

1. **Sign Up:**
   - Go to `register.php` and fill in the required fields.
   - Submit the form to create a new account.

2. **Log In:**
   - Go to `login.php` and enter your credentials.
   - If the login is successful, you will be redirected to the dashboard.

3. **Dashboard:**
   - The dashboard (`dashboard.php`) will display the signed-up users' data in a swiper card format.

## Folder Structure

```
database-connect/
│
├── configs/
│   ├── connect.php            # Database connection configuration
│   ├── db_functions.php       # Database functions
│   └── fetch_users.php        # Script to fetch user data
│
├── css/
│   ├── dashboard.css          # Styles for the dashboard
│   └── style.css              # General styles for the project
│
├── database/
│   └── class.sql              # SQL file to create the necessary database and tables
│
├── images/
│   ├── android-chrome-192x192.png
│   ├── android-chrome-512x512.png
│   ├── apple-touch-icon.png
│   ├── favicon.ico
│   ├── favicon-16x16.png
│   └── favicon-32x32.png
│
├── js/
│   └── dashboard.js           # Scripts for the dashboard
│
├── uploads/
│   ├── 66b9da596048d_IMG_20221112_102547.jpg
│   ├── 66ba2899d8608_niranjan.jpg
│   └── profile.jpg            # Uploaded user profile pictures
│
├── dashboard.php              # Displays user data after login
├── login.php                  # Handles user authentication
├── logout.php                 # Handles user logout
└── register.php               # Handles user registration
```

## Contact

If you have any questions or run into any issues, feel free to reach out:

- **Instagram:** [nischal_sir](https://www.instagram.com/nischal_sir)
- **Email:** work.nischalpandey@gmail.com

## License

This project is licensed under the MIT License.
