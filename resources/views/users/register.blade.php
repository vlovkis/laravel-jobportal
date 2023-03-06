<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-10">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Register
        </h2>
        <p class="mb-4">Create an account to post gigs</p>
    </header>

    <form method="POST" action="/users">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                Name
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value = "{{old('name')}}"
            />   
         @error('name')
        <p class="text-red-500 text-xs mt-1">
            {{$message}}
        </p>
        </div>

        @enderror
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full"
                name="email"
                value = "{{old('email')}}"
            />
            @error('email')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
                value = "{{old('password')}}"
            />

            @error('password')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password2"
                class="inline-block text-lg mb-2"
            >
                Confirm Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation"
                value = "{{old('password_confirmation')}}"
            />
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">
                {{$message}}
            </p>
            @enderror
        </div>

        <div class="mb-6">
            <div class="flex items-center mb-4">
                <input id="checkbox-1" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to the <a href="#" class="text-photoBlue hover:underline dark:text-eggBlue">terms and conditions</a>.</label>
            </div>
          
            <div class="flex items-center mb-4">
                <input id="checkbox-2" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I want to receive project offers</label>
            </div>
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-photoBlue text-richBlack rounded py-2 px-4 hover:bg-gray hover:text-white transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            >
                Sign Up
            </button>
        </div>

        <div class="mt-8">
            <p>
                Already have an account?
                <a href="/login" class="text-eggBlue"
                    >Login</a
                >
            </p>
        </div>
    </form>
    </x-card>
</x-layout>