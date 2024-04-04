<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<title>Metal Rasa</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
		<link rel="shortcut icon" href="../assets/images/logo.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Sora:wght@800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Montserrat+Subrayada:wght@700&family=Oswald:wght@700&family=Quicksand:wght@500&display=swap" rel="stylesheet">
		<script type="text/javascript">	
				function validation()
				{
					var formaa = document.getElementById("formaa");
					var email = document.getElementById("email").value;
					var text = document.getElementById("text");
					var formatMejla = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				
					if(email.match(formatMejla))
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						text.innerHTML="";
					}
					else
					{
						formaa.classList.remove("valid");
						formaa.classList.add("invalid");
						text.innerHTML="Unesite ponovo email adresu";
						text.style.color="#ff0000";
					}
					if(email=="")
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						text.innerHTML="";
					}
				}
				function checkName()
				{
					var formaa = document.getElementById("formaa");
					var ime = document.getElementById("ime").value;
					var fname = document.getElementById("fname");
			
					var regExpName = /^([A-z]+)(\s)?([a-z]*)/;
			
					if(ime.match(regExpName))
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						fname.innerHTML="";
					}
					else
					{
						formaa.classList.remove("valid");
						formaa.classList.add("invalid");
						fname.innerHTML="Unesite ponovo vase ime";
						fname.style.color="#ff0000";
					}
					if(ime=="")
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						fname.innerHTML="";
					}
				}
				function checkLastName()
				{
					var formaa = document.getElementById("formaa");
					var prezime = document.getElementById("prezime").value;
					var lname = document.getElementById("lname");
			
					var regExpName = /^([A-z]+)(\s)?([a-z]*)/;
			
					if(prezime.match(regExpName))
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						lname.innerHTML="";
					}
					else
					{
						formaa.classList.remove("valid");
						formaa.classList.add("invalid");
						lname.innerHTML="Unesite ponovo vase prezime";
						lname.style.color="#ff0000";
					}
					if(prezime=="")
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						lname.innerHTML="";
					}
				}
				function checkNumber()
				{
					var formaa = document.getElementById("formaa");
					var telefon = document.getElementById("telefon").value;
					var number = document.getElementById("number");
			
					var regExpNumber = /^[(]{0,1}[0-9]{3}[)]{0,1}[\s-]{0,1}[0-9]{3}[-]{0,1}[0-9]{4}$/;
			
					if(telefon.match(regExpNumber))
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						number.innerHTML="";
					}
					else
					{
						formaa.classList.remove("valid");
						formaa.classList.add("invalid");
						number.innerHTML="Unesite ponovo vas broj telefona";
						number.style.color="#ff0000";
					}
					if(telefon=="")
					{
						formaa.classList.remove("valid");
						formaa.classList.remove("invalid");
						number.innerHTML="";
					}
				}
		</script>
	</head>
	<body>
		<section class="wrapper">
			<div class="forma">
				<div class="contact">
					<form id="formaa" action="#" method="POST">
						<input type="text" id="ime" class="polje" placeholder="Vase Ime" onkeyup="checkName()"><span id="fname"></span>
						<input type="text" id="prezime" class="polje" placeholder="Vase Prezime" onkeyup="checkLastName()"><span id="lname"></span>
						<input type="text" id="email" class="polje" placeholder="E-mail" onkeyup="validation()"><span id="text"></span>
						<input type="text" id="telefon" class="polje" placeholder="Broj telefona" onkeyup="checkNumber()"><span id="number"></span>
						<textarea type="text" class="komentar" placeholder="Komentar"></textarea>
						<button value="Submit" name="submit" type="submit" class="btn">Posaljite</button>	
					</form>
				</div>
			</div>
		</section>		
	</body>
</html>