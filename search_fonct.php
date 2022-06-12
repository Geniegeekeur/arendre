<?php 
    session_start();
    require_once './config.php'; 

    if (!empty($_POST['search']))
    {

        $search = htmlspecialchars($_POST['search']);
        
        $query = 'SELECT * FROM texte ORDER BY id DESC';
        $data_text = $bdd->query($query);

    } else{ header('Location: ./index.php?reg_err=no_search'); die();}

    $bdd->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Tweetir</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="./blog.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>

<main class="container">

<main class="col-auto ms-sm-auto px-md-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tweetir</h1>

        <form method="post" action="./search_fonct.php">

            <div class="form-floating">
                <input type="text" name="search" class="form-control" id="floatingInput" placeholder="Votre recherche" size="50">
            </div>

            <div class="row flex-md-row d-flex">
                <button class="btn btn-sm btn-outline-secondary" type="submit">Rechercher</button>
            </div>
        </form>

        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="./text.php">
            <button type="button" class="btn btn-sm btn-outline-secondary" >Nouveau</button>
    </a>
          </div>
        </div>
      </div>

      <div class="row mb-2">
        <h2 class="blog-post-title">Vos recherches</h2>
          <?php 
          foreach($data_text as $row) {
            if ($row[1] == $search){
              $url = strval($row[0]);
              echo '<div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">'.$row[1].'</h3>
                    <div class="row g-2 pb-2">
                    <a href="./delete_text.php?id='.$url.'" class="stretched-link col-2">Supprimer</a>
                    </div>
                    <p class="card-text mb-auto">'.$row[2].'</p>
                  </div>
                </div>
              </div>';
          }
          }
           ?>
      </div>
            
</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>