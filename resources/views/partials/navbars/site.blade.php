<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('site') }}">
        <img src="{{ asset('img/logo/takada.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('login') }}">
                <img src="{{ asset('img/logo/takada.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <span class="nav-link-inner--text">{{ __('Dashboard') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('site') }}" class="nav-link">
              <span class="nav-link-inner--text">{{ __('Site') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <span class="nav-link-inner--text">{{ __('Login') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
              <span class="nav-link-inner--text">{{ __('Register') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <span class="nav-link-inner--text">{{ __('Lock') }}</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
      </div>
    </div>
</nav>
