<?php





function prefix_customize_register( $wp_customize ) {

    $wp_customize->add_setting('wildberry_theme_facebook');
    $wp_customize->add_control('wildberry_theme_facebook',
        array(
            'label' => 'Facebook ссылка',
            'type' => 'text',
            'section' => 'title_tagline',
        )  );

    $wp_customize->add_setting('wildberry_theme_instagram');
    $wp_customize->add_control('wildberry_theme_instagram',
        array(
            'label' => 'Instagram ссылка',
            'type' => 'text',
            'section' => 'title_tagline',
        )  );

    $wp_customize->add_setting('wildberry_theme_vk');
    $wp_customize->add_control('wildberry_theme_vk',
        array(
            'label' => 'VK',
            'type' => 'text',
            'section' => 'title_tagline',
        )  );
}
add_action( 'customize_register', 'prefix_customize_register' );