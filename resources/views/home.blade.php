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
    <form action="#" method="POST" id="detailsForm">
        @csrf
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        {{-- Vehicle no search field --}}
                        <label for="searchVehicleNo" class="form-label">Search Vehicle No</label>
                        <input type="text" class="form-control vehicleNumber" id="searchvehicleNumber"
                            name="searchVehicleNo" placeholder="AB x x x x or ABC x x x x">
                    </div>
                </div>
            </div>
        </div>
        {{-- Customer details --}}
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="customerId" class="form-label">Customer ID</label>
                        <input type="text" class="form-control" id="customerId" name="customerId"
                            placeholder="Customer ID" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="form-control editable-field" id="customerName" name="customerName"
                            placeholder="john Doe" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="contactNo" class="form-label">Contact Number </label>
                        <input type="text" class="form-control editable-field" id="contactNo" name="contactNo"
                            placeholder="07x xxx.." disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nic" class="form-label">NIC</label>
                        <input type="text" class="form-control editable-field" id="nic" name="nic"
                            placeholder="9xx..." disabled>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control editable-field" id="address" name="address"
                            placeholder="Noxx Colombo xx" disabled>
                    </div>
                </div>
            </div>
        </div>
        {{-- vehicle details  --}}
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="vehicleNumber" class="form-label">Vehicle Number</label>
                        <input type="text" class="form-control editable-field vehicleNumber" id="vehicleNumber"
                            name="vehicleNumber" placeholder="AB x x x x or ABC x x x x" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="make" class="form-label">Make</label>
                        <input type="text" class="form-control editable-field" id="make" name="make"
                            placeholder="Toyoxx" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control editable-field" id="model" name="model"
                            placeholder="Carinxx" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control editable-field" id="year" name="year"
                            placeholder="20xx" disabled>
                    </div>
                </div>
            </div>
        </div>
        {{-- Insurance details  --}}
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="insuranceNo" class="form-label">Insurance Policy Number</label>
                        <input type="text" class="form-control editable-field" id="insuranceNo"
                            name="insuranceNo" placeholder="000xx456" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Insurance Company</label>
                        <input type="text" class="form-control editable-field" id="insuranceCompany"
                            name="company" placeholder="Contxxx" disabled>
                    </div>
                    {{-- Buttons  --}}
                    <div class="mb-3" id="buttonGroup">
                        <button type="button" class="btn btn-secondary" id="editButton">Edit</button>
                        <button type="button" class="btn btn-success" id="invoiceButton">Go to
                            Invoice</button>
                        <button type="button" class="btn btn-danger" id="resetButton">Reset</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {

            // function to add '-' for vehicle number
            $('.vehicleNumber').on('input', function() {
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

            // search database using vehicle number and fetch data function
            function fetchData() {
                var vehicleNumber = $('#searchvehicleNumber').val();

                $.ajax({
                    url: '/fetchVehicleCustomerData',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        vehicleNumber: vehicleNumber
                    },
                    dataType: 'json',
                    success: function(response) {
                        // // Check if customerData is not empty
                        // if (response.customerData !== null && response.customerData !== undefined) {

                        //     // Store the original form data
                        //     originalFormData = {
                        //         customerId: response.customerData.customerId,
                        //         customerName: response.customerData.name,
                        //         contactNo: response.customerData.contactNo,
                        //         nic: response.customerData.nic,
                        //         address: response.customerData.address,
                        //         vehicleNumber: response.vehicleData.vehicleNumber,
                        //         make: response.vehicleData.make,
                        //         model: response.vehicleData.model,
                        //         year: response.vehicleData.year,
                        //         insuranceNo: response.vehicleData
                        //             .insuranceNo, // Make sure to adjust this based on your response structure
                        //     };

                        //     // Records found, update the form and show the form body
                        //     $('#noRecordsMessage').hide(); // Hide the message
                        //     $('#form-body').show(); // Show the form body

                        //     // Update other fields based on the response
                        //     // Customer details
                        //     $('#customerId').val(response.customerData.customerId);
                        //     $('#customerName').val(response.customerData.name);
                        //     $('#contactNo').val(response.customerData.contactNo);
                        //     $('#nic').val(response.customerData.nic);
                        //     $('#address').val(response.customerData.address);
                        //     // Vehicle details
                        //     $('#vehicleNumber').val(response.vehicleData.vehicleNumber);
                        //     $('#make').val(response.vehicleData.make);
                        //     $('#model').val(response.vehicleData.model);
                        //     $('#year').val(response.vehicleData.year);
                        //     // Show the form-body
                        //     $('#form-body').show();
                        // } else {
                        //     // No records found, show a message
                        //     $('#form-body').hide(); // Hide the form body
                        //     $('#noRecordsMessage').show(); // Show the message
                        // }
                    }

                });
            }

        });
    </script>

</body>

</html>
