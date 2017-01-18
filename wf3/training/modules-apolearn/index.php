<?php
    if( file_exists( 'modules.json' ) ) {
        $file_module = file_get_contents( 'modules.json' );
        $modules = json_decode($file_module);
    } else {
        $modules = false;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Apolearn Modules</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
        }
        td, th {
            border:1px solid #333;
            text-align: center;
            padding: 5px 0;
        }
        td:nth-child(2) {
            text-align: left;
            text-indent: 20px;
        }
        td:last-child {
            font-size: 20px;
        }
        th {
            background-color: #999;
        }
        tr {
            font: 14px arial, sans-serif;
            background-color:#bbb;
            color: #fff;
        }

        .success {
            background-color:#468847;
        }
        .warn {
            background-color: #ffcc88;
            text-shadow: 1px 1px 0 rgba(0,0,0,.15);
        }

        table a {
            color: #fff;
        }

        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        a:visited {
            /*color:#468847;*/
        }
        a.link-show-all {
            text-align: center;
            display: block;
        }


        fieldset {
            width: 40%;
            margin: 30px auto;
        }

        fieldset div {
            margin: 5px 0;
        }
        label {
            width: 25%;
            text-align: right;
            display: inline-block;
        }

        input[type=text] {
            width: 65%;
            height: 20px;
        }

        input[type=submit] {
            width: 150px;
            margin: auto;
            display: block;
        }

        .msg {
            width: 60%;
            color: #ffffff;
            margin: 20px auto;
            padding: 10px -0px;
            text-align: center;
        }

        .menu {
            width: 200px;
            position: fixed;
            top: 20px;
            left: 20px;
            border:1px solid #000;
        }
        .menu h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<script type="text/javascript">

/*
�	\xE0	&#224;	&agrave;;
�	\xE8	&#232;	&egrave;
�	\xE9	&#233;	&eacute;;
�	\xEA	&#234;	&ecirc;
�	\xF4	&#244;	&ocirc;
*/


//916-
//923-
//930-
//936-
//944-
//1443-
//1449-
//1456-
//1463-
//1470-
//1478-
        var courses = [


    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/779","index":779,"title":"Courte introduction au d&eacute;veloppement web"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/784","index":784,"title":"Les qualit&eacute;s requises : rigueur, capacit&eacute; d'abstraction"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/790","index":790,"title":"Intro &agrave; JavaScript"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/796","index":796,"title":"S&eacute;paration des concepts : JS = int&eacute;ractions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/802","index":802,"title":"Les variables"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/809","index":809,"title":"Les instructions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/816","index":816,"title":"Les types de donn&eacute;es"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/830","index":830,"title":"Op&eacute;rations et concat&eacute;nation"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/823","index":823,"title":"La console"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/837","index":837,"title":"Indentation et commentaires"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/844","index":844,"title":"Les erreurs"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/851","index":851,"title":"Les fonctions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/858","index":858,"title":"Ressources et lectures conseill&eacute;es"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/864","index":864,"title":"La logique et les conditions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/872","index":872,"title":"La comparaison if else"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/879","index":879,"title":"Incr&eacute;mentation et arithm&eacute;tique"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/886","index":886,"title":"Tableaux et objets"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/907","index":907,"title":"Les boucles"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/893","index":893,"title":"La port&eacute;e des variables, et le mot-cl&eacute; var"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/900","index":900,"title":"Structuration de code Javascript"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2754","index":2754,"title":"Syntaxe, balises et attributs"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2761","index":2761,"title":"Indentation et commentaires"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2768","index":2768,"title":"Balises fermantes et auto-fermantes"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2775","index":2775,"title":"Courte introduction au web"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2782","index":2782,"title":"S&eacute;paration des concepts"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2787","index":2787,"title":"Ressources et lectures conseill&eacute;es"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2793","index":2793,"title":"Le W3C"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2799","index":2799,"title":"Pr&eacute;sentation du navigateur : Chrome/Firefox"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2805","index":2805,"title":"Pr&eacute;sentation de l'&eacute;diteur : SublimeText"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2812","index":2812,"title":"Pr&eacute;sentation de la WF3, du rythme et du programme de la formation"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2819","index":2819,"title":"Terminologies, d&eacute;finitions, jargon"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2439","index":2439,"title":"CSS"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2446","index":2446,"title":"S&eacute;paration des concepts"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2452","index":2452,"title":"Syntaxe, s&eacute;lecteurs simples, propri&eacute;t&eacute;s"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2458","index":2458,"title":"Mise en forme typographique avec les CSS"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2464","index":2464,"title":"Ajout d'images en CSS"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2497","index":2497,"title":"Arborescence de fichiers, organisation, raccourcis clavier, bonnes pratiques"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2471","index":2471,"title":"block et inline"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2477","index":2477,"title":"Dimensions et marges"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2484","index":2484,"title":"Positionnement en CSS, premiers pas"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2490","index":2490,"title":"Indentation et commentaires"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2505","index":2505,"title":"Ressources et lectures conseill&eacute;es"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2583","index":2583,"title":"Reset et Normalize"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2590","index":2590,"title":"S&eacute;lecteurs avanc&eacute;s"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2597","index":2597,"title":"Priorit&eacute; et poids des s&eacute;lecteurs"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2604","index":2604,"title":"Positionnement CSS, solutions avanc&eacute;es"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2611","index":2611,"title":"Images : notions suppl&eacute;mentaires"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2619","index":2619,"title":"CSS3"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2625","index":2625,"title":"Adobe Extract"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/2632","index":2632,"title":"nouvelles balises HTML5"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13675","index":13675,"title":"Cr&eacute;er et modifier des fichiers texte en ligne de commande"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13694","index":13694,"title":"Commandes utiles"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13715","index":13715,"title":"Installation de services sous distributions bas&eacute;es sur Debian"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13701","index":13701,"title":"Transfert de fichiers de serveur &agrave; serveur"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13661","index":13661,"title":"D&eacute;cryptage des offres d'h&eacute;bergements VPS et d&eacute;di&eacute;s"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13681","index":13681,"title":"Initiation &agrave; la ligne de commande"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13654","index":13654,"title":"Chemins relatifs et absolus"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13708","index":13708,"title":"Permissions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/13668","index":13668,"title":"Utilisation de \"root\""},

    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/16748","index":"16748","title":"AJAX en jQuery"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/16755","index":"16755","title":"AJAX"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/16762","index":"16762","title":"Accessibilit&eacute; et ergonomie"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/16768","index":"16768","title":"AJAX en jQuery"},

    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13366","index":"13366","title":"Structures de contr&ocirc;le d'inclusion (include() et autres)"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13373","index":"13373","title":"Affichage de balises HTML avec les boucles"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13380","index":"13380","title":"Les fonctions utilisateurs"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13387","index":"13387","title":"La port&eacute;e des variables"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13587","index":"13587","title":"PDO"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13592","index":"13592","title":"CRUD de base en SQL"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13597","index":"13597","title":"Connexion &agrave; la base de donn&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13602","index":"13602","title":"Les erreurs SQL"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13608","index":"13608","title":"Clauses et fonctions SQL de base"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13614","index":"13614","title":"Les classes PDO et PDOStatement"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13621","index":"13621","title":"Ex&eacute;cuter des requ&ecirc;tes CUD"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13629","index":"13629","title":"Ex&eacute;cuter des SELECT : les diff&eacute;rents fetch"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13635","index":"13635","title":"Les injections SQL"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13641","index":"13641","title":"Les attaques XSS"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13647","index":"13647","title":"Les requ&ecirc;tes pr&eacute;par&eacute;es, param&egrave;tres"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13654","index":"13654","title":"Chemins relatifs et absolus"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13661","index":"13661","title":"D&eacute;cryptage des offres d'h&eacute;bergements VPS et d&eacute;di&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13668","index":"13668","title":"Utilisation de \"root\""},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13675","index":"13675","title":"Cr&eacute;er et modifier des fichiers texte en ligne de commande"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13681","index":"13681","title":"Initiation &agrave; la ligne de commande"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13694","index":"13694","title":"Commandes utiles"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13701","index":"13701","title":"Transfert de fichiers de serveur &agrave; serveur"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/13708","index":"13708","title":"Permissions"},

    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22518","index":"22518","title":"Les avantages de la POO"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22523","index":"22523","title":"L'instanciation"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22529","index":"22529","title":"Les classes et les propri&eacute;t&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22535","index":"22535","title":"$this"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22542","index":"22542","title":"Constructeur et destructeur"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22547","index":"22547","title":"Les m&eacute;thodes"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22552","index":"22552","title":"La visibilit&eacute;"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22561","index":"22561","title":"L'h&eacute;ritage et le polymorphisme"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22568","index":"22568","title":"Les espaces de noms"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22574","index":"22574","title":"Autochargement de classes"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22581","index":"22581","title":"Interfaces"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22587","index":"22587","title":"Abstraction de classes"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22594","index":"22594","title":"M&eacute;thodes et propri&eacute;t&eacute;s statiques"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22601","index":"22601","title":"POO : Structure, organisation"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22638","index":"22638","title":"Le Responsive Design"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22644","index":"22644","title":"S'adapter &agrave; l'utilisateur..."},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22650","index":"22650","title":"CSS Media Queries"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/22657","index":"22657","title":"Guidelines responsive"},

    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36784","index":"36784","title":"Les types de contenus personnalis&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36791","index":"36791","title":"Mettre en ligne un site Wordpress"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36795","index":"36795","title":"Les champs personnalis&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36800","index":"36800","title":"La boucle Wordpress"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36805","index":"36805","title":"Les requ&ecirc;tes personnalis&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/36808","index":"36808","title":"Functions.php et les extensions Wordpress"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37965","index":"37965","title":"Les avantages de versionner son code"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37970","index":"37970","title":"Exploration du site github.com"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37976","index":"37976","title":"Syst&egrave;me de fichiers en PHP : CRUD sur des fichiers"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37983","index":"37983","title":"Syst&egrave;me de fichiers en PHP : Fonctions internes utiles"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37990","index":"37990","title":"PHP7 : Nouvelles fonctionnalit&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/37997","index":"37997","title":"PHP7 : Fonctions d&eacute;pr&eacute;ci&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/38003","index":"38003","title":"PHP7 : Performances"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/38010","index":"38010","title":"GitHub Desktop : Installation et configuration"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/38015","index":"38015","title":"GitHub Desktop : Utilisation de base"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/38022","index":"38022","title":"GitHub : Workflow simple en &eacute;quipe"},

    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51723","index":"51723","title":"Structure et organisation d'un site dynamique"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51730","index":"51730","title":"Planification"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51736","index":"51736","title":"Strat&eacute;gie d'utilisation des param&egrave;tres d'URI"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51743","index":"51743","title":"MySQL : les diff&eacute;rents types de relations"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51952","index":"51952","title":"Comment consommer un webservice en AJAX"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51959","index":"51959","title":"Google Maps API"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/51966","index":"51966","title":"Structure de code complexe en JavaScript"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52773","index":"52773","title":"Utilit&eacute; des bases de donn&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52779","index":"52779","title":"Pr&eacute;sentation de SQL, MySQL et phpMyAdmin"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52785","index":"52785","title":"Les tables"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52792","index":"52792","title":"Les types de donn&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52798","index":"52798","title":"Les utilisateurs"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52804","index":"52804","title":"Les diff&eacute;rents SGBD"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52810","index":"52810","title":"Cl&eacute;s primaires"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52815","index":"52815","title":"Importer et exporter des donn&eacute;es"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52821","index":"52821","title":"Les relations"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52855","index":"52855","title":"Composer"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52862","index":"52862","title":"Strat&eacute;gies de syst&egrave;me de pagination"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52870","index":"52870","title":"Strat&eacute;gies de syst&egrave;me de filtre/recherche"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52877","index":"52877","title":"MySQL : fonctions d'agr&eacute;gation"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52885","index":"52885","title":"Frameworks vs CMS vs \"from scratch\""},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52891","index":"52891","title":"W : Pr&eacute;sentation"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52898","index":"52898","title":"W : Prise en main"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52905","index":"52905","title":"W : MVC"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52912","index":"52912","title":"Tour d'horizon des frameworks populaires"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52919","index":"52919","title":"Concepts fondamentaux et points communs"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52927","index":"52927","title":"Les routes"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52934","index":"52934","title":"Les contr&ocirc;leurs"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52941","index":"52941","title":"Les gestionnaires"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52948","index":"52948","title":"Les templates"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52956","index":"52956","title":"Les utilisateurs et la s&eacute;curit&eacute; : Authentification"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52963","index":"52963","title":"Les utilisateurs et la s&eacute;curit&eacute; : Autorisation"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52971","index":"52971","title":"FTP"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52977","index":"52977","title":"D&eacute;cryptage des offres d'h&eacute;bergements mutualis&eacute;s"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52984","index":"52984","title":"Les contr&ocirc;leurs"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52991","index":"52991","title":"Les mod&egrave;les"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/52997","index":"52997","title":"Les vues"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/53004","index":"53004","title":"Contr&ocirc;leur frontal"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/53010","index":"53010","title":"La r&eacute;&eacute;criture d'URL"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/53017","index":"53017","title":"Le routage"},
    {"done":false,"url":"http://wf3.apolearn.com/classroom/130163/player/53047","index":"53047","title":"Compatibilit&eacute;"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/53053","index":"53053","title":"Les transitions"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/53060","index":"53060","title":"Les animations"},
    {"done":true,"url":"http://wf3.apolearn.com/classroom/130163/player/53066","index":"53066","title":"Les transformations"},

];

//document.write(courses);


    /*for(var i in courses){
        console.log(courses[i]);
        var icon = (courses[i].done) ? 'fa-check-square' : 'fa-square';
        var link = '<a href="'+courses[i].url+'"><i class="fa ' + icon + '" aria-hidden="true"></i> ' + courses[i].index + ' : ' + courses[i].title + '</a><br />';
        document.write(link);
    }*/

</script>
<script type="text/javascript">


function runCourses(start){
//    url: "http://wf3.apolearn.com/classroom/130163/player/2505",
    if($.fn.jquery !== '2.2.4') {
        $('body').append('<' + 'script src=' + '"//code.jquery.com/jquery-2.2.4.min.js' + '"></' + 'script>');
    }
    var AshHasFound = 0;
    //var start = 9000;
    var max = 3000;
    var json = [];
    for(var i = start; i <= (max + start); i++) {
        $.ajax({
            url: "http://wf3.apolearn.com/classroom/130163/player/" + i,
            success: function (a, b, c) {
                AshHasFound++;
                var html = $.parseHTML(a);
                var title = $('h1', html).text();
                var url = this.url.split('/');
                var index = url[ url.length-1 ];
                if( title !== 'Oups...' ){
                    console.log(AshHasFound + ' : ' + $('h1', html).text());
                    if($('#chapter_ASH').length === 0){
                        var header = '<div id="chapter_ASH" class="chapter"><div class="chapname" href="#courses_list_ASH"><div class="chapinfo clearfix"><span class="chaplabel custback hidden-phone">Chapitre X</span><strong>Love Kindness Piracy</strong></div></div></div>';
                        $('.coursenav').append(header);
                    }
                    var icon = ($('#course_'+index).length > 0) ? 'fa-check-square' : 'fa-square';
                    var link = '<div id="courses_list_ASH" class="subcourselist"><div id="course_' + index + '" class="coursename clearfix"><div class="wrprow"><a href="' + this.url + '" class="coursestate "><i class="text-success fa fa-2x '+icon+'" rel="tooltip" data-original-title="Module vu"></i></a><a href="' + this.url + '" class="courseinfo ">' + title + '<small class="muted courselenght">&nbsp;</small></a></div></div></div>';
                    json.push({
                        'url':this.url,
                        'index': index,
                        'title': title
                    });
                    $('#chapter_ASH').append(link);
                }
            },
        });
    }
}
</script>

<!--
<div id="chapter_ASH" class="chapter">
    <div class="chapname" href="#courses_list_ASH">
        <div class="chapinfo clearfix">
            <span class="chaplabel custback hidden-phone">Chapitre ASH</span>
            <strong>Love Kindness Piracy</strong>
        </div>
    </div>
    <div id="courses_list_ASH" class="subcourselist">
        <div id="course_'+i+'" class="coursename clearfix">
            <div class="wrprow">
                <a href="http://wf3.apolearn.com/classroom/130163/player/'+i+'" class="coursestate "><i class="text-success fa fa-2x fa-square" rel="tooltip" data-original-title="Module vu"></i></a>
                <a href="http://wf3.apolearn.com/classroom/130163/player/'+i+'" class="courseinfo ">'+title+'<small class="muted courselenght">&nbsp;</small></a>
            </div>
        </div>
    </div>
</div>-->

<?php

# Cherche un index dans la liste des modules
function search_id_modules($what){
    global $modules;
    foreach( $modules as $k => $v ){
        if( $what === $v->index ) {
            return $k;
        }
    }
    return null;
}

# Retourne le nombre de total de modules actifs ou non
function get_count_modules( $hide = false )
{
    global $modules;
    if( $hide !== true ) {
        $i = 0;
        foreach( $modules as $mod )
        {
            if( isset( $mod->hide ) && $mod->hide === true ) continue;

            $i++;
        }
        return $i;
    } else {
        return count( $modules );
    }
}

# Retourne le nombre de total de modules finis
function get_count_modules_finished()
{
    global $modules;
    $i = 0;
    foreach( $modules as $mod )
    {
        if( $mod->done !== true ) continue;

        $i++;
    }
    return $i;
}

# Retourne la note moyenne
function get_avg_scores()
{
    global $modules;
    $i = 0;
    $scores = 0;
    foreach( $modules as $mod )
    {
        if( $mod->done !== true || ( isset( $mod->score ) && $mod->score == 0 ) ) continue;

        $i++;
        if( isset( $mod->score ) ) $scores += $mod->score;
    }
    return round( $scores / $i, 2 );
}

# Dump style
function d( $msg, $exit = false ){
    echo '<pre>';
    var_dump( $msg );
    echo '</pre>';

    if( $exit ) exit;
}

if( $modules )
{
    $add_form_insert = false;

    if( isset( $_GET['add'] ) && ! empty ( $_POST['index'] ) && ! empty ( $_POST['title'] ) && isset ( $_POST['score'] ) )
    {
        $mod_index = search_id_modules( (int) $_POST['index'] );
        $checked_done = ( isset( $_POST['done'] ) ) ? 'checked="checked"' : '';
        if( is_null( $mod_index ) )
        {
            $new_mod = (object) [
                'index' => (int)$_POST['index'],
                'title' => htmlentities(trim($_POST['title'])),
                'done' => isset($_POST['done']),
                'score' => (int)$_POST['score'],
                'hide' => false
            ];

            array_push( $modules, $new_mod);

            file_put_contents( 'modules.json', json_encode( $modules ) );

            echo '<div class="msg success">Le module <strong>"' . $new_mod->title . '"</strong> (id:' . $new_mod->index . ') a bien été ajouté !</div>';

            $add_form_insert = true;

        } else {
            echo '<div class="msg warn">L\'ID <strong>' . $index . '</strong> est déjà existant !</div>';
        }
    }
    else if( isset( $_GET['edit'] ) && ! empty ( $_POST['index'] ) && ! empty ( $_POST['title'] ) && isset ( $_POST['score'] ) )
    {
        $index = search_id_modules( (int) $_POST['index'] );

        if( ! is_null( $index ) )
        {
            $old_mod = $modules[ $index ];
            $new_mod = (object) [
                'index' => $old_mod->index,
                'title' => htmlentities(trim($_POST['title'])),
                'done'  => isset( $_POST['done'] ),
                'score' => (int) $_POST['score'],
                'hide' => $old_mod->hide
            ];

            $modules[$index] = $new_mod;

            file_put_contents( 'modules.json', json_encode( $modules ) );

            echo '<div class="msg success">Le module <strong>"' . $modules[$index]->title . '"</strong> (id:' . $old_mod->index . ') a bien été modifié !</div>';
        }
    }
    else if( ! empty( $_GET['del'] ) && is_numeric( $_GET['del'] ) )
    {
        $index = search_id_modules( (int) $_GET['del'] );
        if( ! is_null( $index ) )
        {
            $modules[$index]->hide = true;

            file_put_contents( 'modules.json', json_encode( $modules ) );

            echo '<div class="msg warn">Le module <strong>"' . $modules[$index]->title . '"</strong> (id:' . $index . ') a bien été supprimé !</div>';
        }
    }
    else if( ! empty( $_GET['view'] ) && is_numeric( $_GET['view'] ) )
    {
        $index = search_id_modules( (int) $_GET['view'] );
        if( ! is_null( $index ) )
        {
            $modules[$index]->hide = false;

            file_put_contents( 'modules.json', json_encode( $modules ) );

            echo '<div class="msg success">Le module <strong>"' . $modules[$index]->title . '"</strong> (id:' . $index . ') a bien été réintégré !</div>';
        }
    }

    if( ( isset( $_GET['add'] ) && ! $add_form_insert ) || ( ! empty( $_GET['edit'] ) && is_numeric( $_GET['edit'] ) ) )
    {
        if( isset( $_GET['add'] ) )
        {
            $checked_done = '';
            $readonly = '';
            $link_action = 'add';
            $legend = $btn = 'Ajouter';

            if( ! empty( $_POST ) )
            {
                extract($_POST);
                $checked_done = ( isset( $_POST['done'] ) ) ? 'checked="checked"' : '';
            }
        } else {
            $mod_index = search_id_modules( (int) $_GET['edit'] );
            $index = $modules[$mod_index]->index;
            $title = $modules[$mod_index]->title;
            $checked_done = ($modules[$mod_index]->done === true) ? 'checked="checked"' : '';
            $score = $modules[$mod_index]->score;
            $readonly = 'readonly="readonly"';
            $link_action = 'edit';
            $legend = $btn = 'Editer';
        }

        echo <<<FORM_EDIT
<fieldset>
    <legend>{$legend} un module</legend>
    <form action="index.php?{$link_action}" method="post">
        <div>
            <label for="index">ID :</label>
            <input type="text" name="index" id="index" value="{$index}" {$readonly} />
        </div>
        <div>
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="{$title}" />
        </div>
        <div>
            <label for="done">Fini :</label>
            <input type="checkbox" name="done" id="done" value="true" {$checked_done} />
        </div>
        <div>
            <label for="score">Note (%) :</label>
            <input type="text" name="score" id="score" value="{$score}" />
        </div>

        <input type="submit" value="{$btn}" />
    </form>
</fieldset>
FORM_EDIT;

    }



    echo '<div class="menu">';
    echo '<h1><a href="index.php">Modules Apolearn</a></h1>';
    echo '<ul>';
    if( isset( $_GET['show-all'] ) ){
        echo '<li><a href="?">Voir seulement les modules actifs</a></li>';
    } else {
        echo '<li><a href="?show-all">Voir tous les modules</a></li>';
    }
    echo '<li><a href="?add">Ajouter un module</a></li>';
//    echo '<li><a href=""></a></li>';
    echo '</ul>';
    echo 'Stats :';
    echo '<ul>';
    echo '<li>Total modules : ' . get_count_modules() . '</li>';
    echo '<li>Total modules finis : ' . get_count_modules_finished() . '</li>';
    echo '<li>Note moyenne : ' . get_avg_scores() . '%</li>';
    echo '</ul>';
    echo '</div>';

    echo '<table>';
    echo '<tr><th>ID</th><th>Titre</th><th>Fini</th><th>Score</th><th>Actions</th></tr>';

    foreach( $modules as $module )
    {
        if( isset( $module->hide ) && $module->hide === true  && ! isset( $_GET['show-all'] ) ) { continue; }

        $icon = ( $module->done ) ? 'fa-check-square' : 'fa-square';
        $class = ( $module->done ) ? 'success' : '';
        $lnk_is_done = ( $module->done ) ? 'true' : 'false';
        $class .= ( isset( $module->hide ) && $module->hide === true ) ? ' warn' : '';
        $user_id = 130163;

        # URL : http://wf3.apolearn.com/classroom/130163/player/{MODULE_ID}

        echo '<tr id="index-' . $module->index . '" class="' . $class . '">';
        echo '<td>' . $module->index . '</td>';
        echo '<td><a class="apolink" data-done="' . $lnk_is_done . '" data-index="' . $module->index . '" href="http://wf3.apolearn.com/classroom/' . $user_id . '/player/' . $module->index . '" target="_blank">' . $module->title . '</a></td>';
        echo '<td><i class="fa ' . $icon . '" aria-hidden="true"></i></td>';
        echo '<td>' . ( ( isset( $module->score ) && $module->score > 0 ) ? $module->score . '%' : '' ) . '</td>';
        echo '<td>';
        echo '   <a href="?edit=' . $module->index . '" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></a>';
        if( isset( $module->hide ) && $module->hide ){
            echo '   <a href="?show-all&view=' . $module->index . '" title="Réintégrer"><i class="fa fa-eye" aria-hidden="true"></i></a>';
        } else {
            echo '   <a href="?del=' . $module->index . '" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></a>';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
<script type="text/javascript">
    window.onload = function()
    {
        var lnks = document.getElementsByClassName('apolink');
        for(i = 0; i < lnks.length; i++) {
            lnks[i].addEventListener('click', function (e) {
                if( this.dataset.done === 'false' ) {
                    window.location.href = 'index.php?edit=' + this.dataset.index;
                }
            });
        }
    };
</script>
</body>
</html>