<header id="header" class="u-header u-header--abs-top u-header--white-nav-links-xl u-header--bg-transparent u-header--show-hide border-bottom border-xl-bottom-0 border-color-white" data-header-fix-moment="500" data-header-fix-effect="slide">
            <div class="u-header__section u-header__shadow-on-show-hide">
                <!-- Topbar -->
                <div class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-white">
                    <div class="d-flex align-items-center">
                        <div class="ml-auto d-flex align-items-center">
                            <?php
                            if (isset($_SESSION['id'])) {
                                ?>
                                <a   href="backend/logout.php" class="d-flex align-items-center text-white py-3" aria-controls="signInDropdown" aria-haspopup="true" aria-expanded="true" data-unfold-event="click" data-unfold-target="#signInDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                                    <span class="d-inline-block font-size-14 mr-1">Logout</span>
                                </a>
                                <?php
                            }
                            else{
                                ?>
                                <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                                <a id="signInDropdownInvoker"  href="javascript:;" class="d-flex align-items-center text-white py-3" aria-controls="signInDropdown" aria-haspopup="true" aria-expanded="true" data-unfold-event="click" data-unfold-target="#signInDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                                    <span class="d-inline-block font-size-14 mr-1">Login</span>
                                </a>
                                <div id="signInDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right py-0 mt-0" aria-labelledby="signInDropdownInvoker" style="min-width: 500px;">
                                    <div class="card rounded-xs">
                                        <form class="js-validate login" novalidate="novalidate">
                                            <!-- Login -->
                                            <div id="login" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">
                                                <!-- Header -->
                                                <div class="card-header text-center">
                                                    <h3 class="h5 mb-0 font-weight-semi-bold">Login</h3>
                                                </div>
                                                <!-- End Header -->
                                                <div class="card-body pt-6 pb-4">
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signinSrEmail">Email</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control" name="email"  placeholder="Email Or Username" aria-label="Email Or Username" aria-describedby="signinEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" >
                                                                        <span class="far fa-envelope font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="signinSrPassword">Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="password"  placeholder="Password" aria-label="Password" aria-describedby="signinPassword" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" >
                                                                        <span class="flaticon-password font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                    <div class="mb-3 pb-1">
                                                        <button type="submit" id="login" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Login</button>
                                                    </div>
                                                    <div id="result1"></div>
                                                </div>
                                            </div>
                                            <!-- End Login -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider">
                                <a id="signUpDropdownInvoker"  href="javascript:;" class="d-flex align-items-center text-white py-3" aria-controls="signUpDropdown" aria-haspopup="true" aria-expanded="true" data-unfold-event="click" data-unfold-target="#signUpDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                    <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                                    <span class="d-inline-block font-size-14 mr-1">Register</span>
                                </a>
                                <div id="signUpDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right py-0 mt-0" aria-labelledby="signUpDropdownInvoker" style="min-width: 500px;">
                                    <div class="card rounded-xs">
                                    <form class="js-validate sign_up" novalidate="novalidate" method="post">
                                            <!-- Signup -->
                                            <div id="signup" style="opacity: 1;" data-target-group="idForm">
                                                <!-- Header -->
                                                <div class="card-header text-center">
                                                    <h3 class="h5 mb-0 font-weight-semi-bold">Register</h3>
                                                </div>
                                                <!-- End Header -->
                                                <div class="card-body pt-5 pb-4">

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="name">Full Name</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="text" class="form-control" name="name"  placeholder="Full Name" aria-label="Full Name" aria-describedby="normalname" required="" data-msg="Please enter a valid name." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" >
                                                                        <span class="flaticon-browser-1 font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" >Email</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="signupEmail" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" >
                                                                        <span class="far fa-envelope font-size-20"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" >Confirm Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="signupPassword" required="true" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" >
                                                                        <span class="flaticon-password font-size-10"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group pb-1">
                                                        <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                                            <label class="sr-only" for="r_password">Confirm Password</label>
                                                            <div class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                                                <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" aria-label="Password" aria-describedby="signupPassword" required="true" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" >
                                                                        <span class="flaticon-password font-size-10"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->
                                                    <div class="">
                                                        <button type="submit" class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">Register</button>
                                                    </div>
                                                    <div id="result">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Signup -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->
                <div id="logoAndNav" class="container-fluid py-1 py-xl-0">
                    <!-- Nav -->
                    <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
                        <!-- My Account -->
                        <a href="https://madrasthemes.github.io/mytravel-html/html/others/about.html" class="text-white d-xl-none font-size-20 scroll-icon">
                            <i class="flaticon-user"></i>
                        </a>
                        <!-- End My Account -->

                        <!-- Logo -->
                        <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-white mr-0 mr-xl-5" href="index.php" aria-label="MyTravel">
                        <img width="55px" height="53px" style="margin-bottom: 0;" class="d-none d-xl-block" src="assets/img/icons/tbd.png" alt="">
                            <span class="u-header__navbar-brand-text">TourismBD</span>
                        </a>
                        <!-- End Logo -->

                        <!-- Handheld Logo -->
                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-collapsed" href="index.php" aria-label="MyTravel">
                        <img width="55px" height="53px" style="margin-bottom: 0;" class="d-none d-xl-block" src="assets/img/icons/tourismbd.png" alt="">
                            <span class="u-header__navbar-brand-text">TourismBD</span>
                        </a>
                        <!-- End Handheld Logo -->

                        <!-- Scroll Logo -->
                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-on-scroll" href="index.php" aria-label="MyTravel">
                        <img width="55px" height="53px" style="margin-bottom: 0;" class="d-none d-xl-block" src="assets/img/icons/tourismbd1.png" alt="">
                            <span class="u-header__navbar-brand-text">TourismBD</span>
                        </a>
                        <!-- End Scroll Logo -->

                        <!-- Responsive Toggle Button -->
                        <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white order-2 ml-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                            <span id="hamburgerTrigger" class="u-hamburger__box">
                                <span class="u-hamburger__inner"></span>
                            </span>
                        </button>
                        <!-- End Responsive Toggle Button -->

                        <!-- Navigation -->
                        <div id="navBar" class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative mx-n3 mx-xl-0">
                            <ul class="navbar-nav u-header__navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link u-header__nav-link u-header__nav-link-border" href="index.php">Home</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Navigation -->


                        <!-- Button -->
                        <div class="pl-4 ml-1 u-header__last-item-btn u-header__last-item-btn-xl">
                            <a class="btn btn-wide rounded-xs btn-white transition-3d-hover" href="https://madrasthemes.github.io/mytravel-html/html/others/become-expert.html">Become Local Expert</a>
                        </div>
                        <!-- End Button -->
                    </nav>
                    <!-- End Nav -->
                </div>
            </div>
        </header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        $('.sign_up').on('submit', function (e) {
            e.preventDefault();
            if ($(".sign_up input[name='email']").val().length != 0 && $(".sign_up input[name='name']").val().length != 0 && $(".sign_up input[name='password']").val().length != 0 && $(".sign_up input[name='password_confirmation']").val().length != 0) {
                $.ajax({
                    type: 'post',
                    url:'backend/sign_up.php',
                    data: $('.sign_up').serialize(),
                    success: function (html) {
                        var msg=$.trim(html);
                        if(msg=="Success")
                        {
                            $('#result').removeClass('text-danger');
                            alert("Sign Up Successfully")
                            window.location.reload();
                        }
                        else{
                            $('#result').addClass('text-danger').html(html);
                        }
                    }
                });
            }
        });
        $('#login').on('click', function () {
            if ($(".login input[name='email']").val().length != 0 && $(".login input[name='password']").val().length != 0) {
                $.ajax({
                    type:'post',
                    url: 'backend/login.php',
                    data: $('.login').serialize(),
                    success: function (a) {
                    var msg2=$.trim(a);
                        if(msg2=="not_ok"){
                            $('#result1').addClass('text-danger').html("Email and Password not match");
                        }
                        else{
                            $('#result1').removeClass('text-danger')
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });
</script>