<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- included csrf for protection --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Automobile System 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <form action="#" method="POST" id="detailsForm">
        @csrf
        {{-- vehicle details  --}}
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        {{-- Vehicle no search field --}}
                        <label for="searchVehicleNo" class="form-label">Search Vehicle Number</label>
                        <input type="text" class="form-control vehicleNumber" id="searchvehicleNumber"
                            name="vehicleNumber" placeholder="AB x x x x or ABC x x x x">
                    </div>
                    <div class="mb-3">
                        <label for="make" class="form-label">Make</label>
                        <input type="text" class="form-control editable-field" id="make" name="make"
                            placeholder="Toyoxx">
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control editable-field" id="model" name="model"
                            placeholder="Carinxx">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control editable-field" id="year" name="year"
                            placeholder="20xx">
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
                            placeholder="cust0xx">
                    </div>
                    <div class="mb-3">
                        <label for="customerName" class="form-label">Customer Name</label>
                        <input type="text" class="form-control editable-field" id="customerName" name="customerName"
                            placeholder="john Doe">
                    </div>
                    <div class="mb-3">
                        <label for="contactNo" class="form-label">Contact Number </label>
                        <input type="text" class="form-control editable-field" id="contactNo" name="contactNo"
                            placeholder="07x xxx..">
                    </div>
                    <div class="mb-3">
                        <label for="nic" class="form-label">NIC</label>
                        <input type="text" class="form-control editable-field" id="nic" name="nic"
                            placeholder="9xx...">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control editable-field" id="address" name="address"
                            placeholder="Noxx Colombo xx">
                    </div>
                </div>
            </div>
        </div>

        {{-- Insurance details  --}}
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="insuranceNo" class="form-label">Insurance Policy Number</label>
                        <input type="text" class="form-control editable-field" id="insuranceNo" name="insuranceNo"
                            placeholder="000xx456">
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Insurance Company</label>
                        <input type="text" class="form-control editable-field" id="insuranceCompany"
                            name="insuranceCompany" placeholder="Contxxx">
                    </div>
                    <div class="mb-3">
                        <label for="accidentYear" class="form-label">Accident Year</label>
                        <input type="text" class="form-control editable-field" id="accidentYear"
                            name="accidentYear" placeholder="20xx">
                    </div>
                    {{-- Buttons  --}}
                    <button type="submit" class="btn btn-success" id="fillButton" name="action"
                        value="fill">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
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

            // run fetchData function when user hit ender or on search vehicle number field
            $('#detailsForm').submit(function(e) {
                e.preventDefault();
                //save form data to formData constant
                const formData = new FormData(this);
                // Check if the input field is not empty
                const searchVehicleNumberValue = $('#searchvehicleNumber').val().trim();
                if (searchVehicleNumberValue !== "") {
                    // Append the action parameter with the value 'fill'
                    formData.append('action', 'fill');

                    $.ajax({
                        url: '/getVehicleDetails',
                        method: 'post',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            // Check if customerData is not empty
                            if (response.message !== null) {

                                // Update fields based on the response
                                // Vehicle details
                                $('#make').val(response.make);
                                $('#model').val(response.model);
                                $('#year').val(response.year);
                                // Customer details
                                $('#customerId').val(response.customerId);
                                $('#customerName').val(response.name);
                                $('#contactNo').val(response.contactNo);
                                $('#nic').val(response.nic);
                                $('#address').val(response.address);
                                //Insurance details
                                $('#insuranceNo').val(response.insuranceId !== null ? response
                                    .insuranceId :
                                    'N/A');
                                $('#insuranceCompany').val(response.company !== null ? response
                                    .company :
                                    'N/A');
                                $('#accidentYear').val(response.accidentYear !== null ? response
                                    .accidentYear : 'N/A');

                                console.log(response.message);

                            }

                        }

                    });
                } else {

                }

            });

            // function to add '-' for vehicle number and trigger searchVehicle function
            $('.vehicleNumber').on('input', function() {
                var inputValue = $(this).val();

                inputValue = inputValue.replace('-', '');

                if (/\d$/.test(inputValue)) {
                    inputValue = inputValue.replace(/(\D+)(\d+)/, '$1-$2');
                }

                $(this).val(inputValue);
                console.log('Formatted Output:', inputValue);

                //check if the search value is empty
                if (inputValue.trim() !== "") {
                    //call search funtion
                    searchVehicle(inputValue);
                }
            });

            //serach for existing records funtion
            function searchVehicle(searchvehicleNumber) {
                $.ajax({
                    url: '/getVehicleDetails',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        vehicleNumber: searchvehicleNumber,
                        action: 'search'
                    },
                    dataType: 'json',
                    success: function(response) {

                        if (response.data) {
                            // Update other fields based on the response
                            // Vehicle details
                            $('#searchvehicleNumber').val(response.data.vehicleNumber);
                            $('#make').val(response.data.make);
                            $('#model').val(response.data.model);
                            $('#year').val(response.data.year);
                            // Customer details
                            $('#customerId').val(response.data.customerId);
                            $('#customerName').val(response.data.name);
                            $('#contactNo').val(response.data.contactNo);
                            $('#nic').val(response.data.nic);
                            $('#address').val(response.data.address);
                            //Insurance details
                            $('#insuranceNo').val(response.data.insuranceId !== null ? response
                                .data.insuranceId :
                                'N/A');
                            $('#insuranceCompany').val(response.data.company !== null ? response
                                .data.company :
                                'N/A');
                            $('#accidentYear').val(response.data.accidentYear !== null ? response
                                .data.accidentYear : 'N/A');

                            console.log(response.message);
                        } else {
                            console.log(response.message);
                        }
                    }
                });
            }

        });
    </script>

</body>

</html>
