<div>
    <form action="{{ route('home.show') }}" method="GET" role="search">

        <div class="input-group">

            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary p-3 pl-5" type="submit"><span class="material-icons md-light">search</span></button>
            </div>

            <input type="text" id="search" name="search" class="filter_search form-control p-3" placeholder="Cerca">
        </div>

    </form>
</div>
