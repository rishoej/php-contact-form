<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>PHP contact form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
	    <br>
		<div class="col-md-4">
            	<?php
            	// only bots will type something in this input
		if(!empty($_POST["antiSpam"])) {
			die;  
		}
            	else if(isset($_POST['submit'])) {	
            	    	if(isset($_POST['title'],$_POST['email'],$_POST['message'])) {
	                        echo "
	                        <ol class='breadcrumb'>
	                            <li class='active'>
	                            <i class='fa fa-dashboard'></i>" .
	                    			"You message was sent" . "
	                            </li>
	                        </ol>";
	                        
	                        //email receiver
	    			$email = "your@email.com"; 
	    
	                        //email title
	    			$title = $_POST['title'];
	    
	                        //email message
	    			$message = $_POST['message'];
	    					
	    			//header information
	        		$header  = "MIME-Version: 1.0" . "\r\n";
	        		$header .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	        				
	        		//email from
	        		$header .= "from:" . $_POST['email'];
	        
	        		mail($email, $title, $message, $header); 	
	        		} else if(!isset($_POST['title'],$_POST['email'],$_POST['message'])) {
	        			echo "Please insert a title, your email and a message";   
	        		}
		 	}
		}
            	?>
		<h3>PHP contact form</h3>
		<hr>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    		<p>*required input</p>
    		<div class="form-group">
        		<label for="title">Title*</label>
                <input type="text" class="form-control" name="title"required>
            </div>
     		<div class="form-group">
         		<label for="email">Your email*</label>       
         		<input type="email" class="form-control" name="email"required>
     		</div>
     		<div class="form-group">
         		<label for="message">Message*</label> 
         		<textarea class="form-control" name="message" rows="10" required></textarea>
     		</div>
     		<div class="form-group">
     		    <button type="submit" name="submit" class="btn btn-default pull-right">Submit</button>
     		</div>
		    <div id="antiSpamDiv">
				<label for="antiSpam">Leave this field blank</label>
				<input type="text" name="antiSpam" id="antiSpam">
			</div>
 		</form>
	</div>
    <script>
    (function () {
        var e = document.getElementById("antiSpamDiv");
        e.parentNode.removeChild(e);
    })();
    </script>
</body>
</html>
