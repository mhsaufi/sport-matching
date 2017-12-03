<?php $indexer = 2; ?>
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
            <?php if($have_team == true): ?>
              <h1><i class="fa fa-info"></i> <?php echo $team_info->team_name; ?> Info</h1>
            <?php else: ?>
              <h1><i class="fa fa-info"></i> Team Info</h1>
            <?php endif; ?>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo url('/home'); ?>">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row card">
          
          <div class="row">
            <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
              <div class="circular--landscape" style="background-image: url('<?php echo url('/logos/'.$team_info->team_id.'/'.$team_info->logo); ?>')">
                
              </div>
            </div>
            <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12">
              <table class="table table-responsive table-striped">
                <tr>
                  <td>Team</td><td>Created On</td><td>Team Status</td>
                </tr>
                <tr class="team-info">
                  <td><?php echo $team_info->team_name; ?></td>
                  <td><?php echo $team_info->created_at; ?></td>
                  <td>
                    <?php if($team_info->tstatus_id == 1): ?>
                      <button class="btn btn-primary" disabled><?php echo $team_info->tstatus_title; ?></button>
                    <?php endif; ?>
                    <?php if($team_info->tstatus_id == 2): ?>
                      <button class="btn btn-info" disabled><?php echo $team_info->tstatus_title; ?></button>
                    <?php endif; ?>
                    <?php if($team_info->tstatus_id == 3): ?>
                      <button class="btn btn-success" disabled><?php echo $team_info->tstatus_title; ?></button>
                    <?php endif; ?>
                    <?php if($team_info->tstatus_id == 4): ?>
                      <button class="btn btn-danger" disabled><?php echo $team_info->tstatus_title; ?></button>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>Manager</td><td></td><td></td>
                </tr>
                <tr class="team-info">
                  <td colspan="3"><?php echo $team_info->name; ?> ( <?php echo $team_info->matricno; ?> )</td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <br><br>
              <h4>Current Players</h4>
                <hr>
                <br>
              
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Matric No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="player_table">
                    <?php if($p_count != 0): ?>
                      <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo $player->player_id; ?></td>
                        <td><?php echo $player->matricno; ?></td>
                        <td><?php echo $player->name; ?></td>
                        <td><?php echo $player->email; ?></td>
                        <td><?php echo $player->status; ?></td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </tbody>
                </table>
                <br><br><br>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script>
      $(document).ready(function(){
        
      });

    </script>

  </body>
</html>