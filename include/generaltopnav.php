<?php
?>
<header class="p-3 text-white" style="background-color: rgba(218,218,218,0.18)">
    <div class="container">
        <div class="d-flex m-pmenu flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
                <img class="bi me-2" width="80em" src="include/goto.png" aria-label="Bootstrap" alt="logo marketplace">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!--Ciclu-->
                <li><a href="MainAdmin/dash.php" class="nav-link px-2 text-black">Imbracaminte</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Calculatoare si accesorii</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Electorcasnice</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Mobila</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Gradina</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Constructii</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Cauta" aria-label="Search">
            </form>
            <?php if ($setaccauth = 0): ?>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-dark">User</button>
                </div>
            <?php else: ?>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-dark me-2">Intra in cont</button>
                    <button type="button" class="btn btn-warning">Inregistreaza-te</button>
                </div>
            <?php endif ?>

        </div>
    </div>
</header>
