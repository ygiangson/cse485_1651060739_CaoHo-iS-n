<form action="handle-register.php" method="post">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" name="username" id="orangeForm-name" class="form-control validate">
            <label data-error="wrong" data-success="right" for="orangeForm-name">Your username</label>
          </div>
          <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input name="email" type="email" id="orangeForm-email" class="form-control validate">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
          </div>

          <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <input name="password" type="password" id="orangeForm-pass" class="form-control validate">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
          </div>

          <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <input name="confirm-password" type="password" id="orangeForm-pass" class="form-control validate">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Confirm password</label>
          </div>

        </div>
        <!-- radio button -->
        <div class="container w-100 ml-3, mx-3">
          <div class="form-check-inline">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="user" name="role" checked>user
              </label>
            </div>
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="admin" name="role">admin
            </label>
          </div>

        </div>

        <!-- button sign -->
        <div class="modal-footer d-flex justify-content-center">
          <button name="register" type="submit" class="btn bg-custom text-light">Sign up</button>
        </div>

      </div>
    </div>
  </div>
</form>