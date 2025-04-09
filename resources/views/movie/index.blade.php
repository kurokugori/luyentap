<x-movie-layout>
    <x-slot name='title'>
        Movie
    </x-slot>

 <div class='list-movie'>
  @foreach($data as $row)
    <div class='movie'>
    <a href="{{url('details/'.$row->id)}}">
    <img src="{{ $row->image_link }}" width="200px" height="200px"><br>

        <b>{{$row->movie_name}}</b><br/>
        <i>{{ date_format(date_create($row->release_date), 'Y-m-d') }}</i>
      
    </div>
  @endforeach
 </div>
</x-movie-layout>
<div class='list-movie row'> 
        @forelse($data as $row)
            
            <div class='movie col-lg-3 col-md-4 col-sm-6 mb-4'>
                <div class="card h-100"> 
                    <a href="{{ url('details/'.$row->id) }}">
                        <img src="{{ $row->image_link ?? asset('path/to/default-image.jpg') }}" class="card-img-top" alt="{{ $row->movie_name }}" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title flex-grow-1">
                             <a href="{{ url('details/'.$row->id) }}" class="text-dark text-decoration-none">
                                <b>{{$row->movie_name }}</b>
                            </a>
                        </h5>
                        <p class="card-text"><small class="text-muted">{{ $row->release_date}}</small></p>
                    </div>
                </div>
            </div>
        @empty
            {{-- Hiển thị thông báo nếu không có phim --}}
            <div class="col-12">
                <p>Không tìm thấy phim nào.</p>
            </div>
        @endforelse
 