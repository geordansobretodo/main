<main class="form-signin">
    <?= form_open('Register/register'); ?>
    <br>
    <h1 class="h3 mb-3 fw-normal text-center">GALA.AI</h1>
    <div class="center-container">
        <div class="form-content">
            <h1 class="h3 mb-3 fw-normal">Please register</h1>
            <?php if ($this->session->flashdata('register_error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('register_error'); ?>
                </div>
            <?php endif; ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="">
                <label for="username">Username</label>
            </div>
            <div><br></div>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="">
                <label for="email">Email address</label>
            </div>
            <div><br></div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="">
                <label for="password">Password</label>
            </div>
            <div><br></div>
            <button class="w-100 btn-lg btn-primary" type="submit">Sign up</button>
            <?= form_close(); ?>
            <div>
                <div> Already have an account? <a href="<?= base_url("Login") ?>">Sign in.</a> </div>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </div>
    </div>
</main>