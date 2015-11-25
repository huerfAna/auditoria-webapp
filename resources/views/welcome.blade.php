@extends('templates.base')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/md-date-time.css') }}">
@endsection

@section('content')
<h1>Auditoría <a class="target-help"><i class="icon icon-speechbubble34"></i></a></h1>       

@if(Session::get('error'))
    <p class="notification">
        <span class="target-close"><i class="icon icon-cancel29"></i></span>
        {{ Session::get('error')}}
    </p>
@endif    

<section>
    <div ng-app="testMod" ng-controller="testCtrl">
        
        <div class="row">
        {!! Form::open(array('url' => 'auditar')) !!}                    
            <div class="medium-6 columns">
                <input type="hidden" name="fechaini" value="@{{datevalue | date:'yyyy-MM-dd'}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <time-date-picker ng-model="datevalue" display-mode="date"></time-date-picker>
                    </div>
                </div>
            </div>

            <div class="medium-6 columns">
                <input type="hidden" name="fechafin" value="@{{date | date:'yyyy-MM-dd'}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <time-date-picker ng-model="date" display-mode="date"></time-date-picker>
                    </div>
                </div>
            </div>

            <div class="medium-12 columns">
                <div class="input-group checkbox">
                    <input type="checkbox" name="entrada" id="secenet">
                    <label for="secenet">Cuento con SECENet</label>
                </div>
            </div>

            <div class="medium-12 columns">
                <button class="btn btn-primary">Iniciar Auditoría</button>
            </div>
        {!! Form::close() !!}                
        </div>


      <script type="text/ng-template" id="time-date.tpl">
        <div ng-class="modeClass()" class="time-date">
          <div ng-click="modeSwitch()" class="display">
            <div class="title">@{{display.title()}}</div>
            <div class="content">
              <div class="super-title">@{{display.super()}}</div>
              <div ng-bind-html="display.main()" class="main-title"></div>
              <div class="sub-title">@{{display.sub()}}</div>
            </div>
          </div>
          <div class="control">
            <div class="slider"> 
              <div class="date-control">
                <div class="title"><span class="month-part">@{{date | date:'MMMM'}}
                    <select ng-model="calendar._month" ng-change="calendar.monthChange()" ng-options="calendar._months.indexOf(month) as month for month in calendar._months"></select></span>
                  <input ng-model="calendar._year" ng-change="calendar.monthChange()" type="number" class="year-part"/>
                </div>
                <div class="headers">
                  <div class="day-cell">S</div>
                  <div class="day-cell">M</div>
                  <div class="day-cell">T</div>
                  <div class="day-cell">W</div>
                  <div class="day-cell">T</div>
                  <div class="day-cell">F</div>
                  <div class="day-cell">S</div>
                </div>
                <div class="days">
                  <div ng-style="{'margin-left': calendar.offsetMargin()}" ng-class="calendar.class(1)" ng-show="calendar.isVisible(1)" ng-click="calendar.select(1)" class="day-cell">1</div>
                  <div ng-class="calendar.class(2)" ng-show="calendar.isVisible(2)" ng-click="calendar.select(2)" class="day-cell">2</div>
                  <div ng-class="calendar.class(3)" ng-show="calendar.isVisible(3)" ng-click="calendar.select(3)" class="day-cell">3</div>
                  <div ng-class="calendar.class(4)" ng-show="calendar.isVisible(4)" ng-click="calendar.select(4)" class="day-cell">4</div>
                  <div ng-class="calendar.class(5)" ng-show="calendar.isVisible(5)" ng-click="calendar.select(5)" class="day-cell">5</div>
                  <div ng-class="calendar.class(6)" ng-show="calendar.isVisible(6)" ng-click="calendar.select(6)" class="day-cell">6</div>
                  <div ng-class="calendar.class(7)" ng-show="calendar.isVisible(7)" ng-click="calendar.select(7)" class="day-cell">7</div>
                  <div ng-class="calendar.class(8)" ng-show="calendar.isVisible(8)" ng-click="calendar.select(8)" class="day-cell">8</div>
                  <div ng-class="calendar.class(9)" ng-show="calendar.isVisible(9)" ng-click="calendar.select(9)" class="day-cell">9</div>
                  <div ng-class="calendar.class(10)" ng-show="calendar.isVisible(10)" ng-click="calendar.select(10)" class="day-cell">10</div>
                  <div ng-class="calendar.class(11)" ng-show="calendar.isVisible(11)" ng-click="calendar.select(11)" class="day-cell">11</div>
                  <div ng-class="calendar.class(12)" ng-show="calendar.isVisible(12)" ng-click="calendar.select(12)" class="day-cell">12</div>
                  <div ng-class="calendar.class(13)" ng-show="calendar.isVisible(13)" ng-click="calendar.select(13)" class="day-cell">13</div>
                  <div ng-class="calendar.class(14)" ng-show="calendar.isVisible(14)" ng-click="calendar.select(14)" class="day-cell">14</div>
                  <div ng-class="calendar.class(15)" ng-show="calendar.isVisible(15)" ng-click="calendar.select(15)" class="day-cell">15</div>
                  <div ng-class="calendar.class(16)" ng-show="calendar.isVisible(16)" ng-click="calendar.select(16)" class="day-cell">16</div>
                  <div ng-class="calendar.class(17)" ng-show="calendar.isVisible(17)" ng-click="calendar.select(17)" class="day-cell">17</div>
                  <div ng-class="calendar.class(18)" ng-show="calendar.isVisible(18)" ng-click="calendar.select(18)" class="day-cell">18</div>
                  <div ng-class="calendar.class(19)" ng-show="calendar.isVisible(19)" ng-click="calendar.select(19)" class="day-cell">19</div>
                  <div ng-class="calendar.class(20)" ng-show="calendar.isVisible(20)" ng-click="calendar.select(20)" class="day-cell">20</div>
                  <div ng-class="calendar.class(21)" ng-show="calendar.isVisible(21)" ng-click="calendar.select(21)" class="day-cell">21</div>
                  <div ng-class="calendar.class(22)" ng-show="calendar.isVisible(22)" ng-click="calendar.select(22)" class="day-cell">22</div>
                  <div ng-class="calendar.class(23)" ng-show="calendar.isVisible(23)" ng-click="calendar.select(23)" class="day-cell">23</div>
                  <div ng-class="calendar.class(24)" ng-show="calendar.isVisible(24)" ng-click="calendar.select(24)" class="day-cell">24</div>
                  <div ng-class="calendar.class(25)" ng-show="calendar.isVisible(25)" ng-click="calendar.select(25)" class="day-cell">25</div>
                  <div ng-class="calendar.class(26)" ng-show="calendar.isVisible(26)" ng-click="calendar.select(26)" class="day-cell">26</div>
                  <div ng-class="calendar.class(27)" ng-show="calendar.isVisible(27)" ng-click="calendar.select(27)" class="day-cell">27</div>
                  <div ng-class="calendar.class(28)" ng-show="calendar.isVisible(28)" ng-click="calendar.select(28)" class="day-cell">28</div>
                  <div ng-class="calendar.class(29)" ng-show="calendar.isVisible(29)" ng-click="calendar.select(29)" class="day-cell">29</div>
                  <div ng-class="calendar.class(30)" ng-show="calendar.isVisible(30)" ng-click="calendar.select(30)" class="day-cell">30</div>
                  <div ng-class="calendar.class(31)" ng-show="calendar.isVisible(31)" ng-click="calendar.select(31)" class="day-cell">31</div>
                </div>
              </div>
              <div ng-click="modeSwitch()" class="button switch-control"><i class="fa fa-clock-o"></i><i class="fa fa-calendar"></i></div>
              <div class="time-control">
                <div class="clock">
                  <div class="clock-face">
                    <div class="center"></div>
                    <div ng-click="clock.setHour(1)" ng-class="{'selected': clock._hour() == 1}" class="hand">1</div>
                    <div ng-click="clock.setHour(2)" ng-class="{'selected': clock._hour() == 2}" class="hand">2</div>
                    <div ng-click="clock.setHour(3)" ng-class="{'selected': clock._hour() == 3}" class="hand">3</div>
                    <div ng-click="clock.setHour(4)" ng-class="{'selected': clock._hour() == 4}" class="hand">4</div>
                    <div ng-click="clock.setHour(5)" ng-class="{'selected': clock._hour() == 5}" class="hand">5</div>
                    <div ng-click="clock.setHour(6)" ng-class="{'selected': clock._hour() == 6}" class="hand">6</div>
                    <div ng-click="clock.setHour(7)" ng-class="{'selected': clock._hour() == 7}" class="hand">7</div>
                    <div ng-click="clock.setHour(8)" ng-class="{'selected': clock._hour() == 8}" class="hand">8</div>
                    <div ng-click="clock.setHour(9)" ng-class="{'selected': clock._hour() == 9}" class="hand">9</div>
                    <div ng-click="clock.setHour(10)" ng-class="{'selected': clock._hour() == 10}" class="hand">10</div>
                    <div ng-click="clock.setHour(11)" ng-class="{'selected': clock._hour() == 11}" class="hand">11</div>
                    <div ng-click="clock.setHour(12)" ng-class="{'selected': clock._hour() == 12}" class="hand">12</div>
                  </div>
                </div>
                <div class="buttons">
                  <button ng-click="clock.setAM(true)" ng-class="{'active': clock.isAM()}" type="button" class="btn btn-link pull-left">AM</button>
                  <input value="30" type="number" min="0" max="59" ng-model="clock._minutes"/>
                  <button ng-click="clock.setAM(false)" ng-class="{'active': !clock.isAM()}" type="button" class="btn btn-link pull-right">PM</button>
                </div>
              </div>
            </div>
          </div>
          <div class="buttons">
            <!--<button ng-click="setNow()" type="button" class="btn btn-link">Now</button>
            <button ng-click="cancel()" type="button" class="btn btn-link">Cancel</button>
            <button ng-click="save()" type="button" class="btn btn-link">OK</button>-->
          </div>
        </div>
      </script>

    </div>   
</section>
@endsection

@section('help')
<div class="header-help">
    <strong>Proceso de Auditoría</strong>
    <i class="icon icon-cancel29 help-close"></i>
</div>
<div class="body-help">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eveniet placeat quod, qui consequuntur. Temporibus quia esse impedit inventore soluta voluptatibus necessitatibus natus, tempora vero ea eveniet eum molestiae consequatur.
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.1/angular.min.js"></script>
<script src="{{ asset('js/js-date-time.js') }}"></script>
@endsection            