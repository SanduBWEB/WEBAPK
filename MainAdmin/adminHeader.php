<?php
?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none" style="margin-left: 1em;">
        <ion-icon name="logo-electron" size="large"></ion-icon>
    </a>


    <div class="col-md-3 text-end">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" style="margin-right: 2em"><?php echo $_SESSION['username']; ?></button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding: 1em">
            <li><a href="#" id="logout-button">Ieșire</a></li>
        </ul>
    </div>
</header>
