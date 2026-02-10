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
        <h1 class="brand-title">Karibu Swahili Food</h1>
        <p class="brand-subtitle">Ladha Halisi ya Pwani na Bara</p>
        
        <div class="search-container">
            <div class="search-bar">
                <div class="input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Tafuta Pilau, Biryani, Wali..." id="food-search" oninput="filterSearch()">
                </div>
            </div>
        </div>

        <div class="filter-container">
            <span class="filter-label">Kundi:</span>
            <div class="filter-chips">
                <button class="filter-chip active" onclick="filterCategory('all', this)">Vyote</button>
                <button class="filter-chip" onclick="filterCategory('Chakula', this)">Chakula</button>
                <button class="filter-chip" onclick="filterCategory('Kinywaji', this)">Vinywaji</button>
            </div>
        </div>
    </div>
</section>

<section id="menu" class="menu-section">
    <div class="container">
        <div class="section-header">
            <h2>Chagua Unachopenda</h2>
            <p>Vyakula na vinywaji vyote vimeandaliwa kwa usafi na ladha ya kipekee.</p>
        </div>

        <div class="menu-grid" id="menu-grid">
            <?php foreach ($allItems as $item): ?>
                <div class="menu-card" data-category="<?php echo $item['category']; ?>" data-name="<?php echo strtolower($item['name']); ?>">
                    <div class="menu-image">
                        <img src="<?php echo $item['image_url'] ?? 'https://via.placeholder.com/400x300'; ?>" alt="<?php echo $item['name']; ?>">
                        <span class="category-badge"><?php echo $item['category']; ?></span>
                    </div>
                    <div class="menu-info">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                        <div class="menu-footer">
                            <span class="price">TZS <?php echo number_format($item['price']); ?></span>
                            <a href="<?php echo is_logged_in() ? '/dashboard.php' : '/register.php'; ?>" class="btn btn-primary btn-sm">Agiza Sasa</a>
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
            <h2>Kuhusu Sisi</h2>
            <p>Swahili Food ni kimbilio lako la vyakula asilia vya Kitanzania.</p>
        </div>
        <div class="about-text">
            <p>Lengo letu ni kutoa huduma bora ya chakula kinachopikwa kwa weledi na viungo safi kutoka mashambani. Tunajivunia kuleta ladha ya nyumbani popote ulipo, kuanzia Pilau ya Zanzibar hadi Samaki wa kukaanga wa Ziwa Victoria.</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="section-header">
            <h2>Mawasiliano</h2>
            <p>Tuna hamu ya kusikia kutoka kwako! Wasiliana nasi kupitia njia zozote hapa chini.</p>
        </div>
        <div class="contact-grid">
            <a href="tel:<?php echo get_setting('contact_phone', '+255 700 000 000'); ?>" class="contact-item card-hover">
                <i class="fas fa-phone-alt"></i>
                <h3>Tupigie</h3>
                <p><?php echo get_setting('contact_phone', '+255 700 000 000'); ?></p>
                <span class="contact-action">Piga sasa &rarr;</span>
            </a>
            <a href="mailto:<?php echo get_setting('contact_email', 'info@swahili-food.co.tz'); ?>" class="contact-item card-hover">
                <i class="fas fa-envelope-open-text"></i>
                <h3>Tuandikie Email</h3>
                <p><?php echo get_setting('contact_email', 'info@swahili-food.co.tz'); ?></p>
                <span class="contact-action">Tuma ujumbe &rarr;</span>
            </a>
            <div class="contact-item card-hover">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Mahali Tulipo</h3>
                <p><?php echo get_setting('location', 'Mikocheni, Dar es Salaam'); ?></p>
                <span class="contact-action">Fika ofisini &rarr;</span>
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
    <h2>Je, una njaa?</h2>
    <p>Agiza sasa na upate chakula chako ndani ya dakika 30!</p>
    <a href="/register.php" class="btn btn-primary" style="width: auto; margin-top: 1rem;">Jiunge na Agiza</a>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>