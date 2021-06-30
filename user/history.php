<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">History Pembelian</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Pembelian Date</th>
								<th>Total</th>
								<th>Action</th>
                                                                <th>Status</th>							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($conn,"select * from sales where userid='".$_SESSION['id']."' order by sales_date desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo date("M d, Y - h:i A", strtotime($hrow['sales_date']));?></td>
											<td><?php echo number_format($hrow['sales_total'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> View Full Details</a>
												<?php include ('modal_hist.php'); ?>
                                                                                                
                                                                                                <!-- Trigger the modal with a button -->
                  <a href="#bayar<?php echo $hrow['salesid']; ?>" data-toggle="modal" data-target="#bayar<?php echo $salesid ?>" class="btn btn-primary"><span class="fa fa-shopping-cart fa-fw"></span> Bayar</a>
                  <!-- Modal -->
                  <div class="modal fade" id="bayar<?php echo $salesid ?>" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title center">Pembayaran</h4>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                          <?php
		$cq=mysqli_query($conn,"select * from customer left join `user` on user.userid=customer.userid where customer.userid='".$_SESSION['id']."'");
		$crow=mysqli_fetch_array($cq);
	?>
                    <form role="form" method="POST" action="bayar.php?id=<?php echo $hrow['salesid']; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
                                                <div class="alert alert-info"><strong> Kirim bukti pembayaran sesuai total ! </strong>
                                                </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nama:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" disabled="disabled" value="<?php echo ucwords($crow['customer_name']); ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Alamat:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" disabled="disabled" value="<?php echo ucwords($crow['address']); ?>">
                        </div>	
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">No Hp:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" disabled="disabled" value="<?php echo ucwords($crow['contact']); ?>">
                        </div>	
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Bukti Pembayaran:</span>
                            <input type="file" style="width:400px;" class="form-control" name="image">
                        </div>            
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check fa-fw"></i> Confirm</button>
					</form>
                </div>
                        </div>
                      </div>
        
											</td>
                                                                                        <td><span class="label label-warning"><?php echo $hrow['status'];  ?></span>
                                                                                        </td>
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>
</html>