<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

class Widget_Eael_Pricing_Table extends Widget_Base {

	public function get_name() {
		return 'eael-pricing-table';
	}

	public function get_title() {
		return esc_html__( 'EA Pricing Table', 'essential-addons-elementor' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

   public function get_categories() {
		return [ 'essential-addons-elementor' ];
	}

	protected function _register_controls() {

  		/**
  		 * Pricing Table Settings
  		 */
  		$this->start_controls_section(
  			'eael_section_pricing_table_settings',
  			[
  				'label' => esc_html__( 'Settings', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
		  'eael_pricing_table_style',
		  	[
		   	'label'       	=> esc_html__( 'Pricing Style', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'style-1',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'style-1'  	=> esc_html__( 'Default', 'essential-addons-elementor' ),
		     		'style-2' 	=> esc_html__( 'Pricing Style 2', 'essential-addons-elementor' ),
		     		'style-3' 	=> esc_html__( 'Pricing Style 3', 'essential-addons-elementor' ),
		     		'style-4' 	=> esc_html__( 'Pricing Style 4', 'essential-addons-elementor' ),
		     	],
		  	]
		);

		$this->add_control(
			'eael_pricing_table_style_pro_alert',
			[
				'label' => esc_html__( 'Only available in pro version!', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'eael_pricing_table_style' => ['style-3', 'style-4'],
				]
			]
		);

		/**
		 * Condition: 'eael_pricing_table_featured' => 'yes'
		 */
		$this->add_control(
			'eael_pricing_table_icon_enabled',
			[
				'label' => esc_html__( 'List Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'show',
				'default' => 'show',
			]
		);

  		$this->add_control(
			'eael_pricing_table_title',
			[
				'label' => esc_html__( 'Title', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Startup', 'essential-addons-elementor' )
			]
		);

		/**
		 * Condition: 'eael_pricing_table_style' => 'style-2'
		 */
		$this->add_control(
			'eael_pricing_table_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'A tagline here.', 'essential-addons-elementor' ),
				'condition' => [
					'eael_pricing_table_style' => [ 'style-2', 'style-3', 'style-4' ]
				]
			]
		);

		/**
		 * Condition: 'eael_pricing_table_style' => 'style-2'
		 */
		$this->add_control(
			'eael_pricing_table_style_2_icon',
			[
				'label' => esc_html__( 'Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-home',
				'condition' => [
					'eael_pricing_table_style' => 'style-2'
				]
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Price
  		 */
  		$this->start_controls_section(
  			'eael_section_pricing_table_price',
  			[
  				'label' => esc_html__( 'Price', 'essential-addons-elementor' )
  			]
  		);

		$this->add_control(
			'eael_pricing_table_price',
			[
				'label' => esc_html__( 'Price', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '99', 'essential-addons-elementor' )
			]
		);
		$this->add_control(
			'eael_pricing_table_onsale',
			[
				'label' => __( 'On Sale?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'essential-addons-elementor' ),
				'label_off' => __( 'No', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'eael_pricing_table_onsale_price',
			[
				'label' => esc_html__( 'Sale Price', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '89', 'essential-addons-elementor' ),
				'condition' => [
					'eael_pricing_table_onsale' => 'yes'
				]
			]
		);
  		$this->add_control(
			'eael_pricing_table_price_cur',
			[
				'label' => esc_html__( 'Price Currency', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '$', 'essential-addons-elementor' ),
			]
		);

		$this->add_control(
		  'eael_pricing_table_price_cur_placement',
		  	[
		   	'label'       	=> esc_html__( 'Currency Placement', 'essential-addons-elementor' ),
		     	'type' 			=> Controls_Manager::SELECT,
		     	'default' 		=> 'left',
		     	'label_block' 	=> false,
		     	'options' 		=> [
		     		'left'  	=> esc_html__( 'Left', 'essential-addons-elementor' ),
		     		'right'  	=> esc_html__( 'Right', 'essential-addons-elementor' ),
		     	],
		  	]
		);

		$this->add_control(
			'eael_pricing_table_price_period',
			[
				'label' => esc_html__( 'Price Period (per)', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'month', 'essential-addons-elementor' )
			]
		);

		$this->add_control(
			'eael_pricing_table_period_separator',
			[
				'label' => esc_html__( 'Period Separator', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( '/', 'essential-addons-elementor' )
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Feature
  		 */
  		$this->start_controls_section(
  			'eael_section_pricing_table_feature',
  			[
  				'label' => esc_html__( 'Feature', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
			'eael_pricing_table_items',
			[
				'type' => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default' => [
					[ 'eael_pricing_table_item' => 'Unlimited calls' ],
					[ 'eael_pricing_table_item' => 'Free hosting' ],
					[ 'eael_pricing_table_item' => '500 MB of storage space' ],
					[ 'eael_pricing_table_item' => '500 MB Bandwidth' ],
					[ 'eael_pricing_table_item' => '24/7 support' ]
				],
				'fields' => [
					[
						'name' => 'eael_pricing_table_item',
						'label' => esc_html__( 'List Item', 'essential-addons-elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Pricing table list item', 'essential-addons-elementor' )
					],
					[
						'name' => 'eael_pricing_table_list_icon',
						'label' => esc_html__( 'List Icon', 'essential-addons-elementor' ),
						'type' => Controls_Manager::ICON,
						'label_block' => false,
						'default' => 'fa fa-check',
					],
					[
						'name' => 'eael_pricing_table_icon_mood',
						'label' => esc_html__( 'Item Active?', 'essential-addons-elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'return_value' => 'yes',
						'default' => 'yes',
					],
					[
						'name' => 'eael_pricing_table_list_icon_color',
						'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
						'type' => Controls_Manager::COLOR,
						'default' => '#00C853',
					],
					[
						'name'			=> 'eael_pricing_item_tooltip',
						'label'			=> esc_html__( 'Enable Tooltip?', 'essential-addons-elementor' ),
						'type'			=> Controls_Manager::SWITCHER,
						'return_value'	=> 'yes',
						'default'		=> false
					],
					[
						'name'			=> 'eael_pricing_item_tooltip_content',
						'label'			=> esc_html__( 'Tooltip Content', 'essential-addons-elementor' ),
						'type'			=> Controls_Manager::TEXTAREA,
						'default'		=> __( "I'm a awesome tooltip!!", 'essential-addons-elementor' ),
						'condition'		=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'			=> 'eael_pricing_item_tooltip_side',
						'label'			=> esc_html__( 'Tooltip Side', 'essential-addons-elementor' ),
						'type'          => Controls_Manager::CHOOSE,
						'options' => [
							'left'       => [
								'title'    => __( 'Left', 'essential-addons-elementor' ),
								'icon'     => 'eicon-h-align-left',
							],
							'top'          => [
								'title'    => __( 'Top', 'essential-addons-elementor' ),
								'icon'     => 'eicon-v-align-top',
							],
							'right'       => [
								'title'    => __( 'Right', 'essential-addons-elementor' ),
								'icon'     => 'eicon-h-align-right',
							],
							'bottom'       => [
								'title'    => __( 'Bottom', 'essential-addons-elementor' ),
								'icon'     => 'eicon-v-align-bottom',
							],
						],
						'default'		=> 'top',
						'condition'		=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'			=> 'eael_pricing_item_tooltip_trigger',
						'label'			=> esc_html__( 'Tooltip Trigger', 'essential-addons-elementor' ),
						'type'          => Controls_Manager::SELECT2,
						'options'	=> [
							'hover'	=> __( 'Hover', 'essential-addons-elementor' ),
							'click'	=> __( 'Click', 'essential-addons-elementor' ),
						],
						'default'	=> 'hover',
						'condition'	=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'			=> 'eael_pricing_item_tooltip_animation',
						'label'			=> esc_html__( 'Tooltip Animation', 'essential-addons-elementor' ),
						'type'          => Controls_Manager::SELECT2,
						'options'	=> [
							'fade'	=> __( 'Fade', 'essential-addons-elementor' ),
							'grow'	=> __( 'Grow', 'essential-addons-elementor' ),
							'swing'	=> __( 'Swing', 'essential-addons-elementor' ),
							'slide'	=> __( 'Slide', 'essential-addons-elementor' ),
							'fall'	=> __( 'Fall', 'essential-addons-elementor' ),
						],
						'default'	=> 'fade',
						'condition'	=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'	=> 'pricing_item_tooltip_animation_duration',
						'label'	=> esc_html__( 'Animation Duration', 'essential-addons-elementor' ),
						'type'	=> Controls_Manager::TEXT,
						'default'	=> 300,
						'condition'	=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'			=> 'eael_pricing_table_toolip_arrow',
						'label'			=> esc_html__( 'Tooltip Arrow', 'essential-addons-elementor' ),
						'type'			=> Controls_Manager::SWITCHER,
						'return_value'	=> 'yes',
						'default'		=> 'yes',
						'condition'	=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
					[
						'name'			=> 'eael_pricing_item_tooltip_theme',
						'label'			=> esc_html__( 'Tooltip Theme', 'essential-addons-elementor' ),
						'type'          => Controls_Manager::SELECT2,
						'options'	=> [
							'default'	=> __( 'Default', 'essential-addons-elementor' ),
							'noir'		=> __( 'Noir', 'essential-addons-elementor' ),
							'light'		=> __( 'Light', 'essential-addons-elementor' ),
							'punk'		=> __( 'Punk', 'essential-addons-elementor' ),
							'shadow'	=> __( 'Shadow', 'essential-addons-elementor' ),
							'borderless'=> __( 'Borderless', 'essential-addons-elementor' ),
						],
						'default'	=> 'noir',
						'condition'	=> [
							'eael_pricing_item_tooltip'	=> 'yes'
						]
					],
				],
				'title_field' => '{{eael_pricing_table_item}}',
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Footer
  		 */
  		$this->start_controls_section(
  			'eael_section_pricing_table_footerr',
  			[
  				'label' => esc_html__( 'Footer', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
			'eael_pricing_table_button_icon',
			[
				'label' => esc_html__( 'Button Icon', 'essential-addons-elementor' ),
				'type' => Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'eael_pricing_table_button_icon_alignment',
			[
				'label' => esc_html__( 'Icon Position', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'essential-addons-elementor' ),
					'right' => esc_html__( 'After', 'essential-addons-elementor' ),
				],
				'condition' => [
					'eael_pricing_table_button_icon!' => '',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_button_icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 60,
					],
				],
				'condition' => [
					'eael_pricing_table_button_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-button i.fa-icon-left' => 'margin-right: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing-button i.fa-icon-right' => 'margin-left: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_btn',
			[
				'label' => esc_html__( 'Button Text', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Choose Plan', 'essential-addons-elementor' ),
			]
		);

		$this->add_control(
			'eael_pricing_table_btn_link',
			[
				'label' => esc_html__( 'Button Link', 'essential-addons-elementor' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
        			'url' => '#',
        			'is_external' => '',
     			],
     			'show_external' => true,
			]
		);

  		$this->end_controls_section();

  		/**
  		 * Pricing Table Rebon
  		 */
  		$this->start_controls_section(
  			'eael_section_pricing_table_featured',
  			[
  				'label' => esc_html__( 'Ribbon', 'essential-addons-elementor' )
  			]
  		);

  		$this->add_control(
			'eael_pricing_table_featured',
			[
				'label' => esc_html__( 'Featured?', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'eael_pricing_table_featured_styles',
			[
				'label' => esc_html__( 'Ribbon Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ribbon-1',
				'options' => [
					'ribbon-1' => esc_html__( 'Style 1', 'essential-addons-elementor' ),
					'ribbon-2' => esc_html__( 'Style 2', 'essential-addons-elementor' ),
					'ribbon-3' => esc_html__( 'Style 3', 'essential-addons-elementor' ),
				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
				],
			]
		);

		/**
		 * Condition: 'eael_pricing_table_featured_styles' => [ 'ribbon-2', 'ribbon-3' ], 'eael_pricing_table_featured' => 'yes'
		 */
		$this->add_control(
			'eael_pricing_table_featured_tag_text',
			[
				'label' => esc_html__( 'Featured Tag Text', 'essential-addons-elementor' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => false,
				'default' => esc_html__( 'Featured', 'essential-addons-elementor' ),
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.featured:before' => 'content: "{{VALUE}}";',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.featured:before' => 'content: "{{VALUE}}";',
				],
				'condition' => [
					'eael_pricing_table_featured_styles' => [ 'ribbon-2', 'ribbon-3' ],
					'eael_pricing_table_featured' => 'yes'
				]
			]
		);

  		$this->end_controls_section();

  		$this->start_controls_section(
			'eael_section_pro',
			[
				'label' => __( 'Go Premium for More Features', 'essential-addons-elementor' )
			]
		);

        $this->add_control(
            'eael_control_get_pro',
            [
                'label' => __( 'Unlock more possibilities', 'essential-addons-elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( '', 'essential-addons-elementor' ),
						'icon' => 'fa fa-unlock-alt',
					],
				],
				'default' => '1',
                'description' => '<span class="pro-feature"> Get the  <a href="https://essential-addons.com/elementor/buy.php" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
            ]
        );

        $this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_style_settings',
			[
				'label' => esc_html__( 'Pricing Table Style', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_pricing_table_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing .eael-pricing-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_container_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-pricing .eael-pricing-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_container_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-pricing .eael-pricing-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'eael_pricing_table_border',
				'label' => esc_html__( 'Border Type', 'essential-addons-elementor' ),
				'selector' => '{{WRAPPER}} .eael-pricing .eael-pricing-item',
			]
		);

		$this->add_control(
			'eael_pricing_table_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing .eael-pricing-item' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_pricing_table_shadow',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing .eael-pricing-item',
				],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_content_alignment',
			[
				'label' => esc_html__( 'Content Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'eael-pricing-content-align-',
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_content_button_alignment',
			[
				'label' => esc_html__( 'Button Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'essential-addons-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'prefix_class' => 'eael-pricing-button-align-',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Header)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_header_style_settings',
			[
				'label' => esc_html__( 'Header', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_pricing_table_title_heading',
			[
				'label' => esc_html__( 'Title Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'eael_pricing_table_title_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .header .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item:hover .header:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_style_2_title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#C8E6C9',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .header' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item .header' => 'background: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_style' => ['style-2']
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_style_1_title_line_color',
			[
				'label' => esc_html__( 'Line Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#dbdbdb',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item .header:after' => 'background: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_style' => ['style-1']
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'eael_pricing_table_title_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .header .title',
			]
		);

		$this->add_control(
			'eael_pricing_table_subtitle_heading',
			[
				'label' => esc_html__( 'Subtitle Style', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'eael_pricing_table_style!' => 'style-1'
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_subtitle_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .header .subtitle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_style!' => 'style-1'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             	'name' => 'eael_pricing_table_subtitle_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .header .subtitle',
				'condition' => [
					'eael_pricing_table_style!' => 'style-1'
				]
			]

		);

		$this->end_controls_section();


		/**
		 * -------------------------------------------
		 * Style (Pricing)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_title_style_settings',
			[
				'label' => esc_html__( 'Pricing', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_pricing_table_price_tag_onsale_heading',
			[
				'label' => esc_html__( 'Original Price', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'eael_pricing_table_pricing_onsale_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#999',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .muted-price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_pricing_table_price_tag_onsale_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .muted-price',
			]
		);

		$this->add_control(
			'eael_pricing_table_price_tag_heading',
			[
				'label' => esc_html__( 'Sale Price', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'eael_pricing_table_pricing_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .price-tag' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_pricing_table_price_tag_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .price-tag',
			]
		);

		$this->add_control(
			'eael_pricing_table_price_currency_heading',
			[
				'label' => esc_html__( 'Currency', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' =>  'before'
			]
		);

		$this->add_control(
			'eael_pricing_table_pricing_curr_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00C853',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .price-tag .price-currency' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_pricing_table_price_cur_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .price-currency',
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_price_cur_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-pricing-item .price-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		
		$this->add_control(
			'eael_pricing_table_pricing_period_heading',
			[
				'label' => esc_html__( 'Pricing Period', 'essential-addons-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'eael_pricing_table_pricing_period_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .price-period' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_pricing_table_price_preiod_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .price-period',
			]
		);


		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Feature List)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_style_featured_list_settings',
			[
				'label' => esc_html__( 'Feature List', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'eael_pricing_table_list_item_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing-item .body ul li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
            'name' => 'eael_pricing_table_list_item_typography',
				'selector' => '{{WRAPPER}} .eael-pricing-item .body ul li',
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Style (Ribbon)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_style_3_featured_tag_settings',
			[
				'label' => esc_html__( 'Ribbon', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'eael_pricing_table_style_1_featured_bar_color',
			[
				'label' => esc_html__( 'Line Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#00C853',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-1:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
					'eael_pricing_table_featured_styles' => 'ribbon-1'
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_style_1_featured_bar_height',
			[
				'label' => esc_html__( 'Line Height', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 3
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-1:before' => 'height: {{SIZE}}px;',
				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
					'eael_pricing_table_featured_styles' => 'ribbon-1'
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_featured_tag_font_size',
			[
				'label' => esc_html__( 'Font Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10
				],
				'range' => [
					'px' => [
						'max' => 18,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-2:before' => 'font-size: {{SIZE}}px;',

					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-3:before' => 'font-size: {{SIZE}}px;',

				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
					'eael_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_featured_tag_text_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-2:before' => 'color: {{VALUE}};',

					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-3:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
					'eael_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_featured_tag_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-1 .eael-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',

					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',

					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-3 .eael-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',

					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-2:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-2:after' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .eael-pricing.style-4 .eael-pricing-item.ribbon-3:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_featured' => 'yes',
					'eael_pricing_table_featured_styles' => ['ribbon-2', 'ribbon-3']
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Tooltip Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_tooltip_style',
			[
				'label' => esc_html__( 'Tooltip', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_arrow_bg',
			[
				'label'		=> esc_html__( 'Arrow Background', 'essential-addons-elementor' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '#3d3d3d',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background' => 'border-top-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border, .tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background' 	=> 'border-right-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background' => 'border-left-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip .tooltipster-box .tooltipster-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_tooltip_padding',
			[
				'label'	=> esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type'	=> Controls_Manager::DIMENSIONS,
				'size_units'	=> 'px',
				'description'	=> __( 'Refresh your browser after saving the padding value for see changes.', 'essential-addons-elementor' ),
				'selectors'		=> [
	 				'div.tooltipster-base.tooltipster-sidetip .tooltipster-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'		=> 'eael_pricing_table_tooltip_border',
				'label'		=> esc_html__( 'Border Type', 'essential-addons-elementor' ),
				'selector'	=> '.tooltipster-base.tooltipster-sidetip .tooltipster-box'
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units'	=> [ 'px', '%' ],
				'range' => [
					'%'	=> [
						'max'	=> 100,
						'step'	=> 1
					],
					'px' => [
						'max'	=> 200,
						'step'	=> 1
					],
				],
				'selectors' => [
					'.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'border-radius: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_arrow_heading',
			[
				'label'		=> __( 'Tooltip Arrow', 'essential-addons-elementor' ),
				'separator'	=> 'before',
				'type'		=> Controls_Manager::HEADING
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_arrow_size',
			[
				'label' => esc_html__( 'Arrow Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'	=> 45,
						'step'	=> 1
					],
				],
				'selectors' => [

					// Right Position Arrow
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); left: calc( (-{{SIZE}}px * 2) / 2 );',
					'div.tooltipster-sidetip.tooltipster-right .tooltipster-box'	=> 'margin-left: calc({{SIZE}}px - 10px);',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background,.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Left Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-left .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); right: calc( (-{{SIZE}}px * 2) / 2 );',
					'div.tooltipster-sidetip.tooltipster-left .tooltipster-box'	=> 'margin-right: calc({{SIZE}}px - 1px);',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Top Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-top .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%;top: 100%;',
					'div.tooltipster-sidetip.tooltipster-top .tooltipster-box'	=> 'margin-bottom: -1px;',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Bottom Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-bottom .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%; top: auto; bottom: 88%;',

					'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background,
					.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

				],
			]
		);
		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Pricing Table Icon Style)
		 * Condition: 'eael_pricing_table_style' => 'style-2'
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'eael_pricing_table_style' => 'style-2'
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_bg_show',
			[
				'label' => __( 'Show Background', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Show', 'essential-addons-elementor' ),
				'label_off' => __( 'Hide', 'essential-addons-elementor' ),
				'return_value' => 'yes',
			]
		);

		/**
		 * Condition: 'eael_pricing_table_icon_bg_show' => 'yes'
		 */
		$this->add_control(
			'eael_pricing_table_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_icon_bg_show' => 'yes'
				]
			]
		);

		/**
		 * Condition: 'eael_pricing_table_icon_bg_show' => 'yes'
		 */
		$this->add_control(
			'eael_pricing_table_icon_bg_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item:hover .eael-pricing-icon .icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_icon_bg_show' => 'yes'
				],
				'separator'=> 'after',
			]
		);


		$this->add_control(
			'eael_pricing_table_icon_settings',
			[
				'label' => esc_html__( 'Icon Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30
				],
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon i' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_area_width',
			[
				'label' => esc_html__( 'Icon Area Width', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon' => 'width: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_area_height',
			[
				'label' => esc_html__( 'Icon Area Height', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon' => 'height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_line_height',
			[
				'label' => esc_html__( 'Icon Alignment', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 80
				],
				'range' => [
					'px' => [
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon i' => 'line-height: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item:hover .eael-pricing-icon .icon i' => 'color: {{VALUE}};',
				],
				'separator' => 'after'
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'eael_pricing_table_icon_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon',
				]
		);

		$this->add_control(
			'eael_pricing_table_icon_border_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item:hover .eael-pricing-icon .icon' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'eael_pricing_table_icon_border_border!' => ''
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
				],
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eael-pricing.style-2 .eael-pricing-item .eael-pricing-icon .icon' => 'border-radius: {{SIZE}}%;',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * -------------------------------------------
		 * Tab Style (Button Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_btn_style_settings',
			[
				'label' => esc_html__( 'Button', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_btn_padding',
			[
				'label' => esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-pricing .eael-pricing-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_btn_margin',
			[
				'label' => esc_html__( 'Margin', 'essential-addons-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
	 					'{{WRAPPER}} .eael-pricing .eael-pricing-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
	         'name' => 'eael_pricing_table_btn_typography',
				'selector' => '{{WRAPPER}} .eael-pricing .eael-pricing-button',
			]
		);

		$this->start_controls_tabs( 'eael_cta_button_tabs' );

			// Normal State Tab
			$this->start_controls_tab( 'eael_pricing_table_btn_normal', [ 'label' => esc_html__( 'Normal', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_pricing_table_btn_normal_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_pricing_table_btn_normal_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#00C853',
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
			Group_Control_Border::get_type(),
				[
					'name' => 'eael_pricing_table_btn_border',
					'label' => esc_html__( 'Border', 'essential-addons-elementor' ),
					'selector' => '{{WRAPPER}} .eael-pricing .eael-pricing-button',
				]
			);

			$this->add_control(
				'eael_pricing_table_btn_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'max' => 50,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button' => 'border-radius: {{SIZE}}px;',
					],
				]
			);

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'eael_pricing_table_btn_hover', [ 'label' => esc_html__( 'Hover', 'essential-addons-elementor' ) ] );

			$this->add_control(
				'eael_pricing_table_btn_hover_text_color',
				[
					'label' => esc_html__( 'Text Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#f9f9f9',
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button:hover' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_pricing_table_btn_hover_bg_color',
				[
					'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#03b048',
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button:hover' => 'background: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'eael_pricing_table_btn_hover_border_color',
				[
					'label' => esc_html__( 'Border Color', 'essential-addons-elementor' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .eael-pricing .eael-pricing-button:hover' => 'border-color: {{VALUE}};',
					],
				]

			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'eael_cta_button_shadow',
				'selector' => '{{WRAPPER}} .eael-pricing .eael-pricing-button',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

/**
		 * -------------------------------------------
		 * Tab Style (Tooltip Style)
		 * -------------------------------------------
		 */
		$this->start_controls_section(
			'eael_section_pricing_table_tooltip_style',
			[
				'label' => esc_html__( 'Tooltip', 'essential-addons-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'background-color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_arrow_bg',
			[
				'label'		=> esc_html__( 'Arrow Background', 'essential-addons-elementor' ),
				'type'		=> Controls_Manager::COLOR,
				'default'	=> '#3d3d3d',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background' => 'border-top-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border, .tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background' 	=> 'border-right-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background' => 'border-left-color: {{VALUE}};',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border,
					div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background' => 'border-bottom-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_color',
			[
				'label' => esc_html__( 'Color', 'essential-addons-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'div.tooltipster-base.tooltipster-sidetip .tooltipster-box .tooltipster-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'eael_pricing_table_tooltip_padding',
			[
				'label'	=> esc_html__( 'Padding', 'essential-addons-elementor' ),
				'type'	=> Controls_Manager::DIMENSIONS,
				'size_units'	=> 'px',
				'description'	=> __( 'Refresh your browser after saving the padding value for see changes.', 'essential-addons-elementor' ),
				'selectors'		=> [
	 				'div.tooltipster-base.tooltipster-sidetip .tooltipster-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	 			],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'		=> 'eael_pricing_table_tooltip_border',
				'label'		=> esc_html__( 'Border Type', 'essential-addons-elementor' ),
				'selector'	=> '.tooltipster-base.tooltipster-sidetip .tooltipster-box'
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units'	=> [ 'px', '%' ],
				'range' => [
					'%'	=> [
						'max'	=> 100,
						'step'	=> 1
					],
					'px' => [
						'max'	=> 200,
						'step'	=> 1
					],
				],
				'selectors' => [
					'.tooltipster-base.tooltipster-sidetip .tooltipster-box' => 'border-radius: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'eael_pricing_table_tooltip_arrow_heading',
			[
				'label'		=> __( 'Tooltip Arrow', 'essential-addons-elementor' ),
				'separator'	=> 'before',
				'type'		=> Controls_Manager::HEADING
			]
		);

		// TODO: Working on this
		$this->add_control(
			'eael_pricing_table_tooltip_arrow_size',
			[
				'label' => esc_html__( 'Arrow Size', 'essential-addons-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max'	=> 45,
						'step'	=> 1
					],
				],
				'selectors' => [

					// Right Position Arrow
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow' => 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); left: calc( (-{{SIZE}}px * 2) / 2 );',
					'div.tooltipster-sidetip.tooltipster-right .tooltipster-box'	=> 'margin-left: calc({{SIZE}}px - 10px);',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-background,.tooltipster-sidetip.tooltipster-right .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Left Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-left .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-top: calc( (-{{SIZE}}px * 2) / 2 ); right: calc( (-{{SIZE}}px * 2) / 2 );',
					'div.tooltipster-sidetip.tooltipster-left .tooltipster-box'	=> 'margin-right: calc({{SIZE}}px - 1px);',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-left .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-left .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Top Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-top .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%;top: 100%;',
					'div.tooltipster-sidetip.tooltipster-top .tooltipster-box'	=> 'margin-bottom: -1px;',
					'div.tooltipster-base.tooltipster-sidetip.tooltipster-top .tooltipster-arrow-background, .tooltipster-sidetip.tooltipster-top .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

					// Bottom Position Arrow
					'.tooltipster-sidetip.tooltipster-base.tooltipster-bottom .tooltipster-arrow'	=> 'width: calc( {{SIZE}}px * 2); height: calc( {{SIZE}}px * 2); margin-left: calc( (-{{SIZE}}px * 2) / 2 ); left: 40%; top: auto; bottom: 88%;',
					
					// 'div.tooltipster-sidetip.tooltipster-bottom .tooltipster-box'	=> 'margin-top: calc( {{SIZE}}px + 5px );',

					'div.tooltipster-base.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-background,
					.tooltipster-sidetip.tooltipster-bottom .tooltipster-arrow-border' => 'border: {{SIZE}}px solid transparent;',

				],
			]
		);
		$this->end_controls_section();

	}

	protected function render_feature_list( $settings ) {
		if( empty($settings['eael_pricing_table_items']) ) return;

		$counter = 0;
		?>
		<ul>
			<?php
				foreach( $settings['eael_pricing_table_items'] as $item ) :
				
					if( 'yes' === $item['eael_pricing_table_icon_mood'] ) {
						$this->add_render_attribute('pricing_feature_item'.$counter, 'class', 'disable-item');
					}
					
					if( 'yes' === $item['eael_pricing_item_tooltip'] ) {
						$this->add_render_attribute('pricing_feature_item'.$counter,
							[
								'class' => 'tooltip',
								'title'	=> $item['eael_pricing_item_tooltip_content'],
								'id'	=> $this->get_id() . $counter
							]
						);
					}

					if( 'yes' == $item['eael_pricing_item_tooltip'] ) {
						
						if( $item['eael_pricing_item_tooltip_side'] ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-side', $item['eael_pricing_item_tooltip_side'] );
						}
						
						if( $item['eael_pricing_item_tooltip_trigger'] ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-trigger', $item['eael_pricing_item_tooltip_trigger'] );
						}
						
						if( $item['eael_pricing_item_tooltip_animation'] ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-animation', $item['eael_pricing_item_tooltip_animation'] );
						}
						
						if( ! empty( $item['pricing_item_tooltip_animation_duration'] ) ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-animation_duration', $item['pricing_item_tooltip_animation_duration'] );
						}

						if( ! empty( $item['eael_pricing_table_toolip_arrow'] ) ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-arrow', $item['eael_pricing_table_toolip_arrow'] );
						}

						if( ! empty( $item['eael_pricing_item_tooltip_theme'] ) ) {
							$this->add_render_attribute( 'pricing_feature_item'.$counter, 'data-theme', $item['eael_pricing_item_tooltip_theme'] );
						}

					}
			?>
				<li <?php echo $this->get_render_attribute_string('pricing_feature_item'.$counter); ?>>
					<?php if( 'show' === $settings['eael_pricing_table_icon_enabled'] ) : ?>
					<span class="li-icon" style="color:<?php echo esc_attr( $item['eael_pricing_table_list_icon_color'] ); ?>"><i class="<?php echo esc_attr( $item['eael_pricing_table_list_icon'] ); ?>"></i></span>
					<?php endif; ?>
					<?php echo $item['eael_pricing_table_item']; ?>
				</li>
			<?php $counter++; endforeach; ?>
		</ul>
		<?php
	}


	protected function render() {

   	$settings = $this->get_settings();
      $pricing_table_image = $this->get_settings( 'eael_pricing_table_image' );
	  	$pricing_table_image_url = Group_Control_Image_Size::get_attachment_image_src( $pricing_table_image['id'], 'thumbnail', $settings );
		$target = $settings['eael_pricing_table_btn_link']['is_external'] ? 'target="_blank"' : '';
		$nofollow = $settings['eael_pricing_table_btn_link']['nofollow'] ? 'rel="nofollow"' : '';
		if( 'yes' === $settings['eael_pricing_table_featured'] ) : $featured_class = 'featured '.$settings['eael_pricing_table_featured_styles']; else : $featured_class = ''; endif;

		if( 'yes' === $settings['eael_pricing_table_onsale'] ) {
			if( $settings['eael_pricing_table_price_cur_placement'] == 'left' ) {
				$pricing = '<del class="muted-price"><span class="muted-price-currency">'.$settings['eael_pricing_table_price_cur'].'</span>'.$settings['eael_pricing_table_price'].'</del> <span class="price-currency">'.$settings['eael_pricing_table_price_cur'].'</span>'.$settings['eael_pricing_table_onsale_price'];
			}else if( $settings['eael_pricing_table_price_cur_placement'] == 'right' ) {
				$pricing = '<del class="muted-price">'.$settings['eael_pricing_table_price'].'<span class="muted-price-currency">'.$settings['eael_pricing_table_price_cur'].'</span></del> '.$settings['eael_pricing_table_onsale_price'].'<span class="price-currency">'.$settings['eael_pricing_table_price_cur'].'</span>';
			}
		}else {
			if( $settings['eael_pricing_table_price_cur_placement'] == 'left' ) {
				$pricing = '<span class="price-currency">'.$settings['eael_pricing_table_price_cur'].'</span>'.$settings['eael_pricing_table_price'];
			}else if( $settings['eael_pricing_table_price_cur_placement'] == 'right' ) {
				$pricing = $settings['eael_pricing_table_price'].'<span class="price-currency">'.$settings['eael_pricing_table_price_cur'].'</span>';
			}
		}
	?>
	<?php if( 'style-1' === $settings['eael_pricing_table_style'] || 'style-3' === $settings['eael_pricing_table_style'] || 'style-4' === $settings['eael_pricing_table_style'] ) : ?>
	<div class="eael-pricing style-1">
	    <div class="eael-pricing-item <?php echo esc_attr( $featured_class ); ?>">
	        <div class="header">
	            <h2 class="title"><?php echo $settings['eael_pricing_table_title']; ?></h2>
	        </div>
	        <div class="eael-pricing-tag">
	            <span class="price-tag"><?php echo $pricing; ?></span>
	            <span class="price-period"><?php echo $settings['eael_pricing_table_period_separator']; ?> <?php echo $settings['eael_pricing_table_price_period']; ?></span>
	        </div>
	        <div class="body">
	            <?php $this->render_feature_list( $settings ); ?>
	        </div>
	        <div class="footer">
		    	<a href="<?php echo esc_url( $settings['eael_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="eael-pricing-button">
		    		<?php if( 'left' == $settings['eael_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['eael_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['eael_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['eael_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['eael_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['eael_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
	    </div>
	</div>
	<?php elseif( 'style-2' === $settings['eael_pricing_table_style'] ) : ?>
	<div class="eael-pricing style-2">
	    <div class="eael-pricing-item <?php echo esc_attr( $featured_class ); ?>">
	        <div class="eael-pricing-icon">
	            <span class="icon" style="background:<?php if('yes' != $settings['eael_pricing_table_icon_bg_show']) : echo 'none'; endif;  ?>;"><i class="<?php echo esc_attr( $settings['eael_pricing_table_style_2_icon'] ); ?>"></i></span>
	        </div>
	        <div class="header">
	            <h2 class="title"><?php echo $settings['eael_pricing_table_title']; ?></h2>
	            <span class="subtitle"><?php echo $settings['eael_pricing_table_sub_title']; ?></span>
	        </div>
	        <div class="eael-pricing-tag">
	            <span class="price-tag"><?php echo $pricing; ?></span>
	            <span class="price-period"><?php echo $settings['eael_pricing_table_period_separator']; ?> <?php echo $settings['eael_pricing_table_price_period']; ?></span>
	        </div>
	        <div class="body">
	            <?php $this->render_feature_list( $settings ); ?>
	        </div>
	        <div class="footer">
		    	<a href="<?php echo esc_url( $settings['eael_pricing_table_btn_link']['url'] ); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> class="eael-pricing-button">
		    		<?php if( 'left' == $settings['eael_pricing_table_button_icon_alignment'] ) : ?>
						<i class="<?php echo esc_attr( $settings['eael_pricing_table_button_icon'] ); ?> fa-icon-left"></i>
						<?php echo $settings['eael_pricing_table_btn']; ?>
					<?php elseif( 'right' == $settings['eael_pricing_table_button_icon_alignment'] ) : ?>
						<?php echo $settings['eael_pricing_table_btn']; ?>
		        		<i class="<?php echo esc_attr( $settings['eael_pricing_table_button_icon'] ); ?> fa-icon-right"></i>
		        	<?php endif; ?>
		    	</a>
		    </div>
	    </div>
	</div>
	<?php endif; ?>
	<?php
	}

	protected function content_template() {

		?>


		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_Eael_Pricing_Table() );