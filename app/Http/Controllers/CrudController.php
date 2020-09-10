<?php

namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCrud;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        //envio la variable crud la cual saca los datos del modelo
        $cruds=Crud::all();
        //envio estos datos con compact
        return view('user.index',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCrud $request)
    {

        //si existe el archivo avatar
        if($request->hasFile('avatar')){
        //Selecione el archivo
            $file=$request->file('avatar');
            //deme el nombre de ese archivo y lo reescribo
            $name=time().$file->getClientOriginalName();
            //guardamelo en pulic/images
            $file->move(public_path().'/images/',$name);
        }
        $crud=new Crud();
        $crud->name=$request->input('name');
        $crud->avatar=$name;
        $crud->slug=$crud->name;
        $crud->save();
        return redirect()->route('Crud.index')->with('status','Guardado Correctamente');
        //para todos
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //busca en el modelo el id 
        //$crud=Crud::find($id);
        //Busca el slug
        //$crud=Crud::where('slug','=',$slug)->firstOrFail();
        return view('user.show',compact('crud'));        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $crud)
    {
        //
      return view('user.edit',compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCrud $request, Crud $crud)
    {       
        //tomar todo
        //$crud->fill($request->all())
        //tomar todo exepto avatar
        $crud->fill($request->except('avatar'));
        //si existe el archivo avatar
        if($request->hasFile('avatar')){
        //Selecione el archivo
            $file=$request->file('avatar');
            //deme el nombre de ese archivo y lo reescribo
            $name=time().$file->getClientOriginalName();
            //guardamelo en pulic/images
            $crud->avatar=$name;
            $file->move(public_path().'/images/',$name);
        }
        $crud->slug=$request->input('name');
        $crud->save(); 
        return redirect()->route('Crud.show',[$crud])->with('status','Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        //
        $file_path=public_path().'/images/'.$crud->avatar;
        \File::delete($file_path);
        $crud->delete();

        return redirect()->route('Crud.index');
    }
}
