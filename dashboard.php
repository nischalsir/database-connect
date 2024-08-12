<?php require_once "configs/db_functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            background-color: green;
            color: white;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-logo">
            <h1>Dashboard</h1>
        </div>
        <div class="navbar-user">
            <span><?php echo htmlspecialchars($logged_in_user['full_name']); ?></span>
            <?php if ($logged_in_user['profile_picture']) { ?>
                <img src="<?php echo htmlspecialchars($logged_in_user['profile_picture']); ?>" alt="User Image">
            <?php } else { ?>
                <img src="default-profile.png" alt="Default Profile Picture">
            <?php } ?>
        </div>
    </nav>

    <!-- Slider -->
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper" id="user-cards">
                <!-- User cards will be added by JavaScript -->
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification">
        <?php echo $_SESSION['notification'] ?? ''; unset($_SESSION['notification']); ?>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>