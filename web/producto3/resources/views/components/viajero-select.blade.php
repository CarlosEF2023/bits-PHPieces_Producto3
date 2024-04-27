<select class="form-select" name="{{ $name }}">
    @foreach ($viajero as $usuarioviajero)
        <option value="{{ $usuarioviajero->id_viajero }}" {{ $selected == $usuarioviajero->id_viajero ? 'selected' : '' }}>
            {{ $usuarioviajero->email }}
        </option>
    @endforeach
</select>