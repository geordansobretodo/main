<!-- Spinner Start -->
<!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div> -->
<!-- Spinner End -->

<!-- Flashdata Modal -->
<?php if ($this->session->flashdata()) { ?>
    <div class="modal fade" id="flashdataModal" tabindex="-1" aria-labelledby="flashdataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header <?= $this->session->flashdata('register_error') ? 'bg-danger' : 'bg-secondary'; ?>">
                    <h5 class="modal-title text-white" id="flashdataModalLabel">
                        <?= ($this->session->flashdata('login_success') ? 'Success' : 'Error'); ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
                </div>
                <div class="modal-body">
                    <?php
                    if ($this->session->flashdata('register_success')) { ?>
                        <p><?= $this->session->flashdata('register_success'); ?></p>
                    <?php } elseif ($this->session->flashdata('login_success')) { ?>
                        <p><?= $this->session->flashdata('login_success'); ?></p> 
                    <?php } elseif ($this->session->flashdata('register_error')) { ?>
                        <p><?= $this->session->flashdata('register_error'); ?></p> 
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Topbar Start -->
<div class="container-fluid bg-primary px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <?php if ($this->session->userdata('log') != 'logged') { ?>
                    <a href="<?= base_url("Register") ?>"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                    <a href="<?= base_url("Login") ?>"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                <?php } else { ?>
                    <a href="<?= base_url("Login/logout") ?>"><small class="me-3 text-light"><i class="fa fa-sign-out-alt me-2"></i>Logout</small></a>
                <?php } ?>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="<?= base_url('Home/index') ?>" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-map-marker-alt me-3"></i>GALA.ai</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?= base_url('Home') ?>" class="nav-item nav-link">Home</a>
                <a href="<?= base_url('About') ?>" class="nav-item nav-link">About</a>
                <a href="<?= base_url('Services') ?>" class="nav-item nav-link">Services</a>
                <a href="<?= base_url('Packages') ?>" class="nav-item nav-link">Packages</a>
                <a href="<?= base_url('Blog') ?>" class="nav-item nav-link">Blog</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url('Home/destination') ?>" class="dropdown-item">Destination</a>
                        <a href="<?= base_url('Home/tour') ?>" class="dropdown-item">Explore Tour</a>
                        <a href="<?= base_url('Home/booking') ?>" class="dropdown-item">Travel Booking</a>
                        <a href="<?= base_url('Home/gallery') ?>" class="dropdown-item">Our Gallery</a>
                        <a href="<?= base_url('Home/guides') ?>" class="dropdown-item">Travel Guides</a>
                        <a href="<?= base_url('Home/testimonial') ?>" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="<?= base_url('Contact') ?>" class="nav-item nav-link">Contact</a>
            </div>
            <a href="<?= base_url('Booking') ?>" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Book Now</a>
        </div>
    </nav>