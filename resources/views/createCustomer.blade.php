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
        <form action="/createnewCustomer" method="POST" id="detailsForm">
            @csrf

            <div class="container mt-5">
                <div class="card">
                    <!-- Display success message if it exists in the session -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="customerId" aria-describedby="emailHelp"
                                name="customerId" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="name" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">contactNo </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="contactNo" placeholder="Enter customerId">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">nic</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="nic" placeholder="Enter year">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">address</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="address" <div
                                class="mb-3">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/createVehicle">Create Vehilce Page</a>

        </form>

    </div>

    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <!-- Script to auto-fill the customer ID on document load -->
    <script>
        // Function to fetch the next customer ID from the server
        function fetchNextCustomerId() {
            return $.get('{{ route('fetchNextCustomerId') }}');
        }

        // Auto-fill the customer ID field on document load
        $(document).ready(function() {
            // Fetch the next customer ID from the server
            fetchNextCustomerId().done(function(response) {
                // Check if the response is successful and contains the next customer ID
                if (response && response.nextCustomerId) {
                    // Set the next customer ID in the customer ID field
                    $("#customerId").val(response.nextCustomerId);
                } else {
                    console.error('Failed to fetch next customer ID.');
                }
            }).fail(function(error) {
                console.error('Error fetching next customer ID:', error);
            });
        });
    </script>

</body>

</html>
