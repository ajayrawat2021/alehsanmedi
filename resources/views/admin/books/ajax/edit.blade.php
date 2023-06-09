<div class="modal-dialog modal-lg">
         <form class="form form-horizontal">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title">Edit book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="label-control label">Title <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" value="{{$book->title}}">
                        <div class="text-danger" id="title-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Editor <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Editor" name="editor" id="editor" value="{{$book->editor}}">
                        <div class="text-danger" id="editor-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Compilers <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Compilers" name="compilers" id="compilers" value="{{$book->compilers}}">
                        <div class="text-danger" id="compilers-err"></div>
                    </div>
                      <div class="col-sm-6">
                        <label class="label-control label">Assistants <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Assistants" name="assistants" id="assistants" value="{{$book->assistants}}">
                        <div class="text-danger" id="assistants-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Translator </label>
                        <input type="text" class="form-control" placeholder="Enter Translator" name="translator" id="translator" value="{{$book->translator}}">
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Research And Analysis <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Research And Analysis" name="researchanalysis" id="researchanalysis" value="{{$book->researchanalysis}}">
                        <div class="text-danger" id="researchanalysis-err"></div>
                    </div>
                      <div class="col-sm-6">
                        <label class="label-control label">Totalpages <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Totalpages" name="totalpages" id="totalpages" value="{{$book->totalpages}}">
                        <div class="text-danger" id="totalpages-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Publisher <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Publisher" name="publisher" id="publisher" value="{{$book->publisher}}">
                        <div class="text-danger" id="publisher-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Authors</label>
                        <select class="form-control" name="author" id="author">
                            <option>Select</option>
                            @foreach($authors as $author_name)
                            <option value="{{$author_name->id}}" {{$author_name->id == $book->author_id ? 'selected' : ''}}>{{$author_name->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">Publication date <span class="required">*</span></label>
                        <input type="date" class="form-control" placeholder="Enter Publication date" name="publicationdate" id="publicationdate" value="{{$book->publicationdate}}">
                        <div class="text-danger" id="publicationdate-err"></div>
                    </div>
                     {{-- <div class="col-sm-6">
                        <label class="label-control label">title-hindi <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Hindi" name="title_hindi" id="title_hindi" value="{{$book->title_hindi}}">
                        <div class="text-danger" id="title-hindi-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">title-Arabic <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Arabic" name="title_arabic" id="title_arabic" value="{{$book->title_arabic}}">
                        <div class="text-danger" id="title-arabic-err"></div>
                    </div>
                     <div class="col-sm-6">
                        <label class="label-control label">title-Urdu <span class="required">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Title Urdu" name="title_urdu" id="title_urdu" value="{{$book->title_urdu}}">
                        <div class="text-danger" id="title-urdu-err"></div>
                    </div> --}}

                    <div class="col-sm-6">
                    <label class="label-control label">URL <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter Url" name="url" id="url" value="{{ $book->url }}">
                     <div class="text-danger" id="url-err"></div>
                     </div>

                     <div class="col-sm-6">
                        <label class="label-control label">Status <span class="required">*</span></label>
                        <select class="form-control" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="block">Block</option>
                        </select>
                        <div class="text-danger" id="status-err"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="label-control label">Aproved Status <span class="required">*</span></label>
                        <select class="form-control" name="aproved" id="aproved">
                        <option value="active" @if ($book->aproved == 'active') selected @endif>Active</option>
                        <option value="block" @if ($book->aproved == 'block') selected @endif>Block</option>
                        </select>
                        <div class="text-danger" id="aproved-err"></div>
                     </div>
             
                      <div class="col-sm-6">
                      <label class="label-control label">Book Image <span class="required">*</span></label>
                      <input type="file" class="form-control" name="book_image" id="image">
                       <div class="text-danger" id="image-err"></div>
                        @if($book->book_image!=null)
                        <div class="m-2"><img src="{{ asset('storage/book_image/'.$book->book_image) }}"height="50"> </div>
                        @endif
                     </div>

                    <div class="col-sm-6">
                      <label class="label-control label">Book Cover <span class="required">*</span></label>
                      <input type="file" class="form-control" name="book_cover" id="book_cover">
                       <div class="text-danger" id="image-err"></div>
                        @if($book->book_cover!=null)
                        <div class="m-2"><img src="{{ asset('storage/book_cover/'.$book->book_cover) }}"height="50"> </div>
                        @endif
                   </div>

                   <div class="col-sm-6">
                      <label class="label-control label">Pdf File <span class="required"></span></label>
                      <input type="file" class="form-control" name="book_file" id="book_file">
                       <div class="text-danger" id="book_file-err"></div>
                        @if($book->book_pdf!=null)
                        <div class="m-2"> <a href="{{ asset('storage/files/'.$book->book_pdf) }}"><img src="{{ asset('storage/files/pdfimg.png') }}"height="50"></a> </div>
                        @endif 
                   </div>

                    <div class="col-sm-6">
                    <label class="label-control label">Pdf URL <span class="required">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter Url" name="pdf_url" id="pdf_url" value="{{ $book->pdf_url }}">
                     <div class="text-danger" id="pdf_url-err"></div>
                     </div>
                    

                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update-book-btn" book_id="{{ $book->id }}">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    </form>
    </div>
 