<?php

require '../../include/dbh.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: ../manageProducts.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
        $titleError = null;
        $contentError = null;
        $priceError = null;
        $photosError = null;
        $catIdError = null;
		
		// keep track post values
        $title = $_POST['title'];
        $content = $_POST['content'];
        $price = $_POST['price'];
        $photos = $_POST['photo'];
        $catId = $_POST['catId'];


        // validate input
        $valid = true;
        if (empty($name)) {
            $titleError = 'Please enter Title';
            $valid = false;
        }

        if (empty($description)) {
            $contentError = 'Please enter Content';
            $valid = false;
        }

        if (empty($price)) {
            $priceError = 'Please enter Price';
            $valid = false;
        }
        if (empty($photo)) {
            $photosError = 'Please enter Photo';
            $valid = false;
        }
        if (empty($catId)) {
            $catIdError = 'Please enter Category ID';
            $valid = false;
        }
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE film  set title = ?, content = ?, Price = ?, photo = ?, CatID = ? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($title,$content,$price,$photos,$catId,$id));
			Database::disconnect();
			header("Location: ../manageProducts.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM film where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$title = $data['title'];
		$content = $data['content'];
		$price = $data['price'];
        $photos = $data['photo'];
        $catId = $data['catID'];
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
		    			<h3>Update a product</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($titleError)?'error':'';?>">
					    <label class="control-label">Title</label>
					    <div class="controls">
					      	<input name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
					      	<?php if (!empty($titleError)): ?>
					      		<span class="help-inline"><?php echo $titleError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                        <div class="control-group <?php echo !empty($contentError)?'error':'';?>">
                            <label class="control-label">Film Content</label>
                            <div class="controls">
                                <input name="content" type="text" placeholder="Content" value="<?php echo !empty($content)?$content:'';?>">
                                <?php if (!empty($contentError)): ?>
                                    <span class="help-inline"><?php echo $contentError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="control-group <?php echo !empty($priceError)?'error':'';?>">
                            <label class="control-label">Price</label>
                            <div class="controls">
                                <input name="price" type="text"  placeholder="Price" value="<?php echo !empty($price)?$price:'';?>">
                                <?php if (!empty($priceError)): ?>
                                    <span class="help-inline"><?php echo $priceError;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($photosError)?'error':'';?>">
                            <label class="control-label">Photo</label>
                            <div class="controls">
                                <input name="photo" type="text"  placeholder="Photo" value="<?php echo !empty($photos)?$photos:'';?>">
                                <?php if (!empty($photosError)): ?>
                                    <span class="help-inline"><?php echo $photosError;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($catIdError)?'error':'';?>">
                            <label class="control-label">Category ID</label>
                            <div class="controls">
                                <input name="catId" type="text"  placeholder="CatID" value="<?php echo !empty($catId)?$catId:'';?>">
                                <?php if (!empty($catIdError)): ?>
                                    <span class="help-inline"><?php echo $catIdError;?></span>
                                <?php endif;?>
                            </div>
                        </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="../manageProducts.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>