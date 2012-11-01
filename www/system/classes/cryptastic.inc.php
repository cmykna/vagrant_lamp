<?php
/**
 * Microsite Cryptastic Class
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
 * @subpackage System/Classes
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
 
/*
 ***************************************************************************
 *	This class contains all the methods needed to construct the
 *  cryptastic object for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	//require_once __FUNCT__."/general.inc.php"; <----uncomment for honeybadger, currently commented out for templates-1.0
/*
 ***************************************************************************
 *	CLASS CRYPTASTIC
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/cryptastic.php
 ***************************************************************************
		Cryptastic, by Andrew Johnson (2009).
		http://www.itnewb.com/user/Andrew
		
		~implemented by Kyle Crawford~

		You are free to use this code for personal/business use,
		without attribution, although it would be appreciated.

-----------------------------------------------------------------------

		CAUTION, CAUTION, CAUTION! USE AT YOUR OWN RISK!

		It's your duty to use good passwords, salts and keys; and come up
		with an adequately safe techinque to store and access them.
		
		HOW TO IMPLEMENT THE CRYPTASTIC METHODS -
		The below example uses JQuery .ajax() method with a GET instance
		
		EXAMPLE: refer to /tx/senderos/localIncludes/pdf-farm.php for client side implementation
		(Client Side)
		$pass = 'H0ught0nMIfLynHArKoRt';
		$salt = 'TxS3ndairOs';
		$key = $crypto->pbkdf2($pass, $salt, 1000, 32);
		$confirmCode = rawurlencode($crypto->encrypt("douNLoDe3dFs",$key));
		
		Then echo/print the $confirmCode where you need to use it
		
		EXAMPLE: refer to /tx/senderos/get-pdfs-query-2.php for server/query side implementation
		(Server/Query Side)
		
		if(isset($_GET['confirmCode']) {
			$confCode = $_GET['confirmCode'];	
		}
		
		$pass = 'H0ught0nMIfLynHArKoRt';
		$salt = 'TxS3ndairOs';
	 	$key = $crypto->pbkdf2($pass, $salt, 1000, 32);
		$confirmCode = $crypto->decrypt(rawurldecode($confCode),$key);
		
		if($confirmCode == "douNLoDe3dFs") {
			// execute query...
		}

-------------------------------------------------------------------------*/

	class cryptastic {
		
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Bucket Version 3.0.0";
	// Return the version of the class
	private function _getVersion() {
		return (string) $this->version;
	}
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}
/*
 ***************************************************************************
 *	ERROR REPORTING
 *	@method: errorReport($bool)
 *
 *	@var $bool
 *	@param mixed $bool
 *	@var boolean params: false, FALSE, 0
 *	@var boolean params: true , TRUE , 1
 *	@var default param: 0
 *
 *	NOT REQUIRED
*/
	public function errorReport($bool = NULL) {
		$input = booleanCheck($bool);
		$this->reporter = ($input != NULL) ? (int) $input : (int) 0;
		return ($this->reporter == 1) ? $this->_generateReport() : NULL;
	}
/*

		/** Encryption Procedure
		 *
		 *	@param   mixed    msg      message/data
		 *	@param   string   k        encryption key
		 *	@param   boolean  base64   base64 encode result
		 *
		 *	@return  string   iv+ciphertext+mac or
		 *           boolean  false on error
		*/
		public function encrypt( $msg, $k, $base64 = false ) {

			# open cipher module (do not change cipher/mode)
			if ( ! $td = mcrypt_module_open('rijndael-256', '', 'ctr', '') )
				return false;

			$msg = serialize($msg);							# serialize
			$iv  = mcrypt_create_iv(32, MCRYPT_RAND);		# create iv

			if ( mcrypt_generic_init($td, $k, $iv) !== 0 )	# initialize buffers
				return false;

			$msg  = mcrypt_generic($td, $msg);				# encrypt
			$msg  = $iv . $msg;								# prepend iv
			$mac  = $this->pbkdf2($msg, $k, 1000, 32);		# create mac
			$msg .= $mac;									# append mac

			mcrypt_generic_deinit($td);						# clear buffers
			mcrypt_module_close($td);						# close cipher module

			if ( $base64 ) $msg = base64_encode($msg);		# base64 encode?

			return $msg;									# return iv+ciphertext+mac
		}

		/** Decryption Procedure
		 *
		 *	@param   string   msg      output from encrypt()
		 *	@param   string   k        encryption key
		 *	@param   boolean  base64   base64 decode msg
		 *
		 *	@return  string   original message/data or
		 *           boolean  false on error
		*/
		public function decrypt( $msg, $k, $base64 = false ) {

			if ( $base64 ) $msg = base64_decode($msg);			# base64 decode?

			# open cipher module (do not change cipher/mode)
			if ( ! $td = mcrypt_module_open('rijndael-256', '', 'ctr', '') )
				return false;

			$iv  = substr($msg, 0, 32);							# extract iv
			$mo  = strlen($msg) - 32;							# mac offset
			$em  = substr($msg, $mo);							# extract mac
			$msg = substr($msg, 32, strlen($msg)-64);			# extract ciphertext
			$mac = $this->pbkdf2($iv . $msg, $k, 1000, 32);		# create mac

			if ( $em !== $mac )									# authenticate mac
				return false;

			if ( mcrypt_generic_init($td, $k, $iv) !== 0 )		# initialize buffers
				return false;

			$msg = mdecrypt_generic($td, $msg);					# decrypt
			$msg = unserialize($msg);							# unserialize

			mcrypt_generic_deinit($td);							# clear buffers
			mcrypt_module_close($td);							# close cipher module

			return $msg;										# return original msg
		}

		/** PBKDF2 Implementation (as described in RFC 2898);
		 *
		 *	@param   string  p   password
		 *	@param   string  s   salt
		 *	@param   int     c   iteration count (use 1000 or higher)
		 *	@param   int     kl  derived key length
		 *	@param   string  a   hash algorithm
		 *
		 *	@return  string  derived key
		*/
		public function pbkdf2( $p, $s, $c, $kl, $a = 'sha256' ) {

			$hl = strlen(hash($a, null, true));	# Hash length
			$kb = ceil($kl / $hl);				# Key blocks to compute
			$dk = '';							# Derived key

			# Create key
			for ( $block = 1; $block <= $kb; $block ++ ) {

				# Initial hash for this block
				$ib = $b = hash_hmac($a, $s . pack('N', $block), $p, true);

				# Perform block iterations
				for ( $i = 1; $i < $c; $i ++ ) 

					# XOR each iterate
					$ib ^= ($b = hash_hmac($a, $b, $p, true));

				$dk .= $ib; # Append iterated block
			}

			# Return derived key of correct length
			return substr($dk, 0, $kl);
		}
		
		private function _generateReport() {
			$this->report = "\r\n\t\t\t<h1><em><em>Cryptastic Values</em></em></h1>";
			$this->report .= "\r\n\t\t\t<ul>";
			$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
			$this->report .= "\r\n\t\t\t\t<li><em><em>bucketCount:</em></em> ".htmlspecialchars(ltrim($this->encrypt))."</li>";
			$this->report .= "\r\n\t\t\t\t<li><em><em>bucketCount:</em></em> ".htmlspecialchars(ltrim($this->decrypt))."</li>";
			$this->report .= "\r\n\t\t\t\t<li><em><em>bucketCount:</em></em> ".htmlspecialchars(ltrim($this->pbkdf2))."</li>";
			$this->report .=  "\r\n\t\t\t</ul>";
			return $this->report;		
		}		
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file cryptastic.inc.php */
/* Location: system/classes/cryptastic.inc.php */
?>