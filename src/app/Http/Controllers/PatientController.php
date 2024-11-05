<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(): View {
        $patients = Patient::latest()->paginate(5);;
        return view('patients.index', compact('patients'));
    }

    public function create(): View {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|unique:patients',
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients',
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients',
            'direccion' => 'required',
        ]);
        Patient::create($validated);
        return redirect()->route('patients.index');
    }

    public function show(Patient $patient): View {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient): View {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'codigo' => 'required|unique:patients,codigo,'.$patient->id,
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients,dni,'.$patient->id,
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients,email,'.$patient->id,
            'direccion' => 'required',
        ]);
        $patient->update($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }

}
