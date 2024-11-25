<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Login';
require __DIR__ . '/Layouts/headbalise.php';
?>

<body>
    <div class="col-md-8 offset-4" style="padding-top: 5%;">
        <div class="card" style="width:20rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="" method="POST">
                <div class="mb-3">
                    <div class="form-floating ">
                        <input type="email" class="form-control border-0 border-bottom rounded-0" name="email" id="email" placeholder="Email" required>
                        <label for="email" name="email" class="form-label">Email</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating ">
                        <input type="password" class="form-control border-0 border-bottom rounded-0" name="password" id="password" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    <a class="float-end" href="#">Forgot password</a>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Sign up</button>
                    </div>
                </div>
                </form>
                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                            <span class="ms-2 fs-6">Sign in with Google</span>
                        </a>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <p class="text-center">Don't have an account?  <a href="#">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>