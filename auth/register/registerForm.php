<section class="wrapper">
	<h1>Sign up</h1>
	<form method="post">
		<div class="form-container">
			<div class="form-field">
				<label for="firstName">First Name</label>

				<input type="text" name="firstName" placeholder="Enter first name" id="firstName" required>
			</div>
			<div class="form-field">
				<label for="lastName">Last Name</label>

				<input type="text" name="lastName" placeholder="Enter last name" id="lastName" required>
			</div>
			<div class="form-field">
				<label for="username">Username</label>

				<input type="text" name="username" placeholder="Enter username" id="username" required>
			</div>
			<div class="form-field">

				<label for="email">Email</label>

				<input type="text" name="email" placeholder="Enter Email" id="email" required>

			</div>

			<div class="form-field">

				<label for="address">Address</label>

				<textarea name='address' id="address"></textarea>

			</div>

			<div class="form-field">
				<label for="phone">Phone Number</label>

				<input type="text" name="phone" placeholder="Enter phone number" id="phone" required>
			</div>


			<div class="form-field">

				<label for="password">Password</label>

				<input type="password" id="password" name="password" placeholder="Enter your password" required>

				<label>
					<input type="checkbox" name="show" onclick="showPassword()">
					show password
				</label>

			</div>

			<div class="form-field">
				<label for="confirm_password">Confirm password</label>

				<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password"
				       required>
				<label>
					<input type="checkbox" name="show" onclick="showConfirmPassword()">
				</label>show password
			</div>

			<button type="submit" name="signup" value="SIGNUP" class="btn">Sign up</button>
		</div>
		<!--	  --><?php
		if ( isset( $_GET['error'] ) ) {
			echo "<small style='color: red'>" . $_GET['error'] . "</small>";
		}
		//	  ?>
	</form>
</section>

<script type="text/javascript">
    function showPassword() {
        const x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showConfirmPassword() {
        const x = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>