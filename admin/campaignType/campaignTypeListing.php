<?php
include '../../connection.php';
global $connection;
?>

<section class="flex flex-col px-8 py-6 gap-4 items-center mt-8">

  <h2 class="text-red-800 text-3xl font-bold mb-6">
    Campaign Type Listing
  </h2>


  <table class="border-2 border-black w-[600px]">
    <tr>

      <th>Campaign Type ID</th>

      <th>Campaign Type Name</th>

      <th>Action</th>

    </tr>


	  <?php

	  $typeSelect = "select * from CAMPAIGN_TYPE";

	  $result = mysqli_query( $connection, $typeSelect );

	  $count = mysqli_num_rows( $result );

	  // show data

	  for ( $i = 0; $i < $count; $i ++ ) {

		  $arr = mysqli_fetch_array( $result );

		  $campaignId = $arr['id'];

		  $campaignName = $arr['name'];


		  echo "<tr>";

		  echo "<td> $campaignId</td>";

		  echo "<td> $campaignName</td>";

		  echo "<td class='w-28'> 
 
<a href='update?id=$campaignId' class='hover:text-zinc-900 hover:font-semibold'> Edit </a> | 
<a href='delete.php?id=$campaignId' class='hover:text-red-700 hover:font-semibold'> Delete </a> 
</td>";

		  echo "</tr>";

	  }

	  ?>

  </table>

</section>
