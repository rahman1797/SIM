<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login SIM OPMAWA</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
</head>
<style type="text/css">
body {
    background-image: url("assets/images/4028.jpg");
  }
</style>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Login <b>SIM</b></a>
            <small>Sistem Informasi Manajemen OPMAWA FMIPA</small>
        </div>
        <div class="card"  style="border-radius: 15px; hover">
            <div class="body">
                <form id="sign_in" method="POST" onsubmit="return Login()" name="loginForm">
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user_NIM" id="user_NIM" placeholder="NIM" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">MASUK</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/node-waves/waves.js')?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/admin.js')?>"></script>
    <script src="<?php echo base_url('assets/js/pages/examples/sign-in.js')?>"></script>

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  
  function Login() {
   var NIM=$("#user_NIM").val();
   var pass=$("#user_pass").val();
   
   if(NIM!="" && pass!="") { 
      $.ajax
      ({
        type:'post',
        url:"<?php echo base_url('Login_C/exeLogin') ?>",
        data:{
          user_NIM:NIM, 
          user_pass:pass
      },
      
        success:function(response) {
          if(response=='sukses')
          {
            swal({
            title: "Sukses!",
              text: "Selamat Datang di SIM OPMAWA!",
              icon: "success",
              button: "Lanjutkan!"
            }).then(function() {
                window.location = "Main_C";
            });  
          }

          else if(response=='dosen')
          {
            swal({
            title: "Sukses!",
              text: "Selamat Datang di SIM OPMAWA!",
              icon: "success",
              button: "Lanjutkan!"
            }).then(function() {
                window.location = "Dosen_C";
            });  
          }
          
          else
          {
            swal ( "Maaf" ,  "NIM/password salah" ,  "error" );
          }
          
        }
      });
   }
   return false;
  }
  
</script>

</body>
