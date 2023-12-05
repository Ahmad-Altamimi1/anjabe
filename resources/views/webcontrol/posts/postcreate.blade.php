@extends('layouts.dashboard')

@section('content')
    <style>
        .img-result img {
            width: 100% !important;
        }

        .hide {
            display: none;
        }
    </style>
    <?php 
    header('Access-Control-Allow-Credentials: true');
    ?>
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة مقال جديد</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/storeposts" enctype="multipart/form-data" method="POST" class="formBlog">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="TITLE">عنوان المقال</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ old('TITLE') }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان المقال مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <input type="datetime-local" class="form-control"
                                    @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER"
                                    value="{{ old('DATE_SCHEDULER') }}" autocomplete="DATE_SCHEDULER" autofocus>
                                @error('DATE_SCHEDULER')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>وقت النشر على الموقع مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>ْ

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="tital">تصنيف المقال</label>
                                <select id="TOPIC" name="TOPIC"
                                    class="form-control  @error('TOPIC') is-invalid @enderror select2">
                                    <option value="" selected></option>

                                    <?php
                                    ?>
                                    @foreach ($groups as $group)
                                        <?php
                                        $string = $group->TAG;
                                        $str_arr = explode(',', $string);
                                        $singletags = '';
                                        ?>
                                        @foreach ($str_arr as $stag)
                                            @foreach ($poststags as $singletag)
                                                @if ($stag == $singletag->id)
                                                    <option value="{{ $group->id }}">
                                                        <?php
                                                        $singletags .= $singletag->TITLE . '>';
                                                        ?>
                                                        {{ $singletags }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </option>
                                    @endforeach
                                </select>
                                @error('TOPIC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>تصنيف المقال مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="tital">تصنيف المقال</label>
                            <select id="TOPIC" name="TOPIC" class="form-control  @error('TOPIC') is-invalid @enderror select2">
                                <option value="" selected></option>
                                @foreach ($poststags as $poststag)
                                <option value="{{ $poststag->id }}">
                                {{ $poststag->TITLE }}
                                </option>
                                @endforeach
                            </select>
                            @error('TOPIC')
                            <span class="invalid-feedback" role="alert">
                                <strong>تصنيف المقال مطلوب</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}
                        {{-- <div class="row"> --}}

                            {{-- <div class="col-md-12 col-sm-12 col-12"> --}}
                                <main class="page w-100 ">
                                    <h4>ارفع الصورة</h4>
                                    <!-- input file -->
                                    <div class="box">
                                        <input type="file" id="file-input" accept="image/*">
                                    </div>
                                    <!-- leftbox -->
                                    <div class="box-2">
                                        <div class="result hide" style="height: 500px" ></div>
                                    </div>
                                    <!--rightbox-->
                                    <div class="box-2 img-result hide">
                                        <!-- result of crop -->
                                        <img id="myImage"  class="cropped" src="" style="height: 500px" alt="">
                                    </div>
                                    <!-- input file -->
                                    <div class="box">
                                        <div class="options ">
                                            <input type="number" class="img-w" value="300" min="100" 
                                                max="1200" />
                                        </div>
                                        <!-- save btn -->
                                        <div id="oldImage" style="display: none;"></div>
                                        <button class="btn save hide">تأكيد الصورة</button>
                                        <input type="hidden" name="image_data" id="image_data" />
                                    </div>
                                </main>

                            {{-- </div> --}}
                        {{-- </div> --}}
                    </div>

                    {{-- <div class="row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <label for="tital">صورة المقال</label>
                        <input type="file" id="IMG" name="IMG" class="dropify" />
                    </div>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
                            @error('IMG')
                            <strong>يجب إضافة صورة للبوست</strong>
                            @enderror
                        </div>
                    </div>
                </div> --}}


                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group pt-3">
                                <label for="ofpregnancy">هل هو من أشهر الحمل ؟</label>
                                <select id="ofpregnancy" class="form-control @error('ofpregnancy') is-invalid @enderror"
                                    name="ofpregnancy">
                                    <option value="1" {{ old('ofpregnancy') == '1' ? 'selected' : '' }}>نعم</option>
                                    <option value="0" {{ old('ofpregnancy') == '0' ? 'selected' : '' }} selected>لا
                                    </option>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group pt-3">
                                <label for="DESCRIPTION">وصف للصورة</label>
                                <input id="PIC_Name" type="text"
                                    class="form-control @error('PIC_Name') is-invalid @enderror" name="PIC_Name"
                                    value="{{ old('PIC_Name') }}" autocomplete="PIC_Name" autofocus>
                                @error('PIC_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>وصف للصورة مطلوب</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">الوصف</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ old('DESCRIPTION') }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح المقال مطلوب</strong>
                            </span>
                        @enderror
                    </div>


                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المقال</h5>
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="tinymce-wrap">
                                            <textarea id="editor" name="TEXT">{{ old('TEXT') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="color: red;" class="col-sm">
                                        @error('TEXT')
                                            <strong>يجب إضافةالمقال</strong>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المراجع</h5>
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="tinymce-wrap">
                                            <textarea id="REFERENCES" name="REFERENCES">{{ old('REFERENCES') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="color: red;" class="col-sm">
                                        @error('TEXT')
                                            <strong>يجب إضافة مرجع</strong>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>



                    <!-- /Row -->
                    <div class="row pt-4">
                        <div class="col-sm">
                            <button class="btn btn-primary" type="submit" id="uploadButton">إضافة</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </section>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let editor;
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    language: {
                        ui: 'en',
                        content: 'ar'
                    }
                })
                .then(createdEditor => {
                    editor = createdEditor;
                })
                .catch(err => {
                    console.error(err.stack);
                });

            let referencesEditor;
            ClassicEditor
                .create(document.querySelector('#REFERENCES'), {
                    language: {
                        ui: 'en',
                        content: 'ar'
                    }
                })
                .then(createdEditor => {
                    referencesEditor = createdEditor;
                })
                .catch(err => {
                    console.error(err.stack);
                });

            document.querySelector('form').addEventListener('submit', function(event) {
                // Get CKEditor content for the main text area
                const editorContent = editor.getData();
                document.querySelector('#TEXT').value = editorContent;

                // Get CKEditor content for the REFERENCES text area
                const referencesContent = referencesEditor.getData();
                document.querySelector('#REFERENCES').value = referencesContent;
            });
        });
    </script>
@endsection
