<x-layout title="Nova série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8 mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input class="form-control" autofocus type="text" id="nome" name="nome" value="{{ old('nome') }}">
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Seasons:</label>
                <input class="form-control" type="number" id="seasonsQty" name="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesQty" class="form-label">Episodes:</label>
                <input class="form-control" type="number" id="episodesQty" name="episodesQty" value="{{ old('episodesQty') }}">
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>