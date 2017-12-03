<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="text-center image">
        <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
      </div>
      <br>
      <div class="text-center info">
        <p><?php echo e(Auth::user()->name); ?></p>
        <p class="designation"><?php echo e(Auth::user()->matricno); ?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">

      <li <?php if($indexer == 1){ echo 'class="active"';} ?>><a href="<?php echo url('/home'); ?>">
        <i class="fa fa-feed"></i>
        <span> Boards </span></a>
      </li>
      <?php if(Auth::user()->status == 1): ?>
      <li class="treeview <?php if($indexer == 2){ echo 'active';} ?>"><a href="#"><i class="fa fa-group"></i><span>My Team</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo url('/teaminfo'); ?>"><i class="fa fa-circle-o"></i> Info</a></li>
          <li><a href="http://fontawesome.io/icons/" target="_blank"><i class="fa fa-circle-o"></i> Schedule</a></li>
          <li><a href="ui-cards.html"><i class="fa fa-circle-o"></i> History</a></li>
        </ul>
      </li>

      <li <?php if($indexer == 3){ echo 'class="active"';} ?>><a href="charts.html"><i class="fa fa-user"></i><span>Profile</span></a>
      </li>

      <li class="treeview <?php if($indexer == 4){ echo 'active';} ?>"><a href="#"><i class="fa fa-th-list"></i><span>Fixtures</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="form-components.html"><i class="fa fa-exchange"></i> Matches</a></li>
          <li><a href="form-custom.html"><i class="fa fa-star"></i> Ranking</a></li>
          <li><a href="<?php echo url('/teams'); ?>"><i class="fa fa-group"></i> Teams</a></li>
          <li><a href="form-samples.html"><i class="fa fa-history"></i> History</a></li>
        </ul>
      </li>
      <?php endif; ?>
    </ul>

  </section>
</aside>