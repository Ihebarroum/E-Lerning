<head>
	<title>Web-Quest 2.0</title>
	<link rel="stylesheet" href="styles/style.css" />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Foundation 4</title>
	<link rel="stylesheet" href="styles/foundation.css" />
	<script src="js/vendor/custom.modernizr.js"></script>
	<script src="js/vendor/zepto.js"></script>
	<script src="js/foundation.min.js"></script>
	<script type="text/javascript" src="js/jquery-2.0.0.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.lightbox').click(function(){
				$('.backdrop').animate({'opacity':'.50'},300,'linear');
				$('.box').animate({'opacity':'1.00'},300,'linear');
				$('.backdrop, .box').css('display','block');
			});
			$('.close').click(function(){
				$('.backdrop').animate({'opacity':'.0'},300,'linear');
				$('.box').animate({'opacity':'.0'},300,'linear');
				$('.backdrop, .box').css('display','none');
			})
		});
	</script>
	<script type="text/javascript">
	function refaire(id) {
			var choix = confirm("êtes vous sûre de vouloire refaire ce questionnaire ? Note :  votre résultat précédent sera écrasé")
			if (choix){
				window.location = "questionnaire.php?id="+id;
			}
		}
		</script>
</head>