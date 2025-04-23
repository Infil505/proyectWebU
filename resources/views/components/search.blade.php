<form action="{{ route('items.search') }}" method="GET" class="uk-margin">
    <div class="uk-inline">
        <a class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search"></a>
        <input class="uk-input" type="text" name="q" placeholder="Buscar producto..." value="{{ request('q') }}">
    </div>
</form>