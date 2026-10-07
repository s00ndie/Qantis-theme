Qantis WordPress Theme

A custom, lightweight WordPress theme engineered for the Qantis platform. Built with dedicated page templates, custom navigation walkers, responsive design, and flexible content management powered by Secure Custom Fields (SCF).

🚀 Features

Dynamic Page Templates:

Propositie Template (page-propositie.php): Specialized layout designed for core service/proposal pages (IT Staffing, QAAS MKB, OT Civiel / Industrie).

Contact Template (contact.php):

Dynamic map configured via geographic coordinates (coordinaten / embed_url).

Contact content component (template-parts/contact-pagina.php) containing links to the 3 distinct proposal pages.

Standard WordPress form submission with nonce security validation and wp_mail() delivery.

Custom Navigation: Built-in support for custom menu walkers (class-qantis-walker.php).

Flexible Content Management: Structured data fields integrated via Secure Custom Fields (SCF).

Media Support: Built-in enablement for SVG file uploads in the WordPress Media Library.

Clean Standards: Follows standard WordPress Template Hierarchy and asset enqueuing hooks (wp_head(), wp_footer()).

🛠 Requirements

WordPress: 5.0 or newer.

PHP: 7.4 or newer (PHP 8.1+ recommended).

Plugin: Secure Custom Fields (SCF) plugin.

Mail Configuration: Active server mail utility or SMTP plugin for wp_mail() delivery.

📦 Installation & Setup

Upload Theme: Copy or clone the qantis directory into your WordPress installation:

wp-content/themes/qantis/


Activate Theme: In the WordPress Admin Dashboard, navigate to Appearance → Themes and click Activate on Qantis Theme.

Install Required Plugin: Install and activate the Secure Custom Fields (SCF) plugin.

Configure Navigation: Go to Appearance → Menus to assign main and secondary header/footer menus.

📥 SCF Field Configuration

You can configure the fields manually or import the existing SCF export from:

inc/scf-export-2026-10-07.json

To import it:

1. Go to **Custom Fields → Tools** in the WordPress admin panel.
2. Under **Import Field Groups**, select the file above.
3. Click **Import JSON**.
4. Open each imported field group and confirm its **Location Rules**:
   Page Template -> is equal to -> Contact or Propositie.
5. Save the field groups.

📄 Page Template Usage

1. Contact Page Setup

Create or open the existing Contact page under Pages → All Pages.

Under Page Attributes in the sidebar, set Template to Contact.

Fill out the custom fields:

Phone number, email, and address lines.

Geographic coordinates (coordinaten) and Google Maps embed frame (embed_url).

Save / Update the page.

2. Service / Proposal Pages

For the IT Staffing, QAAS MKB, and OT Civiel / Industrie pages:

Open each respective page in Pages → All Pages.

Set Template to Propositie.

Populate the required SCF sections (Hero, Services Grid, CTA, Process Steps, Why Us).

Save / Update the pages and attach them to the main navigation menu.

3. Front Page / Homepage

WordPress automatically detects front-page.php.

Go to Settings → Reading.

Select A static page under Your homepage displays.

Choose your homepage from the Homepage dropdown menu and save changes.

🔑 Required SCF Field Keys

Make sure the following field keys are maintained across your field group configurations:

telefoonnummer — Contact telephone number.

accentkleur — Page/brand accent color hex code.

menu_keuze — Custom menu selector ID.

hero_photo — Background header image.

hero_tag, hero_titel, hero_titel_color, hero_titel_rest, hero_subtekst — Hero header textual elements.

primaire_button, secondary_button — Call-to-action link buttons.

diensten & diensten_text — Service grid items and descriptions.

coordinaten & embed_url — Map coordinates and iframe source URL.

footer_copyright_tekst, e_mailadres, adresregels, openingstijden, socialoverige_links, footer_links — Footer and global metadata.

📁 Repository & Theme Structure

qantis/
├── assets/
│   └── class-qantis-walker.php    # Custom Walker class for WordPress menus
├── template-parts/
│   ├── contact-pagina.php          # Contact content block (proposal links & form)
│   ├── cta.php                     # Call to action block
│   ├── diensten-grid.php           # Services grid layout
│   ├── extra.php                   # Additional information section
│   ├── hero.php                    # Hero banner template part
│   ├── kaart.php                   # Coordinate-based map component
│   ├── opdracht.php                # Assignment/Project component
│   ├── propositie-nav.php          # Navigation bar for proposal pages
│   ├── stappen.php                 # Process steps component
│   └── waarom.php                  # "Why choose us" feature block
├── contact.php                     # Contact page template
├── footer.php                      # Theme footer (contains wp_footer())
├── front-page.php                  # Static front page template
├── functions.php                   # Theme setup, assets enqueue, forms processing
├── header.php                      # Theme header (contains wp_head())
├── index.php                       # Main fallback template with WP Loop
├── page-propositie.php             # Custom proposal page template
├── single-opdracht.php             # Single assignment post template
├── single-vacature.php             # Single job vacancy template
├── style.css                       # Primary stylesheet & theme definition
└── README.md                       # Project documentation


✉️ Contact Form Functionality

The contact form processes standard POST form submissions via wp_mail():

Captured Data: Name, Company, Email Address, Phone Number, Consent Checkbox, and Message.

Security: Protected with WordPress Nonce fields (wp_nonce_field).

Processing: Sanitized with sanitize_text_field() and sanitize_email() before standard mail dispatch.

🛠 Troubleshooting & Known Issues

Fields Not Showing in Page Editor: Ensure the SCF Location Rules are bound to Page Template rather than Page (Page ID). Page IDs change across database migrations.

Contact Form Emails Not Received: The form uses native wp_mail(). If hosting on a local server (like XAMPP) or a server without configured sendmail, install an SMTP plugin (e.g., WP Mail SMTP) to handle mail delivery.

Page Template Dropdown Missing: Ensure template headers in contact.php (/* Template Name: Contact */) and page-propositie.php are intact and that the theme is active.

📜 License

Private custom WordPress theme developed exclusively for Qantis. Unauthorized copying or distribution of these files is strictly prohibited.