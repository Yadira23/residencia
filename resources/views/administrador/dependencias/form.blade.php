<div class="mb-3">
    <label>Nombre de la Dependencia</label>
    <input type="text" name="nombre" class="form-control" 
           value="{{ old('nombre', $dependencia->nombre ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Sector</label>
    <input type="text" name="sector" class="form-control" 
           value="{{ old('sector', $dependencia->sector ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" 
           value="{{ old('email', $dependencia->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Extensión</label>
    <input type="text" name="extension" class="form-control" 
           value="{{ old('extension', $dependencia->extension ?? '') }}">
</div>

<div class="mb-3">
    <label>Teléfono</label>
    <input type="text" name="telefono" class="form-control" 
           value="{{ old('telefono', $dependencia->telefono ?? '') }}">
</div>

<div class="mb-3">
    <label>Dirección</label>
    <input type="text" name="direccion" class="form-control" 
           value="{{ old('direccion', $dependencia->direccion ?? '') }}">
</div>
