@extends('user.pages.master')
@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3"> </h6>
            <h1 class="mb-5">Thông Tin Của Bạn</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
               
            </div>
            <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form    action="{{ route('editprofile') }}" method="post">
                    @csrf
                    <input class="form-control valid"  id="name" name="id" value="{{$user->id}}" type="hidden" >
                    <div class="row g-3">
                     
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text"value="{{$user->name}}" name="name" class="form-control" id="name" placeholder="Your Name">
                               
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" value="{{$user->email}}" name="email" class="form-control" id="email" placeholder="Your Email">
                               
                            </div>
                        </div>
                      
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection