<html lang="en">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Үзий</title>
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" type="image/x-icon"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

      /* base css */
      :root {
        --navbar_background: #0085c9;
        --navbar_font: #eee;
        --navbar_menu_hover: #0072ac;
      }

      * {
        margin: 0;
        padding: 0;
      }

      body {
        font-family: "Poppins", sans-serif;
      }

      /* Navbar Css */

      .__navbar {
        display: flex;
        position: fixed;
        top: 0;
        width: 100%;
        height: 50px;
        background: var(--navbar_background);
        color: var(--navbar_font);
        align-items: center;
      }

      /* Navbar Logo */
      .__navbar-logo {
        width: 50%;
        margin: 0 0 0 2%;
      }

      /* Navbar Menu */

      .__navbar-menu {
        display: flex;
        width: 50%;
        margin: 0 0 0 0;
        height: 100%;
        align-items: center;
      }

      .__navbar-menu ul {
        display: flex;
        list-style: none;
        width: 100%;
        height: 100%;
        justify-content: space-around;
      }

      .__navbar-menu a {
        color: var(--navbar-font);
        text-decoration: none;
        width: 100%;
        height: 100%;
      }

      .__navbar-menu ul li {
        display: flex;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
      }

      .__navbar-menu ul li:hover {
        background: var(--navbar_menu_hover);
      }

      /* Hamburger */

      .__hamburger {
        display: none;
        flex-direction: column;
        height: 40px;
        width: 45px;
        justify-content: space-around;
        margin: 0 2% 0 0;
        cursor: pointer;
      }

      .__hamburger div {
        width: 40px;
        height: 4px;
        background: white;
      }

      .__section{
          padding: 60px 10px;
      }

      @media only screen and (max-width: 800px) {
        .__navbar-menu ul {
          display: flex;
          flex-direction: column;
          position: absolute;
          top: 0;
          margin-right: 2px;
          z-index: 1;
          background: var(--navbar_background);
          height: 100vh;
          width: full;
        }

        .__navbar-menu-open {
          right: 0;
          transition: 0.5s ease;
        }
        .__navbar-menu-close {
          right: -100vw;
          transition: 0.5s ease;
        }

        .__navbar-menu {
          justify-content: flex-end;
        }
        .__hamburger {
          display: flex;
          z-index: 2;
        }
      }

      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 2px 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }
      .search-container {
        margin: 12px;
      }

    </style>
</head>
<body>
    <nav>
      <div class="__navbar">
        <div class="__navbar-logo">
          <h1>Үзий систем</h1>
        </div>
        <div class="__navbar-menu">
        <ul class="__navbar-menu-close">
          <div class="search-container">
            <form action="doSearch" method="POST">
              @csrf
              <div class="flex">
                <div class="flex-1">
                    <input type="search" name="q" class="py-1 mx-2 text-sm text-black rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Хайх..." autocomplete="off">
                </div>
                <div class="flex-1 hover:bg-white rounded">
                  <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg></button>
                </div>
              </div>
            </form>
          </div>
          
          <a href="#home"><li  class="mr-6"><span>Эхлэл</span></li></a>
          <a href="#services"><li  class="mr-6"><span>Үйлчилгээ</span></li></a>
          <a href="#help"><li  class="mr-6"><span>Тухай</span></li></a>
          @if (Route::has('login'))
              @auth
                <a href="{{ url('/home') }}" ><li><span>Эхлэл</span></li></a>
                  @else
                    <a href="{{ route('login') }}" ><li  class="mr-6"><span>Нэвтрэх</span></li></a>
                      @if (Route::has('register'))
                        <a href="{{ route('register') }}" ><li class="pr-10 pl-2"><span>Бүртгүүлэх</span></li></a>
                      @endif
              @endauth
          @endif
        </ul>
        <div class="__hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>  
      </div>
    </nav>
      <div class="__content">
        <div class="__section" id="home">

        <!-- kinonii zurag uzuulne  -->
        <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="img_nature_wide.jpg" style="width:100%">
          <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="img_snow_wide.jpg" style="width:100%">
          <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="img_mountains_wide.jpg" style="width:100%">
          <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
        </div>
          </div>
        <div class="__section" id="services">
            <h1>Services</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
          </div>
        <div class="__section" id="help">
            <h1>Help</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo quam vero porro voluptate sint? Quasi, dicta autem? Corporis, pariatur commodi nesciunt suscipit animi provident voluptatibus fuga quas optio, quam expedita sapiente, maxime voluptas hic. Veniam temporibus suscipit vitae distinctio error nulla amet culpa assumenda accusantium sed animi dolores repellendus autem enim sequi ex ducimus, ullam deleniti rem praesentium! Asperiores libero architecto atque eligendi at non dolorum! Ex accusantium natus, fugiat, mollitia vero tenetur sapiente cum eaque, delectus reprehenderit pariatur voluptatem iste deserunt consectetur libero quae nam repellendus commodi. Nesciunt ipsum doloremque officia voluptate aliquid velit sequi similique facere sunt non.</p>
          </div>
        <div class="__section" id="about">
        
        </div>
      </div>
    <script>

      // navbar script
      hamburger = document.querySelector(".__hamburger");
      hamburgerMenu = document.querySelector(".__navbar-menu ul");
      hamburgerMenuItems = document.querySelectorAll("ul li");
      mobileNav = false;
      hamburger.addEventListener("click", this.mobileNavOpen);

      function mobileNavOpen() {
        if (mobileNav === false) {
          mobileNav = true;
          hamburgerMenu.classList.add("__navbar-menu-open");
          hamburgerMenu.classList.remove("__navbar-menu-close");
        } else {
          mobileNav = false;
          hamburgerMenu.classList.remove("__navbar-menu-open");
          hamburgerMenu.classList.add("__navbar-menu-close");
        }
      }

      hamburgerMenuItems.forEach((link) => {
        link.addEventListener("click", () => {
          mobileNav = false;
          hamburgerMenu.classList.remove("__navbar-menu-open");
          hamburgerMenu.classList.add("__navbar-menu-close");
        });
      });
      
      // image changing script
      var slideIndex = 1;
  

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function currentSlide(n) {
        showSlides(slideIndex = n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
      }

    </script>
</body>
</html>