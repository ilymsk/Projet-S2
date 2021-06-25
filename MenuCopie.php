<!DOCTYPE html>
<html lang=fr dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Gess the correlation</title>
    <link rel="stylesheet" type="text/css" href="test.css"/>
    <SPAN style="position: absolute; top: 40 px; left: 30 px; bottom: 700px; right: 100px; width: 100px; height: 100px">
    <img src="Logo2.png"height="150px" width="150px" class = 'logo'/></span>
  </head>
  <body>

<h1 >Bienvenue dans Guess the Correlation !</h1><br>

    <ol>
      <li onclick="openForm()">Nouvelle partie</li>
      <li>Tableau des scores</li>
      <li>Règles du jeu</li>
      <li>Réglages</li>
    </ol>



    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        <form class="form-container" name="poster" method="post" action="MenuCopie.php">
          <h2>Entrez votre pseudo...</h2><br>
          <label for="pseudo"></label>
          <input type="text" id="pseudo" placeholder="Votre pseudo" name="pseudo" value="" required> <br>
          <h2>Et choisissez<br>un niveau de difficulté !</h2><br>
          <div>
    <input type="radio" id="Choice1"
     name="level" value="E" checked>
    <label for="Choice1">Facile     </label>

    <input type="radio" id="Choice2"
     name="level" value="H">
    <label for="Choice2">Difficile</label>
  </div><br>
          <button type="submit" class="btn" name = 'Envoyer' value="Envoyer" onclick="Play()" >Valider</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
      </div>
    </div>
    <script>

      function openForm() {
        document.getElementById("popupForm").style.display="block";
      }

      function closeForm() {
        document.getElementById("popupForm").style.display="none";
      }

      function Play() {

        var url = "http://localhost/ProjetS2/GraphiqueCopie.php";
        window.open(url);

      }
      console.log(level)

      var lvl = document.getElementById("level").value;
    </script>


    <?php
      $serveur = 'localhost';
      $utilisateur = 'root';
      $motdepasse = '';
      $nom_base = 'Users';


      $mysqli = new mysqli($serveur, $utilisateur, $motdepasse, $nom_base);

      if ($mysqli->connect_error) {
          die("Erreur de connexion : ".$mysqli->connect_error);
      }

      ;

      if (isset ($_POST['Envoyer'])) {
        $pseudo = $_POST['pseudo'];

        $insert = "INSERT INTO Utilisateurs (Pseudo) VALUES ('".$pseudo."')";


        $mysqli->query($insert) or die ('Erreur SQL ! <br>'.$insert.'<br>'.$mysqli->error);


        $select = "SELECT Pseudo FROM Utilisateurs";
        $result = $mysqli->query($select) or die('Erreur SQL ! <br>'.$select.'<br>'.$mysqli->error);


        $mysqli->close();
        }
      ?>

  </body>
</html>
