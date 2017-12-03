<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="text-center image">
        <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
      </div>
      <br>
      <div class="text-center info">
        <p><?php echo e(Auth::user()->name); ?></p>
        <?php if(Auth::user()->role == 1): ?>
          <p class="designation">Administrator</p>
        <?php else: ?>
          <p class="designation"><?php echo e(Auth::user()->matricno); ?></p>
        <?php endif; ?>


      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="active"><a href="<?php echo url('/home'); ?>">
        <i class="fa fa-feed"></i>
        <span> Boards </span></a>
      </li>
      <li><a href="<?php echo url('/home'); ?>">
        <i class="fa fa-feed"></i>
        <span> Teams </span></a>
      </li>
      <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Fixtures</span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="form-components.html"><i class="fa fa-exchange"></i> Matches</a></li>
          <li><a href="form-custom.html"><i class="fa fa-star"></i> Ranking</a></li>
          <li><a href="form-samples.html"><i class="fa fa-history"></i> History</a></li>
        </ul>
      </li>
      <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span> Facilities </span><i class="fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="form-components.html"><i class="fa fa-exchange"></i> Venues</a></li>
          <li><a href="form-custom.html"><i class="fa fa-star"></i> Referees</a></li>
          <li><a href="form-samples.html"><i class="fa fa-history"></i> Announcements</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>