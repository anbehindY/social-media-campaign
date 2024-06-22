<?php
include "../../connection.php";
global $connection;
?>

<div>
	<h1 class="text-red-800 text-3xl font-bold mb-6">
		Technique Entry
	</h1>
	<form action="./create.php" method="post" enctype="multipart/form-data"
	      class="flex flex-wrap justify-center items-center gap-4">
		<div class="flex flex-col items-start">
			<label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="name">Technique Name</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="name"
			       placeholder="Enter technique name" id="name">
		</div>

		<div class="flex flex-col items-start">
			<label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="description">Description</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="description"
			       placeholder="Enter description" id="description" required>
		</div>

		<div class="flex flex-col items-start">
			<label for="photo1" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 1</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="photo1" id="photo1"
			       required>
		</div>

		<div class="flex flex-col items-start">
			<label for="photo2" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Photo 2</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="photo2" id="photo2"
			       required>
		</div>

		<div class="flex items-center gap-5 w-[1000px] mt-5">
			<label class="text-gray-800 text-lg font-medium whitespace-nowrap" for="mediaId">Media</label>
			<select name="mediaId" id="mediaId" required class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2">
				<option value="">Select media</option>
				<?php
				$getMediaQuery = "SELECT * FROM media";
				$getMedia 	= mysqli_query( $connection, $getMediaQuery );
				$count       = mysqli_num_rows( $getMedia );

				for ( $i = 0; $i < $count; $i ++ ) {
					$arr    = mysqli_fetch_array( $getMedia );
					$mediaName = $arr['name'];
					$mediaId   = $arr['id'];
					echo "<option value='$mediaId'> $mediaName </option> ";
				}
				?>
			</select>

		</div>

		<button type="submit" name="submit" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4">Submit</button>
	</form>
</div>
