<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Simple Theme</title>
<link href="css/multiColumnTemplate.css" rel="stylesheet" type="text/css">
<link href="stylesheet.css" rel="stylesheet" type="text/css">
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
		<li><img src="https://cdn.discordapp.com/attachments/697470483813367821/777891384098291732/DGpalette2.png" style="width:80%"></li>
        <li class="d12"  ><a  class="links hacked" href="products.php?xy=<?php  echo $_GET['xy'] ?>">PRODUCTS</a></li>
        
        
        <li class="d12" id="login" ><a class="links hacked" href="login.php">register</a></li>
      </ul>
    </nav>
  </header>
	
  
    <?php
	function f1(){
		?><script type="text/javascript">alert(<?php echo $_GET['hello']?>);</script>
		<?php
	}
	if (isset($_GET['hello'])) {
    f1();
  }
	
	
	
	$conn =mysqli_connect("localhost","root","","users");
	//mysqli_select_db($conn,"products");
	$userEmail= $_GET['xy'];
				
	$rest=mysqli_query($conn,"select * from users where Email='$userEmail'" );
	$rand=mysqli_fetch_array($rest);
	$Owned= $rand['OwnedGames'];	
	$gamesID = explode(" ", $Owned);
	
	
	?>
	<div><img src="112.jpg" onclick="location.href='aGame.php?hello=4<?php echo '&xy='; echo $_GET['xy'];?>' "style="width:100%;"></div>
	  <form > 
		<p  class="thumbnail_align hacked" ><input style=" width:100%; background-image: linear-gradient(to right, #071a52 5%, white  100%, #086972  10%);
		padding: 10px 35px;
		font-size:140%;
		text-transform: uppercase;
		
		background-size: 200% auto;
		color: #17b978;            
		font-family:'hacked';" value="recommended games: " name="Recomandari"  type="button"  ></p>
	  </form> 
	<?php
				$cat="";
				foreach($gamesID as $game)
					{
						$rest3=mysqli_query($conn,"select * from products where ID = '$game' ");
						while($rand5=mysqli_fetch_array($rest3)){
							$cat=$cat." ".$rand5['Category'];
					}}
					$catArray = explode(" ", $cat);
					foreach(array_unique($catArray) as $category)
					{	
						
						
						$rest2=mysqli_query($conn,"SELECT * FROM products where Category='$category'");
						if (!$rest2) {
							printf("Error: %s\n", mysqli_error($conn));
							exit();
						}
						
						while($rand5=mysqli_fetch_array($rest2))
						{
							echo "<div class='row'>";
								echo '<div class="columns">';
			?><p  class="thumbnail_align"> 
			<img onclick="location.href='aGame.php?hello=<?php echo $rand5['ID'] ;echo '&xy='; echo $_GET['xy'];?>'" src="<?php echo $rand5["Img"];?>" alt="" class="thumbnail"/>
			</p><h4><?php echo $rand5["Name"];?></h4></p><h4>Price: <?php echo $rand5["Price"];?></h4></div>
			

			<?php
			
					}}

?>
						
		
  </div>
	  
	
	  <footer class="secondary_header footer">
		<div class="copyright" style="font-family:Helvetica; text-transform:initial;">Contact: distrogamesretail@gmail.com </div>
	  </footer>
</div>
</body>
</html>
