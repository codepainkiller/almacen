<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = Setting::pluck('value', 'name');

        return view('pages.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'percentage_gain' => 'required'
        ]);

        $setting = Setting::where('name', 'percentage_gain')->first();

        if ($setting) {
            $setting->value = $request->get('percentage_gain');
            $setting->save();

            flash()->success('Actualizado', 'Configuraciones guardadas.');
        } else {
            flash()->error('Error', 'Revise los datos ingresados e intente nuevamente.');
        }

        return redirect('ajustes');
    }
}
