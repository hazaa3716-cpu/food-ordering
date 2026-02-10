<?php
// public/index.php
require_once __DIR__ . '/../config/auth.php';
$page_title = '';
$plain_layout = true;
$body_class = 'landing-page';
include __DIR__ . '/../includes/header.php';
?>

<?php
// Fetch Items
$stmt = $pdo->query("SELECT * FROM sample_items ORDER BY category ASC, id DESC");
$allItems = $stmt->fetchAll();

$foods = array_filter($allItems, fn($i) => $i['category'] == 'Chakula');
$drinks = array_filter($allItems, fn($i) => $i['category'] == 'Kinywaji');
?>

<section class="search-filter-section">
    <div class="container">
        <h1 class="brand-title">Welcome to Swahili Food</h1>
        <p class="brand-subtitle">Authentic Taste from Coast to Inland</p>
        
        <div class="search-container">
            <div class="search-bar">
                <div class="input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search for Pilau, Biryani, Wali..." id="food-search" oninput="filterSearch()">
                </div>
            </div>
        </div>

        <div class="filter-container">
            <span class="filter-label">Category:</span>
            <div class="filter-chips">
                <button class="filter-chip active" onclick="filterCategory('all', this)">All</button>
                <button class="filter-chip" onclick="filterCategory('Chakula', this)">Food</button>
                <button class="filter-chip" onclick="filterCategory('Kinywaji', this)">Drinks</button>
            </div>
        </div>
    </div>
</section>

<section id="menu" class="menu-section">
    <div class="container">
        <div class="section-header">
            <h2>Choose Your Favorite</h2>
            <p>All meals and drinks are prepared with hygiene and unique flavor.</p>
        </div>

        <div class="menu-grid" id="menu-grid">
            <?php foreach ($allItems as $item): ?>
                <div class="menu-card" data-category="<?php echo $item['category']; ?>" data-name="<?php echo strtolower($item['name']); ?>">
                    <div class="menu-image">
                        <img src="<?php echo $item['image_url'] ?? 'https://via.placeholder.com/400x300'; ?>" alt="<?php echo $item['name']; ?>">
                        <span class="category-badge"><?php echo $item['category'] == 'Chakula' ? 'Food' : 'Drink'; ?></span>
                    </div>
                    <div class="menu-info">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                        <div class="menu-footer">
                            <span class="price">TZS <?php echo number_format($item['price']); ?></span>
                            <a href="<?php echo is_logged_in() ? '/dashboard.php' : '/register.php'; ?>" class="btn btn-primary btn-sm">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php
endforeach; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container about-content">
        <div class="section-header">
            <h2>About Us</h2>
            <p>Swahili Food is your ultimate destination for authentic Tanzanian cuisine.</p>
        </div>
        <div class="about-text">
            <p>Our goal is to provide high-quality food prepared with expertise and fresh ingredients from the farm. We pride ourselves on bringing the taste of home to you, from Zanzibar's Pilau to Lake Victoria's Fried Fish.</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="section-header">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Reach out via any of the channels below.</p>
        </div>
        <div class="contact-grid">
            <a href="tel:<?php echo get_setting('contact_phone', '+255 700 000 000'); ?>" class="contact-item card-hover">
                <i class="fas fa-phone-alt"></i>
                <h3>Call Us</h3>
                <p><?php echo get_setting('contact_phone', '+255 700 000 000'); ?></p>
                <span class="contact-action">Call Now &rarr;</span>
            </a>
            <a href="mailto:<?php echo get_setting('contact_email', 'info@swahili-food.co.tz'); ?>" class="contact-item card-hover">
                <i class="fas fa-envelope-open-text"></i>
                <h3>Email Us</h3>
                <p><?php echo get_setting('contact_email', 'info@swahili-food.co.tz'); ?></p>
                <span class="contact-action">Send Message &rarr;</span>
            </a>
            <div class="contact-item card-hover">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Our Location</h3>
                <p><?php echo get_setting('location', 'Mikocheni, Dar es Salaam'); ?></p>
                <span class="contact-action">Visit Office &rarr;</span>
            </div>
        </div>
    </div>
</section>

<script>
let currentCategory = 'all';

function filterCategory(category, el) {
    currentCategory = category;
    const chips = document.querySelectorAll('.filter-chip');
    chips.forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    applyFilters();
}

function filterSearch() {
    applyFilters();
}

function applyFilters() {
    const searchTerm = document.getElementById('food-search').value.toLowerCase();
    const cards = document.querySelectorAll('.menu-card');

    cards.forEach(card => {
        const matchesCategory = (currentCategory === 'all' || card.dataset.category === currentCategory);
        const matchesSearch = card.dataset.name.includes(searchTerm);
        
        if (matchesCategory && matchesSearch) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<section class="cta-banner">
    <h2>Are you hungry?</h2>
    <p>Order now and get your food within 30 minutes!</p>
    <a href="/register.php" class="btn btn-primary" style="width: auto; margin-top: 1rem;">Join and Order</a>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>