<div class="container ">
    <div class="row register-form">
        <?php if ($this->request->session()->check('Flash.flash')) : ?>
            <?php if ($this->request->session()->read('Flash.flash.0.message') !== 'You are not authorized to access that location.') : ?>
                <div class="col-md-12" style="text-align: center; padding-bottom: 15px;">
                    <h4><span class="badge badge-danger"><?= $this->Flash->render() ?></span></h4>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="col-md-6 mb-5 mb-md-0">
            <h3 class="form_title"><?= __("Login") ?></h3>
            <form class="register" method="post" action="<?= $this->request->base ?>/users/login">
                <div class="row">
                    <div class="form-group col-md-12 email">
                        <input id="email-login" type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group col-md-12 password">
                        <input id="password-login" type="password" name="password" class="form-control" placeholder="Password">
                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>" />
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-info btn-block mt-4" id="signin"><?= __("Log In") ?></button>

            </form>
        </div>
        <div class="col-md-6">
            <h3 class="form_title"><?= __("Cadastro") ?></h3>
            <form class="register" action="<?= $this->request->base ?>/users/register" method="post">
                <div class="row">
                    <div class="form-group col-md-12 uname">
                        <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group col-md-12 uname">
                        <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Lastname" name="lastname" required>
                    </div>
                    <div class="form-group col-md-12 uname">
                        <input type="text" class="form-control" id="uname" aria-describedby="fullName" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group col-md-12 email">
                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group col-md-12 password">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group col-md-12 password">
                        <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="confirm_password" required>
                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>" />
                    </div>
                    <input type="hidden" name="roles_id" value="11">
                    <div class="form-check col-md-12">
                        <input id="checkbox-3" class="checkbox-custom form-check-input" name="terms" type="checkbox" required>
                        <label for="checkbox-3" class="checkbox-custom-label form-check-label"><?= __("Eu concordo com os") ?> <a href="/homes/terms" target="_blank" class="text-info"><?= __("termons e condições") ?></a> </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default btn-info btn-block mt-4" id="add-user"><?= __("Cadastrar") ?></button>
            </form>
        </div>
    </div>
</div>



<style media="screen">
    .register-form {
        padding-top: 80px;
        padding-bottom: 40px;
    }

    @media (min-width: 992px) {
        .register-form {
            padding-top: 100px;
            padding-bottom: 100px;
        }
    }
</style>