<?php
	$_SESSION['indicator']="You can store session vars to pass around for personalized experience!";
	$test = 1;
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../style.css" />
	<link href="../menu_assets/styles.css" rel="stylesheet" type="text/css"/>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<script type="text/javascript" >
		$(window).load(function(){
		/*$(function() {
			$("[name=toggler]").click(function(){
					$('.toHide').hide();
					$("#blk-"+$(this).val()).show('slow');
			});
		 });*/
		 
		/*   $(document).ready(function() {
			$("[name=toggler]").click(function () {
			  $('.toShow').hide();
			  $("#blk-1").show("slide", { direction: "up" }, 1000);
		});
		});*/
		 
		 $(document).ready(function(){
			$("[name=toggler]").click(function() {
				$('.childnumberpanel').hide();
				$("#blk-"+$(this).val()).slideDown("slow");
			});
			});
		 
		});//]]>  
		<?
			/********** You can place php statements anywhere. **********/
		?>
	</script>
		<style type="text/css">
		table {
			border-collapse:collapse;
			border-spacing:0;
		}
		q:before,q:after {
			content:'';
		}
		abbr,acronym { border:0;}

			div.childnumberpanel,p.flip
			{
				margin:0px;
				padding:5px;
				text-align:center;
				/*background:#e5eecc;
				border:solid 1px $c3c3c3;*/
			}
			div.childnumberpanel
			{
				height:20px;
				display:none;
			}
	</style>
	<title>MATTMASTER | MATT</title>
</head>
<body>
<form action="" method="GET"><!--This makes browser aware client will submit data...NEED THIS to receive data-->
<table border="1" style="margin: 0 auto;">
	<th colspan="2">
		Simple Search Form
	</th>
<?php if($test == 1){?>
	<tr>
		<td>
			Enter a name:
		</td>
		<td>
			<input type="text" name="name_to_search"/>	<!--need name="name_to_search" in order to assign to PHP var-->
		</td>
	</tr>
<?}?>
	<tr>
		<td>
			Click this button and see what happens:
		</td>
		<td>
		<div style="margin-top:5px;">
			<label><input id="rdb1" type="radio" name="toggler" value="1" />Show</label>
			<label><input id="rdb2" type="radio" name="toggler" value="2" />Don't Show</label></p>
		</div>
		</td>
	</tr>
	<tr>
		<tr><td colspan="2">
		<div id="blk-1" class="childnumberpanel">
		Enter a number:  
		<label for="numberofchildren"><input type="text" id="numberofchildren" name="numberofchildren"/></label>
		</div></td></tr>
		<tr><td>
		<div id="blk-2" class="childnumberpanel">
		NONE
		</div>
		</td></tr>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" value="Submit this form!"/>
		</td>
	</tr>
</table>
</form><!--END FORM-->
</body>
</html>

<?php
	$nametosearch=@$_GET['name_to_search'];
	$number=@$_GET['numberofchildren'];
	$sessionvar = $_SESSION['indicator'];
	if($nametosearch=="" AND $number==""){
		echo "Please enter data";
	} else {
		include("class.php");
		echo "You entered:  $nametosearch";
		echo "</br>Optional Flip Panel:  $number";
		echo "</br>The following text is a Session variable:  <strong>$sessionvar</strong></br>Look at line 2 in index.php for var init.";
		//Instantiate class that will connect to database follows...
		$newClass = new classExample();//You would use new classExample($DBH); when connecting to db 
		//$DBH would be the database instance
		//This is known as PDO (PHP Data Objects)		
		$newClass -> examplePublicFunction($nametosearch);
	}
?>