@extends('front.app')
@section('content')
@include('front.partials.header', ['className' => 'oneHeader'])
<div class="registration">
  <div class="container">
    <div class="row">
      <div class="col-12 socialMobile">
        <div class="row justify-content-center">
          <div class="col-10 face face2 text-center">
              <a href="{{ url($lang->lang.'/login/facebook') }}"><img src="{{asset('fronts/img/icons/facebook.png')}}" alt="">Conecteazate cu facebook</a>
          </div>
          <div class="col-10 face face2 text-center">
              <a href="{{ url($lang->lang.'/login/google') }}"><img src="{{asset('fronts/img/icons/chrome.png')}}" alt="">Conecteazate cu chrome</a>
          </div>
          {{-- <div class="col-10 face face2 text-center">
              <a href="{{ url($lang->lang.'/login/instagram') }}"><img src="{{asset('fronts/img/icons/insta.png')}}" alt="">Conecteazate cu instagram</a>
          </div> --}}
        </div>
      </div>
        <div class="col-lg-4 col-md-6 col-sm-8 col-12 aboutEstel">
            <h4>{{trans('front.ja.about')}} Julia Alert</h4>
            <ul>
                <li><a href="{{url($lang->lang.'/about')}}">{{trans('front.ja.aboutUs')}}</a></li>
                <li><a href="{{url($lang->lang.'/condition')}}">{{trans('front.ja.conditions')}}</a></li>
                <li><a href="{{url($lang->lang.'/cookie')}}">{{trans('front.ja.cookie')}}</a></li>
                <li><a href="{{url($lang->lang.'/privacy')}}">{{trans('front.ja.privacy')}}</a></li>
            </ul>
        </div>
      <div class="col-lg-6 col-sm-8 col-12 regBoxBorder">
        <div class="regBox">
          <div class="row">
            <div class="col-12">
              <h4><strong>{{trans('front.ja.signIn')}}</strong></h4>
            </div>
          </div>
          <div class="row" style="margin-bottom: 10px;">
            <div class="col-12">
              {{trans('front.ja.dontHaveAccount')}} <a href="{{url($lang->lang.'/register')}}"> {{trans('front.ja.signUp')}}</a>
            </div>
          </div>
          <form action="{{ url($lang->lang.'/login') }}" method="post">
            {{ csrf_field() }}

            @if ($errors->has('authErr'))
                <div class="row">
                   <div class="col-12">
                      <div class="errorPassword">
                          <p><strong>{{trans('front.ja.errorWas')}}</strong></p>
                         <p>{!!$errors->first('authErr')!!}</p>
                      </div>
                   </div>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="row">
                   <div class="col-12">
                      <div class="errorPassword">
                         <p>{{ Session::get('success') }}</p>
                      </div>
                   </div>
                </div>
            @endif

            @if (count($userfields) > 0)
                @foreach ($userfields as $key => $userfield)
                    <div class="form-group">
                      <label for="{{$userfield->field}}">{{trans('front.register.'.$userfield->field)}}</label>
                      <input type="text" class="form-control" name="{{$userfield->field}}" id="{{$userfield->field}}" value="{{ old($userfield->field) }}">
                      @if ($errors->has($userfield->field))
                         <div class="invalid-feedback" style="display: block">
                           {!!$errors->first($userfield->field)!!}
                         </div>
                      @endif
                    </div>
                @endforeach
            @endif

            <div class="form-group">
              <label for="pwdLog" style="float:left;">{{trans('front.login.pass')}}</label><span class="pwdForg"><a href="{{route('password.email')}}">{{trans('front.login.forgotPass')}}</a></span>
              <input type="password" class="form-control" name="password" id="pwdLog">
              @if ($errors->has('password'))
                 <div class="invalid-feedback" style="display: block">
                   {!!$errors->first('password')!!}
                 </div>
              @endif
            </div>
            <div class="row justify-content-center">
              <div class="col-md-4 col-sm-5 col-10">
                <div class="btnGrey">
                  <input type="submit" value="{{trans('front.ja.signIn')}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 col-10 face">
                <a href="{{url($lang->lang.'/login/facebook')}}"><img src="{{asset('fronts/img/icons/facebook.png')}}" alt="">{{trans('front.ja.enterWith')}} facebook</a>
              </div>
              <div class="col-md-7 col-10 face">
                  <a href="{{url($lang->lang.'/login/google')}}"><img src="{{asset('fronts/img/icons/chrome.png')}}" alt="">{{trans('front.ja.enterWith')}} gmail</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('front.partials.footer')
@stop
