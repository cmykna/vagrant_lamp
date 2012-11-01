<?php
$all_us_states_output = '';
$all_us_states = array('usstates' => array(
					array(
						'name' => 'Alabama',
						'abbrev' => 'AL',
						'url' => '/al/'
					),
					array(
						'name' => 'Alaska',
						'abbrev' => 'AK',
						'url' => '/sites/ak/programs/reading/'
					),
					array(
						'name' => 'Arizona',
						'abbrev' => 'AZ',
						'url' => '/sites/az/programs/reading/'
					),
					array(
						'name' => 'Arkansas',
						'abbrev' => 'AR',
						'url' => '/ar/'
					),
					array(
						'name' => 'California',
						'abbrev' => 'CA',
						'url' => '/ca/'
					),
					array(
						'name' => 'Colorado',
						'abbrev' => 'CO',
						'url' => '/sites/co/programs/reading/'
					),
					/*
					array(
						'name' => '&ndash; Denver',
						'abbrev' => 'Denver',
						'url' => '/co/denver/'
					),
					*/
					array(
						'name' => 'Connecticut',
						'abbrev' => 'CT',
						'url' => '/sites/ct/programs/reading/'
					),
					array(
						'name' => 'Delaware',
						'abbrev' => 'DE',
						'url' => '/de/'
					),
					array(
						'name' => 'Dist of Columbia',
						'abbrev' => 'DC',
						'url' => '/dc/'
					),
					array(
						'name' => 'Florida',
						'abbrev' => 'FL',
						'url' => '/fl/'
					),
					/*
					array(
						'name' => '&ndash; Palm Beach',
						'abbrev' => 'Palm Beach',
						'url' => '/fl/palmbeach/'
					),
					*/
					array(
						'name' => 'Georgia',
						'abbrev' => 'GA',
						'url' => '/ga/'
					),
					array(
						'name' => 'Hawaii',
						'abbrev' => 'HI',
						'url' => '/hi/'
					),
					array(
						'name' => 'Idaho',
						'abbrev' => 'ID',
						'url' => '/sites/id/programs/reading/'
					),
					array(
						'name' => 'Illinois',
						'abbrev' => 'IL',
						'url' => '/il/'
					),
					array(
						'name' => 'Indiana',
						'abbrev' => 'IN',
						'url' => '/in/'
					),
					array(
						'name' => 'Iowa',
						'abbrev' => 'IA',
						'url' => '/sites/ia/programs/reading/'
					),
					array(
						'name' => 'Kansas',
						'abbrev' => 'KS',
						'url' => '/sites/ks/programs/reading/'
					),
					array(
						'name' => 'Kentucky',
						'abbrev' => 'KY',
						'url' => '/ky/'
					),
					array(
						'name' => 'Louisiana',
						'abbrev' => 'LA',
						'url' => '/la/'
					),
					array(
						'name' => 'Maine',
						'abbrev' => 'ME',
						'url' => '/sites/me/programs/reading/'
					),
					array(
						'name' => 'Maryland',
						'abbrev' => 'MD',
						'url' => '/md/'
					),
					array(
						'name' => 'Massachusetts',
						'abbrev' => 'MA',
						'url' => '/ma/'
					),
					/*
					array(
						'name' => '&ndash; Boston',
						'abbrev' => 'Boston',
						'url' => '/ma/boston/'
					),
					*/
					array(
						'name' => 'Michigan',
						'abbrev' => 'MI',
						'url' => '/mi/'
					),
					array(
						'name' => 'Minnesota',
						'abbrev' => 'MN',
						'url' => '/sites/mn/programs/reading/'
					),
					array(
						'name' => 'Mississippi',
						'abbrev' => 'MS',
						'url' => '/sites/ms/programs/reading/'
					),
					array(
						'name' => 'Missouri',
						'abbrev' => 'MO',
						'url' => '/sites/mo/programs/reading/'
					),
					array(
						'name' => 'Montana',
						'abbrev' => 'MT',
						'url' => '/sites/mt/programs/reading/'
					),
					array(
						'name' => 'Nebraska',
						'abbrev' => 'NE',
						'url' => '/sites/ne/programs/reading/'
					),
					array(
						'name' => 'Nevada',
						'abbrev' => 'NV',
						'url' => '/sites/nv/programs/reading/'
					),
					/*
					array(
						'name' => '&ndash; Clark Co',
						'abbrev' => 'Clark County',
						'url' => '/nv/clarkcounty/'
					),
					*/
					array(
						'name' => 'New Hampshire',
						'abbrev' => 'NH',
						'url' => '/sites/nh/programs/reading/'
					),
					array(
						'name' => 'New Jersey',
						'abbrev' => 'NJ',
						'url' => '/nj/'
					),
					array(
						'name' => 'New Mexico',
						'abbrev' => 'NM',
						'url' => '/nm/'
					),
					array(
						'name' => 'New York',
						'abbrev' => 'NY',
						'url' => '/ny/'
					),
					/*
					array(
						'name' => '&ndash; New York City',
						'abbrev' => 'NYC',
						'url' => '/nyc/'
					),
					array(
						'name' => '&ndash; Syracuse',
						'abbrev' => 'Syracuse',
						'url' => '/syracuse/'
					),
					*/
					array(
						'name' => 'North Carolina',
						'abbrev' => 'NC',
						'url' => '/nc/'
					),
					array(
						'name' => 'North Dakota',
						'abbrev' => 'ND',
						'url' => '/sites/nd/programs/reading/'
					),
					array(
						'name' => 'Ohio',
						'abbrev' => 'OH',
						'url' => '/oh/'
					),
					array(
						'name' => 'Oklahoma',
						'abbrev' => 'OK',
						'url' => '/ok/'
					),
					array(
						'name' => 'Oregon',
						'abbrev' => 'OR',
						'url' => '/or/'
					),
					array(
						'name' => 'Pennsylvania',
						'abbrev' => 'PA',
						'url' => '/sites/pa/programs/reading/'
					),
					array(
						'name' => 'Rhode Island',
						'abbrev' => 'RI',
						'url' => '/ri/'
					),
					array(
						'name' => 'South Carolina',
						'abbrev' => 'SC',
						'url' => '/sites/sc/programs/reading/'
					),
					array(
						'name' => 'South Dakota',
						'abbrev' => 'SD',
						'url' => '/sites/sd/programs/reading/'
					),
					array(
						'name' => 'Tennessee',
						'abbrev' => 'TN',
						'url' => '/tn/'
					),
					array(
						'name' => 'Texas',
						'abbrev' => 'TX',
						'url' => '/tx/'
					),
					/*
					array(
						'name' => '&ndash; Houston ISD',
						'abbrev' => 'Houston',
						'url' => '/tx/houston/'
					),
					*/
					array(
						'name' => 'Utah',
						'abbrev' => 'UT',
						'url' => '/sites/ut/programs/reading/'
					),
					array(
						'name' => 'Vermont',
						'abbrev' => 'VT',
						'url' => '/sites/vt/programs/reading/'
					),
					array(
						'name' => 'Virginia',
						'abbrev' => 'VA',
						'url' => '/va/'
					),
					array(
						'name' => 'Washington',
						'abbrev' => 'WA',
						'url' => '/sites/wa/programs/reading/'
					),
					array(
						'name' => 'West Virginia',
						'abbrev' => 'WV',
						'url' => '/sites/wv/programs/reading/'
					),
					array(
						'name' => 'Wisconsin',
						'abbrev' => 'WI',
						'url' => '/wi/'
					),
					/*
					array(
						'name' => '&ndash; Milwaukee',
						'abbrev' => 'Milwaukee',
						'url' => '/milwaukee/'
					),
					*/
					array(
						'name' => 'Wyoming',
						'abbrev' => 'WY',
						'url' => '/sites/wy/programs/reading/'
					)
				)
		);
//$ALLUSSTATESPHP = json_decode($ALLUSSTATESJSON);

$all_us_states_output.= '<select name="state" id="state_sites">';
$all_us_states_output.= '<option value="/sites/na/programs/reading/" >&ndash; Select Your Location &ndash;</option>';
foreach($all_us_states['usstates'] as $state)
{
	//checks for existence of an index.php file for each state site before creating the drop-down menu
	if(file_exists('../../'.strtolower($state['abbrev']).'/index.php')){
		$all_us_states_output .= '<option value="' . $state['url'] . '"';
		if (isset($_GET['state']) && $_GET['state'] == strtolower($state['abbrev'])) { 
			$all_us_states_output .= 'selected="selected"';
		}
		$all_us_states_output .= '>' . $state['name'] . '</option>';
	}
}
$all_us_states_output .= '</select>';

echo $all_us_states_output;
?>