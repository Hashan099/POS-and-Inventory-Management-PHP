<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Purchases </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" xmlns="http://www.w3.org/1999/html" style="background-image: url('/posci/public/uploads/bg2.jpg'); background-size: cover;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchases Form
        <small>Add Transaction</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo site_url('transaksi/create');?>">Add </a></li>
            <li role="presentation"><a href="<?php echo site_url('transaksi');?>">List Purchases</a></li>
          </ul>
		  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaction</h3>
              <?php if($this->session->flashdata('form_false')){?>
                <div class="alert alert-danger text-center">
                  <strong><?php echo $this->session->flashdata('form_false');?></strong>
                </div>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!empty($transaksi)){?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('transaksi/update').'/'.$transaksi[0]->id;?>">
            <?php }else{?>
            <form id="transaction-form" class="form-horizontal" method="POST" action="<?php echo site_url('transaksi/add_process');?>">
            <?php } ?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="kode">Transaction Code</label>
                    <div class="col-sm-8">
                    <input data-attr="" type="text" name="transaction_id" data-origin="<?php echo generateTransactionCode(); ?>" value="<?php echo generateTransactionCode(); ?>" id="kode_transaksi" class="form-control" required/>
                      <span class="help-inline label label-danger" id="status_kode"></span>
                    </div>
                  </div>
                  <?php
                  function generateTransactionCode() {
                      // Generate a unique transaction code, such as a combination of current date and time
                      $transaction_code = 'P' . date('YmdHis');
                      return $transaction_code;
                  }
                  ?>

                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="category_id">Supplier</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="supplier_id" name="supplier_id">
                        <?php if(isset($suppliers) && is_array($suppliers)){?>
                          <?php foreach($suppliers as $item){?>
                            <option value="<?php echo $item->id;?>" <?php if(!empty($transaksi) && $item->id == $transaksi[0]->supplier_id) echo 'selected="selected"';?>>
                              <?php echo $item->supplier_name;?>
                            </option>
                          <?php }?>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4 control-label" for="date">Date</label>
                    <div class="col-sm-8">
                      <input type="text" value="<?php echo date('Y-m-d H:i:s');?>" id="date" class="form-control" disabled/>
                      <input type="hidden" name="supplier_date" value="<?php echo date('Y-m-d H:i:s');?>" id="supplier_date" class="form-control"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <h3 class="content-title">Item Information</h3>
                  <div class="content-process">
                    <table class="table">
                      <thead>
                        <tr>
                          <td>Category</td>
                          <td>Item Name</td>
                          <td>Qty (KG)</td>
                          <td>Purchase Price per KG</td>
                          <td >Discount (%) </td>
                          <td><span class="opacity-0 pointer-events-none">Discount 2</span></td>
                          <td><span class="opacity-0 pointer-events-none">Discount 3</span></td>
                          <td>Net Total Amount to Pay</td>
                          <td> Confirmation </td>
                        </tr>
                      </thead>
                      <tbody id="transaksi-item">
                        <tr>
                          <td>
                            <select class="form-control" id="transaksi_category_id" name="category_id">
                              <option value="0">
                                Please Select One...
                              </option>
                              <?php if(isset($kategoris) && is_array($kategoris)){?>
                                <?php foreach($kategoris as $item){?>
                                  <option value="<?php echo $item->id;?>">
                                    <?php echo $item->category_name;?>
                                  </option>
                                <?php }?>
                              <?php }?>
                            </select>
                          </td>
                          <td>
                            <select class="form-control" name="product_id" id="transaksi_product_id"></select>
                          </td>
                          <td>
                            <input type="number" id="jumlah" class="form-control" name="jumlah" min="1" value="1"/>
                          </td>
                          <td>
                            <input type="text" class="form-control form-price-format discount-trx" data-attr="0" id="sale_price" name="sale_price" placeholder="Price" required/>
                          </td>

                          <td>
                            <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="1" id="disc_1" name="disc_1" placeholder="Discount 1" disabled/>
                          </td>
                          <td>
                              <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="2" id="disc_2" name="disc_2" placeholder="Discount 2" readonly/>
                          </td>
                          <td>
                              <input type="number" value="0" min="0" max="100" class="form-control discount-trx" data-attr="3" id="disc_3" name="disc_3" placeholder="Discount 3" readonly/>
                          </td>

                          <td>
                            <input type="text" class="form-control" id="harga_satuan_net" name="harga_satuan_net" placeholder="Net Unit Price" readonly/>
                          </td>

                          <td>
                          <a href="#" class="btn btn-primary" id="tambah-barang">Confirm <i class="fa fa-folder-plus"></i></a>
                          </td>
                        </tr>
                        <?php if(!empty($carts) && is_array($carts)){?>
                            <?php foreach($carts['data'] as $k => $cart){?>
                              <tr id="<?php echo $k;?>" class="cart-value">
                                <td><?php echo $cart['category_name'];?></td>
                                <td><?php echo $cart['name'];?></td>
                                <td><?php echo $cart['qty'];?></td>
                                <td>$<?php echo number_format($cart['price']);?></td>
                                <td><span class="btn btn-danger btn-sm transaksi-delete-item" data-cart="<?php echo $k;?>"><i class="fa fa-times-circle"></i></span></td>
                              </tr>
                            <?php }?>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3">Total Purchases</th>
                          <th colspan="2" id="total-pembelian"><?php echo !empty($carts) ? '$'.number_format($carts['total_price']) : '';?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-md-3 col-md-offset-4">
                  <a class="btn btn-success" href="#" id="submit-transaksi">Submit</a>
                  <a class="btn btn-danger" href="<?php echo site_url('transaksi');?>">Cancel</a>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
        <!-- /.col -->
      </div>
	  <!-- row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>