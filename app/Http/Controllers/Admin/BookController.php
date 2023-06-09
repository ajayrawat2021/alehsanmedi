<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Author;
use App\Models\User;

class BookController extends Controller
{
    public function index()
    {

        $Books = Book::latest()->paginate(10);
        return view('admin.books.index')->with([
            'books' => $Books,
        ]);

    }
    public function create()
    {
     
        try{
            
          $authors = User::where('role',2)->get();
            return response()->json([
                "success" => true,
                "html" => view('admin.books.ajax.create')->with([
                    'authors' => $authors
                    ])->render(),
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                "success" => false,
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {  
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
        $validator = Validator::make($requestData, [
             'title' => 'required',
             'publisher' => 'required',
             'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
             'book_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
             'url' => 'required|max:255|unique:books',
             
            ]);

        if ($validator->passes()) {
            try {
                $file = $request->file('book_image');
                $path = public_path(). '/storage/book_image/';
                $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move($path, $filename);  

                $files = $request->file('book_cover');
                $paths = public_path(). '/storage/book_cover/';
                $book_cover = md5($files->getClientOriginalName() . time()) . "." . $files->getClientOriginalExtension();
                $files->move($paths, $book_cover); 
                if($request->hasFile('book_file')) {
                $filesb = $request->file('book_file');
                $pathss = public_path(). '/storage/files/';
                $book_pdf = md5($filesb->getClientOriginalName() . time()) . "." . $filesb->getClientOriginalExtension();
                $filesb->move($pathss, $book_pdf); 
                }
                
                book::create([
                    'author_id'        => $request->author,
                    'title'            => $request->title,
                    'editor'           => $request->editor,
                    'compilers'        => $request->compilers,
                    'assistants'       => $request->assistants,
                    'translator'       => $request->translator,
                    'researchanalysis' => $request->researchanalysis,
                    'totalpages'       => $request->totalpages,
                    'publisher'        => $request->publisher,
                    'publicationdate'  => $request->publicationdate,
                    'book_image'       =>$filename,
                    'book_cover'       =>$book_cover,
                    'book_pdf'       =>$book_pdf??null,
                    'status'           => $request->status,
                    'url'              => $request->url,
                    'pdf_url'              => $request->pdf_url,
                     
                ]);

                return response()->json([
                    'success' => true,
                    'msgText' => 'Created',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function edit($id)
    {
        try {
            $Book = Book::findOrFail($id);
            $authors = User::where('role',2)->get();
            return response()->json([
                "success" => true,
                "html" => view('admin.books.ajax.edit')->with([
                    'book' => $Book,
                    'authors'=>$authors,
                ])->render(),
            ]);
        } catch(\Exception $ex){
            return response()->json([
                "success" => false,
                'msgText' =>$ex->getMessage(),
            ]);
        }
    }
    public function update(Request $request , $id)
    {
        $requestData = $request->all();
        $requestData['url'] = Str::slug($request->url, '-');
        $request->replace($requestData);
     
 

        $validator = Validator::make($requestData, [
        'title' => 'required',
        'editor' => 'required',
        'compilers' => 'required',
        'assistants' => 'required',
        'researchanalysis' => 'required',
        'totalpages' => 'required',
        'publisher' => 'required',
        'publicationdate' => 'required',
        // 'title_hindi' => 'required',
        // 'title_arabic' => 'required',
        // 'title_urdu' => 'required',
        'url' => [ "required",Rule::unique('books')->ignore($id),"max:255"],
      
        ]);
        
        if ($validator->passes()) {
            try {
                $Book = Book::findOrFail($id);
                $data = array(
                    'title'            => $request->title,
                    'author_id'        => $request->author,
                    'editor'           => $request->editor,
                    'compilers'        => $request->compilers,
                    'assistants'       => $request->assistants,
                    'translator'       => $request->translator,
                    'researchanalysis' => $request->researchanalysis,
                    'totalpages'       => $request->totalpages,
                    'publisher'        => $request->publisher,
                    'publicationdate'        => $request->publicationdate,
                    'status'           => $request->status,
                    'aproved'          => $request->aproved,
                    'url'              => $request->url,
                    'pdf_url'          => $request->pdf_url,
                );

                if($request->hasFile('book_image')){
                    //For image
                    $file = $request->file('book_image');
                    $path = public_path(). '/storage/book_image/';
                    $file_img='storage/book_image/'.$Book->book_image;
                    
                    if(isset($Book->book_image) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['book_image'] = $filename;
                }

                if($request->hasFile('book_file')) {
                    $file = $request->file('book_file');
                    $path =public_path(). '/storage/files/';
                    $file_img='storage/files/'.$Book->book_pdf;
                    if(isset($Book->book_pdf) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename =md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);
                    $data['book_pdf']=$filename;
                     
                }

              
                 


          
                if($request->hasFile('book_cover')){
                    //For image
                    $file = $request->file('book_cover');
                    $path = public_path(). '/storage/book_cover/';
                    $file_img='storage/book_cover/'.$Book->book_cover;
                    
                    if(isset($Book->book_cover) && File::exists($file_img))
                    {File::delete($file_img);}
                    $filename = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move($path, $filename);   
                    $data['book_cover'] = $filename;
                }
                
                $Book->update($data);
                return response()->json([
                    'success' => true,
                    'msgText' => 'language Updated',
                ]);
            } catch(\Exception $ex) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'msgText' => $ex->getMessage(),
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 422,
                'errors' => $validator->errors(),
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $blog = Book::findOrFail($id);
            $blog->delete();
            return response()->json([
                'success' => true,
            ]);
        } catch(\Exception $ex) {
            return response()->json([
                'success' => false,
                'msgText' => $ex->getMessage(),
            ]);
        }
    }
}
