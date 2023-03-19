<x-layout>

    <div class="flex items-center justify-center">
        <div class="w-1/2 hidden sm:block h-screen" style="background-image: url('{{ asset('images/banner.png') }}')">
            
        </div>
        <div class="w-full sm:w-1/2">

            <span class="block sm:hidden p-4 font-bold text-4xl">Support</span>
            <p class="block sm:hidden pl-4 pt-8 pr-4">Write your message to us and we will reach you within 1-2 business days</p>
      
          <x-card class="p-10 max-w-lg mx-auto sm:mt-0">
            <form action="" method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="form-group">
                    <label class="inline-block text-lg mb-2 font-bold ">Name</label>
                    <input type="text" class="form-control border mb-4 border-gray-200 border-2 border-eggBlue rounded p-2 w-full {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
                    <!-- Error -->
                    @if ($errors->has('name'))
                    <div class="error">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="inline-block text-lg mb-2 font-bold">Email</label>
                    <input type="email" class="form-control mb-4 border border-gray-200 border-2 border-eggBlue rounded p-2 w-full {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
                    @if ($errors->has('email'))
                    <div class="error">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="inline-block text-lg mb-2 font-bold">Phone</label>
                    <input type="text" class="form-control mb-4 border border-gray-200 border-2 border-eggBlue rounded p-2 w-full {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
                    @if ($errors->has('phone'))
                    <div class="error">
                        {{ $errors->first('phone') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="inline-block text-lg mb-2 font-bold">Subject</label>
                    <input type="text" class="form-control mb-4 border border-gray-200 border-2 border-eggBlue rounded p-2 w-full {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                        id="subject">
                    @if ($errors->has('subject'))
                    <div class="error">
                        {{ $errors->first('subject') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="inline-block text-lg mb-2 font-bold">Message</label>
                    <textarea class="form-control border mb-4 border-gray-200 rounded border-2 border-eggBlue p-2 w-full {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                        rows="4"></textarea>
                    @if ($errors->has('message'))
                    <div class="error">
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                </div>
                <input type="submit" name="send" value="Submit" class="inline-block text-white bg-photoBlue py-2 px-4 rounded-xl uppercase mt-2 hover:bg-gray hover:text-white transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
            </form>
            </x-card>
        </div>
      </div>

</x-layout>