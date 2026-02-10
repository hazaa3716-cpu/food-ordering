<?php
require_once __DIR__ . '/config/database.php';

$items = [
    // Foods
    ['Pilau ya Nyama', 'Fragrant spiced rice with tender beef, served with kachumbari.', 12000, 'Chakula', 'https://images.unsplash.com/photo-1512058560366-cd242d5f8f00?auto=format&fit=crop&w=400&q=80'],
    ['Biryani la Kuku', 'Layered spiced chicken and rice, a feast for the senses.', 15000, 'Chakula', 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?auto=format&fit=crop&w=400&q=80'],
    ['Wali wa Nazi na Samaki', 'Creamy coconut rice served with fresh pan-fried kingfish.', 10500, 'Chakula', 'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?auto=format&fit=crop&w=400&q=80'],
    ['Ugali na Nyama ya Kuchoma', 'Staple maize porridge with flame-grilled beef strips.', 8500, 'Chakula', 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=400&q=80'],
    ['Mishkaki (3 Sticks)', 'Marinated beef skewers grilled over charcoal.', 6000, 'Chakula', 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143?auto=format&fit=crop&w=400&q=80'],
    ['Chipsi Mayai', "Tanzania's favorite French fry omelet, crispy and filling.", 4500, 'Chakula', 'https://images.unsplash.com/photo-1593504049359-74330189a345?auto=format&fit=crop&w=400&q=80'],
    ['Supu ya Kongoro', 'Rich, traditional cow hoof soup, perfect for cold mornings.', 7000, 'Chakula', 'https://images.unsplash.com/photo-1547592166-23ac45744acd?auto=format&fit=crop&w=400&q=80'],
    ['Ndizi Nyama', 'Cooked green bananas stewed with beef and vegetables.', 9000, 'Chakula', 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=400&q=80'],
    ['Mkate wa Mimina', 'Sweet, fluffy rice bread made with coconut and cardamom.', 5500, 'Chakula', 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=400&q=80'],
    ['Kuku Paka', 'Grilled chicken in a rich, spicy coconut curry sauce.', 14000, 'Chakula', 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?auto=format&fit=crop&w=400&q=80'],

    // Drinks
    ['Chai ya Viungo', 'Authentic Swahili tea brewed with milk, ginger, and cardamom.', 2500, 'Kinywaji', 'https://images.unsplash.com/photo-1563911191470-85bb4f895872?auto=format&fit=crop&w=400&q=80'],
    ['Kahawa ya Zanzibar', 'Strong black coffee infused with cloves and ginger.', 1500, 'Kinywaji', 'https://images.unsplash.com/photo-1541167760496-162955ed8a9f?auto=format&fit=crop&w=400&q=80'],
    ['Juisi ya Miwa', 'Freshly squeezed sugarcane juice with a hint of ginger and lime.', 3500, 'Kinywaji', 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=400&q=80'],
    ['Juisi ya Ukwaju', 'Refreshing chilled tamarind juice, sweet and tangy.', 3000, 'Kinywaji', 'https://images.unsplash.com/photo-1546173159-315724a31696?auto=format&fit=crop&w=400&q=80'],
    ['Juisi ya Pasheni', 'Freshly blended passion fruit juice from the highlands.', 3000, 'Kinywaji', 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?auto=format&fit=crop&w=400&q=80'],
    ['Madafu Safi', 'Fresh coconut water served straight from the coconut.', 4000, 'Kinywaji', 'https://images.unsplash.com/photo-1523675322917-d20f1df2f28b?auto=format&fit=crop&w=400&q=80'],
    ['Soda Baridi', 'A selection of chilled carbonated drinks.', 1500, 'Kinywaji', 'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?auto=format&fit=crop&w=400&q=80'],
    ['Maji ya Kilimanjaro', 'Premium bottled drinking water.', 1000, 'Kinywaji', 'https://images.unsplash.com/photo-1523362628745-0c100150b504?auto=format&fit=crop&w=400&q=80']
];

try {
    $pdo->exec("DELETE FROM sample_items"); // Clear existing
    $stmt = $pdo->prepare("INSERT INTO sample_items (name, description, price, category, image_url) VALUES (?, ?, ?, ?, ?)");

    foreach ($items as $item) {
        $stmt->execute($item);
    }
    echo "Successfully seeded " . count($items) . " items.\n";
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
