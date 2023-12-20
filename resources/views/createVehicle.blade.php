    <div>
        <form action="/createnewVehicle" method="POST" id="detailsForm">
            @csrf

            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            {{-- Vehicle no search field --}}
                            <label for="exampleInputEmail1" class="form-label">Customer NIC</label>
                            <input type="text" class="form-control" id="searchvehicleNumber" name="searchVehicleNo"
                                aria-describedby="emailHelp" placeholder="AB x x x x or ABC x x x x">
                        </div>
                        <div id="noRecordsMessage" style="display: none;">
                            <p>No records found</p>
                            <a href="#" id="customerpage">Create Customer Page</a>
                        </div>

                    </div>
                </div>
            </div>

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
                            <label for="exampleInputEmail1" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="vehicleNumber" aria-describedby="emailHelp"
                                name="vehicleNumber" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="customerId" placeholder="Enter customerId">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Year</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="year" placeholder="Enter year">
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

    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $('#vehicleNumber').on('input', function() {
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
    </script>
