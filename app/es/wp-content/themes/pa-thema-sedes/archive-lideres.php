<?php

if ( ! FlavoursController::is_headquarter() ) {
	include 'template-archive-lideres-departamentos.php';
} else {
	include 'template-archive-lideres-sedes.php';
}
