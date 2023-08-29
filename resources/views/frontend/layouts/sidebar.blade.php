<div class="sidebar">
            
    <div class="widget">
        @foreach ($global_sidebar_top_ad_data as $data)
        <div class="ad-sidebar">
            @if($data->sidebar_ad_url !== null)
                <a href="https://www.{{ $data->sidebar_ad_url }}">
                    <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" alt="" />
                </a>
            @else
                <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" alt="" />
            @endif
        </div> 
        @endforeach 
    </div>

    <div class="widget">
      <div class="tag-heading">
        <h2>Tags</h2>
      </div>
      <div class="tag">
        @php
        $tags = \App\Models\Tag::select('tag_name')->distinct()->get();
        @endphp
        @foreach($tags as $data)
        <div class="tag-item">
          <a href="{{ route('tags', $data->tag_name) }}"><span class="badge bg-secondary">{{ $data->tag_name }}</span></a>
        </div>
        @endforeach
      </div>
    </div>

    <div class="widget">
      <div class="archive-heading">
        <h2>{{ ARCHIVES }}</h2>
      </div>
      <div class="archive">
        @php
          $archive_array = [];
          $posts = \App\Models\Post::orderBy('created_at', 'desc')->get();
          foreach ($posts as $data) {
              $ts = strtotime($data->created_at); 
              $month_number = date('m', $ts);
              $month = date('F', $ts);
              $year = date('Y', $ts);
              $archive_array[] = $month_number.'-'.$month.'-'.$year;
          }
          $archive_array = array_values(array_unique($archive_array));
        @endphp
        <form action="{{ route('archives') }}" method="post">
          @csrf
          <select name="archive_month_year" class="form-select" onChange="this.form.submit()">
            <option value="">{{ SELECT_MONTH }}</option>
            @for($i=0; $i<count($archive_array); $i++)
              @php
                  $tmp_array = explode('-', $archive_array[$i]);
              @endphp
              <option value="{{ $tmp_array[2].'-'.$tmp_array[0] }}">{{ $tmp_array[1] }}, {{ $tmp_array[2] }}</option>
            @endfor
          </select>
        </form>
      </div>
    </div>

    
    <div class="widget">

      @foreach ($global_live_channels as $data)
      <div class="live-channel">
        <div class="live-channel-heading">
          <h2>{{ LIVE_CHANNEL }} - {{ $data->heading }}</h2>
        </div>
        <div class="live-channel-item">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/{{ $data->video_id }}"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
      @endforeach
      
    </div>

    <div class="widget">
      <div class="news">
        <div class="news-heading">
          <h2>{{ RECENT_AND_POPULAR_NEWS }}</h2>
        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ RECENT_NEWS }}</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ POPULAR_NEWS }}</button>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            @foreach ($global_recent_news as $data)
              @if($loop->iteration > 4)
                  @break
              @endif
              <div class="news-item">
                <div class="left">
                  <img src="{{ asset('uploads/post-photos/'.$data->post_photo) }}" alt="" />
                </div>
                <div class="right">
                  <div class="category">
                    <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                  </div>
                  <h2><a href="{{ route('news-detail', $data->id) }}">{{ $data->post_title }}</a></h2>
                  <div class="date-user">
                    <div class="user">
                      @if($data->author_id == 0)
                          @php
                          $author_data = \App\Models\Admin::where('id', $data->admin_id)->first();
                          @endphp
                      @else
                          @php
                          $author_data = \App\Models\Author::where('id', $data->author_id)->first();
                          @endphp
                      @endif
                      <a href="">{{ $author_data->name }}</a>
                    </div>
                    <div class="date">
                      @php
                      $ts = strtotime($data->created_at); 
                      $created_at = date('d F, Y', $ts);    
                      @endphp
                      <a href="">{{ $created_at }}</a>
                      {{-- <a href="">10 Jan, 2022</a> --}}
                    </div>
                  </div>
                </div>
              </div>    
            @endforeach
          </div>

          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @foreach ($global_popular_news as $data)
            @if($loop->iteration > 4)
                @break
            @endif
            <div class="news-item">
              <div class="left">
                <img src="{{ asset('uploads/post-photos/'.$data->post_photo) }}" alt="" />
              </div>
              <div class="right">
                <div class="category">
                  <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                </div>
                <h2><a href="{{ route('news-detail', $data->id) }}">{{ $data->post_title }}</a></h2>
                <div class="date-user">
                  <div class="user">
                    @if($data->author_id == 0)
                        @php
                        $author_data = \App\Models\Admin::where('id', $data->admin_id)->first();
                        @endphp
                    @else
                        @php
                        $author_data = \App\Models\Author::where('id', $data->author_id)->first();
                        @endphp
                    @endif
                    <a href="">{{ $author_data->name }}</a>
                  </div>
                  <div class="date">
                    @php
                    $ts = strtotime($data->created_at); 
                    $created_at = date('d F, Y', $ts);    
                    @endphp
                    <a href="">{{ $created_at }}</a>
                    {{-- <a href="">10 Jan, 2022</a> --}}
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

    <div class="widget">
        @foreach ($global_sidebar_bottom_ad_data as $data)
        <div class="ad-sidebar">
            @if($data->sidebar_ad_url !== null)
                <a href="https://www.{{ $data->sidebar_ad_url }}">
                    <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" alt="" />
                </a>
            @else
                <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" alt="" />
            @endif
        </div> 
        @endforeach
    </div>
    
    <div class="widget">
        <div class="poll-heading">
            <h2>{{ ONLINE_POLL }}</h2>
        </div>

        @foreach ($global_online_polls as $data)
          @if($loop->iteration > 1)
              @break
          @endif
          <div class="poll">
            <div class="question">{{ $data->question }}</div>
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

            @if(session()->get('current_poll_id') == $data->id)
            <div class="poll-result">                        
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <tr>
                          <td>{{ YES_VOTE }} ({{ $data->yes_vote }})</td>
                          <td>
                              <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_vote_percentage }}%" aria-valuenow="{{ $yes_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_vote_percentage }}%</div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>{{ NO_VOTE }} ({{ $data->no_vote }})</td>
                          <td>
                              <div class="progress">
                                  <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_vote_percentage }}%" aria-valuenow="{{ $no_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_vote_percentage }}%</div>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>{{ NO_COMMENT_VOTE }} ({{ $data->no_comment_vote }})</td>
                          <td>
                              <div class="progress">
                                  <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $no_comment_vote_percentage }}%" aria-valuenow="{{ $no_comment_vote_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $no_comment_vote_percentage }}%</div>
                              </div>
                          </td>
                      </tr>
                  </table>
              </div>
              <a href="{{ route('online-polls') }}" class="btn btn-primary old" style="margin-top: 0;">{{ OLD_RESULT }}</a>
            </div>
            @endif

            @if(session()->get('current_poll_id') != $data->id)
            <div class="answer-option">
                <form action="{{ route('online-poll-submit', $data->id) }}" method="post">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_1" value="Yes" checked/>
                        <label class="form-check-label" for="poll_id_1">{{ YES_VOTE }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value="No"/>
                        <label class="form-check-label" for="poll_id_2">{{ NO_VOTE }}</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="poll_id_3" value="No Comment"/>
                        <label class="form-check-label" for="poll_id_3">{{ NO_COMMENT_VOTE }}</label>
                    </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ SUBMIT }}</button>
                        <a href="{{ route('online-polls') }}" class="btn btn-primary old">{{ OLD_RESULT }}</a>
                    </div>
                </form>
            </div>
            @endif

          </div>
        @endforeach
        
    </div>
</div>