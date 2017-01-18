<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chasse au trésor | Ash</title>

    <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Shade|Droid+Sans" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/reset.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="assets/css/style.css" media="screen" type="text/css" />
</head>
<body>


    <div id="wrapper">

        <header>

            <h1>Chasse aux trésors</h1>

        </header>


        <main>

            <section>

                <!-- CARTE GOOGLE MAP -->
                <div id="map"></div>

                <!-- QUESTIONNAIRE -->
                <div id="reponseQuestion">
                    <p class="default">Cliquez sur un marqueur pour afficher la question</p>
                    <form>
                        <h3 class="titre">Titre de l'indice</h3>
                        <h4>Description de l'indice</h4>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                            magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                            quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                            dolor in hendrerit in vulputate velit esse molestie consequat,
                            vel illum dolore eu feugiat nulla facilisis at vero eros et
                            accumsan et iusto odio dignissim qui blandit praesent luptatum
                            zzril delenit augue duis dolore te feugait nulla facilisi.
                        </p>

                        <h4>Question</h4>
                        <p class="question">???</p>

                        <h4>Réponse</h4>
                        <input type="text" name="reponse" required />

                        <input type="hidden" name="action" value="addReponse" />
                        <input type="submit" value="Envoyer"/>
                    </form>
                </div>

            </section>


            <section>
                <!-- FORMULAIRE DE CREATION DE QUESTION -->
                <div id="addQuestion">
                    <p>
                        CREEZ UNE NOUVELLE QUESTION
                    </p>
                    <form>
                        <div>
                            <input type="text" name="titre" placeholder="TITRE">
                        </div>
                        <div>
                            <input type="text" name="adresse" placeholder="ADRESSE DU LIEU">
                        </div>

                        <div>
                            <textarea type="text" name="description" placeholder="DESCRIPTION" cols="40" rows="5"></textarea>
                        </div>
                        <div>
                            <input type="text" name="question" placeholder="QUESTION">
                        </div>
                        <div>
                            <input type="text" name="reponse" placeholder="REPONSE">
                        </div>
                        <div>
                            <input type="hidden" name="action" value="addQuestion" />
                            <input type="submit" value="CREER LA QUESTION"/>
                        </div>

                    </form>
                </div>

                <!-- TOP LISTE DES JOUEURS -->
                <div id="topJoueur">
                    <h4>TOP SCORES JOUEURS</h4>
                    <div class="container-scores">
                        <ol>
                            <li>
                                <span class="pseudo">JOUEUR 1</span>
                                <span class="score">23</span>
                            </li>
                            <li>
                                <span class="pseudo">JOUEUR 2</span>
                                <span class="score">22</span>
                            </li>
                            <li>
                                <span class="pseudo">JOUEUR 3</span>
                                <span class="score">21</span>
                            </li>
                            <li>
                                <span class="pseudo">JOUEUR 4</span>
                                <span class="score">20</span>
                            </li>
                            <li>
                                <span class="pseudo">JOUEUR 5</span>
                                <span class="score">19</span>
                            </li>
                            <li>
                                <span class="pseudo">JOUEUR 6</span>
                                <span class="score">18</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

        </main>

        <footer>
            <p>&copy; Ash - <?php echo date('Y'); ?></p>
        </footer>

    </div>

    <script src="assets/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoNltJRPfQ25IFdqOiECoffErQEUvqGQ0&callback=initMap" async defer></script>
</body>
</html>