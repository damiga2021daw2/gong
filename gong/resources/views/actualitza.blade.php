@extends('disseny')

@section('content')


<div class="card mt-5">
    <div class="card-header">
        Actualització de dades
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('ong.update', $ong->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="cif">CIF</label>
                <input type="text" class="form-control" name="cif" value="{{ $ong->nom }}" />
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $ong->nom }}" />
            </div>
            <div class="form-group">
                <label for="adreca">Adreça</label>
                <input type="text" class="form-control" name="adreca" value="{{ $ong->adreca }}" />
            </div>
            <div class="form-group">
                <label for="poblacio">Poblacio</label>
                <input type="text" class="form-control" name="poblacio" value="{{ $ong->poblacio }}" />
            </div>
            <div class="form-group">
                <label for="comarca">Comarca</label>
                <input type="text" class="form-control" name="comarca" value="{{ $ong->comarca }}" />
            </div>
            <div class="form-group">
                <label for="tipus">Tipus</label>
                <input type="text" class="form-control" name="tipus" value="{{ $ong->tipus }}" />
            </div>
            <div class="form-group">
                <label for="utpublica">Utilitat Pública</label>
                <input type="text" class="form-control" name="utpublica" value="{{ $ong->utpublica }}" />
            </div>

            @if($ongs[0]->utilitat_publica == 1)
            <div class="form-group">
                <label for="utpublica">Utilitat pública</label>
                <input checked type="checkbox" class="form-control" name="utpublica">
            </div>
            @else
            <div class="form-group">
                <label for="utpublica">Utilitat pública</label>
                <input type="checkbox" class="form-control" name="utpublica">
            </div>
            @endif


            <button type="submit" class="btn btn-block btn-danger">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('ong') }}">Accés directe a la Llista d'empleats</a
@endsection