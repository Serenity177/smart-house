<a href="{{ route('propiedad.create') }}">Crear propiedad</a>
@foreach($propiedades as $propiedad)
<br>
<a href="{{ route('propiedad.edit', $propiedad->id_propiedad) }}">Editar</a>
<p>{{$propiedad->direccion}}</p>
@endforeach
