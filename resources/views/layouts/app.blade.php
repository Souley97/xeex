<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
    <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin/admin.css">
    <title>XEEWEUL-EXPRESS</title>
    {{-- <link rel="stylesheet" rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">

<link rel="icon" href="/images/bg/xe/logo.png">    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js']);


    @livewireStyles

</head>

<body>

    <div class="containera">

        <!-- Sidebar Section -->
        <aside class=" " >
            <div class="toggle fixed z-40">
                <div class="logo">

                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar mt-16">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('profile.show') }}">
                            <span class="material-icons-sharp">
                                dashboard
                            </span>
                            <div class="text-menu">Profil</div>
                        </a>
                        <a href="{{ route('surveys.index') }}">
                            <span class="material-icons-sharp">
                                receipt_long
                            </span>
                            <div class="text-menu">Quiz</div>
                        </a>
                        @if (Auth::user()->is_admin==1)
                            <a href="{{ Route('users.index')}}">
                            <span class="material-icons-sharp">
                                person_outline
                            </span>
                            <div class="text-menu">Users</div>
                        </a>




                                <a href="{{ Route('dashboard')}}" class="active">
                                <span class="material-icons-sharp">
                                    insights
                                </span>
                                <div class="text-menu">Dashboard</div>
                            </a>
                            <a href="{{ Route('questions.index')}}">
                                <span class="material-icons-sharp">
                                    mail_outline
                                </span>
                                <div class="text-menu">Questionns</div>
                                <span class="message-count">{{$question->count()}}</span>
                            </a>
                            <a href="{{ Route('withdrawals.index')}}">
                                <span class="material-icons-sharp">
                                    inventory
                                </span>
                                <div class="text-menu">Liste Demandes</div>
                                <span class="message-count">{{$demande->count()}}</span>
                            </a>
                            <a href="/teams/create">
                                <span class="material-icons-sharp">
                                    report_gmailerrorred
                                </span>
                                <div class="text-menu">Parraeinage</div>
                            </a>
                            <a href="{{route('videos.index')}}">
                                <span class="material-icons-sharp">
                                    report_gmailerrorred
                                </span>
                                <div class="text-menu">Video</div>
                            </a>

                            <a href="{{route('roles.index')}}">
                                <span class="material-icons-sharp">
                                    settings
                                </span>
                                <div class="text-menu">Settings</div>
                            </a>

                            @elseif (Auth::user()->is_admin==0)
                            <a href="{{ route('users.show', Auth::user()->id)}}">
                                <span class="material-icons-sharp">
                                    person_outline
                                </span>
                                <div class="text-menu">Users</div>
                            </a>
                            <a href="{{ route('surveys.index') }}">
                                <span class="material-icons-sharp">
                                    receipt_long
                                </span>
                                <div class="text-menu">Quiz</div>
                            </a>
                            <a href="{{route('videos.liste')}}">
                                <span class="material-icons-sharp">
                                    report_gmailerrorred
                                </span>
                                <div class="text-menu">Video</div>
                            </a>



                        @endif
                        @endauth
                        @endif




                <a href="#">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <button wire:click="logoutUser">
                            <h3>Logout</h3>
                        </button>
                    </form>
                </a>
                {{-- <a href="{route('logout')}">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
                @auth

                <form action="{{ route('logout') }}" method="post">
                        @method('delete')
                    @csrf
                    <a href="#">

                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <button>Logout </button>

                </a>

                </form>
                @endauth --}}
            </div>
        </aside>

<nav class="bg-white dark:bg-white fixed w-full z-20 top-0 left-0 border-b-4 border-gray-200 border-spacing-x-24 shadow-md mb-11 dark:border-gray-100">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center">

        <img src="/images/bg/xe/logo.png" class="h-9 mr-3" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
    </a>
    <div class="flex md:order-2">
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>

    </div>
  </nav>

        <main class=" mt-24">
            @if (   route('surveys.index') )


            <h1>Analytics</h1>
            <div class="analyse">
                @if (Auth::user()->is_admin==1)


                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Les utilsateurs</h3>
                                <h1>{{Auth::user()->count()}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+81%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="sales">
                        <div class="status">
                            <div class="info">
                                <h3>Total solde</h3>
                                <h1>25000</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+81%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                            @endif
                    <div class="visits">
                        <div class="status">
                            <div class="info">
                                <h3>Nombre parrainer</h3>
                                <h1>{{ Auth::user()->points}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>-48%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="searches">
                        <div class="status">
                            <div class="info">
                                <h3>points</h3>
                                <h1>{{Auth::user()->points}}</h1>
                            </div>
                            <div class="progresss">
                                <svg>
                                    <circle cx="38" cy="38" r="36"></circle>
                                </svg>
                                <div class="percentage">
                                    <p>+21%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            {{ $slot }}

        </main>
        <!-- Right Section -->
        <div class="right-section fixed z-40 right-10 ">

            <div class="nav z-50">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode ">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile z-50 ">
                    <div class="profile-photo h-28">
                        <a href="{{ route('profile.show') }} "class='z-50 '> <img src="{{ Auth::user()->profile_photo_url }}"></a>
                    </div>
                    <div class="info">
                        <p>{{ Auth::user()->name }}</p>
                        <a href="{{ route('profile.show') }}" class="text-muted">Profil</a>
                    </div>

                </div>


            </div>
            <!-- End of Nav -->

            {{-- <div class="user-profile">
                <div class="logo"> --}}
                    {{-- <img src="/images/bg/xe/jul.jpeg"> --}}
                    {{-- <h2>AsmrProg</h2>
            <p>Fullstack Web Developer</p> --}}
                    {{-- <div>
                <div>
                    <button wire:click="generateReferralCode">Générer un code de parrainage</button>
                    @if ($generatedCode)
                        <p>Votre code de parrainage : {{ $generatedCode }}</p>
                    @endif
                </div>


            </div>
         --}}
                    {{-- <div>
                <p>Votre code de parrainage : {{ generateReferralCode() }}</p>
            </div> --}}
{{--
                </div>
            </div> --}}

            <div class="reminders">
                <div class="header">
                    <h2>Renumera</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            money
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>{{ Auth::user()->payment }}</h3>
                            <small class="text_muted">
                                {{ Auth::user()->phone }}
                            </small>
                        </div>
                        <a href="{{ Route('payment.edit')}}"><span class="material-icons-sharp">
                            more_vert
                        </span></a>
                    </div>
                </div>
                <a href="{{ Route('withdrawals.indexUser')}}"><div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Transaction</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>
            </a>

                </div>



                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


        <!-- Page Content -->


        @stack('modals')
    </div>


    </div>
    </div>

    <script src="/js/index.js"></script>
    @livewireScripts
</body>

</html>
