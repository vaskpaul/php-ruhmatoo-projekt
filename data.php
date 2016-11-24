<?php 
	
	$signupEmailError = "";
	$signupEmail = "";
		
	if (isset ($_POST["signupEmail"])) {
				
		if (empty ($_POST["signupEmail"])) {
			
			$signupEmailError = "See v�li on kohustuslik";
			
		} else {
						
			$signupEmail = $_POST["signupEmail"];
		}
		
	}
	
	$signupPasswordError = "";
	
	if (isset ($_POST["signupPassword"])) {
		
		if (empty ($_POST["signupPassword"])) {
			
			$signupPasswordError = "See v�li on kohustuslik";
			
		} else {
			
			
			if (strlen ($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema v�hemalt 8 tm pikk";
				
			}
			
		}
		
	}
	
	
	$gender = "";
	if(isset($_POST["gender"])) {
		if(!empty($_POST["gender"])){
						
			$gender = $_POST["gender"];
		}
	}
	
	
	
	if ( isset($_POST["signupEmail"]) &&
		 isset($_POST["signupEmail"]) &&
	     $signupEmailError == "" &&
	     empty($signupPasswordError)
        )	
		{
				
		echo "salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		echo "parool ".$_POST["signupPassword"]."<br>"; 
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "r�si ".$password."<br>"; 
		
		signup($signupEmail, $password);
	
	}
	$notice = "";
	
	if (   isset($_POST["loginEmail"])  &&
	       isset($_POST["loginPassword"])  &&
	       !empty($_POST["loginEmail"])  &&
	       !empty($_POST["loginPassword"]) 
	 ){
	   $notice = login($_POST["loginEmail"], $_POST["loginPassword"]);
	
	}
	
	
	
?>
<!DOCTYPE html>
<html>
	
		
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		<p style="color:red;"><?php echo $notice; ?></p>
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="loginEmail" type="email">
			
			<br><br>
			
			<label>Parool</label><br>
			<input name="loginPassword" type="password">
						
			<br><br>
			
			<input type="submit">
		
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?php echo $signupEmail; ?>" > <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input placeholder="Parool" name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
						
			<br><br>
			
			<?php if ($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked > Mees<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="male"> Mees<br>
			<?php } ?>
			
			<?php if ($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked > Naine<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="female"> Naine<br>
			<?php } ?>
			
			<?php if ($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked > Muu<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="other"> Muu<br>
			<?php } ?>
			
			<input type="submit" value="Loo kasutaja">
		
		</form>
       


	    <h1> Vali linn</h>
		
		<select>
	<option value="TLL">Tallinn</option>
	<option value="TRT">Tartu</option>
	<option value="VRU">V�ru</option>
	<option value="PRN">P�rnu</option>
	<option value="NR">Narva</option>
	<option value="KJ">Kohtla-J�rve</option>
	<option value="VLJ">Viljandi</option>
	<option value="RKR">Rakvere</option>
	<option value="SLM">Sillam�e</option>
	<option value="KRS">Kuressaare</option>
	<option value="VLG">Valga</option>
	<option value="JHI">J�hvi</option>
	<option value="HPS">Haapsalu</option>
	<option value="KEI">Keila</option>
	<option value="PAI">Paide</option>
	<option value="TRI">T�ri</option>
	<option value="TPA">Tapa</option>
	<option value="PLV">P�lva</option>
	<option value="KV�">Kivi�li</option>
	<option value="ELV">Elva</option>
	<option value="SAU">Saue</option>
	<option value="JGA">J�geva</option>
	<option value="RPL">Rapla</option>
	<option value="PLT">P�ltsamaa</option>
	<option value="PLD">Paldiski</option>
	<option value="SND">Sindi</option>
	<option value="KND">Kunda</option>
	<option value="KRD">K�rdla</option>
	<option value="KRA">Kehra</option>
	<option value="LKS">Loksa</option>
	<option value="RPN">R�pina</option>
	<option value="TRV">T�rva</option>
	<option value="NRJ">Narva-J�esuu</option>
	<option value="TMS">Tamsalu</option>
	<option value="OTP">Otep��</option>
	<option value="KIL">Killingi-N�mme</option>
	<option value="KNU">Karksi-Nuia</option>
	<option value="LIH">Lihula</option>
	<option value="MTV">Mustvee</option>
	<option value="VHM">V�hma</option>
	<option value="ANT">Antsla</option>
	<option value="ABP">Abja-Paluoja</option>
	<option value="PSS">P�ssi</option>
	<option value="SRJ">Suure-Jaani</option>
	<option value="KLL">Kallaste</option>
	<option value="MSK">M�isak�la</option>
	
</select>
	
	

	
	</body>
</html>