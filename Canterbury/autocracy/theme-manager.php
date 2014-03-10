<?php
/* Creates the Theme Options Page */

function main_theme_options_do_page() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
    wp_enqueue_style('thickbox');
    wp_enqueue_style( 'style-name', get_template_directory_uri().'/autocracy/admin.css' );
    wp_enqueue_style( 'style-font', 'http://fonts.googleapis.com/css?family=Rokkitt' );
    wp_enqueue_script('upload_enable', get_template_directory_uri() . 'autocracy/theme-options.js', false, null);
    ?>
    <div class="wrap">
        <?php
        screen_icon();
        echo "<h2>" . get_current_theme() . __(' Theme Manager', 'sampletheme') . "</h2>";
        ?>
        <?php if (false !== $_REQUEST['settings-updated']) : ?>
        <div class="updated fade"><p><strong><?php _e('Options saved', 'sampletheme'); ?></strong></p></div>
    <?php endif; ?>

    <form method="post" action="options.php">
       <?php
       settings_fields('main_options');
       $optionname= 'main_theme_options';
       $mainoptions = get_option($optionname);
       ?>
       <div class="panel-nav">
        <ul>
            <h2>Theme Options</h2>
            <li><img src="<?php echo get_template_directory_uri(); ?>/autocracy/Images/servicepage-bd.png"><p>Homepage Options</p></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/autocracy/Images/servicepage-branding.png"><p>Branding Options</p></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/autocracy/Images/servicepage-marketing.png"><p>Marketing / SEO Options</p></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/autocracy/Images/servicepage-planning.png"><p>Content Options</p></li>
            <li><img src="<?php echo get_template_directory_uri(); ?>/autocracy/Images/servicepage-webdev.png"><p>Technical Options</p></li>
        </ul>
        <div class="close-button">X</div>
    </div>
    <div class="module-fullwidth">
        <h2>Homepage Options</h2>
    </div>
    <div class="module-fullwidth">
        <h2>Branding Options</h2>
        <p>
            <label>Logo</label>
            <?php autoc_def_uploadarea($optionname, 'logo'); ?>
        </p>
        <p>
            <label>Headline Colors</label>
            <?php autoc_def_textfield($optionname, 'headlinecolors'); ?>
        </p>
        <p>
            <label>Content Color</label>
            <?php autoc_def_textfield($optionname, 'contentcolors'); ?>
        </p>
        <p>
            <label>Background Color</label>
            <?php autoc_def_textfield($optionname, 'bkgcolor'); ?>
        </p>
        <p>
            <label>Background Image</label>
            <?php autoc_def_uploadarea($optionname, 'bkgimg'); ?>
        </p>
    </div>
    <div class="module-fullwidth">
        <h2>Marketing / SEO Options</h2>
        <p>
            <label>Contact Email</label>
            <?php autoc_def_textfield($optionname, 'contactemail'); ?>
        </p>
        <p>
            <label>Google Analytics Code</label>
            <?php autoc_def_textarea($optionname, 'ganylitics'); ?>
        </p>
        <h3>Sharing Options</h3>
        <p>
            <label>Facebook Profile</label>
            <?php autoc_def_textfield($optionname, 'facebookprofile'); ?>
        </p>
        <p>
            <label>Twitter Profile</label>
            <?php autoc_def_textfield($optionname, 'twitterprofile'); ?>
        </p>
        <p>
            <label>Google + Profile</label>
            <?php autoc_def_textfield($optionname, 'gplusprofile'); ?>
        </p>
    </div>
    <div class="module-fullwidth">
        <h2>Technical Options</h2>
    </div>
    <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'sampletheme'); ?>" />
    </p>
</form>

</div>
<?php
}

function main_theme_options_validate($input) {
    global $select_options, $radio_options;
    // Our checkbox value is either 0 or 1
    if (!isset($input['option1']))
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    // Say our text option must be safe text with no HTML tags
    $input['sometext'] = wp_filter_nohtml_kses($input['sometext']);
    // Our select option must actually be in our array of select options
    // Say our textarea option must be safe text with the allowed tags for posts
    $input['sometextarea'] = wp_filter_post_kses($input['sometextarea']);
    return $input;
}
?>