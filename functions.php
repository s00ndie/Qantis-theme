<?php
function qantis_styles()
{
    wp_enqueue_style(
        'qantis-font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css',
        array(),
        '6.7.2'
    );

    wp_enqueue_style(
        'qantis-style',
        get_stylesheet_uri(),
        array('qantis-font-awesome')
    );
}

add_action('wp_enqueue_scripts', 'qantis_styles');

require_once get_template_directory() . '/assets/class-qantis-walker.php';
function qantis_menus()
{
    register_nav_menus(
        array(
            'main-menu' => 'Hoofdmenu',
            'second-menu' => 'Propositie menu'
        )
    );
}
add_action('after_setup_theme', 'qantis_menus');

function qantis_allow_svg($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'qantis_allow_svg');

function handle_custom_contact_form() {

    if (isset($_POST['custom_submit'])) {

        if (!isset($_POST['custom_contact_nonce']) || !wp_verify_nonce($_POST['custom_contact_nonce'], 'custom_contact_action')) {
            wp_die('Probeer opnieuw.');
        }


        $name    = sanitize_text_field($_POST['custom_name']);
        $company = sanitize_text_field($_POST['custom_company']);
        $email   = sanitize_email($_POST['custom_email']);
        $call_me = (!empty($_POST['custom_call_me']) && $_POST['custom_call_me'] == '1') ? 'Ja' : 'Nee';
        $phone   = sanitize_text_field($_POST['custom_phone'] ?? '');
        $message = sanitize_textarea_field($_POST['custom_message']);

    
        $to      = get_option('admin_email'); 
        $subject = 'KENNISMAKINGSGESPREK';
        
        $body  = "Naam: $name\n";
        $body .= "Bedrijf: $company\n";
        $body .= "Email: $email\n";
        $body .= "Terugbellen: $call_me\n";
        $body .= "Telefoonnummer: $phone\n\n";
        $body .= "Bericht:\n$message\n";

        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <' . $to . '>',
            'Reply-To: ' . $name . ' <' . $email . '>'
        );

      
        $sent = wp_mail($to, $subject, $body, $headers);
        header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
        
    }
}
add_action('wp_head', 'handle_custom_contact_form');
?>

