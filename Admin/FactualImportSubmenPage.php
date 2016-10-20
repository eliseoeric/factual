<?php
namespace Admin;

class FactualImportSubmenuPage extends Submenu {

	protected $importer;

	public function __construct( $options, FactualImporter $importer ) {
		parent::__construct( $options );
		$this->importer = $importer;
	}

	public function init()
	{
		parent::init();
		$this->importer->init();
	}

	public function render()
	{
		include_once( 'views/factual-import.php' );
	}
}