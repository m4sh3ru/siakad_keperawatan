<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <ul class="sidebar-menu">
        <li  <?php if(isset($dash)) echo $dash; ?>>
            <a href="<?php echo site_url('admin/dashboard'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-th"></i> <span>Master</span>
            <i class="fa fa-angle-left pull-right"></i>    
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/prodi'); ?>"><i class="fa fa-angle-double-right"></i>Program Studi</a></li>
                <li><a href="<?php echo site_url('admin/dosen'); ?>"><i class="fa fa-angle-double-right"></i>Dosen</a></li>
                <li><a href="<?php echo site_url('admin/kelas'); ?>"><i class="fa fa-angle-double-right"></i>Kelas</a></li>
                <li><a href="<?php echo site_url('admin/nilai/grade'); ?>"><i class="fa fa-angle-double-right"></i>Grade Nilai</a></li>
                <li><a href="<?php echo site_url('admin/tahun_ajaran'); ?>"><i class="fa fa-angle-double-right"></i>Tahun Pelajaran</a></li>
            </ul>
        </li>
        <li <?php if(isset($mhs)) echo $mhs; ?>>
            <a href="<?php echo site_url('admin/mahasiswa'); ?>">
                <i class="fa fa-users"></i><span>Mahasiswa</span>                
            </a>
        </li>
        <li class="treeview">
           <a href="#">
               <i class="fa fa-bank"></i> <span>Perkuliahan</span>
           <i class="fa fa-angle-left pull-right"></i>    
           </a>
           <ul class="treeview-menu">
               <li><a href="<?php echo site_url('admin/matakuliah'); ?>"><i class="fa fa-angle-double-right"></i> Mata Kuliah</a></li>
               <li><a href="<?php echo site_url('admin/nilai'); ?>"><i class="fa fa-angle-double-right"></i> Nilai</a></li>
           </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Akademik</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/krs'); ?>"><i class="fa fa-angle-double-right"></i> KRS </a></li>
                <li><a href="<?php echo site_url('admin/khs'); ?>"><i class="fa fa-angle-double-right"></i> KHS </a></li>
            </ul>
        </li>
        <li <?php if(isset($akun)) echo $akun; ?>>
            <a href="<?php echo site_url('admin/account'); ?>">
                <i class="fa fa-cogs"></i> <span>User Account</span>
            </a>
        </li>
       
    </ul>
</section>
<!-- /.sidebar -->