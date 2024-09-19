<?php namespace CAHNRSEventsPlugin;

class CAHNRSEventsPlugin {

	public static function get( $property ) {

		switch ( $property ) {

			case 'version':
				return CAHNRSEVENTSPLUGINVERSION;

			case 'dir':
				return plugin_dir_path( dirname( __FILE__ ) );

			default:
				return '';

		}

	}

	public static function init() {

		// Do plugin stuff here
		require_once __DIR__ . '/functions.php';
	}


}

CAHNRSEventsPlugin::init();