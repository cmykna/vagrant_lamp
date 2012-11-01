<?php
/**
 * Microsite Forms Class
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
 *	This class contains all the methods needed to construct the form
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS BUCKETS
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/forms.php
 ***************************************************************************
*/
class Form
{
/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/	
	// Set the version number for the class
	// All classes should have this
	protected $version = "Microsite Form Version 3.0.0";
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
	
	
	public function form($id = NULL, $action = NULL, $method = NULL, $class = NULL) {
		
	
	
	}

	public function input($type = NULL, $label = NULL, $id = NULL, $active = NULL) {
		
	
	
	}


/*
 ***************************************************************************
 *	PRIVATE METHODS
*/
	private function _generateReport() {
		$this->report = "\r\n\t\t\t<h1><em><em>Form Values</em></em></h1>";
		$this->report .= "\r\n\t\t\t<ul>";
		$this->report .= "\r\n\t\t\t\t<li><em><em>Version:</em></em> ".htmlspecialchars(ltrim($this->version))."</li>";
		$this->report .=  "\r\n\t\t\t</ul>";
		return $this->report;		
	}
/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/
}
/* End of file form.inc.php */
/* Location: system/classes/form.inc.php */
?>