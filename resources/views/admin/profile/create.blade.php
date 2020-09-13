{{-- layouts/profile.blade.phpを読みこむ --}}
@extends('layouts.admin')

{{-- profile.blade.phpのyield('tyrle')に'プロフィールの作成画面'を埋め込む --}}
@section('tytle', 'プロフィールの作成画面')

{{-- profile.blade.phpの@yield('content')に以下のタグをを埋め込む --}}
@section('content')
    <div class="contaier">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成画面</h2>
                <form action="{{action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
            <div class="form-group row">
                <label class="col-md-2">氏名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                 </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">性別</label>
                <div class="col-md-10">
                    @if ( old('gender') == 'male' )
                    <input type="radio" class="radio" name="gender" value="male" checked="checked">男性
                    <input type="radio" class="radio" name="gender" value="female">女性
                    @elseif ( old('gender') == 'female')
                    <input type="radio" class="radio" name="gender" value="male">男性
                    <input type="radio" class="radio" name="gender" value="female" checked="checked">女性
                    @else
                    <input type="radio" class="radio" name="gender" value="male">男性
                    <input type="radio" class="radio" name="gender" value="female">女性
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">趣味</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="hobby" rows="20">{{ old('hobby') }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2">自己紹介欄</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
             </div>
        </div>
    </div> 
@endsection