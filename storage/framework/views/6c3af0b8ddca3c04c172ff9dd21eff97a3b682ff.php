<?php $indexer = 2; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('layouts.core-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Dropzone Css -->
    <link href="<?php echo asset('mustang/dropzone/dropzone.css'); ?>" rel="stylesheet">

    <title><?php echo e(config('app.name')); ?> | Activity</title>
    
  </head>
  <body class="sidebar-mini fixed">
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
            <h1><i class="fa fa-plus"></i> Add Team</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-tag fa-lg"></i></li>
              <li><a href="<?php echo url('/activity'); ?>">Activiy</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="min-height:450px;">
              <label for="teamname">Team Name</label>
              <input type="hidden" name="team_id" value="" id="team_id"/>
              <input type="text" name="teamname" id="teamname" placeholder="name" class="form-control" required>
              <br><br>
              <label for="frmFileUpload">Team Logo (if available)</label>
              <form action="<?php echo url('/uploadlogo'); ?>" id="frmFileUpload" method="post" class="dropzone" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="row">
                      <div class="dz-message">
                          <div class="drag-icon-cph">
                              <i class="fa fa-photo fa-3x"></i>
                          </div>
                          <h3>Drop files here or click to upload team logo.</h3>
                      </div>
                      <div class="fallback">
                          <input name="file" type="file"/>
                          <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>"/>
                      </div>
                  </div>
              </form>
              <br><br>
              <button class="btn btn-primary btn-block" onclick="saveteam()"><i class="fa fa-plus"></i> Create</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Dropzone Plugin Js -->
    <script src="mustang/dropzone/dropzone.js"></script>
    <script src="mustang/js/plugins/bootstrap-notify.min.js"></script>

    <script>
      function saveteam(){


        var id = $('#team_id').val();
        var teamname = $('#teamname').val();
        var url = '<?php echo url('/saveteam'); ?>';

        $.post(url,{id:id,teamname:teamname},function(){

          $.notify({
            title: "Team created : ",
            message: "Team is succesfully created!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });

          var redirect = '<?php echo url('/activity'); ?>';

          window.location.replace(redirect);

        });
      }


        

    </script>

  </body>
</html>