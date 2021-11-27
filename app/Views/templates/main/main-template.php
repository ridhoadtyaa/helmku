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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <button onclick="topFunction()" id="upBtn" title="Go to top" class="rounded-circle"><i class="fas fa-chevron-up"></i></button>

    <?= $this->include('templates/main/components/sidebar') ?>
    <div class="my-container">
      
      <div class="promotion-bar text-white text-center">🎉 GRATIS ONGKOS KIRIM KE SELURUH INDONESIA</div>
      
      <?= $this->include('templates/main/components/navbar') ?>
      
      <?= $this->renderSection('content') ?>
      
      <?= $this->include('templates/main/components/footer') ?>

    </div> <!-- container -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
    <?php if(session()->isUserLogin): ?>
    <script>
      $(document).ready(function(){
        const cart = document.querySelector('.cart');
        let cartTotal = Number(<?= count(session()->get('cartList')) ?>);
        cart.setAttribute('data-totalitems', cartTotal);
      });
    </script>
    <?php endif; ?>
    <?= $this->renderSection('javascript') ?>
</body>
</html>