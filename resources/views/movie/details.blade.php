<x-movie-layout :genres="$genres ?? []">
    <x-slot name='title'>
		Chi tiết phim
    </x-slot>

    <h4>{{ $data->movie_name_vn ?? $data->movie_name }} {{ $data->original_name ? '- ' . $data->original_name : '' }}</h4>

    <div class='movie-info row mb-3'> 
        <div class="col-md-4">
            <img src="{{ $data->image_link }}" 
                 alt="{{ $data->movie_name_vn ?? $data->movie_name }}"
                 class="img-fluid rounded" 
                 style="max-height: 450px; object-fit: cover;"
                 >
        </div>

        <div class="col-md-8">
				Ngày phát hành: <b>{{ date('d/m/Y', strtotime($data->release_date)) }}</b><br>
				Quốc gia: <b>{{ $data->country_name }}</b><br>
				Thời gian: <b>{{ $data->runtime . ' phút' }}</b><br>
				Doanh thu: <b>{{ number_format($data->revenue)  }}</b><br>
				{{--Thể loại: <b>{{ $movieGenres }}</b><br>--}}

            {{-- Nút xem trailer (chỉ hiển thị nếu có link trailer) --}}
            @if($data->trailer)
                <a href="{{ $data->trailer }}" target="_blank" class="btn btn-success mt-2">
                    <i class="fas fa-play"></i> Xem trailer
                </a>
            @endif
        </div>
    </div>

    {{-- Phần mô tả phim --}}
    <div class='row mt-3'> {{-- Thêm margin top --}}
        <div class='col-sm-12'>
            <b>Mô tả:</b><br>
            {{-- Hiển thị overview_vn hoặc tagline_vn --}}
            {!! nl2br(e($data->overview_vn )) !!}
        </div>
    </div>

</x-movie-layout>