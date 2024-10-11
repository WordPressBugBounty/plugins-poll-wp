<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
$data = array(
    "active" => "6000",
    "review" => "4.7",
    "downloads" => "200000+"
);
$username = 'totalsoft';
$params = array(
    'timeout'   => 10,
    'sslverify' => false
);
$raw = wp_remote_retrieve_body( wp_remote_get( 'https://wptally.com/api/' . $username, $params ) );
$raw = json_decode( $raw, true );
if ( is_array( $raw ) && !array_key_exists( 'error', $raw ) ) {
    $raw = $raw["plugins"]["poll-wp"];
    $data["active"] = $raw["installs"];
    $data["review"] = $raw["rating"];
    $data["downloads"] = $raw["downloads"];
}
$tsp_addons_cards = "";
$tsp_addons_array = array(
    "Multi Check" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/check_many.png'),
        "desc" => "This feature may allow you to select multiple answers. This feature is available on all poll types."
    ],
    "Analytics" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/analytics.png'),
        "desc" => "The most interesting feature in the poll. Here you can see a lot of good info for you. When you voted, from which city and country, what answer you chose, from which browser you voted, you can find out how many people voted every day and from which country how many people voted."
    ],
    "Count changes" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/count_changes.png'),
        "desc" => "Shows how many people voted and on each answer how many votes. The most important thing is that you can change the voices. Nobody sees it except you."
    ],
    "Versus" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/versus.png'),
        "desc" => "Template for conducting a beautiful poll with two images. There are many features and effects on this version."
    ],
    "All in One" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/AIO.png'),
        "desc" => "Briefly about this version. You can use text, video and image together. We have added all in one for you. Our team has added this topic at your request."
    ],
    "Vote once" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/vote_once.png'),
        "desc" => "This feature makes possible to restrict votes via (PHP Cookie, IP Address, IP Address time ).  You can choose after how many hours or a day you can vote again."
    ],
    "Start and End" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/startandend.png'),
        "desc" => "This feature allows you to decide when the poll will start and end. You can also write the day when the poll will start."
    ],
    "Export as CSV" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/CSV.png'),
        "desc" => "You can export and view the results via CSV and save them.  This function gives you a lot of information for the results."
    ],
    "Export as PDF" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/PDF.png'),
        "desc" => "You can export and view the results via PDF and save them.  This function gives you a lot of information for the results."
    ],
    "Export as JSON" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/JSON.png'),
        "desc" => "You can export and view the results via JSON and save them.  This function gives you a lot of information for the results."
    ],
    "Message Builder" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/thank_you.png'),
        "desc" => "This feature is for the Poll Plugin.  You can create your design without any limitation.  And after voting, you can show and even write the text  as you want.  Something like this text 'Thank you for voting.'"
    ],
    "Your design after vote" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/thankyou_vote.jpg'),
        "desc" => "After voting under the poll, you can write the text as you want.  You can create through the image and many more features that you want. You can see all the possibilities on our demo version."
    ],
    "Link button" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/link_button.jpg'),
        "desc" => "After voting, you can add a button.  This button gives you the opportunity to put a link to which site you want. There are 7 designs for buttons. You can change colors, font family, size, and more."
    ],
    "New Message Shortcode" => [
        "src" => esc_url(plugin_dir_url( __FILE__ ) . 'img/thankyou_shorcode.jpg'),
        "desc" => "Through the shortcode, you can only show what you created for 'Thank you' text, design with a button for the link and what you created after voting show."
    ] 
);
foreach ($tsp_addons_array as $key => $value) {
    $tsp_addons_cards .= sprintf('
        <div class="tsp_addon_card">
            <div class="tsp_card__image-holder">
                <img class="tsp_card__image" src="%1$s" alt="%2$s" />
            </div>
            <div class="tsp_addon_card-title">
                <a  class="tsp_toggle-info tsp_addon_btn">
                    <span class="tsp_left"></span>
                    <span class="tsp_right"></span>
                </a>
                <h2>
                    %2$s
                </h2>
                </br>
            </div>
            <div class="tsp_addon_card-flap tsp_flap1">
                <div class="tsp_addon_card-description">
                    %3$s
                </div>
                <div class="tsp_addon_card-flap tsp_flap2">
                    <div class="tsp_addon_card-actions">
                        <a href="%4$s" class="tsp_addon_btn" target="_blank">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        ',
        esc_url($value["src"]),
        esc_html($key),
        esc_html($value["desc"]),
        esc_url("https://total-soft.com/wp-poll/")
    );
}
echo sprintf('
    <header class="tsp_addon_header">
        <div class="tsp_addon_inner">
            <div class="tsp_addon_header_info">
                <h1>Upgrade TS Poll Pro</h1>
                The plugin allows you to create awesome poll on your WordPress site. It has many powerful features to create very beautiful and easy to use polls on your website. You can create / edit polls change the color and background color. If you are looking for a simple, easy but very professional polls for your website,so, you find it! This plugin is what you are looking for.
            </div>
            <div class="tsp_addon_header_img">
                <img class="tsp_addon_himg" src="%2$s">
            </div>
        </div>
    </header>
    <div class="tspoll_plugin_with_numbers">
        <div class="tspoll_flex_field">
            <p class="tsp_count">%3$s +</p>
            <p class="tsp_type">active installations</p>
        </div>
        <div class="tspoll_flex_field">
            <p class="tsp_count">%4$s / 5</p>
            <p class="tsp_type">user reviews</p>
        </div>
        <div class="tspoll_flex_field">
            <p class="tsp_count">%5$s</p>
            <p class="tsp_type">all time downloads</p>
        </div>
    </div>
    <div class="tsp_addon_cards">
        %1$s
    </div>
    ',
    $tsp_addons_cards,
    esc_url(plugin_dir_url( __FILE__ ) . 'img/addons.svg'),
    $data["active"],
    $data["review"],
    $data["downloads"]
);
