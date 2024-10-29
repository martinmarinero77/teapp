<?php

namespace App\Http\Controllers;

use App\Traits\DebugHelper;
use App\Traits\ToastTrigger;
use Illuminate\Http\Request;

class ContadorController extends Controller
{
    use ToastTrigger,DebugHelper;

    public function index()
    {
        $número = 5;
        return view('contador', compact('número'));
    }

     public function incrementar($número)
    {
        $número = min($número + 1, 10); // No permite exceder de 10
        $this->successToast('número incrementado');
        return view('contador', compact('número'));
    }

    public function decrementar($número)
    {
        $número = max($número - 1, 0); // No permite bajar de 0
        $this->successToast('Número decrementado');
        return view('contador', compact('número'));
    }

    public function reiniciar()
    {
        $número = 0; // Reinicia a 0
        return view('contador', compact('número'));
    }

    public function duplicar($número)
    {
        $número = min($número * 2, 10); // Duplicar y no exceder 10
        $this->successToast('Número duplicado');
        return view('contador', compact('número'));
    }

    public function establecer(Request $request)
    {
        $número = $request->query('número', 0); // Obtén 'número' desde la cadena de consulta
        $número = min(max($número, 0), 10); // Limitar entre 0 y 10
        $this->log('Número establecido');
        return view('contador', compact('número'));
    }

}
