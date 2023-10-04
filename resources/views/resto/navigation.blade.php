@if(Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ route('logout') }}" class="btn btn-link">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-link">Register</a>
                        @endif
                    @endauth
                </div>
            @endif