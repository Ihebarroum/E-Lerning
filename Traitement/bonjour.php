<header>
<div class="logo"><a href="index.php"><img src="images/logo.png"/></a></div>

<?php  
if(isset($_SESSION['nom']) AND isset($_SESSION['prenom'])){?>
<div class="bonjour" >
	Bienvenue <?php echo strtoupper($_SESSION['nom'])." ".ucfirst($_SESSION['prenom']); ?><br />
	<a class="tiny round button" style="font-size:16px; font-weight:normal;" href="deconnexion.php" > Deconnexion </a>
</div>
<?php } ?>
</header>