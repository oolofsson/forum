
<?php
	$valid_file = true;
	
	
	//if they DID upload a file...
	if(isset($_FILES['profilepicture'])){
		if($_FILES['profilepicture']['name'])
		{
			//if no errors...
			if(!$_FILES['profilepicture']['error'])
			{

				$info = getimagesize($_FILES['profilepicture']['tmp_name']);
				if ($info === FALSE) {
				   $valid_file = false;
				}

				$path_parts = pathinfo($_FILES["profilepicture"]["name"]);
				$image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];

				//timestamp?
				if($_FILES['profilepicture']['size'] > (1024000)) //can't be larger than 1 MB
				{
					$valid_file = false;
					$message = 'Oops!  Your file\'s size is to large.';
				}
				
				//if the file has passed the test
				if($valid_file)
				{
					//get old filename for removal
					$old_filename = 'img/'.$user->getImagepath();
					
					//move it to where we want it to be
					move_uploaded_file($_FILES['profilepicture']['tmp_name'], 'img/'.$image_path);
					$user->addImagePath($_SESSION['email'], $image_path);
					
					//delete old userpicture
					if (file_exists($old_filename)) {
					    unlink($old_filename);
					}
					header('Location: profile.php');
					end();
				}
			}
			//if there is an error...
			else
			{
				//set that to be the returned message
				$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['profilepicture']['error'];
			}
		}
	}
	

?>

<div>
	<form enctype="multipart/form-data" action="" method="post">
		<input type="file" name="profilepicture" size="25" />
		<input type="submit" name="submit" value="Lägg till profilbild" />
	</form>
</div>