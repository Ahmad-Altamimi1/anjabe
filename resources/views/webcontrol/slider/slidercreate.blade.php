@extends('layouts.dashboard')

@section('content')
<section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
    <h5 class="hk-sec-title">إضافة سلايدر جديد</h5>
    <div class="row">
        <div class="col-sm">
            <form action="/storeslider" enctype="multipart/form-data" method="POST">
                @csrf

        

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-6">
                        <div class="form-group">
                            <label for="tital"> المقال المراد عرضه في السلايدر</label>
                            <select id="post_id" name="post_id" class="form-control  @error('post_id') is-invalid @enderror select2">
                                <option value="" selected></option>
                                @foreach ($posts as $post)
                                <option value="{{ $post->id }}">
                                {{ $post->TITLE }}
                                </option>
                                @endforeach
                            </select>
                            @error('post_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                
                    
                    <div class="col-md-12 col-sm-12 col-12">
                        <label for="tital">او يمكنك أضافة فيديو</label>
                        <input type="file" id="video" name="video" class="dropify" />
                    </div>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
           @error('video')
                            <span class="invalid-feedback" role="alert">

            <strong>{{ $message }}</strong>
        @enderror
                        </div>
                    </div>
                    <div class="preloader" style="display: none;">
    <!-- Add your preloader HTML or use a library like Spin.js -->
 
    Loading...
</div>
                </div>

                </div>

 <div class="col-md-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label class="control-label mb-10">وقت النشر</label>
                            <input type="datetime-local" class="form-control" @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER" value="{{ old('DATE_SCHEDULER') }}" autocomplete="DATE_SCHEDULER" autofocus>
                            @error('DATE_SCHEDULER')
                            <span class="invalid-feedback" role="alert">
                                <strong>وقت النشر على الموقع مطلوب</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                

                <div class="form-group pt-3">
                    <label for="DESCRIPTION">الوصف</label>
                    <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror mt-15" rows="6" id="DESCRIPTION" name="DESCRIPTION">{{ old('DESCRIPTION') }}</textarea>
                    @error('DESCRIPTION')
                    <span class="invalid-feedback" role="alert">
                        <strong>شرح المقال مطلوب</strong>
                    </span>
                    @enderror
                </div>


                <!-- Row -->
               

                <!-- Row -->
             



                <!-- /Row -->
                <div class="row pt-4">
                    <div class="col-sm">
                        <button class="btn btn-primary" type="submit">إضافة</button>
                    </div>
                </div>


            </form>

        </div>
    </div>
</section>
<script src="{{ url('https://code.jquery.com/jquery-3.6.4.min.js') }}"></script>

<script>

    $(document).ready(function () {
        // Initialize Dropify
        $('.dropify').dropify();

        // Add event listener for the video upload
        $('.dropify').on('dropify.beforeClear', function (event, element) {
            // Show preloader here
            $('.preloader').show();
        });

        // Add event listener for after the video is uploaded
        $('.dropify').on('dropify.afterClear', function (event, element) {
            // Hide preloader here
            $('.preloader').hide();
        });
    });


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
