<?php

namespace App\Http\Controllers\Album;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =DB::table('albums')->join('users','users.id','=','albums.user_id')->select('albums.*','users.name as username')->get();
        return view('Album.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data =$this->validate($request,[
            'title'=>'required',
           'image_name'=>'required',
            'image'=>'required|image'
        ]);
        $finalname = time().rand().'.'.$request->image->extension();
        if($request->image->move(public_path('albums'),$finalname)){
            $data['image'] = $finalname;
            $data['user_id'] = auth()->user()->id;
            $op= Album::create($data);
           if($op){
               $message = 'Row inserted';
           }
           else{
               $mssage = 'Row Not inserted';
           }

        }else{
            $mssage ='error try agin';
        }
        session()->flash('message',$message);
        return redirect(url('/album'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=   Album::find($id);
        return view('Album.edit',compact('data'));
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

        $data =$this->validate($request,[
            'title'=>'required',
           'image_name'=>'required',
         ]);
        $Row =Album::find($id);
        if($request->hasFile('image')){
            $finalname = time().rand().'.'.$request->image->extension();
            if($request->image->move(public_path('albums'),$finalname)){
                unlink(public_path('albums/'.$Row->image));
            }
                $data['image']=$finalname;
        }else{
            $data['image']=$Row->image;
        }

         $op= Album::where('id',$id)->update($data);
        if($op){
            $message = 'Row update';
        }
        else{
            $message = 'Row Not update';
        }
     session()->flash('message',$message);
     return redirect(url('/album'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    $data =Album::find($id);
      $op = Album::where('id',$id)->delete();
       if($op){
          unlink(public_path('albums/'.$data->image));
          $message = 'Row Removed';
      }else{
        $message = 'Row Not Removed';

      }
      session()->flash('message',$message);
      return redirect('/album');
    }

    public function destroyall($id)
    {

    $data =Album::find($id);
      $op = Album::where('id',$id)->delete();
       if($op){
          unlink(public_path('albums/'.$data->image));
          $message = 'Row Removed';
      }else{
        $message = 'Row Not Removed';

      }
      session()->flash('message',$message);
      return redirect(url('/album'));
    }



}