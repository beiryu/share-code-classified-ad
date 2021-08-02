@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-header">
                    

                    {{ __('Thong Tin') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" class="form">
                        @csrf
                        <div>
                            <label for="name">{{ __('Name') }}</label>
                            <br />
                            <input type="text" name="name" value="{{ $user->name ?? "" }}"/>
                        </div>
                        <div>
                            <label for="email">{{ __('Email') }}</label>
                            <br />
                            <input type="text" name="email" value="{{ $user->email ?? ""}}"/>
                        </div>
                        <div>
                            <label for="number">{{ __('Number') }}</label>
                            <br />
                            <input type="text" name="number" value="{{ $user->number ?? ""}}"/>
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
                    {{ __('Tin Dang Cua Toi') }}
                    
                </div>
                @foreach ($posts as $post)
                <div class="card-body">
                    <a href="#" style="font-weight: bold">{{ $post->title }}</a>
                    
                    @if ($post->is_vip)
                        <label style="color:red">VIP</label>
                    @endif
                    @if ($post->is_block)
                        <label style="color:rgb(161, 0, 0)">Bai viet tam thoi bi khoa</label>
                    @endif
                    <br />
                    {{ $post->content }}    
                </div>
                @endforeach
            
                
            </div>
        </div>
    </div>
</div>
@endsection