<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid mx-3">
        <div class="navbar-brand d-flex justify-content-center align-items-center">
            <?php echo file_get_contents("italy.svg");?>
            <span class='me-3 text-white'>Italy</span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-3 text-white-50" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="/question1">Question 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="/question2">Question 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="/question3">Question 3</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2 search-input" style="color:white;" type="search"
                    placeholder="Search by date" aria-label="Search">
                <button class="btn btn-outline-danger search-btn">Search</button>
            </form>
        </div>
    </div>
</nav>