@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Editorial </h2>
       <form action="{{ route('propiedad.update', $propiedad->id_propiedad) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @method('PUT')
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
               <label for="direccion">Dirección</label>
               <textarea class="form-control" id="direccion" name="direccion">{{$propiedad->direccion}}</textarea>
           </div>
           <div class="form-group">
               <label for="estado">Estado</label>
               <input type="text" class="form-control" id="estado" name="estado" value="{{$propiedad->estado}}" />
           </div>
           <div class="form-group">
               <label for="area">Dimensiones o Área</label>
               <input type="text" class="form-control" id="area" name="area" value="{{$propiedad->area}}" />
           </div>
           <div class="form-group">
               <label for="precio_propiedad">Precio</label>
               <input type="text" class="form-control" id="precio_propiedad" name="precio_propiedad" value="{{$propiedad->precio_propiedad}}" />
           </div>
           <div class="form-group">
               <label for="id_usuario">ID del Dueño</label>
               <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{$propiedad->id_usuario}}" />
           </div>
           <div class="form-group">
               <label for="descripcion">Descripción</label>
               <textarea class="form-control" id="descripcion" name="descripcion">{{$propiedad->descripcion}}</textarea>
           </div>
           <button type="submit" class="btn btn-success">Guardar Propiedad</button>
       </form>
   </div>
</div>
@endsection

