<header>
  <nav>
    <ul>
      <li><a href="/smc_project/admin/dashboard">Dashboard</a></li>
      <li><a href="/smc_project/admin/campaignType">Campaign Type</a></li>
      <li><a href="/smc_project/admin/media">Media</a></li>
      <li><a href="/smc_project/admin/technique">Technique</a></li>
    </ul>
	  <?php if ( isset( $_SESSION['user_id'] ) ) { ?>
        <button>
          <a href="/smc_project/auth/logout" class="ml-full block">Logout</a>
        </button>
	  <?php } ?>
  </nav>
</header>
