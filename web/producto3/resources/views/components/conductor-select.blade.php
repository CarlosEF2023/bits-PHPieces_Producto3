<select class="form-select" name="{{ $name }}">
    @foreach ($conductores as $vehiculo)
        <option value="{{ $vehiculo->id_conductor }}" {{ $selected == $vehiculo->id_conductor ? 'selected' : '' }}>
            {{ $vehiculo->Descripcion }}
        </option>
    @endforeach
</select>