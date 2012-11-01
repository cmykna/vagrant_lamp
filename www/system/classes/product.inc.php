<?php
/**
 * Microsite Product Class
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
 *	This class contains all the methods needed to construct the elements
 *	for a microsite.
 *
 *	Include Generalized Global functions
 ***************************************************************************
*/
	require_once __FUNCT__."/general.inc.php";
/*
 ***************************************************************************
 *	CLASS ELEMENTS
 *	DEFAULT SETTINGS FOR METHODS ARE LOCATED AT
 *	system/application/localIncludes/elements.php
 ***************************************************************************
*/

class ProductList
{
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}

	private $displayProducts;
	private $db;
/**
	NOTE: currentDiscipline will go away once we move the script name to the slug
	Also, too much presentation all up ins. Should just return the PDO object and 
	let a view draw the list of stuff.
*/
	function __construct($currentDiscipline, $currentSlug, $db)
	{
		$this->currentDiscipline = $currentDiscipline;
		$this->currentSlug = $currentSlug;
		$this->db = $db;
	}

	public function display()
	{
		// $db = $this->db;
		// // Slurp and print page header from first item in currentSlug
		// $stmt = $db->prepare("SELECT header FROM hw_products WHERE slug == '{$this->currentSlug}' LIMIT 1");
		// $stmt->execute();
		// $header = $stmt->fetch();
		// echo "<h1>{$header['header']}</h1>";
		// // Round em up and spit em out
		// $stmt = $db->prepare("SELECT * FROM hw_products 
		// 					  WHERE slug = '{$this->currentSlug}'");
		// $stmt->execute();
		// echo '<ul class="icon-list">';
		// while ($row = $stmt->fetchObject()) { 
		//     $li =  "<li><a href=\"{$this->currentDiscipline}?q={$this->currentSlug}/{$row->isbn}\">";
		//     $li .= '<span class="imgborder">';
		//     $li .= '<img src="images/'.$row->icon.'.jpg"';
		//     $li .= 'alt="'.$row->name.' Grade '.$row->grade.'" ';
		//     $li .= 'title="'.$row->name.' Grade '.$row->grade.'"/>';
		//     $li .= '</span><h3>'.$row->name.'</h3>'."\n";
		//     $li .= '<p><span class="grade">'.$row->grade.'</span> ';
		//     $li .= '- <span class="price">$'.money_format("%i", $row->price).'</span></p>';
		//     $li .= '</a></li>';
  //   	    echo $li;
		// }
	 //    echo '</ul>';
		$db = $this->db;
		$stmt = $db->prepare("SELECT * FROM hw_products 
							  WHERE slug = '{$this->currentSlug}'");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
}

class ProductDetail
{
	public function __call($name, $args) {
		echo "Missing method called : $name, ".implode(', ', $args);
	}

	private $db;
	private $isbn;

	function __construct($db, $isbn)
	{
		$this->db = $db;
		$this->isbn = $isbn;
	}

	public function details() {
		$db = $this->db;
		$stmt = $db->prepare("SELECT * FROM hw_products WHERE isbn == '{$this->isbn}'");
		$stmt->execute();
		$result = $stmt->fetchObject();
		// Add path and ext to product image
		foreach (array(".png", ".jpg", ".gif") as $ext) {
			$filename = "images/{$result->image}{$ext}";
			if (file_exists($filename)) {
				$result->image = $filename;
				break;
			}
		}
		return $result;
	}
}

class FeaturedProducts
{
	function __construct($isbns, $db)
	{
		$this->db = $db;
		$this->isbns = $isbns;
	}

	private function fpClass($n) {
	    if ($n % 2 == 1) {
	        return "fpleft";
	    } else {
	        return "fpright";
	    }
	}

	private function imgPath($img) {
		foreach (array(".png", ".jpg", ".gif") as $ext) {
			$filename = "images/".$img.$ext;
			if (file_exists($filename)) {
				return $filename;
			} 
		}
	}

	public function display() {
		echo implode(", ", $isbns);
		$db = $this->db;
		$stmt = $db->prepare("SELECT * FROM hw_products WHERE isbn IN (".implode(", ", $this->isbns).")");
		$stmt->execute();
		$rowNumber = 1;
		echo "<div id=\"featured-products\">\n<h2>Featured Products</h2>\n<ul>\n";
		while ($row = $stmt->fetchObject()) {
		    echo '<li class="'.$this->fpClass($rowNumber).'">'.
		         '<span class="fpimg"><img src="'.$this->imgPath($row->icon).'" alt="'.$row->name.'" /></span>'.
		         '<h3>'.$row->name.'</h3>'.
		         $row->description.'<a class="buy-button" href="'.$row->link.'">Buy Now</a></li>';
		    $rowNumber = $rowNumber + 1;
		}
		echo "</ul>\n</div>";
	}
}

/*
 ***************************************************************************
 *	START METHODS
 ***************************************************************************
*/

/*
 ***************************************************************************
 *	END METHODS
 ***************************************************************************
*/

/* End of file elements.inc.php */
/* Location: system/classes/elements.inc.php */
?>
