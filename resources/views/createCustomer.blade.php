<div>


    <div id="form5-body">
        <form action="#" method="POST" id="detailsForm5">
            @csrf
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="customerId" name="customerId"
                                placeholder="Enter email ID" readonly>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" name="name"
                                placeholder="john joe">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">ContactNo </label>
                            <input type="text" class="form-control" id="contactNo" name="contactNo"
                                placeholder="john joe">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">NIC</label>
                            <input type="text" class="form-control" id="nic" name="nic"
                                placeholder="john joe">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="john joe">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="form6-body">
        <form action="#" method="POST" id="detailsForm6">
            @csrf
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber3" aria-describedby="emailHelp"
                                name="vehicleNumber3" placeholder="Enter email">
                        </div>
                        {{-- hidden customer id  --}}
                        <input type="text" name="customerId3" id="hiddenCustomerId" value="" hidden>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Make</label>
                            <input type="text" class="form-control" id="make3" name="make3" class="mb-3">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model3" name="model3"
                                placeholder="john joe">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Year</label>
                            <input type="text" class="form-control" id="year3" name="year3"
                                placeholder="john joe">
                        </div>
                        <div class="mb-3" id="buttonGroup">
                            <button type="button" class="btn btn-success" id="submitButton31">Submit</button>
                            <button type="reset" class="btn btn-danger" id="cancelButton">Cancel</button>
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

        fetchAndSetNextCustomerId();

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


        //function to send new vehicle data and create new vehicle
        function submitNewVehicleDetails(fd, isNew = true) {
            // Add the 'isNew' parameter to the FormData object
            fd.append('isNew', isNew);
            $.ajax({
                url: '{{ route('createnewVehicle') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
            const fd5 = new FormData($('#detailsForm5')[0]);
            const fd6 = new FormData($('#detailsForm6')[0]);
            submitNewCustomerDetails(fd5);
            submitNewVehicleDetails(fd6, true);
            //go home
            home();
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



        function fetchAndSetNextCustomerId() {
            // Use $.ajax for more flexibility
            return $.ajax({
                    url: '{{ route('fetchNextCustomerId') }}',
                    method: 'GET',
                    dataType: 'json', // Assuming the response is in JSON format
                })
                .done(function(response) {
                    // Check if the response is successful and contains the next customer ID
                    if (response && response.nextCustomerId) {
                        // Set the next customer ID in the customer ID field
                        $("#customerId").val(response.nextCustomerId);
                        $("#hiddenCustomerId").val(response.nextCustomerId);
                    } else {
                        console.error('Failed to fetch next customer ID.');
                    }
                })
                .fail(function(xhr, status, error) {
                    console.error('Error fetching next customer ID:', error);
                });
        }


    });
</script>
