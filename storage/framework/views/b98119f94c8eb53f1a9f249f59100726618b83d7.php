<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php echo $__env->make('layouts.core-sheets', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <title><?php echo e(config('app.name')); ?></title>

  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="register-content">
      <div class="logo">
        <h1><a href="<?php echo e(url('/')); ?>">Mustang Sports</a></h1>
      </div>
      <div class="register-box">
        <form class="register-form" action="<?php echo e(route('register')); ?>" method="POST" >
          <?php echo e(csrf_field()); ?>

          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                    Fullname

                    <?php if($errors->has('name')): ?>
                        <span class="error-message">
                            <?php echo e($errors->first('name')); ?>

                        </span>
                    <?php endif; ?>

                </label>
                <input class="form-control" name="name" type="text" placeholder="Fullname" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Email
                  <?php if($errors->has('email')): ?>
                      <span class="error-message">
                          <?php echo e($errors->first('email')); ?>

                      </span>
                  <?php endif; ?>

                </label>
                <input class="form-control" type="text" name="email" placeholder="Email" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Matric No

                    <?php if($errors->has('matricno')): ?>
                        <span class="error-message">
                            <?php echo e($errors->first('matricno')); ?>

                        </span>
                    <?php endif; ?>
                </label>
                <input class="form-control" type="text" name="matricno" placeholder="Matric no" autofocus>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <label class="control-label">Password
                    <?php if($errors->has('password')): ?>
                        <span class="error-message">
                            <?php echo e($errors->first('password')); ?>

                        </span>
                    <?php endif; ?>
                </label>
                <input class="form-control" name="password" type="password" placeholder="Password" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <br>
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
          </div>
        </form>
        
      </div>
    </section>
    <?php echo $__env->make('layouts.external-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>
  <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>