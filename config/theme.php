<?php
// config/theme.php
// GLOBAL THEME FILE - Changing this updates the entire UI

$theme = [
    'primary' => '#2563eb', // Blue 600
    'secondary' => '#1e40af', // Blue 800
    'background' => '#f9fafb', // Gray 50
    'sidebar' => '#111827', // Gray 900
    'text' => '#111827', // Gray 900
    'light_text' => '#ffffff',
    'accent' => '#f59e0b', // Amber 500
    'font_family' => "'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif"
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
