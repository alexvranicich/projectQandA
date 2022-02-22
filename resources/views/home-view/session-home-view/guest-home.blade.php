<style>

    #btn_log {
        background-image: url('https://images.unsplash.com/photo-1522098605161-cc0c1434c31a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fHBlb3BsZSUyMHRhbGtpbmd8ZW58MHwxfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60') !important;
    }

    #btn_reg{
        background-image: url('https://images.unsplash.com/photo-1535295972055-1c762f4483e5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHBlb3BsZSUyMHdobyUyMHRhbGtzfGVufDB8MXwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60') !important;
    }

    #btn_reg, #btn_log {
        background-size: cover;
        color: white;
        padding-top: 4rem;
        font-size: 3rem;
        font-weight: bold;
        transition: transform .2s;
    }

    #btn_reg:hover,
    #btn_log:hover {
        transform: scale(1.2);
    }

    .main {
        height: 30rem;
    }
</style>

<div>

    <section class="main mt-5 mb-5">
        <div class="container-fluid h-100">

            <div class="text-center">
                <h1>Benvenuto nel Q&A del momento</h1>
                <h3>Ti sei già unito a noi?</h3>
            </div>

            <div class="container-md mt-5 h-100 text-center">
                <div class="row justify-content-around h-100">
                    <div class="col-md-4">
                        <a href="/login" role="button" id="btn_log" class="btn h-100 w-100 alingn-text-middle border border-2 border-light">ACCEDI</a>
                    </div>
                    <div class="col-md-4">
                        <a href="/register" role="button" id="btn_reg" class="btn btn-lg h-100 w-100 border border-2 border-light">REGISTRATI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container mt-5 pt-5">

        <div class="text-center mt-5 pt-5 mb-5">

            <h3>Intanto ecco alcune domande interessanti</h3>
            <h5>Accedi per poter rispondere</h5>

        </div>

        <div class="mt-5 mp-5 id" id="fetchData">
            @include('components.tables.question-table', ['questions' => $questions])
        </div>

    </section>

</div>



