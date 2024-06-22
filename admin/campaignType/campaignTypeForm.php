<section class="flex flex-col px-8 py-6 gap-4 mb-8">
	<h1 class="text-red-800 text-3xl font-bold mb-6">
		Campaign type entry
	</h1>
	<form action="create.php" method="post">
		<div class="flex gap-5 items-center">
			<label for="campaignType" class="text-gray-800 text-lg font-medium whitespace-nowrap">Name of Campaign
				type</label>
			<input type="text" name="campaignType" id="campaignType"
			       class="w-full py-2 px-4 rounded-lg border border-gray-300 mt-2">
			<button type="submit" class="bg-red-800 text-white py-2 px-4 rounded-lg mt-2">Submit</button>
		</div>
	</form>
</section>