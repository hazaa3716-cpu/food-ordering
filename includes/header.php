<?php
// includes/header.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/theme.php';
require_once __DIR__ . '/../config/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo($page_title ? $page_title . ' - ' : '') . get_setting('system_name', 'CBE System'); ?>
    </title>

    <!-- Dynamic Theme CSS -->
    <style>
        <?php echo get_theme_css($theme); ?>
    </style>

    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="<?php echo $body_class ?? ''; ?>">

    <?php if (is_logged_in() && !isset($plain_layout)): ?>
        <div class="app-container">
            <?php include __DIR__ . '/sidebar.php'; ?>
            <main class="content-area">
                <header class="top-nav">
                    <div class="nav-left">
                        <button id="sidebar-toggle"><i class="fas fa-bars"></i></button>
                        <h2>
                            <?php echo $page_title ?? 'Dashboard'; ?>
                        </h2>
                    </div>
                    <div class="nav-right">
                        <div class="user-profile">
                            <span><i class="fas fa-user-circle"></i>
                                <?php echo $_SESSION['username']; ?>
                            </span>
                            <a href="/logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                </header>
                <div class="main-content">
                <?php
else: ?>
                    <!-- Public Navigation Bar -->
                    <nav class="public-nav">
                        <div class="nav-container">
                            <div class="nav-logo">
                                <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;">
                                    <path d="M50 5C25.1472 5 5 25.1472 5 50C5 74.8528 25.1472 95 50 95C74.8528 95 95 74.8528 95 50C95 25.1472 74.8528 5 50 5ZM50 85C30.67 85 15 69.33 15 50C15 30.67 30.67 15 50 15C69.33 15 85 30.67 85 50C85 69.33 69.33 85 50 85Z" fill="var(--primary)"/>
                                    <path d="M50 25C40 25 32 33 32 43V57C32 67 40 75 50 75C60 75 68 67 68 57V43C68 33 60 25 50 25ZM63 57C63 64.18 57.18 70 50 70C42.82 70 37 64.18 37 57V43C37 35.82 42.82 30 50 30C57.18 30 63 35.82 63 43V57Z" fill="var(--secondary)"/>
                                    <path d="M50 40V60M40 50H60" stroke="var(--accent)" stroke-width="4" stroke-linecap="round"/>
                                </svg>
                                <span><?php echo get_setting('system_name', 'Swahili Food'); ?></span>
                            </div>
                            <div class="nav-links">
                                <a href="/index.php">Home</a>
                                <a href="#features">About </a>
                                <a href="#contact">Contact</a>
                                <?php if (is_logged_in()): ?>
                                    <a href="/dashboard.php" class="btn btn-primary btn-sm">Dashboard</a>
                                <?php
    else: ?>
                                    <a href="/login.php">Login</a>
                                    <a href="/register.php" class="btn btn-primary btn-sm">Register</a>
                                <?php
    endif; ?>
                            </div>
                        </div>
                    </nav>
                <?php
endif; ?>