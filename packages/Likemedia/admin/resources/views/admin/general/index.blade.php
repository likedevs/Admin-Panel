@extends('admin::admin.app')
@include('admin::admin.nav-bar')
@include('admin::admin.left-menu')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/back') }}">Control Panel</a></li>
        <li class="breadcrumb-item active" aria-current="page">General settings</li>
    </ol>
</nav>
<div class="title-block">
    <h3 class="title"> General settings </h3>
</div>

<div class="list-content">
    <form class="form-reg" role="form" method="POST" action="{{ route('general.updateMenu') }}">
        {{ csrf_field() }}
        <ul>
            <div class="form-group">
                <li>
                    <input type="checkbox" name="changeCategory" {{ $changeMenu ? 'checked' : ''}}>Modificarea structurii meniului
                </li>
            </div>
        </ul>
        <input type="submit" value="Salveaza">
    </form>
</div>
@stop
@section('footer')
<footer>
    @include('admin::admin.footer')
</footer>
@stop
