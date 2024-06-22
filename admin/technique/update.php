<?php
include "../../connection.php";
global $connection;

$id                = $_GET['id'];
$getTechniqueQuery = "select * from technique where id=$id";
$getTechnique      = mysqli_query( $connection, $getTechniqueQuery );
$technique         = mysqli_fetch_array( $getTechnique );
$defaultPhoto1     = $technique['photo1'];
$defaultPhoto2     = $technique['photo2'];
$folder            = '../assets/';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$name        = $_POST['name'];
	$description = $_POST['description'];
	$photo1      = $_FILES['photo1'];
	$photo2      = $_FILES['photo2'];
	$mediaId     = $_POST['mediaId'];


	if ( $photo1['name'] != "" ) {
		$filePhoto = $photo1['name'];
		$fileName1 = $folder . '_' . $filePhoto;
		$copy1     = copy( $photo1['tmp_name'], $fileName1 );
		if ( ! $copy1 ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName = $defaultPhoto1;
	}
	if ( $photo2['name'] != "" ) {
		$filePhoto = $photo2['name'];
		$fileName2 = $folder . '_' . $filePhoto;
		$copy2     = copy( $photo2['tmp_name'], $fileName2 );
		if ( ! $copy2 ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName = $defaultPhoto1;
	}

	$updateQuery = "UPDATE technique SET name='$name', description='$description', photo1='$fileName1', photo2='$fileName2', media_id='$mediaId' WHERE id=$id";
	$result      = mysqli_query( $connection, $updateQuery );

	if ( $result ) {
		header( "Location: ./" );
	} else {
		echo "<p>Technique cannot be updated";
	}
}
?>

<div>
  <h1 class="text-red-800 text-3xl font-bold mb-6">
    Technique Update
  </h1>
  <form method="post" enctype="multipart/form-data"
        class="flex flex-wrap justify-center items-center gap-4">
    <div class="flex flex-col items-start">
      <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="name">Name</label>
      <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="name"
             placeholder="Enter name" id="name" value=<?= $technique['name'] ?>>
    </div>

    <div class="flex flex-col items-start">
      <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="description">Description</label>
      <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="description"
             placeholder="Enter description" id="description" value=<?= $technique['description'] ?> required>
    </div>

    <div class="flex flex-col items-start">
      <label for="photo1" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 1</label>
      <input type="file" accept="img/*" name="photo1" id="photo1" onchange="loadFile1(event)"/>
      <div><img id="photo1Preview" width="100" src="<?= $technique['photo1'] ?>" alt="icon"/></div>
<!--      <input type="hidden" name="defaultPhoto1" value="--><?php //= $defaultPhoto1 ?><!--"/>-->
    </div>

    <div class="flex flex-col items-start">
      <label for="photo2" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 2</label>
      <input type="file" accept="img/*" name="photo2" id="photo2" onchange="loadFile2(event)"/>
      <div><img id="photo2Preview" width="100" src="<?= $technique['photo2'] ?>" alt="icon"/></div>
    </div>

    <div class="flex items-center gap-5 w-[1000px] mt-5">
        <?php
        $getMediaQuery = "SELECT * FROM media WHERE id=$technique[media_id]";
        $getMedia      = mysqli_query( $connection, $getMediaQuery );
        $media        = mysqli_fetch_array( $getMedia );
        ?>
      <label class="text-gray-800 text-lg font-medium whitespace-nowrap" for="mediaId">Media</label>
      <select name="mediaId" id="mediaId" required class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2">
        <option value=<?=$technique['media_id'] ?>><?=$media['name']?></option>
		  <?php
		  $getMediaQuery = "SELECT * FROM media";
		  $getMedia      = mysqli_query( $connection, $getMediaQuery );
		  $count         = mysqli_num_rows( $getMedia );

		  for ( $i = 0; $i < $count; $i ++ ) {
			  $media     = mysqli_fetch_array( $getMedia );
			  $mediaName = $media['name'];
			  $mediaId   = $media['id'];
			  echo "<option value='$mediaId'> $mediaName </option> ";
		  }
		  ?>
      </select>
    </div>

    <button type="submit" name="update" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4">Update</button>
  </form>
</div>

<script>
    const loadFile1 = function (event) {
        const image = document.getElementById('photo1Preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    const loadFile2 = function (event) {
        const image = document.getElementById('photo2Preview');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>