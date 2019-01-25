@extends('front.app')
@section('content')
@include('front.partials.header', ['className' => 'oneHeader'])
<div class="registration">
    <div class="container">
        <div class="row">
            <div class="col-12 socialMobile">
              <div class="row justify-content-center">
                <div class="col-8 text-center">
                  <b>Conecteazate cu</b>
                </div>
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
            <div class="col-12 pad">
                <h3 class="text-center">{{trans('front.ja.signUp')}}</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 col-12 aboutEstel">
                <div class="row">
                    <div class="col-12 face face2">
                        <a href="{{ url($lang->lang.'/login/facebook') }}"><img src="{{asset('fronts/img/icons/facebook.png')}}" alt="">Conecteazate cu facebook</a>
                    </div>
                    <div class="col-12 face face2">
                        <a href="{{ url($lang->lang.'/login/google') }}"><img src="{{asset('fronts/img/icons/chrome.png')}}" alt="">Conecteazate cu chrome</a>
                    </div>
                    {{-- <div class="col-12 face face2">
                        <a href="{{ url($lang->lang.'/login/instagram') }}"><img src="{{asset('fronts/img/icons/insta.png')}}" alt="">Conecteazate cu instagram</a>
                    </div> --}}
                </div>
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
                            <h4>{{trans('front.ja.signUp')}}</h4>
                        </div>
                    </div>
                    <form action="{{ url($lang->lang.'/register') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="prev" value="{{url()->previous()}}">
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
                        @if ($userfield->type != 'checkbox')
                        <div class="form-group">
                            <label for="{{$userfield->field}}">{{trans('front.register.'.$userfield->field)}}<b>*</b></label>
                            <input type="text" class="form-control" name="{{$userfield->field}}" id="{{$userfield->field}}" value="{{ old($userfield->field) }}">
                            @if ($errors->has($userfield->field))
                            <div class="invalid-feedback" style="display: block">
                                {!!$errors->first($userfield->field)!!}

                                @if ($errors->first('email'))
                                    <a href="{{route('password.email')}}?email={{ old('email') }}">Retransmite parola</a>
                                @endif
                            </div>
                            @endif
                        </div>
                        @endif
                        @endforeach
                        @endif
                        <div class="form-group">
                            <label for="pwd">{{trans('front.register.pass')}}<b>*</b></label>
                            <input type="password" class="form-control" name="password" id="pwd" >
                            @if ($errors->has('password'))
                            <div class="invalid-feedback" style="display: block">
                                {!!$errors->first('password')!!}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="confpwd">{{trans('front.register.repeatPass')}}<b>*</b></label>
                            <input type="password" class="form-control" name="passwordRepeat" id="confpwd" >
                            @if ($errors->has('passwordRepeat'))
                            <div class="invalid-feedback" style="display: block">
                                {!!$errors->first('passwordRepeat')!!}
                            </div>
                            @endif
                        </div>
                        @if (count($userfields) > 0)
                        @foreach ($userfields as $key => $userfield)
                        @if ($userfield->type == 'checkbox')
                        <div class="offr">
                            {{trans('front.register.'.$userfield->field.'_question')}}
                        </div>
                        <p>{{trans('front.register.'.$userfield->field.'_p')}}</p>
                        <div class="row">
                            <div class="col-12">
                                <label class="containerCheck">
                                    {!!trans('front.register.'.$userfield->field.'_checkbox')!!}
                                    <input type="checkbox"  name="{{$userfield->field}}">
                                    <span class="checkmarkCheck"></span>
                                    @if ($errors->has($userfield->field))
                                    <div class="invalid-feedback" style="display: block">
                                        {!!$errors->first($userfield->field)!!}
                                    </div>
                                    @endif
                                </label>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12 recaptha">
                                <span class="msg-error error"></span>
                                <div id="recaptcha" class="g-recaptcha " data-sitekey="6Le8034UAAAAAD8zhLNkJZwwrTlOLxMyStDN_J4K"></div>
                                @if ($errors->has('captcha'))
                                <div class="invalid-feedback" style="display: block">
                                    {!!$errors->first('captcha')!!}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center margeTop2">
                    </div>
                    <div class="col-md-5 col-sm-5 col-7">
                        <div class="btnGrey">
                            <input type="submit" value="{{trans('front.ja.signUp')}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('front.partials.footer')
@stop
