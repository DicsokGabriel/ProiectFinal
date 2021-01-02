

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simple Theme</title>
<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href="css/cart.css" rel="stylesheet" type="text/css">
<link href="css/colors.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  
	<div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>

<div class="container">
	
  <header>
    <nav class="secondary_header" id="menu">
      <ul>
		<li class="d11" ><img onclick="location.href='Untitled-1.php?xy=<?php  echo $_GET['xy'] ?>'" src="https://cdn.discordapp.com/attachments/697470483813367821/777322385799774208/DGpalette.png" style="width:80%"></li>
        <li><a  class="links hacked" href="products.php?xy=<?php  echo $_GET['xy'] ?>"><img style="width:60%; padding-top:10px;" src="https://cdn.discordapp.com/attachments/697470483813367821/778378445670580248/products.png"></a></li>
        
        
        <li class="d11" id="login" ><a class="links hacked" href="login.php"><img style="width:60%; padding-top:10px;" src="https://cdn.discordapp.com/attachments/697470483813367821/785150291250380800/register.png" ></a></li>
      </ul>
    </nav>
  </header>
<div >
	<form method="post"  >
				<table class="cent">
					<tr>
						<th><h2 style="color:#17b978; margin-left:auto; margin-right:auto;" class="hacked"  >Place Order</h2></th>
					</tr>
					<tr>
						<th><label for="email" name="message" class="labe"><b>First Name</b></label></th>
					</tr>
					<tr>
						<td><input class="inp" type="text" placeholder="Enter First Name" name="fname" id="fname" required></td>
					</tr>
					<tr>
						<th><label for="psw" class="labe"><b>Last Name</b></label></th>
					</tr>
					<tr>
						<td><input class="inp" type="text" placeholder="Enter Last Name" name="lname" id="lname" required></td>
						
					</tr>
					<tr>
						<th><label for="psw-repeat" class="labe"><b>Enter Full Address</b></label></th>
					</tr>
					<tr>
						<td><input class="inp" type="text" placeholder="Enter Full Address" name="faddr" id="faddr" required></td>
						
					</tr>
					<tr>
						<td><input type='submit' name='placeOrder' class="btn-grad"  ></td>
						
						
					</tr>
					
				</table>
				
			</form>
		<script src= 
		"https://smtpjs.com/v3/smtp.js"> 
		</script> 
		
		<script>
			var foo = <?php echo "'" . $_GET['xy'] . "'"; ?>;
		</script>
	  
	  
		<script type="text/javascript"> 
	  
		function sendEmail(fn,ln,adr,prod) { 
		  var Products = prod;
		  var First_Name = fn; 	
		  var Last_Name = ln;
		  var Full_Address = adr;	
  
		 /* if (Last_Name.length == 0 || Last_Name.length == 0 ||  Full_Address.length == 0) {
  
			alert("Please fill in the form.");
		  } 

		  else{*/
			
			Email.send({ 

			Host: "smtp.gmail.com", 
			Username: "distrogamesretail@gmail.com", 
			Password: "giveusatank", 
			To: 'distrogamesretail@gmail.com', 
			From: "distrogamesretail@gmail.com", 
			Subject: "NEW ORDER", 
			Body: {First_Name,Last_Name,Full_Address,Products}, 
		}) 
			.then(function (message) { 
			alert("Order has been sent");
			
			
			
			
		  }); 
	  } 
		</script> 
		
		<script type="text/javascript"> 
	  
	function sendClient(products) { 
		
		var First_Name = document.getElementById("fname").value; 
			
		var Last_Name = document.getElementById("lname").value;
		var Full_Address = document.getElementById("faddr").value;	
		
		/*document.getElementById("fname").value=""; 	
		document.getElementById("lname").value="";
		document.getElementById("faddr").value="";
		
		*/
		
			Email.send({ 

		Host: "smtp.gmail.com", 
		Username: "distrogamesretail@gmail.com", 
		Password: "giveusatank", 
		To: foo, 
		From: "distrogamesretail@gmail.com", 
		Subject: "Order Confirmation", 
		Body: "Order has been placed \n Your products: \n".concat("",products),
		 
	  }) 
		.then(function (message) { 
		 
		}); 
		
	} 
	
	
	
	
  </script> 


<?php
        if(array_key_exists('placeOrder', $_POST)) {
				$fn=$_POST['fname'];
				$ln=$_POST['lname'];
				$adr=$_POST['faddr'];
				
				$conn =mysqli_connect("localhost","root","","users");
				$userEmail= $_GET['xy'];
				
				$res=mysqli_query($conn,"select * from users where Email='$userEmail'" );
				$row=mysqli_fetch_array($res);
				$cart=$row['Cart'];
				if($cart!="")
				{
					$Owned= $row['OwnedGames'];
					
					$gamesID = explode(" ", $cart);
					$x='';
					foreach($gamesID as $game)
					{
						$res2=mysqli_query($conn,"select * from products where ID = '$game' ");
						if (!$res) {
							printf("Error: %s\n", mysqli_error($conn));
							exit();
						}
						
						while($row5=mysqli_fetch_array($res2))
						{
							$x=$x . ' ' . $row5['Name'];
							
							
						}
					}
					
					echo "<script type='text/javascript'>sendEmail('$fn','$ln','$adr','$x');</script>"; 
					echo "<script type='text/javascript'>sendClient('$x')</script>" ;
					

					
					
					
					
					$OG=$Owned . $cart;
					mysqli_query($conn,"UPDATE USERS SET OwnedGames='$OG'  where Email='$userEmail'");
					
					
					
					mysqli_query($conn,"UPDATE USERS SET Cart=''  where Email='$userEmail'");
				}
				else 
				{
					echo "<script type='text/javascript'>alert('Cart is empty');</script>" ;
				}
				
				$conn->close();
				
        } 
        
    ?> 
		
		
		
		
		
		   <?php
      
        if(isset($_POST['submit'])) { 
			$conn =mysqli_connect("localhost","root","","users");
            
			echo "Cart is Empty now"; 
			
			$userEmail= $_GET['xy'];
			
			
			mysqli_query($conn,"UPDATE USERS SET Cart=''  where Email='$userEmail'");
			
			
			
        } 
        
    ?> 
	


		<form method="post"> 
			
			<p class="thumbnail_align hacked" ><input style="background-image: linear-gradient(to right, #071a52 5%, white  100%, #086972  10%);
		padding: 10px 35px;
		
		text-transform: uppercase;
		
		background-size: 200% auto;
		color: #17b978;            
		font-family:'hacked';" value="Empty the Cart" name="submit" id="addtocart"   type="submit"  ></p>
	  
		</form> 
		
			
			
						
	<div class="row">
  <?php
	function f1(){
		?><script type="text/javascript">alert(<?php echo $_GET['hello']?>);</script>
		<?php
	}
	if (isset($_GET['hello'])) {
    f1();
  }
	
	$userEmail=$_GET['xy'];
	
	$conn =mysqli_connect("localhost","root","","users");
	//mysqli_select_db($conn,"products");
	$res2=mysqli_query($conn,"select * from users where Email='$userEmail' ");//selectat tot de la user
	$row2=mysqli_fetch_array($res2);
	$cart=$row2['Cart'];
	$games = explode(" ", $cart);
	$v=count($games);
	$total=0;
	
	foreach($games as $game)
	{
		$res=mysqli_query($conn,"select * from products where ID = '$game' ");
		if (!$res) {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
		
			while($row=mysqli_fetch_array($res))
			{
				$total=$total+$row['Price'];
				echo '<div class="columns">';
				?><p  class="thumbnail_align"> 
				<img onclick="location.href='aGame.php?hello=<?php echo $row['ID'] ;echo '&xy='; echo $_GET['xy'];?>'" src="<?php echo $row["Img"];?>" alt="" class="thumbnail"/>
				</p><h4><?php echo $row["Name"];?></h4></p><h4>Price: <?php echo $row["Price"];?></h4></div>
			
<!--"location.href='<?php echo 'aGame.php';?>'"-->
		<?php
		
	}}
	

?>
		
  </div>
	
  
	</div>
  <form method="post"> 
		<p  class="thumbnail_align hacked" ><input style=" width:100%; background-image: linear-gradient(to right, #071a52 5%, white  100%, #086972  10%);
		padding: 10px 35px;
		
		text-transform: uppercase;
		
		background-size: 200% auto;
		color: #17b978;            
		font-family:'hacked';" value="Valoare comanda: <?php echo $total;?>" name="valoarecomanda" id=""   type="button"  ></p>
	  </form> 
	  
	  <footer class="secondary_header footer">
		<div class="copyright" style="font-family:Helvetica; text-transform:initial;">Contact: distrogamesretail@gmail.com </div>
	  </footer>
</div>
 <canvas id="c"> 
 <p>asdassd</p>
 </canvas>



</body>
</html>