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

 