<?php

myMonths = ['jan', 'feb', 'march'];
"10-10-13 12:00:00gmt"
myMonths[10];



Pagination
//set up limit numbers as arguments in CRUD function to handle pagination.
SELECT * FROM people LIMIT 0,1;



//loop in angular.js & coldfusion
<div id="angloop">
	{{name}}
</div>



change getViews to getC0ntrollers
only thing in index.php is this instance and command to include controller

mySQLi    look up the difference betweeen this and PDO

//run right after a fetchAll() to count rows
$st->rowCount();


$myArray = explode($type, ',');
foreach($myArray){
	
}
explode is a php string function = to spit


//10/12/13

SAlting hashing sessions
//md5 hashing algorithm
//sha1 & sha2 are other hashing algorithms

$str = 'apple';
$salt = 'mysecretpassword';

//without salting
if(md5($str) === '13048135024tgrwsgsz813501835018375'){
	echo "valid user";
}

//with salting
if(md5($salt.$str) === 'sdlkghsdlghsdgsdgsgsdgsdgwrt4524655'){
	echo "valid user";
}

//before using a session you have to start a session
//only one per page
session_start();
echo "welcome page 1";
//session variable. Use as many as youd like. You can store page info and values for a session
$_SESSION['favcolor'] = 'green'; //color is good for saving user preferences
$_SESSION['animal'] = "cat";
$_SESSION['time'] = time();//tracks how long a user is on site

//Cookies & sessions are different
//cookies are killed once browser is closed

//check coldfusion sessions with Application.cfc

//10/15/13

CAPTCHA
& File uploads

//Java applets are the only way to upload large files
//enctype="application" enctype="multipart" enctype="text"
//enctype="application/multipart-data" <- used for file data
<form action="" method="post" enctype="application/multipart-data">
</form>

//GD or JD? library built into php
getimagesize($image-path); //returns an array(width, height)
imagecreatefromjpeg($filename)     //creates a container for the image?
imagejpeg()
imagepng()
imagegif()
imagedestroy()
imagecreatetruecolor() //use orig. pixel colors when creating a new one (use RGB if RGB or CMYK if CMYK)
imagecopyresampled() //take original image and create new one with new properties
imagecreate() //original to original
imagecolorallocate() //assign new color to image
imagerectangle() //masks image if you want
imagefttext() //image font type text. Good for watermarking images

header("Content-type: image/png")


//if 100% is 70
//	then 50 is 25% less
//image scaling

//look into 
mail()
//from, to, title, body



//$cap =rand("123");
//store in session var


//hw   cf image resize    cf upload
//php captcha



//10/17/13

//Services
**
//directory method in PHP enables us to loop through folder to get images

//store procedure for database ?
//mySQL uses functions and triggers. Store procedures are like triggers
// Google maps api


//cf object
<cfset myobj={
	name = "adam",
	age = "34",
	gender = "male"
}>

<cfdump var="#myobj#">


//changes cf object into string
<cfset jo = serializeJSON(myobj)>
<cfdump var="#jo#">

//this turns serializedJSON into a json object
<cfif action eq "getJSON">
	<cffunction name="getJSON" returntype="void">
		<cfcontent type="application/json" reset="yes">
			<cfoutput>#jo#</cfoutput>
		</cfcontent>
			<cfexit method="exittemplate">
	</cffunction>
</cfif>
<cfset getJSON()>//calls the method


//converts into xml
<cfwddx action="cfml2wddx" input="#myobj" output="toxml">
<cfdump var="#toxml">
<cfcontent type="text/html" reset="yes">
<cfoutput>#toxml#</cfoutput>


//hw   create xml/rss then get it and display it
//student lecture mail()



//10/19/13




//EMAIL ATTACHMENTS
//lab assignment
 // array with filenames to be sent as attachment
$files = array("images/library/image3.jpg", "index.php");
 
// email fields: to, from, subject, and so on
$to = "adam.gedney@gmail.com";
$from = "agedney@fullsail.edu";
$subject ="SSL Day 8 Mail Assignment";
$message = "This is Adam gedney, and this is my Day 8 SSL assignment. \n Source: http://www.emanueleferonato.com/2008/07/22/sending-email-with-multiple-attachments-with-php/";
$headers = "From: $from";
 
// boundary
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
// headers for attachment
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
 
// multipart boundary
$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
$message .= "--{$mime_boundary}\n";
 
// preparing attachments
for($x=0;$x<count($files);$x++){
    $file = fopen($files[$x],"rb");
    $data = fread($file,filesize($files[$x]));
    fclose($file);
    $data = chunk_split(base64_encode($data));
    $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" .
    "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" .
    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    $message .= "--{$mime_boundary}\n";
}
 
// send
 
$ok = @mail($to, $subject, $message, $headers);
if ($ok) {
    echo "<p>mail sent to $to!</p>";
} else {
    echo "<p>mail could not be sent!</p>";
}
 























?>