<x-layout>
@include('partials._search')
<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10" style="background-color: #ffffff;">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="..."> 
                            <div class="flex flex-col mr-20 items-center justify-center text-center">
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                        <x-listing-tags :tagsCsv='$listing->tags' />
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                    
                    </div></div>
                        <div class="col-span-2"><div class="flex flex-col">
                            <h3 class="text-3xl font-bold mb-4 text-center">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6 text-center">
                                {{$listing->description}}

                            </div>                                
                        </div></div>
                        <div class="col-span-3"><a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-photoBlue text-white mt-6 py-2 rounded-xl hover:opacity-80 w-full mb-5 text-center "
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                <a
                                    href="{{$listing->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80 w-full text-center"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                ></div>
                    </div>
                    <div
                        class="flex flex-row items-left justify-center text-left"
                    >
                   
                        

                    </div>
                </x-card>
            </div>
</x-layout>
