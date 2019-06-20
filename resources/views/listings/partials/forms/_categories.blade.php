<div class="form-group">
    <label for="category" class="form-control-label">Category</label>
    <select name="category_id" id="category" class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" {{ isset($listing) && $listing->live()  ? ' disabled="disabled"' : ''}}>
        @foreach ($categories as $category)
            <optgroup label="{{ $category->name }}">
                @foreach ($category->children as $child)
                    @if(isset($listing) && $listing->category_id == $child->id || old('category_id') == $child->id)
                        <option selected value="{{ $child->id }}">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @else
                        <option value="{{ $child->id }}">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @if ($errors->has('category_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>