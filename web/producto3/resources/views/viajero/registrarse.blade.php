
@extends('layouts.plantilla')
@section('title', 'Registro viajero')

@section('content')

    <div class="row d-flex align-items-center justify-content-center">
    
        <div class="col-md-7 mb-5">
            <div class="formulario-registrar contenedor-sm shadow p-3 rounded">

                    <p class=" text-dark text-center fw-bold">Crea tu Cuenta en Isla Transfer</p>

                    <form class="formulario" method="POST" action="registrarse">
                    @csrf <!-- Agregar el campo CSRF token -->
                    @include('viajero.alertas') 
                    

                      <div class="mb-3">
                         <label for="nombre" class="form-label text-dark">Nombre</label>
                         <input 
                             type="text"
                             class="form-control"
                             id="nombre"
                             placeholder="Tu Nombre"
                             name="nombre"
                         />
                     </div>

                     <div class="mb-3">
                         <label for="apellido1" class="form-label text-dark">Primer Apellido</label>
                         <input 
                             type="text"
                             class="form-control"
                             id="apellido1"
                             placeholder="Tu Primer Apellido"
                             name="apellido1"
                         />
                     </div>

                     <div class="mb-3">
                         <label for="apellido2" class="form-label text-dark">Segundo Apellido</label>
                         <input 
                             type="text"
                             class="form-control"
                             id="apellido2"
                             placeholder="Tu Segundo Apellido"
                             name="apellido2"
                         />
                     </div>

                     <div class="mb-3">
                         <label for="direccion" class="form-label text-dark">Dirección</label>
                         <input 
                             type="text"
                             class="form-control"
                             id="direccion"
                             placeholder="Tu Dirección"
                             name="direccion"
                             
            
                         />
                     </div>

                        <div class="mb-3">
                            <label for="codigoPostal" class="form-label text-dark">Código Postal</label>
                            <input 
                                type="text"
                                class="form-control"
                                id="codigoPostal"
                                placeholder="Tu Código Postal"
                                name="codigoPostal"
                                
           
                            />
                        </div>

                        <div class="mb-3">
                            <label for="ciudad" class="form-label text-dark">Ciudad</label>
                            <input 
                                type="text"
                                 class="form-control"
                                 id="ciudad"
                                 placeholder="Tu Ciudad"
                                 name="ciudad"
                                 
            
                            />
                        </div>

                        <div class="mb-3">
                            <label for="pais" class="form-label text-dark">País</label>
                            <input 
                                type="text"
                                class="form-control"
                                id="pais"
                                placeholder="Tu País"
                                name="pais"
                                
            
                            />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input 
                                type="email"
                                class="form-control"
                                id="email"
                                placeholder="Tu Email"
                                name="email"
                               
            
                            />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-dark">Contraseña</label>
                            <input 
                                 type="password"
                                 class="form-control"
                                 id="password"
                                 placeholder="Tu Contraseña"
                              name="password"
            
                             />
                         </div>

                        <button type="submit" class="btn btn-outline-primary w-100 p-3 mt-2 fs-5 fw-bold">Registrarme</button>

                    </form>
                    

                    <div class="acciones mt-3 d-flex justify-content-center mb-4">
                        <a href="/" class="text-dark ">Ya Tienes Cuenta? <span class="text-primary fw-bold">inicia Sesion</span></a> 
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection