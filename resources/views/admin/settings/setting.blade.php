@extends('admin.layouts.app')

@section('title', 'Admin - Home Settings')
@section('heading', 'Home Settings')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-setting-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                        Home Ticker
                                    </a>
                                    <a class="nav-link" id="v-2-tab" data-toggle="pill" href="#v-2" role="tab" aria-controls="v-2" aria-selected="false">
                                        Logo and Favicon
                                    </a>
                                    <a class="nav-link" id="v-3-tab" data-toggle="pill" href="#v-3" role="tab" aria-controls="v-3" aria-selected="false">
                                        Theme Color
                                    </a>
                                    <a class="nav-link" id="v-4-tab" data-toggle="pill" href="#v-4" role="tab" aria-controls="v-4" aria-selected="false">
                                        Google Analytics
                                    </a>
                                    <a class="nav-link" id="v-5-tab" data-toggle="pill" href="#v-5" role="tab" aria-controls="v-5" aria-selected="false">
                                        Disqus
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!-- News Ticker -->
                                    <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                        <div class="form-group mb-3">
                                            <label>Total of tickers *</label>
                                            <input type="text" class="form-control" name="news_ticker_total" value="{{ $setting_data->news_ticker_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Ticker status</label>
                                            <select name="news_ticker_status" class="form-control">
                                                <option value="Show" @if($setting_data->news_ticker_status == "Show") selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->news_ticker_status == "Hide") selected @endif>Hide</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Total of videos *</label>
                                            <input type="text" class="form-control" name="video_total" value="{{ $setting_data->video_total }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Video status</label>
                                            <select name="video_status" class="form-control">
                                                <option value="Show" @if($setting_data->video_status == "Show") selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->video_status == "Hide") selected @endif>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- News Ticker -->
                                    <!-- Logo & Favicon -->
                                    <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                        <div class="form-group mb-3">
                                            <label>Existing Logo</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="" style="width: 300px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Logo</label>
                                            <div>
                                                <input type="file" name="logo">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Existing Favicon</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->favicon) }}" alt="" style="width: 50px;">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Change Favicon</label>
                                            <div>
                                                <input type="file" name="favicon">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Logo & Favicon -->
                                    <!-- Theme Color -->
                                    <div class="pt_0 tab-pane fade" id="v-3" role="tabpanel" aria-labelledby="v-3-tab">
                                        <div class="form-group mb-3">
                                            <label>Base Color</label>
                                            <input type="text" name="theme_color_1" class="form-control jscolor" 
                                                value="{{ $setting_data->theme_color_1 }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Accent Color</label>
                                            <input type="text" name="theme_color_2" class="form-control jscolor" 
                                                value="{{ $setting_data->theme_color_2 }}">
                                        </div>
                                    </div>
                                    <!-- Theme Color -->
                                    <!-- Google Analytics -->
                                    <div class="pt_0 tab-pane fade" id="v-4" role="tabpanel" aria-labelledby="v-4-tab">
                                        <div class="form-group mb-3">
                                            <label>Analytic ID</label>
                                            <input type="text" name="analytic_id" class="form-control" 
                                                value="{{ $setting_data->analytic_id }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Analytic Status</label>
                                            <select name="analytic_status" class="form-control">
                                                <option value="Show" @if($setting_data->analytic_status == "Show") selected @endif>Show</option>
                                                <option value="Hide" @if($setting_data->analytic_status == "Hide") selected @endif>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Google Analytics -->
                                    <!-- Disqus Start-->
                                    <div class="pt_0 tab-pane fade" id="v-5" role="tabpanel" aria-labelledby="v-5-tab">
                                        <div class="form-group mb-3">
                                            <label>Disqus Code</label>
                                            <input type="text" name="disqus_code" class="form-control" placeholder="https://sitename.com"
                                                value="{{ $setting_data->disqus_code }}">
                                        </div>
                                    </div>
                                    <!-- Disqus End -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt_30">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection