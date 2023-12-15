@extends('cms.wrapper')
@section('contenido_cms')
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Components</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Nueva publicación</h5>
                    <form class="row g-3" action="{{ route('publicacion') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group pb-3">
                                    <label for="titulo" class="form-label">Titulo de la publicación</label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="titulo" placeholder="Titulo"
                                            name="titulo" value="{{ old('titulo') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">title</i>
                                        </span>
                                    </div>
                                    @error('titulo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="imagen" class="form-label">Imagen de la noticia</label>
                                    <div class="position-relative input-icon">
                                        <input type="file" class="form-control ps-5"
                                            accept="image/jpg,image/png,image/jpeg" id="imagen" name="imagen"
                                            onchange="previewImage()">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">image</i>
                                        </span>
                                    </div>
                                    @error('imagen')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="id_categoria" class="form-label">Categoria</label>
                                    <div class="position-relative input-icon">
                                        <select id="id_categoria" class="form-select ps-5" name="id_categoria">
                                            <option value="">[ Seleccionar categoria ]</option>
                                            @foreach ($categorias as $item)
                                                <option value="{{ $item->id_categoria }}"
                                                    {{ old('id_categoria') == $item->id_categoria ? 'selected' : '' }}>
                                                    {{ $item->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">category</i>
                                        </span>
                                    </div>
                                    @error('id_categoria')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="descripcion" class="form-label">Descripcion de la publicación</label>
                                    <textarea rows="5" class="form-control" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
                                </div>
                                @error('descripcion')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <img src="{{ asset('placeholder.jpg') }}" class="w-100 h-100" alt=""
                                    id="preview_imagen">
                            </div>
                        </div>
                        <div class="col-12 form-group pb-3">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-success px-4">Guardar</button>
                                <button type="reset" class="btn btn-light px-4">Restablecer</button>
                                <a href="{{ route('contenido') }}" class="btn btn-secondary px-4">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets_cms/richtext/jquery.richtext.min.js') }}"></script>
    <script>
        function previewImage() {
            var reader = new FileReader();
            reader.readAsDataURL(document.getElementById('imagen').files[0]);
            reader.onload = function(e) {
                document.getElementById('preview_imagen').src = e.target.result;
            };
        }

        $('#descripcion').richText({

            // text formatting
            bold: true,
            italic: true,
            underline: true,

            // text alignment
            leftAlign: true,
            centerAlign: true,
            rightAlign: true,
            justify: true,

            // lists
            ol: true,
            ul: true,

            // title
            heading: true,

            // fonts
            fonts: true,
            fontList: ["Arial",
                "Arial Black",
                "Comic Sans MS",
                "Courier New",
                "Geneva",
                "Georgia",
                "Helvetica",
                "Impact",
                "Lucida Console",
                "Tahoma",
                "Times New Roman",
                "Verdana"
            ],
            fontColor: true,
            backgroundColor: true,
            fontSize: true,

            // uploads
            // imageUpload: true,
            // fileUpload: true,

            // link
            urls: true,

            // tables
            table: true,

            // code
            removeStyles: true,
            code: true,

            // colors
            colors: [],

            // dropdowns
            fileHTML: '',
            imageHTML: '',

            // translations
            translations: {
                'title': 'Title',
                'white': 'White',
                'black': 'Black',
                'brown': 'Brown',
                'beige': 'Beige',
                'darkBlue': 'Dark Blue',
                'blue': 'Blue',
                'lightBlue': 'Light Blue',
                'darkRed': 'Dark Red',
                'red': 'Red',
                'darkGreen': 'Dark Green',
                'green': 'Green',
                'purple': 'Purple',
                'darkTurquois': 'Dark Turquois',
                'turquois': 'Turquois',
                'darkOrange': 'Dark Orange',
                'orange': 'Orange',
                'yellow': 'Yellow',
                'imageURL': 'Image URL',
                'fileURL': 'File URL',
                'linkText': 'Link text',
                'url': 'URL',
                'size': 'Size',
                'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>',
                'text': 'Text',
                'openIn': 'Open in',
                'sameTab': 'Same tab',
                'newTab': 'New tab',
                'align': 'Align',
                'left': 'Left',
                'justify': 'Justify',
                'center': 'Center',
                'right': 'Right',
                'rows': 'Rows',
                'columns': 'Columns',
                'add': 'Add',
                'pleaseEnterURL': 'Please enter an URL',
                'videoURLnotSupported': 'Video URL not supported',
                'pleaseSelectImage': 'Please select an image',
                'pleaseSelectFile': 'Please select a file',
                'bold': 'Bold',
                'italic': 'Italic',
                'underline': 'Underline',
                'alignLeft': 'Align left',
                'alignCenter': 'Align centered',
                'alignRight': 'Align right',
                'addOrderedList': 'Ordered list',
                'addUnorderedList': 'Unordered list',
                'addHeading': 'Heading/title',
                'addFont': 'Font',
                'addFontColor': 'Font color',
                'addBackgroundColor': 'Background color',
                'addFontSize': 'Font size',
                'addImage': 'Add image',
                'addVideo': 'Add video',
                'addFile': 'Add file',
                'addURL': 'Add URL',
                'addTable': 'Add table',
                'removeStyles': 'Remove styles',
                'code': 'Show HTML code',
                'undo': 'Undo',
                'redo': 'Redo',
                'save': 'Save',
                'close': 'Close'
            },

            // privacy
            youtubeCookies: false,

            // preview
            preview: false,

            // placeholder
            placeholder: '',

            // dev settings
            useSingleQuotes: false,
            height: 0,
            heightPercentage: 0,
            adaptiveHeight: false,
            id: "",
            class: "",
            useParagraph: false,
            maxlength: 0,
            maxlengthIncludeHTML: false,
            callback: undefined,
            useTabForNext: false,
            save: false,
            saveCallback: undefined,
            saveOnBlur: 0,
            undoRedo: true

        });
    </script>
@endsection
