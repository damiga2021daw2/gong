@extends('disseny')

@section('content')

<h1>Llista d'ONGs</h1>
<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td># ID</td>
          <td>Nom</td>
          <td>Email</td>
          <td>Telèfon</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($ong as $ongUna)
        <tr>
            <td>{{$ongUna->id}}</td>
            <td>{{$ongUna->nom}}</td>
            <td>{{$ongUna->email}}</td>
            <td>{{$ongUna->telefon}}</td>
            <td class="text-left">
                <a href="{{ route('ong.edit', $ongUna->id)}}" class="btn btn-success btn-sm">Edita</a>
                <form action="{{ route('ong.destroy', $ongUna->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<br><a href="{{ url('ong/create') }}">Accés directe a la vista de creació d'ONGs</a>
@endsection