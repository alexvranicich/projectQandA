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

        <x-header.show-header />

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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>