<!--// Begin: Mega-Menu Data Area //-->
<?php
/*
 ***************************************************************************
 *	Set MIME type and Set Charset
 ***************************************************************************
*/
	/* Cache for a day */
	$offset = 60 * 60 * 24;
	header('Content-type: text/html; charset=utf-8');
	header ('Cache-Control: max-age=' . $offset . ', must-revalidate');
	header ('Expires: ' . gmdate ("D, d M Y H:i:s", time() + $offset) . ' GMT');

	function compress($buffer) {
		/* remove comments */
		$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		/* remove tabs, spaces, newlines, etc. */
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '   ', '    '), '', $buffer);
		return $buffer;
	}

	ob_start("compress");
?>
<header id="hmh-header">
	<div id="branding-header-tools">
		<div id="branding-logo"><a href="/"><span>Houghton Mifflin Harcourt</span></a></div>
		<div id="search">
			<form action="/search?">
				<input type="text" name="searchText" value="">
				<input type="image" id="searchButton" name="submit" src="http://www.hmheducation.com/templates-1.0/images/btn-search-go.png" alt="Go" value="submit">
			</form>
		</div>
		<nav id="branding-nav">
			<ul class="nav-primary">
<?php // begin products ?>
				<li class="nav-primary-element" id="products-nav">
					<a class="nav-primary-with-sub" href="/sites/na/products">Products</a>
					<ul class="nav-secondary">
<?php // begin products :: pre-k ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/pre-k/">Pre-K</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_pre-k">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<a href="/store/pre-k-early-childhood/early-childhood-solutions.php">Early Childhood Solutions</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/splashintoprek">SPLASH into Pre-K</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/juba">Juba&trade;</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://www.hmhschool.com/store/ProductCatalogController?cmd=Browse&amp;subcmd=LoadDetail&amp;ID=1007500000073451&amp;level1Code=16&amp;frontOrBack=F&amp;sortEntriesBy=SEQ&amp;division=S01">Houghton Mifflin Pre-K</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://www.mcdougallittell.com/store/ProductCatalogController?cmd=Browse&amp;subcmd=LoadDetail&amp;imprint=sx&amp;ID=1007500000074796&amp;frontOrBack=F&amp;division=M01&amp;sortProductsBy=SEQ_TITLE&amp;sortEntriesBy=SEQ_NAME">Saxon Early Learning</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: reading/language arts ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/reading-language-arts-k-5">Reading/Language Arts</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_reading-language-arts-k-5_core">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>K&ndash;6</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/core.php">Core Curriculum</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/language-arts.php">Language Arts</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/intervention.php">Intervention</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/leveled-reading.php">Leveled Reading</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/digital-solutions.php">Digital Solutions</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/strategic-literacy.php">Struggling Readers</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/assessment.php">Assessment</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/reading/summer-after-school.php">Summer &amp; After School</a>
										</li>
									</ul>
								</li>
								<li class="nav-tertiary-element" id="products_literature-language-arts-6-12_language-arts">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>6&ndash;12</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/literature.php">Literature</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/language-arts.php">Language Arts</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/intervention.php">Intervention</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/libraries-dictionaries.php">Libraries &amp; Dictionaries</a>
										</li>
										<li class="nav-quaternary-element">
											<a rel="external" href="http://holtmcdougal.hmhco.com/hm/series.htm?level2Code=MSIB10027&level3Code=5_AL">Advanced &amp; Electives</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/speech-journalism.php">Speech &amp; Journalism</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/digital-solutions.php">Digital Solutions</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/literature/summer-school.php">Summer School</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: math ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/mathematics-k-6">Mathematics</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_math-k-6_elementary-core">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>K&ndash;6</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/elementary-core.php">Core Curriculum</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/common-core-transition.php">Common Core Standards</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/skills-practice.php">Skills &amp; Practice</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/intervention.php">Intervention</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/digital-solutions.php">Digital/Mobile</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/summer-after-school.php">Summer &amp; After School</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-k-6/stem.php">STEM</a>
										</li>
									</ul>
								</li>
								<li class="nav-tertiary-element" id="products_mathematics-6-12_middle-school">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>6&ndash;12</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/middle-school.php">Middle School</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/algebra-geometry.php">Algebra &amp; Geometry</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/common-core-transition.php">Common Core Standards</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/intervention.php">Intervention</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/digital-solutions.php">Digital/Mobile</a>
										</li>
										<li class="nav-quaternary-element">
											<a rel="external" href="http://holtmcdougal.hmhco.com/hm/series.htm?level2Code=MSIB10027&level3Code=5_AM">Advanced &amp; Electives</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/math-6-12/summer-after-school.php">Summer &amp; After School</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php //begin products :: science ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/science-k-5">Science</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_science-k-5_core">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>K&ndash;5</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-k-5/core.php">Core Curriculum</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-k-5/handbooks.php">Science Handbooks</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-k-5/health.php">Health</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-k-5/digital-solutions.php">Digital Solutions</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-k-5/stem.php">STEM</a>
										</li>
									</ul>
								</li>
								<li class="nav-tertiary-element" id="products_science-6-12_middle-school">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>6&ndash;12</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/biology.php">Biology</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/chemistry.php">Chemistry</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/earth-environmental-science.php">Earth &amp; Environmental</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/health.php">Health</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/physical-science.php">Physical Science</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/physics.php">Physics</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/middle-school.php">Middle School</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/science-6-12/stem.php">STEM</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: social studies ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/social-studies-k-5">Social Studies</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_social-studies-k-5_core">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>K&ndash;5</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-k-5/core.php">Core Curriculum</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-k-5/specialized-instruction.php">Specialized Instruction</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-k-5/content-reading.php">Content Area Reading</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-k-5/spanish-programs.php">Spanish Programs</a>
										</li>
									</ul>
								</li>
								<li class="nav-tertiary-element" id="products_social-studies-6-12_middle-school">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>6&ndash;12</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/united-states-history.php">United States History</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/world-history.php">World History</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/world-regions-geography.php">Geography</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/electives.php">Electives</a>
										</li>
										<li class="nav-quaternary-element">
											<a rel="external" href="http://holtmcdougal.hmhco.com/hm/series.htm?level2Code=MSIB10027&level3Code=5_AS">Advanced &amp; Electives</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/digital-solutions.php">Digital Solutions</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/content-reading.php">Content Area Reading</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/social-studies-6-12/specialized-instruction.php">Specialized Instruction</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: world languages ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/world-languages">World Languages</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_world-languages_world-languages">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>World Languages</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/world-languages/spanish.php">Spanish</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/world-languages/french.php">French</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/world-languages/german.php">German</a>
										</li>
										<li class="nav-quaternary-element">
											<a rel="external" href="http://holtmcdougal.hmhco.com/hm/series.htm?level2Code=MSIB10027&level3Code=5_AW">Other Languages</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: english language learners ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/english-language-learners">English Language Learners</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_english-language-learners_english-language-solutions">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title-wide">
											<h3>English Language Solutions</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/onourwaytoenglish/index.php">On Our Way to English<sup>&reg;</sup></a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://www.mcdougallittell.com/store/ProductCatalogController?cmd=Browse&amp;subcmd=LoadDetail&amp;imprint=rg&amp;ID=1007500000074929&amp;frontOrBack=F&amp;division=M01&amp;sortProductsBy=SEQ_TITLE&amp;sortEntriesBy=SEQ_NAME#order">English in My Pocket (K&ndash;2)</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://rigby.hmhco.com/en/instep_home.htm">InStep Readers (3&ndash;8)</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://greatsource.com/products/access.html">ACCESS</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://www.hmhschool.com/store/ProductCatalogController?cmd=Browse&amp;subcmd=LoadDetail&amp;ID=1007500000078551&amp;level1Code=1&amp;frontOrBack=F&amp;sortEntriesBy=SEQ&amp;division=S01">ELD</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="http://rigby.hmhco.com/en/ELL_home.htm">ELL Assessment Kit</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: advanced and electives ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/sites/na/products/advanced-and-electives">Advanced &amp; Electives</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_advanced-and-electives_disciplines">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3><a href="http://holtmcdougal.hmhco.com/hm/advanced.htm">Advanced &amp; Electives</a></h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/advanced-electives/language-arts.php">Language Arts</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/advanced-electives/math.php">Math</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/advanced-electives/science.php">Science</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/advanced-electives/social-studies.php">Social Studies</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/advanced-electives/world-languages.php">World Languages</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: adult education ?>
						<li class="nav-secondary-element">
						<a class="nav-secondary-with-sub" href="/sites/na/products/adult-education">Adult Education</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="products_adult-education_adult-education">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-title">
											<h3>Adult Education</h3>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/basic-skills-testing.php">Basic Skills Testing</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/adult-basic-education.php">Adult Basic Education</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/ged-preparation.php">GED&reg; Test Preparation</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/english-language-learning.php">English Language Learners</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/college-readiness.php">College Readiness</a>
										</li>
										<li class="nav-quaternary-element">
											<a href="/store/adult-education/job-skills.php">Job Skills</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin products :: featured ?>
						<li class="nav-secondary-element-img">
							<a href="http://www.hmheducation.com/gomath"><img class="featured-item" src="/sites/images/menu-ad-go-math.jpg" alt="" width="168" height="168" /></a>
						</li>
					</ul>
				</li>
<?php // begin assessments ?>
				<li class="nav-primary-element" id="assessment">
					<a class="nav-primary-with-sub" href="http://riversidepublishing.com/products/ia/index.html">Assessment</a>
					<ul class="nav-secondary">
<?php // begin assessments :: ability ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/ability.html">Ability</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_ability">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://www.riversidepublishing.com/products/cogAT7/index.html">Cognitive Abilities Test (CogAT), Form 7</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://www.riversidepublishing.com/products/cogAt/index.html">Cognitive Abilities Test (CogAT), Form 6</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://www.riversidepublishing.com/products/iaat/index.html">Iowa Algebra Aptitude Test (IAAT), Fifth Edition</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://www.riversidepublishing.com/products/wjIIIComplete/index.html">Woodcock-Johnson III</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: achievement ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/achievement.html">Achievement</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_achievement">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/ia/index.html">Iowa Assessments Form E</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/itbs/index.html">Iowa Tests of Basic Skills (ITBS), Forms A, B, and C</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bateriaIII/index.html">Bater&iacute;a III Woodcock-Mu&ntilde;oz</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/ited/index.html">Iowa Tests of Educational Development (ITED), Forms A, B, and C</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/logramos/index.html">Logramos</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wjIIIComplete/index.html">Woodcock-Johnson III Normative Update (NU) Complete</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wjIIIAchievement/index.html">Woodcock-Johnson III Normative Update (NU) Tests of Achievement</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/WJIIIBriefBattery/index.html">Woodcock-Johnson III Normative Update (NU) Brief Battery</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wdrb/index.html">WJ III Diagnostic Reading Battery (WJ III DRB)</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: adaptive behavior ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/adaptive.html">Adaptive Behavior</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_adaptive-behavior">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/alsc/index.html">Adaptive Living Skills Curriculum (ALSC)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/cals/index.html">Check of Adaptive Living Skills (CALS)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/risa/index.html">Responsibility and Independence Scale for Adolescents (RISA)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/sibr/index.html">Scales of Independent Behavior-Revised (SIB-R)</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: bilingual ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/bilingual.html">Bilingual</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_bilingual">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bateriaIII/index.html">Bater&iacute;a III Woodcock-Mu&ntilde;oz</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bdi2/index.html">Battelle Developmental Inventory, 2nd Edition (BDI-2)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bvatNU/index.html">Bilingual Verbal Ability Tests, Normative Update (BVAT NU)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/logramos/index.html">Logramos</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wmls/index.html">Woodcock-Mu&ntilde;oz Language Survey-Revised Normative Update</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: cognitive/intelligence ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/cognitive.html">Cognitive/Intelligence</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_cognitive-intelligence">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bateriaIII/index.html">Bater&iacute;a III Woodcock-Mu&ntilde;oz</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/cas/index.html">Das&bull;Naglieri Cognitive Assessment System (CAS)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/sb5/index.html">Stanford-Binet Intelligence Scales, Fifth Edition (SB5)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/unit/index.html">Universal Nonverbal Intelligence Test (UNIT)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wjIIIComplete/index.html">Woodcock-Johnson III</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: early childhood ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/early.html">Early Childhood</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_early-childhood">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bear/index.html">Basic Early Assessment of Reading (BEAR)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bateriaIII/index.html">Bater&iacute;a III Woodcock-Mu&ntilde;oz</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bdi2/index.html">Battelle Developmental Inventory, 2nd Edition (BDI-2)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/gmrt/index.html">Gates-MacGinitie Reading Tests (GMRT), Fourth Edition</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/ida/index.html">Infant-Toddler Developmental Assessment (IDA)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/itbs/index.html">Iowa Tests of Basic Skills (ITBS), Forms A and B</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/earlySB5/index.html">Stanford-Binet Intelligence Scales for Early Childhood (Early SB5)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/qeli/index.html">Qualls Early Learning Inventory (QELI)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wjIIIComplete/index.html">Woodcock-Johnson III</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wdrb/index.html">Woodcock Diagnostic Reading Battery (WJIII DRB)</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: formative ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/formative.html">Formative</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_formative">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/a2k/index.html">Assess2Know</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/DataDirector/index.html">DataDirector</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/edusoft/index.html">Edusoft Assessment Management System</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: language and communication ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/language.html">Language &amp; Communication</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_language-and-communication">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wmls/index.html">Woodcock-Mu&ntilde;oz Language Survey-Revised</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: large scale ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/large-scaleprograms/">Large Scale</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_large-scale">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/large-scaleprograms/">Large-Scale Assessments</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: mathematics ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/mathematics.html">Mathematics</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_mathematics">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/I4S/index.html">Instruct4Success</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/PromiseLearning/index.html">Promise Learning - Math</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: neuropsychological ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/neuropsychological.html">Neuropsychological</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_neuropsychological">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bateriaIII/index.html">Bater&iacute;a III Woodcock-Mu&ntilde;oz</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bender/index.html">Bender Visual-Motor Gestalt Test, Second Edition (Bender-Gestalt II)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/cas/index.html">Das&bull;Naglieri Cognitive Assessment System (CAS)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/dw/index.html">Dean-Woodcock Neuropsychological Battery (DW)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/sb5/index.html">Stanford-Binet Intelligence Scales, Fifth Edition (SB5)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/unit/index.html">Universal Nonverbal Intelligence Test (UNIT)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wjIIIComplete/index.html">Woodcock-Johnson III</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: performance measurement ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/performance.html">Performance Measurement</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_performance-measures">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/iwa/index.html">Iowa Writing Assessment</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/njpass/index.html">New Jersey Proficiency Assessments of State Standards (NJPASS)</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: reading/writing ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://riversidepublishing.com/products/reading.html">Reading/Writing</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_reading-writing">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/bear/index.html">Basic Early Assessment of Reading (BEAR)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/dar/index.html">Diagnostic Assessments of Reading, 2nd Edition (DAR)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/gmrt/index.html">Gates-MacGinitie Reading Tests (GMRT), Fourth Edition</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/gmrtOnline/index.html">Gates-MacGinitie Reading Tests (GMRT) online</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/ndrt/index.html">Nelson-Denny Reading Test (ND)</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://riversidepublishing.com/products/wdrb/index.html">Woodcock Diagnostic Reading Battery (WJIII DRB)</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: rigby assessment ?>
						<li class="nav-secondary-element">	
							<a class="nav-secondary-with-sub" href="http://rigby.hmhco.com/en/ELL_home.htm">Rigby Assessment</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="assessment_rigby-reads">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="/focusforward/dc-rigby-reads-intervention.php">Rigby READS</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://rigby.hmhco.com/en/products/default.htm?level2Code=MSIB10009&amp;level3Code=MSIBM31022&amp;level4Code=MSIB1309&amp;level5Code=">Rigby mCLASS: Reading 3D</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="http://rigby.hmhco.com/en/ELL_home.htm">Rigby ELL Assessment Kit</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin assessments :: featured ?>
						<li class="nav-secondary-element-img">
							<a href="http://riversidepublishing.com/products/ia/index.html"><img class="featured-item" src="/sites/images/menu-ad-assessments-iowa-tests.jpg" alt="" width="168" height="168" /></a>
						</li>
					</ul>
				</li>
<?php // begin services ?>
				<li class="nav-primary-element" id="services-nav">
					<a class="nav-primary-with-sub" href="http://riversidepublishing.com/">Services</a>
					<ul class="nav-secondary">
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/professionaldevelopment/leadership-and-learning-center-four-service-areas.php">Leadership &amp; Learning Center</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="services_leadership-and-learning-center">
									<ul class="nav-quaternary">
	<li class="nav-quaternary-element-wide">
		<a href="http://www.leadandlearn.com/services">On-site Professional Development</a>
	</li>
	<li class="nav-quaternary-element-wide">
		<a href="http://www.leadandlearn.com/conferences">Professional Learning Conferences</a>
	</li>
	<li class="nav-quaternary-element-wide">
		<a href="http://www.leadandlearn.com/courses">Courses for Teachers</a>
	</li>
	<li class="nav-quaternary-element-wide">
		<a href="http://www.leadandlearn.com/school-improvement">School Improvement</a>
	</li>
	<li class="nav-quaternary-element-wide">
		<a href="http://www.leadandlearn.com/bookstore">Professional Development Resources</a>
	</li>
</ul>
								</li>
							</ul>
						</li>
<?php // begin services :: custom solutions ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/customsolutions/">Custom Solutions</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="services_custom-solutions">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="/customsolutions/preview-1.php">Student Editions</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="/customsolutions/preview-2.php">Teacher Editions</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="/customsolutions/preview-3.php">Ancillaries</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="/customsolutions/preview-4.php">Technology</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin services :: implementation ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="http://www.hmhelearning.com">Implementation</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="services_implementation">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="http://www.hmhelearning.com">Classroom Connect</a>
										</li>
										<li class="nav-quaternary-element-wide">
											<a href="/implementation/index.php">Saxon Implementation</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin services :: research studies ?>
						<li class="nav-secondary-element">
							<a class="nav-secondary-with-sub" href="/insight">Research Studies</a>
							<ul class="nav-tertiary">
								<li class="nav-tertiary-element" id="services_research-studies">
									<ul class="nav-quaternary">
										<li class="nav-quaternary-element-wide">
											<a href="/insight/index.php">Insight Panel</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<?php // begin services :: featured ?>
						<li class="nav-secondary-element-img">
							<a href="http://www.leadandlearn.com"><img class="featured-item" src="/sites/images/menu-ad-services-LLC.jpg" alt="" width="168" height="168" /></a>
						</li>
					</ul>
				</li>
<?php // begin platform ?>
				<li class="nav-primary-element" id="platforms">
					<a class="nav-primary-with-sub" href="/sites/na/platforms/">Platforms</a>
					<ul class="nav-secondary">
						<li class="nav-secondary-element">
							<a href="/pinpoint">Pinpoint</a>
						</li>
						<li class="nav-secondary-element">
							<a href="http://www.edusoft.com">EduSoft</a>
						</li>
						<li class="nav-secondary-element">
							<a href="http://www.riversidepublishing.com/products/DataDirector/">DataDirector</a>
						</li>
						<li class="nav-secondary-element">
							<a href="http://www.hmhinnovation.com/LV.php">Learning Village</a>
						</li>
						<li class="nav-secondary-element-img">
							<a href="/pinpoint"><img class="image-element" src="/sites/images/menu-ad-platforms-pinpoint.jpg" alt="" width="168" height="168" /></a>
						</li>
					</ul>
				</li>
<?php // begin topics ?>
				<li class="nav-primary-element" id="topics-nav">
					<a class="nav-primary-with-sub" href="/sites/na/topics">Topics</a>
					<ul class="nav-secondary">
						<li class="nav-secondary-element">
							<a href="/commoncore">Common Core</a>
						</li>
						<li class="nav-secondary-element">
							<a href="/alliance/data-driven-instruction.php">Data-Driven Instruction</a>
						</li>
						<li class="nav-secondary-element">
							<a href="/grantsfunding">Grants and Funding</a>
						</li>
						<li class="nav-secondary-element">
							<a href="http://my.hmheducation.com/content/RttTD" rel="external">Race to the Top</a>
						</li>
						<li class="nav-secondary-element">
							<a href="/alliance">School Improvement</a>
						</li>
						<li class="nav-secondary-element">
							<a href="/stem">STEM</a>
						</li>
						
						<li class="nav-secondary-element-img">
							<a href="/commoncore"><img class="image-element" src="/sites/images/menu-ad-topics-common-core.jpg" alt="" width="168" height="168" /></a>
						</li>
					</ul>
				</li>
<?php // begin store ?>
				<li class="nav-primary-element">
					<a class="nav-primary-no-sub" href="/store">Store</a>
				</li>
			</ul>
			<div id="location-dropdown"> Your location is: </div>
		</nav>
	</div>
</header>
<?php
/*
 ***************************************************************************
 * Flush
 ***************************************************************************
*/
	ob_end_flush();
?>

<!--// End: Mega-Menu Data Area //-->
