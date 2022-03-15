<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Doctor Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('gull-theme/dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{asset('gull-theme/dist-assets/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
    

    @livewireStyles
    @powerGridStyles

</head>
<style>
    .editbtn{
        background-color:#00C897 ;

    }
    .delbtn{
        background-color: #E83A14;
    }
    .vitalsbtn{
        background-color: #FFB72B;
        padding: 0.375rem 0.75rem;
        border-radius: 40px !important;
    }
    .savebtn{
        background-color: #CC9544;
        color: white;
        border-radius: 15px;
    }
    .savebtn2{
        background-color: #CC9544;
        color: white;
    }
    #v{
        color: #151D3B;
    }
</style>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <b class="text-danger ml-3 font-weight-bolder" style="font-size:large;">Homeopathic</b>
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="{{asset('gull-theme/dist-assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> Doctor Name
                            </div>
                            
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li  class="nav-item"><a class="nav-item-hold" href="{{route('home')}}"><i  class="nav-icon i-Business-Mens"></i><span class="nav-text">All Patients</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" ><a class="nav-item-hold" href="{{route('patient.create')}}"><i class="nav-icon i-Add-User"></i><span class="nav-text">Add Patient</span></a>
                        <div class="triangle"></div>
                    </li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                
                @yield('content')
                <!-- end of main-content -->
            </div>
            <!-- Footer Start -->
            <div class="flex-grow-1"></div>
                <div class="app-footer">
                        <strong class="text-center">
                        "True health care reform cannot happen in Washington. <br>
                        It has to happen in our kitchens, in our homes, in our communities. All health care is personal."
                        </strong>
                </div>
            </div>
            <!-- fotter end -->
        </div>
    
    <script src="{{asset('gull-theme/dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('gull-theme/dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('gull-theme/dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('gull-theme/dist-assets/js/scripts/script.min.js')}}"></script>
    <script src="{{asset('gull-theme/dist-assets/js/scripts/sidebar.large.script.min.js')}}"></script>
    
    @livewireScripts
    @powerGridScripts
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
  $(document).ready(function () {
    $(".nav-item").hover(
      function () {
        $(this).addClass("active");
      },
      function () {
        $(this).removeClass("active");
      }
    );
    $('.vitalsbtn').on('click', function(e){
        var id=jQuery(this).attr("id");
        $('#addvitals').modal('show');
        console.log(id);
    });
    $('.closebtn').on('click',function(){
        $('#addvitals').modal('hide');
    });
  });
</script>

</body>

</html>