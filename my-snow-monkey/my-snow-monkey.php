<?php
/**
 * Plugin name: My Snow Monkey
 * Description: Snow Monkey 用カスタマイズコード。
 * Version: 0.1.2
 *
 * @package my-snow-monkey
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $theme->template && 'snow-monkey/resources' !== $theme->template ) {
	return;
}

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_style(
			'my-snow-monkey',
			untrailingslashit( plugin_dir_url( __FILE__ ) ) . '/css/style.css',
			[ Framework\Helper::get_main_style_handle() ],
			filemtime( plugin_dir_path( __FILE__ ) )
		);
	}
);

add_action(
	'after_setup_theme',
	function() {
		add_editor_style( '/../../plugins/my-snow-monkey/css/editor-style.css' );
	}
);