 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Status</th>
                  <th>Opsi</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>
                    <div class="btn-group" id="toggle_event_editing">
                    	<button type="button" class="btn btn-info locked_active">OFF</button>
                    	<button type="button" class="btn btn-default unlocked_inactive">ON</button>
                    </div>
                    <div class="alert alert-info" id="switch_status">Switched off.</div>
                    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
                                <!-- /.box-body -->
                                <script type="text/javascript">
                                $('#toggle_event_editing button').click(function(){
                             	if($(this).hasClass('locked_active') || $(this).hasClass('unlocked_inactive')){
                             		/* code to do when unlocking */
                                     $('#switch_status').html('Switched on.');
                             	}else{
                             		/* code to do when locking */
                                     $('#switch_status').html('Switched off.');
                             	}

                             	/* reverse locking status */
                             	$('#toggle_event_editing button').eq(0).toggleClass('locked_inactive locked_active btn-default btn-info');
                             	$('#toggle_event_editing button').eq(1).toggleClass('unlocked_inactive unlocked_active btn-info btn-default');
                             });
                     </script>
                  </td>
                  <td>
                    <a href="#" style="color: #000;">
                      <i class="fa fa-eye fa-2x" aria-hidden="true"style="background: #00a65a;border-radius: 7px;"></i>
                    </a>&nbsp&nbsp
                    <a href="#" style="color: #000;">
                      <i class="fa fa fa-pencil fa-2x" aria-hidden="true"style="background: #f39c12;border-radius: 7px;"></i>
                    </a>&nbsp&nbsp
                    <a href="#" style="color: #000;">
                      <i class="fa fa-trash fa-2x" aria-hidden="true"style="background: #dd4b39 ;border-radius: 7px;"></i>
                    </a>
                  </td>
                </tr>

                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
    </section>

  <!-- /.content-wrapper -->
