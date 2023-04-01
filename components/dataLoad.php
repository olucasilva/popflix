<script src="../scripts/movieDetails.js"></script>
<section id="container">
  <?php
  $i = 0;
  $detailId = 1;
  if ($type == 1) {
    $data = "../data/series.xml";
    $items = simplexml_load_file($data)->series;
    $items = $items->serie;
  } else {
    $data = file_get_contents('data/movies.json');
    $items = json_decode($data);
  }
  foreach ($items as $item) {
    if ($i == 0) {
      echo "<div class='movies-rows' id='row$detailId'>";
    }
    include 'elementMovie.php';
    $i++;
    if ($i == 5) {
      echo "</div>";
      include 'movieDetails.php';
      $i = 0;
      $detailId++;
    }
  }
  if ($i != 0) {
    echo "</div>";
    include 'movieDetails.php';
  }
  ?>
  <script>
    for (let i = 0; i < localStorage.length; i++) {
      const movie = document.getElementById(localStorage.key(i));
      try {
        movie.classList.add('oncart');
      } catch (error) {
        console.log(error);
      }
    }
  </script>
</section>