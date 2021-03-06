﻿<!DOCTYPE html>
<html lang="en">
<?php

require_once('includes/header.php'); 
$pdo = new PDO('mysql:dbname=axel;host=wwwlab.iit.his.se', 'sqllab', 'Tomten2009');
	$pdo->exec("set names utf8");

?>
<head>
 <body background="white.jpg">
  <title>Omdome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    -->
      <style type="text/css">
.form-control{
	width:50%;
}
	
	p{
		font-size:17px;
		
	}
.checkbox-inline, .radio-inline{
	font-size:17px;
}

h1{
	text-align:center;
	font-size: 2.5em;
}

h2{
	font-size: 1.875em;
}

</style>
</head>

<body>


<div class="container">
<h1>Lämna ett Omdöme</h1>
<p>För att kunna utveckla och  ständigt förbättra Skidlopp AB, hoppas vi att du som kund som har varit deltagare i våra evenemang kan ta en stund och
 svara på ett par frågor. De fyra första frågor ska man endast kryssa i mellan 1 till 5 då 1 är Mycket Dåligt och 5 är Jätte Bra och den sista frågan vill vi gärna att du lämnar in en kommentar</p>
 
<form name="formhorizontal" action="omdome.php" method="post">
 <div class="form-group">
<label for="EvenemangsID">Ange ditt Evenemangs Namn:</label>

<select name="EvenemangsID">
   <option name="EvenemangsID" value="01">Bockstensloppet</option>
   <option name="EvenemangsID" value="02">Halvbocken</option>
   <option name="EvenemangsID" value="03">exSkidlopp</option>
   <option name="EvenemangsID" value="05">Tjejloppet</option>
   <option name="EvenemangsID" value="07">exMarathon</option>
</select>
</form>
</div>
<h2>Helhetsupplevelse</h2>
  <p>Hur upplevde du hela evenemanget?:</p>
  
    <label class="radio-inline">
      <input type="radio" name="Helhetsupplevelse" value="Mycket Dåligt"/> 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="Helhetsupplevelse" value="Dåligt" /> 2
    </label>
    <label class="radio-inline">
     <input type="radio" name="Helhetsupplevelse" value="Lagom"/> 3
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Helhetsupplevelse" value="Bra"/> 4
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Helhetsupplevelse" value="Mycket Bra"/> 5
    </label>
<h2>Arenan<h2>
    <p>Hur upplevde du Arenan där du deltog i evenemanget?:</p>
  
      <label class="radio-inline">
      <input type="radio" name="Arena" value="Mycket Dåligt"/> 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="Arena" value="Dåligt" /> 2
    </label>
    <label class="radio-inline">
     <input type="radio" name="Arena" value="Lagom"/> 3
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Arena" value="Bra"/> 4 
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Arena" value="Mycket Bra"/> 5
    </label>
<h2>Transport</h2>
  <p>Hur var Buss resor till och från evenemangent?</p>
  
     <label class="radio-inline">
      <input type="radio" name="Transport" value="Mycket Dåligt"/> 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="Transport" value="Dåligt" /> 2
    </label>
    <label class="radio-inline">
     <input type="radio" name="Transport" value="Lagom"/> 3
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Transport" value="Bra"/> 4
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Transport" value="Mycket Bra"/> 5
    </label>
  
<h2>Mat Och Dryck<h2>
  <p>Hur var Maten och drycker som erbjöds på evenemanget?:</p>
  
      <label class="radio-inline">
      <input type="radio" name="Mat" value="Mycket Dåligt"/> 1
    </label>
    <label class="radio-inline">
      <input type="radio" name="Mat" value="Dåligt" /> 2
    </label>
    <label class="radio-inline">
     <input type="radio" name="Mat" value="Lagom"/> 3
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Mat" value="Bra"/> 4
    </label>
	 <label class="radio-inline">
      <input type="radio" name="Mat" value="Mycket Bra"/> 5
    </label>
<h2>övriga Kommentarer</h2>
  
  
    <div class="form-group">
      <label for="comment">Lämna gärna övriga kommentarer om yterliggare synpunkter:</label>
      <textarea Name="Kommentar" class="form-control" rows="5" value="Kommentar"></textarea>
    </div>
<input type="submit" Name='Submit'class="btn btn-default" value='Skicka' ><br />
 </form>
 </div>

<?php
    $pdo = new PDO('mysql:dbname=Grupp4AB;host=localhost', 'sqllab', 'Tomten2009');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	if(isset($_POST['KundID'])&& ($_POST['EvenemangsID']))
	{
		$_SESSION["KundID"]=$row["KundID"];
        $querystring='INSERT INTO Omdome (KundID,EvenemangsID,Helhetsupplevelse, Arena,Transport, Mat, Kommentar) VALUES(:KundID,:EvenemangsID, :Helhetsupplevelse, :Arena, :Transport, :Mat, :Kommentar);';
        $stmt = $pdo->prepare($querystring);
		$stmt->bindParam(':KundID', $_SESSION['KundID']);
		$stmt->bindParam(':EvenemangsID', $_POST['EvenemangsID']);
		$stmt->bindParam(':Helhetsupplevelse', $_POST['Helhetsupplevelse']);
		$stmt->bindParam(':Arena', $_POST['Arena']);
		$stmt->bindParam(':Transport', $_POST['Transport']);
		$stmt->bindParam(':Mat', $_POST['Mat']);
		$stmt->bindParam(':Kommentar', $_POST['Kommentar']);
        $stmt->execute();
		echo "<h1> Tack För ditt svar";
	}	
	
	 else
	 {
		 echo"<p> Fyll i Tomma rutor</P>";
	 }
	 
	  
	
	   
?>
</body>
</html> 