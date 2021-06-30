<!-- History -->
    <div class="modal fade" id="d<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel"> Detail Product</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from product where productid='".$row['productid']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<tbody>
                                                                <?php
										$pd=mysqli_query($conn,"select * from product where productid='".$row['productid']."'");
										$pdrow=mysqli_fetch_array($pd);
                                                                                $supplier = $pdrow['supplierid'];
											?>
									<tr>
										<td>Nama Produk </td>
                                                                                <td align="center"><?php echo ucwords($pdrow['product_name']); ?></td>
                                                                        </tr>
                                                                         <tr>
										<td>Spesifikasi</td>
                                                                                <td align="center"><?php echo $pdrow['spek']; ?></td>
									</tr>
                                                                        <tr>
										<td>Harga</td>
                                                                                <td align="center"><?php echo buat_rupiah($pdrow['product_price'],2); ?></td>
									</tr>
                                                                        <tr>
										<td>Stok</td>
                                                                                <td align="center"><?php echo $pdrow['product_qty']; ?></td>
									</tr>
                                                                        <tr>
                                                                        <?php
                                                                                  $s=mysqli_query($conn,"select * from supplier where userid='".$supplier."'");
										  $sup=mysqli_fetch_array($s);
                                                                        ?>
										<td>Supplier</td>
                                                                                <td align="center"><?php echo $sup['company_name']; ?></td>
									</tr>
                                                                        <tr>
										<td>Alamat</td>
                                                                                <td align="center"><?php echo $sup['company_address']; ?></td>
									</tr>
                                                                        <tr>
										<td>Contact</td>
                                                                                <td align="center"><?php echo $sup['contact']; ?></td>
									</tr>
                                                              
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
