<?php $indexer = 2; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->make('layouts.core-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
            <h1><i class="fa fa-tag"></i> Activity</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="<?php echo url('/home'); ?>">Home</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="min-height:450px;">
              <?php if($t_count == 0): ?>
                You have no team yet
                <button class="btn btn-md btn-primary pull-right" onclick="createTeamForm()">
                  <i class="fa fa-plus"></i> Create Team
                </button>
                <hr>

              <?php else: ?>

                <h4><?php echo $team->team_name; ?></h4>
                <hr>
                <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <button class="btn btn-success">
                      <i class="fa fa-feed"></i> Create Announcement</button>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <button class="btn btn-warning">
                      <i class="fa fa-compress"></i> Request Match</button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                    <h4>Current Players</h4>
                    
                      <p>No player yet</p>
                      <hr>
                      Add players : <br><br>
                      <select class="form-control" id="demoSelect">
                        <optgroup label="Available Players">
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?> ( <?php echo $user->matricno; ?> )</option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                      </select>
                      <br><br>
                    
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
                
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Advance select plugin -->
    <script src="<?php echo asset('mustang/js/plugins/select2.min.js'); ?>"></script>

    <script>

      $('#demoSelect').select2();

      function createTeamForm(){
        var url = '<?php echo url('/addteam'); ?>';
        window.location.replace(url);
      }

      $('#demoSelect').change(function(){

        var name = $('#demoSelect').find(":selected").val();
        var team_id = '<?php echo $team->team_id; ?>';
        var url = '<?php echo url('/addplayer'); ?>';

        $.post(url,{name:name,team_id:team_id},function(data){

          var obj = JSON.parse(data);

          console.log(obj);

          var name = obj.name;

          var str = '';

          str += '<tr>';
          str += '<td>'+ obj.player_id +'</td>';
          str += '<td>'+ obj.matricno +'</td>';
          str += '<td>'+ obj.name +'</td>';
          str += '<td>'+ obj.email +'</td>';
          str += '<td>'+ obj.status +'</td>';
          str += '</tr>';

          $('#player_table').prepend(str);

          location.reload();

        });
        
      });

    </script>

  </body>
</html>