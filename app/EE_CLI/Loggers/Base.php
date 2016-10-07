<?php

namespace EE_CLI\Loggers;
use EE_CLI\Process;

/**
 * Base logger class
 */
abstract class Base {

	protected $in_color = false;

	abstract public function info( $message );

	abstract public function success( $message );

	abstract public function warning( $message );

	/**
	 * Retrieve the runner instance from the base CLI object. This facilitates
	 * unit testing, where the EE_CLI instance isn't available
	 *
	 * @return Runner Instance of the runner class
	 */
	protected function get_runner() {
		return \EE_CLI::get_runner();
	}

	/**
	 * Write a message to STDERR, prefixed with "Debug: ".
	 *
	 * @param string $message Message to write.
	 */
	public function debug( $message ) {
		if ( $this->get_runner()->config['debug'] ) {
			$time = round( microtime( true ) - EE_CLI_START_MICROTIME, 3 );
			$this->_line( "$message ({$time}s)", 'Debug', '%B', STDERR );
		}
	}

	/**
	 * Write a string to a resource.
	 *
	 * @param resource $handle Commonly STDOUT or STDERR.
	 * @param string $str Message to write.
	 */
	protected function write( $handle, $str ) {
		fwrite( $handle, $str );
		Process::write_log( $str );
	}

	/**
	 * Output one line of message to a resource.
	 *
	 * @param string $message Message to write.
	 * @param string $label Prefix message with a label.
	 * @param string $color Colorize label with a given color.
	 * @param resource $handle Resource to write to. Defaults to STDOUT.
	 */
	protected function _line( $message, $label, $color, $handle = STDOUT ) {
		$label = \cli\Colors::colorize( "$color$label:%n", $this->in_color );
		$this->write( $handle, "$label $message\n" );
	}

}
