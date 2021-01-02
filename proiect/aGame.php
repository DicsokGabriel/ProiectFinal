<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simple Theme</title>
<link href="css/aGame.css" rel="stylesheet" type="text/css">
<link href="css/colors.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="jquery-3.5.1.js"></script>
<script type="text/javascript" src="ajax3.js"></script>
 
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
		<li><img onclick="location.href='Untitled-1.php?xy=<?php  echo $_GET['xy'] ?>'" src="https://cdn.discordapp.com/attachments/697470483813367821/777891384098291732/DGpalette2.png" style="width:80%"></li>
        <li class="d12"  ><a  class="links hacked" href="products.php?xy=<?php  echo $_GET['xy'] ?>">PRODUCTS</a></li>
        
        
        <li class="d12" id="login" ><a class="links hacked" href="login.php">register</a></li>
      </ul>
    </nav>
	  <nav class="secondary_header" style="height:100%;margin: 0px; padding-bottom:30px" >
      	
	
		
			
			<div class="button"><button class="block hacked" onclick="location.href='cart.php?xy=<?php  echo $_GET['xy'] ?>'"   style="position: absolute">Cart</button></div>
			
		 
		 
		 
    </nav>
  </header>

	<?php
	
	
	$conn =mysqli_connect("localhost","root","","users");
	//mysqli_select_db($conn,"products");
	$res=mysqli_query($conn,"select * from products where ID =" . $_GET['hello']);
	if (!$res) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
	}
	$row=mysqli_fetch_array($res);
	$category=$row['Category'];
	
	$conn->close();
	?>
  <div class="row">
	<div class="columns">
      <p onclick="" class="thumbnail_align"> <img src='<?php echo $row['Img'] ?>' alt="" class="thumbnail"/> </p>
      </p><h4><?php echo $row["Name"];?></h4></p><h4>Price: <?php echo $row["Price"];?></h4>
	  
	</div>
	  <div class="columns" >
	   <?php
      
        if(isset($_POST['submit'])) { 
			$conn =mysqli_connect("localhost","root","","users");
            
			echo "Game Added to your Cart"; 
			
			$userEmail= $_GET['xy'];
			$productID= $_GET['hello'];
			
			$res=mysqli_query($conn,"select * from users where Email='$userEmail'" );
			
			if (!$res) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
			$row2=mysqli_fetch_array($res);
			$CCart= $row2['Cart'];
			$cart=$CCart . ' ' . $productID;
			mysqli_query($conn,"UPDATE USERS SET Cart='$cart'  where Email='$userEmail'");
			
		
			$conn->close();
        } 
        
    ?> 
    <form method="post"> 
		
		<p class="thumbnail_align hacked" ><input style="background-image: linear-gradient(to right, #071a52 5%, white  100%, #086972  10%);
	padding: 15px 45px;
	
	text-transform: uppercase;
	
	background-size: 200% auto;
	color: #17b978;            
	font-family:'hacked';" value="ADD to Cart" name="submit" id="addtocart"   type="submit"  ></p>
  
    </form> 
	
	</div>
  	<div class="columns">
      <p onclick="location.href=" class="thumbnail_align" style="font-family:Helvetica; color:#a7ff83"> Description:   <?php echo $row['Description'] ?></p>
     
	</div>
	
    
  </div>
 
    
	  <div class="row blockDisplay">
	  
		<div class="column_half left_half"> </div>
		<div class="column_half right_half"> </div>
	  </div>
	  <?php 
			$conn =mysqli_connect("localhost","root","","users");
			$rest=mysqli_query($conn,"select * from products where ID =" . $_GET['hello']);
			
			
	  
			while($rand=mysqli_fetch_array($rest)){
		  ?>
		<p style="text-align:center;">
			<iframe width="60%" height="400px"  src="<?php echo $rand['Trailer']; ?>" frameborder="0" allowfullscreen></iframe>
		</p>
		 <form > 
		<p  class="thumbnail_align hacked" ><input style=" width:100%; background-image: linear-gradient(to right, #071a52 5%, white  100%, #086972  10%);
		padding: 10px 35px;
		font-size:140%;
		text-transform: uppercase;
		
		background-size: 200% auto;
		color: #17b978;            
		font-family:'hacked';" value="Related Games: " name="Recomandari"  type="button"  ></p>
	  </form> 
		
		<?php
		
		$conn =mysqli_connect("localhost","root","","users");
		//mysqli_select_db($conn,"products");
		$userEmail= $_GET['xy'];
		$productID=$_GET['hello'];				
					
		/*$rest=mysqli_query($conn,"select * from users where Email='$userEmail'" );
		$rand=mysqli_fetch_array($rest);
		$Owned= $rand['OwnedGames'];	
		$gamesID = explode(" ", $Owned);
		
				$cat="";
				foreach($gamesID as $game)
					{*/
					
						$rest3=mysqli_query($conn,"select * from products where ID <> '$productID' and Category='$category' ");
						while($rand5=mysqli_fetch_array($rest3))
						{
						
							echo '<div class="columns">';
				?><p  class="thumbnail_align"> 
				<img onclick="location.href='aGame.php?hello=<?php echo $rand5['ID'] ;echo '&xy='; echo $_GET['xy'];?>'" src="<?php echo $rand5["Img"];?>" alt="" class="thumbnail"/>
				</p><h4><?php echo $rand5["Name"];?></h4></p><h4>Price: <?php echo $rand5["Price"];?></h4></div>
		
			
			<?php
							
					}}
					?>
					
					
						
		
  
		
		
		
		
		
		
		
		<p style="text-align:center;">
		
		</p>
	 
	  <footer class="secondary_header footer">
	
		<div class="copyright" style="font-family:Helvetica; text-transform:initial;">Contact: distrogamesretail@gmail.com </div>
		
	  </footer>
</div>
<?php include('ajax3.js');?>



</body>

</html>
