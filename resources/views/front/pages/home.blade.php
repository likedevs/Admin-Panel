@extends('front.app')

@section('content')
<div class="wrapp">
@include('front.partials.header', ['className' => 'default'])
<?php
    $pinterest = getContactInfo('pinterest')->translationByLanguage()->first()->value;
    $facebook = getContactInfo('facebook')->translationByLanguage()->first()->value;
    $instagram = getContactInfo('instagram')->translationByLanguage()->first()->value;
    $linkedin = getContactInfo('linkedin')->translationByLanguage()->first()->value;
    $twitter = getContactInfo('twitter')->translationByLanguage()->first()->value;
    $youtube = getContactInfo('youtube')->translationByLanguage()->first()->value;
    $google = getContactInfo('google')->translationByLanguage()->first()->value;
?>
<div class="bannerRet">
    <ul>
        {{-- <li><a href="{{ $linkedin }}"><img src="{{ asset('fronts/img/icons/in.png') }}" alt=""></a></li>
        <li><a href="{{ $google }}"><img src="{{ asset('fronts/img/icons/gmail.png') }}" alt=""></a></li>
        <li><a href="{{ $twitter }}"><img src="{{ asset('fronts/img/icons/twit.png') }}" alt=""></a></li> --}}
        <li><a href="{{ $facebook }}"><img src="{{ asset('fronts/img/icons/face.png') }}" alt=""></a></li>
        {{-- <li><a href="{{ $pinterest }}"><img src="{{ asset('fronts/img/icons/prin.png') }}" alt=""></a></li> --}}
        <li><a href="{{ $instagram }}"><img src="{{ asset('fronts/img/icons/inst.png') }}" alt=""></a></li>
        {{-- <li><a href="{{ $youtube }}"><img src="{{ asset('fronts/img/icons/yout.png') }}" alt=""></a></li> --}}
    </ul>
</div>
<div class="content">
    <div class="row no-gutters">
        <div class="col-6 deliveryDesk">
            <div class="row justify-content-center blockLeft">
                <div class="col-6 bcgNadps">
                    <img src="{{ asset('fronts/img/icons/nadps.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-11 col-md-11 col-sm-12">
                    <div class="row justify-content-center">
                        {{-- <div class="col-lg-5 col-md-6 tag">
                            <div class="btnShoping">
                                <select onchange="javascript:location.href = this.value;">
                                @if (count($langs) > 0)
                                @foreach ($langs as $key => $langItem)
                                <option {{ $langItem->lang == Request::segment(1) ? 'selected' : ''}} value="{{ url('/'.$langItem->lang) }}">{{ $langItem->description }}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-lg-5 col-md-6 tag">
                            <div class="btnShoping">
                                <a href="{{ url('/'.$lang->lang.'/catalog/outlet') }}">{{ trans('front.ja.goToOutlet') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 tag">
                            <div class="btnShoping">
                                <a href="{{ url('/'.$lang->lang.'/collection/'.$firstCollection->alias) }}">{{ trans('front.ja.viewCollections') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="delivery1">
                                <p><strong>{{ Label($page->id, $lang->id, 1) }}</strong></p>
                                <p> {{ Label($page->id, $lang->id, 2) }} </p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="delivery2">
                                <p><strong>{{ Label($page->id, $lang->id, 3) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 4) }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 tag">
                            <div class="delivery2">
                                <p><strong>{{ Label($page->id, $lang->id, 5) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 6) }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 tag">
                            <div class="delivery2">
                                <p><strong>{{ Label($page->id, $lang->id, 7) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 8) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="imgMenu">
                <div class="bannerSlide">
                    @if (count($sets) > 0)
                    @foreach ($sets as $key => $set)
                    @if (!is_null($set->mainPhoto()->first()))
                         <a href="{{ url('/'.$lang->lang.'/collection/'.$set->collection()->first()->alias.'/'.$set->alias) }}">
                             <img src="/images/sets/bg/{{ $set->mainPhoto()->first()->src }}" alt="{{ $set->translation($lang->id)->first()->name }}" title="{{ $set->translation($lang->id)->first()->name }}">
                         </a>
                    @endif
                    @endforeach
                    @endif
                </div>
                <div class="dots"></div>
                <div class="arrows"></div>
                <div class="arrowRet">
                    <div class="bcgRet">
                    </div>
                </div>
                <div class="buttonsMobile">
                    {{-- <div class="btnShoping">
                        <select onchange="javascript:location.href = this.value;">
                        @if (count($langs) > 0)
                        @foreach ($langs as $key => $langItem)
                        <option {{ $langItem->lang == Request::segment(1) ? 'selected' : ''}} value="{{ url('/'.$langItem->lang) }}">{{ $langItem->description }}</option>
                        @endforeach
                        @endif
                        </select>
                    </div> --}}

                    <div class="btnShoping">
                        <a href="{{ url('/'.$lang->lang.'/catalog/outlet') }}">{{ trans('front.ja.goToOutlet') }}</a>
                    </div>
                    <div class="btnShoping">
                        <a href="{{ url('/'.$lang->lang.'/collection/'.$firstCollection->alias) }}">{{ trans('front.ja.viewCollections') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 deliveryMobile">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-12 col-10">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="delivery">
                                <p><strong>{{ Label($page->id, $lang->id, 1) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 2) }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="delivery">
                                <p><strong>{{ Label($page->id, $lang->id, 3) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 4) }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="delivery">
                                <p><strong>{{ Label($page->id, $lang->id, 5) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 6) }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="delivery delivery2">
                                <p><strong>{{ Label($page->id, $lang->id, 7) }}</strong></p>
                                <p>{{ Label($page->id, $lang->id, 8) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal" id="modalPromocode">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Promocode</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>This is your promo.</p>
      </div>
    </div>
  </div>
</div>

@if (session()->has('promocode'))
  <script type="text/javascript">
      $(window).on('load', function() {
          $('#modalPromocode .modal-body p').html('Welcome back {{Auth::guard('persons')->user()->name}}! Add a new product to cart and take {{session('promocode')->discount}}% off');
          $('#modalPromocode').modal();
          @php
            session()->forget('promocode');
          @endphp
      });
  </script>
@endif
@stop
