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
                            <input type="text" class="form-control" id="customerId" name="customerId"
                                aria-describedby="emailHelp" placeholder="Enter email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Customer Name</label>
                            <input type="text" class="form-control editable-field" id="customerName" name="name"
                                placeholder="john joe" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ContactNo </label>
                            <input type="text" class="form-control editable-field" id="contactNo" name="contactNo"
                                placeholder="john joe" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">NIC</label>
                            <input type="text" class="form-control editable-field" id="nic" name="nic"
                                placeholder="john joe" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" class="form-control editable-field" id="address" name="address"
                                placeholder="john joe" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber" aria-describedby="emailHelp"
                                name="vehicleNumber" placeholder="Enter email" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Make</label>
                            <input type="text" class="form-control editable-field" id="make" name="make" <div
                                class="mb-3" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Model</label>
                            <input type="text" class="form-control editable-field" id="model" name="model"
                                placeholder="john joe" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Year</label>
                            <input type="text" class="form-control editable-field" id="year" name="year"
                                placeholder="john joe" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Insuarence number</label>
                            <input type="text" class="form-control editable-field" id="vehicleInsurance"
                                name="insuranceNo" aria-describedby="emailHelp" placeholder="Enter email" disabled>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- Add an Edit button -->
                            <button type="button" class="btn btn-secondary" id="editButton">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>

    </div>

    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            function fetchData() {
                var vehicleNumber = $('#searchvehicleNumber').val();

                $.ajax({
                    url: '{{ route('fetchVehicleData') }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        vehicleNumber: vehicleNumber
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Print the response in the console

                        // Check if there's an error in the response
                        if (response.error) {
                            console.error(response.error);
                            // Handle the error (e.g., show a message to the user)
                            return;
                        }

                        // Update other fields based on the response
                        // Customer details
                        $('#customerId').val(response.customerData.customerId);
                        $('#customerName').val(response.customerData.name);
                        $('#contactNo').val(response.customerData.contactNo);
                        $('#nic').val(response.customerData.nic);
                        $('#address').val(response.customerData.address);
                        // Vehicle details
                        $('#vehicleNumber').val(response.vehicleData.vehicleNumber);
                        $('#make').val(response.vehicleData.make);
                        $('#model').val(response.vehicleData.model);
                        $('#year').val(response.vehicleData.year);
                    },
                    error: function(error) {
                        // Handle error
                        console.error(error);
                    }
                });
            }

            $('#searchvehicleNumber').on('input', function() {
                var inputValue = $(this).val();

                // Remove any existing hyphens
                inputValue = inputValue.replace('-', '');

                // Check if the last character is a digit
                if (/\d$/.test(inputValue)) {
                    // Insert a hyphen after the last letter
                    inputValue = inputValue.replace(/(\D+)(\d+)/, '$1-$2');
                }

                // Update the input value
                $(this).val(inputValue);
            });

            $('#searchvehicleNumber').on('blur', function() {
                fetchData();
            });

            // Function to enable/disable editable fields
            function toggleEditMode(enabled) {
                // Use the 'editable-field' class to select all editable fields
                $('.editable-field').prop('disabled', !enabled);
            }

            // Add click event for the Edit button
            $('#editButton').on('click', function() {
                // Toggle the edit mode when the button is clicked
                toggleEditMode(true);
            });

        });
    </script>

</body>

</html>
