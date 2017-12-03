<?php $indexer = 1; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('layouts.core-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <title><?php echo e(config('app.name')); ?></title>
    
  </head>
  <?php if(Auth::user()->status == 1): ?>
    <body class="sidebar-mini fixed">
  <?php else: ?>
    <body class="sidebar-mini fixed" onload="chooseRole()">
  <?php endif; ?>

    <div class="wrapper">

      <?php echo $__env->make('layouts.header-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <?php if(Auth::user()->role == 3): ?>
        <?php echo $__env->make('layouts.side-view-player', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>

      <?php if(Auth::user()->role == 2): ?>
        <?php echo $__env->make('layouts.side-view-manager', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>

      <?php if(Auth::user()->role == 1): ?>
        <?php echo $__env->make('layouts.side-view-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php endif; ?>


      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and modular admin template</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li id="demoSwal"><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Getting Started</h3>
              <p>Vali is a free and responsive dashboard theme built with Bootstrap, Pug.js (templating) and SASS. It's fully customizable and modular. You don't need to add the code, you will not use.</p>
              <p>The issue with the most admin themes out there is that if you will see their source code there are a hell lot of external CSS and javascript files in there. And if you try to remove a CSS or Javascript file some things stops working.</p>
              <p>That's why I made Vali. Which is a light weight yet expendable and good looking theme. The theme has all the features required in a dashboard theme but this features are built like plug and play module. Take a look at the <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> about customizing the theme.</p>
              <p class="mt-40 mb-20"><a class="btn btn-primary icon-btn mr-10" href="http://pratikborsadiya.in/blog/vali-admin" target="_blank"><i class="fa fa-file"></i>Docs</a><a class="btn btn-info icon-btn mr-10" href="https://github.com/pratikborsadiya/vali-admin" target="_blank"><i class="fa fa-github"></i>GitHub</a><a class="btn btn-success icon-btn" href="https://github.com/pratikborsadiya/vali-admin/archive/master.zip" target="_blank"><i class="fa fa-download"></i>Download</a></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Compatibility with frameworks</h3>
              <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to it's modular nature it's very easy to incorporate it into any front-end or back-end framework like Angular, React or Laravel.</p>
              <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more details about integrating this theme with various frameworks.</p>
              <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want to contribute to this theme pull requests are always welcome.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <script src="<?php echo asset('mustang/js/plugins/sweetalert.min.js'); ?>"></script>

    <script>
      $(document).ready(function(){
        
      });

      function chooseRole(){

        swal({
          title: "Who are you?",
          text: "Select your role now!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Manager",
          cancelButtonText: "Player",
          closeOnConfirm: false,
          closeOnCancel: false
        },function(isConfirm) {
          if (isConfirm) {

            var url = '<?php echo url('/activateaccount'); ?>';
            var role = 'manager';

            $.post(url,{role:role},function(){

              swal("Done!", "Wait for officer's approval for your Manager's role to be activated.", "success");

            });

          } else {

            var url = '<?php echo url('/activateaccount'); ?>';
            var role = 'player';

            $.post(url,{role:role},function(){

              swal("You are a Player", "Look for your team now!", "success");

            });

          }

          $('#okbtn').click(function(){
            location.reload();
          });
        });

      }
    </script>

  </body>
</html>