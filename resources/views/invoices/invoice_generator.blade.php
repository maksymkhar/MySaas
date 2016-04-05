@extends('layouts.app')

@section('htmlheader_title')
    Invoice Generator
@endsection

@section('custom_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

    <script>

        //var doc = new jsPDF();
        //doc.text(20, 20, 'Hello world.');
        //doc.save('Test.pdf');


        var preview_container = $('#pdf_preview');
        var update_preview_button = $('#refresh_btn');
        var download_button = $('#download_btn');



        //preview_container.attr('src', pdf.output('datauristring'));


        updatePdf = function () {

            var pdf = new jsPDF('p', 'mm', 'a4');

            pdf.text($('#title').val(), 20, 20);
            pdf.text($('#description').val(), 20, 40);

            preview_container.attr('src', pdf.output('datauristring'));
        }

        updatePdf();



    </script>

@endsection

@section('main-content')

    <div class="container-fluid flyer-builder">

        <div class="row">


            <div class="col-sm-6">

                <div class="form-group">

                    <div class="form-group">
                        <label>Title</label>
                        <input id="title" class="form-control" placeholder="Invoice title" onblur="updatePdf()">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="description" class="form-control" placeholder="Invoice description" rows="3" onblur="updatePdf()"></textarea>
                    </div>
                    <!--div class="form-group">
                        <label>Logo</label>
                        <input id="image" type="file">
                    </div-->

                    <div class="form-group">
                        <button id="refresh_btn" class="btn btn-large btn-success" onclick="updatePdf()">Refresh</button>
                        <button id="download_btn" class="btn btn-large btn-primary">Download</button>
                    </div>



                </div>

            </div>

            <div class="col-sm-6">
                <iframe style="width: 100%; height: 750px;" id="pdf_preview" type="application/pdf" src=""></iframe>
            </div>

        </div>
    </div>











@endsection