<?php
/**
 * Microsite System Folder
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
 * @subpackage System
 * @since Microsite 2.0.0
 * @version 3.0.0 (honeybadger)
 */
/*

Description:
The purpose of this readme is to give you an understanding of the new system structure,
what is allowed where and to keep assets stored correctly and consistently. It is also 
here to serve as a guideline that ALL of the HMH developers need to follow for
consistency, making all of our code uniform, and so we are all on the same page.
A consistent naming convention will be enforced as well. Please use camelCasing for
variables and readable-dashed-names for css. When writing out classes, Please try to 
type cast every variable as possible [i.e. (string) (int) (bool) etc]. In some instances 
this may not be possible. A thing to keep in mind is to think about your fellow developers
and project coordinators who touch these files, they may not be up to your skillset, so 
keep the code simple, easy to follow, and DON'T forget to document. Use templates-1.0 and 
system as a base reference of standards before you start coding away. If in doubt, check
with your team.

This is a living draft document.

File Structure:
/system/application/ : Where the default files will route through on its way to a
			   working microsite (i.e. /build/) 
				
	/system/application/localIncludes/ : Where the default localIncludes files will
							  route through on its way to a working microsite.

/system/assets/ : Where ONLY the /build and /system assets will be stored.

	/system/assets/buttons/ : Where ONLY /build and /system buttons will be stored.

	/system/assets/css/ : Where ONLY the /build and /system css will be stored.
			   There should ONLY be three files stored here at this root.
			   base.css.php : global desktop ONLY stylesheets which links to
			   				  /assets/css/desktop/
			   pad.css.php : global pad device ONLY stylesheets which links to
			   				 /assets/css/pad/
			   phone.css.php : global mobile phone ONLY stylesheets which links to
			   				   /assets/css/phone/

	/system/assets/fonts/ : Where ONLY the global font files will be stored.

	/system/assets/help/ : Where ONLY all of the class and /application documentation will
				be stored. The file names will reflect the name of the class or
				name of the corresponding file in /application.
				This should never be moved off INT.
				
	/system/assets/icons/ : Where ONLY the global icons will be stored.

	/system/assets/images/ : Where ONLY the /build and /system images will be stored.

	/system/assets/js/ : Where ONLY the global javascript and library files will be stored.

/system/classes/ : Where ONLY the global class files will be stored.

/system/dataSets/ : Where ONLY data sets like json or xml are stored.

/system/functions/ : Where ONLY the global functions are stored.

/system/templates/ : Where ONLY the html template files will be stored.

This framework is HTML5/CSS3 compatable and supports:
WinXP :
	Internet Explorer 6
	Internet Explorer 7
	Internet Explorer 8
	FireFox 3.5+
	Chrome 10+
		
Win7 :
	Internet Explorer 8
	Internet Explorer 9
	FireFox 6+
	Chrome 10+
	   
Mac 10.6.8 :
	Safari 5.1
	FireFox 3.6+
	Chrome 10+
	Opera 11.52
			 
iOS 4.2+ :
	Safari

*/
/* End of file README.php */
/* Location: system/README.php */
?>