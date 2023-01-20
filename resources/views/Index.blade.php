<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


</head>

<body>
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GCgen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" id="navCatbtn" data-bs-toggle="modal" data-bs-target="#addCategory">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/claim" class="nav-link" id="navClaimroute">ClaimRoute</a>
            </li>
          </ul>
      </div>
    </div>
  </nav>
  @php
    $generator = new Picqer\Barcode\BarcodeGeneratorSVG();
  @endphp

  {{-- <h1 class="m-4">{!! $generator->getBarcode('0001245259636', $generator::TYPE_CODE_128) !!}</h1> --}}

  <div class="container-fluid mt-5">
    <table id="GcTable" class="table  table-sm table-striped" style="width:100%">
      <thead>
        <tr>
          <th>Transac No.</th>
          <th>Gc type</th>
          <th>UUID</th>
          <th>Date Expire</th>
          <th>Date Gen</th>
          <th>Date used</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody style="vertical-align: middle">
      </tbody>
    </table>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="addCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn btn-primary modal-title" data-bs-toggle="modal" data-bs-target="#categoryAddModal">
            Add Category
          </button>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table id="GcCategoryTable" class="table compact table-sm table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Code</th>
                <th>Description</th>
                <th>DateCreated</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody style="vertical-align: middle">
            </tbody>
            <tfoot>
              <tr>
                <th>Code</th>
                <th>Description</th>
                <th>DateCreated</th>
                <th>Actions</th>
              </tr>
            </tfoot>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="genGcModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Gift Certificate</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="expdate" placeholder="1">
            <label for="expdate">Expire Date</label>
          </div>

          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="expdate" placeholder="1">
            <label for="expdate">Series</label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="gcamount" placeholder="1">
            <label for="gcamount">Amount</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="gennumber" placeholder="1">
            <label for="gennumber">Number of Gc generate</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCategory">Cancel</button>
          <button type="button" id="genGCbtn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addCategory">Generate</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="categoryAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
          <p hidden class="text-muted ">Generated <span class="badge bg-danger">Code. <span id="gcSN"></span></span>
          </p>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" maxlength="10" id="gcType" placeholder="Gc Type">
            <label for="gcType">Gift Certificate Type</label>
          </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="gcDesc" style="height: 100px"></textarea>
            <label for="gcDesc">Gift Certificate Description</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCategory">Close</button>
          <button type="button" id="saveCategoryBtn" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="catDel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
          <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#addCategory" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCategory">Cancel</button>
          <button type="button" id="delCatBtnModal" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.16/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {


      let res;
      const ajaxLoad = (xhr) => {
        // console.log(xhr);
        Swal.fire({
          icon: xhr.status == 200 ? "success" : "error",
          title: xhr.status == 200 ? "Status Success" : xhr.status,
          text: xhr.statusText === "OK" ? "" : xhr.statusText,
          showConfirmButton: false,
          timer: 1500
        })
      }

      //   Global BAr

      let forGen = [];


      $('#GcTable').DataTable({
        processing: true,
        serverSide: true,
        deferRender: true,
        ajax: '/text',
        columns: [{
            data: 'id',
            width: '5%'
          },
          {
            data: 'gctype',
            width: '2%'
          },
          {
            data: 'uuid',
            width: '10%'
          },
          {
            data: 'expdatae',
            width: '5%'
          },
          {
            data: 'gendate',
            width: '5%'
          },
          {
            data: 'dateuse',
            width: '5%'
          },
          {
            data: 'amount',
            width: '5%'
          },
        //   {
        //     data: 'action',
        //     width: '1%'
        //   },
        ],
        // columnDefs: [{
        //   targets: -1,
        //   render: function(data, type, row) {
        //     return `<div class="btn-group btn-group-sm" role="group">
        //           <button type="button" id="genQrdt" data-bs-toggle="modal" data-bs-target="#genGcModal" class="btn btn-primary"><i class="bi bi-qr-code"></i></button>
        //           <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
        //           <button type="button" data-id="" id="del-btn" class="btn btn-danger"><i class="bi bi-trash"></i></button>
        //          </div>
        //          `;
        //   }
        // }]
      });


      $('#navCatbtn').click(function(e) {
        e.preventDefault();

        $('#GcCategoryTable').DataTable().destroy();
        let GcCategoryTable = $('#GcCategoryTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '/GCindex',
          columns: [{
              data: 'gctype',
              title: 'Gc Types'
            },
            {
              data: 'gcdesc',
              title: 'Gc Desc',
              orderable: false
            },
            {
              data: 'datecreated',
              title: 'DateCreates',
              orderable: true
            },
            {

              data: 'id',
              width: '10%',
              orderable: false,
            }
          ],
          columnDefs: [{
            targets: -1,
            render: function(data, type, row) {
              return `<div class="btn-group btn-group-sm" role="group">
                  <button type="button" id="genQrdt" data-bs-toggle="modal" data-bs-target="#genGcModal" class="btn btn-primary"><i class="bi bi-qr-code"></i></button>
                  <button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>
                  <button type="button" data-id="${row.uuid}" id="del-btn" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                 </div>
                 `;
            }
          }]
        });

        $('#GcCategoryTable tbody').on('click', '#genQrdt', function() {
          forGen = [];
          let data = GcCategoryTable.row($(this).parents('tr')).data();
          forGen = data;
        });

        $('#GcCategoryTable tbody').on('click', '#del-btn', function() {
          let data = GcCategoryTable.row($(this).parents('tr')).data();
          //   $('#delCatBtnModal').attr("data-id", data.uuid);

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                type: "delete",
                url: "GCindex/" + $(this).attr('data-id'),
                data: {
                  _token: "{{ csrf_token() }}"
                },
                success: function(response, xhr, data) {
                  res = data;
                  ajaxLoad(res);

                  $('#GcCategoryTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                  res = xhr;
                  ajaxLoad(res);
                }
              });
            }
          })


        });
      });




      $('#gcType').keyup(function(e) {
        if ($(this).val() === "") {
          $('#gcSN').html('');
          return;
        }
        let SN = ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
          (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
        );
        $('#gcSN').html($(this).val() + '-' + SN);
      });



      $('#saveCategoryBtn').click(function(e) {
        e.preventDefault();
        let datas = {
          gcSN: $('#gcSN').text(),
          gcType: $('#gcType').val(),
          gcDesc: $('#gcDesc').val(),
          _token: "{{ csrf_token() }}",
        }

        $.ajax({
          type: "post",
          url: "GCindex",
          data: datas,
          success: function(response, xhr, data) {
            res = data;
            ajaxLoad(res);
            $('#navCatbtn').trigger("click");
            // $('#GcCategoryTable').DataTable().ajax.reload();
          },
          error: function(xhr) {
            res = xhr;
            ajaxLoad(res);
          }
        });

      });

      $('#genGCbtn').click(function(e) {
        e.preventDefault();
        let dd = {
          expdate: $('#expdate').val(),
          gcamount: $('#gcamount').val(),
          gennumber: $('#gennumber').val(),
          catid: forGen.id,
          _token: "{{ csrf_token() }}"
        }
        $.ajax({
          type: "post",
          url: "GCindex/gen",
          data: dd,
          success: function(response, xhr, data) {

            if (response.status) {
              sWal(response);
            }
            sWal(response);
          }
        });


      });

    });


    function sWal(response) {
      Swal.fire({
        icon: response.status == true ? 'success' : 'error',
        title: response.message,
        showConfirmButton: false
      })
    }
  </script>
</body>

</html>
