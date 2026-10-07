<?php
// 1. Отримуємо значення координат з ACF
$kaart = get_field('kennismakingsgesprek');
$kaart = is_array($kaart) ? $kaart : [];

$lat = $kaart['kaart']['latitude'] ?? $kaart['lat'] ?? '52.6324';
$lng = $kaart['kaart']['longitude'] ?? $kaart['lng'] ?? '4.7534';
?>

<!-- Контейнер для карти -->


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<?php if ($kaart) { ?>
    <section>
        <section class="section">
            <div class="contact-grid">
                <div class="contact-info">
                    <p class="section-tag">
                        <?php echo esc_html($kaart['tag'] ?? ''); ?>
                    </p>
                    <h2>
                        <?php echo esc_html($kaart['title'] ?? ''); ?>
                    </h2>
                    <a href="tel:+31<?php echo esc_html($kaart['mobiel'] ?? ''); ?>">
                        <strong><?php echo esc_html($kaart['mobiel'] ?? ''); ?></strong>
</a>
                    <p>
                        <a href="mailto:<?php echo esc_attr($kaart['email'] ?? ''); ?>" class="contact-a">
                            <?php echo esc_html($kaart['email'] ?? ''); ?></a>
                    </p>
                    <span></span>
                    <p>
                        <strong><?php echo esc_html($kaart['openingstijd'] ?? ''); ?></strong>
                    </p>
                    <span></span>
                    <p class="adress">
                        <?php echo esc_html($kaart['adress']['straat'] ?? ''); ?><br>
                        <?php echo esc_html($kaart['adress']['postcode'] ?? ''); ?>
                    </p>

                    <div id="dark-map-container" style="">
                        <div class="map-links">
                            <a
                                href="<?php echo esc_url($kaart['kaart_link']['eerste']['link'] ?? ''); ?>"><?php echo esc_html($kaart['kaart_link']['eerste']['title'] ?? ''); ?></a>
                            <a
                                href="<?php echo esc_url($kaart['kaart_link']['tweede']['link'] ?? ''); ?>"><?php echo esc_html($kaart['kaart_link']['tweede']['title'] ?? ''); ?></a>
                            <a
                                href="<?php echo esc_url($kaart['kaart_link']['derde']['link'] ?? ''); ?>"><?php echo esc_html($kaart['kaart_link']['derde']['title'] ?? ''); ?></a>
                            <a
                                href="<?php echo esc_url($kaart['kaart_link']['vierde']['link'] ?? ''); ?>"><?php echo esc_html($kaart['kaart_link']['vierde']['title'] ?? ''); ?></a>
                        </div>
                    </div>

                </div>
                <div class="contact-form">
                    <p class="contact-form-label"><?php echo esc_html($kaart['label_input'] ?? ''); ?></p>
                    <form id="custom-contact-form" action="" method="POST" class="custom-form">
                        <?php wp_nonce_field('custom_contact_action', 'custom_contact_nonce'); ?>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="custom_name" placeholder="Naam" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="custom_company" placeholder="Bedrijfsnaam" />
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="custom_email" placeholder="E-mail" required />
                        </div>

                        <div class="form-group checkbox-group">
                            <label>
                                <input type="hidden" name="custom_call_me" value="0" />
                                <input type="checkbox" name="custom_call_me" value="1" id="custom-call-me" />
                                Ik word liever gebeld
                            </label>
                        </div>

                        <div class="form-group phone-group" id="custom-phone-group" hidden>
                            <input type="tel" name="custom_phone" id="custom-phone" placeholder="Telefoonnummer" autocomplete="tel" />
                        </div>

                        <div class="form-group">
                            <textarea name="custom_message" placeholder="Bericht" rows="5"></textarea>
                        </div>

                        <button type="submit" name="custom_submit">Verstuur</button>
                    </form>
                </div>
            </div>
        </section>
    </section>
<?php } ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var callMeCheckbox = document.getElementById('custom-call-me');
        var phoneGroup = document.getElementById('custom-phone-group');
        var phoneInput = document.getElementById('custom-phone');

        function togglePhoneField() {
            var isChecked = callMeCheckbox.checked;
            phoneGroup.hidden = !isChecked;
            phoneInput.required = isChecked;
            phoneInput.setAttribute('aria-hidden', String(!isChecked));
        }

        callMeCheckbox.addEventListener('change', togglePhoneField);
        togglePhoneField();

        var mapLat = parseFloat(<?php echo json_encode($lat); ?>);
        var mapLng = parseFloat(<?php echo json_encode($lng); ?>);

        var container = document.getElementById('dark-map-container');
        if (!container) return;

        var map = L.map('dark-map-container', {
            attributionControl: false,
            zoomControl: false
        }).setView([mapLat, mapLng], 16);

        L.control.zoom({ position: 'topright' }).addTo(map);

        L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png?api_key=', {
            maxZoom: 20
        }).addTo(map);
        // Ваш зелений маркер
        var customMarkerSvg = `
            <div style="filter: drop-shadow(0px 3px 3px rgba(0,0,0,0.5));">
            <svg width="20" height="32" viewBox="0 0 24 34" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 0C5.37 0 0 5.37 0 12c0 9 12 22 12 22s12-13 12-22c0-6.63-5.37-12-12-12z" 
            fill="#556B2F"/>
      
            <circle cx="12" cy="11" r="4.5" fill="#1e1e1e"/>
            </svg>
            </div>
         `;

        var oliveIcon = L.divIcon({
            html: customMarkerSvg,
            className: '', // Залишаємо порожнім, щоб не накладалися дефолтні стилі Leaflet
            iconSize: [20, 32],
            iconAnchor: [10, 32]
        });

        L.marker([mapLat, mapLng], { icon: oliveIcon }).addTo(map);

        setTimeout(function () {
            map.invalidateSize();
        }, 200);
    });
</script>