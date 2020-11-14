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
			<a href="?hal=kegiatan" class="nav-link"> <!-- active -->
				<i class="fa fa-plus nav-icon"></i>
				<p>Data Usaha Unit</p>
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

<li class="nav-item">
	<hr>
</li>

<?php for ($i=0;$i<5;$i++) {  ?>
	<li class="nav-item has-treeview"> <!--menu-open-->
		<a href="#" class="nav-link"> <!-- active -->
			<i class="nav-icon fas fa-list"></i>
			<p>
				Unit : Kampung Flory
				<i class="fas fa-angle-down right"></i>
			</p>
		</a>
		<ul class="nav nav-treeview">
			<li class="nav-item">
				<a href="?hal=lap_jurnal_umum" class="nav-link">
					<i class="fa fa-bookmark nav-icon"></i>
					<p>Jurnal Umum</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?hal=lap_buku_besar" class="nav-link"> <!-- active -->
					<i class="fa fa-book nav-icon"></i>
					<p>Buku Besar</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?hal=lap_arus_kas" class="nav-link"> <!-- active -->
					<i class="fa fa-angle-double-right nav-icon"></i>
					<p>Arus Kas</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?hal=lap_laba_rugi" class="nav-link"> <!-- active -->
					<i class="fa fa-credit-card nav-icon"></i>
					<p>Laba Rugi</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?hal=lap_perubahan_modal" class="nav-link"> <!-- active -->
					<i class="fa fa-low-vision nav-icon"></i>
					<p>Perubahan Modal</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="?hal=lap_neraca" class="nav-link"> <!-- active -->
					<i class="fa fa-balance-scale nav-icon"></i>
					<p>Neraca</p>
				</a>
			</li>
		</ul>
	</li>
	<?php } ?>