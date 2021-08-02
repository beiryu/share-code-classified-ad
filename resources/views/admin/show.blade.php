@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-header">
                    {{ __('Thong Tin') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" class="form">
                        @csrf
                        <div>
                            <label for="name">{{ __('Name') }}</label>
                            <br />
                            <input type="text" name="name" value="{{ $admin->name ?? "" }}"/>
                        </div>
                        <div>
                            <label for="email">{{ __('Email') }}</label>
                            <br />
                            <input type="text" name="email" value="{{ $admin->email ?? ""}}"/>
                        </div>
                        <div>
                            <label for="number">{{ __('Number') }}</label>
                            <br />
                            <input type="text" name="number" value="{{ $admin->number ?? ""}}"/>
                        </div>
                        <div>
                            <button type="submit">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
                @if (session('success'))
                <div class="card-body">
                    <div class="alert alert-success">
                        {{ __('Updated') }}
                    </div>
                </div>
                @endif

                <div class="card-header">
                    {{ __('Quan Ly Bai Viet')}}
                </div>
                               
                @foreach ($posts as $post)
                    <div class="card-body">
                        <form action="{{route('post.destroy', ['post' => $post->id])}}" method="post" class="form">
                            @csrf
                            @method('DELETE')     
                            <a href="#" style="font-weight: bold">{{ $post->title }}</a>
                            @if ($post->is_vip)
                                <label style="color:red">VIP</label>
                            @endif
                            <br />
                            {{ $post->content }}    
                            <button type="submit">Xoa</button>
                        </form>
                    </div>
                @endforeach
                <div class="card-header">
                    {{ __('Quan Ly User')}}
                </div>
                @foreach ($users as $user)
                    <div class="card-body">
                        <form action="{{ route('user.edit', [$user->id]) }}" class="form">
                            @csrf
                            <label style="font-weight: bold">Name: {{ $user->name }}</label>
                            <br>
                            Email: {{ $user->email }}
                            <button type="submit">{{ ($user->is_block) ? "Mo Khoa Bai Viet" : "Khoa Bai Viet" }}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection