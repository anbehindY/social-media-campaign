<?php
include "../../connection.php";
global $connection;
 ?>

<div>
  <h1 class="text-red-800 text-3xl font-bold mb-6">
    Media List
  </h1>

  <form action="./" method="post" class="mb-20">

    <table class="border-2 border-black divide-y divide-black">
      <thead>
      <tr>
        <th>Media ID</th>

        <th>Name</th>

        <th>Link</th>

        <th>Icon</th>

        <th>Action</th>

      </tr>
      </thead>

		<?php

		$showquery = "select * from media";

		$result1 = mysqli_query( $connection, $showquery );

		$count = mysqli_num_rows( $result1 );

		if ( $count > 0 ) {
			for ( $i = 0; $i < $count; $i ++ ) {

				$arr = mysqli_fetch_array( $result1 );

				$id = $arr['id'];

				$name = $arr['name'];

				$icon = $arr['photo'];
        $link = $arr['link'];
				echo "<tr>
                            <td>$id</td> 
                            <td>$name</td> 
                            <td>$link</td>
                            <td><img src='$icon' width='30px' height='30px' alt='icon'></td> 
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
