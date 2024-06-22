<?php
include "../../connection.php";
global $connection;

$id            = $_GET['id'];
$getMediaQuery = "select * from media where id=$id";
$getMedia      = mysqli_query( $connection, $getMediaQuery );
$media         = mysqli_fetch_array( $getMedia );
$photo         = $media['photo'];
$folder        = '../assets/';
$defaultIcon   = $media['photo'];

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$mediaIcon = $_FILES['mediaIcon'];
	$mediaName = $_POST['mediaName'];
	$mediaLink = $_POST['mediaLink'];

	if ( $mediaIcon['name'] != "" ) {
		$filePhoto = $mediaIcon['name'];
		$fileName  = $folder . '_' . $filePhoto;
		$copy     = copy( $mediaIcon['tmp_name'], $fileName );
		if ( ! $copy ) {
			echo "<p>Camping photo cannot upload";
			exit();
		}
	} else {
		$fileName = $defaultIcon;
	}

	$updateQuery = "UPDATE media SET name='$mediaName', link='$mediaLink', photo='$fileName' WHERE id=$id";
	$result      = mysqli_query( $connection, $updateQuery );

	if ( $result ) {
		header( "Location: ./" );
	} else {
		echo "<p>Media cannot be updated";
	}
}
?>

<div>
  <h1 class="text-red-800 text-3xl font-bold mb-6">
    Media Update
  </h1>
  <form method="post" enctype="multipart/form-data"
        class="flex flex-wrap justify-center items-center gap-4">
    <div class="flex flex-col items-start">
      <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="mediaName">Media Name</label>
      <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="mediaName"
             placeholder="Enter media name" id="mediaName" value=<?= $media['name'] ?>>
    </div>

    <div class="flex flex-col items-start">
      <label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="mediaLink">Media Link</label>
      <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="mediaLink"
             value="<?= $media['link'] ?>"
             placeholder="Enter media link" id="mediaLink" required>
    </div>

    <div class="flex flex-col items-start">
      <label for="mediaIcon" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Media Icon</label>
      <!--      <input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="mediaIcon"-->
      <!--             id="mediaIcon" value="--><?php //= $media['photo'] ?><!--"-->
      <!--             required>-->
      <input type="file" accept="img/*" name="mediaIcon" id="mediaIcon" onchange="loadFile1(event)"/>
      <div><img id="icon" width="100" src="<?= $media['photo'] ?>" alt="icon"/></div>
      <input type="hidden" name="oldIcon" value="<?= $defaultIcon ?>"/>
    </div>
    <button type="submit" name="update" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4">Update</button>
  </form>
</div>

<script>
    const loadFile1 = function (event) {
        const image = document.getElementById('icon');
        image.src =  URL.createObjectURL(event.target.files[0]);
    };
</script>