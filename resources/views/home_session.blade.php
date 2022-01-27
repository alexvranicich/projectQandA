<!DOCTYPE html>
<html lang="it">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alex's Q&A</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<style>
    html,
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .main {
        height: 32rem;
        background-image: url("https://images.unsplash.com/photo-1617600433693-eef3435282a9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1631&q=80");
        background-size: cover;
        color: white;
        margin-top: 13rem;
    }

    table td {
        height: 10rem;
        min-width: 20rem;
        text-align: center;
    }
</style>

<body>

    <div class=container-fluid>

        <section class="header">
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark p-4">
                <div class="container-fluid mr-5">
                    <a class="navbar-brand">Alex's Q&A</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse container-md" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link " href="/question">Fammi una domanda</a>
                        </div>
                    </div>
                    <div class="navbar-nav ml-5">
                        <a class="nav-link disabled ml-5">@isset($log_email) {{ $log_email }} @endisset</a>;
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#Modal">Logout</button>
                    </div>
                </div>
            </nav>

            <!--  Logout Modal  -->

            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Logout</h5>
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

        </section>



        <section class="main">
            <div class="container-fluid text-center" style="padding-top: 7rem;">
                <h2>Cerca le domande che preferisci </h2>
            </div>
            <div class="container-md">
                <div class="input-group" style="padding-top: 5rem; height:3rem;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary p-3" style="width: 5rem;" type="button"><span class="material-icons md-light">search</span></button>
                    </div>
                    <input type="text" class="filter_search form-control p-3" placeholder="Cerca">
                </div>
                </form>
            </div>
        </section>

        <div id="error"></div>

        <section class="table-form mt-5 pt-5">
            <div class="container-fluid text-center mt-5">
                <h3>Intanto ecco alcune domande interessanti</h3>
                <h5>Cliccaci per vedere le risposte</h5>

                <table class="table table-hover text-center align-middle" style="margin-top: 7rem;">
                    <thead>
                        <tr>
                            <th scope="col">Chiesta da</th>
                            <th scope="col">Argomento</th>
                            <th scope="col">Domanda</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <?php
                    if (is_array($question)) {
                        foreach ($question as $row) {
                            $id = $row->id;
                            $email = $row->email;
                            $title = $row->title;
                            $content = $row->content;
                            echo '<tbody id="MyTable">
                                    <tr class="clickable-row" style="cursor:pointer;" data-href="/answers?id=' . $id . '">
                                        <td scope="row" id="email" value=' . $email . ' >' . $email . '</td>
                                        <td> ' . $title . ' </td>
                                        <td>' . $content . '</td>
                                        <td> 
                                            <form method = "post" action="/answerForm">
                                                <input type="submit" name="question-id" class="btn btn-outline-success p-4" value = "Rispondi" /> 
                                                <input type="hidden" name="question-id" value = ' . $id . ' />
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>';
                        }
                    }
                    ?>
                </table>
            </div>
        </section>

    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href); // evita la conferma del reinvio del modulo
        }

        ////    Rende l'intera riga cliccabile  /////  

        var log_id = <?php echo $log_id ?>;

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                if ($(".clickable-row #email").val() == log_id) {
                    $('#errors').empty().text('Non puoi rispondere ad una tua domanda');
                } else
                    window.location = $(this).data("href");
            });
        });

        ////   Filtare la tabella delle domande (non funziona) /////

        /*       jQuery(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
     });
*/
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>