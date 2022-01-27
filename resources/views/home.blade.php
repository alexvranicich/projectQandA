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
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
    }

    #btn_log {
        background-image: url('https://images.unsplash.com/photo-1522098605161-cc0c1434c31a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fHBlb3BsZSUyMHRhbGtpbmd8ZW58MHwxfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60') !important;
        background-size: cover;
        color: white;
        padding-top: 4rem;
        font-size: 3rem;
        font-weight: bold;
        transition: transform .2s;
    }

    #btn_reg {
        background-image: url('https://images.unsplash.com/photo-1535295972055-1c762f4483e5?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHBlb3BsZSUyMHdobyUyMHRhbGtzfGVufDB8MXwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60') !important;
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

    table td {
        height: 10rem;
        min-width: 20rem;
        text-align: center;
    }

    .main {
        margin-top: 8rem;
        height: 30rem;
    }
</style>

<body>


    <section class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark p-3">
                <div class="container-md">
                    <a class="navbar-brand">Alex's Q&A</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end h5" id="navbarNav">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/login">Accedi</a>';
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="main mb-5">
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

    <section class="table_question" style="padding-top: 12rem;">
        <div class="container-fluid text-center">
            <h3>Intanto ecco alcune delle domande che potrai trovare</h3>

            <table class="table table-striped text-center align-middle mt-5">
                <thead>
                    <tr>
                        <th scope="col">Argomento</th>
                        <th scope="col">Domanda</th>
                </thead>

                <?php
                if (is_array($question)) {
                    foreach ($question as $row) {

                        echo '<tbody>
                                <tr>
                                    <td scope="row"> ' . $row->title . ' </td>
                                    <td>' . $row->content . '</td>
                                </tr>
                            </tbody>';
                    }
                } else {
                    echo  '<tbody>
                                <tr>
                                    <td scope="row">Nessun Risultato</td>
                                </tr>
                            </tbody>';
                }
                ?>
            </table>

        </div>
    </section>

</body>

</html>