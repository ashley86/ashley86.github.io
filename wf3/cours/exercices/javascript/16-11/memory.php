<?php
//
//if( ! count($_GET) || ! isset($_GET['a']) )
//{
//    exit('ERROR_PARAMS');
//} 
//
//$link = mysqli_connect("localhost", "id207584_wf3memory", "wf3memory", "id207584_memory");
//
///* Vérification de la connexion */
//if (mysqli_connect_errno()) {
//    printf("Échec de la connexion : %s\n", mysqli_connect_error());
//    exit();
//}
//
//
//if( ! isset( $_GET['p'] ) || ! isset( $_GET['s'] ) )
//    exit('ERROR_PARAMS_SCORE');
//
//// Définition de l'action
//$action = htmlentities($_GET['a']);
//
//// On se réfère à l'action demandée
//switch( $action )
//{
//    // Ajouter un score
//    case 'set':
//        if( ! isset( $_GET['p'] ) || ! isset( $_GET['s'] ) )
//            exit('ERROR_PARAMS_SCORE');
//
//        $newPseudo = htmlentities($_GET['p']);
//        $newScore = (int) $_GET['s'];
//        d(setScore($newPseudo, $newScore), true);
////        $scores = getBestScores($scoreContent);
//
//        
//
//        
//        break;
//
//    // Récupérer les scores
//    case 'get':
//        $scores = getBestScores($scoreContent);
//        break;
//
//    default:
//        exit('ERROR_PARAMS');
//        break;
//}
//
//function setScore($newPseudo, $newScore)
//{
//    $link = mysqli_connect("localhost", "id207584_wf3memory", "wf3memory", "id207584_memory");
//
//    /* Vérification de la connexion */
//    if (mysqli_connect_errno()) {
//        printf("Échec de la connexion : %s\n", mysqli_connect_error());
//        exit();
//    }
//    
//    $query = "INSERT INTO scores (datetime, pseudo, score) VALUES(NOW(), $newPseudo, $newScore)";
//    return $link->query($query) or die( mysqli );
//}
//
//function getScores()
//{
//    $query = "SELECT * FROM scores ORDER BY score DESC LIMIT 3";
//
//    if ($result = mysqli_query($link, $query)) 
//    {
//        /* Récupère un tableau associatif */
//        while ($row = mysqli_fetch_assoc($result)) 
//        {
//            printf ("%s (%s)\n", $row["pseudo"], $row["score"]);
//        }
//
//        /* Libération des résultats */
//        mysqli_free_result($result);
//    }
//}
//
//
//
///* Fermeture de la connexion */
//mysqli_close($link);



Class Memory
{
    public $score;
    public $pseudo;
    public $pdo;
    
    function __construct()
    {
        echo 'pouet';
        try
        {
            // DEV
            $this->pdo = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
            // PROD
//            $this->pdo = new PDO('mysql:host=localhost;dbname=id207584_memory', 'id207584_wf3memory', 'wf3memory');
        }
        catch(Exception $e)
        {
            echo 'Echec de la connexion à la base de données';
            exit();
        }
    }
    
    function getScores( $limit = 3 )
    {
//        $stmt = $this->pdo->query('SELECT id, auteur, contenu, DATE_FORMAT(date, "%W %d %M %Y à %Hh%i") as date FROM messages');
        $stmt = $this->pdo->prepare("SELECT pseudo, score, DATE_FORMAT(datetime, '%W %d %M %Y à %Hh%i'), score_id FROM scores LIMIT " . $limit);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        
        
        
        
//        $pdo=new PDO("mysql:dbname=database;host=127.0.0.1","user","password");
//$statement=$pdo->prepare("SELECT * FROM table");

        d($json);
    }
    
    function getAllScores()
    {
        
    }
    
    function setScores()
    {
        
    }
    
}

$memory = new Memory();
d($memory->getScores());












exit;

    

    // Chemin du fichier
    $filename = "scores.txt";

    // On ouvre le fichier
    $scoreFile = fopen($filename, "a+") or die("Unable to open file!");

    // On récupère le contenu
    $scoreContent = fread($scoreFile, filesize($filename));

    // On se réfère à l'action demandée
    switch( $_GET['a'] )
    {
        // Ajouter un score
        case 'set':
            if( ! isset( $_GET['p'] ) || ! isset( $_GET['s'] ) )
                exit('ERROR_PARAMS_SCORE');
            
            $newPseudo = $_GET['p'];
            $newScore = (int) $_GET['s'];
            $scores = getBestScores($scoreContent);
            
            foreach($scores as $score => $pseudo)
            {
                if( $newScore > $score )
                {
                    unset($scores[$score]);
                }
            }
            
            // Préparation de la ligne à écrire
            $newLine = $_GET['p'] . ':' . $_GET['s'] . "\n";
            // On écrit dans le fichier
            fwrite($scoreFile, $newLine);
            break;
        
        // Récupérer les scores
        case 'get':
            $scores = getBestScores($scoreContent);
            break;

        default:
            exit('ERROR_PARAMS');
            break;
    }

    // On ferme le fichier
    fclose($scoreFile);



echo 'toto';


    // Récupération du contenu
//    function getFileContent($file)
//    {
//        $lines = explode("\n", $file);
//        foreach($lines as $line)
//        {
//            if($line === '')
//                continue;
//            
//            $score = split(':', $line);
//            
//            d($line);
//            d($score);
//        }
//    }

    function getBestScores( $file )
    {
        $lines_tmp = explode("\n", $file);
        $scores = [];
        
        foreach($lines_tmp as $line)
        {
            if($line === '')
                continue;
            
            $score_tmp = split(':', $line);
            $scores[$score_tmp[1]] = $score_tmp[0];
        }
        ksort($scores, SORT_NUMERIC);
        return;
    }



    // Custom print
    function d($a, $exit = false)
    {
        echo '<pre>';
        var_dump($a);
        echo '</pre>';
        if($exit) exit;
    }