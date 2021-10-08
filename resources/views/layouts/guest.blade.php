<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('images/boxshot-free.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <style>
      .gradient {
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%) !important;
      }
    </style>
  </head>
  <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <section class="min-h-screen bg-gray-100">
        @include('layouts.guestnav')
    </section>

    <section class="bg-gray-200 border-b py-8 px-20">
      <div class="flex flex-wrap">
          <div class="flex flex-wrap -mx-4">
              <div class="md:w-1/5 h-auto px-4 py-4 md:py-2">
                  <div class="h-full w-full bg-cover rounded shadow-md">
                      <img class="rounded shadow-md"
                          src="{{ asset('images/books/politics-front.jpg') }}" alt="">
                  </div>
              </div>
              <div class="md:w-1/5 h-auto px-4 py-4 md:py-2">
                  <div class="h-full w-full bg-cover rounded shadow-md">
                      <img class="rounded shadow-md"
                          src="{{ asset('images/books/no-more-delay-front.jpg') }}" alt="">
                  </div>
              </div>
              <div class="md:w-1/5 h-auto px-4 py-4 md:py-2">
                  <div class="h-full w-full bg-cover rounded shadow-md">
                      <img class="rounded shadow-md"
                          src="{{ asset('images/books/the-wedding-gift-front.jpg') }}" alt="">
                  </div>
              </div>
              <div class="md:w-1/5 h-auto px-4 py-4 md:py-2">
                  <div class="h-full w-full bg-cover rounded shadow-md">
                      <img class="rounded shadow-md"
                          src="{{ asset('images/books/your-miracle-will-happen.jpg') }}" alt="">
                  </div>
              </div>
              <div class="md:w-1/5 h-auto px-4 py-4 md:py-2">
                  <div class="h-full w-full bg-cover rounded shadow-md">
                      <img class="rounded shadow-md"
                          src="{{ asset('images/books/blooming-rose.jpg') }}" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section>


    <section class="bg-gradient-to-r from-pink-500 to-yellow-500 mx-auto text-center py-6 mb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Order for any of my books now
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-4 text-3xl leading-tight">
        Pre-orders now and get a discount.
      </h3>
      <a href="{{ route('books') }}" class="mx-auto lg:mx-0 bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Order Now!
      </a>
    </section>
<!--Footer-->
<footer class="bg-gray-900">
    <div class="container mx-auto px-8">
      <div class="w-full md:flex md:flex-row-3 p-2 md:p-6 md:space-x-4">
        <div class="md:flex-1 mb-6 text-black space-y-4">
          <h3 class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-2xl" href="#">
            Launch Address
          </h3>
          <p class="flex p-2 bg-gray-700 w-auto h-auto border-gray-300 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
            <a href="{{ route('books') }}">
              READ ONLINE FOR <span class="font-bold text-white"> &#8358;500</span></a></p>
            <p class="flex p-2 bg-gray-700 w-auto h-auto border-gray-300 text-gray-400">
              <a href="email:info@bishopkunleamoo.com" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                 info@bishopkunleamoo.com</a></p>
            <p class="flex p-2 bg-gray-700 w-auto h-auto border-gray-300 text-gray-400">
              <a href="tel:+2348058168881" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                +234 805 816 8881</a></p>
            <p>
              <a href="{{ route('login') }}" class="flex px-1 py-1 rounded text-gray-600 hover:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg> Admin Login</a>
            </p>
        </div>
        <div class="md:flex-1 space-y-4">
          <p class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-2xl">Map</p>
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="250" id="gmap_canvas"
                src="https://maps.google.com/maps?q=%20Felicia%20Hall,%20Jogor%20Center%20Ibadan,%20West%20Africa&t=&z=13&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                {{-- <a href="https://fmovies-online.net">fmoviews</a><br> --}}
              <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 100%;
                  width: 100%;
                }
              </style>
              {{-- <a href="https://www.embedgooglemap.net">embedgooglemap.net</a> --}}
              <style>
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 100%;
                  width: 100%;
                }
              </style>
            </div>
          </div>
        </div>
        {{-- <div class="flex-1">
          <p class="uppercase text-gray-500 md:mb-6">Legal</p>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
            </li>
          </ul>
        </div> --}}
        <div class="md:flex-1 space-y-4">
          <p class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-2xl">Social</p>
          <p class="p-2 bg-blue-100 w-auto h-auto border-blue-200 text-blue-800 rounded">
            <a href="https://twitter.com/@kunle222" target="_blank" class="flex">
              <img class="mr-5" style="width: 20px;" src="{{ asset('images/svg/twitter.svg') }}" alt="">
              Twitter</a>
            </p>
            <p class="p-2 bg-blue-100 w-auto h-auto border-blue-300 text-blue-900 rounded">
              <a href="https://www.facebook.com/kunle.amoo.5" target="_blank" class="flex">
                <img class="mr-5" style="width: 20px;" src="{{ asset('images/svg/facebook.svg') }}" alt="">
                Facebook</a>
              </p>
              <p class="p-2 bg-gray-100 w-auto h-auto border-gray-300 text-gray-600 rounded">
                <a href="https://www.linkedin.com/in/kunle-amoo-a9a40a20" target="_blank" class="flex">
                  <img class="mr-5" style="width: 20px;" src="{{ asset('images/svg/linkedin.svg') }}" alt="">
                  Linkedin</a>
                </p>
                <p class="p-2 bg-green-100 w-auto h-auto border-green-300 text-green-600 rounded">
                  <a href="https://wa.me/+2348058168881" target="_blank" class="flex">
                    <img class="mr-5" style="width: 20px;" src="{{ asset('images/svg/whatsapp.svg') }}" alt="">
               WhatsApp</a>
          </p>
        </div>
      </div>
    </div>
    {{-- <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector created by freepik - www.freepik.com</a> --}}
  </footer>
  <!-- jQuery if you need it
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
-->
  <script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function () {
      /*Apply classes for slide in bar*/
      scrollpos = window.scrollY;

      if (scrollpos > 10) {
        header.classList.add("bg-white");
        navaction.classList.remove("bg-white");
        navaction.classList.add("gradient");
        navaction.classList.remove("text-gray-800");
        navaction.classList.add("text-white");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-gray-800");
          toToggle[i].classList.remove("text-white");
        }
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        navcontent.classList.add("bg-white");
      } else {
        header.classList.remove("bg-white");
        navaction.classList.remove("gradient");
        navaction.classList.add("bg-white");
        navaction.classList.remove("text-white");
        navaction.classList.add("text-gray-800");
        //Use to switch toggleColour colours
        for (var i = 0; i < toToggle.length; i++) {
          toToggle[i].classList.add("text-white");
          toToggle[i].classList.remove("text-gray-800");
        }

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
        navcontent.classList.add("bg-gray-100");
      }
    });
  </script>
  <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;
    function check(e) {
      var target = (e && e.target) || (event && event.srcElement);

      //Nav Menu
      if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
          // click on the link
          if (navMenuDiv.classList.contains("hidden")) {
            navMenuDiv.classList.remove("hidden");
          } else {
            navMenuDiv.classList.add("hidden");
          }
        } else {
          // click both outside link and outside menu, hide menu
          navMenuDiv.classList.add("hidden");
        }
      }
    }
    function checkParent(t, elm) {
      while (t.parentNode) {
        if (t == elm) {
          return true;
        }
        t = t.parentNode;
      }
      return false;
    }
  </script>
</body>
</html>


{{-- --------------------------------------------------- --}}
{{-- --------------------------------------------------- --}}
{{-- --------------------------------------------------- --}}
{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.guestnav')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
    </body>
</html> --}}