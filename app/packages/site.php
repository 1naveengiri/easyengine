<?php

/**
 * Manage sites.
 *
 * ## EXAMPLES
 *
 *     # Create site
 *     $ ee site create example.com
 *     Success: Created example.com site.
 *
 *     # Update site
 *     $ ee site update example.com
 *     Success: Updated example.com site.
 *
 *     # Delete site
 *     $ ee site delete example.com
 *     Success: Deleted example.com site.
 *
 * @package easyengine
 */
class Site_Command extends EE_CLI_Command {
	
	/**
	 * Create site.
	 * 
	 * ## OPTIONS
	 * 
	 * <name>
	 * : Name of the site to create.
	 * 
	 * [--wp]
	 * : To create WordPress site.
	 * 
	 * ## EXAMPLES
	 * 
	 *	  # Create site.
	 *	  $ ee site create example.com
	 *
	 */
	public function create( $args, $assoc_args ) {
		
		list( $site_name ) = $args;
		
		if ( ! empty( $site_name) ) {
			if( ! empty( $assoc_args['wp'] ) ) {
				EE_CLI::success( $site_name . ' WordPress site is created successfully!' );
			} else {
				EE_CLI::success( $site_name . ' site is created successfully!' );
			}
		} else {
			EE_CLI::error( 'Please give site name.' );
		}
	}
	
	/**
	 * Update site.
	 * 
	 * ## OPTIONS
	 * 
	 * <name>
	 * : Name of the site to update.
	 * 
	 * ## EXAMPLES
	 * 
	 *	  # update site.
	 *	  $ ee site update example.com
	 *
	 */
	public function update( $args, $assoc_args ) {
		
		list( $site_name ) = $args;
		
		if ( ! empty( $site_name) ) {
			EE_CLI::success( $site_name . ' site is updated successfully!' );
		} else {
			EE_CLI::error( 'Please give site name.' );
		}
	}
	
	/**
	 * Delete site.
	 * 
	 * ## OPTIONS
	 * 
	 * <name>
	 * : Name of the site to delete.
	 * 
	 * ## EXAMPLES
	 * 
	 *	  # Delete site.
	 *	  $ ee site delete example.com
	 *
	 */
	public function delete( $args, $assoc_args ) {
		
		list( $site_name ) = $args;
		
		if ( ! empty( $site_name) ) {
			EE_CLI::success( $site_name . ' site is deleted successfully!' );
		} else {
			EE_CLI::error( 'Please give site name.' );
		}
	}
}

EE_CLI::add_command( 'site', 'Site_Command' );