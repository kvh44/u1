

<?php 

if (isset($userpp)) {
	if ($userpp!=null) {
		$photo='/userprofilephoto/'.$userpp->getPhoto();
		echo '<img src="/uploads'.$photo.'" />'; 
	}
}


?>


