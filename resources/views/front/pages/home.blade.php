@extends('front.app')

@section('content')
<div class="wrapp">
@include('front.partials.header', ['className' => 'default'])

<?php
    $phone = !is_null(getContactInfo('phone')->translation($lang->id)) ? getContactInfo('phone')->translation($lang->id)->value : '';
    $email = !is_null(getContactInfo('emailfront')->translation($lang->id)) ?  getContactInfo('emailfront')->translation($lang->id)->value : '';
    $viber = !is_null(getContactInfo('viber')->translation($lang->id)) ? getContactInfo('viber')->translation($lang->id)->value : '';
    $pinterest = !is_null(getContactInfo('pinterest')->translation($lang->id)) ? getContactInfo('pinterest')->translation($lang->id)->value : '';
    $facebook = !is_null(getContactInfo('facebook')->translation($lang->id)) ?  getContactInfo('facebook')->translation($lang->id)->value : '';
    $instagram = !is_null(getContactInfo('instagram')->translation($lang->id)) ?  getContactInfo('instagram')->translation($lang->id)->value : '';
    $linkedin = !is_null(getContactInfo('linkedin')->translation($lang->id)) ?  getContactInfo('linkedin')->translation($lang->id)->value : '';
    $twitter = !is_null(getContactInfo('twitter')->translation($lang->id)) ? getContactInfo('twitter')->translation($lang->id)->value : '';
    $youtube = !is_null(getContactInfo('youtube')->translation($lang->id)) ?  getContactInfo('youtube')->translation($lang->id)->value : '';
    $google = !is_null(getContactInfo('google')->translation($lang->id)) ? getContactInfo('google')->translation($lang->id)->value : '';
    $footerText = !is_null(getContactInfo('footertext')->translation($lang->id)) ? getContactInfo('footertext')->translation($lang->id)->value : '';
?>
    <div class="bannerRet">
        <li><a href="{{ $facebook }}"><img src="{{ asset('fronts/img/icons/face.png') }}" alt=""></a></li>
        <li><a href="{{ $instagram }}"><img src="{{ asset('fronts/img/icons/inst.png') }}" alt=""></a></li>
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
                        @if (!is_null($firstCollection))
                            <div class="col-lg-5 col-md-6 tag">
                                <div class="btnShoping">
                                    <a href="{{ url('/'.$lang->lang.'/collection/'.$firstCollection->alias) }}">{{ trans('front.ja.viewCollections') }}</a>
                                </div>
                            </div>
                        @endif
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
                    @if (!is_null($firstCollection))
                        <div class="btnShoping">
                            <a href="{{ url('/'.$lang->lang.'/collection/'.$firstCollection->alias) }}">{{ trans('front.ja.viewCollections') }}</a>
                        </div>
                    @endif
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
