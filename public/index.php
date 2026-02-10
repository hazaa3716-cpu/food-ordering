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
            <form action="" method="GET" class="search-bar">
                <div class="input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search for Pilau, Biryani, Wali..." id="food-search">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class="filter-container">
            <span class="filter-label">Kundi:</span>
            <div class="filter-chips">
                <button class="filter-chip active" onclick="filterItems('all')">Vyote</button>
                <button class="filter-chip" onclick="filterItems('Chakula')">Chakula</button>
                <button class="filter-chip" onclick="filterItems('Kinywaji')">Vinywaji</button>
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
                <div class="menu-card" data-category="<?php echo $item['category']; ?>">
                    <div class="menu-image">
                        <img src="<?php echo $item['image_url'] ?? 'https://via.placeholder.com/400x300'; ?>" alt="<?php echo $item['name']; ?>">
                        <span class="category-badge"><?php echo $item['category']; ?></span>
                    </div>
                    <div class="menu-info">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                        <div class="menu-footer">
                            <span class="price">TZS <?php echo number_format($item['price']); ?></span>
                            <button class="btn btn-primary btn-sm btn-order">Agiza Sasa</button>
                        </div>
                    </div>
                </div>
            <?php
endforeach; ?>
        </div>
    </div>
</section>

<script>
function filterItems(category) {
    const cards = document.querySelectorAll('.menu-card');
    const chips = document.querySelectorAll('.filter-chip');
    
    chips.forEach(c => c.classList.remove('active'));
    event.target.classList.add('active');

    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
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