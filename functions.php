<?php
    /*
     *  Author:
     *  Custom functions, support, custom post types and more.
     */

    /*------------------------------------*\
        External Modules/Files
    \*------------------------------------*/

    // Load any external files you have here
    // Register Custom Navigation Walker

    // EXAMPLE
    // require_once get_template_directory() . '/utils/class-wp-bootstrap-navwalker.php';

    /*------------------------------------*\
        Theme Support
    \*------------------------------------*/

    if (!isset($content_width)) {
        $content_width = 900;
    }

    if (function_exists('add_theme_support')) {
        // Add Menu Support
        add_theme_support('menus');

        // Add title tag support yoast
        add_theme_support( 'title-tag' );

        // Add Thumbnail Theme Support
        add_theme_support('post-thumbnails');
        add_image_size('large', 700, '', true); // Large Thumbnail
        add_image_size('medium', 250, '', true); // Medium Thumbnail
        add_image_size('small', 120, '', true); // Small Thumbnail
        add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


        // Add Support for Custom Backgrounds - Uncomment below if you're going to use
        /*add_theme_support('custom-background', array(
        'default-color' => 'FFF',
        'default-image' => get_template_directory_uri() . '/img/bg.jpg'
        ));*/

        // Add Support for Custom Header - Uncomment below if you're going to use
        /*add_theme_support('custom-header', array(
        'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text'			=> false,
        'default-text-color'		=> '000',
        'width'				=> 1000,
        'height'			=> 198,
        'random-default'		=> false,
        'wp-head-callback'		=> $wphead_cb,
        'admin-head-callback'		=> $adminhead_cb,
        'admin-preview-callback'	=> $adminpreview_cb
        ));*/

        // Enables post and comment RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Woocommerce
        // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        // remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

        // add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
        // add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

        // function my_theme_wrapper_start() {
        //   echo '<main role="main" id="page-content">';
        // }

        // function my_theme_wrapper_end() {
        //   echo '</main>';
        // }

        // add_theme_support( 'woocommerce' );


        // Localisation Support
        //load_theme_textdomain('theme5150', get_template_directory() . '/languages');
    }

    /*------------------------------------*\
        Functions
    \*------------------------------------*/

 // navigation
function theme5150_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="main-menu">%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

// footer navigation
function theme5150_footer_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'footer-menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul>%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        )
    );
}

    // Load scripts (header.php)
    function theme5150_header_scripts()
    {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

            wp_register_script('conditionizr', get_template_directory_uri() . '/js/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
            wp_enqueue_script('conditionizr'); // Enqueue it!

            wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-custom.js'); // Modernizr
            wp_enqueue_script('modernizr'); // Enqueue it!

            wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), true); 
            wp_enqueue_script('bootstrap-js'); // Enqueue it!

            wp_register_script('fontawesome', 'https://kit.fontawesome.com/ebf6923089.js', array(), true); // Custom scripts
            wp_enqueue_script('fontawesome'); // Enqueue it!


            // CUSTOM
            wp_register_script('theme5150js', get_template_directory_uri() . '/js/theme5150.js', array('jquery'), filemtime( get_template_directory().'/js/theme5150.js' )); // theme scripts
            wp_enqueue_script('theme5150js'); // Enqueue it!
        }
    }

    // Load conditional scripts
/* DON'T FORGET to add action below if you uncomment this
    function theme5150_conditional_scripts()
    {
        if (is_page('pagenamehere')) {
            wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
            wp_enqueue_script('scriptname'); // Enqueue it!
        }
    }
*/


    // Load styles
    function theme5150_styles()
    {

        wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), '4.0.0-alpha.6', 'all');
        wp_enqueue_style('bootstrap'); // Enqueue it!

        wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '1.0', 'all');
        wp_enqueue_style('normalize'); // Enqueue it!

        wp_register_style( 'theme5150', get_template_directory_uri().'/style.css', array(), filemtime( get_template_directory().'/style.css' ) );
        wp_enqueue_style( 'theme5150' );
    }


    // Remove the gutenburg editor and return to classical music
    // disable for posts
    //add_filter('use_block_editor_for_post', '__return_false', 10);

/*
    function theme5150_disable_gutenberg($is_enabled, $post_type)
    {
        if ($post_type === 'page') return false;
        return $is_enabled;
    }

    add_filter('use_block_editor_for_post_type', 'theme5150_disable_gutenberg', 10, 2);

*/

    // Register Navigation
    function register_html5_menu()
    {
        register_nav_menus(array( // Using array to specify more menus if needed
            'header-menu'  => __('Header Menu', 'theme5150'), // Main Navigation
            'sidebar-menu' => __('Sidebar Menu', 'theme5150'), // Sidebar Navigation
            'footer-menu'  => __('Footer Menu', 'theme5150') // Footer Navigation
        ));
    }

    // Remove the <div> surrounding the dynamic navigation to cleanup markup
    function my_wp_nav_menu_args($args = '')
    {
        $args['container'] = false;
        return $args;
    }

    // Remove Injected classes, ID's and Page ID's from Navigation <li> items
    function my_css_attributes_filter($var)
    {
        return is_array($var) ? array() : '';
    }

    // Remove invalid rel attribute values in the categorylist
    function remove_category_rel_from_category_list($thelist)
    {
        return str_replace('rel="category tag"', 'rel="tag"', $thelist);
    }

    // Add page slug to body class, love this - Credit: Starkers Wordpress Theme
    function add_slug_to_body_class($classes)
    {
        global $post;
        if (is_home()) {
            $key = array_search('blog', $classes);
            if ($key > -1) {
                unset($classes[$key]);
            }
        } elseif (is_page()) {
            $classes[] = sanitize_html_class($post->post_name);
        } elseif (is_singular()) {
            $classes[] = sanitize_html_class($post->post_name);
        }
        // $classes[] = 'd-flex flex-column h-100';
        return $classes;
    }

    // Removes category title from sidebar widget
    function categories_empty_title($title, $instance, $base)
    {
        if ($base == 'categories') {
            if (trim($instance['title']) == '')
                return '';
        }
        return $title;
    }

    add_filter('widget_title', 'categories_empty_title', 10, 3);

    // If Dynamic Sidebar Exists
    if (function_exists('register_sidebar')) {
        // Define Sidebar Widget Area 1
        register_sidebar(array(
            'name'          => __('Widget Area 1', 'theme5150'),
            'description'   => __('Description for this widget-area...', 'theme5150'),
            'id'            => 'widget-area-1',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ));

        // Define Sidebar Widget Area 2
        register_sidebar(array(
            'name'          => __('Widget Area 2', 'theme5150'),
            'description'   => __('Description for this widget-area...', 'theme5150'),
            'id'            => 'widget-area-2',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ));
    }

    // Remove wp_head() injected Recent Comment styles
    function my_remove_recent_comments_style()
    {
        global $wp_widget_factory;
        remove_action('wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ));
    }

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function html5wp_pagination()
    {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
            'format'  => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total'   => $wp_query->max_num_pages
        ));
    }

    // Custom Excerpts
    function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
    {
        return 20;
    }

    // Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
    function html5wp_custom_post($length)
    {
        return 30;
    }

    // Create the Custom Excerpts callback
    function html5wp_excerpt($length_callback = '', $more_callback = '')
    {
        global $post;
        if (function_exists($length_callback)) {
            add_filter('excerpt_length', $length_callback);
        }
        if (function_exists($more_callback)) {
            add_filter('excerpt_more', $more_callback);
        }
        $output = get_the_excerpt();
        $output = apply_filters('wptexturize', $output);
        $output = apply_filters('convert_chars', $output);
        $output = '<p>' . $output . '</p>';
        echo $output;
    }

    // Custom View Article link to Post
    //function html5_blank_view_article($more)
    //{
    //    global $post;
    //    return '<a class="read-more btn-primary" href="' . get_permalink($post->ID) . '">' . __('Read More', 'theme5150') . '</a>';
    //}

    // Remove Admin bar
    function remove_admin_bar()
    {
        return false;
    }

    // Remove 'text/css' from our enqueued stylesheet
    function html5_style_remove($tag)
    {
        return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
    }

    // Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
    function remove_thumbnail_dimensions($html)
    {
        $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
        return $html;
    }

    // Custom Gravatar in Settings > Discussion
    function theme5150gravatar($avatar_defaults)
    {
        $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
        $avatar_defaults[$myavatar] = "Custom Gravatar";
        return $avatar_defaults;
    }

    // Threaded Comments
    function enable_threaded_comments()
    {
        if (!is_admin()) {
            if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
                wp_enqueue_script('comment-reply');
            }
        }
    }

    // DISABLE GUTENBURG RETURN TO CLASSIC EDITOR
    // disable for posts
    add_filter('use_block_editor_for_post', '__return_false', 10);

    // Custom Comments Callback
    function theme5150comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li ';
            $add_below = 'div-comment';
        }
        ?>
        <!-- heads up: starting < for the html tag (li or div) in the next line: --><<?php echo $tag ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['180']); ?><?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>    <br/>
    <?php endif; ?>

        <div class="comment-meta commentmetadata">
            <p>
                <?php
                    printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></p><?php edit_comment_link(__('(Edit)'), '  ', '');
            ?>
        </div>

        <?php comment_text() ?>

        <div class="reply">
            <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?><?php }

    /*------------------------------------*\
        Actions + Filters + ShortCodes
    \*------------------------------------*/

    // Add Actions
    add_action('init', 'theme5150_header_scripts'); // Add Custom Scripts to wp_head
    //add_action('wp_print_scripts', 'theme5150_conditional_scripts'); // Add Conditional Page Scripts
    add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
    add_action('wp_enqueue_scripts', 'theme5150_styles'); // Add Theme Stylesheet
    add_action('init', 'register_html5_menu'); // Add Menu
    //add_action('init', 'create_post_type_html5'); // Add our Custom Post Type
    add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
    add_action('init', 'html5wp_pagination'); // Add our Pagination

    // Remove Actions
    remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
    remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
    remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
    remove_action('wp_head', 'index_rel_link'); // Index link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
    remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    // Add Filters
    add_filter('avatar_defaults', 'theme5150gravatar'); // Custom Gravatar in Settings > Discussion
    add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
    add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
    add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
    add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
    // add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
    // add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
    // add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
    add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
    add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
    add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
    add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
    add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
    add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
    add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
    add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
    add_filter( 'img_caption_shortcode_width', '__return_false' );//Prevent fixed width inline styling added to container of post images with a caption

    // Remove Filters
    remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

    // Shortcodes
    add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
    add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

    // Shortcodes above would be nested like this -
    // [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

    /*------------------------------------*\
        Custom Post Types
    \*------------------------------------*/

    // Create 1 Custom Post type for a Demo
    //function create_post_type_html5()
    //{
    //    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    //    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    //    register_post_type('html5-blank', // Register Custom Post Type
    //        array(
    //        'labels' => array(
    //            'name' => __('THEME5150 Custom Post', 'theme5150'), // Rename these to suit
    //            'singular_name' => __('THEME5150 Custom Post', 'theme5150'),
    //            'add_new' => __('Add New', 'theme5150'),
    //            'add_new_item' => __('Add New THEME5150 Custom Post', 'theme5150'),
    //            'edit' => __('Edit', 'theme5150'),
    //            'edit_item' => __('Edit THEME5150 Custom Post', 'theme5150'),
    //            'new_item' => __('New THEME5150 Custom Post', 'theme5150'),
    //            'view' => __('View THEME5150 Custom Post', 'theme5150'),
    //            'view_item' => __('View THEME5150 Custom Post', 'theme5150'),
    //            'search_items' => __('Search THEME5150 Custom Post', 'theme5150'),
    //            'not_found' => __('No THEME5150 Custom Posts found', 'theme5150'),
    //            'not_found_in_trash' => __('No THEME5150 Custom Posts found in Trash', 'theme5150')
    //        ),
    //        'public' => true,
    //        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    //        'has_archive' => true,
    //        'supports' => array(
    //            'title',
    //            'editor',
    //            'excerpt',
    //            'thumbnail'
    //        ), // Go to Dashboard Custom post for supports
    //        'can_export' => true, // Allows export in Tools > Export
    //        'taxonomies' => array(
    //            'post_tag',
    //            'category'
    //        ) // Add Category and Post Tags support
    //    ));
    //}

    /*------------------------------------*\
        ShortCode Functions
    \*------------------------------------*/

    // Shortcode Demo with Nested Capability
    function html5_shortcode_demo($atts, $content = null)
    {
        return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
    }

    // Shortcode Demo with simple <h2> tag
    function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
    {
        return '<h2>' . $content . '</h2>';
    }

    //	Add deconstructed URI as <body> classes
    function theme5150_bc_add_body_class($classes)
    { // $classes = array of additional classes to add
        global $post;
        if ($post && $post->ID) {
            foreach ((get_the_category($post->ID)) as $category) {
                $classes[] = trim($category->category_nicename);
            }
            $url = get_bloginfo('url');
            $protocol = (strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE) ? 'http' : 'https';
            $base = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $bodyclass = trim(str_replace($url, '', $base));
            $bodyclass = explode('/', $bodyclass);
            foreach ($bodyclass as $category) {
                $classes[] = trim($category);
            }
        }
        return array_unique($classes);
    }

    add_filter('post_class', 'theme5150_bc_add_body_class');
    add_filter('body_class', 'theme5150_bc_add_body_class');

?>
