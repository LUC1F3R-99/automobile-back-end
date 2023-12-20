    <div>
        <form action="#" method="POST" id="detailsForm2">
            @csrf

            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            {{-- Customer NIC search field --}}
                            <label for="customerNic" class="form-label">Customer NIC</label>
                            <input type="text" class="form-control" id="searchCustomerNic" name="searchCustomerNic"
                                aria-describedby="emailHelp" placeholder="x x x x v">
                        </div>
                        <div id="noRecordsMessage" style="display: none;">
                            <p>No records found</p>
                            <a href="#" id="customerpage">Create Customer Page</a>
                        </div>

                    </div>
                </div>
            </div>

            <div id="form2-body" style="display: none;">
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

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    <!-- link jqeury  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            / run fetchData function when user hit tab on search vehicle number field
            $('#searchCustomerNic').on('blur', function() {
                fetchData();
            });

            // function to add a '-' to Vehicle Number
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

        });
    </script>
