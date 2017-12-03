<?php $indexer = 2; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.core-sheets')

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
            <h1><i class="fa fa-tag"></i> Activity</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="{!! url('/home') !!}">Home</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="min-height:450px;">
              @if($t_count == 0)
                You have no team yet
                <button class="btn btn-md btn-primary pull-right" onclick="createTeamForm()">
                  <i class="fa fa-plus"></i> Create Team
                </button>
                <hr>

              @else

                <h4>{!! $team->team_name !!}</h4>
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
                          @foreach($users as $user)
                            <option value="{!! $user->id !!}">{!! $user->name !!} ( {!! $user->matricno !!} )</option>
                          @endforeach
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
                          @if($p_count != 0)
                            @foreach($players as $player)
                            <tr>
                              <td>{!! $player->player_id !!}</td>
                              <td>{!! $player->matricno !!}</td>
                              <td>{!! $player->name !!}</td>
                              <td>{!! $player->email !!}</td>
                              <td>{!! $player->status !!}</td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      <br><br><br>
                  </div>
                </div>
                
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    
    @include('layouts.core-scripts')

    <!-- Advance select plugin -->
    <script src="{!! asset('mustang/js/plugins/select2.min.js') !!}"></script>

    <script>

      $('#demoSelect').select2();

      function createTeamForm(){
        var url = '{!! url('/addteam') !!}';
        window.location.replace(url);
      }

      $('#demoSelect').change(function(){

        var name = $('#demoSelect').find(":selected").val();
        var team_id = '{!! $team->team_id !!}';
        var url = '{!! url('/addplayer') !!}';

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