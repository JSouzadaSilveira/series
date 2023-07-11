<x-layout title="Editando '{!! $serie->nome !!}'">
    <form action="{{ route('series.update', $serie->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input class="form-control" type="text" id="nome" name="nome" value="{{ $serie->nome }}"> 
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>