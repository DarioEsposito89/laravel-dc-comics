@extends('layout.main')

@section('main-content')
<div class="bg-blu"></div>
<div id="show" class="container bg-white">
    
    <div class="row mt">
        {{-- IMAGE SINGLE SPECIFIC COMIC --}}
        <img class="image-position img-fluid" src="{{$comic['thumb']}}" alt="">
        <h2>{{$comic->title}}</h2>
        <div class="text-center mt-3">
            <h5>{{$comic->description}}</h5>
        </div>
        <hr>
        {{-- INFO COMICS --}}
        <h3 class="text-center mb-5">INFO</h3>

    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-3">
                    <h4>Artists:</h4>
                    {{$comic->artists}}
                </div>
                <div class="col-3">
                    <h4>Writers:</h4>
                    {{$comic->writers}}
                </div>
                <div class="col-2">
                    <h4>Type:</h4>
                    {{$comic->type}}
                </div>
                <div class="col-2">
                    <h4>Price:</h4>
                    {{$comic->price}}
                </div>
                <div class="col-2">
                    <h4>Sale Date:</h4>
                    {{$comic->sale_date}}
                </div>
            </div>
        </div>
    </div>


    <div class="my-5 d-flex justify-content-center gap-2">
        {{-- BUTTON EDIT --}}
        <a href="{{route('comics.edit', $comic)}}" class="btn btn-warning" >Modifica</a>
        <form action="{{route('comics.destroy', $comic->id)}}" id="delete-form" method="POST">
            @method('DELETE')
            @csrf
            {{-- BUTTON DESTROY --}}
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