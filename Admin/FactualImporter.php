<?php
namespace Admin;

class FactualImporter {

	public function init()
	{
		add_action( 'admin_post', array( $this, 'maybe_import' ) );

		add_action( 'admin_notices', array( $this, 'import_status' ) );
	}

	public function maybe_import()
	{
		$status = '';

		if( ! ($this->has_valid_nonce() && current_user_can( 'manage_options' ) ) ) {
			$status = 'noauth';
		}

		if( null !== wp_unslash( $_POST['wave-begin-import'] ) ) {
			$status = $this->import();
		}

		$this->redirect( $status );
	}

	public function has_valid_nonce() {
		if( ! isset( $_POST['wave-begin-import'] ) ) {
			return false;
		}

		$field = wp_unslash( $_POST['wave-begin-import'] );
		$action = 'wave-factual-import';

		return wp_verify_nonce( $field, $action );
	}

	public function redirect( $status )
	{
		if( ! isset( $_POST['_wp_http_referrer'] ) ) {
			$_POST['_wp_http_referrer'] = wp_login_url();
		}

		$url = sanitize_text_field(
			wp_unslash( $_POST['_wp_http_referrer'] )
		);

		if( $status !== '' ) {
			$url .= '&import-status=' . $status;
		}

		wp_safe_redirect( urldecode( $url ) );
		exit;
	}

	private function import()
	{
		// get the listings from factual

		foreach($listings as $listing )
		{
			$new_listing = wp_insert_post( array(), true );

			if( $new_listing instanceof \WP_Error ) {
				$errors[] = array( 'post_title' => '' );
			}
		}

		$status = ( !empty( $errors ) ? 'failed' : 'success' );

		return $status;
	}

	public function import_status() {
		if( ! isset( $_GET['import-status'] ) ) {
			return;
		}

		$status = $_GET['import-status'];

		?>
		<div class="error notice">
			<p>Here is the status message.</p>
		</div>
		<?php
	}
}