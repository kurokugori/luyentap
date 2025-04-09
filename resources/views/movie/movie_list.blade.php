@if(count($movies) > 0)
    <div class="movie-list">
        @foreach($movies as $movie)
            <div class="movie-item">
                <h3>{{ $movie->movie_name_vn }}</h3>
                <p>Đánh giá: {{ $movie->vote_average }}</p>
                <p>Phổ biến: {{ $movie->popularity }}</p>
                <!-- Thêm thông tin phim khác bạn muốn hiển thị -->
            </div>
        @endforeach
    </div>
@else
    <p>Không có phim nào thuộc thể loại này.</p>
@endif