<?php
// config/theme.php
// GLOBAL THEME FILE - Changing this updates the entire UI

$theme = [
    'primary' => '#d97706', // Spice Amber 600
    'secondary' => '#92400e', // Deep Earth 800
    'background' => '#fffbeb', // Warm Cream 50
    'sidebar' => '#451a03', // Dark Wood
    'text' => '#1f2937', // Charcoal
    'light_text' => '#ffffff',
    'accent' => '#ea580c', // Darker Spice
    'font_family' => "'Outfit', 'Inter', sans-serif"
];

/**
 * Function to output CSS variables based on the theme
 */
function get_theme_css($theme)
{
    $css = ":root {\n";
    foreach ($theme as $key => $value) {
        $css .= "  --$key: $value;\n";
    }
    $css .= "}";
    return $css;
}
