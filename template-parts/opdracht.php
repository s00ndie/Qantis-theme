<?php
$args = array(
    'post_type' => 'opdracht',
    'post_per_page' => -1,
    'post_status' => 'publish'
);
$opdrachten_query = new WP_Query($args);
$info = get_field('opdrachten');

if ($opdrachten_query->have_posts()) :
    echo '<div class="opdrachten-wrapper">';
    
    while ($opdrachten_query->have_posts()) : $opdrachten_query->the_post(); 

        // Отримуємо значення кастомних полів SCF
        $titel              = get_field('titel');
        $afbeelding         = get_field('afbeelding'); // Залежно від налаштувань поля: URL або масив
        $niveau             = get_field('niveau');
        $aantal_uuren       = get_field('aantal_uuren');
        $korte_omschrijving = get_field('korte_omschrijving');
        $propositie         = get_field('propositie');
        ?>

        <div class="opdracht-card">
            
            <!-- Зображення -->
            <?php if ($afbeelding) : ?>
                <div class="opdracht-image">
                    <?php if (is_array($afbeelding)) : ?>
                        <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt']); ?>" />
                    <?php else : ?>
                        <img src="<?php echo esc_url($afbeelding); ?>" alt="<?php echo esc_attr($titel); ?>" />
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Заголовок / Titel -->
            <h2><?php echo esc_html($titel ? $titel : get_the_title()); ?></h2>

            <!-- Додаткова інформація (Niveau та Aantal uuren) -->
            <p><?php echo esc_html($niveau); ?></p>
            <p><?php echo esc_html($aantal_uuren); ?></p>

            <!-- Короткий опис -->
            <?php if ($korte_omschrijving) : ?>
                <div class="korte-omschrijving">
                    <p><?php echo nl2br(esc_html($korte_omschrijving)); ?></p>
                </div>
            <?php endif; ?>

            <!-- Пропозиція -->
            <?php if ($propositie) : ?>
                <div class="propositie">
                    <p><strong>Propositie:</strong> <?php echo nl2br(esc_html($propositie)); ?></p>
                </div>
            <?php endif; ?>

        </div>

    <?php endwhile;
    echo '</div>';
    wp_reset_postdata();
else :
    echo '<p>Записів не знайдено.</p>';
endif;
?>

