<?php if($_SESSION['stts']=="member"){?>
<div class="navbar sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li<?php if($act==10){?> class="active"<?php } ?>>
                <a href="<?php echo base_url();?>index.php/member/c_member/index"><i class="fa fa-home fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pencil fa-fw"></i> Kirim Pesan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?php if($act==30){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/new_pesan">Pesan Satuan</a>
                    </li>
                    <li <?php if($act==4){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/siaran">Pesan Siaran</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/member/c_member/tabel"><i class="fa fa-envelope-o fa-fw"></i> Daftar Pesan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?php if($act==5){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/pesan_masuk">Pesan Masuk</a>
                    </li>
                    <li <?php if($act==6){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/pesan_keluar">Pesan Keluar</a>
                    </li>
                        <li <?php if($act==7){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/pesan_terkirim">Pesan Terkirim</a>
                    </li>
                </ul>
            </li>
            <li <?php if($act==1){?> class="active"<?php } ?>>
                <a href="#"><i class="fa fa-book fa-fw"></i> Phonebook<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li <?php if($act==8){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/pbk">Semua</a>
                    </li>
                    <li <?php if($act==9){?>class="active"<?php } ?>>
                        <a href="<?php echo base_url();?>index.php/member/c_member/grup">Group</a>
                    </li>
                </ul>
            </li>
            
            <li <?php if($act==88){?>class="active"<?php } ?>>
                <a href="<?php echo base_url();?>index.php/member/c_member/profil"><i class="fa fa-user fa-fw"></i> Profil</a>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a data-toggle="tooltip" data-original-title="Tooltip on right" title="Apa anda yakin ingin keluar?" data-placement="right" href="<?php echo base_url();?>index.php/member/c_member/logout"><i class="fa fa-power-off fa-fw"></i> Logout</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<?php }?>