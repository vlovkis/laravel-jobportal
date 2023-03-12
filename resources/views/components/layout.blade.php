<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            mintCream: "#EFF9F0",
                            lavanderBlush: "#ffffff",
                            gray: "#7C7C7C",
                            photoBlue: "#2768e8",
                            eggBlue: "#2768e8",
                            richBlack: "#000411",
                        },
                    },
                },
            };
        </script>
        <title>IProject | Find your dream project</title>
    </head>
    <body class="mb-48 bg-lavanderBlush">
        @auth
        <nav class="px-2 bg-lavanderBlush border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="/"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
              <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <span class="block py-2 pl-3 pr-4 rounded md:border-0 md:p-0">
                            Welcome <span class="text-eggBlue">{{auth()->user()->name}}!</span>
                        </span>
                      </li>
                      <li>
                        <a href="/" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                      </li>
                  <li>
                    <a href="/listings/manage" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Manage Listings</a>
                  </li>
                  <li>
                    <a href="/contact" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Help</a>
                  </li>
                  <li>
                    <a href="/listings/pricing" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                  </li>                  
                  <li>
                      <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-photoBlue dark:focus:text-black dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Profile <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                      <!-- Dropdown menu -->
                      <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Dashboard</a>
                            </li>
                            <li><form class='block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-black' method="POST" action="/logout">
                                @csrf
                                <button type="submit">
                                    <span>Logout</span>
                                </button>
                            </form>
                              </li>
                          </ul>
                            
                      </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
          @else
          <nav class="px-2 bg-lavanderBlush border-gray-200 dark:bg-gray-900 dark:border-gray-700">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="/"
                ><img class="w-20" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
              <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">

                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                   <li>
                    <a href="/login" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                  </li> 
                <li>
                    <a href="/register" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
                  </li>
                  <li>
                    <a href="/listings/pricing" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                  </li> 
                <li>
                  <a href="/contact" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-photoBlue dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Help</a>
                </li> 
                </ul>
              </div>
            </div>
          </nav>
          <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
          @endauth
        <main>
    {{$slot}}
    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start bg-lavanderBlush text-richBlack h-24 mt-24 opacity-95 md:justify-center"
>
    <p class="ml-2 font-bold">Copyright &copy; 2023 VL, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 rounded-md right-10 transition ease-in-out delay-150 bg-photoBlue hover:-translate-y-1 hover:scale-110 hover:bg-gray hover:text-white duration-300 py-2 px-5 text-white"
        >Post a Project!</a
    >
</footer>

 <x-flash-message />
 <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>