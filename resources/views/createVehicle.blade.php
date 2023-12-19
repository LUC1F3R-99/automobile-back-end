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
        <form action="/createnewVehicle" method="POST" id="detailsForm">
            @csrf

            <div class="container mt-5">
                <div class="card">
                       <!-- Display success message if it exists in the session -->
                       @if(session('success'))
                       <div class="alert alert-success">
                           {{ session('success') }}
                       </div>
                       @endif
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="vehicleNumber" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="customerId" placeholder="Enter customerId">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Year</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="year" placeholder="Enter year">
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

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/createCustomer">Create Customer Page</a>


        </form>

    </div>



</body>

</html>
