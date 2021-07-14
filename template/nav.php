<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <h1>
        <a class="text-white text-decoration-none navbar-header mr-4" href="<?php if (empty($_SESSION['isAdmin'])) {echo './index.php';} elseif ($_SESSION['isAdmin']) {echo './index-admin.php';} else {echo './index.php';} ?>">Music Shop</a>
    </h1>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/dashboard/MusicShop/index.php') || ($_SERVER['PHP_SELF'] == '/dashboard/MusicShop/index-admin.php')? 'active' : '' ?>">
                <a class="nav-link" href="<?php if (empty($_SESSION['isAdmin'])) {echo './index.php';} elseif ($_SESSION['isAdmin']) {echo './index-admin.php';} else {echo './index.php';} ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/><path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/></svg> Home<span class="sr-only glyphicon glyphicon-home">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/dashboard/MusicShop/account.php')? 'active' : '' ?>" <?php echo (!$_SESSION['isAdmin'] && isLogged()) ? '' : 'hidden' ?>>
                <a class="nav-link" href="./account.php" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg> Account</a>
            </li>
            <!-- da aggiornare -->
            <?php if (isLogged()): ?>
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg> Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item <?php echo ($_SERVER['PHP_SELF'] == '/dashboard/MusicShop/login.php')? 'active' : '' ?>">
                    <a id="login" class="nav-link" href="./login.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg> Login</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
    <?php if (!$_SESSION['isAdmin']): ?>
        <div class="btn-group dropleft float-right">
            <a href="./checkout.php">
                <button class="btn btn-outline-light m-2" type="button" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                    <svg svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                </button>
            </a>
        </div>
    <?php endif ?>
</nav>