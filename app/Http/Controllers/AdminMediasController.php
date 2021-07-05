<?php
namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;


class AdminMediasController extends Controller
{
    //
    

    public function index(){

        $photos = Photo::latest()->paginate(20);
        return view('media.index', compact('photos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create(){
        return view('media.create');
    }
    

    public function store(Request $request){
        $file = $request->file('file');
        $name = time() .  $file->getClientOriginalName();
        $file->move('images/media/', $name);
        Photo::create(['file'=>$name]);
    }
    

    public function destroy($id){
            $photo = Photo::findOrFail($id);
            $photo->delete();
    }
    

    public function deleteMedia(Request $request){
        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach($photos as $photo){
                $photo->delete();
                unlink(public_path() .  '/images/media/' . $photo->file );
            }
            return redirect()->back()->with('user_success','Image/s deleted successfully!');;
        } else {
            return redirect()->back();
        }
    }




}
