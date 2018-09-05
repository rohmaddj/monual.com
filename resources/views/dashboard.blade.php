
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Monual Admin Page</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Monual Admin Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <!-- <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul> -->
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
      <img src="https://png.icons8.com/color/260/user-male-circle.png"
           height="50px" width="50px"/>
      <h4 style="color:white; margin:5px">Welcome</h4>
      <a class="btn btn-primary" href="{{ route('login') }}" role="button">Logout</a>
    </nav>

    <main role="main" class="container">
      <div id="notice"></div>

      <div class="starter-template">
        <h1>List of Partners</h1>
        <button type="button" class="btn btn-primary btn-lg" style="margin-bottom:25px" data-toggle="modal" data-target="#add-partner">Add Partner</button>

        <table id="partner" class="display">
          <thead>
              <tr>
                  <th>Partner Logo</th>
                  <th>Description</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($partners as $partner)
                <tr>
                    <td><img src="{{ asset('uploads/partner-image/'.$partner['image']) }}" width="100px" height="100px" /></td>
                    <td>{{ $partner['description'] }}</td>
                    <td>
                        <form action="{{ route('delete.partner', $partner['id']) }}" method="post">
                            <a onclick="getPartnerById( {{ $partner['id'] }} )" data-container="body" class="btn btn-info" data-id="{{ $partner['id'] }}" data-original-title="Edit" style="color:white">Edit</a>
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit" data-toggle="tooltip" data-container="body" data-id="{{ $partner['id'] }}" data-original-title="Delete">Delete</button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
      </table>
      </div>

    </main><!-- /.container -->

    <!-- Add Partner Modal -->
    <div class="modal fade" id="add-partner" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Partner</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label>Partner Logo</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="filebroh">
                  <label class="custom-file-label" id="namebroh">Choose file</label>
			            <input type="hidden" id="file_name"/>
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Enter description"></textarea>
              </div>
              <input type="hidden" value="{{ csrf_token() }}" name="token">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="add" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Partner Modal -->
    <div class="modal fade" id="edit-partner" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Partner</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <label>Partner Logo</label>
              <img id="imagepartner" style="margin-left:70px;margin-bottom:15px" width="100px" height="100px"/>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="filebroh">
                  <label class="custom-file-label" id="namebroh">Choose file</label>
			            <input type="hidden" id="file_name" name="file_name"/>
                </div>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea type="text" class="form-control" name="description" placeholder="Enter description"></textarea>
              </div>
              <input type="hidden" value="{{ csrf_token() }}" name="token">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" name="save" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function ()
        {
            $('#partner').DataTable({
              "searching": false,
              "columnDefs": [
                  { "width": "20%", "targets": 0 }, { "targets": 2, "width": "20%" }, { "targets": [0,2], "orderable": false }
                ]
            });
        });

        $('#filebroh').change(function () {
            if ($(this).val() != '') {
                upload(this);
            }
        });

        function upload(img)
        {
            var form_data = new FormData();
            form_data.append('file', img.files[0]);
            form_data.append('_token', '{{csrf_token()}}');
            $.ajax({
                url: "{{ route('partner.image.upload') }}",
                data: form_data,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.fail) {
                        alert(data.errors['file']);
                    }
                    else {
                        $('#file_name').val(data);
                    }
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

        $('#add').on('click', function() {
          var formData = {
            'image': $('#file_name').val(),
            'description': $('textarea[name=description]').val(),
            '_token' : $('input[name=token]').val()
          }

          $.ajax({
                type: 'post',
                url: '{{ route('add.partner') }}',
                data: formData,
                success: function() {
                  $('#add-partner').modal('toggle');
                  $('#notice').append('<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">×</span> <span class="sr-only">Close</span> </button> <strong>Well done!</strong> Success add partner!</div>');
                    setTimeout(function () {
                        $('.alert').remove();
                        // window.location = "{{ route('dashboard') }}";
                        location.reload();
                    }, 2500);

                }, error: function (xhr, ajaxOptions, thrownError) {
                    $('#notice').append('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">×</span> <span class="sr-only">Close</span> </button> <strong>Oh snap! </strong> Please fill the form correctly!</div>');
                    setTimeout(function () {
                        $('.alert').remove();
                    }, 2000);
                    //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
              });
        });

        function getPartnerById(id)
        {

          var editPartner = $('#edit-partner');
          var url = '{{ route("get.partnerById", ":id") }}';
	        url = url.replace(':id', id);
          var img_dir = '{{ asset('uploads/partner-image/') }}';

            $.ajax({
              type: 'get',
              url: url,
              success: function(json) {

                editPartner.modal('toggle');
                $('#imagepartner').attr('src', img_dir + '/' + json.partner.image);
                editPartner.find('input[name=file_name]').val(json.partner.image);
                editPartner.find('textarea[name=description]').val(json.partner.description);

              }
            });

            editPartner.find('#filebroh').change(function () {
                if ($(this).val() != '') {
                    upload(this);
                }
            });

            function upload(img)
            {
                var form_data = new FormData();
                form_data.append('file', img.files[0]);
                form_data.append('_token', '{{csrf_token()}}');
                $.ajax({
                    url: "{{ route('partner.image.upload') }}",
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.fail) {
                            alert(data.errors['file']);
                        }
                        else {
                            editPartner.find('#file_name').val(data);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }

            editPartner.find('.btn[name=save]').on('click', function() {
                var data = {
                  'image': editPartner.find('input[name=file_name]').val(),
                  'description': editPartner.find('textarea[name=description]').val(),
                  '_token': editPartner.find('input[name=token]').val(),
                  'id': id
                }

                var saveurl = '{{ route("put.partner", ":id") }}';
	        	    saveurl = saveurl.replace(':id', id);

                $.ajax({
                  type: 'put',
                  url: saveurl,
                  data: data,
                  success: function() {
  	        			location.reload();

    	        		}, error: function (response) {

                    		alert("Please fill the form or check your internet connection")
                	}

                });
            });
        }

    </script>
  </body>
</html>
