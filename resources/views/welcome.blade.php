<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- included csrf for protection --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Automobile System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div id="contentContainer">
        <form action="#" method="POST" id="detailsForm">
            @csrf
            <div class="container mt-5">
                <div class="card">
                    <div id="message">
                        <!-- Display success message if it exists in the session -->
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            <script>
                                // Hide the message after 5 seconds
                                setTimeout(function() {
                                    $('#message').hide();
                                }, 5000);
                            </script>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            {{-- Vehicle no search field --}}
                            <label for="exampleInputEmail1" class="form-label">Vehicle No</label>
                            <input type="text" class="form-control" id="searchvehicleNumber" name="searchVehicleNo"
                                aria-describedby="emailHelp" placeholder="AB x x x x or ABC x x x x">
                        </div>
                        <div id="noRecordsMessage" style="display: none;">
                            <p>No records found</p>
                            {{-- <a href="#" id="customerpage">Create Customer Page</a> --}}
                            <a href="#" id="vehiclePage">Create A New Vehicle</a>
                        </div>

                    </div>
                </div>
            </div>
            <div id="form-body" style="display: none;">
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
                                <input type="text" class="form-control editable-field" id="customerName"
                                    name="name" placeholder="john joe" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ContactNo </label>
                                <input type="text" class="form-control editable-field" id="contactNo"
                                    name="contactNo" placeholder="john joe" disabled>
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
                                <input type="text" class="form-control" id="vehicleNumber"
                                    aria-describedby="emailHelp" name="vehicleNumber" placeholder="Enter email"
                                    disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Make</label>
                                <input type="text" class="form-control editable-field" id="make" name="make"
                                    class="mb-3" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Model</label>
                                <input type="text" class="form-control editable-field" id="model"
                                    name="model" placeholder="john joe" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Year</label>
                                <input type="text" class="form-control editable-field" id="year"
                                    name="year" placeholder="john joe" disabled>
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
                                    name="insuranceNo" aria-describedby="emailHelp" placeholder="Enter email"
                                    disabled>
                            </div>
                            <div class="mb-3" id="buttonGroup">
                                <button type="button" class="btn btn-secondary" id="editButton">Edit</button>
                                <button type="button" class="btn btn-success" id="invoiceButton1">Go to
                                    Invoice</button>
                                <button type="button" class="btn btn-success" id="submitButton"
                                    style="display: none;">Submit</button>
                                <button type="button" class="btn btn-danger" id="cancelButton"
                                    style="display: none;">Cancel</button>
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
            var originalFormData;

            function fetchData() {
                var vehicleNumber = $('#searchvehicleNumber').val();

                $.ajax({
                    url: '/fetchVehicleCustomerDataOld',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        vehicleNumber: vehicleNumber
                    },
                    dataType: 'json',
                    success: function(response) {

                        // Check if customerData is not empty
                        if (response.customerData !== null && response.customerData !== undefined) {

                            // Store the original form data
                            originalFormData = {
                                customerId: response.customerData.customerId,
                                customerName: response.customerData.name,
                                contactNo: response.customerData.contactNo,
                                nic: response.customerData.nic,
                                address: response.customerData.address,
                                vehicleNumber: response.vehicleData.vehicleNumber,
                                make: response.vehicleData.make,
                                model: response.vehicleData.model,
                                year: response.vehicleData.year,
                                insuranceNo: response.vehicleData
                                    .insuranceNo, // Make sure to adjust this based on your response structure
                            };

                            // Records found, update the form and show the form body
                            $('#noRecordsMessage').hide(); // Hide the message
                            $('#form-body').show(); // Show the form body

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
                            // Show the form-body
                            $('#form-body').show();
                        } else {
                            // No records found, show a message
                            $('#form-body').hide(); // Hide the form body
                            $('#noRecordsMessage').show(); // Show the message
                        }
                    }

                });
            }

            $('#searchvehicleNumber').on('input', function() {
                var inputValue = $(this).val();

                inputValue = inputValue.replace('-', '');

                if (/\d$/.test(inputValue)) {
                    inputValue = inputValue.replace(/(\D+)(\d+)/, '$1-$2');
                }

                $(this).val(inputValue);
            });

            // run fetchData function when user hit tab on search vehicle number field
            $('#searchvehicleNumber').on('blur', function() {
                fetchData();
            });

            // button to load invoice page
            // button to load invoice page
            $('#invoiceButton1').click(function() {
                var formData = {
                    customerId: $('#customerId').val(),
                    customerName: $('#customerName').val(),
                    contactNo: $('#contactNo').val(),
                    nic: $('#nic').val(),
                    address: $('#address').val(),
                    vehicleNumber: $('#vehicleNumber').val(),
                    make: $('#make').val(),
                    model: $('#model').val(),
                    year: $('#year').val(),
                    // insuranceNo: $('#vehicleInsurance').val(),
                };
                console.log(formData);
                // Perform AJAX request when the button is clicked
                $.ajax({
                    url: '/servicejobs',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        originalFormData: formData // Change key to match the controller
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('It works');
                        // Redirect to '/servicejobs' after a successful AJAX request
                        if (response.success) {
                            window.location.href = '/servicejobs';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed with status: " + status +
                            ", error: " + error);
                    }
                });
            });




            function toggleEditMode(enabled) {
                $('#searchvehicleNumber').prop('disabled', enabled);
                $('.editable-field').prop('disabled', !enabled);

                if (enabled) {
                    $('#editButton').hide();
                    $('#submitButton').show();
                    $('#cancelButton').show();
                } else {
                    $('#editButton').show();
                    $('#submitButton').hide();
                    $('#cancelButton').hide();
                }
            }

            $('#editButton').on('click', function(e) {
                e.preventDefault();
                toggleEditMode(true);
            });

            $('#submitButton').on('click', function(e) {
                e.preventDefault();
                // Additional logic for submission
                updateDatabase();
                toggleEditMode(false);
            });

            $('#cancelButton').on('click', function() {
                // Restore the original form data
                $('#customerId').val(originalFormData.customerId);
                $('#customerName').val(originalFormData.customerName);
                $('#contactNo').val(originalFormData.contactNo);
                $('#nic').val(originalFormData.nic);
                $('#address').val(originalFormData.address);
                $('#vehicleNumber').val(originalFormData.vehicleNumber);
                $('#make').val(originalFormData.make);
                $('#model').val(originalFormData.model);
                $('#year').val(originalFormData.year);
                $('#vehicleInsurance').val(originalFormData.insuranceNo);

                toggleEditMode(false);
            });

            function updateDatabase() {
                var formData = {
                    customerId: $('#customerId').val(),
                    customerName: $('#customerName').val(),
                    contactNo: $('#contactNo').val(),
                    nic: $('#nic').val(),
                    address: $('#address').val(),
                    vehicleNumber: $('#vehicleNumber').val(),
                    make: $('#make').val(),
                    model: $('#model').val(),
                    year: $('#year').val(),
                    // insuranceNo: $('#vehicleInsurance').val(),
                };

                $.ajax({
                    url: '{{ route('updateAllData') }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        formData: formData
                    },
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            // Optionally show a success message or perform other actions
                            console.log('Database records updated successfully.');
                        } else {
                            console.error('Failed to update database records.');
                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            // button to return create new customer page
            $('#vehiclePage').click(function() {
                // Perform AJAX request when the button is clicked
                $.ajax({
                    url: '/createVehicle', // Change this to the correct URL
                    type: 'GET',
                    success: function(response) {
                        // Assuming you have a container with the ID 'contentContainer'
                        $('#contentContainer').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed with status: " + status +
                            ", error: " + error);
                    }
                });
            });








        });
    </script>

</body>

</html>
