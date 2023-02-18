<section
class="relative h-72 flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
<div
    class="absolute top-0 left-0 w-full h-full opacity-30 bg-no-repeat bg-center"
    style="background-image: url('images/hero-logo.png')"
></div>

<div class="z-10">
    <h1 class="text-8xl uppercase text-honeyDew">
        <span class="text-napYellow">I</span><span class="text-richBlack">Project</span>
    </h1>
    <p class="text-2xl text-richBlack font-bold my-4">
        Find or post your dream project!
    </p>
    <div>
        @auth
        <a
            href="/listings/create"
            class="inline-block text-richBlack py-2 px-4 rounded-xl uppercase mt-2 hover:bg-napYellow transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            >Create a post</a
        >
        @else
        <a
            href="/register"
            class="inline-block text-richBlack py-2 px-4 rounded-xl uppercase mt-2 hover:bg-napYellow transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            >Register to post</a
        >
        @endauth
    </div>
</div>
</section>