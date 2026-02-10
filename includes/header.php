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
        <?php echo($page_title ? $page_title . ' - ' : '') . get_setting('system_name', 'Swahili Food'); ?>
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
                                    <!-- Fork -->
                                    <path d="M35 20V45M35 45C35 50 38 53 43 53V80M27 20V43C27 48 30 51 35 51M43 20V43C43 48 40 51 35 51" stroke="var(--primary)" stroke-width="5" stroke-linecap="round"/>
                                    <!-- Knife -->
                                    <path d="M65 20C65 20 65 50 65 55C65 60 62 63 57 63V80M57 63C62 63 65 60 65 55" stroke="var(--secondary)" stroke-width="5" stroke-linecap="round"/>
                                    <path d="M65 20V55C65 65 57 65 57 65V20H65Z" fill="var(--secondary)" opacity="0.2"/>
                                </svg>
                                <span style="font-weight: 800; font-size: 1.4rem; letter-spacing: -0.5px;"><?php echo get_setting('system_name', 'Swahili Food'); ?></span>
                            </div>
                            <div class="nav-links">
                                <a href="/index.php">Home</a>
                                <a href="/index.php#about">About Us</a>
                                <a href="/index.php#contact">Contact</a>
                                <?php if (is_logged_in()): ?>
                                    <?php if (has_role('admin')): ?>
                                        <a href="/dashboard.php" class="btn btn-primary btn-sm">Dashboard</a>
                                    <?php
        endif; ?>
                                    <a href="/logout.php" class="btn btn-danger btn-sm" style="background-color: #ef4444; color: white;">Logout</a>
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