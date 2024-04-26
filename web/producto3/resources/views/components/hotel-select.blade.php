<select class="form-select" name="{{ $name }}">
    @foreach ($hoteles as $hotel)
        <option value="{{ $hotel->id }}" {{ $selected == $hotel->id ? 'selected' : '' }}>
            {{ $hotel->NombreHotel }}
        </option>
    @endforeach
</select>