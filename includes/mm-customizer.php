<?php


function prefix_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'static_front_page' );

	$wp_customize->add_setting( 'wildberry_theme_facebook' );
	$wp_customize->add_control( 'wildberry_theme_facebook',
		array(
			'label'   => 'Facebook ссылка',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_instagram' );
	$wp_customize->add_control( 'wildberry_theme_instagram',
		array(
			'label'   => 'Instagram ссылка',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_vk' );
	$wp_customize->add_control( 'wildberry_theme_vk',
		array(
			'label'   => 'VK',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_phone' );
	$wp_customize->add_control( 'wildberry_theme_phone',
		array(
			'label'   => 'Phone',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_workhours' );
	$wp_customize->add_control( 'wildberry_theme_workhours',
		array(
			'label'   => 'Рабочие часы',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );
	$wp_customize->add_setting( 'wildberry_theme_city_header' );
	$wp_customize->add_control( 'wildberry_theme_city_header',
		array(
			'label'   => 'Город в хедере',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_email_footer' );
	$wp_customize->add_control( 'wildberry_theme_email_footer',
		array(
			'label'   => 'Email',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city1_footer' );
	$wp_customize->add_control( 'wildberry_theme_city1_footer',
		array(
			'label'   => 'Город1',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city1_footer_phone' );
	$wp_customize->add_control( 'wildberry_theme_city1_footer_phone',
		array(
			'label'   => 'Телефон для города1',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city2_footer' );
	$wp_customize->add_control( 'wildberry_theme_city2_footer',
		array(
			'label'   => 'Город2',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city2_footer_phone' );
	$wp_customize->add_control( 'wildberry_theme_city2_footer_phone',
		array(
			'label'   => 'Телефон для города2',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city3_footer' );
	$wp_customize->add_control( 'wildberry_theme_city3_footer',
		array(
			'label'   => 'Город3',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );

	$wp_customize->add_setting( 'wildberry_theme_city3_footer_phone' );
	$wp_customize->add_control( 'wildberry_theme_city3_footer_phone',
		array(
			'label'   => 'Телефон для города3',
			'type'    => 'text',
			'section' => 'title_tagline',
		) );


	$wp_customize->add_section( 'wildberry_front_page_sliders', array(
		'title'    => 'Главная страница. Слайдер',
		'priority' => 30
	) );


	$wp_customize->add_setting( 'wildberry_theme_44' );
	$wp_customize->add_control( 'wildberry_theme_44',
		array(
			'label'   => 'Телефон для города3',
			'type'    => 'text',
			'section' => 'mytheme_new_section_name',
		) );


	for ( $i = 1; $i < 6; $i ++ ) {
		$wp_customize->add_setting( 'wildberry_theme_slider' . $i . '_link' );
		$wp_customize->add_control( 'wildberry_theme_slider' . $i . '_link',
			array(
				'label'   => 'Слайдер' . $i . ' ссылка',
				'type'    => 'text',
				'section' => 'wildberry_front_page_sliders',
			) );

		$wp_customize->add_setting( 'wildberry_theme_slider' . $i . '_name' );
		$wp_customize->add_control( 'wildberry_theme_slider' . $i . '_name',
			array(
				'label'   => 'Слайдер' . $i . ' название',
				'type'    => 'text',
				'section' => 'wildberry_front_page_sliders',
			) );
		$wp_customize->add_setting( 'wildberry_theme_slider' . $i . '_desc' );
		$wp_customize->add_control( 'wildberry_theme_slider' . $i . '_desc',
			array(
				'label'   => 'Слайдер' . $i . ' описание',
				'type'    => 'text',
				'section' => 'wildberry_front_page_sliders',
			) );
		$wp_customize->add_setting( 'wildberry_theme_slider' . $i . '_img1' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wildberry_theme_slider' . $i . '_img1',
			array(
				'label'   => 'Слайдер' . $i . ' картинка',
				'type'    => 'image',
				'section' => 'wildberry_front_page_sliders'

			) ) );

		$wp_customize->add_setting( 'wildberry_theme_slider' . $i . '_img2' );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wildberry_theme_slider' . $i . '_img2',
			array(
				'label'   => 'Слайдер' . $i . ' картинка планшетная',
				'type'    => 'image',
				'section' => 'wildberry_front_page_sliders',
			) ) );
	}

	$wp_customize->add_section( 'wildberry_front_page_featured', array(
		'title'    => 'Главная страница. Рекомендации и информация под рекомендациями.',
		'priority' => 31
	) );

	for ( $i = 1; $i <= 6; $i ++ ) {

		$wp_customize->add_setting( "wildberry_theme_featured{$i}_link" );
		$wp_customize->add_control( "wildberry_theme_featured{$i}_link",
			array(
				'label'   => "Рекомендация{$i}. Ссылка.",
				'type'    => 'text',
				'section' => 'wildberry_front_page_featured',
			) );

		$wp_customize->add_setting( "wildberry_theme_featured{$i}_name" );
		$wp_customize->add_control( "wildberry_theme_featured{$i}_name",
			array(
				'label'   => "Рекомендация{$i}. Название.",
				'type'    => 'text',
				'section' => 'wildberry_front_page_featured',
			) );
		$wp_customize->add_setting( "wildberry_theme_featured{$i}_desc" );
		$wp_customize->add_control( "wildberry_theme_featured{$i}_desc",
			array(
				'label'   => "Рекомендация{$i}. Описание.",
				'type'    => 'text',
				'section' => 'wildberry_front_page_featured',
			) );
		$wp_customize->add_setting( "wildberry_theme_featured{$i}_img" );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "wildberry_theme_featured{$i}_img",
			array(
				'label'   => "Рекомендация{$i}. Картинка.",
				'type'    => 'image',
				'section' => 'wildberry_front_page_featured',
			) ) );
	}

	for ( $i = 1; $i <= 3; $i ++ ) {
		$wp_customize->add_setting( "wildberry_theme_featured_additional{$i}" );
		$wp_customize->add_control( "wildberry_theme_featured_additional{$i}",
			array(
				'label'   => "Дополнительная информация{$i}.",
				'type'    => 'text',
				'section' => 'wildberry_front_page_featured',
			) );
	}


}

add_action( 'customize_register', 'prefix_customize_register' );
