@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Publicar una Propiedad</h2>
</div>
<div class="row">
       <hr>
       <form action="{{ route('propiedad.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
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
               <label for="propiedad">Dirección</label>
               <textarea class="form-control" id="direccion" name="direccion">{{old('direccion')}}</textarea>
           </div>
           <div class="form-group">
               <label for="estado">Estado</label>
               <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado')}}" />
           </div>
           <div class="form-group">
               <label for="area">Dimensiones o Área</label>
               <input type="text" class="form-control" id="area" name="area" value="{{old('area')}}" />
           </div>
           <div class="form-group">
               <label for="precio_propiedad">Precio</label>
               <input type="text" class="form-control" id="precio_propiedad" name="precio_propiedad" value="{{old('precio_propiedad')}}" />
           </div>
           <div class="form-group">
               <label for="id_usuario">ID del Dueño</label>
               <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{old('id_usuario')}}" />
           </div>
           <div class="form-group">
               <label for="area">Descripción</label>
               <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}" />
           </div>
           <button type="submit" class="btn btn-success">Guardar Propiedad</button>
       </form>
   </div>
</div>
@endsection