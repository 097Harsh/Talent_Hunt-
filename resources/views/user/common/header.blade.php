<header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
                <h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="index.html">
                        <span class="sublog">Digit</span>Marketing
                    </a></h1>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav search-right mt-lg-0 mt-2">
                        <li class="nav-item" title="Search">
                            <a href="#search" class="search-search">
                                <span class="fas fa-search" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li class="nav-item me-lg-3">
                            <a href="{{ route('login') }}" class="phone-btn btn btn-primary btn-style d-none d-lg-block btn-style ms-2">login</a>
                        </li>
                    </ul>

                    <!-- //toggle switch for light and dark theme -->

                    <!-- search popup -->
                    <div id="search" class="w3lpop-overlay">
                        <div class="w3lpopup">
                            <form action="#formsearch" method="GET" class="d-sm-flex">
                                <input class="form-control me-2" type="search" placeholder="Search here..." aria-label="Search" required="">
                                <button class="btn btn-style btn-primary" type="submit">Search</button>
                                <a class="close" href="#formsearch">&times;</a>
                            </form>
                        </div>
                    </div>
                    <!-- /search popup -->
                </div>
                
            </nav>
        </div>
    </header>