<?php
include "../../connection.php";
global $connection;
?>

<div>
	<h1 class="text-red-800 text-3xl font-bold mb-6">
		Technique List
	</h1>

	<form action="./" method="post" class="mb-20">

		<table class="border-2 border-black divide-y divide-black">
			<thead>
			<tr>
				<th>Technique ID</th>

				<th>Name</th>

				<th>Description</th>

				<th>Photo1</th>

				<th>Photo2</th>
        <th>Action</th>

			</tr>
			</thead>

			<?php

			$showquery = "select * from technique";

			$result1 = mysqli_query( $connection, $showquery );

			$count = mysqli_num_rows( $result1 );

			if ( $count > 0 ) {
				for ( $i = 0; $i < $count; $i ++ ) {

					$arr = mysqli_fetch_array( $result1 );

					$id = $arr['id'];

					$name = $arr['name'];

					$photo1 = $arr['photo1'];
					$photo2 = $arr['photo2'];
					$description   = $arr['description'];
					echo "<tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$description</td>
                            <td><img src='$photo1' width='30px' height='30px' alt='photo1'></td>
                            <td><img src='$photo2' width='30px' height='30px' alt='photo2'></td> 
                            <td class='w-28'>
                            <a href='update.php?id=$id' class='hover:text-zinc-900 hover:font-semibold'> Edit </a> | 
                            <a href='delete.php?id=$id' class='hover:text-red-700 hover:font-semibold'> Delete </a> 
                            </td> 
                          </tr>";
				}
			} else {
				echo "<tr><td colspan='11' class='text-center h-20'>No data found</td></tr>";
			}
			?>
	</form>
</div>
