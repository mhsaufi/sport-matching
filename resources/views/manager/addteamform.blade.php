<?php $indexer = 2; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.core-sheets')

    <!-- Dropzone Css -->
    <link href="{!! asset('mustang/dropzone/dropzone.css') !!}" rel="stylesheet">

    <title>{{ config('app.name') }} | Activity</title>
    
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">

      @include('layouts.header-top')

      @if(Auth::user()->role == 3)
        @include('layouts.side-view-player')
      @endif

      @if(Auth::user()->role == 2)
        @include('layouts.side-view-manager')
      @endif

      @if(Auth::user()->role == 1)
        @include('layouts.side-view-admin')
      @endif


      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-plus"></i> Add Team</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-tag fa-lg"></i></li>
              <li><a href="{!! url('/activity') !!}">Activiy</a></li>
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
              <form action="{!! url('/uploadlogo') !!}" id="frmFileUpload" method="post" class="dropzone" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                      <div class="dz-message">
                          <div class="drag-icon-cph">
                              <i class="fa fa-photo fa-3x"></i>
                          </div>
                          <h3>Drop files here or click to upload team logo.</h3>
                      </div>
                      <div class="fallback">
                          <input name="file" type="file"/>
                          <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
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
    
    @include('layouts.core-scripts')

    <!-- Dropzone Plugin Js -->
    <script src="mustang/dropzone/dropzone.js"></script>
    <script src="mustang/js/plugins/bootstrap-notify.min.js"></script>

    <script>
      function saveteam(){


        var id = $('#team_id').val();
        var teamname = $('#teamname').val();
        var url = '{!! url('/saveteam') !!}';

        $.post(url,{id:id,teamname:teamname},function(){

          $.notify({
            title: "Team created : ",
            message: "Team is succesfully created!",
            icon: 'fa fa-check' 
          },{
            type: "info"
          });

          var redirect = '{!! url('/activity') !!}';

          window.location.replace(redirect);

        });
      }


        

    </script>

  </body>
</html>