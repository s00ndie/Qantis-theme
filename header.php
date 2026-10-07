<?php 
$phone = get_field('telefoonnummer', 'option');
$accent_color = get_field('accentkleur');


$selected_menu_id = get_field('menu_keuze') ?: 12; 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="
    --accent: <?php echo esc_attr($accent_color); ?>;
    --accent-dark: color-mix(in srgb, var(--accent), transparent, black 40%);
">
    <header class="site-header">
        <a href="contact" class="brand-logo">
            <svg viewBox="0 0 230 58" xmlns="http://www.w3.org/2000/svg">
                <rect x="0" y="1" width="50" height="50" rx="10" fill="#2d2d2d" />
                <rect x="7" y="8" width="30" height="30" rx="4" fill="#0d1b2e" />
                <rect x="26" y="30" width="24" height="21" fill="#0d1b2e" />
                <rect x="39" y="30" width="11" height="9" fill="#2d2d2d" />
                <polygon class='svg1' points="34,38 41,38 48,50 41,50" fill="#1782C4" />
                <text x="60" y="43" font-family="'Arial Rounded MT Bold','Arial Black',Arial,sans-serif" font-size="38"
                    font-weight="900" fill="#d8d8d8" letter-spacing="-1">antis</text>
                <line class='svg1' x1="60" y1="50" x2="152" y2="50" stroke="#1782C4" stroke-width="1.2" />
                <text class='svg1' x="153" y="56" font-family="Arial,sans-serif" font-size="7.5" fill="#1782C4"
                    text-anchor="end" font-style="italic">makes IT easy</text>
            </svg>
        </a>
        <div class="menu-left">
            <?php
            wp_nav_menu([
                'menu'        => (int) $selected_menu_id,
                'menu_class'  => 'main_menu',
                'fallback_cb' => false,
            ]);
            ?>
        </div>
        <a class="phone" href="tel:+31<?php echo esc_html($phone)?>"><i class="fa-solid fa-phone" aria-hidden="true"></i><?php echo esc_html($phone); ?></a>
    </header>