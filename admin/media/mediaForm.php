<?php
include "../../connection.php";
global $connection;

?>

<div>
	<h1 class="text-red-800 text-3xl font-bold mb-6">
		Media Entry
	</h1>
	<form action="./create.php" method="post" enctype="multipart/form-data"
	      class="flex flex-wrap justify-center items-center gap-4">
		<div class="flex flex-col items-start">
			<label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="mediaName">Media Name</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="mediaName"
			       placeholder="Enter media name" id="mediaName">
		</div>

		<div class="flex flex-col items-start">
			<label class="text-gray-800 text-lg font-medium whitespace-nowrap w-32" for="mediaLink">Media Link</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="text" name="mediaLink"
			       placeholder="Enter media link" id="mediaLink" required>
		</div>

		<div class="flex flex-col items-start">
			<label for="mediaIcon" class="text-gray-800 text-lg font-medium whitespace-nowrap w-32">Media Icon</label>
			<input class="w-[500px] py-2 px-4 rounded-lg border border-gray-300 mt-2" type="file" name="mediaIcon" id="mediaIcon"
			       required>
		</div>

    <button type="submit" name="submit" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-4">Submit</button>
	</form>
</div>
