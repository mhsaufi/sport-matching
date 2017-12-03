<?php $indexer = 4; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('layouts.core-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <title><?php echo e(config('app.name')); ?> | Teams</title>
    
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
            <h1><i class="fa fa-group"></i> Teams</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo url('/home'); ?>">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row card">
          <div class="card-title"><h4>Mustang Teams</h4></div>
          <hr>
          <div class="row" style="padding-left: 20px;padding-right: 20px;">
            <?php if($t_count == 0): ?>
              <h3>No teams registered yet, sorry
            <?php else: ?>
                <?php $i = 0; ?>
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="card team_card">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                      <div class="circular--landscape" style="background-image: url('<?php echo url('/logos/'.$team->team_id.'/'.$team->logo); ?>')"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
                      <h4><?php echo $team->team_name; ?></h4>
                      <hr>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small><em><span style="opacity: 0.5;">Manager</span></em></small><br>
                          <span style="font-weight: bold;"><?php echo $team->name; ?></span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small><em><span style="opacity: 0.5;">Number of player</span></em></small><br>
                          <span style="font-weight: bold;"><?php echo $player_count[$i]; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    
    <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </body>
</html>