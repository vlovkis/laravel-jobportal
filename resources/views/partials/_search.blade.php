

<form action="" class="bg-lavanderBlush mb-6 pb-2">
    <div class="relative  mb-4 ml-4 mr-4">
        <div class="absolute top-4 left-3">
            <i
                class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
            ></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-14 w-full pl-10 pr-20 border-2 border-eggBlue rounded-md z-0 focus:shadow focus:outline-none"
            placeholder="Find a project"
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 w-20 text-white rounded-md bg-photoBlue hover:bg-gray hover:text-white duration-500"
            >
                Search
            </button>
        </div>
    </div>
    <div class="absolute right-0 mr-4">
         <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-eggBlue bg-white focus:ring-4 border-2 border-eggBlue focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Sort by <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="{{ route('listings.sort', ['sort' => 'created_at', 'order' => 'asc']) }}">Oldest to Newest</a>
      </li>
      <li>
        <a href="{{ route('listings.sort', ['sort' => 'created_at', 'order' => 'desc']) }}">Newest to Oldest</a>
      </li>
      <li>
        </div>
       
        

        
    </div>
</form>