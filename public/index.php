<?php
// public/index.php
require_once __DIR__ . '/../config/auth.php';
$page_title = '';
$plain_layout = true;
$body_class = 'landing-page';
include __DIR__ . '/../includes/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <h1><?php echo get_setting('system_name', 'CBE Business Solutions'); ?></h1>
        <p>The all-in-one platform for SMEs, E-commerce, Food Ordering, and much more. Scale your business with our
            robust and secure management tools.</p>
        <div class="hero-btns">
            <?php if (is_logged_in()): ?>
                <a href="/dashboard.php" class="btn btn-primary">Go to Dashboard</a>
            <?php else: ?>
                <a href="/register.php" class="btn btn-primary">Get Started</a>
                <a href="/login.php" class="btn btn-secondary">Sign In</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="features" class="features">
    <div class="section-header">
        <h2>Solutions for Every Business</h2>
        <p>A modular system designed to adapt to your specific needs.</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <i class="fas fa-store"></i>
            <h3>Small SMEs</h3>
            <p>Manage your inventory, employees, and sales in one simple dashboard.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-shopping-cart"></i>
            <h3>E-commerce</h3>
            <p>Full-featured storefront and product management for modern retail.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-utensils"></i>
            <h3>Food & Ordering</h3>
            <p>Perfect for restaurants and delivery services with real-time tracking.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-home"></i>
            <h3>Real Estate</h3>
            <p>Property listings, lead management, and agent performance tracking.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-comments"></i>
            <h3>E-Forum</h3>
            <p>Engage your community with a powerful discussion and feedback hub.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-microchip"></i>
            <h3>Electronics</h3>
            <p>Specialized catalogs for tech-heavy inventory and serial tracking.</p>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="section-header">
        <h2>Contact Us</h2>
        <p>Have questions? Reach out to our team.</p>
    </div>
    <div class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <p><?php echo get_setting('contact_email', 'support@cbe.ac.tz'); ?></p>
            </div>
            <div class="info-item">
                <i class="fas fa-phone"></i>
                <p>+255 123 456 789</p>
            </div>
            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <p>Dar es Salaam, Tanzania</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner">
    <h2>Ready to transform your business?</h2>
    <p>Join hundreds of businesses using CBE Boilerplates to grow faster.</p>
    <a href="/register.php" class="btn btn-primary" style="width: auto; margin-top: 1rem;">Create Free Account</a>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>