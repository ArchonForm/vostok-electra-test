<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => Users::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'second_name' => 'required',
            'debt' => 'required|numeric',

        ]);

        Users::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        return view('users.show', compact('user'));
    }

    public function exportXLS()
    {
        return Excel::download(new UsersExport, 'All_Users.xlsx');
    }

    public function exportPDF($id)
    {
        $user = Users::find($id);
        $userFullName = $user->last_name . '_' . $user->first_name . '_' . $user->second_name;
        $pdf = PDF::loadView('users.pdf', compact('user'));

        return $pdf->download($userFullName . '.pdf');
    }

    public function storePDF($id)
    {
        $user = Users::find($id);
        $pdf = PDF::loadView('users.pdf', compact('user')); // generate pdf file
        $pdfContent = $pdf->output(); // get content of generated file
        $pdfFileName = $user->last_name . '_' . $user->first_name . '_' . $user->second_name . '.pdf'; // generate pdf file name
        $pdfPath = 'uploads/' . $pdfFileName; // pdf file path

        if (!$user->pdf_binary) 
        {
            $user->pdf_binary = pg_escape_bytea($pdfContent); // store pdf file content to database
            $user->pdf_path = $pdfPath; // store pdf file path to database
            $user->save();
            file_put_contents($pdfPath, $pdfContent); //store pdf file to server
        }

        return response($pdfContent)->header('Content-Type', 'application/pdf');
    }
}
