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
    <section class="login-content">
      <div class="logo">
        <h1><a href="<?php echo e(url('/')); ?>">Mustang Sports</a></h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="<?php echo e(route('login')); ?>" method="POST">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label class="control-label">Matric No

                <?php if($errors->has('matricno')): ?>
                    <span class="error-message">
                        <?php echo e($errors->first('matricno')); ?>

                    </span>
                <?php endif; ?>
            </label>
            <input class="form-control" name="matricno" type="text" placeholder="matric no" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Password
              <?php if($errors->has('password')): ?>
                  <span class="error-message">
                      <?php echo e($errors->first('password')); ?>

                  </span>
              <?php endif; ?>

            </label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <div class="form-group btn-container">
            <br>
            <p class="semibold-text mb-0">
              Didn't have account yet? 
              <a href="<?php echo e(route('register')); ?>">Register here.</a></p>
          </div>
        </form>


        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>

        
      </div>
    </section>
    <?php echo $__env->make('layouts.external-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>
  <?php echo $__env->make('layouts.core-scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</html>