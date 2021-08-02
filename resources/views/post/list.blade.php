
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                
                <div class="card-header">
                    {{ __('Tin moi nhat') }}
                </div>
                <div class="card-header">
                    <form action="{{ url('post/filter') }}" method="post" class="form">
                        @csrf
                        <label for="filter">{{ __('Filter') }}</label>
                        <div>
                            <select name="province_id" id="">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}"
                                        {{ old('province_id') == $province->id 
                                            ? "selected"
                                            : ""
                                        }}
                                        >
                                        {{ $province->name }}
                                    </option>    
                                @endforeach
                                
                            </select>
                            <select name="category_id" id="categories">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id 
                                            ? "selected"
                                            : ""
                                        }}
                                        >
                                        {{ $category->name }}
                                    </option>    
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="mt-4">{{ __('Loc') }}</button>
                        </div>
                    </form>
                </div>
               
                @foreach ($posts as $post)
                
                    @if($post->is_vip && !$post->is_block)
                        <div class="card-body">
                            <a href="#" style="font-weight: bold">{{ $post->title }}</a>
                            <label style="color:red">VIP</label>
                            <br />
                            {{ $post->content }}
                        </div>
                    @endif
               
                @endforeach
                @foreach ($posts as $post)
               
                    @if(!$post->is_vip && !$post->is_block)
                    <div class="card-body">
                        <a href="#" style="font-weight: bold">{{ $post->title }}</a>

                        <br />
                        {{ $post->content }}
                    </div>
                    @endif
                
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection