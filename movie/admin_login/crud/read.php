<?php 
	require '../../include/dbh.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../manageProducts.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM film where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Read a film</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Film</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['film'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Content</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['content'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Price</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Price'];?>
						    </label>
					    </div>
					  </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label">Photo</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['Photo'];?>
                                </label>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Category ID</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['catID'];?>
                                </label>
                            </div>
                        </div>
					    <div class="form-actions">
						  <a class="btn" href="../manageProducts.php">Back</a>
					   </div>
					
					 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>