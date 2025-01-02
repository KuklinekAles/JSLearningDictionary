<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Učení slovíček</title>
    <style>
      .hidden {
        display: none;
      }

      .word-form {
        margin: 20px 0;
      }

      .word-form input {
        margin: 10px 0;
      }

      .feedback-correct {
        color: #32d296;
      }

      .feedback-incorrect {
        color: #f0506e;
      }

      .stats {
        margin: 20px 0;
        padding: 15px;
        background: #f8f8f8;
        border-radius: 4px;
      }

      .pronunciation-btn {
        margin-left: 10px;
      }
    </style>
  </head>
  <body>
    <div class="uk-container uk-container-xsmall" style="border:1px solid gray; background-color: #DBF227">
      <h1 class="uk-text-uppercase uk-margin-medium-top">Procvičování slovíček</h1>
      <br>
      <br>
      <br>
      <br>
      <nav aria-label="Breadcrumb">
        <ul class="uk-breadcrumb">
          <li>
            <a href="">Domov</a>
          </li>
        </ul>
      </nav>
      <p>Program je jednoduchý, uživatelsky přívětivý a ideální pro jednotlivce, kteří se chtějí zábavnou formou učit nebo zlepšovat slovní zásobu v cizím jazyce.</p>
      <div class="uk-child-width-expand@s uk-text-center" uk-grid>
        <div>
          <a href="./anglictina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Angličtina
            </div>
          </a>
        </div>
        <div>
          <a href="./italstina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Italský jazyk
            </div>
          </a>
        </div>
        <div>
          <a href="./nemcina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Německý jazyk
            </div>
          </a>
        </div>
      </div>
      <div class="uk-child-width-expand@s uk-text-center" uk-grid>
        <div>
          <a href="./spanelstina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Španělský jazyk
            </div>
          </a>
        </div>
        <div>
          <a href="./francouzstina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Francouzština
            </div>
          </a>
        </div>
        <div>
          <div class="uk-card uk-card-primary uk-card-body">
            <span uk-icon="icon:  triangle-right; ratio: 1"></span> Norský jazyk
          </div>
        </div>
      </div>
      <div class="uk-child-width-expand@s uk-text-center" uk-grid>
        <div>
          <a href="./madarstina/index.php">
            <div class="uk-card uk-card-primary uk-card-body">
              <span uk-icon="icon:  triangle-right; ratio: 1"></span> Maďarský jazyk
            </div>
          </a>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
    <footer class="uk-margin-large-top uk-text-center">
      <hr>
      <span class="uk-text-small uk-text-muted">2025 COPYLEFT Aleš Kuklínek</span>
    </footer>
    </div>
  </body>
</html>
