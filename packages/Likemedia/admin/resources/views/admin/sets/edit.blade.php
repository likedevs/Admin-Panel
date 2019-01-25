@extends('admin::admin.app')
@include('admin::admin.nav-bar')
@include('admin::admin.left-menu')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/back') }}">Control Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/back/collections') }}">Collections</a></li>
        <li class="breadcrumb-item"><a href="{{ url('back/sets/collection/'.$set->collection_id) }}">Seturi</a></li>
        <li class="breadcrumb-item active" aria-current="set">Edit set</li>
    </ol>
</nav>
<div class="title-block">
    <h3 class="title"> Editarea setului </h3>
    @include('admin::admin.list-elements', [
    'actions' => [
    trans('variables.add_element') => route('sets.create').'?collection='.Request::get('collection'),
    ]
    ])
</div>

@include('admin::admin.alerts')

<div class="list-content">
    <form class="form-reg" role="form" method="POST" action="{{ route('sets.update', $set->id) }}" id="add-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="tab-area">
            <ul class="nav nav-tabs nav-tabs-bordered">
                @if (!empty($langs))
                @foreach ($langs as $lang)
                <li class="nav-item">
                    <a href="#{{ $lang->lang }}" class="nav-link  {{ $loop->first ? ' open active' : '' }}"
                        data-target="#{{ $lang->lang }}">{{ $lang->lang }}</a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        @if (!empty($langs))
        @foreach ($langs as $lang)
        <div class="tab-content {{ $loop->first ? ' active-content' : '' }}" id={{ $lang->
            lang }}>
            <div class="part left-part">
                <ul>
                    <li>
                        <label for="name-{{ $lang->lang }}">{{trans('variables.title_table')}} [{{ $lang->lang }}]</label>
                        <input type="text" name="title_{{ $lang->lang }}"
                        @foreach($set->translations as $translation)
                        @if($translation->lang_id == $lang->id && !is_null($translation->lang_id))
                        value="{{ $translation->name }}"
                        @endif
                        @endforeach
                        >
                    </li>
                    <li>
                        <label for="description-{{ $lang->lang }}">Description [{{ $lang->lang }}]</label>
                        <textarea name="description_{{ $lang->lang }}" id="description-{{ $lang->lang }}">@foreach($set->translations as $translation) @if($translation->lang_id == $lang->id && !is_null($translation->lang_id)){{ $translation->description }} @endif @endforeach </textarea>
                    </li>
                    <li>
                        <label for="seo_text_{{ $lang->lang }}">{{trans('variables.meta_title_page')}} [{{ $lang->lang }}]</label>
                        <textarea  name="seo_text_{{ $lang->lang }}" id="seo_text-{{ $lang->lang }}"> @foreach($set->translations as $translation) @if($translation->lang_id == $lang->id && !is_null($translation->lang_id)){{ $translation->seo_text }} @endif @endforeach </textarea>
                    </li>
                </ul>
            </div>
            <div class="part right-part">

                <ul>
                    <hr>
                    <h6>Seo Texts</h6>
                    <li>
                        <label for="meta_title_{{ $lang->lang }}">Seo Title [{{ $lang->lang }}]</label>
                        <input type="text" name="seo_title_{{ $lang->lang }}"
                        id="seo_title_{{ $lang->lang }}"
                        @foreach($set->translations as $translation)
                        @if($translation->lang_id == $lang->id && !is_null($translation->lang_id))
                        value="{{ $translation->seo_title }}"
                        @endif
                        @endforeach
                        >
                    </li>
                    <li>
                        <label for="seo_descr_{{ $lang->lang }}">Seo Description [{{ $lang->lang }}]</label>
                        <input type="text" name="seo_descr_{{ $lang->lang }}"
                        id="seo_descr_{{ $lang->lang }}"
                        @foreach($set->translations as $translation)
                        @if($translation->lang_id == $lang->id && !is_null($translation->lang_id))
                        value="{{ $translation->seo_description }}"
                        @endif
                        @endforeach
                        >
                    </li>
                    <li>
                        <label for="seo_keywords_{{ $lang->lang }}">Seo Keywords [{{ $lang->lang }}]</label>
                        <input type="text" name="seo_keywords_{{ $lang->lang }}"
                        id="seo_keywords_{{ $lang->lang }}"
                        @foreach($set->translations as $translation)
                        @if($translation->lang_id == $lang->id && !is_null($translation->lang_id))
                        value="{{ $translation->seo_keywords }}"
                        @endif
                        @endforeach
                        >
                    </li>
                </ul>
                <ul>
                    <hr>
                    <li>
                        @foreach($set->translations as $translation)
                        @if($translation->lang_id == $lang->id && !is_null($translation->lang_id))
                            @if ($translation->image)
                            <img src="{{ asset('images/sets/'. $translation->image ) }}" width="200px">
                            <input type="hidden" name="old_image_{{ $lang->lang }}" value="{{ $translation->image }}"/>
                            @endif
                        @endif
                        @endforeach

                        <label for="img-{{ $lang->lang }}">Image (multilingual) [{{ $lang->lang }}]</label>
                        <input type="file" name="image_{{ $lang->lang }}" id="img-{{ $lang->lang }}"/>
                    </li>
            </div>
        </div>
        @endforeach
        @endif

        <ul class="part full-part">
            <div class="row">
                <div class="col-md-3">
                    <li>
                        <label for="price">Price EUR</label>
                        <input type="number" name="price" id="price" value="{{ $set->price }}"/>
                    </li>
                </div>
                <div class="col-md-3">
                    <li>
                        <label for="price">Price MDL </label>
                        <input type="number" name="price_lei" id="price" value="{{ $set->price_lei }}"/>
                    </li>
                </div>
                <div class="col-md-3">
                    <li>
                        <label for="discount">Discount %</label>
                        <input type="number" name="discount" id="discount" value="{{ $set->discount }}"/>
                    </li>
                </div>
                <div class="col-md-3">
                    <li>
                        <label for="discount">Atribuie la collectie</label>
                        <select name="collection_id">
                            <option value="0">---</option>
                            @if (count($collections) > 0)
                                @foreach ($collections as $key => $collection)
                                    <option value="{{ $collection->id }}" {{ $set->collection_id == $collection->id ? 'selected' : '' }}>{{ $collection->translation($lang->id)->first()->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </li>
                </div>
                <div class="col-md-3">
                    <li><br>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="on_home" {{ $set->on_home ? 'checked' : '' }}>
                                <span>Display on Homepage</span>
                            </label>
                        </div>
                    </li>
                </div>
                <div class="col-md-3">
                    <li><br>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="active" {{ $set->active ? 'checked' : '' }}>
                                <span>Active</span>
                            </label>
                        </div>
                    </li>
                </div>
                <div class="col-md-12"><hr>
                    <h6 class="text-center">Photo/Video Gallery</h6>
                    <div class="col-md-6">
                        <p class="text-center">Photos</p>
                        @if ($set->galleryItems()->get())
                            @foreach ($set->galleryItems()->get() as $key => $item)
                                @if ($item->type == 'photo')
                                    <span class="image-wrapp-full wrapp-full">
                                        <img src="/images/sets/og/{{ $item->src }}" alt="" class="full-width">
                                        <section>
                                            <a href="{{ url('back/sets/delete/gallery-item/'. $item->id) }}" class="close"><i class="fa fa-times-circle"></i> </a>
                                            @if ($item->main != 1)
                                                <a href="{{ url('back/sets/setmain/gallery-item/'. $item->id) }}" class="close"><i class="fa fa-edit"></i> </a>
                                            @endif
                                        </section>
                                    </span>
                                @endif
                            @endforeach
                        @endif
                        <li>
                            <label for="photos">Add photos here</label>
                            <input type="file" name="photos[]" value="" multiple>
                        </li>
                    </div>
                    <div class="col-md-6">
                        <p class="text-center">Videos</p>
                        @if ($set->galleryItems()->get())
                            @foreach ($set->galleryItems()->get() as $key => $item)
                                @if ($item->type == 'video')
                                    <div class="video-wrapp-full wrapp-full">
                                        <section>
                                            <a href="{{ url('back/sets/delete/gallery-item/'. $item->id) }}" class="close"><i class="fa fa-times-circle"></i> </a>
                                        </section>
                                        {!! $item->src !!}
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <li>
                            <label for="video">Add video iframe here</label>
                            <input type="text" name="video" value="">
                        </li>
                    </div>
                </div>
            </div>
            <li><br>
                <input type="submit" value="{{trans('variables.save_it')}}">
            </li>
        </ul>
    </form>
</div>


@stop
@section('footer')
<footer>
    @include('admin::admin.footer')
</footer>
@stop
