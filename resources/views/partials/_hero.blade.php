<section
class="relative h-72 flex flex-col justify-center align-center text-center space-y-4"
>
<div
    class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-center bg-lavanderBlush"
    style="background-image: url('images/hero.png')"
></div>

<div class="z-10">
    <h1 class="text-6xl uppercase text-honeyDew font-bold">
        <span class="text-richBlack">I<span class="text-eggBlue">P</span>roject</span>
    </h1>
    <p class="text-2xl text-richBlack">
        Find or post your dream project!
    </p>
    <div>
        @auth
        @else
        <a
            href="/register"
            class="inline-block text-white bg-photoBlue py-2 px-4 rounded-xl uppercase mt-2 hover:bg-gray hover:text-white transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            >Register to post</a
        >
        @endauth
    </div>
</div>
</section>