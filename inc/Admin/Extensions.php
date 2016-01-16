<?php

class DWQA_Admin_Extensions {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'register_extension_menu' ) );
	}

	function register_extensions() {
		$extension = array(
			'dwqa-markdown' => array(
				'name' => __( 'DWQA Markdown', 'dwqa' ),
				'url' => 'https://www.designwall.com/wordpress/dwqa-extensions/dwqa-markdown/',
				'img_url' => 'https://www.designwall.com/wp-content/uploads/sites/2/edd/2016/01/dw-markdown-editor.png'
			),

			'dwqa-leaderboard' => array(
				'name' => __( 'DWQA Leaderboard', 'dwqa' ),
				'url' => 'https://www.designwall.com/wordpress/dwqa-extensions/dwqa-leaderboard/',
				'img_url' => 'https://www.designwall.com/wp-content/uploads/sites/2/edd/2016/01/dw-leaderboard.png',
			),

			'dwqa-captcha' => array(
				'name' => __( 'DWQA Captcha', 'dwqa' ),
				'url' => 'https://www.designwall.com/wordpress/dwqa-extensions/dwqa-captcha/',
				'img_url' => 'https://www.designwall.com/wp-content/uploads/sites/2/edd/2016/01/captcha.png',
			),

			'dwqa-embed-question' => array(
				'name' => __( 'DWQA Embed Question', 'dwqa' ),
				'url' => 'https://www.designwall.com/wordpress/plugins/dwqa-embed-question/',
				'img_url' => 'https://www.designwall.com/wp-content/uploads/sites/2/edd/2015/11/dw-embedquestion.png'
			),
		);

		return $extension;
	}

	function register_extension_menu() {
		add_submenu_page( 'edit.php?post_type=dwqa-question', __( 'Extensions', 'dwqa' ), sprintf( '<span style="color: #d54e21;">%s</span>', __( 'Extensions', 'dwqa' ) ), 'manage_options', 'dwqa-extensions', array( $this, 'extension_menu_layout' ) );
	}

	function extension_menu_layout() {
		$extensions = $this->register_extensions();
		?>
		<div class="wrap">
			<h1>
				<?php echo get_admin_page_title() ?>
				<span class="title-count theme-count"><?php echo count( $extensions ); ?></span>
			</h1>
			<div class="theme-browser">
				<div class="themes">
					<?php foreach( $extensions as $slug => $info ) : ?>
						<div class="theme">
							<?php if ( !empty( $info['img_url'] ) ) : ?>
								<div class="theme-screenshot">
									<img src="<?php echo esc_url( $info['img_url'] ) ?>">
								</div>
							<?php else : ?>
								<div class="theme-screenshot blank"></div>
							<?php endif; ?>
							<div class="theme-author"></div>

							<h2 class="theme-name" id="<?php echo esc_attr( $slug ) ?>"><span><?php echo esc_attr( $info['name'] ) ?></span></h2>
							<div class="theme-actions">
								<a class="button button-primary" href="<?php echo esc_url( $info['url'] ) ?>"><?php _e( 'Get It Now!', 'dwqa' ); ?></a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php
	}
}

//new DWQA_Admin_Extensions();

?>