<style media="screen">
<style>
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
.navbar-nav > li > .dropdown-menu{
      margin-top: 6px;
}
</style>
</style>
<img src="<?php echo $this->config->item('frontend') ?>/image/headerbibit.jpg" class="img-responsive center-block" style="width:100%" alt="Image">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
    </div>
    <div class="container">
      <div class="row">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav dropdown">

            <li>
    <a class=" dropdown-toggle" type="" data-toggle="dropdown"><span class="fa fa-bars"></span>&nbsp Kategori</a>
    <ul class="dropdown-menu">
      <?php
      $query1 = $this->db->get('kategori');
      $result1=$query1->result_array();
      foreach ($result1 as $row1) {
        $idkat=$row1['id_ketegori'];
        $query2 = $this->db->get_where('sub_ketegori',array('id_ketegori' =>$idkat));
        $result2=$query2->result_array();
       ?>
          <li class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#"> <?php echo $row1['nama_ketegori']; ?> <span class="caret" ></span></a>
            <ul class="dropdown-menu">
              <?php
              foreach ($result2 as $row2) { ?>


                  <li><a tabindex="-1" href="<?php echo base_url('CF_Kategori/kategori/'.$row2['id_subketegori'])?>"><?php echo $row2['nama_subketegori']; ?></a></li>
                <?php }
                 ?>

            </ul>
          </li>
    <?php }?>
    </ul>
</li>
          </ul>
          <ul class="nav navbar-nav">

            <li class="active"><a href="<?php echo base_url()?>">Home</a></li>
            <li><a href="<?php echo base_url('CF_Cara_belanjar')?>">Cara Belanja</a></li>
            <li><a href="<?php echo base_url('CF_Edukasi')?>">Informasi Edukasi</a></li>
            <li><a href="<?php echo base_url('CF_Profil')?>">Tentang Kami</a></li>
            <!-- <li><a href="#">Contact</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a  href="<?php echo base_url('CF_Cart') ?>">
                <span class="glyphicon glyphicon-shopping-cart">
                </span>Cart <span id="1simpleCart_quantity" class="simpl1eCart_quantity">
                  <?php
                        $grand_total = 0;

                        if ($cart = $this->cart->contents()):
                            foreach ($cart as $item):
                                $grand_total = $grand_total + $item['subtotal'];
                                //echo "Rp. ".number_format();

                            endforeach;
                        endif;
                        echo "Rp.";
                        echo number_format($grand_total, 0, ',', '.');
                        ?>
                <span class="caret">
              </span>
            </a>

            </li>
            <?php
            $level=$this->session->userdata('Level');

            if (!empty($level)) { ?>

              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('nama_lengkap');?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li> <a href="<?php echo base_url('CF_Logtransaksi')?>">Transaksi</a> </li>
            <li> <a href="<?php echo base_url('C_Login/logout')?>">Logout</a> </li>

        </ul>
      </li>
          <?php }
          else { ?>
                        <li><a href="<?php echo base_url('C_Login')?>"><span class="glyphicon glyphicon-user"></span> Login</a></li>

            <?php
          }
          ?>

          </ul>
        </div>
      </div>

    </div>

  </div>
</nav>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){

    $(this).next('ul').toggle();

    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
