<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
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
                            lavanderBlush: "#EEE5E9",
                            gray: "#7C7C7C",
                            photoBlue: "#92DCE5",
                            eggBlue: "#52DEE5",
                            richBlack: "#000411",
                        },
                    },
                },
            };
        </script>
        <title>IProject | Find your dream project</title>
    </head>
    <body class="mb-48 bg-lavanderBlush">
        <nav class="flex justify-between items-center bg-lavanderBlush">
            <a href="/"
                ><img class="w-20" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listings</a
                    >
                </li>
                <li>
                    <form class='inline hover:text-laravel' method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>
                        <span>Logout</span>
                    </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-napYellow duration-500"
                        ><i class="fa-solid fa-user-plus"></i> Registration</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-napYellow duration-500"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
        <main>
    {{$slot}}
    </main>
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start bg-lavanderBlush text-richBlack h-24 mt-24 opacity-95 md:justify-center"
>
    <p class="ml-2 font-bold">Copyright &copy; 2023 VL, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 rounded-lg right-10 transition ease-in-out delay-150 bg-photoBlue hover:-translate-y-1 hover:scale-110 hover:bg-gray hover:text-white duration-300 py-2 px-5 text-richBlack"
        >Post a Project!</a
    >
</footer>

 <x-flash-message />
</body>
</html>