<?= $this->extend('templates/auth/auth-template') ?>

<?= $this->section('content') ?>
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="/assets/img/logo/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-dark">
              <div class="card-header"><h4 class="text-dark">Login</h4></div>
              
              <?= $this->include('templates/dashboard/partials/alert') ?>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                </div>
            </div>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; HelmKu 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?= $this->endSection() ?>