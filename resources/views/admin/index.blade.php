@extends('layouts.template-admin')

@section('content')
<center><h1>{{ Session::get('namaSopd') }}</h1></center>
<br>
<div class="gambar-block">
    <img src="assets/images/SKP.png" style="min-width:1000px;max-height:570px;position: relative">
</div>
@endsection
