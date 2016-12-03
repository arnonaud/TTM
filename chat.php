<?php
    session_start();
    include 'include/inc.header.php';
    include 'service.php';
    include 'include/inc.connexion.php';
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Accueil
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
    <script type="text/javascript">
    function getXMLHttpRequest() 
    {
        var xhr = null; // On déclare une variable xhr à null
     
        // Teste si le navigateur prend en charge les XMLHttpRequest
        if (window.XMLHttpRequest || window.ActiveXObject)
        {
            if (window.ActiveXObject) // Si Internet Explorer alors on utilise les ActiveX
            {
                try // On teste IE7 ou supérieur
                {
                    xhr = new ActiveXObject("Msxml2.XMLHTTP");
                } 
                catch(e) // Si une erreur est levée, alors c'est IE 6 ou inférieur
                {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
            } 
            else // Navigateurs récents (Firefox, Opéra, Chrome, Safari, ...)
            {
                xhr = new XMLHttpRequest(); 
            }
        }
        else // Assez explicite...
        {
            alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
            return null;
        }
     
        return xhr; // On retourne l'objet xhr
    }
     
    // On appelle notre fonction ainsi:
    var xhr = getXMLHttpRequest();
     // Cette fonction s'exécutera périodiquement pour récupérer les messages
    function refreshChat() 
    {
        var xhr = getXMLHttpRequest(); // On récupère notre objet
        xhr.onreadystatechange = function() {
            // Si xhr reçoit des données (xhr.readyState == 4) et que son status est OK
            // alors on récupère les données (xhr.responseText) qu'on injecte entre les balises div du minichat
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                // Remplissage des données textuelles récupérées
                document.getElementById('minichat').innerHTML = xhr.responseText;
            }
        };
     
        xhr.open("GET", "mini_chat.php", true); // On ouvre une connexion en méthode GET vers minichat.php 
        xhr.send(null); // On envoie
    }
     
     
    // Cette fonction permet l'envoi des données vers minichat.php
    function submitChat()
    {
        var xhr = getXMLHttpRequest();
        // on récupère la valeur de nos champs input via leurs id et on les encode (encodeURIComponent)
        var pseudo = encodeURIComponent(document.getElementsByClassName('pseudo').value);
        var message = encodeURIComponent(document.getElementById('message').value);
        document.getElementById('message').value = ""; // On efface le message dans la textarea
     
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                // Remplissage des données textuelles récupérées
                document.getElementById('minichat').innerHTML = xhr.responseText;
            }
        };
     
        xhr.open("POST", "mini_chat.php", true); // On ouvre une connexion en méthode POST vers minichat.php
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // permet l'encodage des POST
        xhr.send("pseudo="+pseudo+"&message="+message); // On définit nos variables et leurs valeurs
        // par exemple pseudo=Aure77&message=Coucou
    }
     
    var timer=setInterval("refreshChat()", 5000); // Rafraichit le minichat toute les 5s
     
    </script>
    </head>
    <body onload="refreshChat();">
        <h1>Mini-Chat</h1>
        <!-- Affichage du minichat ici -->
        <div id="minichat"></div>
            <?php
                if(isset($_SESSION['pseudo'])){
                    echo '<p class="pseudo"> Pseudo : '.$_SESSION['pseudo'].'<br />
                         Message : <br/><textarea name="message" rows="5" cols="30" id="message"></textarea><br />';
                }
                else {
                  echo  'Pseudo : <br/><input type="text" name="pseudo" id="pseudo" class="pseudo" /><br />
                         Message : <br/><textarea name="message" rows="5" cols="30" id="message"></textarea><br />';
                }
            ?>
            
        <input type="button" value="Envoyer" onclick="submitChat();"/>
        </p>
         </div>
            <!-- /.row -->
            <hr>
        </div>
        <!-- /.container -->
    </body>

</html>
