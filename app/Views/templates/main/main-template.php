<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/img/logo/logo.png" type="image/gif" sizes="16x16">
    <title><?= $title ?? '' ?> - HelmKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/app.css">
    <?= $this->renderSection('styles') ?>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?= $this->include('templates/main/components/sidebar') ?>
    <div class="my-container">
      
      <div class="promotion-bar text-white text-center">🎉 GRATIS ONGKOS KIRIM KE SELURUH INDONESIA</div>
      
      <?= $this->include('templates/main/components/navbar') ?>
      
      <?= $this->renderSection('content') ?>
      
      <?= $this->include('templates/main/components/footer') ?>

    </div> <!-- container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
    <?= $this->renderSection('javascript') ?>
</body>
</html>