<?php
/*
Plugin Name: Currency Rates Bar
Description: Dynamic currency rate slider with admin panel
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) exit;


/* LOAD CSS + JS */

function crb_load_assets(){

wp_enqueue_style(
'crb-style',
plugin_dir_url(__FILE__) . 'style.css'
);

wp_enqueue_script(
'crb-script',
plugin_dir_url(__FILE__) . 'script.js',
array(),
null,
true
);

}

add_action('wp_enqueue_scripts','crb_load_assets');



/* ADMIN MENU */

function crb_admin_menu(){

add_menu_page(
'Currency Rates',
'Currency Rates',
'manage_options',
'currency-rates',
'crb_admin_page',
'dashicons-money',
25
);

}

add_action('admin_menu','crb_admin_menu');



/* ADMIN PAGE */

function crb_admin_page(){

include plugin_dir_path(__FILE__) . 'admin-page.php';

}



/* SHORTCODE FRONTEND */

function crb_currency_shortcode(){

$currencies = get_option('crb_currencies', []);

ob_start();

?>

<div class="currency-wrapper">

<div class="currency-title">
Todays Money Transfer Rates
</div>


<div class="currency-slider">

<button class="currency-arrow left">&#10094;</button>


<div class="currency-box">


<div class="currency-item base">

<img src="https://flagcdn.com/w40/ae.png">

<span>1.00 AED</span>

</div>


<?php if(!empty($currencies)){

foreach($currencies as $currency){ ?>

<div class="currency-item">

<label><?php echo esc_html($currency['name']); ?></label>

<span><?php echo esc_html($currency['rate']); ?> <?php echo esc_html($currency['code']); ?></span>

<img src="<?php echo esc_url($currency['flag']); ?>">

</div>

<?php }

} ?>


</div>


<button class="currency-arrow right">&#10095;</button>


</div>

</div>

<?php

return ob_get_clean();

}

add_shortcode('currency_rates_bar','crb_currency_shortcode');