<?php
/**
 * Plugin Name: Easy Options Page
 * Plugin URI: http://wordpress.org/plugins/easy-options-page
 * Description: Creates Options Pages in less than 2 minutes. And with shortcodes to display the options content
 * Version: 1.4
 * Author: Joaquín Ruiz
 * Author URI: http://jokiruiz.com
 * License: GPLv2
 */


// Add settings link on plugin page
function your_plugin_easy_options_page_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=options_page_plugin.php">Settings</a>';
    array_push($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'your_plugin_easy_options_page_settings_link' );

// create custom plugin settings menu
add_action('admin_menu', 'create_theme_options_page');
function create_theme_options_page() {
    add_options_page('Easy Options Page', 'Easy Options Page', 'administrator', 'options_page_plugin', 'build_options_page','dashicons-wordpress');
}

function build_options_page() {
    ?>
    <div id="theme-options-wrap">
        <div class="easy_title">
            <img src="<?php echo  plugins_url( '/img/title.png', __FILE__ )?>">
            <div class="dashicons dashicons-wordpress easy-icon"></div>
        </div>
        <div class="eop-left">
            <form method="post" action="options.php">
                <?php settings_fields( 'easy-options-group' ); ?>
                <?php do_settings_sections( 'easy-options-group' ); ?>
                <div class="eop-box">
                    <span><b>1. Specify a Name</b></span>
                    <input type="text" name="easy_option_name" value="<?php echo get_option('easy_option_name'); ?>" />

                    <?php
                    $arr = array("dashicons-menu","dashicons-admin-site","dashicons-dashboard","dashicons-admin-post","dashicons-admin-media",
                        "dashicons-admin-links","dashicons-admin-page","dashicons-admin-comments","dashicons-admin-appearance",
                        "dashicons-admin-plugins","dashicons-admin-users","dashicons-admin-tools","dashicons-admin-settings",
                        "dashicons-admin-network","dashicons-admin-home","dashicons-admin-generic","dashicons-admin-collapse",
                        "dashicons-welcome-write-blog","dashicons dashicons-welcome-add-page","dashicons-welcome-view-site",
                        "dashicons-welcome-widgets-menus","dashicons-welcome-comments","dashicons-welcome-learn-more",
                        "dashicons dashicons-format-aside","dashicons-format-image","dashicons-format-gallery","dashicons-format-video",
                        "dashicons-format-status","dashicons-format-quote","dashicons dashicons-format-chat","dashicons-format-audio",
                        "dashicons-camera","dashicons-images-alt","dashicons-images-alt2","dashicons-video-alt","dashicons-video-alt2",
                        "dashicons-video-alt3","dashicons-media-archive","dashicons-media-audio","dashicons-media-code","dashicons-media-default",
                        "dashicons-media-document","dashicons-media-interactive","dashicons-media-spreadsheet","dashicons-media-text",
                        "dashicons-media-video","dashicons-playlist-audio","dashicons-playlist-video","dashicons-image-crop",
                        "dashicons-image-rotate-left","dashicons-image-rotate-right","dashicons-image-flip-vertical",
                        "dashicons-image-flip-horizontal","dashicons-undo","dashicons-redo","dashicons-editor-bold","dashicons-editor-italic",
                        "dashicons-editor-ul","dashicons-editor-ol","dashicons-editor-quote","dashicons-editor-alignleft",
                        "dashicons-editor-aligncenter","dashicons-editor-alignright","dashicons-editor-insertmore","dashicons-editor-spellcheck",
                        "dashicons-editor-expand","dashicons-editor-contract","dashicons-editor-kitchensink","dashicons-editor-underline",
                        "dashicons-editor-justify","dashicons-editor-textcolor","dashicons-editor-paste-word","dashicons-editor-paste-text",
                        "dashicons-editor-removeformatting","dashicons-editor-video","dashicons-editor-customchar","dashicons-editor-outdent",
                        "dashicons-editor-indent","dashicons-editor-help","dashicons-editor-strikethrough","dashicons-editor-unlink",
                        "dashicons-editor-rtl","dashicons-editor-break","dashicons-editor-code","dashicons-editor-paragraph","dashicons-align-left",
                        "dashicons-align-right","dashicons-align-center","dashicons-align-none","dashicons-lock","dashicons-calendar",
                        "dashicons-visibility","dashicons-post-status","dashicons-edit","dashicons-trash","dashicons-external","dashicons-arrow-up",
                        "dashicons-arrow-down","dashicons-arrow-right","dashicons-arrow-left","dashicons-arrow-up-alt","dashicons-arrow-down-alt",
                        "dashicons-arrow-right-alt","dashicons-arrow-left-alt","dashicons-arrow-up-alt2","dashicons-arrow-down-alt2",
                        "dashicons-arrow-right-alt2","dashicons-arrow-left-alt2","dashicons-sort","dashicons-leftright","dashicons-randomize",
                        "dashicons-list-view","dashicons-exerpt-view","dashicons-share","dashicons-share-alt","dashicons-share-alt2",
                        "dashicons-twitter","dashicons-rss","dashicons-email","dashicons-email-alt","dashicons-facebook","dashicons-facebook-alt",
                        "dashicons-googleplus","dashicons-networking","dashicons-hammer","dashicons-art","dashicons-migrate","dashicons-performance",
                        "dashicons-universal-access","dashicons-universal-access-alt","dashicons-tickets","dashicons-nametag","dashicons-clipboard",
                        "dashicons-heart","dashicons-megaphone","dashicons-schedule","dashicons-wordpress","dashicons-wordpress-alt",
                        "dashicons-pressthis","dashicons-update","dashicons-screenoptions","dashicons-info","dashicons-cart","dashicons-feedback",
                        "dashicons-cloud","dashicons-translation","dashicons-tag","dashicons-category","dashicons-archive","dashicons-tagcloud",
                        "dashicons-text","dashicons-yes","dashicons-no","dashicons-no-alt","dashicons-plus","dashicons-plus-alt","dashicons-minus",
                        "dashicons-dismiss","dashicons-marker","dashicons-star-filled","dashicons-star-half","dashicons-star-empty","dashicons-flag",
                        "dashicons-location","dashicons-location-alt","dashicons-vault","dashicons-shield","dashicons-shield-alt","dashicons-sos",
                        "dashicons-search","dashicons-slides","dashicons-analytics","dashicons-chart-pie","dashicons-chart-bar","dashicons-chart-line",
                        "dashicons-chart-area","dashicons-groups","dashicons-businessman","dashicons-id","dashicons-id-alt","dashicons-products",
                        "dashicons-awards","dashicons-forms","dashicons-testimonial","dashicons-portfolio","dashicons-book","dashicons-book-alt",
                        "dashicons-download","dashicons-upload","dashicons-backup","dashicons-clock","dashicons-lightbulb","dashicons-microphone",
                        "dashicons-desktop","dashicons-tablet","dashicons-smartphone","dashicons-smiley");
                    ?>
                </div>
                <div class="eop-box">
                    <span><b>2. Select a Logo for your Page</b></span><br/><br/>
                    <?php foreach ($arr as $ar) { ?>
                        <div style="margin:8px;display:inline-block">
                            <input type="radio" name="easy_option_logo" value="<?php echo  $ar ?>" <?php echo  (get_option('easy_option_logo') == $ar) ? "checked" :  ""?>><div class="dashicons <?php echo  $ar ?>"></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="eop-box">

                    <span><b>3. Specify the Options</b></span><br/><br/>
                    <table id="table1" class="form-table">
                        <thead>
                        <tr>
                            <th><b>Name</b></th>
                            <th><b>Type</b></th>
                            <th><b>Id</b></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i=1; $i <= get_option('easy_option_numOps'); $i++) {
                            $tableContent = get_option('easy_option_table');
                            ?>
                            <tr>
                                <td><input type="text" name="easy_option_table[name_<?php echo  $i ?>]" value="<?php echo  $tableContent['name_'.$i] ?>" /></td>
                                <td>
                                    <select name="easy_option_table[type_<?php echo  $i ?>]">
                                        <option value="text" <?php echo  ($tableContent['type_'.$i]=="text") ? "selected=true" : "" ?>>Text</option>
                                        <option value="image" <?php echo  ($tableContent['type_'.$i]=="image") ? "selected=true" : "" ?>>Image</option>
                                    </select>
                                </td>
                                <td><input type="text" name="easy_option_table[id_<?php echo  $i ?>]" value="<?php echo  $tableContent['id_'.$i] ?>" /></td>
                                <td><input class="btnDelete" type="button" value="Delete Option" /></td>
                            </tr>

                        <?php	} ?>

                        </tbody>
                    </table>
                    <input hidden type="text" value="<?php echo  get_option('easy_option_numOps');?>" id="easy_option_numOps" name="easy_option_numOps">
                    <input id="btnAdd" value="Add Option" type="button">
                </div>
                <div class="eop-box"> <p></p>
                    <span><b>4.Save </b></span> <?php submit_button(); ?>
                </div>
                <div class="eop-box">
                    <span><b>5.How to Use it </b></span>
                    <div style="margin:10px;padding:10px;background:white">
                        Once you press "Save Changes", the option page will appear on the bottom
                        of the admin menu with your specifications, otherwise, reload the page.
                        <br /><br />
                        To gather the information of your new options page:<br /><br />
                        <div style="margin-left:20px">
                            In your post editor, use the wp shortcode:  <br/>
                            <b>[easy_options id="option_id"]</b> <br />
                            changing "option_id" to the Id you specified in the third column.

                            <br /><br />

                            In your template, use the php function: <br/>
                            <b>$easy_options = get_option("easy_page_options");</b><br />
                            and then <b>$easy_options["option_id"];</b><br />
                            changing "option_id" to the Id you specified in the third column.
                        </div>
                    </div>
                    More information and FAQ :
                </div>
            </form>
        </div><div class="eop-right">
            <div class="eop-box" style="text-align: center">
                <h2>"Easy" plugins</h2>
                <p>This plugin is offered for free but you may consider helping the further development of this and others plugins. Thank you! :)</p>
                <br/>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="CHXF6Q9T3YLQU">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                </form>
                <hr>
                <h2>More "Easy" plugins</h2>
                <ul>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-admin-menu/">Easy Admin Menu</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-options-page/">Easy Options Page</a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/easy-timeout-session/">Easy Timeout Session</a>
                    </li>
                </ul>
                <hr>
                <p>Please, rate the plugins, and if you have any problem/feedback, don't hesitate to post in the support forum.</p>
                <p><strong>Enjoy! ;)</strong></p>
            </div>
        </div>
    </div>
<?php
}

add_action('admin_init', 'register_and_build_fields');

function register_and_build_fields() {
    register_setting( 'easy-options-group', 'easy_option_name' );
    register_setting( 'easy-options-group', 'easy_option_logo' );
    register_setting( 'easy-options-group', 'easy_option_table' );
    register_setting( 'easy-options-group', 'easy_option_numOps' );

}

function easy_options_scripts() {
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'easy-options-script-name', plugins_url( '/js/scripts.js', __FILE__ ));
    wp_enqueue_style( 'easy-options-style-name', plugins_url( '/css/styles.css', __FILE__ ));
}

add_action( 'admin_enqueue_scripts', 'easy_options_scripts' );


/*******************************************************************/
/*******************************************************************/


add_action('admin_menu', 'create_user_easy_options_page');
function create_user_easy_options_page() {
    $name = (get_option('easy_option_name') != "") ? get_option('easy_option_name') : "Option Page Name";
    $logo = (get_option('easy_option_logo') != "") ? get_option('easy_option_logo') : "dashicons-menu";
    add_menu_page($name , $name , 'administrator', 'options_easy_page_plugin', 'build_easy_page_plugin',$logo);
    add_action( 'admin_init', 'register_user_easy_mysettings' );
}

function register_user_easy_mysettings() {
    //register our settings
    register_setting( 'easy_page_options', 'easy_page_options', 'validate_easy_setting');
}

function validate_easy_setting($easy_page_options) {
    $keys = array_keys($_FILES); $i = 0;
    foreach ( $_FILES as $image ) {   // if a files was upload

        if ($image['size']) {     // if it is an image
            if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {
                $override = array('test_form' => false);       // save the file, and store an array, containing its location in $file
                $file = wp_handle_upload( $image, $override );  error_log(print_r($file,1));
                $easy_page_options[$keys[$i]] = $file['url'];
            } else {       // Not an image.
                $options = get_option('easy_page_options');
                $easy_page_options[$keys[$i]] = $options[$logo];       // Die and let the user know that they made a mistake.
                wp_die('No image was uploaded.');
            }
        }   // Else, the user didn't upload a file.   // Retain the image that's already on file.
        else {
            $options = get_option('easy_page_options');
            $easy_page_options[$keys[$i]] = $options[$keys[$i]];
        }
        $i++;
    }
    return $easy_page_options;
}


function build_easy_page_plugin() {
    $name = (get_option('easy_option_name') != "") ? get_option('easy_option_name') : "Option Page Name";
    $logo = (get_option('easy_option_logo') != "") ? get_option('easy_option_logo') : "dashicons-menu";
    ?>
    <div style="padding-right:10px">
        <br/>
        <div style="background:#333;margin:;padding:15px;">
            <div class="dashicons <?php echo  $logo ?>" style="color: white;"></div>
            <h2 style="color:#fff;margin-left: 30px; margin-top: -17px; margin-bottom: 0px;"><b><?php echo  $name ?></b></h2>
        </div>
        <div style="background:#bbb;margin:;padding:15px;padding-bottom:0px">
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php settings_fields( 'easy_page_options' ); ?>
                <?php do_settings_sections( 'easy_page_options' ); ?>
                <?php $opt = get_option( 'easy_page_options' ); ?>
                <table style="width:100%">
                    <thead>
                    <tr>
                        <th style="width:10%"><b>Name</b></th>
                        <th style="width:50%"><b></th>
                        <th style="width:40%"><b>Shortcode</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tableContent = get_option('easy_option_table');

                    for ($i=1; $i <= get_option('easy_option_numOps'); $i++) {
                        if ($tableContent['type_'.$i]=="text") { ?>
                            <tr>
                                <td><?php echo  $tableContent['name_'.$i]?></td>
                                <td><input type="text" name="easy_page_options[<?php echo  $tableContent['id_'.$i]?>]"
                                           value="<?php echo  $opt[$tableContent['id_'.$i]]; ?>" style="width:100%"/></td>
                                <td style="padding-left:35px">
                                    [easy_options id="<?php echo  $tableContent['id_'.$i] ?>"]
                                </td>
                            </tr>
                        <?php }
                        else { // image ?>
                            <tr>
                                <td><?php echo  $tableContent['name_'.$i]?></td>
                                <td>
                                    <input type="file" id="<?php echo  $tableContent['id_'.$i]?>" name="<?php echo  $tableContent['id_'.$i]?>" />
                                </td>
                                <td style="line-height:44px;padding-left:35px">
                                    [easy_options id="<?php echo  $tableContent['id_'.$i] ?>"]
                                    <img style="height:50px;width:auto;float:right" src="<?php echo  $opt[$tableContent['id_'.$i]]; ?>">

                                </td>

                            </tr>

                        <?php }
                    }


                    ?>
                    </tbody>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
<?php
}

// Shortcodes
function easy_options_short_func( $atts ){
    $easy_options = get_option(easy_page_options);

    return $easy_options[$atts['id']];
}
add_shortcode( 'easy_options', 'easy_options_short_func' );


/*******************************************************************/
/*******************************************************************/



