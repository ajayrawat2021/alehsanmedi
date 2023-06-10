@extends('frontend.includes.main')
 
@section('content')

<section class="login__section mb-5">
    <div class="container [ d-flex gap-5 flex-column ]">
      <div class="login__form__container">
        <div class="left__block">
          <div class="login__form__cover" style="--cover-bg: url('https://images.unsplash.com/reserve/LJIZlzHgQ7WPSh5KVTCB_Typewriter.jpg')">
            <img src="{{asset('frontend/assets/img/top-logo.svg')}}" alt="Logo" class="logo__image" width="75px" />
          </div>
        </div>
        <div class="right__block">
          <form method="POST" action="{{ route('register') }}" class="login__form__block align-items-start gap-4">
            @csrf
            <div class="login__form__content w-100">
              <h1 class="font-gilroy-bold text-primary mb-3">Register</h1>
              <p class="fs-5">Let's get you all set up so you can verify your personal account and begin setting up your profile.</p>
            </div>
            <div class="login__form__block__input w-100">
              <label for="fullname" class="form-label login__form__block__label fs-5">
                Full Name
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form-control form-control-lg" name="name" id="fullname" placeholder="Enter Full Name" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="email" class="form-label login__form__block__label fs-5">
                Email
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Enter email id" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="Password" class="form-label login__form__block__label fs-5">
                Password
                <i class="fa-solid fa-star-of-life"></i>
              </label> 
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-envelope"></i>
                <input type="password" class="form-control form-control-lg"  name="password"  id="email" placeholder="Enter email id" />
              </div>
            </div>
            <div class="login__form__block__input w-100">
              <label for="Password" class="form-label login__form__block__label fs-5">
                password confirmation
                <i class="fa-solid fa-star-of-life"></i>
              </label> 
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-envelope"></i>
                <input type="password" class="form-control form-control-lg"  name="password_confirmation"  id="email" placeholder="Enter email id" />
              </div>
            </div>
            {{-- <div class="login__form__block__input w-100">
              <label for="phone" class="form-label login__form__block__label fs-5">
                Phone
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-phone"></i>
                <input type="number" class="form-control form-control-lg" id="phone" placeholder="Enter phone" />
              </div>
            </div> --}}
            {{-- <div class="login__form__block__input w-100">
              <label for="designation" class="form-label login__form__block__label fs-5">
                Designation/Profile
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-id-card-clip"></i>
                <input type="text" class="form-control form-control-lg" id="designation" placeholder="Enter designation/profile">
              </div>
            </div> --}}
            {{-- <div class="login__form__block__input w-100">
              <label for="designation" class="form-label login__form__block__label fs-5">
                Designation/Profile
                <i class="fa-solid fa-star-of-life"></i>
              </label>
              <div class="login__form__block__input__box">
                <i class="fa-solid fa-map-marker-alt"></i>
                <textarea name="address" id="address" class="form-control" cols="10" rows="4" placeholder="Enter full address"></textarea>
              </div>
            </div> --}}
            <button type="submit" class="btn btn-lg btn-secondary d-inline-flex gap-x-3 align-items-center">
              Process to create account
              <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </button>
            <div class="w-100 mt-2">
              <hr class="mt-0" />
              <div class="d-flex gap-3 mt-4">
                Already have an account?
                <a href="./login.php" class="link-primary">Sign In</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
   

  <section class="post-section py-md-5">
  <div class="container">
    <div class="section-heading [ d-flex align-items-center ]">
      <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
        <span class="white-space-nowrap">Most Popular Articals</span>
      </h2>
      <a href="javasript:;" class="white-space-nowrap [ btn btn-light border hover-dark ]">
        View All 
        <i class="fa-solid fa-long-arrow-right"></i>
      </a>
    </div>
    <div class="row g-5">        
      <div class="col-12 col-lg-12 col-xl-3">
        <div class="ad__cont vertical">
          <a href="javascript:void(0)">
            <i class="fa-solid fa-ad"></i>
            <picture>
              <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg">
              <source media="(max-width:465px)" srcset="img_white_flower.jpg"> -->
              <img src="{{asset('frontend/assets/img/ad.jpg')}}" alt="Ad Image">
            </picture>
          </a>
        </div>
      </div>
      <div class="col-12 col-lg-12 col-xl-9">
        <div class="row g-5">
          <div class="col-12 col-lg-7">
            <div class="row g-5 mobile__scroll">
              <div class="col-12">
                <div class="small-cards-container">
                  <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                    <a href="javascript:void(0)">
                      <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                    </a>
                    <div class="post-auth-date [ d-flex ]">
                      <ul class="d-flex">
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-user"></i>
                            Author Name
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-calendar"></i>
                            Jan 20, 2022
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="post-image">
                    <div class="post-tags [ d-flex gap-2 ]">
                      <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                    </div>
                    <a href="javascript:void(0)">
                      <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="small-cards-container">
                  <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                    <a href="javascript:void(0)">
                      <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                    </a>
                    <div class="post-auth-date [ d-flex ]">
                      <ul class="d-flex">
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-user"></i>
                            Author Name
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-calendar"></i>
                            Jan 20, 2022
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="post-image">
                    <div class="post-tags [ d-flex gap-2 ]">
                      <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                    </div>
                    <a href="javascript:void(0)">
                      <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="small-cards-container">
                  <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                    <a href="javascript:void(0)">
                      <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                    </a>
                    <div class="post-auth-date [ d-flex ]">
                      <ul class="d-flex">
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-user"></i>
                            Author Name
                          </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                            <i class="fa-solid fa-calendar"></i>
                            Jan 20, 2022
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="post-image">
                    <div class="post-tags [ d-flex gap-2 ]">
                      <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                    </div>
                    <a href="javascript:void(0)">
                      <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-5">
            <div class="medium-cards-container">
              <div class="post-image">
                <a href="javascript:void(0)">
                  <img src="{{asset('frontend/assets/img/shot-by.jpg')}}" alt="Image" />
                </a>
              </div>
              <div class="post-content hindi [ d-flex flex-column justify-content-between ]">
                <div class="post-auth-date [ d-flex ]">
                  <ul class="d-flex">
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-user"></i>
                        Author Name
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-calendar"></i>
                        Jan 20, 2022
                      </a>
                    </li>
                  </ul>
                </div>
                <div>
                  <div class="post-tags mb-md-4 mb-4">
                    <a href="javascript:;" class="btn btn-primary tag">Fiqh-o-Hadeth</a>
                  </div>
                  <a href="javascript:void(0)">
                    <h3 class="m-0 post-heading">
                      न्याय के बिना समाज में अमन व शाँति कायम नहीं हो सकती । उबैदुल्लाह खान आज़मी
                    </h3>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row g-5 mobile__scroll">
          <div class="col-12 col-lg-6">
            <div class="small-cards-container">
              <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                <a href="javascript:void(0)">
                  <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                </a>
                <div class="post-auth-date [ d-flex ]">
                  <ul class="d-flex">
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-user"></i>
                        Author Name
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-calendar"></i>
                        Jan 20, 2022
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="post-image">
                <div class="post-tags [ d-flex gap-2 ]">
                  <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                </div>
                <a href="javascript:void(0)">
                  <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                </a>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="small-cards-container">
              <div class="post-content hindi [ d-flex justify-content-between flex-column  ]">
                <a href="javascript:void(0)">
                  <h4>मशाइखे चिश्त ने हमेशा हिन्दुस्तानी मिज़ाज की रियायत की है</h4>
                </a>
                <div class="post-auth-date [ d-flex ]">
                  <ul class="d-flex">
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-user"></i>
                        Author Name
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <i class="fa-solid fa-calendar"></i>
                        Jan 20, 2022
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="post-image">
                <div class="post-tags [ d-flex gap-2 ]">
                  <a href="javasript:;" class="btn btn-primary btn-sm">Fiqh-o-Hadeeth</a>
                </div>
                <a href="javascript:void(0)">
                  <img src="{{asset('frontend/assets/img/slide-1.png')}}" alt="">
                </a>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</section>


@endsection