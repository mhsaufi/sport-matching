<?php $indexer = 4; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.core-sheets')

    <title>{{ config('app.name') }} | Teams</title>
    
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
            <h1><i class="fa fa-group"></i> Teams</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="{!! url('/home') !!}">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row card">
          <div class="card-title"><h4>Mustang Teams</h4></div>
          <hr>
          <div class="row" style="padding-left: 20px;padding-right: 20px;">
            @if($t_count == 0)
              <h3>No teams registered yet, sorry
            @else
                <?php $i = 0; ?>
                @foreach($teams as $team)

                <div class="card team_card">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                      <div class="circular--landscape" style="background-image: url('{!! url('/logos/'.$team->team_id.'/'.$team->logo) !!}')"></div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
                      <h4>
                        {!! $team->team_name !!} {!! Auth::user()->role !!}
                      </h4>
                      <hr>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small><em><span style="opacity: 0.5;">Manager</span></em></small><br>
                          <span style="font-weight: bold;">{!! $team->name !!}</span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                          <small><em><span style="opacity: 0.5;">Number of player</span></em></small><br>
                          <span style="font-weight: bold;">{!! $player_count[$i] !!}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
                @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
    
    @include('layouts.core-scripts')

  </body>
</html>