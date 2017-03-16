<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Kamarana.com</title>
        <style type="text/css"> 
        @font-face 
        {
			font-family: "A Hundred Miles";
			src: url("../css/fonts/AHundredMiles.ttf");
		}
        #alas
        {
        	height: 0px;
		    font-family: "A Hundred Miles";
			font-size: 36px;
        }
		#fm_login {
		    	position:fixed;
			    top: 50%;
			    left: 50%;
			    width:20em;
			    height:30em;
			    margin-top: 1em; /*set to a negative number 1/2 of your height*/
			    margin-left: -10em; /*set to a negative number 1/2 of your width*/
			    
		}

		#fm_intro {
		    	position:fixed;
			    top: 50%;
			    left: 50%;
			    width:40em;
			    height:31em;
			    margin-top: -17em; /*set to a negative number 1/2 of your height*/
			    margin-left: -20em; /*set to a negative number 1/2 of your width*/
			    color: #FFF;
			    background-color:rgba(0,0,0,0.3);
			   
			}
			.size_up
			{
				font-size: 60px;
				font-family: "A Hundred Miles";
			}
			.size_down
			{
				font-size: 36px;
			}

</style>
        	  	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <!-- Custom CSS for the 'Business Frontpage' Template -->
    <link href="../css/business-frontpage.css" rel="stylesheet">
    <link href="../css/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    </head>
    <body background="../img/intro.jpg">
    		
    		<div id="fm_intro">
    					<h1 align="center" class="size_down">
    							<a href="" class="fa fa-lock faa-spin fa-3x"></a>
    					</h1>
    					<h1 align="center" class="size_up"><strong>kamarana.com</strong></h1>
    					<div align="center">
    						<?php
    								if(!empty($_GET['st']) =="FG")
									{
										echo"Proses Login Gagal Silahkan Ulangi Lagi !";
									}
    						?>
    					</div>

    					<div id="fm_login">
    					<form role="form" action="../include/ceklogin.php" method="post">
					    <fieldset>
					        <div class="form-group">
					            <input class="form-control" placeholder="e-mail" name="email" type="email"  autofocus>
					        </div>
					        <div class="form-group">
					            <input class="form-control" placeholder="Password" name="password"  type="password" value="">
					        </div>
					        <div class="checkbox">
					            <label>
					                <input name="remember" type="checkbox" value="Remember Me">Remember Me
					            </label>
					        </div>
					        <!-- Change this to a button or input when using this as a form -->
					        <button name="submit"  class="btn btn-success" type="submit">Login</button>
					        <button name="reset"  class="btn btn-primary" type="reset">Reset</button>
					    </fieldset>
					    </div>
</form>
    		</div>

    		

    </body>
</html>