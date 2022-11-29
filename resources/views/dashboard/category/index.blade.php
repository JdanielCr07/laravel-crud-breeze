@extends('dashboard.category.layout')

@section('content')
    
    <a class="my-3 btn btn-succes" href="{{ route("category.create") }}">Crear</a>
    
    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        

        <tbody>
        @foreach ($categories as $c)
            <tr>
                <td>
                    {{ $c->title }}
                </td>
                <td>
                    <a class="my-3 btn btn-primary" href="{{ route("category.edit", $c) }}">Editar</a>
                    <a class="my-3 btn btn-primary" href="{{ route("category.show", $c) }}">ver</a>

                    <form action="{{ route("category.destroy", $c) }}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class=" btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories-> links() }}

@endsection