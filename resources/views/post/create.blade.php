@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                
                <div class="card-header">
                    {{ __('Dang Tin Moi') }}
                </div>
                @if (session('success'))
                    <div class="card-body">
                        
                        <div class="alert alert-success">
                            {{ __('Created') }}
                        </div>
                    
                </div>
               @endif
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="post" class="form">
                        @csrf
                        <div>
                            <label for="title">{{ __('Tieu De') }}</label>
                            <br />
                            <input type="text" name="title" value="{{ old('title') }}"/>
                            
                        </div>
        
                        <div>
                            <label for="content">{{ __('Noi Dung') }}</label>
                            <br />
                            <textarea name="content" id="content" rows="10">{{ old('content') }}</textarea>
                        </div>
                        <div>
                            <label for="">{{ __('Chuyen Muc') }}</label>
                            <br />
                            <select name="categories []" id="categories" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>    
                                @endforeach
                            </select>
                        
                        </div>
                        <div>
                            <label for="province">{{ __('Tinh/ TP') }}</label>
                            <br />
                            <select name="province_id" id="">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">
                                        {{ $province->name }}
                                    </option>    
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="district">{{ __('Quan/ Huyen') }}</label>
                            <br />
                            <select name="district_id" id="">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">
                                        {{ $district->name }}
                                    </option>    
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="ward">{{ __('Xa/ Phuong') }}</label>
                            <br />
                            <select name="ward_id" id="">
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">
                                        {{ $ward->name }}
                                    </option>    
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="ex_date">{{ __('Ngay Het Han') }}</label>
                            <br />
                            <input type="datetime-local" name="ex_date">
                        </div>
                        <div>
                            <label for="vip">{{ __('Loai Tin') }}</label>
                            <br />
                            <select name="is_vip" id="">
                                <option value="0">Thuong</option>
                                <option value="1">Vip</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="mt-4">{{ __('Dang') }}</button>
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection