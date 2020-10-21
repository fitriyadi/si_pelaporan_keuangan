<li class="nav-item">
	<a href="?hal=beranda" class="nav-link">
		<i class="nav-icon fas fa-home"></i>
		<p> Dashboard </p>
	</a>
</li>

<li class="nav-item has-treeview"> <!--menu-open-->
	<a href="#" class="nav-link"> <!-- active -->
		<i class="nav-icon fas fa-database"></i>
		<p>
			Data Master
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="?hal=akun" class="nav-link">
				<i class="fa fa-book nav-icon"></i>
				<p>Data Akun</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="?hal=ind" class="nav-link"> <!-- active -->
				<i class="fa fa-certificate nav-icon"></i>
				<p>Data index</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="?hal=unit" class="nav-link"> <!-- active -->
				<i class="fa fa-bars nav-icon"></i>
				<p>Data Unit</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="?hal=admin" class="nav-link"> <!-- active -->
				<i class="fa fa-user nav-icon"></i>
				<p>Data Admin</p>
			</a>
		</li>

		<li class="nav-item">
			<a href="?hal=user" class="nav-link"> <!-- active -->
				<i class="fa fa-user-circle nav-icon"></i>
				<p>Data User</p>
			</a>
		</li>
	</ul>
</li>

<li class="nav-item has-treeview"> <!--menu-open-->
	<a href="#" class="nav-link"> <!-- active -->
		<i class="nav-icon fas fa-calculator"></i>
		<p>
			Laporan Unit
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		
		<?php

		$query="SELECT * from tb_unit";
		$result=$mysqli->query($query);
		$num_result=$result->num_rows;
		if ($num_result > 0 ) { 
			$no=0;
			while ($data=mysqli_fetch_assoc($result)) {
				extract($data);
				?>
				<li class="nav-item">
					<a href="?hal=transaksi_data&id=<?=$id_unit?>" class="nav-link">
						<i class="fa fa-address-book nav-icon"></i>
						<p><?=$nama_unit?></p>
					</a>
				</li>
			<?php }} ?>

		</ul>
	</li>
