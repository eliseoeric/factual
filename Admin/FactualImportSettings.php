<?php

namespace Admin;

use lib\SubPage;

class FactualImportSettings extends SubPage {

	public function add_options_page_metabox()
	{
		parent::add_options_page_metabox();

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->menu_slug, )
			),
		) );
		// Set our CMB2 fields
		$cmb->add_field( array(
			'name' => __( 'Test Text', 'myprefix' ),
			'desc' => __( 'field description (optional)', 'myprefix' ),
			'id'   => 'test_text',
			'type' => 'text',
			'default' => 'Default Text',
		) );
		$cmb->add_field( array(
			'name'    => __( 'Test Color Picker', 'myprefix' ),
			'desc'    => __( 'field description (optional)', 'myprefix' ),
			'id'      => 'test_colorpicker',
			'type'    => 'colorpicker',
			'default' => '#bada55',
		) );
	}

	public function render_settings_page()
	{
		// here we will configure a form for fetching info
		// will divert logic to a controller that will pull data and import
	}

}