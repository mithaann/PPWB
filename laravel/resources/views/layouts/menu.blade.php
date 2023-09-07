<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
  <a class="navbar-brand" href="/">
    <img src="{{ asset('images/logom.png') }}" alt="Logo" style="width: 100px; height: auto;">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kategori</a>
        </li> <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="index.html">Home</a>
                  <a href="products.html">Products</a>
                  <a href="{{ route('about') }}">About</a>
                  <a href="client.html">Client</a>
                  <a href="{{ route('kontak') }}">Contact</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png" ></span>
               <a class="logo" href="index.html"><img src="images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li><a href="#"><img src="images/user-icon.png"></a></li>
                        <li><a href="#"><img src="images/bag-icon.png"></a></li>
                        <li><a href="#"><img src="images/search-icon.png"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kontak') }}">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>