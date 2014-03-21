<?php
/* Creates the Theme Options Page */

function main_theme_options_do_page() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
    wp_enqueue_style('thickbox');
    wp_enqueue_style( 'style-name', get_template_directory_uri().'/autocracy/admin.css' );
    wp_enqueue_style( 'style-font', 'http://fonts.googleapis.com/css?family=Rokkitt' );
    wp_enqueue_script('upload_enable', get_template_directory_uri() . '/autocracy/theme-options.js', false, null);
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
        </ul>
        <div class="close-button">X</div>
    </div>
    <div class="module-fullwidth">
        <h2>Homepage Options</h2>
        <p>
            <label>Show Products?</label>
            <?php autoc_def_checkbox($optionname, 'showproducts'); ?>
        </p>
        <p>
            <label>Show Brands?</label>
            <?php autoc_def_checkbox($optionname, 'showbrands'); ?>
        </p>
        <p>
            <label>Show Content?</label>
            <?php autoc_def_checkbox($optionname, 'flexgrid'); ?>
        </p>
        <div class="module-third">
            <h3>Content 1 Block</h3>
            <p>
                <label>Content Title</label>
                <?php autoc_def_textfield($optionname, 'content1blocktitle'); ?>
            </p>
            <p>
                <label>Content Text</label>
                <?php autoc_def_textarea($optionname, 'content1blocktext'); ?>
            </p>
        </div>
        <div class="module-third">
            <h3>Content 2 Block</h3>
            <p>
                <label>Content Title</label>
                <?php autoc_def_textfield($optionname, 'content2blocktitle'); ?>
            </p>
            <p>
                <label>Content Text</label>
                <?php autoc_def_textarea($optionname, 'content2blocktext'); ?>
            </p>
        </div>
        <div class="module-third">
            <h3>Content 3 Block</h3>
            <p>
                <label>Content Title</label>
                <?php autoc_def_textfield($optionname, 'content3blocktitle'); ?>
            </p>
            <p>
                <label>Content Text</label>
                <?php autoc_def_textarea($optionname, 'content3blocktext'); ?>
            </p>
        </div>
        <div class="module-half">
            <h3>Left Block</h3>
            <p>
                <label>Content Title</label>
                <?php autoc_def_textfield($optionname, 'leftblocktitle'); ?>
            </p>
        </div>
        <div class="module-half">
           <h3>Right Block</h3>
           <p>
            <label>Content Title</label>
            <?php autoc_def_textfield($optionname, 'rightblocktitle'); ?>
        </p>
    </div>
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
        <label>Border Colors</label>
        <?php autoc_def_textfield($optionname, 'bordercolors'); ?>
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
        <label>Physical Address</label>
        <?php autoc_def_textfield($optionname, 'physicaladdress'); ?>
    </p>
    <p>
        <label>Footer Copyright Text</label>
        <?php autoc_def_textarea($optionname, 'footertext'); ?>
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