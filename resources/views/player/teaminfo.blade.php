<?php $indexer = 2; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.core-sheets')

    <title>{{ config('app.name') }}</title>
    
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
            @if($have_team == true)
              <h1><i class="fa fa-info"></i> {!! $team_info->team_name !!} Info</h1>
            @else
              <h1><i class="fa fa-info"></i> Team Info</h1>
            @endif
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="{!! url('/home') !!}">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row card">
          
          <div class="row">
            <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
              <div class="circular--landscape" style="background-image: url('{!! url('/logos/'.$team_info->team_id.'/'.$team_info->logo) !!}')">
                
              </div>
            </div>
            <div class="col-lg-9 col-md-7 col-sm-12 col-xs-12">
              <table class="table table-responsive table-striped">
                <tr>
                  <td>Team</td><td>Created On</td><td>Team Status</td>
                </tr>
                <tr class="team-info">
                  <td>{!! $team_info->team_name !!}</td>
                  <td>{!! $team_info->created_at !!}</td>
                  <td>
                    @if($team_info->tstatus_id == 1)
                      <button class="btn btn-primary" disabled>{!! $team_info->tstatus_title !!}</button>
                    @endif
                    @if($team_info->tstatus_id == 2)
                      <button class="btn btn-info" disabled>{!! $team_info->tstatus_title !!}</button>
                    @endif
                    @if($team_info->tstatus_id == 3)
                      <button class="btn btn-success" disabled>{!! $team_info->tstatus_title !!}</button>
                    @endif
                    @if($team_info->tstatus_id == 4)
                      <button class="btn btn-danger" disabled>{!! $team_info->tstatus_title !!}</button>
                    @endif
                  </td>
                </tr>
                <tr>
                  <td>Manager</td><td></td><td></td>
                </tr>
                <tr class="team-info">
                  <td colspan="3">{!! $team_info->name !!} ( {!! $team_info->matricno !!} )</td>
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

        </div>
      </div>
    </div>
    
    @include('layouts.core-scripts')

    <script>
      $(document).ready(function(){
        
      });

    </script>

  </body>
</html>