<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Profile</h1>
            <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('Home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active text-white">Profile</li>
            </ol>
    </div>
</div>
<!-- Header End -->

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-4"> <a class="btn btn-danger float-end" href="./db/logout.php">Logout</a></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <img src="<?= $imagePath; ?>" class="img-fluid rounded-start" alt="Profile Picture" />
                        </div>

                        <div class="col-md-8">
                            <h5 class="card-title">Personal Information</h5>

                            <form>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= $name; ?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <input type="text" class="form-control" id="gender" value="<?= $gender; ?>" readonly />
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" value="<?= $address; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Account Status</label>
                                            <input type="text" class="form-control" id="status" value="<?= $AccountStat; ?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" value="<?= $age; ?>" readonly />
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Employment Status</label>
                                            <input type="text" class="form-control" id="status" value="<?= $employStat; ?>" readonly />
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary">
                                See More
                            </button>
                            <button type="button" onclick="editProfile(<?= $user_id ?>)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#portalModal">
                                Portal Account
                            </button>
                        </div>

                        <div class="modal fade" id="portalModal" tabindex="-1" aria-labelledby="portalModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="portalModalLabel">
                                            Portal Account Information
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" required name="username" value="" />
                                                    <input type="hidden" class="form-control" name="user_id" id="selectedUserId" value="" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Old Password</label>
                                                    <input type="password" class="form-control" name="old_password" id="password" value="" placeholder="Enter Old Password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" name="password" required value="" placeholder="Enter New Password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="cpassword" required value="" placeholder="Confirm New Password" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" name="update_portal" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>