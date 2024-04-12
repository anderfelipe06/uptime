<?php
    include 'uptime.php';

    $resultArray = explode(' ', trim($result));
 ?>

<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Main</title>
  </head>
  <body class='bg-dark'>

    <div class="container text-center">
        <div class="row mt-2">
            <div class="col bg-primary-subtle ms-1">
              <p class="fs-3"> <?= $dateHours; ?></p>
            </div>
          </div>
      </div>

      <div class="container text-center">
          <div class="row mt-3">
            <?php

              $count = 0;
              $length = count($resultArray);

              while ($count < $length)
              {
                if (preg_replace('/\D/', '', $resultArray[$count]))
                {
                  echo "<div class='col bg-success ms-1'><p class='fs-2'>" . $resultArray[$count] . "ms.</p></div>";
                } else {
                  echo "<div class='col bg-danger ms-1'><p class='fs-2'>" . $resultArray[$count] . "ms</p></div>";
                }

                $count++;
              }

             ?>
            </div>
        </div>

    </div>

  </body>
</html>
