<style>
    .search {
        --bs-btn-color: #554f6c;
        --bs-btn-border-color: #554f6c;
        --bs-btn-hover-color: #fff;
        --bs-btn-hover-bg: #554f6c;
        --bs-btn-hover-border-color: gray;
        --bs-btn-focus-shadow-rgb: 20, 110, 253;
        --bs-btn-active-color: #fff;
        --bs-btn-active-bg: #554f6c;
        --bs-btn-active-border-color: #0d6efd;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0.125, 0.125);
        --bs-btn-disabled-color: #0d6efd;
        --bs-btn-disabled-bg: transparent;
        --bs-btn-disabled-border-color: #0d6efd;
        --bs-gradient: none;
    }
</style>
<header class="header" id="header">
    <div class="header_toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
    </div>
    <div class=" justify-content-start">
        <a href="index.php" class="navbar-brand">
            <i class="bx bx-home"></i>
            <span class=" fs-3 brand">Rent !t</span>
        </a>
    </div>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary search" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>