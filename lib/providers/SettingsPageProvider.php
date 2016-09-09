<?php

namespace lib\providers;

use Admin\FactualImportSettings;
use lib\ServiceProvider;

class SettingsPageProvider extends ServiceProvider{


	public function boot()
	{
		dd("Hello from SettingsPageProvider::boot!");
	}
	/**
	 * Register the service provider
	 * @return void
	 */
	public function register( )
	{
		$this->container->singleton( 'settings_page', function( $app ){
			return new FactualImportSettings( array(
				'is_parent' => true,
				'parent_slug' => 'options-general.php',
				'page_title' => 'Factual Import',
				'menu_title' => 'Factual Import',
				'capability' => 'manage_options',
				'menu_slug' => 'factual-import-settings',
				'option_group' => 'factual_import_option_group',
				'option_name' => 'factual_import_option_name',
				'metabox_id' => 'factual_import_metabox'
			) );
		});
	}
}