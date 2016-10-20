<?php 
namespace Admin;

abstract class Submenu {
	protected $page_title;
	protected $menu_title;
	protected $capability;
	protected $menu_slug;

	public function __construct( $options )
	{
	    extract( $options );

		$this->page_title;
		$this->menu_title;
		$this->capability;
		$this->menu_slug;
	}

	public function init()
	{
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	public function add_options_page() {
		$this->add_options_page(
			$this->page_title,
			$this->menu_title,
			$this->capability,
			$this->menu_slug,
			array( $this, 'render' )
		);
	}
}