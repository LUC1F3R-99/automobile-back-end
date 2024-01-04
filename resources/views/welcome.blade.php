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
                        <input type="text" class="form-control editable-field" id="insuranceNo"
                            name="insuranceNo" placeholder="000xx456">
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
                    <button type="submit" class="btn btn-success" id="fillButton">Fill</button>
                    <button type="reset" class="btn btn-danger" data-action="fill">Reset</button>
                    <div class="mb-3" id="buttonGroup" style="display: none;">
                        {{-- <button type="button" class="btn btn-secondary" id="editButton">Edit</button> --}}
                        {{-- <button type="submit" class="btn btn-success" id="updateButton">Update</button> --}}
                        <button type="button" class="btn btn-success" id="invoiceButton">Go to
                            Invoice</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


    {{-- No records found modal  --}}
    <div class="modal fade" id="noRecordsFound" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">No Records Found</h5>
                </div>
                <div class="modal-body">
                    No Vehicle or Customer Details Found.
                    <br>
                    You Can Enter New Record If You Wish.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        id="enterNewRecordButton">Enter New Record</button>
                </div>
            </div>
        </div>
    </div>

    {{-- New record created successfully modal  --}}
    <div class="modal fade" id="newRecordsSuccess" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Records Created Successfully</h5>
                </div>
                <div class="modal-body">
                    New Customer and Vehicle Details Added Successfully
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="successOk">Ok</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Empty search field modal  --}}
    <div class="modal fade" id="emptySearchField" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Empty Search Field</h5>
                </div>
                <div class="modal-body">
                    Please enter a Vehicle Number to Search
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


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
                            if (response.result !== null && response.status !== 404) {

                                // Store the original form data
                                originalFormData = {
                                    customerId: response.customerId,
                                    customerName: response.name,
                                    contactNo: response.contactNo,
                                    nic: response.nic,
                                    address: response.address,
                                    vehicleNumber: response.vehicleNumber,
                                    make: response.make,
                                    model: response.model,
                                    year: response.year,
                                    insuranceId: response.insuranceId,
                                    company: response.company,
                                    accidentYear: response.accidentYear,

                                };

                                // Update other fields based on the response
                                // Vehicle details
                                // $('#searchvehicleNumber').val(response.vehicleNumber);
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

                                // show buttons
                                $('#buttonGroup').show();
                                // toggleEditMode(true);

                            } else {
                                // reset form
                                $('#detailsForm').each(function() {
                                    this.reset();
                                });
                                // hide buttons id="buttonGroup"
                                $('#buttonGroup').hide();
                                // show No records found modal
                                $('#noRecordsFound').modal('show');

                            }
                        }

                    });
                } else {
                    // Input field is empty, show an alert
                    $('#emptySearchField').modal('show');
                }

            });

            // function to add '-' for vehicle number
            $('.vehicleNumber').on('input', function() {
                var inputValue = $(this).val();

                inputValue = inputValue.replace('-', '');

                if (/\d$/.test(inputValue)) {
                    inputValue = inputValue.replace(/(\D+)(\d+)/, '$1-$2');
                }

                $(this).val(inputValue);
            });


            // search field and search result reset
            $('#resetSearch').on('click', function() {
                $('#detailsForm,#searchVehicleNumberForm').each(function() {
                    this.reset();
                });
                // hide buttons id="buttonGroup"
                $('#buttonGroup').hide();
            });


            // enable edit if click edit button in detailsForm
            $('#editButton').on('click', function(e) {
                e.preventDefault();
                toggleEditMode(true);
            });

            // toggle edit function
            function toggleEditMode(enabled) {
                $('#searchvehicleNumber').prop('disabled', enabled);
                $('.editable-field').prop('disabled', !enabled);

                if (enabled) {
                    $('#editButton').hide();
                    $('#updateButton').show();
                    $('#cancelButton').show();
                    $('#invoiceButton').hide();
                    $('#searchBar').hide();
                } else {
                    $('#editButton').show();
                    $('#updateButton').hide();
                    $('#cancelButton').hide();
                    $('#invoiceButton').show();
                    $('#searchBar').show();
                }
            }

            // reset and refill old data in detailsForm
            $('#cancelButton').on('click', function() {
                // Restore the original form data
                $('#customerId').val(originalFormData.customerId);
                $('#customerName').val(originalFormData.customerName);
                $('#contactNo').val(originalFormData.contactNo);
                $('#nic').val(originalFormData.nic);
                $('#address').val(originalFormData.address);
                // Vehicle details
                $('#vehicleNumber').val(originalFormData.vehicleNumber);
                $('#make').val(originalFormData.make);
                $('#model').val(originalFormData.model);
                $('#year').val(originalFormData.year);
                $('#insuranceNo').val(originalFormData.insuranceId !== null ? originalFormData.insuranceId :
                    'N/A');
                $('#insuranceCompany').val(originalFormData.company !== null ? originalFormData.company :
                    'N/A');
                $('#accidentYear').val(originalFormData.accidentYear !== null ? originalFormData
                    .accidentYear : 'N/A');

                // toggleEditMode(false);
            });


            // launch newRecordModal when clicked 'Enter New Record' button
            $('#enterNewRecordButton').on('click', function() {
                // show No records found modal
                $('#newRecordModal').modal('show');
            });


        });
    </script>

</body>

</html>
