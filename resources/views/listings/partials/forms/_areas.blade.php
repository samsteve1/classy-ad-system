<div class="form-group">
    <label for="area" class="form-control-label">Area</label>
    <select name="area_id" id="area" class="form-control{{ $errors->has('area_id') ? ' is-invalid' : '' }}">
        @foreach ($areas as $country)
            <optgroup label="{{ $country->name }}">
                @foreach ($country->children as $state)
                    <optgroup label="{{ $state->name }}">
                        @foreach ($state->children as $city)
                            @if(
                                isset($listing) && $listing->area->id == $city->id ||
                                !isset($listing) && $area->id == $city->id && old('area_id') ||
                                old('area_id') == $city->id
                            )
                                <option selected value="{{ $city->id }}">{{ $city->name }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif

                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @if ($errors->has('area_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('area_id') }}</strong>
        </span>
    @endif
</div>