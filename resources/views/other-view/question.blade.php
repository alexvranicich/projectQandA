<html lang="it">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alex's Q&A</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,500;1,700&display=swap" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .main {
        margin-top: 8rem;
        height: 30rem;
    }

    .image {
        object-fit: fill;
    }
</style>


<body>

        <x-header.show-header />
    
        <section class="main container-fluid">

            <div class="row">

                <div class="col-md-8">
                    <div class="container-md">
                        <div class="mail p-3 w-100">
                            <h4>Hey <i>{{ Auth::user()->name ?? '' }}</i> che domanda vuoi farci?</h4>
                        </div>

                        <hr>
                        @error('exists')<div class="text-danger">* Compila tutti i dati *</div>@enderror
                        <x-forms.question-form />

                    </div>
                </div>
            
                <div class=" col-md-4 image">
                     <img src="https://images.unsplash.com/photo-1536995769641-12e9f98fd223?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dGhpbmtpbmclMjBtYW58ZW58MHwxfDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="">
                </div>

            </div>
        </section>


</body>

</html>