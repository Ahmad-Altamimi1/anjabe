@extends('layouts.dashboard')

@section('content')
 <style>
    #preloader {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    z-index: 9999;
}

#spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -25px;
    margin-left: -25px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

 </style>
<div id="preloader">
    <div id="spinner"></div>
</div>
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        @if ($havevideo)
            
        @else
            
        <h5 class="hk-sec-title">تعديل {{ $slider->posts->TITLE }}</h5>
        @endif
        <div class="row">
            <div class="col-sm">
                <form action="/slider/{{ $slider->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')


   
                   
              <div class="row">

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label for="tital"> المقال المراد عرضه في السلايدر</label>
                            <select id="post_id" name="post_id" class="form-control  @error('post_id') is-invalid @enderror select2">
                                <option value="" ></option>
                                @foreach ($posts as $post)
                                <option value="{{ $post->id }}" @isset($slider->posts->id )
                                    
                                @if ($post->id == $slider->posts->id )
                                   {{ "selected" }}
                                @endif
                                 @endisset
                                 >
                                {{ $post->TITLE }}
                                </option>
                                @endforeach
                            </select>
                            @error('post_id')
                            <span class="invalid-feedback" role="alert">
                                <strong> الرجاء أختيار المقال المراد عرضه </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <input type="datetime-local"
                                    class="form-control @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER"
                                    value="{{ $slider->DATE_SCHEDULER }}" autocomplete="DATE_SCHEDULER" autofocus>
                                @error('DATE_SCHEDULER')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>وقت النشر على الموقع مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    <div class="col-md-12 col-sm-12 col-12">
                         <video class="col-md-3 col-sm-3 col-3">
                <source src="../../{{ $slider->video }}" type="video/mp4">
            </video>
            <br>
                        <label for="tital">او يمكنك  اضافة الفديو وان لم تختار سيبقى الفيديو القبل </label>
                        <input type="file" id="video" name="video" class="dropify" data-show-remove="false" />
                    </div>
                    <p class="wait"></p>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
                          @error('post_id')
            <strong>{{ $message }}</strong>
        @enderror
                        </div>
                    </div>
                </div>
                </div>
                    </div>



                  
               
                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">الوصف</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror" mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ $slider->description }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح المقال مطلوب</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row pt-4">
                        <div class="col-sm">

                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <a style="color: white" type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{ $slider->id }}">حذف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal{{ $slider->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">   @if ($havevideo)
            
        @else
            {{ $slider->posts->TITLE }}
        @endif
    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل تريد حذف السلايدر 
                          @if ($havevideo)
            
        @else
            
        {{ $slider->posts->TITLE }}</p>
        @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                    <form action="/slider/delete/{{ $slider->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $slider->id }}">
                        <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        let dropify = document.querySelector('.dropify-wrapper .dropify-errors-container');
        let wait = document.querySelector('.wait');
        
dropify.addEventListener('click', function() {
    wait.innerHTML = 'الفيديو تحت التحميص';
});

        
        if (dropify.innerHtml=="") {
            
        }else{
        }
        let editor;
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });


        let REFERENCES;
        ClassicEditor
            .create(document.querySelector('#REFERENCES'), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                }
            })
            .then(REFERENCES => {
                window.editor = REFERENCES;
            })
            .catch(err => {
                console.error(err.stack);
            });

        document.querySelector('form').addEventListener('submit', function(event) {
            // Get CKEditor instance and its content
            const editor = ClassicEditor.instances.editor;
            const editorContent = editor.getData();

            // Set the CKEditor content as the value of the hidden input field
            document.querySelector('#TEXT').value = editorContent;
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            // Get CKEditor instance and its content
            const editor = ClassicEditor.instances.editor;
            const editorContent22 = REFERENCES.getData();

            // Set the CKEditor content as the value of the hidden input field
            document.querySelector('#REFERENCES').value = editorContent22;
        });
    </script>
@endsection
