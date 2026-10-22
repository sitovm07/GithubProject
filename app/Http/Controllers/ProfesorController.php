<?php

namespace App\Http\Controllers;

use App\Models\profesor;
use Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfesorController extends Controller
{

    private const MESSAGES = [
        // Apellidos
        'apellidos.max'      => 'Los apellidos no pueden superar los 130 caracteres.',
        'apellidos.min'      => 'Los apellidos deben tener al menos 3 caracteres.',
        'apellidos.required' => 'Los apellidos son obligatorios.',
        'apellidos.string'   => 'Los apellidos deben ser una cadena de texto.',

        // Fecha de alta
        'f-alta.before_or_equal' => 'La fecha de alta no puede ser posterior a hoy.',
        'f-alta.date'            => 'La fecha de alta no es válida.',

        // Especialidad
        'especialidad.max'      => 'La especialidad no puede superar los 100 caracteres.',
        'especialidad.required' => 'La especialidad es obligatoria.',
        'especialidad.string'   => 'La especialidad debe ser una cadena de texto.',

        // Nombre
        'nombre.max'      => 'El nombre no puede superar los 100 caracteres.',
        'nombre.min'      => 'El nombre debe tener al menos 2 caracteres.',
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.string'   => 'El nombre debe ser una cadena de texto.',

        // Salario
        'salario.decimal' => 'El salario debe tener como máximo 2 decimales.',
        'salario.gte'     => 'El salario no puede ser inferior a 0.',
        'salario.lte'     => 'El salario no puede ser superior a 99.999.999,99.',
        'salario.numeric' => 'El salario debe ser un número.',

    ];

    private const RULES = [
        'nombre'       => 'required|string|max:100|min:2',
        'apellidos'    => 'required|string|max:130|min:3',
        'f-alta'       => 'nullable|date|before_or_equal:today',
        'especialidad' => 'required|string|max:100',
        'salario'      => 'nullable|numeric|gte:0|lte:99999999.99|decimal:0,2',
    ];

    public function create(): View {
        return view('profesor.create', []);
    }

    public function destroy(profesor $profesor): RedirectResponse {
        try {
            $profesor->delete();
        } catch(Exception $e) {
            return back()->withErrors([
                'error' => 'Error al borrar el profesor.',
            ]);
        }

        return redirect()->route('profesor.index')->with([
            'success' => 'Se ha borrado el profesor.'
        ]);
    }

    public function edit(profesor $profesor): View {
        return view('profesor.edit', ['profesor' => $profesor]);
    }

    public function index(): View {
        $profesor = profesor::all();
        return view('profesor.index', ['profesor' => $profesor]);
    }

    public function show(profesor $profesor): View {
        return view('profesor.show', ['profesor' => $profesor]);
    }

    public function store(Request $request): RedirectResponse {

        //1º validar
        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $profesor = new profesor($request->all());

        try {
            $profesor->save();
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada.',
            ]);
        } catch(Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al crear el profesor.',
            ]);
        }

        return redirect()->route('profesor.index')->with([
            'success' => 'Se ha creado el profesor correctamente'
        ]);
    }

    public function update(Request $request, profesor $profesor): RedirectResponse {

        $validator = Validator::make($request->all(), self::RULES, self::MESSAGES);
        if($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            $profesor->update($request->all());
        } catch(UniqueConstraintViolationException $e) {
            return back()->withInput()->withErrors([
                'error' => 'Clave única duplicada.',
            ]);
        } catch(Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Error al editar el profesor.',
            ]);
        }

        return redirect()->route('profesor.index')->with([
            'success' => 'Se ha editado el profesor correctamente'
        ]);
    }

}