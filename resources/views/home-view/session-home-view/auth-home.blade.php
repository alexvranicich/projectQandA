<style>
   .search {
        height: 32rem;
        background-image: url("https://images.unsplash.com/photo-1617600433693-eef3435282a9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1631&q=80");
        background-size: cover;
        color: white;
    }
    .alert{
        width: 40%;
    }
</style>

<div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(Route::is('home.show'))
    <section class="search my-5 mx-2">

        <div class="container-fluid text-center" style="padding-top: 7rem;">
            <h2>Cerca le domande che preferisci</h2>
        </div>


        <div class="container-md">
            <form action="{{ route('home.show') }}" method="GET" role="search">
                <div class="input-group" style="padding-top: 5rem; height:3rem;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary p-3" style="width: 5rem;" type="submit"><span class="material-icons md-light">search</span></button>
                    </div>
                    <input type="text" id="search" name="search" class="filter_search form-control p-3" placeholder="Cerca">
                </div>
            </form>
        </div>

    </section>

    @elseif(app('request')->input('search'))

        <div class="container-lg">
            <div class="d-flex justify-content-start p-5">
                <h3>Risultati trovati per: <i>{{ app('request')->input('search') }} </i></h3>
            </div>
        </div>

    @endif

    <div class="pt-5">
        <div class="container-md" id="fetchData">
            @include('components.tables.question-table', ['questions' => $questions] , ['answers' => $answers])
        </div>
    </div>

</div>

