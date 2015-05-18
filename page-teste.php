<?php
$mypost = array(
    'post_type' => 'evento',
    'meta_query' => array( array(
            'key' => 'data_inicio',
            'value' => date('Ymd'),
            'type' => 'date',
            'compare' => '>'
        ))
);
$loop = new WP_Query($mypost);

while ($loop -> have_posts()) : $loop -> the_post();
    echo get_the_title() . '<br />';
endwhile;
