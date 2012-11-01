<?php
/**
 * Microsite Cryptastic Default
 *
 * @author HMH Web Team
 * @author Bryan Schultz bryan.schultz@hmhpub.com
 * @author Terence Bodola terence.bodola@hmhpub.com
 * @author Kyle Crawford kyle.crawford@hmhpub.com
 * @author Seth Cardoza seth.cardoza@hmhpub.com
 * @author Chris Cykana christopher.cykana@hmhpub.com
 *
 * @copyright Copyright (c) 1995-2011 Houghton Mifflin Harcourt. All rights reserved.
 *
 *
 * @package Microsite System Templates
 * @subpackage System/Application/LocalIncludes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */

/*
 ***************************************************************************
 *	This contains all the values needed for the cryptastic configuration
 *
 *	Include Class file
 *	system/classes/cryptastic.inc.php
 ***************************************************************************
*/
	require_once __CLSS__."/cryptastic.inc.php";
/*
 ***************************************************************************
 *	CREATE BUCKETS OBJECT FOR INDEX PAGE
 *	DO NOT EDIT THE VALUES BELOW
 ***************************************************************************
*/
	$crypto = new cryptastic();
/*
 ***************************************************************************
 *	THIS IS THE CONFIGURATION AREA FOR CRYPTASTIC SPECIFIC VARIABLES
 *	CONTAINS THE OBJECT METHODS
 ***************************************************************************
 *	
 *	@method: encrypt($msg, $k, $base64 = false)
 *  Encryption Procedure
 *
 *	@param   mixed    $msg      message/data
 *	@param   string   $k        encryption key
 *	@param   boolean  $base64   base64 encode result
 *
 *	@return  string   iv+ciphertext+mac or
 *           boolean  false on error
 *
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 1
*/
	$crypto->encrypt($msg, $k, $base64 = false);
/*
 ***************************************************************************
 *	
 *  @method: decrypt($msg, $k, $base64 = false)
 *  Decryption Procedure
 *
 *	@param   string   $msg      output from encrypt()
 *	@param   string   $k        encryption key
 *	@param   boolean  $base64   base64 decode msg
 *
 *	@return  string   original message/data or
 *           boolean  false on error
 *
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 2
*/
	  $crypto->decrypt($msg, $k, $base64 = false);
/*
 ***************************************************************************
 *	@method: pbkdf2($p, $s, $c, $kl, $a = 'sha256')
 *
 * PBKDF2 Implementation (as described in RFC 2898);
 *
 *	@param   string  $p   password
 *	@param   string  $s   salt
 *	@param   int     $c   iteration count (use 1000 or higher)
 *	@param   int     $kl  derived key length
 *	@param   string  $a   hash algorithm
 *
 *	@return  string  derived key
 *
 *	NOT REQUIRED
 *	ORDER NUMBER 3
*/
	$crypto->pbkdf2($p, $s, $c, $kl, $a = 'sha256');
/*
 ***************************************************************************
 *
 *	TROUBLESHOOTING METHODS
*/
	$crypto->errorReport();
/*
 ***************************************************************************
*/		 
/* End of file cryptastic.php */
/* Location: system/application/localIncludes/cryptastic.php */
?>