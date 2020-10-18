<form method="post" action="index.php?controller=Home&action=login">
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <input required name="txt-username" type="text" id="defaultForm-email" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email/username</label>
          </div>

          <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <input required name="txt-password" type="password" id="defaultForm-pass" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input name="btn-login" type="submit" class="btn btn-default" value="Sign in">
        </div>

      </div>
    </div>
  </div>
</form>