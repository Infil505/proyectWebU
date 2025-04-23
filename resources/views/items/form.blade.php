<div class="uk-margin">
    <label class="uk-form-label" for="category_id">Categoría</label>
    <div class="uk-form-controls uk-flex uk-flex-middle uk-flex-between">
        <div class="uk-width-expand">
            <select name="category_id" id="category_id" class="uk-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $item->category_id ?? $categoryId ?? '') == $category->id)>
                        {{ $category->categoria }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="uk-margin-left">
            <a href="{{ route('categories.create') }}" class="uk-button uk-button-secondary uk-button-small">
                + Crear categoría
            </a>
        </div>
    </div>
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="name">Nombre</label>
    <input class="uk-input" type="text" name="name" id="name" required
        value="{{ old('name', $item->name ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="type">Tipo</label>
    <input class="uk-input" type="text" name="type" id="type" required
        value="{{ old('type', $item->type ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="brand">Marca</label>
    <input class="uk-input" type="text" name="brand" id="brand" required
        value="{{ old('brand', $item->brand ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="price">Precio</label>
    <input class="uk-input" type="number" step="0.01" name="price" id="price" required
        value="{{ old('price', $item->price ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="discount">Descuento</label>
    <input class="uk-input" type="number" step="0.01" name="discount" id="discount" required
        value="{{ old('discount', $item->discount ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="final_price">Precio Final</label>
    <input class="uk-input" type="number" step="0.01" name="final_price" id="final_price" required
        value="{{ old('final_price', $item->final_price ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="stock">Stock</label>
    <input class="uk-input" type="number" name="stock" id="stock" required
        value="{{ old('stock', $item->stock ?? '') }}">
</div>

<div class="uk-margin">
    <label class="uk-form-label" for="short_description">Descripción corta</label>
    <textarea class="uk-textarea" name="short_description" id="short_description" required>{{ old('short_description', $item->short_description ?? '') }}</textarea>
</div>
