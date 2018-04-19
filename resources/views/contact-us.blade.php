@extends('layouts.front')

@section('content')
<section id="aa-property-header" style="background-image: url(front/img/contact-us.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-property-header-inner">
          <h2>Contact </h2>
          <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">THEINTERNSHIP</a></li>            
          <li class="active">CONTACT US</li>
        </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="container front-alert">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="col-md-12 alert alert-{{ $msg }}" align="center">{!! Session::get('alert-' . $msg) !!} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
      @endif
    @endforeach
  </div>
</section> 
<!-- End Proerty header  -->



<section id="aa-contact">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
        <div class="aa-contact-area">
          <div class="aa-contact-top">
            <div class="aa-contact-top-left col-sm-12 col-md-6 col-p-0">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1288.7371102510774!2d9.284932130196681!3d4.15279285037883!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061318c199e518d%3A0x3b53fb7f6d5eb7d6!2sA1+Complex!5e0!3m2!1sen!2scm!4v1524154348199" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="aa-contact-top-right col-sm-12 col-md-6">
              <h2>Contact</h2>
              <p>We are a product, powered by tech giant, Afayi. We are located in a room building at ndongo and are happy to receive you every week day from 8am - 4pm. Feel free contact us through any of the means below and we will be happy to help you address any worries. </p>
              <ul class="contact-info-list">
                <li> <a style="color: white;" href="tel:+237675955931"><i class="fa fa-phone"></i> +237 675 955 931 </a></li>
                <li> <i class="fa fa-envelope-o"></i> internshipspace@gmail.com</li>
                <li> <i class="fa fa-map-marker"></i> Afayi, Ndongo, Buea, Cameroon</li>
                <li class=""> 
                  <div align="center">
                    <a cla style="color: white;" href="https://facebook.com/internshipspace"><i class="fa fa-facebook"></i></a>
                    <a style="color: white;" href="https:://twitter.com/internshipspace"><i class="fa fa-twitter"></i></a>
                    {{--
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-whatsapp"></i>
                  --}}
                  </div>
                </li>
              </ul>
            </div>
          </div>
          
          <div class="aa-contact-bottom">
            <div class="aa-title">
              <h2>Send Your Message</h2>
              <span></span>
              <p>Your email address will not be published. Required fields are marked <strong class="required">*</strong></p>
            </div>
            <div class="aa-contact-form">
              <form class="contactform" method="post" action="{{route('submit-contactus')}}">  
              {{ csrf_field() }}                
                <p class="comment-form-author">
                  <label for="author">Name <span class="required">*</span></label>
                  <input type="text" name="author" value="" size="30" required="required">
                </p>
                <p class="comment-form-email">
                  <label for="email">Email <span class="required">*</span></label>
                  <input type="email" name="email" value="" aria-required="true" required="required">
                </p>
                <p class="comment-form-url">
                  <label for="subject">Subject</label>
                  <input type="text" name="subject">  
                </p>
                <p class="comment-form-comment">
                  <label for="comment">Message</label>
                  <textarea name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea>
                </p>                
                <p class="form-submit">
                  <input type="submit" name="submit" class="aa-browse-btn" value="Send Message">
                </p>        
              </form>
            </div>
          </div>
          
        </div>
     </div>
   </div>
 </div>
</section>
<!-- / Properties  -->

@endsection