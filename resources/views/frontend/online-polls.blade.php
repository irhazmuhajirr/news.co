@extends('frontend.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Poll Results</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Poll Results</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach ($online_polls as $data)
                @if($loop->iteration == 1)
                    @continue
                @endif
                <div class="poll-item">
                    <div class="question">
                        {{ $data->question }}
                    </div>
                    <div class="poll-date">
                        @php
                        $ts = strtotime($data->created_at); 
                        $created_date = date('d M, Y', $ts);    
                        @endphp
                        <b>Poll Date:</b> {{ $created_date }}
                    </div>
                    <div class="total-vote">
                        @php
                        $total_vote = $data->yes_vote + $data->no_vote + $data->no_comment_vote;
                        if($data->yes_vote == 0) {
                            $yes_vote_percentage = 0;
                        } else {
                            $yes_vote_percentage = round($data->yes_vote/$total_vote*100);
                        }
                        if($data->no_vote == 0) {
                            $no_vote_percentage = 0;
                        } else {
                            $no_vote_percentage = round($data->no_vote/$total_vote*100);
                        }
                        if($data->no_comment_vote == 0) {
                            $no_comment_vote_percentage = 0;
                        } else {
                            $no_comment_vote_percentage = round($data->no_comment_vote/$total_vote*100);
                        }
                        @endphp
                        <b>Total Votes:</b> {{ $total_vote }}
                    </div>
                    <div class="poll-result">                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Yes ({{ $data->yes_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_vote_percentage }}%" aria-valuenow="{{ $yes_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No ({{ $data->no_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_vote_percentage }}%" aria-valuenow="{{ $no_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Comment ({{ $data->no_comment_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_comment_vote_percentage }}%" aria-valuenow="{{ $no_comment_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_comment_vote_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection