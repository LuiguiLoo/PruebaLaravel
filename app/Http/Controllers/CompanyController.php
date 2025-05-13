<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        try {
            Company::create($validatedData);
            return redirect()->route('companies.index')->with('success', 'Empresa creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company) {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }
        try {
            $company->update($validatedData);
            return redirect()->route('companies.index')->with('success', 'Empresa actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Company $company) {
        try {
            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Empresa eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', $e->getMessage());
        }
    }

}
