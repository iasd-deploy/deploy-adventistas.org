<?php

class FlavourControllerTest extends WP_UnitTestCase {

	function test_is_headerquarter() {

		//update_option('iasd-theme_flavour', $_POST['flavourPicker']);
		$this->assertFalse( FlavoursController::is_headquarter(), 'Default flavour is not headquarter' );

		update_option( 'iasd-theme_flavour', 'iasd-dsa-home' );
		$this->assertTrue( FlavoursController::is_headquarter(), 'iasd-dsa-home flavour is headquarter' );

		update_option( 'iasd-theme_flavour', 'dsa-sedes' );
		$this->assertTrue( FlavoursController::is_headquarter(), 'dsa-sedes flavour is headquarter' );

		update_option( 'iasd-theme_flavour', 'familia' );
		$this->assertFalse( FlavoursController::is_headquarter(), 'familia flavour is not headquarter' );

		$return_arr = array();
	}

}
