<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- included csrf for protection --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Card Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div>
        <form action="#" method="POST" id="detailsForm">
            @csrf
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            {{-- Vehicle no search field --}}
                            <label for="exampleInputEmail1" class="form-label">Vehicle No</label>
                            <input type="text" class="form-control" id="searchvehicleNumber" name="searchVehicleNo"
                                aria-describedby="emailHelp" placeholder="AB x x x x or ABC x x x x">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="customerId"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="customerName"
                                placeholder="john joe">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="vehicleNumber" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Make</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="make" <div
                                class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Model</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="model"
                                placeholder="john joe">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Insuarence number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insuranceNo"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            // get the id of detailsForm
            $('#detailsForm').submit(function (e) {
                e.preventDefault();

                 //save form data to fd constant
                 const fd = new FormData(this);

                $.ajax({
                    url: '{{ route('fetchAllData') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        // handle the response from the server
                        console.log(response);
                    }
                });
            });
        });

    </script>

</body>

</html>
