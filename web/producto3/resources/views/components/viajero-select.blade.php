<select class="form-select" name="{{ $name }}">
    @foreach ($viajeros as $usuarioviajero)
        <option value="{{ $usuarioviajero->email }}" {{ $selected == $usuarioviajero->email ? 'selected' : '' }}>
            {{ $usuarioviajero->email }}
        </option>
    @endforeach
</select>