<section
class="relative h-72 flex flex-col justify-center align-center text-center space-y-4"
>
<div
    class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-center bg-lavanderBlush"
    style="background-image: url('images/hero-logo.png')"
></div>

<div class="z-10">
    <h1 class="text-8xl uppercase text-honeyDew ml-6 font-bold">
        <span class="text-napYellow ">I</span><span class="text-richBlack">Project</span>
    </h1>
    <p class="text-2xl text-richBlack my-4 ml-6">
        Find or post your dream project!
    </p>
    <div>
        @auth
        @else
        <a
            href="/register"
            class="inline-block text-richBlack bg-photoBlue py-2 px-4 rounded-xl uppercase mt-2 hover:bg-gray hover:text-white transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            >Register to post</a
        >
        @endauth
    </div>
</div>
</section>