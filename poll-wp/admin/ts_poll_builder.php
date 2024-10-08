<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
echo sprintf(
	'
  	<section id="tsp_loader" class="tsp_flex_col">
  		<div id="tsp_load_circle"></div>
  		<img src="%1$s" class="tsp_load_img">
  	</section>
  	',
	esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo.png' )
);
\ob_start();
if ( 'new' === $this->tsp_build ) {
	$tsp_template_array = [
		[
			"template_id" => 1,
			"title" => "Standard Poll - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-1.png",
			"filter" => "standard-poll",
			"demo" => 1,
			"free" => true
		],
		[
			"template_id" => 2,
			"title" => "Standard Poll - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-2.png",
			"filter" => "standard-poll",
			"demo" => 2,
			"free" => true
		],
		[
			"title" => "Standard Poll - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-3.png",
			"filter" => "standard-poll",
			"demo" => 3,
			"free" => false
		],
		[
			"template_id" => 3,
			"title" => "Standard Poll - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-4.png",
			"filter" => "standard-poll",
			"demo" => 4,
			"free" => true
		],
		[
			"title" => "Standard Poll - Template 5",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-5.png",
			"filter" => "standard-poll",
			"demo" => 5,
			"free" => false
		],
		[
			"title" => "Standard Poll - Template 6",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-6.png",
			"filter" => "standard-poll",
			"demo" => 6,
			"free" => false
		],
		[
			"template_id" => 4,
			"title" => "Standard Poll - Template 7",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-7.png",
			"filter" => "standard-poll",
			"demo" => 7,
			"free" => true
		],
		[
			"title" => "Standard Without Button - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-8.png",
			"filter" => "standard-without-button",
			"demo" => 1,
			"free" => false
		],
		[
			"template_id" => 5,
			"title" => "Standard Without Button - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-9.png",
			"filter" => "standard-without-button",
			"demo" => 2,
			"free" => true
		],
		[
			"title" => "Standard Without Button - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-10.png",
			"filter" => "standard-without-button",
			"demo" => 3,
			"free" => false
		],
		[
			"title" => "Standard Without Button - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-11.png",
			"filter" => "standard-without-button",
			"demo" => 4,
			"free" => false
		],
		[
			"template_id" => 6,
			"title" => "Standard Without Button - Template 5",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-12.png",
			"filter" => "standard-without-button",
			"demo" => 5,
			"free" => true
		],
		[
			"title" => "Standard Without Button - Template 6",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-13.png",
			"filter" => "standard-without-button",
			"demo" => 6,
			"free" => false
		],
		[
			"template_id" => 7,
			"title" => "Standard Without Button - Template 7",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-14.png",
			"filter" => "standard-without-button",
			"demo" => 7,
			"free" => true
		],
		[
			"template_id" => 8,
			"title" => "Image Poll - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-15.png",
			"filter" => "image-poll",
			"demo" => 1,
			"free" => true
		],
		[
			"title" => "Image Poll - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-16.png",
			"filter" => "image-poll",
			"demo" => 2,
			"free" => false
		],
		[
			"title" => "Image Poll - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-17.png",
			"filter" => "image-poll",
			"demo" => 3,
			"free" => false
		],
		[
			"template_id" => 9,
			"title" => "Image Poll - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-18.png",
			"filter" => "image-poll",
			"demo" => 4,
			"free" => true
		],
		[
			"template_id" => 10,
			"title" => "Image Poll - Template 5",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-19.png",
			"filter" => "image-poll",
			"demo" => 5,
			"free" => true
		],
		[
			"title" => "Image Poll - Template 6",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-20.png",
			"filter" => "image-poll",
			"demo" => 6,
			"free" => false
		],
		[
			"template_id" => 11,
			"title" => "Image Poll - Template 7",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-21.png",
			"filter" => "image-poll",
			"demo" => 7,
			"free" => true
		],
		[
			"title" => "Image Poll - Template 8",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-22.png",
			"filter" => "image-poll",
			"demo" => 8,
			"free" => false
		],
		[
			"template_id" => 12,
			"title" => "Video Poll - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-23.png",
			"filter" => "video-poll",
			"demo" => 1,
			"free" => true
		],
		[
			"title" => "Versus Poll - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-24.png",
			"filter" => "versus-poll",
			"demo" => 4,
			"free" => false
		],
		[
			"template_id" => 13,
			"title" => "Video Poll - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-25.png",
			"filter" => "video-poll",
			"demo" => 2,
			"free" => true
		],
		[
			"title" => "Video Poll - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-26.png",
			"filter" => "video-poll",
			"demo" => 3,
			"free" => false
		],
		[
			"title" => "Video Poll - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-27.png",
			"filter" => "video-poll",
			"demo" => 4,
			"free" => false
		],
		[
			"title" => "Video Poll - Template 5",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-28.png",
			"filter" => "video-poll",
			"demo" => 5,
			"free" => false
		],
		[
			"template_id" => 14,
			"title" => "Image Without Button - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-29.png",
			"filter" => "image-without-button",
			"demo" => 1,
			"free" => true
		],
		[
			"title" => "Image Without Button - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-30.png",
			"filter" => "image-without-button",
			"demo" => 2,
			"free" => false
		],
		[
			"title" => "Image Without Button - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-31.png",
			"filter" => "image-without-button",
			"demo" => 3,
			"free" => false
		],
		[
			"title" => "Image Without Button - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-32.png",
			"filter" => "image-without-button",
			"demo" => 4,
			"free" => false
		],
		[
			"template_id" => 15,
			"title" => "Image Without Button - Template 5",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-33.png",
			"filter" => "image-without-button",
			"demo" => 5,
			"free" => true
		],
		[
			"template_id" => 16,
			"title" => "Image Without Button - Template 6",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-34.png",
			"filter" => "image-without-button",
			"demo" => 6,
			"free" => true
		],
		[
			"title" => "Video Without Button - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-35.png",
			"filter" => "video-without-button",
			"demo" => 1,
			"free" => false
		],
		[
			"template_id" => 17,
			"title" => "Video Without Button - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-36.png",
			"filter" => "video-without-button",
			"demo" => 2,
			"free" => true
		],
		[
			"title" => "Video Without Button - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-37.png",
			"filter" => "video-without-button",
			"demo" => 3,
			"free" => false
		],
		[
			"template_id" => 18,
			"title" => "Image in Question - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-38.png",
			"filter" => "image-in-question",
			"demo" => 1,
			"free" => true
		],
		[
			"title" => "Image in Question - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-39.png",
			"filter" => "image-in-question",
			"demo" => 2,
			"free" => false
		],
		[
			"title" => "Image in Question - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-40.png",
			"filter" => "image-in-question",
			"demo" => 3,
			"free" => false
		],
		[
			"template_id" => 19,
			"title" => "Image in Question - Template 4",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-41.png",
			"filter" => "image-in-question",
			"demo" => 4,
			"free" => true
		],
		[
			"template_id" => 20,
			"title" => "Video in Question - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-42.png",
			"filter" => "video-in-question",
			"demo" => 1,
			"free" => true
		],
		[
			"title" => "Video in Question - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-43.png",
			"filter" => "video-in-question",
			"demo" => 2,
			"free" => false
		],
		[
			"title" => "Versus Poll - Template 1",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-44.png",
			"filter" => "versus-poll",
			"demo" => 1,
			"free" => false
		],
		[
			"title" => "Versus Poll - Template 2",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-45.png",
			"filter" => "versus-poll",
			"demo" => 2,
			"free" => false
		],
		[
			"title" => "Versus Poll - Template 3",
			"image" => "https://poll-wp.total-soft.com/templates/ts-poll-template-46.png",
			"filter" => "versus-poll",
			"demo" => 3,
			"free" => false
		]
	];
	$tsp_templates_menu = sprintf(
		'
		<div class="tsp-templates-menu-item tsp-active" data-filter="%2$s"  v-on:click.prevent="tsCategoryTemplates($event.currentTarget.dataset.filter)">
			<span class="tsp-templates-menu-item-text">
				%1$s
			</span>
		</div>
		',
		__('All',"ts-poll"),
		esc_attr( 'all' )
	);
	$tsp_templates = sprintf(
		'
		<div class="tsp-template tsp-template-build" v-on:click.prevent="tsChooseTheme">
			<div class="tsp-template-box">
				<div class="tsp-template-image-box">
					<div class="tsp-template-image-wrapper">
						<img class="tsp-template-image" src="%1$s" alt="%2$s" >
					</div>
				</div>
				<div class="tsp-template-title-box">
					<span class="tsp-template-title">%2$s</span>
				</div>
			</div>
		</div>
		',
		esc_url( TS_POLL_PLUGIN_DIR_URL . "admin/img/build.svg" ),
		__('Choose a theme', "ts-poll" )
	);
	$tsp_themes = "";
	foreach ( $this->tsp_themes as $key => $value ) {
		$tsp_templates_menu .= sprintf(
			'
			<div class="tsp-templates-menu-item" data-filter="%2$s" v-on:click.prevent="tsCategoryTemplates($event.currentTarget.dataset.filter)">
				<span class="tsp-templates-menu-item-text">
					%1$s
				</span>
			</div>
			',
			esc_html( $value["name"] ),
			str_replace('_', '-', $key)
		);
		$tsp_themes .= sprintf(
			'
			<div class="tsp-theme-list-item">
				<div class="tsp-theme-img-wrapper tsp-flex tsp-flex-column tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-c">
					<div class="tsp-theme-overlay tsp-flex tsp-flex-row tsp-flex-nowrap tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-c">
						<a href="%4$s" class="tsp-theme-btn tsp-theme-use tsp-flex tsp-flex-row tsp-flex-justify-sa tsp-flex-item-c tsp-flex-content-c">
							<span class="tsp-theme-use-span">
								%5$s
							</span>
						</a>
					</div>
					<img class="tsp-theme-img" src="%1$s" alt="%2$s">
				</div>
				<div class="tsp-theme-footer tsp-flex tsp-flex-row tsp-flex-nowrap tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-sb">
					<span class="tsp-theme-title">%2$s</span>
					<a href="%3$s" target="_blank" class="tsp-theme-icon-wrapper">
						<i class="ts-poll ts-poll-search"></i>
					</a>
				</div>
			</div>
			',
			esc_url( plugin_dir_url( __DIR__ ) . "/admin/img/tsp_$key.png" ),
			$value["free"] === false ? esc_html( $value["name"] ) . " (PREMIUM) " : esc_html( $value["name"] ),
			esc_url( 'https://poll-wp.total-soft.com/' . str_replace('_', '-', $key)),
			$value["free"] === false ? esc_url( 'https://poll-wp.total-soft.com/' . str_replace('_', '-', $key)) : esc_url( add_query_arg( 'tsp-theme', $key ) ),
			$value["free"] === false ? __("GO PREMIUM","ts-poll") : __("Use this theme","ts-poll")
		);
	}
	foreach ( $tsp_template_array as $key => $value ) {
		$tsp_templates .= sprintf(
			'
			<div class="tsp-template tsp-template-item" data-filter="%6$s" data-search="%1$s">
				<div class="tsp-template-box">
					<div class="tsp-template-image-box">
						<div class="tsp-template-image-wrapper">
							<img class="tsp-template-image" src="%4$s" alt="%1$s" >
						</div>
						<div class="tsp-template-image-overlay tsp-flex tsp-flex-row tsp-flex-justify-c tsp-flex-item-c tsp-flex-content-c">
							%2$s
							<a href="%5$s" target="_blank" class="tsp-template-btn tsp-template-preview tsp-flex tsp-flex-row tsp-flex-justify-sa tsp-flex-item-c tsp-flex-content-c">
								<span class="tsp-template-preview-span">
									%3$s
								</span>                            
							</a>
						</div>
					</div>
					<div class="tsp-template-title-box">
						<span class="tsp-template-title">%1$s</span>
					</div>
				</div>
			</div>
			',
			$value["free"] === true ? esc_html( $value["title"] ) : esc_html( $value["title"] ) . " (PREMIUM) ",
			$value["free"] === true ? sprintf(
				'
				<a href="%1$s" class="tsp-template-btn tsp-template-import tsp-flex tsp-flex-row tsp-flex-justify-sa tsp-flex-item-c tsp-flex-content-c">
					<span class="tsp-template-import-span">
						%2$s
					</span>
				</a>
				',
				add_query_arg( 'tsp-template-id', esc_attr( $value["template_id"] ), admin_url( 'admin.php?page=ts-poll-builder' ) ),
				__('Import', "ts-poll" )
			) : "",
			__('Preview', "ts-poll" ),
			esc_url( $value["image"] ),
			esc_url( 'https://poll-wp.total-soft.com/' . esc_html( $value["filter"] ) . "#demo-" . esc_html( $value["demo"] ) ),
			esc_attr( $value["filter"] )
		);
	}
	echo sprintf(
		'
		<div class="tsp_content active" data-tsp-section="theme" >
			<div class="tsp-container tsp-flex tsp-flex-column tsp-flex-nowrap tsp-flex-justify-fs">
				<main class="tsp-main tsp-active tsp-main-templates ">
					<header class="tsp-templates-header tsp-no-select tsp-flex tsp-flex-row tsp-flex-wrap tsp-flex-justify-sb tsp-flex-content-c tsp-flex-item-fs">
						<div class="tsp-templates-search ">
							<input id="tsp-search-input" name="tsp-search-input" class="tsp-input tsp-search-input" placeholder="%3$s" v-on:input="tsSearchTemplates">
						</div>
						<div class="tsp-templates-menu tsp-scrollbar tsp-flex tsp-flex-row tsp-flex-wrap tsp-flex-justify-fs tsp-flex-content-fs tsp-flex-item-c">
							%1$s
						</div>
					</header>
					<section id="tsp-templates-section" class="tsp-templates-section tsp-no-select tsp-scrollbar">
						<div  class="tsp-templates-wrapper">
							%2$s
						</div>
					</section>
				</main>
				<main class="tsp-main tsp-main-themes ">
					<header class="tsp-themes-header tsp-no-select tsp-flex tsp-flex-row tsp-flex-wrap tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-sb">
						<div class="tsp-back-btn   tsp-flex tsp-flex-row tsp-flex-wrap tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-sb" v-on:click.prevent="tsBackTemplates">
							<i class="ts-poll tsp-back-icon ts-poll-reply"></i>
							<span class="tsp-back-btn-text">%4$s</span>
						</div>
					</header>
					<section class="tsp-themes-section tsp-no-select tsp-scrollbar">
						<div class="tsp-theme-list tsp-flex tsp-flex-row tsp-flex-wrap tsp-flex-content-c tsp-flex-item-c tsp-flex-justify-sa">
							%5$s
						</div>
					</section>
				</main>
			</div>
		</div>	
		',
		$tsp_templates_menu,
		$tsp_templates,
		__( "Search for templates...","ts-poll" ),
		__( "Back to templates","ts-poll" ),
		$tsp_themes
	);
} else {
	global $wp_embed;
	$tsp_all_fonts_arr         = apply_filters("tsp_get_all_fonts","");
	$tsp_font_families         = array_combine( array_keys( $tsp_all_fonts_arr['tsp_font_families'] ), array_keys( $tsp_all_fonts_arr['tsp_font_families'] ) );
	$tsp_builder_arr           = array(
		esc_html__( 'General options', 'tspoll' )    => array(
			'ts_poll_mw'         => array(
				'label'        => esc_attr__( 'Main width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 20,
					'max' => 100
				),
				'change'       => '--tsp_section_w_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_pos'        => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'   => esc_attr__( 'Left', 'tspoll' ),
					'center' => esc_attr__( 'Center', 'tspoll' ),
					'right'  => esc_attr__( 'Right', 'tspoll' )
				),
				'change_elem' => '.ts_poll_form_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_bw'         => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 10
				),
				'change'       => '--tsp_section_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_bc'         => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_section_bc_' . $this->tsp_build_id
			),
			'ts_poll_br'         => array(
				'label'        => esc_attr__( 'Border radius', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 50
				),
				'change'       => '--tsp_section_br_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_boxsh_type' => array(
				'label'       => esc_attr__( 'Shadow type', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'none'  => esc_attr__( 'None', 'tspoll' ),
					'true'  => esc_attr__( 'Shadow', 'tspoll' ) . '1',
					'false' => esc_attr__( 'Shadow', 'tspoll' ) . '2',
					'sh03'  => esc_attr__( 'Shadow', 'tspoll' ) . '3',
					'sh04'  => esc_attr__( 'Shadow', 'tspoll' ) . '4',
					'sh05'  => esc_attr__( 'Shadow', 'tspoll' ) . '5',
					'sh06'  => esc_attr__( 'Shadow', 'tspoll' ) . '6',
					'sh07'  => esc_attr__( 'Shadow', 'tspoll' ) . '7',
					'sh08'  => esc_attr__( 'Shadow', 'tspoll' ) . '8',
					'sh09'  => esc_attr__( 'Shadow', 'tspoll' ) . '9',
					'sh10'  => esc_attr__( 'Shadow', 'tspoll' ) . '10',
					'sh11'  => esc_attr__( 'Shadow', 'tspoll' ) . '11'
				),
				'change_elem' => '.ts_poll_section_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-box'
			),
			'ts_poll_boxshc'     => array(
				'label'       => esc_attr__( 'Shadow color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_section_box_c_' . $this->tsp_build_id
			)
		),
		esc_html__( 'Header', 'tspoll' )             => array(
			'ts_poll_q_bgc' => array(
				'label'       => esc_attr__( 'Background color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_header_bgc_' . $this->tsp_build_id
			),
			'ts_poll_q_c'   => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_header_c_' . $this->tsp_build_id
			),
			'ts_poll_q_fs'  => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_header_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_q_ff'  => array(
				'label'       => esc_attr__( 'Font family', 'tspoll' ),
				'type'        => 'select',
				'options'     => $tsp_font_families,
				'change_attr' => '--tsp_header_ff_' . $this->tsp_build_id
			),
			'ts_poll_q_ta'  => array(
				'label'       => esc_attr__( 'Text align', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'   => esc_attr__( 'Left', 'tspoll' ),
					'center' => esc_attr__( 'Center', 'tspoll' ),
					'right'  => esc_attr__( 'Right', 'tspoll' )
				),
				'change_elem' => '.ts_poll_header_' . $this->tsp_build_id . ' ,.ts_poll_r_header_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-pos'
			)
		),
		esc_html__( 'Header line', 'tspoll' )        => array(
			'ts_poll_laq_w' => array(
				'label'        => esc_attr__( 'Width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 100
				),
				'change'       => '--tsp_header_l_w_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_laq_h' => array(
				'label'        => esc_attr__( 'Height', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_header_l_bh_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_laq_s' => array(
				'label'       => esc_attr__( 'Style', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'none'   => esc_attr__( 'None', 'tspoll' ),
					'solid'  => esc_attr__( 'Solid', 'tspoll' ),
					'dotted' => esc_attr__( 'Dotted', 'tspoll' ),
					'dashed' => esc_attr__( 'Dashed', 'tspoll' )
				),
				'change_attr' => '--tsp_header_l_bs_' . $this->tsp_build_id
			),
			'ts_poll_laq_c' => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_header_l_bc_' . $this->tsp_build_id
			)
		),
		esc_html__( 'Answer options', 'tspoll' )     => array(
			'ts_poll_a_ctf'      => array(
				'label'       => esc_attr__( 'Individual color', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => 'true',
					'no'  => 'false'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id . ',.ts_poll_r_section_' . $this->tsp_build_id . ',.ts_poll_r_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-bool'
			),
			'ts_poll_a_ca'       => array(
				'label'       => esc_attr__( 'Individual colors for', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'Nothing'    => esc_attr__( 'Nothing', 'tspoll' ),
					'Background' => esc_attr__( 'Background', 'tspoll' ),
					'Color'      => esc_attr__( 'Color', 'tspoll' )
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-color'
			),
			'ts_poll_a_mbgc'     => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_main_bgc_' . $this->tsp_build_id
			),
			'ts_poll_a_bgc'      => array(
				'label'       => esc_attr__( 'Answer background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_a_c'        => array(
				'label'       => esc_attr__( 'Answer color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_c_' . $this->tsp_build_id
			),
			'ts_poll_a_hbgc'     => array(
				'label'       => esc_attr__( 'Hover background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_h_bgc_' . $this->tsp_build_id
			),
			'ts_poll_a_hc'       => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_h_c_' . $this->tsp_build_id
			),
			'ts_poll_a_hsh_show' => array(
				'label'       => esc_attr__( 'Hover shadow', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => 'true',
					'no'  => 'false'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-hover'
			),
			'ts_poll_a_hshc'     => array(
				'label'       => esc_attr__( 'Shadow color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_h_bsh_' . $this->tsp_build_id
			),
			'ts_poll_a_fs'       => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_answer_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_boxsh'      => array(
				'label'       => esc_attr__( 'Font family', 'tspoll' ),
				'type'        => 'select',
				'options'     => $tsp_font_families,
				'change_attr' => '--tsp_answer_ff_' . $this->tsp_build_id
			),
			'ts_poll_a_cc'       => array(
				'label'       => esc_attr__( 'Column count', 'tspoll' ),
				'type'        => 'select',
				'options'     => array_combine( range( 1, 5 ), range( 1, 5 ) ),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-layout'
			),
			'ts_poll_a_bw'       => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 8
				),
				'change'       => '--tsp_answer_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_a_bc'       => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_answer_bc_' . $this->tsp_build_id
			),
			'ts_poll_a_br'       => array(
				'label'        => esc_attr__( 'Border radius', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 10
				),
				'change'       => '--tsp_answer_br_' . $this->tsp_build_id,
				'change_param' => 'px'
			)
		),
		esc_html__( 'Answer image', 'tspoll' )       => array(
			'ts_poll_a_iht' => array(
				'label'   => esc_attr__( 'Image height type', 'tspoll' ),
				'type'    => 'select',
				'options' => array(
					'fixed' => esc_attr__( 'Fixed', 'tspoll' ),
					'ratio' => esc_attr__( 'Ratio', 'tspoll' ),
				)
			),
			'ts_poll_a_ih'  => array(
				'label'        => esc_attr__( 'Image height', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 50,
					'max' => 500
				),
				'change'       => '--tsp_answer_pbottom_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_a_ihr' => array(
				'label'       => esc_attr__( 'Image ratio', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'1' => '1x1',
					'2' => '16x9',
					'3' => '9x16',
					'4' => '3x4',
					'5' => '4x3',
					'6' => '3x2',
					'7' => '2x3',
					'8' => '8x5',
					'9' => '5x8'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-ratio'
			),
			'ts_poll_i_h'   => array(
				'label'        => esc_attr__( 'Image width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 5,
					'max' => 50
				),
				'change'       => '--tsp_attachment_w_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_i_ra'  => array(
				'label'       => esc_attr__( 'Image ratio', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'1' => '1x1',
					'2' => '16x9',
					'3' => '9x16',
					'4' => '3x4',
					'5' => '4x3',
					'6' => '3x2',
					'7' => '2x3',
					'8' => '8x5',
					'9' => '5x8'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-ratio'
			),
			'ts_poll_i_oc'  => array(
				'label'       => esc_attr__( 'Hover Overlay', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_overlay_bgc_' . $this->tsp_build_id
			),
			'ts_poll_i_it'  => array(
				'label'       => esc_attr__( 'Hover icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => 'i.ts_poll_overlay_icon',
				'change_attr' => 'class'
			),
			'ts_poll_i_ic'  => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_overlay_c_' . $this->tsp_build_id
			),
			'ts_poll_i_is'  => array(
				'label'        => esc_attr__( 'Icon size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 72
				),
				'change'       => '--tsp_overlay_icon_s_' . $this->tsp_build_id,
				'change_param' => 'px'
			)
		),
		esc_html__( 'Checkbox options', 'tspoll' )   => array(
			'ts_poll_ch_cm'  => array(
				'label'       => esc_attr__( 'Check many', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => 'checkbox',
					'no'  => 'radio'
				),
				'change_elem' => '.ts_poll_answer_input',
				'change_attr' => 'type'
			),
			'ts_poll_ch_sh'  => array(
				'label'       => esc_attr__( 'Show checkbox', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => 'true',
					'no'  => 'false'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-checkbox'
			),
			'ts_poll_ch_s'   => array(
				'label'        => esc_attr__( 'Size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 18,
					'max' => 32
				),
				'change'       => '--tsp_checkbox_size_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_ch_tbc' => array(
				'label'       => esc_attr__( 'Unchecked icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '--tsp_before_check_' . $this->tsp_build_id,
				'change_attr' => 'root'
			),
			'ts_poll_ch_cbc' => array(
				'label'       => esc_attr__( 'Unchecked color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_before_check_c_' . $this->tsp_build_id
			),
			'ts_poll_ch_tac' => array(
				'label'       => esc_attr__( 'Checked Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '--tsp_after_check_' . $this->tsp_build_id,
				'change_attr' => 'root'
			),
			'ts_poll_ch_cac' => array(
				'label'       => esc_attr__( 'Checked color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_after_check_c_' . $this->tsp_build_id
			),
			'ts_poll_a_pos'  => array(
				'label'       => esc_attr__( 'Checkbox position', 'tspoll' ),
				'type'        => 'select-position-image',
				'options'     => array(
					'Position 1' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-top-with.svg' ),
					'Position 2' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-top-without.svg' ),
					'Position 3' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-bottom-with.svg' ),
					'Position 4' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-bottom-without.svg' ),
					'Position 5' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-left.svg' ),
					'Position 6' => esc_url( plugin_dir_url( __FILE__ ) . 'img/tsp-right.svg' )
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-position'
			)
		),
		esc_html__( 'Line after answers', 'tspoll' ) => array(
			'ts_poll_laa_w' => array(
				'label'        => esc_attr__( 'Width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 100
				),
				'change'       => '--tsp_main_l_bw_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_laa_h' => array(
				'label'        => esc_attr__( 'Height', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_main_l_bh_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_laa_s' => array(
				'label'       => esc_attr__( 'Style', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'none'   => esc_attr__( 'None', 'tspoll' ),
					'solid'  => esc_attr__( 'Solid', 'tspoll' ),
					'dotted' => esc_attr__( 'Dotted', 'tspoll' ),
					'dashed' => esc_attr__( 'Dashed', 'tspoll' )
				),
				'change_attr' => '--tsp_main_l_bs_' . $this->tsp_build_id
			),
			'ts_poll_laa_c' => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_main_l_bc_' . $this->tsp_build_id
			)
		),
		esc_html__( 'Total votes', 'tspoll' )        => array(
			'ts_poll_tv_show' => array(
				'label'       => esc_attr__( 'Show button', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => '',
					'no'  => 'display:none;'
				),
				'change_elem' => '.ts_poll_total_v',
				'change_attr' => 'style'
			),
			'ts_poll_tv_pos'  => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'   => esc_attr__( 'Left', 'tspoll' ),
					'right'  => esc_attr__( 'Right', 'tspoll' ),
					'full' => esc_attr__( 'Full', 'tspoll' )
				),
				'change_elem' => '.ts_poll_total_v',
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_tv_c'    => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_total_c_' . $this->tsp_build_id
			),
			'ts_poll_tv_fs'   => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_total_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_tv_text' => array(
				'label'       => esc_attr__( 'Text', 'tspoll' ),
				'type'        => 'text',
				'change_elem' => '.ts_poll_total_v,.ts_poll_total_v > span',
				'change_attr' => 'data-tsp-text'
			),
			'ts_poll_vt_it'   => array(
				'label'       => esc_attr__( 'Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.ts_poll_total_v',
				'change_attr' => 'class'
			),
			'ts_poll_vt_ia'   => array(
				'label'       => esc_attr__( 'Icon position', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'after'  => esc_attr__( 'After text', 'tspoll' ),
					'before' => esc_attr__( 'Before text', 'tspoll' )
				),
				'change_elem' => '.ts_poll_total_v',
				'change_attr' => 'data-tsp-align'
			)
		),
		esc_html__( 'Vote button', 'tspoll' )        => array(
			'ts_poll_vb_show' => array(
				'label'       => esc_attr__( 'Show button', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => '',
					'no'  => 'display:none;'
				),
				'change_elem' => '.ts_poll_vote_button',
				'change_attr' => 'style'
			),
			'ts_poll_vb_mbgc' => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_footer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_vb_pos'  => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'  => esc_attr__( 'Left', 'tspoll' ),
					'right' => esc_attr__( 'Right', 'tspoll' ),
					'full'  => esc_attr__( 'Full Width', 'tspoll' )
				),
				'change_elem' => '.ts_poll_vote_button',
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_vb_bw'   => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_vote_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_vb_bc'   => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_vote_bc_' . $this->tsp_build_id
			),
			'ts_poll_vb_br'   => array(
				'label'        => esc_attr__( 'Border radius', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 30
				),
				'change'       => '--tsp_vote_br_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_vb_bgc'  => array(
				'label'       => esc_attr__( 'Background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_vote_bgc_' . $this->tsp_build_id
			),
			'ts_poll_vb_c'    => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_vote_c_' . $this->tsp_build_id
			),
			'ts_poll_vb_hbgc' => array(
				'label'       => esc_attr__( 'Hover background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_vote_h_bgc_' . $this->tsp_build_id
			),
			'ts_poll_vb_hc'   => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_vote_h_c_' . $this->tsp_build_id
			),
			'ts_poll_vb_fs'   => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_vote_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_vb_ff'   => array(
				'label'       => esc_attr__( 'Font family', 'tspoll' ),
				'type'        => 'select',
				'options'     => $tsp_font_families,
				'change_attr' => '--tsp_vote_ff_' . $this->tsp_build_id
			),
			'ts_poll_vb_text' => array(
				'label'       => esc_attr__( 'Text', 'tspoll' ),
				'type'        => 'text',
				'change_elem' => '.ts_poll_vote_button,.ts_poll_vote_icon > span',
				'change_attr' => 'data-tsp-text'
			),
			'ts_poll_vb_it'   => array(
				'label'       => esc_attr__( 'Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.ts_poll_vote_icon',
				'change_attr' => 'class'
			),
			'ts_poll_vb_ia'   => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'after'  => esc_attr__( 'After text', 'tspoll' ),
					'before' => esc_attr__( 'Before text', 'tspoll' )
				),
				'change_elem' => '.ts_poll_vote_icon',
				'change_attr' => 'data-tsp'
			),
			'ts_poll_vb_is'   => array(
				'label'        => esc_attr__( 'Icon size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_vote_icon_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			)
		),
		esc_html__( 'Result button', 'tspoll' )      => array(
			'ts_poll_rb_show' => array(
				'label'       => esc_attr__( 'Show button', 'tspoll' ),
				'type'        => 'input-toggle',
				'options'     => array(
					'yes' => '',
					'no'  => 'display:none;'
				),
				'change_elem' => '.ts_poll_back_button,.ts_poll_result_button,.ts_poll_r_footer_' . $this->tsp_build_id,
				'change_attr' => 'style'
			),
			'ts_poll_rb_mbgc' => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_footer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_rb_pos'  => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'  => esc_attr__( 'Left', 'tspoll' ),
					'right' => esc_attr__( 'Right', 'tspoll' ),
					'full'  => esc_attr__( 'Full Width', 'tspoll' )
				),
				'change_elem' => '.ts_poll_result_button',
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_rb_bw'   => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_result_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_rb_bc'   => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_result_bc_' . $this->tsp_build_id
			),
			'ts_poll_rb_br'   => array(
				'label'        => esc_attr__( 'Border Radius', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 30
				),
				'change'       => '--tsp_result_br_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_rb_bgc'  => array(
				'label'       => esc_attr__( 'Background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_result_bgc_' . $this->tsp_build_id
			),
			'ts_poll_rb_c'    => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_result_c_' . $this->tsp_build_id
			),
			'ts_poll_rb_hbgc' => array(
				'label'       => esc_attr__( 'Hover background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_result_h_bgc_' . $this->tsp_build_id
			),
			'ts_poll_rb_hc'   => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_result_h_c_' . $this->tsp_build_id
			),
			'ts_poll_rb_fs'   => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_result_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_rb_ff'   => array(
				'label'       => esc_attr__( 'Font family', 'tspoll' ),
				'type'        => 'select',
				'options'     => $tsp_font_families,
				'change_attr' => '--tsp_result_ff_' . $this->tsp_build_id
			),
			'ts_poll_rb_text' => array(
				'label'       => esc_attr__( 'Text', 'tspoll' ),
				'type'        => 'text',
				'change_elem' => '.ts_poll_result_button,.ts_poll_result_icon > span',
				'change_attr' => 'data-tsp-text'
			),
			'ts_poll_rb_it'   => array(
				'label'       => esc_attr__( 'Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.ts_poll_result_icon',
				'change_attr' => 'class'
			),
			'ts_poll_rb_ia'   => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'after'  => esc_attr__( 'After text', 'tspoll' ),
					'before' => esc_attr__( 'Before text', 'tspoll' )
				),
				'change_elem' => '.ts_poll_result_icon',
				'change_attr' => 'data-tsp'
			),
			'ts_poll_rb_is'   => array(
				'label'        => esc_attr__( 'Icon size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_result_icon_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			)
		),
		esc_html__( 'Back button', 'tspoll' )        => array(
			'ts_poll_p_bb_mbgc' => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_footer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_pos'  => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'  => esc_attr__( 'Left', 'tspoll' ),
					'right' => esc_attr__( 'Right', 'tspoll' ),
					'full'  => esc_attr__( 'Full Width', 'tspoll' )
				),
				'change_elem' => '.ts_poll_back_button',
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_p_bb_bc'   => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_bc_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_bgc'  => array(
				'label'       => esc_attr__( 'Background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_c'    => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_c_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_hbgc' => array(
				'label'       => esc_attr__( 'Hover background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_h_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_hc'   => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_h_c_' . $this->tsp_build_id
			),
			'ts_poll_p_bb_text' => array(
				'label'       => esc_attr__( 'Text', 'tspoll' ),
				'type'        => 'text',
				'change_elem' => '.ts_poll_back_button,.ts_poll_back_icon > span',
				'change_attr' => 'data-tsp-text'
			),
			'ts_poll_p_bb_it'   => array(
				'label'       => esc_attr__( 'Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.ts_poll_back_icon',
				'change_attr' => 'class'
			),
			'ts_poll_p_bb_ia'   => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'after'  => esc_attr__( 'After text', 'tspoll' ),
					'before' => esc_attr__( 'Before text', 'tspoll' )
				),
				'change_elem' => '.ts_poll_back_icon',
				'change_attr' => 'data-tsp'
			),
			'ts_poll_bb_mbgc'   => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_footer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_bb_pos'    => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select-position',
				'options'     => array(
					'left'  => esc_attr__( 'Left', 'tspoll' ),
					'right' => esc_attr__( 'Right', 'tspoll' ),
					'full'  => esc_attr__( 'Full Width', 'tspoll' )
				),
				'change_elem' => '.ts_poll_back_button',
				'change_attr' => 'data-tsp-pos'
			),
			'ts_poll_bb_bc'     => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_bc_' . $this->tsp_build_id
			),
			'ts_poll_bb_bgc'    => array(
				'label'       => esc_attr__( 'Background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_bgc_' . $this->tsp_build_id
			),
			'ts_poll_bb_c'      => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_c_' . $this->tsp_build_id
			),
			'ts_poll_bb_hbgc'   => array(
				'label'       => esc_attr__( 'Hover background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_h_bgc_' . $this->tsp_build_id
			),
			'ts_poll_bb_hc'     => array(
				'label'       => esc_attr__( 'Hover color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_back_h_c_' . $this->tsp_build_id
			),
			'ts_poll_bb_text'   => array(
				'label'       => esc_attr__( 'Text', 'tspoll' ),
				'type'        => 'text',
				'change_elem' => '.ts_poll_back_button,.ts_poll_back_icon > span',
				'change_attr' => 'data-tsp-text'
			),
			'ts_poll_bb_it'     => array(
				'label'       => esc_attr__( 'Icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.ts_poll_back_icon',
				'change_attr' => 'class'
			),
			'ts_poll_bb_ia'     => array(
				'label'       => esc_attr__( 'Position', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'after'  => esc_attr__( 'After text', 'tspoll' ),
					'before' => esc_attr__( 'Before text', 'tspoll' )
				),
				'change_elem' => '.ts_poll_back_icon',
				'change_attr' => 'data-tsp'
			)
		),
		esc_html__( 'Result header', 'tspoll' )      => array(
			'ts_poll_p_q_bgc' => array(
				'label'       => esc_attr__( 'Background color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_header_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_q_c'   => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_header_c_' . $this->tsp_build_id
			),
			'ts_poll_p_laq_w' => array(
				'label'        => esc_attr__( 'Line width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 100
				),
				'change'       => '--tsp_r_header_l_w_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_p_laq_h' => array(
				'label'        => esc_attr__( 'Line height', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_r_header_l_bh_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_p_laq_s' => array(
				'label'       => esc_attr__( 'Line style', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'none'   => esc_attr__( 'None', 'tspoll' ),
					'solid'  => esc_attr__( 'Solid', 'tspoll' ),
					'dotted' => esc_attr__( 'Dotted', 'tspoll' ),
					'dashed' => esc_attr__( 'Dashed', 'tspoll' )
				),
				'change_attr' => '--tsp_r_header_l_bs_' . $this->tsp_build_id
			),
			'ts_poll_p_laq_c' => array(
				'label'       => esc_attr__( 'Line color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_header_l_bc_' . $this->tsp_build_id
			)
		),
		esc_html__( 'Popup option', 'tspoll' )       => array(
			'ts_poll_pop_show' => array(
				'label'   => esc_attr__( 'Show popup', 'tspoll' ),
				'type'    => 'input-toggle',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No'
				),
			),
			'ts_poll_pop_it'   => array(
				'label'       => esc_attr__( 'Close icon', 'tspoll' ),
				'type'        => 'select-icon',
				'change_elem' => '.tsp_popup_close_icon_' . $this->tsp_build_id,
				'change_attr' => 'class'
			),
			'ts_poll_pop_ic'   => array(
				'label'       => esc_attr__( 'Icon color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_popup_close_c_' . $this->tsp_build_id
			),
			'ts_poll_pop_bw'   => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 10
				),
				'change'       => '--tsp_popup_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_pop_bc'   => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_popup_bc_' . $this->tsp_build_id
			),
			'ts_poll_p_bw'     => array(
				'label'        => esc_attr__( 'Border width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 10
				),
				'change'       => '--tsp_r_section_bw_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_p_bc'     => array(
				'label'       => esc_attr__( 'Border color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_section_bc_' . $this->tsp_build_id
			),
			'ts_poll_p_shpop'  => array(
				'label'   => esc_attr__( 'Show in popup', 'tspoll' ),
				'type'    => 'input-toggle',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No'
				)
			),
			'ts_poll_p_sheff'  => array(
				'label'       => esc_attr__( 'Show effect', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'FTTB' => esc_attr__( 'From Top to Bottom', 'tspoll' ),
					'FLTR' => esc_attr__( 'From Left to Right', 'tspoll' ),
					'FRTL' => esc_attr__( 'From Right to Left', 'tspoll' ),
					'FCTA' => esc_attr__( 'From Center to Full', 'tspoll' ),
					'FTL'  => esc_attr__( 'Rotate Y', 'tspoll' ),
					'FTR'  => esc_attr__( 'Rotate X', 'tspoll' ),
					'FBL'  => esc_attr__( 'Rotate', 'tspoll' ),
					'FBR'  => esc_attr__( 'Skew X', 'tspoll' ),
					'FBTT' => esc_attr__( 'Skew Y', 'tspoll' )
				),
				'change_elem' => '#ts_poll_modal_result_section_' . $this->tsp_build_id . ',.ts_poll_r_section_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-effect'
			)
		),
		esc_html__( 'After vote', 'tspoll' )         => array(
			'ts_poll_p_a_mbgc' => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_main_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_a_bgc'  => array(
				'label'       => esc_attr__( 'Answer background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_answer_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_a_oc'   => array(
				'label'       => esc_attr__( 'Background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_overlay_bgc_' . $this->tsp_build_id
			),
			'ts_poll_p_a_c'    => array(
				'label'       => esc_attr__( 'Answer color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_overlay_c_' . $this->tsp_build_id
			),
			'ts_poll_p_a_vc'   => array(
				'label'       => esc_attr__( 'Vote color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_answer_vc_' . $this->tsp_build_id
			),
			'ts_poll_p_a_vt'   => array(
				'label'       => esc_attr__( 'Vote type', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'percent'    => esc_attr__( 'Percent', 'tspoll' ),
					'percentlab' => esc_attr__( 'Label + Percent', 'tspoll' ),
					'count'      => esc_attr__( 'Votes Count', 'tspoll' ),
					'countlab'   => esc_attr__( 'Label + Votes Count', 'tspoll' ),
					'both'       => esc_attr__( 'Both', 'tspoll' ),
					'bothlab'    => esc_attr__( 'Label + Both', 'tspoll' )
				),
				'change_elem' => '.ts_poll_answer_info_line',
				'change_attr' => 'data-tsp-vt'
			),
			'ts_poll_p_a_veff' => array(
				'label'       => esc_attr__( 'Vote effect', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'0' => esc_attr__( 'None', 'tspoll' ),
					'1' => esc_attr__( 'Effect', 'tspoll' ) . '1',
					'2' => esc_attr__( 'Effect', 'tspoll' ) . '2',
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-effect'
			),
			'ts_poll_p_laa_w'  => array(
				'label'        => esc_attr__( 'Line width', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 100
				),
				'change'       => '--tsp_r_main_l_w_' . $this->tsp_build_id,
				'change_param' => '%'
			),
			'ts_poll_p_laa_h'  => array(
				'label'        => esc_attr__( 'Line height', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 0,
					'max' => 5
				),
				'change'       => '--tsp_r_main_l_h_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'ts_poll_p_laa_s'  => array(
				'label'       => esc_attr__( 'Line style', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'none'   => esc_attr__( 'None', 'tspoll' ),
					'solid'  => esc_attr__( 'Solid', 'tspoll' ),
					'dotted' => esc_attr__( 'Dotted', 'tspoll' ),
					'dashed' => esc_attr__( 'Dashed', 'tspoll' )
				),
				'change_attr' => '--tsp_r_main_l_bs_' . $this->tsp_build_id
			),
			'ts_poll_p_laa_c'  => array(
				'label'       => esc_attr__( 'Line color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_r_main_l_bc_' . $this->tsp_build_id
			),
			'ts_poll_v_ca'     => array(
				'label'       => esc_attr__( 'Individual colors for', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'Nothing'    => esc_attr__( 'Nothing', 'tspoll' ),
					'Background' => esc_attr__( 'Background', 'tspoll' ),
					'Color'      => esc_attr__( 'Color', 'tspoll' )
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-voted'
			),
			'ts_poll_v_mbgc'   => array(
				'label'       => esc_attr__( 'Main background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_block_bgc_' . $this->tsp_build_id
			),
			'ts_poll_v_bgc'    => array(
				'label'       => esc_attr__( 'Answer background', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_progress_bgc_' . $this->tsp_build_id
			),
			'ts_poll_v_c'      => array(
				'label'       => esc_attr__( 'Answer color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_progress_c_' . $this->tsp_build_id
			),
			'ts_poll_v_t'      => array(
				'label'   => esc_attr__( 'Result show type', 'tspoll' ),
				'type'    => 'select',
				'options' => array(
					'percent'    => esc_attr__( 'Percent', 'tspoll' ),
					'percentlab' => esc_attr__( 'Label + Percent', 'tspoll' ),
					'count'      => esc_attr__( 'Votes Count', 'tspoll' ),
					'countlab'   => esc_attr__( 'Label + Votes Count', 'tspoll' ),
					'both'       => esc_attr__( 'Both', 'tspoll' ),
					'bothlab'    => esc_attr__( 'Label + Both', 'tspoll' )
				)
			),
			'ts_poll_v_eff'    => array(
				'label'       => esc_attr__( 'Vote effect', 'tspoll' ),
				'type'        => 'select',
				'options'     => array(
					'0' => esc_attr__( 'None', 'tspoll' ),
					'1' => esc_attr__( 'Effect', 'tspoll' ) . '1',
					'2' => esc_attr__( 'Effect', 'tspoll' ) . '2',
					'3' => esc_attr__( 'Effect', 'tspoll' ) . '3',
					'4' => esc_attr__( 'Effect', 'tspoll' ) . '4',
					'5' => esc_attr__( 'Effect', 'tspoll' ) . '5',
					'6' => esc_attr__( 'Effect', 'tspoll' ) . '6',
					'7' => esc_attr__( 'Effect', 'tspoll' ) . '7',
					'8' => esc_attr__( 'Effect', 'tspoll' ) . '8',
					'9' => esc_attr__( 'Effect', 'tspoll' ) . '9'
				),
				'change_elem' => '.ts_poll_main_' . $this->tsp_build_id,
				'change_attr' => 'data-tsp-veff'
			)
		)
	);
	$tsp_builder_setting_arr   = array(
		esc_html__( 'Upcoming poll options', 'tspoll' ) => array(
			'TotalSoft_Poll_Set_02' => array(
				'label' => esc_attr__( 'Start date', 'tspoll' ),
				'type'  => 'date'
			),
			'TotalSoft_Poll_Set_04' => array(
				'label' => esc_attr__( 'Text', 'tspoll' ),
				'type'  => 'text'
			),
			'TotalSoft_Poll_Set_06' => array(
				'label'       => esc_attr__( 'Overlay color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_coming_bgc_' . $this->tsp_build_id
			),
			'TotalSoft_Poll_Set_07' => array(
				'label'       => esc_attr__( 'Color', 'tspoll' ),
				'type'        => 'color',
				'change_prop' => '--tsp_coming_c_' . $this->tsp_build_id
			),
			'TotalSoft_Poll_Set_08' => array(
				'label'        => esc_attr__( 'Font size', 'tspoll' ),
				'type'         => 'range',
				'options'      => array(
					'min' => 8,
					'max' => 48
				),
				'change'       => '--tsp_coming_fs_' . $this->tsp_build_id,
				'change_param' => 'px'
			),
			'TotalSoft_Poll_Set_09' => array(
				'label'       => esc_attr__( 'Font family', 'tspoll' ),
				'type'        => 'select',
				'options'     => $tsp_font_families,
				'change_attr' => '--tsp_coming_ff_' . $this->tsp_build_id
			)
		),
		esc_html__( 'End poll options', 'tspoll' )      => array(
			'TotalSoft_Poll_Set_03' => array(
				'label' => esc_attr__( 'End date', 'tspoll' ),
				'type'  => 'date'
			)
		),
		esc_html__( 'Result options', 'tspoll' )        => array(
			'TotalSoft_Poll_Set_01' => array(
				'label'   => esc_attr__( 'Show results', 'tspoll' ),
				'type'    => 'input-toggle',
				'options' => array(
					'yes' => '',
					'no'  => ''
				)
			),
			'TotalSoft_Poll_Set_05' => array(
				'label' => esc_attr__( 'Text for no result', 'tspoll' ),
				'type'  => 'text'
			)
		)
	);
	$tsp_builder_styles_base   = $this->tsp_build_proporties['Question_Style'];
	$tsp_builder_settings_base =  $this->tsp_build_proporties['Question_Settings'];
	$tsp_builder_param_base    =  $this->tsp_build_proporties['Question_Param'];
	switch ( $tsp_builder_param_base['TS_Poll_Q_Theme'] ) {
		case 'Standart Poll':
		case 'Standard Poll':
			$tsp_builder_arr[ esc_html__( 'After vote', 'tspoll' ) ]['ts_poll_p_a_vt']['options']       = array(
				'percent' => esc_attr__( 'Percent', 'tspoll' ),
				'count'   => esc_attr__( 'Votes Count', 'tspoll' ),
				'both'    => esc_attr__( 'Both', 'tspoll' )
			);
			$tsp_builder_arr[ esc_html__( 'After vote', 'tspoll' ) ]['ts_poll_p_a_veff']['options']     = array(
				'1' => esc_attr__( 'Effect', 'tspoll' ) . '1',
				'2' => esc_attr__( 'Effect', 'tspoll' ) . '2',
				'3' => esc_attr__( 'Effect', 'tspoll' ) . '3',
				'4' => esc_attr__( 'Effect', 'tspoll' ) . '4',
				'5' => esc_attr__( 'Effect', 'tspoll' ) . '5',
				'6' => esc_attr__( 'Effect', 'tspoll' ) . '6',
				'7' => esc_attr__( 'Effect', 'tspoll' ) . '7',
				'8' => esc_attr__( 'Effect', 'tspoll' ) . '8',
				'9' => esc_attr__( 'Effect', 'tspoll' ) . '9'
			);
			$tsp_builder_arr[ esc_html__( 'After vote', 'tspoll' ) ]['ts_poll_p_a_veff']['change_elem'] = '.ts_poll_r_main_' . $this->tsp_build_id;
			$tsp_builder_arr[ esc_html__( 'After vote', 'tspoll' ) ]['ts_poll_p_a_veff']['change_attr'] = 'data-tsp-veff';
			$tsp_builder_arr[ esc_html__( 'After vote', 'tspoll' ) ]['ts_poll_p_a_c']['change_prop']    = '--tsp_r_answer_pc_' . $this->tsp_build_id;
			break;
		case 'Image Poll':
		case 'Video Poll':
			if ( in_array( $tsp_builder_styles_base['ts_poll_a_ih'], range( 1, 9 ) ) ) {
				$tsp_builder_styles_base['ts_poll_a_iht'] = 'ratio';
				$tsp_builder_styles_base['ts_poll_a_ihr'] = $tsp_builder_styles_base['ts_poll_a_ih'];
				$tsp_builder_styles_base['ts_poll_a_ih']  = '160';
			} elseif ( in_array( $tsp_builder_styles_base['ts_poll_a_ih'], range( 50, 500 ) ) ) {
				$tsp_builder_styles_base['ts_poll_a_iht'] = 'fixed';
				$tsp_builder_styles_base['ts_poll_a_ihr'] = '1';
			}
			if ( $tsp_builder_param_base['TS_Poll_Q_Theme'] == 'Video Poll' ) {
				$tsp_builder_arr[ esc_html__( 'Video play', 'tspoll' ) ] = array(
					'ts_poll_play_iovc' => array(
						'label'       => esc_attr__( 'Background color', 'tspoll' ),
						'type'        => 'color',
						'change_prop' => '--tsp_video_bgc_' . $this->tsp_build_id
					),
					'ts_poll_play_ic'   => array(
						'label'       => esc_attr__( 'Color', 'tspoll' ),
						'type'        => 'color',
						'change_prop' => '--tsp_video_c_' . $this->tsp_build_id
					),
					'ts_poll_play_is'   => array(
						'label'        => esc_attr__( 'Icon size', 'tspoll' ),
						'type'         => 'range',
						'options'      => array(
							'min' => 8,
							'max' => 150
						),
						'change'       => '--tsp_video_fs_' . $this->tsp_build_id,
						'change_param' => 'px'
					),
					'ts_poll_play_it'   => array(
						'label'       => esc_attr__( 'Icon', 'tspoll' ),
						'type'        => 'select-icon',
						'change_elem' => '.ts_poll_video_play_ic',
						'change_attr' => 'class'
					)
				);
			}
			break;
		case 'Image in Question':
			unset( $tsp_builder_arr[ esc_html__( 'Answer image', 'tspoll' ) ] );
			$key             = esc_html__( 'Header', 'tspoll' );
			$keys            = array_keys( $tsp_builder_arr );
			$index           = array_search( $key, $keys );
			$pos             = false === $index ? count( $tsp_builder_arr ) : $index + 1;
			$tsp_builder_arr = array_merge( array_slice( $tsp_builder_arr, 0, $pos ), array( esc_html__( 'Header image', 'tspoll' ) => array() ), array_slice( $tsp_builder_arr, $pos ) );
			$tsp_builder_arr[ esc_html__( 'Header image', 'tspoll' ) ] = array(
				'ts_poll_i_h'        => array(
					'label'        => esc_attr__( 'Image width', 'tspoll' ),
					'type'         => 'range',
					'options'      => array(
						'min' => 10,
						'max' => 90
					),
					'change'       => '--tsp_attachment_w_' . $this->tsp_build_id,
					'change_param' => '%'
				),
				'ts_poll_i_ra'       => array(
					'label'       => esc_attr__( 'Image ratio', 'tspoll' ),
					'type'        => 'select-position',
					'options'     => array(
						'1' => '1x1',
						'2' => '16x9',
						'3' => '9x16',
						'4' => '3x4',
						'5' => '4x3',
						'6' => '3x2',
						'7' => '2x3',
						'8' => '8x5',
						'9' => '5x8'
					),
					'change_elem' => '.ts_poll_img_div_' . $this->tsp_build_id,
					'change_attr' => 'data-tsp-ratio'
				),
				'TotalSoftPoll_Q_Im' => array(
					'label' => esc_attr__( 'Question image', 'tspoll' ),
					'type'  => 'wp_media_image'
				)
			);
			unset( $tsp_builder_arr[ esc_html__( 'Answer image', 'tspoll' ) ]['ts_poll_i_h'] );
			unset( $tsp_builder_arr[ esc_html__( 'Answer image', 'tspoll' ) ]['ts_poll_i_ra'] );
			break;
		case 'Video in Question':
			unset( $tsp_builder_arr[ esc_html__( 'Answer image', 'tspoll' ) ] );
			$key             = esc_html__( 'Header', 'tspoll' );
			$keys            = array_keys( $tsp_builder_arr );
			$index           = array_search( $key, $keys );
			$pos             = false === $index ? count( $tsp_builder_arr ) : $index + 1;
			$tsp_builder_arr = array_merge( array_slice( $tsp_builder_arr, 0, $pos ), array( esc_html__( 'Header video', 'tspoll' ) => array() ), array_slice( $tsp_builder_arr, $pos ) );
			$tsp_builder_arr[ esc_html__( 'Header video', 'tspoll' ) ] = array(
				'ts_poll_v_w'        => array(
					'label'        => esc_attr__( 'Video width', 'tspoll' ),
					'type'         => 'range',
					'options'      => array(
						'min' => 0,
						'max' => 100
					),
					'change'       => '--tsp_video_w_' . $this->tsp_build_id,
					'change_param' => '%'
				),
				'TotalSoftPoll_Q_Vd' => array(
					'label' => esc_attr__( 'Question video', 'tspoll' ),
					'type'  => 'wp_media_video'
				)
			);
			break;
	} ?>
	<div class="tsp_content tsp_flex_row active" data-tsp-section="field_style">
		<div class="tsp_preview_content">
			<?php
				echo do_shortcode( sprintf( '[TS_Poll id="%1$s" edit="true"]', esc_attr( $this->tsp_build_id ) ) );
				$t_s_poll_builder_params = $this->tsp_build_proporties;
			?>
		</div>
		<div class="tsp_flex_col tsp_content_subsection active" data-tsp-subsection="field">
			<main class="tsp_content_fields_menu">
				<div aria-tsp-use="field" class="tsp_flex_col active">
					<div class="tsp-list tsp_flex_col" id="tsp-list" >
						<div class="tsp-list-item" v-for="row in tsp_answers" v-bind:aria-tsp-answer="row.id" v-bind:aria-tsp-count="row.Answer_Votes" v-bind:aria-tsp-percent="row.tsp_result_percent">
							<div class="tsp_handle_list tsp_list_action flex-center">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/move.svg' ); ?>">
							</div>
							<div class="details tsp_analytics_flex_r">
								<h2>{{row.Answer_Title}}</h2>
							</div>
							<div class="tsp_list_action flex-center" data-tsp-action="edit" v-on:click="editTspAnswer(row.id)">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/edit.svg' ); ?>">
							</div>
							<div class="tsp_list_action flex-center" data-tsp-action="copy" v-on:click="copyTspAnswer(row.id)">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/copy.svg' ); ?>">
							</div>
							<div class="tsp_list_action flex-center" data-tsp-action="delete" v-on:click="deleteTspAnswer(row.id)">
								<img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . 'img/recycle.svg' ); ?>">
							</div>
						</div>
					</div>
					<div class="tsp-add_answer-div tsp_flex_row">
					<div id="tsp-add_answer" v-on:click="tspAddNewAnswer">
						<span class="tsp-add_answer_text"><span></span><?php esc_html_e( 'Add answer', 'tspoll' ); ?></span>
						<span class="right ts-poll ts-poll-plus"></span>
					</div>
					</div>
				</div>
			</main>
			<main class="tsp_content_fields_edit " style="display:none;" >
				<div class="tsp_back_to_answers tsp_flex_row ts-poll ts-poll-home" v-on:click="tspBackToAnswers">
					<?php esc_html_e( 'Back to answers', 'tspoll' ); ?>
				</div>
				<div class="tsp_answer_params">
					<div class="tsp_select_div_edit">
						<span class="tsp_select_div_title tsp_field_title">
							<?php esc_html_e( 'Answer title', 'tspoll' ); ?>
						</span>
						<input id="tsp_answer_title" name="tsp_answer_title" type="text"  value="" placeholder="<?php esc_html_e( 'Answer title', 'tspoll' ); ?>" v-on:input="tspAnswerTitleInput($event.currentTarget.value)"  maxlength="255"  />
					</div>
					<div class="tsp_color_div_edit">
						<label class="tsp_color_label" for="tsp_answer_color"><?php esc_html_e( 'Special color', 'tspoll' ); ?></label>
						<tsp-spectrum-picker ref="tspAnswerColor"  @update-color="updateColor" color-id="tsp_answer_color" change-variable="tsp_answer_color" color-value="#ffffff" /></tsp-spectrum-picker>
					</div>
					<?php
						switch ( $tsp_builder_param_base['TS_Poll_Q_Theme'] ) {
							case 'Video Poll':
							case 'Video Without Button':
								echo sprintf(
									'
									<div class="tsp_video_div_edit">
										<span class="tsp_field_title">%1$s</span>
										<tsp-video-picker ref="tspAnswerVideo" video-src="" video-load="%2$s" /></tsp-video-picker>
									</div>
									<div class="tsp_img_div_edit">
										<span class="tsp_field_title">%5$s</span>
										<tsp-image-picker ref="tspAnswerImage"  img-src="%6$s" img-id="" img-load="%2$s" /></tsp-image-picker>
									</div>
									',
									esc_attr__( 'Answer video', 'tspoll' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_video.png' ),
									esc_html__( 'Choose video', 'tspoll' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' ),
									esc_attr__( 'Answer image', 'tspoll' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_img.jpg' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' )
								);
								break;
							case 'Image Poll':
							case 'Image Without Button':
								echo sprintf(
									'
									<div class="tsp_img_div_edit">
										<span class="tsp_field_title">%1$s</span>
										<tsp-image-picker ref="tspAnswerImage"   img-src="%2$s" img-id="" img-load="%3$s" /></tsp-image-picker>
									</div>
									',
									esc_html__( 'Answer image', 'tspoll' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_no_img.jpg' ),
									esc_url( plugin_dir_url( __DIR__ ) . 'public/img/tsp_loading.gif' )
								);
								break;
						}
					?>
				</div>
			</main>
		</div>
		<div class="tsp_flex_col  tsp_content_subsection" data-tsp-subsection="style">
			<div class="tsp_styles_sidebar">
				<?php
					$tsp_builder_styles_base_keys  = array_keys( $tsp_builder_styles_base );
					$tsp_builder_styles_base_count = count( $tsp_builder_styles_base_keys );
					foreach ( $tsp_builder_arr as $fields_key => $fields_value ) {
						if ( count( array_diff( $tsp_builder_styles_base_keys, array_keys( $tsp_builder_arr[ $fields_key ] ) ) ) == $tsp_builder_styles_base_count ) {
							continue;
						}
						$tsp_styles_sidebar_get_fields = "";
						foreach ( $fields_value as $key => $value ) {
							if ( array_key_exists( $key, $tsp_builder_styles_base ) ) {
								$tsp_styles_sidebar_get_fields .= $this->tsp_get_field_html( $key, $value, $tsp_builder_styles_base[ $key ] );
							} elseif ( $key == 'TotalSoftPoll_Q_Im' || $key == 'TotalSoftPoll_Q_Vd' ) {
								$tsp_styles_sidebar_get_fields .= $this->tsp_get_field_html( $key, $value, $tsp_builder_param_base[ $key ] );
							}
						}
						echo sprintf(
							'
							<div class="tsp_accordion_item %1$s">
								<header class="tsp_accordion_header" v-on:click.stop.prevent="tspAccordionHeader($event.currentTarget)">
									<i class="ts-poll ts-poll-angle-right tsp_accordion_header_icon"></i>
									<h3 class="tsp_accordion_header_title">%2$s</h3>
								</header>
								<div class="tsp_accordion_item_content">
									<div class="tsp_accordion_items tsp_analytics_flex_c">
										%3$s
									</div>
								</div>
							</div>			
							',
							esc_attr( str_replace( ' ', '-', strtolower( $fields_key ) ) ),
							esc_attr( $fields_key ),
							$tsp_styles_sidebar_get_fields
						);
					}
				?>
			</div>
		</div>
		<div class="tsp_flex_col  tsp_content_subsection" data-tsp-subsection="setting">
			<div class="tsp_styles_sidebar">
				<?php
					foreach ( $tsp_builder_setting_arr as $fields_key => $fields_value ) {
						$tsp_settings_sidebar_get_fields = "";
						foreach ( $fields_value as $key => $value ) {
							if ( array_key_exists( $key, $tsp_builder_settings_base ) ) {
								$tsp_settings_sidebar_get_fields .= $this->tsp_get_field_html( $key, $value, $tsp_builder_settings_base[ $key ] );
							}
						}
						echo sprintf(
							'
							<div class="tsp_accordion_item %1$s">
								<header class="tsp_accordion_header" v-on:click.stop.prevent="tspAccordionHeader($event.currentTarget)">
									<i class="ts-poll ts-poll-angle-right tsp_accordion_header_icon"></i>
									<h3 class="tsp_accordion_header_title">%2$s</h3>
								</header>
								<div class="tsp_accordion_item_content">
									<div class="tsp_accordion_items tsp_analytics_flex_c">
										%3$s
									</div>
								</div>
							</div>			
							',
							esc_attr( str_replace( ' ', '-', strtolower( $fields_key ) ) ),
							esc_attr( $fields_key ),
							$tsp_settings_sidebar_get_fields
						);
					}
					echo sprintf(
						'
						<div class="tsp_accordion_item %1$s">
							<header class="tsp_accordion_header" v-on:click.stop.prevent="tspAccordionHeader($event.currentTarget)">
								<i class="ts-poll ts-poll-angle-right tsp_accordion_header_icon"></i>
								<h3 class="tsp_accordion_header_title">%2$s</h3>
							</header>
							<div class="tsp_accordion_item_content">
								<div class="tsp_accordion_items tsp_analytics_flex_c">
									<div class="tsp_checkbox_div">
										<input class="tsp_checkbox_input_pro" type="checkbox" id="tsp_vote_once_option">
										<label class="tsp_checkbox_label_pro" for="tsp_vote_once_option">%3$s</label>
									</div>
									<div class="tsp_select_div">
										<span class="tsp_select_div_title tsp_field_title">%4$s</span>
										<select disabled="">
										<option>%5$s</option>
										<option>%6$s</option>
										<option selected="">%7$s</option>
										<option>%8$s</option>
										<option>%9$s</option>
										<option>%10$s</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						',
						esc_attr( 'tsp_settings_pro' ),
						esc_attr__( 'Vote Options', 'tspoll' ),
						esc_attr__( 'Vote Once', 'tspoll' ),
						esc_attr__( 'One time voting type', 'tspoll' ),
						esc_attr__( 'PHP Cookie', 'tspoll' ),
						esc_attr__( 'IP Address', 'tspoll' ),
						esc_attr__( 'IP Address time', 'tspoll' ),
						esc_attr__( 'IP Address PHP Cookie', 'tspoll' ),
						esc_attr__( 'IP Address PHP Cookie time', 'tspoll' ),
						esc_attr__( 'PHP Cookie time', 'tspoll' )
					);
				?>
			</div>    
		</div>
		<div class="tsp_flex_col tsp_content_subsection" data-tsp-subsection="shortcode">
			<div class="tsp_flex_col" data-tsp-field="shortcode" v-if="tspCreation">
				<p><?php esc_html_e( 'Copy & paste the shortcode directly into any WordPress post or page.', 'tspoll' ); ?></p>
				<div class="tsp_flex_row tsp_shortcode_div">
					<input type="text" id="tsp_global_shortcode" v-bind:value="tspGlobalShortcode" disabled="">
					<span class="ts-poll ts-poll-files-o" v-on:click.stop.prevent="copyShortcode" v-bind:data-tsp-shortcode="tspGlobalShortcode" data-tsp-copy="tsp_global_shortcode" ></span>
				</div>
			</div>
			<div class="tsp_flex_col" data-tsp-field="shortcode" v-if="tspCreation">
				<p><?php esc_html_e( 'Copy & paste this code into a template file to include the poll within your theme.', 'tspoll' ); ?></p>
				<div class="tsp_flex_row tsp_shortcode_div">
					<input type="text" id="tsp_global_theme_shortcode" v-bind:value="tspGlobalThemeShortcode" disabled="" >
					<span class="ts-poll ts-poll-files-o"  v-on:click.stop.prevent="copyShortcode" v-bind:data-tsp-shortcode="tspGlobalThemeShortcode" data-tsp-copy="tsp_global_theme_shortcode" ></span>
				</div>
			</div>
			<div class="tsp_flex_col" data-tsp-field="notice" v-if="!tspCreation">
				<div class="tsp_notice_div"><p><?php esc_html_e( 'Please save poll for getting shortcode.', 'tspoll' ); ?></p></div>
			</div>
			<div class="tsp_flex_col" data-tsp-field="title" >
				<p><?php esc_html_e( 'Write question text', 'tspoll' ); ?></p>
				<div class="tsp_flex_row tsp_shortcode_div">
					<input type="text" id="tsp_global_title" v-on:input="titleOnInput"  value="<?php echo esc_html( html_entity_decode( htmlspecialchars_decode( $this->tsp_build_proporties['Question_Title'] ), ENT_QUOTES ) ); ?>"  maxlength="255" >
				</div>
			</div>
		</div>
	</div>      
	<div class="tsp_content" data-tsp-section="email_popup">
		<div class="tsp-info-inner" >
			<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/message_builder.png") ?>">
		</div>
		<div class="tsp-info-inner-pro tsp_flex_col">
			<h2>This photo for illustration. Feature are available in the Professional version of the plugin only.</h2>
			<a href="<?php echo esc_url("https://total-soft.com/wp-poll/"); ?>" target="_blank" class="">GET THE FULL VERSION</a>
		</div>
	</div>
	<div class="tsp_content tsp_flex_col" data-tsp-section="result_shortcode">
		<div class="tsp-tabs-card">
			<div class="tsp-tabs-themes">
				<div class="tsp-tabs-wrapper">
					<div class="tsp-tabs-group">
						<div class="tsp-tabs">
							<div class="tsp-tab tsp-tab--active" @click="tsprChangeShortcode($event.currentTarget)" data-tspr-id="bar">
								bar
							</div>
							<div class="tsp-tab" @click="tsprChangeShortcode($event.currentTarget)" data-tspr-id="pie">
								pie
							</div>
							<div class="tsp-tab" @click="tsprChangeShortcode($event.currentTarget)" data-tspr-id="donut">
								donut
							</div>
							<div class="tsp-tab" @click="tsprChangeShortcode($event.currentTarget)" data-tspr-id="radial">
								radial
							</div>
							<div class="tsp-tab" @click="tsprChangeShortcode($event.currentTarget)" data-tspr-id="polar">
								polar
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tsp-tabs-inner">
			<div class="tsp-tab-inner tsp-tab-inner-active"  data-tspr-id="bar">
				<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/bar.png") ?>" alt="bar">	
			</div>
			<div class="tsp-tab-inner"  data-tspr-id="pie">
				<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/pie.png") ?>" alt="pie">
			</div>
			<div class="tsp-tab-inner"  data-tspr-id="donut">
				<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/donut.png") ?>" alt="donut">
			</div>
			<div class="tsp-tab-inner"  data-tspr-id="radial">
				<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/radial.png") ?>" alt="radial">
			</div>
			<div class="tsp-tab-inner"  data-tspr-id="polar">
				<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/polar.png") ?>" alt="polar">
			</div>
			<div class="tsp-tab-inner-pro tsp_flex_col">
				<h2>This photo for illustration. Feature are available in the Professional version of the plugin only.</h2>
				<a href="<?php echo esc_url("https://total-soft.com/wp-poll/"); ?>" target="_blank" class="">GET THE FULL VERSION</a>
			</div>
		</div>
	</div>
	<div class="tsp_content" data-tsp-section="info">
		<div class="tsp-info-inner" >
			<img src="<?php echo esc_url(TS_POLL_PLUGIN_DIR_URL . "admin/img/info_content.png") ?>">
		</div>
		<div class="tsp-info-inner-pro tsp_flex_col">
			<h2>This photo for illustration. Feature are available in the Professional version of the plugin only.</h2>
			<a href="<?php echo esc_url("https://total-soft.com/wp-poll/"); ?>" target="_blank" class="">GET THE FULL VERSION</a>
		</div>
	</div>
	<?php if ( isset( $_GET['tsp-id'] ) ) { ?>
		<div class="tsp_content" data-tsp-section="votes_count">
			<div class="tsp_flex_col tsp_analytics_card">
				<div class="tsp_flex_col" data-tsp-field="notice" >
					<div class="tsp_notice_div"><p><?php esc_html_e( 'If you want to change answer votes,go to pro.', 'tspoll' ); ?></p></div>
				</div>
				<table id="tsp_data_results_table">
					<thead>
						<tr>
							<th data-sortable="false">
								<?php esc_html_e( 'No.', 'tspoll' ); ?>
							</th>
							<th data-sortable="false">
								<?php esc_html_e( 'Answer', 'tspoll' ); ?>
							</th>
							<th data-sortable="false">
								<?php esc_html_e( 'Votes count', 'tspoll' ); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$tsp_info_table_count = 1;
							foreach ( $t_s_poll_builder_params['Question_Answers'] as $key => $value ) {
								echo sprintf(
									'
									<tr data-tsp-elem="%1$d" >
										<td>%2$d</td>
										<td>%3$s</td>
										<td><input class="tsp_change_results" type="text" value="%4$d" min="0"></td>
									</tr>
									',
									(int) esc_html( $value['id'] ),
									esc_attr( (int) $tsp_info_table_count ),
									esc_html( $value['Answer_Title'] ),
									(int) esc_html( $value['Answer_Votes'] )
								);
								$tsp_info_table_count += 1;
							}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th> <?php esc_html_e( 'No.', 'tspoll' ); ?> </th>
							<th> <?php esc_html_e( 'Answer', 'tspoll' ); ?> </th>
							<th> <?php esc_html_e( 'Votes count', 'tspoll' ); ?> </th>
						</tr>
					</tfoot>
				</table>
			</div>  
		</div>
	<?php }
}
$tsp_content_builder = \ob_get_clean();
$tsp_icons_html      = $tsp_icon_picker_html = '';
if ( 'edit' === $this->tsp_build ) {
	foreach ( $tsp_all_fonts_arr['tsp_fonts'] as $key => $value ) {
		foreach ( $value as $icon_key => $icon_value ) {
			$tsp_icons_html .= sprintf(
				'
        		<div class="ts-poll-aim-icon-item" v-on:click="tspChangeSelectedIcon($event.currentTarget)" data-library-id="%1$s" data-filter="%2$s">
        		  	<div class="ts-poll-aim-icon-item-inner">
        		  	  	<i class="%3$s"></i>
        		  	  	<div class="ts-poll-aim-icon-item-name" title="%4$s">%4$s</div>
        		  	</div>
        		</div>
        		',
				'tsp_emojies' === $key ? esc_attr( 'ts-poll-emoji-regular' ) : esc_attr( 'ts-poll-regular' ),
				'tsp_emojies' === $key ? esc_attr( str_replace( 'ts-poll-emoji ts-poll-emoji-', '', $icon_value ) ) : esc_attr( str_replace( 'ts-poll ts-poll-', '', $icon_value ) ),
				esc_attr( $icon_value ),
				'tsp_emojies' === $key ? esc_attr( str_replace( '-', ' ', str_replace( 'ts-poll-emoji ts-poll-emoji-', '', $icon_value ) ) ) : esc_attr( str_replace( '-', ' ', str_replace( 'ts-poll ts-poll-', '', $icon_value ) ) )
			);
		}
	}
	$tsp_icon_picker_html = sprintf(
		'
		<div class="ts-poll-aim-modal" id="ts-poll-aim-modal" v-on:click="tspClickOuterMain($event)" style="display:none;">
			<div class="ts-poll-aim-modal--content">
				<div class="ts-poll-aim-modal--header">
					<div class="ts-poll-aim-modal--header-logo-area">
						<span class="ts-poll-aim-modal--header-logo-title"> Aesthetic Icon Picker </span>
					</div>
					<div class="ts-poll-aim-modal--header-close-btn" v-on:click="tspCloseIconPicker">
						<i class="ts-poll-fas ts-poll-times" title="Close"></i>
					</div>
				</div>
				<div class="ts-poll-aim-modal--body">
					<div id="ts-poll-aim-modal--sidebar" class="ts-poll-aim-modal--sidebar">
						<div class="ts-poll-aim-modal--sidebar-tabs">
							<div class="ts-poll-aim-modal--sidebar-tab-item aesthetic-active" data-library-id="all" v-on:click="tspChangeSidebarActive($event.currentTarget.dataset.libraryId)">
								<i class="ts-poll ts-poll-star"></i>
								%1$s
							</div>
							<div class="ts-poll-aim-modal--sidebar-tab-item" data-library-id="ts-poll-regular" v-on:click="tspChangeSidebarActive($event.currentTarget.dataset.libraryId)">
								<i class="ts-poll ts-poll-font-awesome"></i>
								%2$s
							</div>
							<div class="ts-poll-aim-modal--sidebar-tab-item" data-library-id="ts-poll-emoji-regular" v-on:click="tspChangeSidebarActive($event.currentTarget.dataset.libraryId)">
								<i class="ts-poll-emoji ts-poll-emoji-grinning"></i>
								%3$s
							</div>
						</div>
					</div>
					<div id="ts-poll-aim-modal--icon-preview-wrap" class="ts-poll-aim-modal--icon-preview-wrap">
						<div class="ts-poll-aim-modal--icon-search">
							<input type="text" id="ts-poll-aim-modal--search_input"  placeholder="%4$s" v-on:input="tspSearchIcon($event.currentTarget.value)">
							<i class="ts-poll-fas ts-poll-search"></i>
						</div>
						<div class="ts-poll-aim-modal--icon-preview-inner" id="ts-poll-aim-modal--icon-preview-inner">
							<div id="ts-poll-aim-modal--icon-preview">
								%5$s
							</div>
						</div>
					</div>
				</div>
				<div class="ts-poll-aim-modal--footer">
					<button class="ts-poll-aim-insert-icon-button" id="ts-poll-aim-insert-icon-button" v-on:click="tspInsertIcon($event.currentTarget)">
						%6$s
					</button>
				</div>
			</div>
		</div>',
		esc_html__( 'all', 'tspoll' ),
		esc_html__( 'font awesome', 'tspoll' ),
		esc_html__( 'emojies', 'tspoll' ),
		esc_html__( 'Filter by name...', 'tspoll' ),
		$tsp_icons_html,
		esc_html__( 'Select', 'tspoll' )
	);
	$tsp_font_families_css = '';
	foreach ( $tsp_all_fonts_arr['tsp_font_families'] as $key => $value ) {
		$tsp_font_params        = $value;
		$tsp_font_families_css .= sprintf(
			'
			@font-face {
				font-family: "%1$s";
				font-style: normal;
				font-weight: 400;
				src: url("%2$s"); 
				src: url("%3$s") format("embedded-opentype"), 
					url("%4$s") format("woff2"), 
					url("%5$s") format("woff"), 
					url("%6$s") format("truetype"), 
					url("%7$s") format("svg");
			}
			',
			esc_attr( $key ),
			array_key_exists( 'eot', $tsp_font_params ) ? esc_url( $tsp_font_params['eot'] ) : '',
			array_key_exists( 'eot', $tsp_font_params ) ? esc_url( $tsp_font_params['eot'] ) : '',
			array_key_exists( 'woff2', $tsp_font_params ) ? esc_url( $tsp_font_params['woff2'] ) : '',
			array_key_exists( 'woff', $tsp_font_params ) ? esc_url( $tsp_font_params['woff'] ) : '',
			array_key_exists( 'ttf', $tsp_font_params ) ? esc_url( $tsp_font_params['ttf'] ) : '',
			array_key_exists( 'svg', $tsp_font_params ) ? esc_url( $tsp_font_params['svg'] ) : ''
		);
	}
	wp_register_style( 'ts_poll_builder_font_faces', false );
	wp_enqueue_style( 'ts_poll_builder_font_faces' );
	wp_add_inline_style( 'ts_poll_builder_font_faces', $tsp_font_families_css );
}
echo sprintf(
	'
	<section id="tsp_builder_section" class="tsp_flex_row" >
		<aside id="tsp_sidebar" class="tsp_flex_col tsp_sidebar" data-tsp-use="%1$s" v-bind:data-tsp-open="isOpen ? openClass : closeClass">
			<div class="ts_poll_logo tsp_flex_col">
				<img src="%2$s"  alt="TS Poll Logo">
			</div>
			<div class="tsp_sidebar_item %3$s" data-tsp-item="theme"  v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 20 20" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m24 10h-24v-5a5.006 5.006 0 0 1 5-5h5v3a1 1 0 0 0 2 0v-3h2v5a1 1 0 0 0 2 0v-5h2v7a1 1 0 0 0 2 0v-6.9a5.009 5.009 0 0 1 4 4.9zm-23.7 2a7.011 7.011 0 0 0 6.7 5h2v4a3 3 0 0 0 6 0v-4h2a7.011 7.011 0 0 0 6.7-5z" fill="#8c8c8c" data-original="#000000"/></g></svg>
				<span class="tsp_sidebar_item_title">%4$s</span>  
			</div>
			<div class="tsp_sidebar_item %5$s" data-tsp-item="field" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 20 20" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m21 17h-11v2a1 1 0 0 1 -2 0v-2h-2v2a1 1 0 0 1 -2 0v-2h-1a3 3 0 0 0 0 6h18a3 3 0 0 0 0-6z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="m21 9h-11v2a1 1 0 0 1 -2 0v-2h-2v2a1 1 0 0 1 -2 0v-2h-1a3 3 0 0 0 0 6h18a3 3 0 0 0 0-6z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="m21 1h-11v2a1 1 0 0 1 -2 0v-2h-2v2a1 1 0 0 1 -2 0v-2h-1a3 3 0 0 0 0 6h18a3 3 0 0 0 0-6z" fill="#8c8c8c" data-original="#000000"/></g></svg>
				<span class="tsp_sidebar_item_title">%6$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="style" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 512.051 512.051" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><g xmlns="http://www.w3.org/2000/svg">	<path d="M21.359,101.359h58.368c11.52,42.386,55.219,67.408,97.605,55.888c27.223-7.399,48.489-28.665,55.888-55.888h257.472   c11.782,0,21.333-9.551,21.333-21.333s-9.551-21.333-21.333-21.333H233.22C221.7,16.306,178.001-8.716,135.615,2.804   c-27.223,7.399-48.489,28.665-55.888,55.888H21.359c-11.782,0-21.333,9.551-21.333,21.333S9.577,101.359,21.359,101.359z" fill="#8c8c8c" data-original="#000000"/>	<path d="M490.692,234.692h-58.368c-11.497-42.38-55.172-67.416-97.552-55.92c-27.245,7.391-48.529,28.674-55.92,55.92H21.359   c-11.782,0-21.333,9.551-21.333,21.333c0,11.782,9.551,21.333,21.333,21.333h257.493c11.497,42.38,55.172,67.416,97.552,55.92   c27.245-7.391,48.529-28.674,55.92-55.92h58.368c11.782,0,21.333-9.551,21.333-21.333   C512.025,244.243,502.474,234.692,490.692,234.692z" fill="#8c8c8c" data-original="#000000"/>	<path d="M490.692,410.692H233.22c-11.52-42.386-55.219-67.408-97.605-55.888c-27.223,7.399-48.489,28.665-55.888,55.888H21.359   c-11.782,0-21.333,9.551-21.333,21.333c0,11.782,9.551,21.333,21.333,21.333h58.368c11.52,42.386,55.219,67.408,97.605,55.888   c27.223-7.399,48.489-28.665,55.888-55.888h257.472c11.782,0,21.333-9.551,21.333-21.333   C512.025,420.243,502.474,410.692,490.692,410.692z" fill="#8c8c8c" data-original="#000000"/></g></g></svg>
				<span class="tsp_sidebar_item_title">%7$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="setting" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" viewBox="0 0 640 512" width="20" height="20"><path fill="#8c8c8c" d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"></path></svg>      
				<span class="tsp_sidebar_item_title">%8$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="shortcode" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g id="surface1"><path style="fill-rule:nonzero;fill:rgb(54.901961%%,54.901961%%,54.901961%%);fill-opacity:1;stroke-width:25;stroke-linecap:butt;stroke-linejoin:round;stroke:rgb(54.901961%%,54.901961%%,54.901961%%);stroke-opacity:1;stroke-miterlimit:10;" d="M 42.368475 56.519248 L 42.368475 169.480752 C 42.368475 177.310574 48.689426 183.631525 56.519248 183.631525 L 84.739234 183.631525 C 87.349175 183.631525 89.469752 185.752102 89.469752 188.321262 C 89.469752 190.931203 87.349175 193.05178 84.739234 193.05178 L 56.519248 193.05178 C 43.510324 193.011 32.989 182.489676 32.94822 169.480752 L 32.94822 56.519248 C 32.989 43.510324 43.510324 32.989 56.519248 32.94822 L 84.739234 32.94822 C 87.349175 32.94822 89.469752 35.068797 89.469752 37.678738 C 89.469752 40.247898 87.349175 42.368475 84.739234 42.368475 L 56.519248 42.368475 C 48.689426 42.368475 42.368475 48.689426 42.368475 56.519248 Z M 183.631525 169.480752 L 183.631525 56.519248 C 183.631525 48.689426 177.310574 42.368475 169.480752 42.368475 L 141.260766 42.368475 C 138.650825 42.368475 136.530248 40.247898 136.530248 37.678738 C 136.530248 35.068797 138.650825 32.94822 141.260766 32.94822 L 169.480752 32.94822 C 182.489676 32.989 193.011 43.510324 193.05178 56.519248 L 193.05178 169.480752 C 193.011 182.489676 182.489676 193.011 169.480752 193.05178 L 141.260766 193.05178 C 138.650825 193.05178 136.530248 190.931203 136.530248 188.321262 C 136.530248 185.752102 138.650825 183.631525 141.260766 183.631525 L 169.480752 183.631525 C 177.310574 183.631525 183.631525 177.310574 183.631525 169.480752 Z M 183.631525 169.480752 " transform="matrix(0.0957876,0,0,0.0957876,1.176,1.176)"/><path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%%,54.901961%%,54.901961%%);fill-opacity:1;" d="M 5.234375 6.589844 L 5.234375 17.410156 C 5.234375 18.160156 5.839844 18.765625 6.589844 18.765625 L 9.292969 18.765625 C 9.542969 18.765625 9.746094 18.96875 9.746094 19.214844 C 9.746094 19.464844 9.542969 19.667969 9.292969 19.667969 L 6.589844 19.667969 C 5.34375 19.664062 4.335938 18.65625 4.332031 17.410156 L 4.332031 6.589844 C 4.335938 5.34375 5.34375 4.335938 6.589844 4.332031 L 9.292969 4.332031 C 9.542969 4.332031 9.746094 4.535156 9.746094 4.785156 C 9.746094 5.03125 9.542969 5.234375 9.292969 5.234375 L 6.589844 5.234375 C 5.839844 5.234375 5.234375 5.839844 5.234375 6.589844 Z M 17.410156 18.765625 L 14.707031 18.765625 C 14.457031 18.765625 14.253906 18.96875 14.253906 19.214844 C 14.253906 19.464844 14.457031 19.667969 14.707031 19.667969 L 17.410156 19.667969 C 18.65625 19.664062 19.664062 18.65625 19.667969 17.410156 L 19.667969 6.589844 C 19.664062 5.34375 18.65625 4.335938 17.410156 4.332031 L 14.707031 4.332031 C 14.457031 4.332031 14.253906 4.535156 14.253906 4.785156 C 14.253906 5.03125 14.457031 5.234375 14.707031 5.234375 L 17.410156 5.234375 C 18.160156 5.234375 18.765625 5.839844 18.765625 6.589844 L 18.765625 17.410156 C 18.765625 18.160156 18.160156 18.765625 17.410156 18.765625 Z M 17.410156 18.765625 "/></g></svg>
				<span class="tsp_sidebar_item_title">%9$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="result_shortcode" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 20 20" version="1.1"><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%%,54.901961%%,54.901961%%);fill-opacity:1;" d="M 6.570312 19.277344 C 5.027344 19.277344 3.933594 19.015625 3.230469 18.449219 C 2.523438 17.886719 2.175781 16.882812 2.097656 15.433594 L 2.097656 12.898438 C 2.175781 11.597656 1.636719 10.949219 0.558594 10.949219 L 0.558594 9.003906 C 1.636719 9.003906 2.097656 8.289062 2.097656 6.9375 L 2.097656 4.582031 C 2.097656 3.128906 2.523438 2.148438 3.21875 1.558594 C 3.914062 0.96875 5.011719 0.65625 6.570312 0.65625 L 6.570312 2.632812 C 5.4375 2.632812 4.964844 3.246094 4.964844 4.472656 L 4.964844 6.730469 C 4.964844 8.421875 4.351562 9.507812 3.261719 9.953125 L 3.261719 9.996094 C 4.351562 10.433594 4.964844 11.5 4.964844 13.226562 L 4.964844 15.394531 C 4.964844 16.085938 5.160156 16.578125 5.425781 16.863281 C 5.695312 17.15625 5.96875 17.300781 6.570312 17.300781 Z M 6.570312 19.277344 "/><path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%%,54.901961%%,54.901961%%);fill-opacity:1;" d="M 13.300781 19.296875 C 14.847656 19.296875 15.917969 19.015625 16.621094 18.449219 C 17.328125 17.886719 17.71875 16.972656 17.796875 15.527344 L 17.796875 12.988281 C 17.71875 11.6875 18.21875 10.945312 19.292969 10.945312 L 19.292969 9.003906 C 18.21875 9.003906 17.648438 8.359375 17.804688 7.007812 L 17.804688 4.652344 C 17.648438 3.199219 17.332031 2.148438 16.632812 1.558594 C 15.9375 0.96875 14.925781 0.628906 13.363281 0.628906 L 13.363281 2.605469 C 14.496094 2.605469 14.796875 3.523438 14.796875 4.75 L 14.796875 7.003906 C 14.796875 8.699219 15.5 9.507812 16.59375 9.953125 L 16.59375 9.996094 C 15.5 10.429688 14.796875 11.300781 14.796875 13.03125 L 14.796875 15.199219 C 14.796875 15.890625 14.773438 16.550781 14.507812 16.84375 C 14.242188 17.128906 13.902344 17.320312 13.300781 17.320312 Z M 13.300781 19.296875 "/></g></svg>
				<span class="tsp_sidebar_item_title">%23$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="email_popup" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="32" height="32" stroke="none" fill="#000000" opacity="0"/><g transform="matrix(1.17 0 0 1.17 16 16)" ><g style="" ><g transform="matrix(1 0 0 1 7 -7.31)" ><path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(140,140,140); fill-rule: nonzero; opacity: 1;" transform=" translate(-19, -4.69)" d="M 20.807 0 C 20.039 -0.001 19.433 0.249 19 0.525 C 18.567 0.249 17.961 -0.001 17.193 0 C 15.975000000000001 0.002 14.839000000000002 0.75 14.313000000000002 1.848 C 13.110000000000003 4.361 15.692000000000002 6.696 16.668000000000003 7.579 L 16.831000000000003 7.726999999999999 C 17.5 8.352 19 9.382 19 9.382 C 19 9.382 20.5 8.350999999999999 21.169 7.726999999999999 L 21.332 7.579 C 22.308 6.696 24.89 4.361 23.687 1.8479999999999999 C 23.161 0.75 22.025 0.002 20.807 0 z M 19.99 6.096 L 19.805 6.265 C 19.553 6.5 19.255 6.745 19 6.945 C 18.745 6.745 18.447 6.5 18.194 6.264 L 18.01 6.096 C 17.46 5.599 16 4.278 16 3.2 C 16 2.538 16.538 2 17.2 2 C 18.255 2 18.986 2.6390000000000002 18.991 2.644 C 18.991 2.644 19.654 2 20.8 2 C 21.462 2 22 2.538 22 3.2 C 22 4.278 20.54 5.599 19.99 6.096 z" stroke-linecap="round" /></g><g transform="matrix(1 0 0 1 0 0)" ><path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(140,140,140); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 20.133 11.03 L 20 11.122 L 20 18 L 4 18 L 4 9.001 L 12 14 L 17.343 10.661 C 16.932 10.368 16.368 9.952 15.898 9.564 L 12 12 L 4 7.001 L 4 6 L 12.783 6 C 12.411 5.326 12.173 4.659 12.064 4 L 4 4 C 2.895 4 2 4.895 2 6 L 2 18 C 2 19.105 2.895 20 4 20 L 20 20 C 21.105 20 22 19.105 22 18 L 22 9.646 C 21.23 10.271 20.265 10.939 20.133 11.03 z" stroke-linecap="round" /></g><g transform="matrix(1 0 0 1 0 1)" ><path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(140,140,140); fill-rule: nonzero; opacity: 0.3;" transform=" translate(-12, -13)" d="M 20.133 11.03 L 19.000999999999998 11.808 L 17.868 11.03 C 17.753 10.950999999999999 17.017 10.442 16.328 9.908 L 12 13 L 3 7 L 3 19 L 21 19 C 21 19 21 12 21 11 C 21 10.854 20.949 10.683 20.876 10.504 C 20.501 10.776 20.202 10.983 20.133 11.03 z" stroke-linecap="round" /></g></g></g></svg>
				<span class="tsp_sidebar_item_title">%24$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="info" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="M22.5,21H5.5A2.5,2.5,0,0,1,3,18.5V1.5a1.5,1.5,0,0,0-3,0v17A5.506,5.506,0,0,0,5.5,24h17a1.5,1.5,0,0,0,0-3Z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M9.5,9A1.5,1.5,0,0,0,8,10.5v7a1.5,1.5,0,0,0,3,0v-7A1.5,1.5,0,0,0,9.5,9Z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M14,13.5v4a1.5,1.5,0,0,0,3,0v-4a1.5,1.5,0,0,0-3,0Z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M20,9.5v8a1.5,1.5,0,0,0,3,0v-8a1.5,1.5,0,0,0-3,0Z" fill="#8c8c8c" data-original="#000000"/><path xmlns="http://www.w3.org/2000/svg" d="M6,7.5a1.487,1.487,0,0,0,.936-.329L9.214,5.35a2.392,2.392,0,0,1,3.191.176,5.43,5.43,0,0,0,7.3.3l3.764-3.185A1.5,1.5,0,1,0,21.531.355L17.768,3.54A2.411,2.411,0,0,1,14.526,3.4a5.389,5.389,0,0,0-7.186-.4L5.063,4.829A1.5,1.5,0,0,0,6,7.5Z" fill="#8c8c8c" data-original="#000000"/></g></svg>
				<span class="tsp_sidebar_item_title">%10$s</span>  
			</div>
			<div class="tsp_sidebar_item" data-tsp-item="votes_count" v-on:click.prevent="changeContent($event.currentTarget.dataset.tspItem)">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g id="surface1"><path style="fill-rule:nonzero;fill:rgb(0%%,0%%,0%%);fill-opacity:1;stroke-width:11;stroke-linecap:butt;stroke-linejoin:round;stroke:rgb(54.901961%%,54.901961%%,54.901961%%);stroke-opacity:1;stroke-miterlimit:10;" d="M 140.105922 40.666132 C 147.547519 40.666132 153.678162 46.796774 153.678162 54.238371 L 153.678162 99.42776 L 212.43979 99.42776 C 219.881388 99.42776 226.01203 105.558403 226.01203 113 L 226.01203 179.935818 C 226.01203 182.442056 223.968482 184.485603 221.462245 184.485603 L 4.537755 184.485603 C 2.031518 184.485603 -0.0120299 182.442056 -0.0120299 179.935818 L -0.0120299 94.916533 C -0.0120299 87.474936 6.118612 81.344293 13.56021 81.344293 L 72.321838 81.344293 L 72.321838 54.238371 C 72.321838 46.796774 78.452481 40.666132 85.894078 40.666132 Z M 81.344293 54.238371 L 81.344293 85.894078 C 81.344293 88.361758 79.339303 90.405306 76.833066 90.405306 L 13.56021 90.405306 C 11.053972 90.405306 9.048982 92.410295 9.048982 94.916533 L 9.048982 175.424591 L 216.951018 175.424591 L 216.951018 113 C 216.951018 110.493763 214.946028 108.488773 212.43979 108.488773 L 149.166934 108.488773 C 146.660697 108.488773 144.655707 106.445225 144.655707 103.977545 L 144.655707 54.238371 C 144.655707 51.732134 142.612159 49.727144 140.105922 49.727144 L 85.894078 49.727144 C 83.387841 49.727144 81.344293 51.732134 81.344293 54.238371 Z M 117.511227 63.260826 L 117.511227 99.42776 L 110.300975 99.42776 L 110.300975 74.172598 L 103.12928 74.172598 L 103.12928 69.198681 L 103.553413 69.198681 C 105.789748 69.198681 107.948968 68.697434 109.337038 67.810611 C 110.68655 66.885231 111.689045 65.535719 112.151735 63.260826 Z M 51.115214 106.638013 C 52.927416 108.450215 53.814239 110.68655 53.814239 113.848265 C 53.814239 115.197777 53.852796 116.200272 53.390106 117.087095 C 53.390106 118.012475 52.850301 118.86074 52.387611 119.78612 C 51.963479 120.672942 51.462231 121.559765 50.575409 122.446587 L 41.090264 131.931732 C 41.090264 132.818555 40.666132 133.743935 40.666132 134.206625 L 54.238371 134.206625 L 54.238371 140.105922 L 31.643677 140.105922 C 31.643677 138.332277 31.605119 136.944207 32.067809 135.594694 L 33.494437 131.5076 C 33.918569 130.158087 34.805392 128.88569 36.154904 127.96031 C 37.041727 126.610797 38.468354 125.64686 39.817867 124.297347 L 42.941024 121.598322 L 44.791784 119.78612 C 45.254474 119.32343 45.601492 118.39805 46.064182 117.93536 C 46.488314 117.47267 46.603987 116.54729 46.603987 116.123157 L 46.603987 113.424132 C 46.603987 110.262418 45.215917 108.912905 42.941024 108.912905 C 42.054202 108.912905 41.128822 108.874348 40.666132 109.337038 L 39.278062 110.725108 C 38.815372 111.187798 38.853929 112.113178 38.853929 113 L 38.853929 115.699025 L 31.643677 115.699025 L 31.643677 114.426627 C 31.643677 110.802223 32.530499 108.450215 34.342702 106.638013 C 36.116347 104.82581 38.892487 103.977545 42.941024 103.977545 C 46.565429 103.977545 49.341569 104.82581 51.115214 106.638013 Z M 191.271723 124.297347 C 193.045368 125.64686 193.932191 127.883195 193.932191 131.5076 C 193.932191 133.782492 193.430943 135.671809 192.505563 137.021322 C 191.618741 138.370834 190.230671 139.219099 188.418468 139.681789 C 190.693361 140.144479 192.621236 141.031302 193.508058 142.380814 C 194.394881 143.730327 194.780456 146.043777 194.780456 148.318669 C 194.780456 149.668182 194.819013 150.477889 194.356323 151.827402 C 193.893633 153.215472 193.430943 154.140852 192.505563 155.528922 C 191.618741 156.415744 190.346343 157.302566 188.996831 158.189389 C 187.647318 158.652079 185.333868 159.037654 183.058976 159.037654 C 179.434571 159.037654 176.774104 158.150831 175.424591 156.377187 C 173.612389 154.564984 172.609894 151.943074 172.609894 148.318669 L 179.935818 148.318669 C 179.048996 149.668182 179.511686 150.902022 179.935818 152.251534 C 180.398508 153.176914 181.709463 154.102294 183.058976 154.102294 C 183.945798 154.102294 184.871178 154.140852 185.333868 153.678162 L 186.721938 152.251534 C 187.184628 151.827402 187.146071 151.017694 187.146071 150.555004 L 187.146071 146.043777 C 187.146071 145.156954 186.644823 144.694264 186.182133 144.231574 L 184.909736 142.804947 C 184.447046 142.342257 183.521666 142.380814 182.634843 142.380814 L 180.359951 142.380814 L 180.359951 137.445454 L 182.634843 137.445454 C 183.521666 137.445454 184.022913 137.484012 184.485603 137.021322 L 185.758001 135.594694 C 186.220691 135.132004 186.259248 134.669315 186.721938 133.782492 C 186.721938 132.857112 187.146071 132.394422 187.146071 131.5076 C 187.146071 129.695397 186.644823 128.423 186.182133 127.96031 C 185.719443 127.073487 184.832621 126.996372 183.483108 126.996372 C 182.596286 126.996372 182.095038 126.957815 181.632348 127.420505 L 180.359951 128.808575 C 179.935818 129.271265 179.935818 130.196645 179.935818 130.659335 L 179.935818 132.934227 L 173.188256 132.934227 C 173.188256 129.309822 174.036521 126.533682 175.848724 124.72148 C 177.660926 122.909277 180.321393 122.022455 183.483108 122.022455 C 186.644823 122.022455 189.459521 122.947835 191.271723 124.297347 Z M 191.271723 124.297347 " transform="matrix(0.10131,0,0,0.10131,0.552,0.552)"/><path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%%,54.901961%%,54.901961%%);fill-opacity:1;" d="M 9.253906 4.671875 C 8.5 4.671875 7.878906 5.292969 7.878906 6.046875 L 7.878906 8.792969 L 1.925781 8.792969 C 1.171875 8.792969 0.550781 9.414062 0.550781 10.167969 L 0.550781 18.78125 C 0.550781 19.035156 0.757812 19.242188 1.011719 19.242188 L 22.988281 19.242188 C 23.242188 19.242188 23.449219 19.035156 23.449219 18.78125 L 23.449219 12 C 23.449219 11.246094 22.828125 10.625 22.074219 10.625 L 16.121094 10.625 L 16.121094 6.046875 C 16.121094 5.292969 15.5 4.671875 14.746094 4.671875 Z M 9.253906 5.589844 L 14.746094 5.589844 C 15 5.589844 15.207031 5.792969 15.207031 6.046875 L 15.207031 11.085938 C 15.207031 11.335938 15.410156 11.542969 15.664062 11.542969 L 22.074219 11.542969 C 22.328125 11.542969 22.53125 11.746094 22.53125 12 L 22.53125 18.324219 L 1.46875 18.324219 L 1.46875 10.167969 C 1.46875 9.914062 1.671875 9.710938 1.925781 9.710938 L 8.335938 9.710938 C 8.589844 9.710938 8.792969 9.503906 8.792969 9.253906 L 8.792969 6.046875 C 8.792969 5.792969 9 5.589844 9.253906 5.589844 Z M 11.914062 6.960938 C 11.867188 7.191406 11.765625 7.328125 11.628906 7.421875 C 11.488281 7.511719 11.269531 7.5625 11.042969 7.5625 L 11 7.5625 L 11 8.066406 L 11.726562 8.066406 L 11.726562 10.625 L 12.457031 10.625 L 12.457031 6.960938 Z M 4.902344 11.085938 C 4.492188 11.085938 4.210938 11.171875 4.03125 11.355469 C 3.847656 11.539062 3.757812 11.777344 3.757812 12.144531 L 3.757812 12.273438 L 4.488281 12.273438 L 4.488281 12 C 4.488281 11.910156 4.484375 11.816406 4.53125 11.769531 L 4.671875 11.628906 C 4.71875 11.582031 4.8125 11.585938 4.902344 11.585938 C 5.132812 11.585938 5.273438 11.722656 5.273438 12.042969 L 5.273438 12.316406 C 5.273438 12.359375 5.261719 12.453125 5.21875 12.5 C 5.171875 12.546875 5.136719 12.640625 5.089844 12.6875 L 4.902344 12.871094 L 4.585938 13.144531 C 4.449219 13.28125 4.304688 13.378906 4.214844 13.515625 C 4.078125 13.609375 3.988281 13.738281 3.945312 13.875 L 3.800781 14.289062 C 3.753906 14.425781 3.757812 14.566406 3.757812 14.746094 L 6.046875 14.746094 L 6.046875 14.148438 L 4.671875 14.148438 C 4.671875 14.101562 4.714844 14.007812 4.714844 13.917969 L 5.675781 12.957031 C 5.765625 12.867188 5.816406 12.777344 5.859375 12.6875 C 5.90625 12.59375 5.960938 12.507812 5.960938 12.414062 C 6.007812 12.324219 6.003906 12.222656 6.003906 12.085938 C 6.003906 11.765625 5.914062 11.539062 5.730469 11.355469 C 5.550781 11.171875 5.269531 11.085938 4.902344 11.085938 Z M 19.140625 12.914062 C 18.820312 12.914062 18.550781 13.003906 18.367188 13.1875 C 18.183594 13.371094 18.097656 13.652344 18.097656 14.019531 L 18.78125 14.019531 L 18.78125 13.789062 C 18.78125 13.742188 18.78125 13.648438 18.824219 13.601562 L 18.953125 13.460938 C 19 13.414062 19.050781 13.417969 19.140625 13.417969 C 19.277344 13.417969 19.367188 13.425781 19.414062 13.515625 C 19.460938 13.5625 19.511719 13.691406 19.511719 13.875 C 19.511719 13.964844 19.46875 14.011719 19.46875 14.105469 C 19.421875 14.195312 19.417969 14.242188 19.371094 14.289062 L 19.242188 14.433594 C 19.195312 14.480469 19.144531 14.476562 19.054688 14.476562 L 18.824219 14.476562 L 18.824219 14.976562 L 19.054688 14.976562 C 19.144531 14.976562 19.238281 14.972656 19.285156 15.019531 L 19.414062 15.164062 C 19.460938 15.210938 19.511719 15.257812 19.511719 15.347656 L 19.511719 15.804688 C 19.511719 15.851562 19.515625 15.933594 19.46875 15.976562 L 19.328125 16.121094 C 19.28125 16.167969 19.1875 16.164062 19.097656 16.164062 C 18.960938 16.164062 18.828125 16.070312 18.78125 15.976562 C 18.738281 15.839844 18.691406 15.714844 18.78125 15.578125 L 18.039062 15.578125 C 18.039062 15.945312 18.140625 16.210938 18.324219 16.394531 C 18.460938 16.574219 18.730469 16.664062 19.097656 16.664062 C 19.328125 16.664062 19.5625 16.625 19.699219 16.578125 C 19.835938 16.488281 19.964844 16.398438 20.054688 16.308594 C 20.148438 16.167969 20.195312 16.074219 20.242188 15.933594 C 20.289062 15.796875 20.285156 15.714844 20.285156 15.578125 C 20.285156 15.347656 20.246094 15.113281 20.15625 14.976562 C 20.066406 14.839844 19.871094 14.75 19.640625 14.703125 C 19.824219 14.65625 19.964844 14.570312 20.054688 14.433594 C 20.148438 14.296875 20.199219 14.105469 20.199219 13.875 C 20.199219 13.507812 20.109375 13.28125 19.929688 13.144531 C 19.746094 13.007812 19.460938 12.914062 19.140625 12.914062 Z M 19.140625 12.914062 "/></g></svg> 
				<span class="tsp_sidebar_item_title">%11$s</span>  
			</div>
			<a href="%12$s" class="tsp_sidebar_item"  target="_blank">
				<svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="20" height="20" viewBox="0 0 576 512" ><path fill="#8c8c8c" d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z"></path></svg>      
				<span class="tsp_sidebar_item_title">%13$s</span>  
			</a>
			<a href="%14$s" class="tsp_sidebar_item" data-tsp-item="contactus" target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" viewBox="0 0 30 30" version="1.1"><g id="surface1"><path style="fill-rule:nonzero;fill:#8c8c8c;fill-opacity:1;stroke-width:1;stroke-linecap:butt;stroke-linejoin:miter;stroke:#8c8c8c;stroke-opacity:1;stroke-miterlimit:4;" d="M 18 3.375 C 15.7 3.375 13.76875 4.975 13.2625 7.125 L 3 7.125 C 1.965625 7.125 1.125 7.965625 1.125 9 L 1.125 18.75 C 1.125 19.784375 1.965625 20.625 3 20.625 L 16.5 20.625 C 17.534375 20.625 18.375 19.784375 18.375 18.75 L 18.375 13.125 L 19.125 13.125 L 19.125 12.375 L 18 12.375 C 15.725 12.375 13.875 10.525 13.875 8.25 C 13.875 5.975 15.725 4.125 18 4.125 C 20.275 4.125 22.125 5.975 22.125 8.25 L 22.125 9.375 C 22.125 9.7875 21.7875 10.125 21.375 10.125 C 20.9625 10.125 20.625 9.7875 20.625 9.375 L 20.625 8.25 C 20.625 6.80625 19.44375 5.625 18 5.625 C 16.55625 5.625 15.375 6.80625 15.375 8.25 C 15.375 9.69375 16.55625 10.875 18 10.875 C 18.796875 10.875 19.5125 10.51875 19.99375 9.95625 C 20.21875 10.49375 20.753125 10.875 21.375 10.875 C 22.203125 10.875 22.875 10.203125 22.875 9.375 L 22.875 8.25 C 22.875 5.5625 20.6875 3.375 18 3.375 Z M 1.875 9.0375 L 6.40625 12.75 L 1.875 16.4625 Z M 17.625 18.75 C 17.625 19.371875 17.121875 19.875 16.5 19.875 L 3 19.875 C 2.378125 19.875 1.875 19.371875 1.875 18.75 L 1.875 17.425 L 7 13.234375 L 8.5625 14.5125 C 8.90625 14.79375 9.328125 14.934375 9.75 14.934375 C 10.171875 14.934375 10.59375 14.79375 10.9375 14.5125 L 12.5 13.234375 L 17.625 17.425 Z M 17.625 13.10625 L 17.625 16.45625 L 13.09375 12.75 L 14.45 11.578125 C 15.25625 12.440625 16.375 13.0125 17.625 13.10625 Z M 13.971875 10.99375 L 10.4625 13.934375 C 10.05 14.26875 9.45 14.26875 9.034375 13.934375 L 2.1375 8.284375 C 2.34375 8.0375 2.653125 7.875 3 7.875 L 13.14375 7.875 C 13.13125 8 13.125 8.125 13.125 8.25 C 13.125 9.265625 13.4375 10.2125 13.971875 10.99375 Z M 18 10.125 C 16.965625 10.125 16.125 9.284375 16.125 8.25 C 16.125 7.215625 16.965625 6.375 18 6.375 C 19.034375 6.375 19.875 7.215625 19.875 8.25 C 19.875 9.284375 19.034375 10.125 18 10.125 Z M 18 10.125 " transform="matrix(1.25,0,0,1.25,0,0)"/></g></svg>
				<span class="tsp_sidebar_item_title">%15$s</span>  
			</a>
		</aside>
		<main id="tsp_builder_main" class="tsp_flex_col">
			<header id="tsp_builder_head" class="tsp_flex_item"> 
				<div id="tsp_switch_sidebar" v-on:click="isOpen = !isOpen" class="tsp_switch_sidebar tsp_flex_col">
					<div id="tsp-toggle-btn">
						<span class="bar-top"></span>
						<span class="bar-mid"></span>
						<span class="bar-bot"></span>
					</div>
				</div>     
				<div class="tsp_buttons tsp_flex_row">
					%16$s
					<a href="%17$s" class="tsp_support tsp_flex_item"  target="_blank" title="TS Poll support forum">
						<div class="tsp_support-inner">
							<div class="tsp_support-icon">
								<i class="ts-poll ts-poll-fw ts-poll-comments"></i>
							</div>
							<div>%18$s</div>
						</div>
					</a>
					%19$s
				</div>
				<div class="tsp_back_wp tsp_flex_col">
					<a href="%20$s" id="TS_Poll_Back_Manager" class="tsp_flex_col" title="Back to Manager">
						<i class="ts-poll ts-poll-times"></i>
					</a>
				</div>
			</header>
			<section id="tsp_builder_content">
				%21$s
				%22$s
			</section>
		</main>
	</section>
  ',
	'new' === $this->tsp_build ? esc_attr( 'false' ) : '',
	esc_url( plugin_dir_url( __FILE__ ) . 'img/ts_poll_logo.png' ),
	'new' === $this->tsp_build ? esc_attr( 'tsp_active' ) : '',
	esc_attr__( 'Theme', 'tspoll' ),
	'edit' === $this->tsp_build ? esc_attr( 'tsp_active' ) : '',
	esc_attr__( 'Fields', 'tspoll' ),
	esc_attr__( 'Styles', 'tspoll' ),
	esc_attr__( 'Settings', 'tspoll' ),
	esc_attr__( 'Shortcode', 'tspoll' ),
	esc_attr__( 'Statistics', 'tspoll' ),
	esc_attr__( 'Votes count', 'tspoll' ),
	esc_url( 'https://total-soft.com/wp-poll/' ),
	esc_attr__( 'Go pro', 'tspoll' ),
	esc_url( 'https://total-soft.com/contact-us/' ),
	esc_attr__( 'Contact Us', 'tspoll' ),
	'new' === $this->tsp_build ? '' : 
	sprintf(
		'
    		<span id="tsp_question_title_e" v-on:click="changeQuestionTitle">
    		 	%1$s
    		</span>
    	',
		esc_html( html_entity_decode( htmlspecialchars_decode( $this->tsp_build_proporties['Question_Title'] ), ENT_QUOTES ) )
	),
	esc_url( 'https://wordpress.org/support/plugin/poll-wp/' ),
	esc_attr__( 'Support Forum', 'tspoll' ),
	'new' === $this->tsp_build ? '' : 
	sprintf(
		'
    	<div class="tsp_save_btn tsp_flex_item" v-on:click.prevent.stop="tspSavePoll">
			<div class="tsp_save_btn-inner">
				<div class="tsp_save_btn-icon">
					<i class="ts-poll ts-poll-folder-open ts-poll-fw"></i>
				</div>
				<div>%1$s</div>
			</div>
    	</div>
		',
		isset( $_GET['tsp-theme'] ) ? esc_html__( 'Save', 'tspoll' ) : esc_html__( 'Update', 'tspoll' )
	),
	esc_url( admin_url( 'admin.php?page=ts-poll' ) ),
	$tsp_content_builder,
	$tsp_icon_picker_html,
	esc_attr__( 'Result  Shortcode', 'tspoll' ),
	esc_attr__( 'Message Builder', 'tspoll' )
);
?>
