<?php

include( "../../../connection.php" );
global $connection;
session_start();


// update data

if ( isset( $_POST['Update'] ) ) {

	$txtID = $_POST['campaignTypeId'];

	$txtName = $_POST['campaignType'];


	$UpdatePitchType = "update CAMPAIGN_TYPE set name='$txtName' where id='$txtID' ";

	$result = mysqli_query( $connection, $UpdatePitchType );

	if ( $result ) {
		echo "<script>window.alert('Successfully Updated!')</script>";
	} else {
		echo "<script>window.alert('Unsuccessfully Updated!')</script>";
	}
	header( "Location: .././" );
}
$campaignTypeId    = $_GET['id'];
$campaignTypeQuery = "select * from campaign_type where id=$campaignTypeId";
$result            = mysqli_query( $connection, $campaignTypeQuery );
$arr               = mysqli_fetch_array( $result );
?>


<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Pitch type Update</title>

</head>

<body>

<a href=".././">Back</a>
<form method="Post">
  <legend>Enter Pitch Type Update Information:</legend>
  <fieldset>
    <table cellspacing="5px" cellpadding="5px" align="center">
      <tr>
        <td>
          <input type="text" name="campaignType" value="<?php echo $arr['name'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>
          <input type="hidden" name="campaignTypeId" value="<?php echo $arr['id'] ?>">
          <input type="submit" name="Update" value="UPDATE">
        </td>
      </tr>
    </table>
  </fieldset>
</form>
</body>
</html>