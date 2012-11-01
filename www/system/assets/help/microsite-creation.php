<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	if(__SERVER__ === "http://localhost" || __SERVER__ === "http://localhost.hmheducation" || __SERVER__ === "http://dev.hmheducation.com" || __SERVER__ === "http://int.hmheducation.com") {
		$pageTitle = "Microsite Development";
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Cache-Control: private", false);
		header ("Content-Type: text/html");
		include_once __HELP__."/header.php";
		print "\r\n";
		} else {
		die;	
	}
?>
<section id="toc">
	<h2>Table of Contents</h2>
	<ol>
		<li><a href="#section-1">Who is this document intended for?</a></li>
		<li><a href="#section-2">What you need to know&hellip;</a></li>
		<li><a href="#section-3">Getting Started</a>
			<ol>
				<li><a href="#section-3-a">Building your first Microsite</a>
					<ol>
						<li><a href="#section-3-a-i">Creating the microsite directory</a></li>
						<li><a href="#section-3-a-ii">Creating and Configuring the Settings File</a></li>
						<li><a href="#section-3-a-iii">Understanding Template Page Types</a></li>
						<li><a href="#section-3-a-iv">Creating the Homepage</a></li>
						<li><a href="#section-3-a-v">Creating Secondary Level Pages</a></li>
						<li><a href="#section-3-a-vi">Creating the Navigation</a></li>
						<li><a href="#section-3-a-vii">Where to store your Assets</a></li>
						<li><a href="#section-3-a-viii">Previewing the microsite</a></li>
					</ol>
				</li>
			</ol>
		</li>
		<li><a href="#section-4">Development/Technical Notes</a>
			<ol>
				<li><a href="#section-4-a">Microsite Constants Cheat Sheet</a>
					<ol>
						<li><a href="#section-4-a-i">Miscellaneous Constants</a></li>
						<li><a href="#section-4-a-ii">Local constants call within Framework</a></li>
						<li><a href="#section-4-a-iii">Server constant call within Framework</a></li>
					</ol>
				</li>
				<li><a href="#section-4-b">HTML 5 Notes</a></li>
				<li><a href="#section-4-c">HTML Page Structures</a>
					<ol>
						<li><a href="#section-4-c-i">One Column Structure</a></li>
						<li><a href="#section-4-c-ii">Two Column Structure</a></li>
					</ol>
				</li>
				<li><a href="#section-4-d">Technical Diagram</a></li>
			</ol>
		</li>
		<li><a href="#section-5">Frequently Asked Questions</a></li>
	</ol>
</section>
<hr />
<section id="section-1">
	<h1>Who is this document intended for?</h1>
	<p>This document is intended for the PHP developers and content editors of HMHEducation microsites.</p>
	<p>This document area is still under development.</p>
</section>
<a class="toc" href="#toc">Table of Contents</a>
<hr  />

<section id="section-2">
	<h1>What you need to know&hellip;</h1>
	<p>This document area is still under development.</p>
</section>
<a class="toc" href="#toc">Table of Contents</a>
<hr  />

<section id="section-3">
	<h1>Getting Started</h1>
	<p><em><em><em>IMPORTANT!</em></em></em> Did you read the README FILES?</p>
	<ul>
		<li><a href="system.php"><em><em>System README</em></em></a></li>
		<li><a href="assets.php"><em><em>Assets README</em></em></a></li>
	</ul>
	<hr />
	
	<section id="section-3-a">
		<h2>Building your first Microsite</h2>
		<h3><em><em><em>STOP!</em></em></em></h3>
		<p>Do you have ftp credentials to our dev server?</p>
		<p>Are you a HMHEducation microsite developer?</
		<p>If so, Contact <a href="mailto:bryan.schultz@hmhpub.com?subject=MS%20Help%20Site:%20Microsite%20Credentials&amp;body=I%20am%20requesting%20access%20to%20the%dev%20environment."><em><em>Bryan Schultz</em></em></a>.</p>
		<hr />
		<section id="section-3-a-i">
			<h3>Creating the microsite directory</h3>
			<ol>
				<li>FTP Login into the dev server</li>
				<li>Download the <em><em><em>build</em></em></em> folder.<br />
					<em><em>Note:</em></em> You must do this every time you want to create a new microsite.</li>
				<li>Once The download completes, Rename the <em><em><em>build</em></em></em> on your local computer
					to <em><em><em>whatever-your-microsite-name-is</em></em></em>.<br />
					You will want to name this folder with a <em><em>SEO friendly</em></em> name.<br />
					E.g. The microsite is for <em><em>Element of Language</em></em>,<br />you would want to name the folder <em><em><em>elements-of-language</em></em></em>.</li>
				<li>This folder will contain the basic template pages and other configuration files needed to 
					build your microsite.</li>
			</ol>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-3-a-ii">
			<h3>Creating and Configuring the Settings File</h3>
			<ol>
				<li>Navigate to <em><em><em>whatever-your-microsite-name-is/localIncludes</em></em></em> and open
					the <em><em><em>settings.php</em></em></em> file in the editor of your choice.</li>
				<li>Notice there are the basic method calls needed for your microsite. You will need to change these
					params to work with your microsite.</li>
				<li>You can add more methods to this document later if you want to incorporate newer features or take
					advantage of existing features.<br />
					To see a list of the default methods and values,<br />navigate to the 
					<a href="localIncludes/settings.php"><em><em>Settings Default</em></em></a> for more information.<br />
					<em><em><em>Note:</em></em></em> <em>Please read all documentation before adding to your site.</em></li>
			</ol>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-3-a-iii">
			<h3>Understanding Template Page Types</h3>
			<p>Upon Navigating inside <em><em><em>whatever-your-microsite-name-is</em></em></em>, you will notice
				a bunch of files. Each file in this directory corresponds to a template page type. Not all of these files are
				needed for a microsite, you can delete whatever is not needed from this folder. There can be multiple pages 
				of the same templates, except for the <em><em>index.php</em></em> page.</p>
			<p>A list of the current files:</p>
			<table class="development-help">
				<tr>
					<td><em><em>File Name</em></em></td>
					<td><em><em>Description</em></em></td>
				</tr>
				<tr>
					<td><a href="build/index.php">index.php</a></td>
					<td>Microsite Home Page</td>
				</tr>
				<tr>
					<td><a href="build/product-landing-page.php">product-landing-page.php</a></td>
					<td>Product Landing Page</td>
				</tr>
				<tr>
					<td colspan="2"><em><em>One Column Page Templates</em></em></td>
				</tr>
				<tr>
					<td><a href="build/one-column-cent-img-text.php">one-column-cent-img-text.php</a></td>
					<td>One Column: Centered Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/one-column-coverflow.php">one-column-coverflow.php</a></td>
					<td>One Column: Coverflow and Text</td>
				</tr>
				<tr>
					<td><a href="build/one-column-left-img-text.php">one-column-left-img-text.php</a></td>
					<td>One Column: Left Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/one-column-right-img-text.php">one-column-right-img-text.php</a></td>
					<td>One Column: Right Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/one-column-tabs.php">one-column-tabs.php</a></td>
					<td>One Column: Tabs and Text</td>
				</tr>
				<tr>
					<td><a href="build/one-column-text-only.php">one-column-text-only.php</a></td>
					<td>One Column: Text Only</td>
				</tr>
				<tr>
					<td colspan="2"><em><em>Two Column Page Templates</em></em></td>
				</tr>
				<tr>
					<td><a href="build/two-column-cent-img-text.php">two-column-cent-img-text.php</a></td>
					<td>Two Column: Centered Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-coverflow.php">two-column-coverflow.php</a></td>
					<td>Two Column: Coverflow and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-left-img-team.php">two-column-left-img-team.php</a></td>
					<td>Two Column: Left Image Team and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-left-img-text.php">two-column-left-img-text.php</a></td>
					<td>Two Column: Left Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-right-img-team.php">two-column-right-img-team.php</a></td>
					<td>Two Column: Right Image Team and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-right-img-text.php">two-column-right-img-text.php</a></td>
					<td>Two Column: Right Image and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-tabs.php">two-column-tabs.php</a></td>
					<td>Two Column: Tabs and Text</td>
				</tr>
				<tr>
					<td><a href="build/two-column-text-only.php">two-column-text-only.php</a></td>
					<td>Two Column: Text Only</td>
				</tr>
			</table>
			<p>When using a particular page type, just duplicate the page and rename it to a <em><em>SEO friendly</em></em> name.</p>
			<p>E.g. If the headline 1 &lt;h1&gt; is going to be <em><em>Updated MLA Reference</em></em>,<br />you would want to name the file <em><em><em>updated-mla-reference.php</em></em></em></p>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />		
		<section id="section-3-a-iv">
			<h3>Creating the Homepage</h3>
			<p>This document area is still under development.</p>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />			
		<section id="section-3-a-v">
			<h3>Creating Secondary Level Pages</h3>
			<p>This document area is still under development.</p>
			
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />	
		<section id="section-3-a-vi">
			<h3>Creating the Navigation</h3>
			<p>This document area is still under development.</p>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />		
		<section id="section-3-a-vii">
			<h3>Where to store your Assets</h3>
			<p>Have you read <a href="assets.php"><em><em>Assets README</em></em></a>?</p>
			<p>All of the <em><em>assets</em></em> for your microsite will now be <em><em>stored outside</em></em> of the microsites folder.</p>
			<p>The assets will will be stored in the <em><em>/assets/whatever-file-type/your-microsite-name</em></em> folder.</p>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-3-a-viii">
			<h3>Previewing the microsite</h3>
			<ol>
				<li>Save all of the documents you had created in <em><em><em>whatever-your-microsite-name-is</em></em></em> and <em><em>remove any unnecessary files that are not being used</em></em>.</li>
				<li>Through FTP, upload the <em><em><em>whatever-your-microsite-name-is</em></em></em> to the <em><em>root directory</em></em>
					or if it is a nested microsite, upload to the appropriate microsite folder.</li>
				<li>Open your web browser and go to the address, <em><em><em>http://int.hmheducation.com/whatever-your-microsite-name-is</em></em></em>.</li>
				<li>Browse through your site to make sure there are no errors or bugs. If any are found, just open the pages back up on your
					local machine and edit the files. Upload those files back to the FTP.</li>
			</ol>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
	</section>
</section>
<hr />

<section id="section-4">
	<h1>Development/Technical Notes</h1>
	<p>This document area is still under development.</p>
	<section id="section-4-a">
		<h2>Microsite Constants Cheat Sheet</h2>
		<section id="section-4-a-i">
			<h3>Miscellaneous Constants</h3>
			<table class="development-help">
				<tr>
					<td><em><em>__SERVER__</em></em></td>
					<td><?php print wordwrap(__SERVER__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__FILE_NAME__</em></em></td>
					<td><?php print wordwrap(__FILE_NAME__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__DIRECTORY__</em></em></td>
					<td><?php print wordwrap(__DIRECTORY__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__AGENT__</em></em></td>
					<td><?php print wordwrap(__AGENT__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
			</table>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-4-a-ii">
			<h3>Local constants call within Framework</h3>
			<table class="development-help">
				<tr>
					<td><em><em>__GLOB_ASSETS__</em></em></td>
					<td><?php print wordwrap(__GLOB_ASSETS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__BUILD__</em></em></td>
					<td><?php print wordwrap(__BUILD__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__SYS__</em></em></td>
					<td><?php print wordwrap(__SYS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__APP__</em></em></td>
					<td><?php print wordwrap(__APP__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__APPLOC__</em></em></td>
					<td><?php print wordwrap(__APPLOC__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__ASSET__</em></em></td>
					<td><?php print wordwrap(__ASSET__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__BUTTONS__</em></em></td>
					<td><?php print wordwrap(__BUTTONS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__CSS__</em></em></td>
					<td><?php print wordwrap(__CSS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__FONTS__</em></em></td>
					<td><?php print wordwrap(__FONTS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__HELP__</em></em></td>
					<td><?php print wordwrap(__HELP__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__ICONS__</em></em></td>
					<td><?php print wordwrap(__ICONS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__IMAGES__</em></em></td>
					<td><?php print wordwrap(__IMAGES__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__JS__</em></em></td>
					<td><?php print wordwrap(__JS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__CLSS__</em></em></td>
					<td><?php print wordwrap(__CLSS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__DATA__</em></em></td>
					<td><?php print wordwrap(__DATA__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__FUNCT__</em></em></td>
					<td><?php print wordwrap(__FUNCT__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__TEMPLATES__</em></em></td>
					<td><?php print wordwrap(__TEMPLATES__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
			</table>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section  id="section-4-a-iii">
			<h3>Server constants call within Framework</h3>
			<table class="development-help">
				<tr>
					<td><em><em>__S_GLOB_ASSETS__</em></em></td>
					<td><?php print wordwrap(__S_GLOB_ASSETS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_GLOB_IMAGES__</em></em></td>
					<td><?php print wordwrap(__S_GLOB_IMAGES__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_SYS__</em></em></td>
					<td><?php print wordwrap(__S_SYS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_APP__</em></em></td>
					<td><?php print wordwrap(__S_APP__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_APPLOC__</em></em></td>
					<td><?php print wordwrap(__S_APPLOC__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_ASSET__</em></em></td>
					<td><?php print wordwrap(__S_ASSET__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_BUTTONS__</em></em></td>
					<td><?php print wordwrap(__S_BUTTONS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_CSS__</em></em></td>
					<td><?php print wordwrap(__S_CSS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_FONTS__</em></em></td>
					<td><?php print wordwrap(__S_FONTS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_HELP__</em></em></td>
					<td><?php print wordwrap(__S_HELP__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_ICONS__</em></em></td>
					<td><?php print wordwrap(__S_ICONS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_IMAGES__</em></em></td>
					<td><?php print wordwrap(__S_IMAGES__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_JS__</em></em></td>
					<td><?php print wordwrap(__S_JS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_CLSS__</em></em></td>
					<td><?php print wordwrap(__S_CLSS__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_DATA__</em></em></td>
					<td><?php print wordwrap(__S_DATA__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_FUNCT__</em></em></td>
					<td><?php print wordwrap(__S_FUNCT__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
				<tr>
					<td><em><em>__S_TEMPLATES__</em></em></td>
					<td><?php print wordwrap(__S_TEMPLATES__, 58, "&nbsp;&nbsp;<em><em>[line break]</em></em><br />\r\n", true); ?></td>
				</tr>
			</table>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
	</section>
	<hr />
	<section id="section-4-b">
		<h2>HTML 5 Notes</h2>
		<table class="development-help">
			<tr>
				<td><em>Italic Font</em></td>
				<td>&lt;em&gt;Italic&lt;/em&gt;</td>
			</tr>
			<tr>
				<td><em><em>Bold Font</em></em></td>
				<td>&lt;em&gt;&lt;em&gt;Bold&lt;/em&gt;&lt;/em&gt;</td>
			</tr>
			<tr>
				<td><em><em><em>Bold Italic Font</em></em></em></td>
				<td>&lt;em&gt;&lt;em&gt;&lt;em&gt;Bold Italic&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;</td>
			</tr>
			<tr>
				<td><em><em>&lt;strong&gt;&lt;/strong&gt; tag</em></em></td>
				<td>The &lt;strong&gt; element has been redifined to mean "importance" rather than "strong emphasis".</td>
			</tr>
			<tr>
				<td><em><em>&lt;small&gt;&lt;/small&gt; tag</em></em></td>
				<td>For Disclaimers, Caveats, and Copyrights.
					<ul>
						<li>Small Print Legalese</li>
						<li>Disclaimers</li>
						<li>Caveats</li>
						<li>Copyright Statements</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><em><em>&lt;i&gt;&lt;/i&gt; tag</em></em></td>
				<td>For Idioms and Taxonomic Terms.
					<ul>
						<li>Idioms</li>
						<li>Terms from taxonomies (such as name of species)</li>
						<li>Technical Terms</li>
						<li>Ship Names</li>
					</ul></td>
			</tr>
			<tr>
				<td><em><em>&lt;b&gt;&lt;/b&gt; tag</em></em></td>
				<td>For Bold Leads, Keywords, Products and other Stylistic Offsets.
					<ul>
						<li>Keywords</li>
						<li>Product Names</li>
						<li>Lead Sentence or Paragraph</li>
						<li>Other text that is stylistically offset for some semantic reason</li>
					</ul></td>
			</tr>
			<tr>
				<td colspan="2">This document area is still under development.</td>
			</tr>
		</table>
	</section>
	<a class="toc" href="#toc">Table of Contents</a>
	<hr />
	<section id="section-4-c">
		<h2>HTML Page Structures</h2>
		<section id="section-4-c-i">
			<h3>One Column Structure</h3>
			<code class="prettyprint">&lt;!DOCTYPE html&gt; 
&lt;html&gt; 
	&lt;head&gt;
		&lt;meta charset="utf-8" /&gt;
		&lt;title&gt;&lt;/title&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;header id="brand"&gt;
		&lt;/header&gt;
		&lt;section id="background-wrapper"&gt;
			&lt;header id="header"&gt;
			&lt;/header&gt;
			&lt;section id="container"&gt;
				&lt;section id="content"&gt;
				&lt;/section&gt;
			&lt;/section&gt;
		&lt;/section&gt;
		&lt;footer id="footer"&gt;
		&lt;/footer&gt;
	&lt;/body&gt;
&lt;/html&gt;</code>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-4-c-ii">
			<h3>Two Column Structure</h3>
			<code class="prettyprint">&lt;!DOCTYPE html&gt; 
&lt;html&gt; 
	&lt;head&gt;
		&lt;meta charset="utf-8" /&gt;
		&lt;title&gt;&lt;/title&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;header id="brand"&gt;
		&lt;/header&gt;	
		&lt;section id="background-wrapper"&gt;
			&lt;header id="header"&gt;
			&lt;/header&gt;
			&lt;section id="content-area"&gt;
				&lt;section id="content-two-col"&gt;
					&lt;section id="col-one"&gt;
						&lt;section id="content"&gt;
						&lt;/section&gt;
					&lt;/section&gt;
					&lt;aside id="col-two"&gt;
					&lt;/aside&gt;
				&lt;/section&gt;
			&lt;/section&gt;
		&lt;/section&gt;
		&lt;footer id="footer"&gt;
		&lt;/footer&gt;
	&lt;/body&gt;
&lt;/html&gt;</code>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
		<hr />
		<section id="section-4-d">
			<h3>Technical Diagram</h3>
			<a href="diagram.jpg" target="_blank"><img class="image-center" src="diagram.jpg" alt="Diagram"></a>
			<p>This document area is still under development.</p>
		</section>
		<a class="toc" href="#toc">Table of Contents</a>
	</section>
</section>
<hr />

<section id="section-5">
	<h1>Frequently Asked Questions</h1>
	<p>This document area is still under development.</p>
	<ol>
		<li><p>What do I do if I want a new template page type?</p></li>
		<li><p>What do I do if I want to have a feature that is not in the templates?</p></li>
		<li><p>What do I do if I want my page to have its own branding, look and feel?</p></li>
		<li><p>Can I have my own custom headers and footers?</p></li>
	</ol>
</section>
<a class="toc" href="#toc">Table of Contents</a>
<hr  />
<?php
		print "\r\n";		
		include_once __HELP__."/footer.php";
	
?>