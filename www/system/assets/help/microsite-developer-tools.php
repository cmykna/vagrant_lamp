<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/system/define.php";
	if(__SERVER__ === "http://localhost" || __SERVER__ === "http://localhost.hmheducation" || __SERVER__ === "http://dev.hmheducation.com" || __SERVER__ === "http://int.hmheducation.com") {
		$pageTitle = "Microsite Developer Tools";
		header("Expires: 0"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
		header("Cache-Control: private", false);
		header ("Content-Type: text/html");
		include_once __HELP__."/header.php";
		include_once "../../functions/general.inc.php";
		print "\r\n";

	} else {
		die;	
	}
?>
<section id="toc">
	<h2>Table of Contents</h2>
	<ol>
		<li><a href="#section-1">Functions and Objects</a></li>
        <li>
        	<ol>
            	<li><a href="#section-1-a">Functions</a></li>
                <li>
                	<ol>
                    	<li><a href="#section-1-a-i">Calculating a File's Size with the getFileSize() function</a></li>
                    </ol>
                </li>
                <li><a href="#section-1-b">Objects</a></li>
                <li>
                	<ol>
                    	<li><a href="#section-1-b-i">Creating Encrypted Values the Cryptastic Class</a></li>
                    </ol>
                </li>
            </ol>
        </li>
    </ol>
</section>
<hr />
<section id="section-1">
	<h1>Functions and Objects</h1>
	<p>This document is intended for the PHP developers and content editors of HMHEducation microsites.</p>
    <p>This document is intended to detail functions that are currently built in to the honeybadger framework, and should be used by developers only. The unperfected use of these functions can potentially cause errors and downtime.</p>
	<p>This document area is still under development.</p>
</section>
<a class="toc" href="#toc">Table of Contents</a>
<hr  />

    <section id="section-1-a">
		<h2>Functions</h2>
		<hr />
		
		<section id="section-1-a-i">
        	<h3>Calculating a File's Size</h3>
			<p>Often you will need to display the size of a file in kilobytes or megabytes, or perhaps larger units. This will inform the site visitor of the scope of the contents contained in each file, so that they may be aware of its resource-affecting potential.</p>
            <p>MUST BE A FULL PATH AND FILE NAME!&hellip;<br />
               <?php $fileSize = "../../../assets/pdf/journeys/Grade-1/newleveledreaders/ELL/L11_life_in_the_coral_reefs_G.pdf"; ?>
               For this example, we will create a PHP variable named $file, and assign a value to it as follows:<br />
               <em><em>$file = &ldquo;<?php echo $fileSize; ?>&rdquo;;</em></em></p>
			<table class="development-help">
				<tr>
					<td><em><em>Call</em></em></td>
                    <td><em><em>Parameters</em></em></td>
                    <td><em><em>Example</em></em></td>
                    <td><em><em>Output</em></em></td>
				</tr>
				<tr>
					<td>getFileSize()</td>
                    <td>getFileSize($file)</td>
                    <td><?php echo '&lt;?php echo getFileSize($file); ?>' ?></td>
                    <td><?php echo getFileSize($fileSize); ?></td>
				</tr>
            </table>
        </section>
        <a class="toc" href="#toc">Table of Contents</a>
        <hr />
    </section>

    <section id="section-1-b">
    	<h2>Objects</h2>
		<hr />
        
        <section id="section-1-b-i">
        	<h3>Creating Encrypted Values for jQuery .ajax() or Other Methods</h3>
			<p>Often you will need to use an encryption method when passing and retrieving data using various data exchange protocols. By use of the created cryptastic object, this will allows you to generate an encrypted key. In turn, you may then use the key to allow or disallow the query and the data to be fetched.</p>
            <p>The code below is used on the document facing the client. Additionally, this data should be passed along with any query ,GET, or POST parameters to be fed to the query document. Some recommendations are, as a &ldquo;data:&rdquo; transaction, OR, as an extended query parameter passed through the URL attribute in an .ajax() method.<br />
            <em><em>NOTE:</em></em> The $pass, $salt, and encrypt subject(here it is &ldquo;razzleFrazzle&rdquo;) must be the same on both ends of any given data exchange, i.e. the facing web document and the query page</p>
            <h3>The created $crypto object is detailed below:</h3>
            <p>The object variable "$crypto" should automatically be created for your use, via the honeybadger framework. You should also remember to add the right class/dependency calls to any query pages, i.e.&hellip;<br />
            include('../../system/define.php');<br />
			include('../../system/page.properties.php');<br />
			include('../../system/application/localIncludes/cryptastic.php');</p>
            <p>$pass = 'dog';<br />
               $salt = 'cat';<br />
               $key = $crypto->pbkdf2($pass, $salt, 1000, 32);<br />
               $confirmCode = rawurlencode($crypto->encrypt("razzleFrazzle",$key));</p>
               <hr />
             <p><em><em>NOTE:</em></em> This example case uses "rawurlencode", but in most cases you should be able to select between a base64_encode/base64_decode and a urlencode/urldecode as well. This encoding must be the same type as the server/query recipient of this encryption.
             <h3>The below code should be used on the server or query side</h3>
             <hr />
             <p>$pass = 'dog';<br />
                $salt = 'cat';<br />
                $key = $crypto->pbkdf2($pass, $salt, 1000, 32);<br />
                $confirmCode = $crypto->decrypt(rawurldecode("razzleFrazzle"),$key);</p>
                <hr />
              <p><em><em>NOTE:</em></em> This example case uses "rawurlencode", but in most cases you should be able to select between a base64_encode/base64_decode and a urlencode/urldecode as well. This encoding must be the same type as the client-side sender of the encryption.</p>
             <h3>Application with JQuery $.ajax() Method</h3>
             <p>as seen in <a href="http://www.hmheducation.com/tx/senderos/teaching-guides-utility.php" rel="external">http://www.hmheducation.com/tx/senderos/teaching-guides-utility.php</a></p>
             <p><em><em>I. Client-Side or View</em></em></p>
             <p>$pass = 'dog';<br />
               $salt = 'cat';<br />
               $key = $crypto->pbkdf2($pass, $salt, 1000, 32);<br />
               $confirmCode = rawurlencode($crypto->encrypt("razzleFrazzle",$key));</p>
             <p><em><em>function</em></em> pdfQuery()<em><em>{</em></em><br />
             		&nbsp;&nbsp;var gr = <em><em>$</em></em>(&ldquo;#grade&rdquo;).val()<em><em>;</em></em><br />
                    &nbsp;&nbsp;var cat = <em><em>$</em></em>(&ldquo;#category&rdquo;).val()<em><em>;</em></em><br />
                    &nbsp;&nbsp;var fp = <em><em>$</em></em>(&ldquo;#fplevel&rdquo;).val()<em><em>;</em></em><br />
                    &nbsp;&nbsp;<em><em>$</em></em>.ajax<em><em>({</em></em><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;url: &ldquo;get-pdfs-query-2.php&rdquo;<em><em>,</em></em><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;data: &ldquo;grade=&rdquo;+gr+&ldquo;&amp;category=&rdquo;+cat+"&amp;fplevel=&rdquo;+fp+&ldquo;&amp;confirmCode=&lt;?php echo $confirmCode<em><em>;</em></em> ?&gt;&rdquo;<em><em>,</em></em><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;type: &ldquo;GET&rdquo;<em><em>,</em></em><br />
                    &nbsp;&nbsp;&nbsp;&nbsp;contentType: &ldquo;application/json&rdquo;<em><em>,</em></em>&hellip;etc.</p>
             <p><em><em>II. Server or Query-Side</em></em></p>
             <p>if(isset($_GET['confirmCode']) && !empty($_GET['confirmCode']) {<br />
             	&nbsp;&nbsp;&nbsp;&nbsp;$confCode = $_GET['confirmCode'];<br />
                    }<br />
             <p>$pass = 'dog';<br />
                $salt = 'cat';<br />
                $key = $crypto->pbkdf2($pass, $salt, 1000, 32);<br />
                $confirmCode = $crypto->decrypt(rawurldecode($confCode),$key);<br /><br />
             if($confCode == "razzleFrazzle") {<br  />
              &nbsp;&nbsp;&nbsp;&nbsp;// execute query&hellip;<br />
              } else {<br />
              &nbsp;&nbsp;&nbsp;&nbsp;// execute error handler or &ldquo;or die&rdquo; statement&hellip;<br />
              }                   
             </p>
        </section>
        <a class="toc" href="#toc">Table of Contents</a>
        <hr />
    
    
    </section>        
        
			
<?php
		print "\r\n";		
		include_once __HELP__."/footer.php";
	
?>