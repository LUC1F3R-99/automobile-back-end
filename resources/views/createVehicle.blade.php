    <div>

        <div class="container mt-5" id="topsearchCustomerNic">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        {{-- Customer NIC search field --}}
                        <label for="customerNic" class="form-label">Customer NIC</label>
                        <input type="text" class="form-control" id="searchCustomerNic" name="searchCustomerNic"
                            aria-describedby="emailHelp" placeholder="x x x x v">
                    </div>
                    <div id="nocustomerRecordsMessage" style="display: none;">
                        <p>No records found</p>
                        <a href="#" id="newcustomervehiclepage">Create a new Customer & Vehicle</a>
                    </div>

                </div>
            </div>
        </div>

        <form action="#" method="POST" id="detailsForm2">
            @csrf
            <div id="form2-body" style="display: none;">
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                                <input type="text" class="form-control" id="customerId" name="customerId"
                                    aria-describedby="emailHelp" placeholder="Enter email ID" disabled>
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
        </form>

        <div id="form3-body">
            <form action="#" method="POST" id="detailsForm3">
                @csrf
                <div class="container mt-5">
                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                                <input type="text" class="form-control editable-field" id="vehicleNumber3"
                                    aria-describedby="emailHelp" name="vehicleNumber3" placeholder="Enter email">
                            </div>
                            {{-- hidden customer id  --}}
                            <input type="text" name="customerId3" id="hiddenCustomerId" value="" hidden>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Make</label>
                                <input type="text" class="form-control editable-field" id="make3" name="make3"
                                    class="mb-3">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Model</label>
                                <input type="text" class="form-control editable-field" id="model3"
                                    name="model3" placeholder="john joe">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Year</label>
                                <input type="text" class="form-control editable-field" id="year3"
                                    name="year3" placeholder="john joe">
                            </div>
                            <div class="mb-3" id="buttonGroup">
                                <button type="button" class="btn btn-success editable-field"
                                    id="submitButton3">Submit</button>
                                <button type="reset" class="btn btn-danger editable-field"
                                    id="cancelButton">Cancel</button>
                            </div>
                            <div class="mb-3">
                                <a href="#" id="homePage" class="form-control">Go To Home
                                    Page</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>




    <script>
        $(document).ready(function() {

            // run fetchData function when user hit tab on search vehicle number field
            $('#searchCustomerNic').on('blur', function() {
                fetchCustomerData();
            });

            function fetchCustomerData() {
                var customerNic = $('#searchCustomerNic').val();

                $.ajax({
                    url: '{{ route('fetchCustomerData') }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        searchCustomerNic: customerNic
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // Check if customerData is not empty
                        if (response.customerData !== null && response.customerData !== undefined) {

                            // Records found, update the form and show the form body
                            $('#topsearchCustomerNic').hide(); // Hide the message
                            $('#form2-body').show(); // Show the form body

                            // Customer details
                            $('#customerId').val(response.customerData.customerId);
                            $('#hiddenCustomerId').val(response.customerData.customerId);
                            $('#customerName').val(response.customerData.name);
                            $('#contactNo').val(response.customerData.contactNo);
                            $('#nic').val(response.customerData.nic);
                            $('#address').val(response.customerData.address);

                        } else {
                            // No records found, show a message
                            $('#form2-body').hide(); // Hide the form body
                            $('#nocustomerRecordsMessage').show(); // Show the message
                        }
                    }

                });
            }

            // function to add a '-' to Vehicle Number
            $('#vehicleNumber3').on('input', function() {
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

            // submit form3
            $('#submitButton3').on('click',function(e) {
                e.preventDefault();
                // Additional logic for submission
                //save form data to fd constant
                const fd = new FormData($('#detailsForm3')[0]);
                console.log(fd);
                //call submitNewVehicleDetails function and send new vehicle data
                submitNewVehicleDetails(fd);
                $('#detailsForm2, #detailsForm3').each(function() {
                    this.reset();
                });
                //go home
                home();
            });

            //function to send new vehicle data and create new vehicle
            function submitNewVehicleDetails(fd, isNew = false) {
                // Add the 'isNew' parameter to the FormData object
                fd.append('isNew', isNew);
                $.ajax({
                    url: '{{ route('createnewVehicle') }}',
                    method: 'post',
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            // Optionally show a success message or perform other actions
                            console.log('Database records updated successfully.');
                            // Display success message in the #message div
                            $('#message').addClass('alert alert-success')
                                .html(response.message).show();
                            // Hide the message after 5 seconds
                            setTimeout(function() {
                                $('#message').hide();
                            }, 5000);
                        } else {
                            console.error('Failed to update database records.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed with status: " + status +
                            ", error: " + error);
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            console.error(xhr.responseJSON.errors);
                        }
                    }

                });
            }

            //function to send new customer data and create new customer
            function submitNewCustomerDetails(fdc) {
                $.ajax({
                    url: '{{ route('createnewCustomer') }}',
                    method: 'post',
                    data: fdc,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {

                        if (response.success) {
                            // Optionally show a success message or perform other actions
                            console.log('Database records updated successfully.');
                            // Display success message in the #message div
                            $('#message').addClass('alert alert-success')
                                .html(response.message).show();
                            // Hide the message after 5 seconds
                            setTimeout(function() {
                                $('#message').hide();
                            }, 5000);
                        } else {
                            console.error('Failed to update database records.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed with status: " + status +
                            ", error: " + error);
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            console.error(xhr.responseJSON.errors);
                        }
                    }

                });
            }

            // submit form2 and form3 when adding both customer and vehicle details
            $('#submitButton31').on('click', function() {
                // Additional logic for submission
                //save form data to fd constant
                const fd2 = new FormData($('#detailsForm2')[0]);
                const fd3 = new FormData($('#detailsForm3')[0]);
                submitNewVehicleDetails(fd2, true);
                submitNewCustomerDetails(fd3);
                //go home
                // home();
            });

            // button to return to welcome page
            $('#homePage').click(function() {
                home();
            });

            // function to return welcome page
            function home() {
                // Perform AJAX request when the button is clicked
                $.ajax({
                    url: '/', // Change this to the correct URL
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
            }


            // button to load create new customer and vehicle empty form
            $('#newcustomervehiclepage').click(function() {
                // Perform AJAX request when the button is clicked
                $.ajax({
                    url: '/createCustomer', // Change this to the correct URL
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
