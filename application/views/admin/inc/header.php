<header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Toms</b>Agribis</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
              inner menu: contains the actual data
              <ul class="menu">
                <li>
                  start message
                  <a href="#">
                    <div class="pull-left">
                      <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Support Team
                      <small><i class="fa fa-clock-o"></i> 5 mins</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                end message
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li> -->
        <!-- Notifications: style can be found in dropdown.less -->
        <?php
        $where = array('status_pembayaran' => 'Lunas',
        'Notifikasi' => 'Belum Dibaca');
        $querynotif=$this->db->get_where('transaksi',$where);

        $jumlahnotif=$querynotif->num_rows();
        $listnotif=$querynotif->result_array()

                        ?>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"><?php echo $jumlahnotif ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">terdapat <?php echo $jumlahnotif ?> notifikasi transaksi baru</li>
            <li>
              <!-- inner menu: contains the actual data -->

              <ul class="menu">
                <?php foreach ($listnotif as $rowotif): ?>
                  <li>
                    <a href="<?php echo base_url('admin/CA_transaksi/list_transaksi/'.$rowotif['id_transaksi'])?>">
                      <i class="fa fa-user text-aqua"></i> <?php echo $rowotif['username'] ?><br>
                      <i class="fa fa-calendar"></i><?php echo $rowotif['tanggal'] ?>
                    </a>
                  </li>
                <?php endforeach; ?>

              </ul>
            </li>
            <li class="footer"><a href="<?php echo base_url('admin/CA_transaksi/list_transaksi/')?>">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
            <span class="hidden-xs">devy</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->

            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <!-- <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> -->
              <div class="pull-right">
                <a href="<?php echo base_url('C_Login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->

      </ul>
    </div>
  </nav>
</header>
