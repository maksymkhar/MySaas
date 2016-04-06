@extends('layouts.app')

@section('htmlheader_title')
    Invoice Generator
@endsection

@section('custom_scripts')

        <!-- USING LATEST VERSION, NEED PNG PLUGINS FOR PNG SUPPORT -->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>

    <script>

        // Image selector
        image = $('#image');
        img_data = {};

        // Image selector listener
        image.change(function() {

            var user_file = image[0].files[0];

            img_data = {
                type: user_file.type === 'image/jpeg' ? 'JPEG' : 'PNG'
            };

            var reader = new FileReader();

            reader.onload = function(event) {

                img_data.src = event.target.result;
                updatePdf();
            };

            reader.readAsDataURL(user_file);
        });




        function generatePdf()
        {
            pdf = new jsPDF('p', 'mm', 'a4');

            pdf.text($('#title').val(), 20, 20);
            pdf.text($('#description').val(), 20, 40);

            if (img_data.src != null) {
                pdf.addImage(img_data.src, img_data.type, 180, 10, 20, 20);
            }

            return pdf;
        }


        function downloadPdf() {

            pdf = generatePdf();

            pdf.save("generated.pdf");
        }


        function updatePdf() {

            pdf = generatePdf();

            $('#pdf_preview').attr('src', pdf.output('datauristring'));
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

                    <div class="form-group">
                        <label>Logo</label>
                        <input id="image" type="file" tabindex="1">
                    </div>

                    <div class="form-group">
                        <button id="refresh_btn" class="btn btn-large btn-success" onclick="updatePdf()">Refresh</button>
                        <button id="download_btn" class="btn btn-large btn-primary" onclick="downloadPdf()">Download</button>
                    </div>



                </div>

            </div>

            <div class="col-sm-6">
                <iframe style="width: 100%; height: 750px;" id="pdf_preview" type="application/pdf" src=""></iframe>
            </div>

        </div>
    </div>











@endsection