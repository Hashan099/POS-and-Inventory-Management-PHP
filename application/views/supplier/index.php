<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Supplier  </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<?php $this->load->view('element/head');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-cover blur-md" style="background-image: url('/posci/public/uploads/bg2.jpg');" xmlns="http://www.w3.org/1999/html" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Suppliers
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Supplier List </a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="<?php echo site_url('supplier/create');?>">Add </a></li>
                <li role="presentation" class="active"><a href="<?php echo site_url('supplier');?>">Suppliers List </a></li>
            </ul>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Suppliers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo site_url('supplier?search=true');?>" method="GET">
                <input type="hidden" class="form-control" name="search" value="true"/>
                <div class="box-body pad">
                  <?php echo search_form('supplier');?>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <input type="submit" value="Search" class="form-control btn btn-warning">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit">&nbsp</label>
                      <a href="<?php echo site_url('supplier/export_csv').get_uri();?>" class="form-control btn btn-info"><i class="fa fa-file-csv"></i> Export to SpreadSheet</a>
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Supplier Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php if(isset($suppliers) && is_array($suppliers)){ ?>
				  <?php foreach($suppliers as $supplier){?>
					<tr>
                      <td><?php echo $supplier->id;?></td>
					  <td><?php echo $supplier->supplier_name;?></td>
					  <td><?php echo $supplier->supplier_phone;?></td>
					  <td><?php echo $supplier->supplier_address;?></td>
					  <td>
						<a href="<?php echo site_url('supplier/edit').'/'.$supplier->id;?>" class="btn btn-xs btn-primary">Edit</a>
						<a onclick="return confirm('Are you sure you want to delete this supplier?');" href="<?php echo site_url('supplier/delete').'/'.$supplier->id;?>" class="btn btn-xs btn-danger">Delete</a>
					  </td>
					</tr>
				  <?php } ?>
				<?php } ?>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
            <div class="text-center">
              <?php echo $paggination;?>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	  <!-- row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('element/footer');?>