<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex h-screen w-full items-center justify-center bg-blue-500 bg-cover bg-no-repeat" style="background-image:url('/posci/public/uploads/bg2.jpg')">
    <?php $this->load->view('element/head');?>
    <div class="rounded-xl bg-gray-800 bg-opacity-50 px-80 py-80 shadow-lg backdrop-blur-md max-sm:px-8">
    <div class="mb-8 flex flex-col items-center">
        <img src="/posci/public/uploads/logo1.png" width="150" alt="" srcset="" />
        <h1 class="mb-20 text-5xl text-white"> Point of sales System </h1>
        <span class="text-gray-300 text-3xl"> Enter Your Credentials </span>
      </div>
        <!-- /.login-logo -->
        <div class="mb-8 flex flex-col items-center">
            <?php if($this->session->flashdata('login_false')){?>
                <div class="alert alert-danger alert-dismissible">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                        <i class="icon fa fa-ban"></i>Alert!
                    </h4>
                    <?php echo $this->session->flashdata('login_false');?>
                </div>
            <?php } ?>
            <form action="<?php echo site_url('auth/login_process');?>" method="post">
                <div class="mb-4 text-lg">
                <input class="rounded-2xl border-none bg-white bg-opacity-90 px-24 py-5 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="text" name="username" placeholder="User Name" />
                </div>

                 <div class="mb-4 text-lg">
          <input class="rounded-2xl border-none bg-white bg-opacity-90 px-24 py-5 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" type="Password" name="password" placeholder="Password" />
        </div>
                
                    <!-- /.col -->
                    <div class="mt-8 flex justify-center text-lg text-black">
                       <button type="submit" class="rounded-3xl bg-blue-500 bg-opacity-50 px-20 py-6 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-blue-900">Login</button>
                    </div>
                    
                    <!-- /.col -->
                </div>

                <div class="text-center mt-4">
                <a class="small" href="<?= site_url('register') ?>">Create an Account</a>
                </div>
              
            </form>
        </div> 
        <!-- /.login-box-body -->
    </div>
    <?php $this->load->view('element/footer');?>
</body>
</html>
