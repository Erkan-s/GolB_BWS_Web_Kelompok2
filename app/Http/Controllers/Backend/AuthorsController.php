<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $param;

    public function __construct()
    {
        $this->param['title'] = null;
    }
    public function index()
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;
        $this->param['data'] = Authors::all();
        return view('backend.authors.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['title'] = "Tambah Data";
        $this->param['linkBaru'] = 'authors';
        $this->param['subtitleBaru'] = 'Narator';

        $this->param['data'] = Authors::all();
        return view('backend.authors.create',$this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->param['linkBaru'] = null;
        $this->param['subtitleBaru'] = null;

       $request->validate([
           'name' => 'required',
           'jobs' => 'max:100',
           'gender' => 'required'
       ],
       [
           'required' => 'Data harus terisi',
           'jobs.max' => 'Data tidak boleh lebih dari 100 karakter.'
       ],
       [
           'name' => 'Nama Narator',
           'jobs' => 'Pekerjaan',
           'gender' => 'Jenis Kelamin'
       ]);

           $newAuthor = new Authors;
           $newAuthor->name_author = $request->name;
           $newAuthor->gender = $request->gender;
           $newAuthor->jobs = $request->jobs;
           $newAuthor->save();
           alert()->success('Berhasil menambahkan data Narator','Sukses')->autoclose(3000);
           return redirect('dashboard/admin/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->param['title'] = "Edit Data";
        $this->param['linkBaru'] = 'authors';
        $this->param['subtitleBaru'] = 'Narator';
        return view('backend.authors.create',$this->param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
