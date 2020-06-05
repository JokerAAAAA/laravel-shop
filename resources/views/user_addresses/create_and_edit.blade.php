@extends('layouts.app')
@section('title', '新增收货地址')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        新增收货地址
                    </h2>
                </div>
                <div class="card-body">
                    <!-- inline-template 代表通过内联方式引入组件 -->
                    <user-addresses-create-and-edit inline-template>
                        <form class="form-horizontal" role="form" action="{{ route('user_addresses.store') }}" method="post">
                            <!-- 引入 csrf token 字段 -->
                            {{ csrf_field() }}
                            <!-- 注意这里多了 @change -->
                            <select-district @change="onDistrictChanged" inline-template>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-2 text-md-right">省市区</label>
                                    <div class="col-sm-3">
                                        <select class="form-control @error('province') is-invalid @enderror" v-model="provinceId">
                                            <option value="">选择省</option>
                                            <option v-for="(name, id) in provinces" :value="id">@{{ name }}</option>
                                        </select>
                                        @error('province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control @error('city') is-invalid @enderror" v-model="cityId">
                                            <option value="">选择市</option>
                                            <option v-for="(name, id) in cities" :value="id">@{{ name }}</option>
                                        </select>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control @error('district') is-invalid @enderror" v-model="districtId">
                                            <option value="">选择区</option>
                                            <option v-for="(name, id) in districts" :value="id">@{{ name }}</option>
                                        </select>
                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </select-district>
                            <!-- 插入了 3 个隐藏的字段 -->
                            <!-- 通过 v-model 与 user-addresses-create-and-edit 组件里的值关联起来 -->
                            <!-- 当组件中的值变化时，这里的值也会跟着变 -->
                            <input type="hidden" name="province" v-model="province">
                            <input type="hidden" name="city" v-model="city">
                            <input type="hidden" name="district" v-model="district">
                            <div class="form-group row">
                                <label for="address" class="col-form-label text-md-right col-sm-2">详细地址</label>
                                <div class="col-sm-9">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $address->address) }}">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip" class="col-form-label text-md-right col-sm-2">邮编</label>
                                <div class="col-sm-9">
                                    <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip', $address->zip) }}">

                                    @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_name" class="col-form-label text-md-right col-sm-2">姓名</label>
                                <div class="col-sm-9">
                                    <input id="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name" value="{{ old('contact_name', $address->contact_name) }}">

                                    @error('contact_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact_phone" class="col-form-label text-md-right col-sm-2">电话</label>
                                <div class="col-sm-9">
                                    <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone', $address->contact_phone) }}">
                                    @error('contact_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </div>
                        </form>
                    </user-addresses-create-and-edit>
                </div>
            </div>
        </div>
    </div>
@endsection
