<x-layout>


    <div class="">
        <h1 class="text-xl">Support</h1>
        <p>Write your message to us and we will reach you within 1-2 business days</p>
    </div>
    
    <form action="" method="post" action="{{ route('contact.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
            <!-- Error -->
            @if ($errors->has('name'))
            <div class="error">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
            @if ($errors->has('email'))
            <div class="error">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone">
            @if ($errors->has('phone'))
            <div class="error">
                {{ $errors->first('phone') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                id="subject">
            @if ($errors->has('subject'))
            <div class="error">
                {{ $errors->first('subject') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                rows="4"></textarea>
            @if ($errors->has('message'))
            <div class="error">
                {{ $errors->first('message') }}
            </div>
            @endif
        </div>
        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
</x-layout>