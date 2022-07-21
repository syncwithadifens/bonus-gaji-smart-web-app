<section>

  <div class="box">

    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>

    <div class="container">
      <div class="form">
        <h2>LOGIN</h2>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('auth'); ?>" method="POST">
          <div class="inputBx">
            <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" required="required">
            <span>Username</span>
            <i class="fas fa-user-circle"></i>
            <div class="input-group">
              <?= form_error('username', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <div class="inputBx password">
            <input id="password-input" type="password" id="password" name="password" required="required">
            <span>Password</span>
            <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
            <i class="fas fa-key"></i>
            <div class="input-group">
              <?= form_error('password', '<small class="text-danger">', '</small>') ?>
            </div>
          </div>
          <label class="remember"><input type="checkbox">
            Remember</label>
          <div class="inputBx">
            <input type="submit" value="Log in">
          </div>
        </form>
        <p>Don't have an account <a href="<?= base_url('auth/registration'); ?>">Sign up</a></p>
      </div>
    </div>

  </div>
</section>
<script>
  function show_hide_password(target) {
    var input = document.getElementById('password-input');
    if (input.getAttribute('type') == 'password') {
      target.classList.add('view');
      input.setAttribute('type', 'text');
    } else {
      target.classList.remove('view');
      input.setAttribute('type', 'password');
    }
    return false;
  }
</script>