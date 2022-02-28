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

<section>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(!app('request')->input('search'))

        <section class="search my-5 mx-2">

            <div class="h-100 d-grid gap-3">
                <div class="d-flex align-items-center justify-content-center">
                    <h2>Cerca le domande che preferisci</h2>
                </div>

                <div class="container-md">
                    @include('components.helpers.search')
                </div>
            </div>

        </section>

    @else

        <div class="container-lg">
            <div class="p-4">
                <h4>Risultati trovati per:</h4>
                <h3><i>{{ app('request')->input('search') }} </i></h3>
            </div>
        </div>

        <div class="container-fluid d-flex justify-content-center">
            <hr style="width:85%; opacity:1;">
        </div>

    @endif

        <div class="container-md mt-4" id="fetchData">
            <div class="row">
                <div class="col-md-8">
                    @include('components.tables.question-table-2', ['questions' => $questions] , ['answers' => $answers])
                </div>
                @if(!app('request')->input('search'))
                    <div class="col-md-3 offset-1">
                        @include('components.helpers.filter')
                    </div>
                @endif
            </div>
        </div>

</section>



