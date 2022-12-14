<div class="ui menu inverted grey fixed">
    <div class="right menu">
        <div class="item">
            <div class="ui action left icon input">
                <i class="search icon"></i>
                <input type="text" placeholder="Search">
                <button class="ui button">Rechercher</button>
            </div>
        </div>
    </div>
</div>
<div class="ui grid" style="margin-top: 20px;">
    <div class="sixteen wide mobile three wide computer column" style="padding-left: 40px">
        <div class="ui vertical pointing inverted grey menu">
            <a class="item {{ (Route::is('/scaffold-dashboard') ? 'green active' : '') }}"
               href="/scaffold-dashboard">Tableau de bord</a>

           <a class="item {{ (Route::is('/scaffold') ? 'green active' : '') }}"
           href="{{url('/scaffold')}}">Scaffold Interface</a>



            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
               class="item">Deconnexion</a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <div class="sixteen wide mobile twelve wide computer column ui doubling stackable card" style="margin-left: 20px;margin-bottom: 50px">
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
