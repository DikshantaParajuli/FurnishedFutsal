<head>
<style>
    a{
    } 
</style>

</head>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
 
 <a class="navbar-brand ml-3 text-white" href="/">Nepal Futsal</a>
    
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse px-4" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white px-4" href="#">Book <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white px-4" href="#">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white px-4" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled text-white px-4" href="#">Disabled</a>
      </li>
         <li class="nav-item">
        <a class="nav-link disabled text-white px-4" href="#">{{ __('Register') }}</a>
      </li>
<!--
      @guest
                            <li class="nav-item">
                                <a class="nav-link text-white px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white px-4" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                               
                            </li>
                        @endguest
-->
    </ul>
  </div>


</nav>
    </div>