<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Series::query()->orderBy('nome')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('series.index')->with('series', $series)->with('mensagemSucesso',  $mensagemSucesso);

        // OUTROS MÉTODOS:
        // $series = \DB::select('SELECT nome FROM series');

        // $series = Series::all();

        // $request->session()->forget('mensagem.sucesso');

        // return view('listar-series', [
        //     'series' => $series
        // ]);

        // return view('listar-series', compact('series'));
    }

    public function create(Request $request) {

        return view('series.create');
    }

    public function store(Request $request) {

        $request->validate([
            'nome' => ['required','min:3']
        ]);
        $serie = Series::create($request->all());
        
        return to_route('series.index')->with('mensagem.sucesso', "A série '{$serie->nome}' foi adicionada com sucesso!");

        // OUTROS MÉTODOS:
        //\DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
        
        // $nomeSerie = $request->nome;
        // $serie = new Series();
        // $serie->nome = $nomeSerie;
        // $serie->save();

        // $request->session()
        //     ->flash('mensagem.sucesso', "A série '{$serie->nome}' foi adicionada com sucesso!");
    
        // Series::create($request->only(['nome']));
    
        // Series::create($request->except(['_token']));
    }

    public function destroy(Series $series) {
        
        $series->delete();

        // OUTROS MÉTODOS:
        // $serie = Series::find($request->series)

        // Series::destroy($series->id);
        
        // $request->session()
        //  ->flash('mensagem.sucesso', "A série '{$series->nome}' removida com sucesso!");
        //  ->put('mensagem.sucesso', 'Série removida com sucesso!');
            

       return to_route('series.index')->with('mensagem.sucesso', "A série '{$series->nome}' removida com sucesso!");
    }

    public function edit(Series $series) {
        return view('series.edit')->with('serie',$series);
    }

    public function update(Series $series, Request $request) {
        
        $request->validate([
            'nome' => ['required','min:3']
        ]);
        $series->fill($request->all());
        $series->save();
        
        return to_route('series.index')
        ->with('mensagem.sucesso', "A série '{$series->nome}' editada com sucesso!");

        //OUTROS MÉTODOS:
        // $series->nome = $request->nome;
        // $series->save();
    }

}
