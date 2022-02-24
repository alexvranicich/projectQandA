
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark p-3">
        <div class="container-fluid ">
            <a class="navbar-brand">Alex's Q&A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse container-md" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @if(!Route::is('home.show'))<a class="nav-link " href="/home">Home</a>@endif
                    @auth @if(!Route::is('question.show'))<a class="nav-link " href="/question">Fammi una domanda</a> @endif @endauth
                </div>
            </div>
            <div class="navbar-nav ml-5">
                @if(!Route::is('login.show'))
                @guest
                    <a class="nav-link" href="/login">Accedi</a>
                @endguest
                @endif
                @auth
                    <a class="nav-link disabled ml-5">{{ Auth::user()->name ?? '' }}</a>
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
                @endauth
            </div>
        </div>
    </nav>

    <!--  Logout Modal  -->

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler effettuare il logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <a href="/logout" type="button" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>


