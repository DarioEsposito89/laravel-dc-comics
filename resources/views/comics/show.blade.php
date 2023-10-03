@extends('layout.main')

@section('main-content')
<div class="bg-blu"></div>
<div id="show" class="container bg-white">
    
    <div class="row mt">
        <img class="image-position img-fluid" src="{{$comic['thumb']}}" alt="">
        <h2>{{$comic->title}}</h2>
        <div class="text-center mt-3">
            <h5>{{$comic->description}}</h5>
        </div>
        <hr>
        <h3 class="mt">Info</h3>
        <div class="d-flex justify-content-between">
                        <div>
                            <h4>Artists:</h4>
                            <i>{{$comic->artists}}</i>
                        </div>
                        <div>
                            <h4>Writers:</h4>
                            <i>{{$comic->writers}}</i>
                        </div>
                    <div>
                            <h4>Type:</h4>
                            <i>{{$comic->type}}</i>
                    </div>
                <div class="mt">
                            <h4>Price:</h4>
                            <i>${{$comic->price}}</i>
                </div>
                <div class="mt">
                            <h4>Sale Date:</h4>
                            <i>${{$comic->sale_date}}</i>
                </div>
        </div>
    </div>


    <div class="m-2 d-flex justify-content-center gap-2">
        <a href="{{route('comics.edit', $comic)}}" class="btn btn-warning" >Modifica</a>
        <form action="{{route('comics.destroy', $comic->id)}}" id="delete-form" method="POST">
            @method('DELETE')
            @csrf
        <button class="btn btn-danger">Elimina</button></form>
       
    </div>
</div>

@endsection


@section('scripts')
<script>
    const deleteForm = document.getElementById('delete-form');
    deleteForm.addEventListener('submit', (event)=>{
    event.preventDefault();
    const confirm = window.confirm('sei sicuro di voler eliminare il comic {{$comic->title}}}?');
    if(confirm) deleteForm.submit();
    

});
</script>

@endsection