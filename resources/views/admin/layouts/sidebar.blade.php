<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{url('/dashboard')}}">
                <div class="logo-img">
                  
                </div>
                <span class="text">管理画面</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">　　　</div>
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>ダッシュボード</span></a>
                    </div>
                  <!--   <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div> -->

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>部署</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('department.create')}}" class="menu-item">作成</a>
                            <a href="{{route('department.index')}}" class="menu-item">View</a>
                           
                        </div>
                    </div>
                    @endif

                      @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>施工管理</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('doctor.create')}}" class="menu-item">作成</a>
                            <a href="{{route('doctor.index')}}" class="menu-item">View</a>
                           
                        </div>
                    </div>
                    @endif
                      @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                       <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>アポイントメント</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">作成</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">Check</a>
                           
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                       <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>お客様</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patients.today')}}" class="menu-item">お客様(本日)</a>
                            <a href="{{route('prescribed.patients')}}" class="menu-item">すべて(チェック)</a>
                           
                        </div>
                    </div>
                    @endif

                   


                      @if(auth()->check()&& auth()->user()->role->name === 'admin')
                     <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>予約時間</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient')}}" class="menu-item">今日の予約</a>
                            <a href="{{route('all.appointments')}}" class="menu-item">すべての予約</a>
                           
                        </div>
                    </div>
                    
                    @endif

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>ログアウト</span></a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
               
                    
                </nav>
            </div>
        </div>
    </div>