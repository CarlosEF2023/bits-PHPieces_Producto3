<select class="form-select" name="{{ $name }}">
    @foreach ($hoteles as $hotel)
        <option value="{{ $hotel->id_hotel }}" {{ $selected == $hotel->id_hotel ? 'selected' : '' }}>
            {{ $hotel->NombreHotel }}
        </option>
    @endforeach
</select>