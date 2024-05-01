<select class="form-select" name="{{ $name }}">
    @foreach ($zonas as $zona)
        <option value="{{ $zona->id_zona }}" {{ $selected == $zona->descripcion ? 'selected' : '' }}>
            {{ $zona->descripcion }}
        </option>
    @endforeach
</select>