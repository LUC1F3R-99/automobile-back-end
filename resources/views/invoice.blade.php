    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Add the Bootstrap Typeahead CSS -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Your custom styles or other dependencies go here -->
        <style>
            .service-job-details-list option {
                padding: 5px;
                border-top: 1px solid black;
            }
        </style>

        <title>Auto World</title>
    </head>

    <body>
        <!-- --------------------------------------Comapany Details Section---------------- -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-fluid bg-light p-3">
                        <div class="row align-items-center">
                            <!-- Company Logo -->
                            <div class="col-md-2">
                                <img src="./Screenshot 2023-12-22 101726.png" alt="Company Logo" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h3 class="company-name"><b>AUTO WORLD</b></h3>
                                <p class="company-details">NO.8/7/1A Wewalduwa Road,Hunupitiya,Wattala, SrI Lanka.<br>
                                    <a href="mailto:autoworldrepairs2020@gmail.com">autoworldrepairs2020@gmail.com</a>
                                    <br>
                                    Phone: 0777182575 | 0715586895
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="section-separator">
                <hr>
                <div class="col-md-12 mt-4 border-top"></div>
                <div class="col-md-12 mt-4"></div>
                <!-- ------------------------------Vehicle Details Section----------------------------------- -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field1">Customer Details</label>
                                <input type="text" class="form-control" id="Cname" value="Name : " readonly>
                                <!--customer name-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="C-Contact" value="T.P : " readonly>
                                <!--customer phone number-->
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field2">Estimate</label>
                                <input type="text" class="form-control" id="EstNo" value="EST No : " readonly>
                                <!--Estimate Number-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="EstDate" value="EST Date : " readonly>
                                <!--Estimate Date-->
                            </div>
                        </div>
                        <!-- line break -->
                        <div class="col-md-12 mt-4 "></div>
                        <!-- end line break -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field1">Insurance Details</label>
                                <input type="text" class="form-control" id="insurancename" value=" " readonly>
                                <!--Insurance Name-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="accidentdate" value=" " readonly>
                                <!--Accident Date-->
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field2">Vehicle Details</label>
                                <input type="text" class="form-control" id="VehicleNo" value="No : " readonly>
                                <!--vehicle Number-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="Vbrand" value="Brand : " readonly>
                                <!---Vehicle Brand-->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="Vmodle" value="Modle : " readonly>
                                <!--Vehicle Modle-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- line break -->
                <div class="col-md-12 mt-6 border-top"></div>
                <!-- end line brake -->


                <!-- ----------------Service Jobs Section-------------------------------------------------------- -->

                <div class="container mt-4">
                    <button class="btn" onclick="addTable()"><i class="fa fa-plus"></i> Add job</button>
                </div>

                <!-- Table Buttons -->
                <div class="row mt-2">
                    <div class="col-md-4" id="addBtnCol" style="display: none;">
                        <button class="btn btn-primary btn-block" onclick="addRow()">Add Row</button>
                    </div>
                    <div class="col-md-4" id="removeBtnCol" style="display: none;">
                        <button class="btn btn-danger btn-block" onclick="removeRow()">Remove Row</button>
                    </div>
                    <div class="col-md-4" id="addColumnBtnCol" style="display: none;">
                        <button class="btn btn-info btn-block" onclick="addColumn()">Add Column</button>
                    </div>
                    <div class="col-md-4" id="removeColumnBtnCol" style="display: none;">
                        <button class="btn btn-warning btn-block" onclick="removeColumn()">Remove Column</button>
                    </div>
                </div>

                <!-- Service Jobs Table -->
                <div class="container mt-2 table-container" id="tableContainer"></div>

                <!-- Button to Add New Row -->
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button class="btn" onclick="addNewRow()"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <script>
                    var lastTableIndex = 0;

                    function addTable() {
                        var container = document.getElementById('tableContainer');
                        var newTableDiv = document.createElement('div');
                        newTableDiv.classList.add('container', 'mt-4');
                        var newTable = document.createElement('table');
                        newTable.classList.add('table', 'table-borderless');
                        var thead = document.createElement('thead');
                        thead.classList.add('thead-light');
                        var headerRow = document.createElement('tr');
                        headerRow.innerHTML = '<th scope="col">Service Job List</th>' +
                            '<th scope="col">Option 2</th>' +
                            '<th scope="col">Price</th>';
                        thead.appendChild(headerRow);
                        newTable.appendChild(thead);
                        var tbody = document.createElement('tbody');
                        var defaultRow = document.createElement('tr');
                        defaultRow.innerHTML = '<td>' +
                            '<select class="form-control service-job-list selectpicker" data-live-search="true">' +
                            '<option value="Job1">REMOVE AND REFITTING</option>' +
                            '<option value="Job2">REPAIR</option>' +
                            '<option value="Job3">REPAINT</option>' +
                            '<option value="Job4">REPLACE</option>' +
                            '</select>' +
                            '</td>' +

                            '<td>' +
                            '<select class="form-control service-job-details-list selectpicker" data-live-search="true">' +
                            '<option value="Job1"> REAR BUMPER</option>' +
                            '<option value="2"> REAR REFLECTOR</option>' +
                            '<option value="3"> REAR NUMBER PLATE</option>' +
                            '<option value="4"> DICKY DOOR</option>' +
                            '<option value="5"> SPOILER </option>' +
                            '<option value="6"> DICKY SHOCKER</option>' +
                            '<option value="7"> TAIL LIGHT - BOTH SIDE </option>' +
                            '<option value="8"> WIRE LINE</option>' +
                            '<option value="9"> REAR RETANIOR - BOTH SIDE</option>' +
                            '<option value="10"> REAR UPPOSTRY</option>' +
                            '<option value="11"> REAR SHEET BELT</option>' +
                            '<option value="12"> REAR DOOR LHS</option>' +
                            '<option value="13"> REAR DOOR RHS</option>' +
                            '<option value="14"> SIDE SKIRTING - BOTH SIDE</option>' +
                            '<option value="15"> REAR SHEET SET</option>' +
                            '<option value="16"> HOOD UPPOSTRY</option>' +
                            '<option value="17"> FRONT BUMPER </option>' +
                            '<option value="18"> FOG LIGHT</option>' +
                            '<option value="19"> SHELL</option>' +
                            '<option value="20"> LOWER GRILL</option>' +
                            '<option value="21"> HEAD LIGHT - BOTH SIDE</option>' +
                            '<option value="22"> FLENDER - BOTH SIDE </option>' +
                            '<option value="23"> FRONT RETANIOR - BOTH SIDE</option>' +
                            '<option value="24"> INNER GUARD - BOTH SIDE </option>' +
                            '<option value="25"> BONNET</option>' +
                            '<option value="26"> BONNET HINGERS</option>' +
                            '<option value="27"> BONNET LOCK</option>' +
                            '<option value="28"> AC CONDENCER</option>' +
                            '<option value="29"> REDIATOR</option>' +
                            '<option value="30"> FRONT NUMBER PLATE</option>' +
                            '<option value="31"> RIM ALL ROUND</option>' +
                            '<option value="32"> REAR TYER LHS </option>' +
                            '<option disabled></option>' +
                            // '<option value="33"> REPAIR </option>' +
                            '<option disabled></option>' +
                            '<option value="34"> BONNET</option>' +
                            '<option value="35"> FLENDER LHS</option>' +
                            '<option value="36"> FLENDER RHS</option>' +
                            '<option value="37"> FRONT BUMPER</option>' +
                            '<option value="38"> REAR DOOR RHS</option>' +
                            '<option disabled></option>' +
                            // '<option value="39"> REPAINT </option>' +
                            '<option disabled></option>' +
                            '<option value="40"> EAR BUMPER</option>' +
                            '<option value="41"> DICKY DOOR</option>' +
                            '<option value="42"> QUARTER PANEL LHS </option>' +
                            '<option value="43"> QUARTER PANEL RHS</option>' +
                            '<option value="44"> REAR DOOR RHS</option>' +
                            '<option value="45"> FLENDER RHS</option>' +
                            '<option value="46"> FRONT BUMPER</option>' +
                            '<option value="47"> FLENDER LHS </option>' +
                            '<option value="48"> BONNET</option>' +
                            '<option disabled></option>' +
                            // '<option value="49"> REPLACE </option>' +
                            '<option disabled></option>' +
                            '<option value="50"> HEAD LIGHTLHS</option>' +
                            '<option value="51"> RETANIOR LHS</option>' +
                            '<option value="52"> LOWER GRILL </option>' +
                            '<option value="53"> SHELL</option>' +
                            '<option value="54"> NUMBER PLATE HOLDER - BOTH SIDE</option>' +
                            '<option value="55"> AC CONDENCER</option>' +
                            '<option value="56"> DICKY DOOR COMPLETE</option>' +
                            '<option value="57"> TAIL LIGHT - BOTH SIDE (With Bulb) </option>' +
                            '<option value="58"> REAR BUMPER</option>' +
                            '<option value="59"> REFLECTOR RHS</option>' +
                            '<option value="60"> NUMBER PLATE </option>' +
                            '<option value="61"> BACK CUT</option>' +
                            '<option value="62"> RIM - ALL</option>' +
                            '<option value="63"> TYER LHS </option>' +
                            '<option value="64"> REAR RETANIOR RHS</option>' +
                            '<option value="65"> FRONT RETANIOR RHS</option>' +
                            '<option value="66"> TAPE </option>' +
                            '<option value="67"> CLIPS</option>' +
                            '<option value="68"> BODY SEALENT</option>' +
                            '<option value="69"> WRAPPING </option>' +
                            '</select>' +
                            '</td>' +

                            '<td>' +
                            '<select class="form-control service-job-price-list selectpicker" data-live-search="true">' +
                            '<option value="$100">$100</option>' +
                            '<option value="$200">$200</option>' +
                            '<option value="$300">$300</option>' +
                            '</select>' +
                            '</td>';
                        tbody.appendChild(defaultRow);
                        newTable.appendChild(tbody);
                        newTableDiv.appendChild(newTable);
                        container.appendChild(newTableDiv);
                        $('.selectpicker').selectpicker('refresh');

                        // Show Table Buttons
                        document.getElementById('addBtnCol').style.display = 'block';
                        document.getElementById('removeBtnCol').style.display = 'block';
                        document.getElementById('addColumnBtnCol').style.display = 'block';
                        document.getElementById('removeColumnBtnCol').style.display = 'block';

                        lastTableIndex++; // Increment the last table index

                        // Hide the thead for all tables except the first one
                        var tables = document.querySelectorAll('.table-container table');
                        tables.forEach(function(table, index) {
                            if (index !== 0) {
                                table.querySelector('thead').classList.add('hidden');
                            }
                        });
                    }

                    function removeRow() {
                        var table = document.querySelector('.table tbody');
                        var rows = table.querySelectorAll('tr');
                        if (rows.length > 1) {
                            table.removeChild(rows[rows.length - 1]);
                        }
                    }

                    function addNewRow() {
                        // Get the last added table
                        var lastTable = document.getElementById('tableContainer').lastElementChild.querySelector(
                            '.table tbody');

                        // Check if a table exists
                        if (lastTable) {
                            // Add a new row to the last table
                            var newRow = lastTable.insertRow(lastTable.rows.length);
                            var selectCell = newRow.insertCell(0);
                            var option2Cell = newRow.insertCell(1);
                            var priceCell = newRow.insertCell(2);
                            var selectHtml =
                                '<select class="form-control service-job-list selectpicker" data-live-search="true" style="display: none;">' +
                                '<option value="Job1"> REAR BUMPER</option>' +
                                '<option value="Job2"> REAR REFLECTOR</option>' +
                                '<option value="Job3"> REAR NUMBER PLATE</option>' +
                                '<option value="Job4"> DICKY DOOR</option>' +
                                '<option value="Job4"> SPOILER </option>' +
                                '</select>';
                            var option2Html =
                                '<select class="form-control service-job-details-list selectpicker" data-live-search="true">' +
                                '<option value="Job1"> REAR BUMPER</option>' +
                                '<option value="2"> REAR REFLECTOR</option>' +
                                '<option value="3"> REAR NUMBER PLATE</option>' +
                                '<option value="4"> DICKY DOOR</option>' +
                                '<option value="5"> SPOILER </option>' +
                                '<option value="6"> DICKY SHOCKER</option>' +
                                '<option value="7"> TAIL LIGHT - BOTH SIDE </option>' +
                                '<option value="8"> WIRE LINE</option>' +
                                '<option value="9"> REAR RETANIOR - BOTH SIDE</option>' +
                                '<option value="10"> REAR UPPOSTRY</option>' +
                                '<option value="11"> REAR SHEET BELT</option>' +
                                '<option value="12"> REAR DOOR LHS</option>' +
                                '<option value="13"> REAR DOOR RHS</option>' +
                                '<option value="14"> SIDE SKIRTING - BOTH SIDE</option>' +
                                '<option value="15"> REAR SHEET SET</option>' +
                                '<option value="16"> HOOD UPPOSTRY</option>' +
                                '<option value="17"> FRONT BUMPER </option>' +
                                '<option value="18"> FOG LIGHT</option>' +
                                '<option value="19"> SHELL</option>' +
                                '<option value="20"> LOWER GRILL</option>' +
                                '<option value="21"> HEAD LIGHT - BOTH SIDE</option>' +
                                '<option value="22"> FLENDER - BOTH SIDE </option>' +
                                '<option value="23"> FRONT RETANIOR - BOTH SIDE</option>' +
                                '<option value="24"> INNER GUARD - BOTH SIDE </option>' +
                                '<option value="25"> BONNET</option>' +
                                '<option value="26"> BONNET HINGERS</option>' +
                                '<option value="27"> BONNET LOCK</option>' +
                                '<option value="28"> AC CONDENCER</option>' +
                                '<option value="29"> REDIATOR</option>' +
                                '<option value="30"> FRONT NUMBER PLATE</option>' +
                                '<option value="31"> RIM ALL ROUND</option>' +
                                '<option value="32"> REAR TYER LHS </option>' +
                                '<option disabled></option>' +
                                // '<option value="33"> REPAIR </option>' +
                                '<option disabled></option>' +
                                '<option value="34"> BONNET</option>' +
                                '<option value="35"> FLENDER LHS</option>' +
                                '<option value="36"> FLENDER RHS</option>' +
                                '<option value="37"> FRONT BUMPER</option>' +
                                '<option value="38"> REAR DOOR RHS</option>' +
                                '<option disabled></option>' +
                                // '<option value="39"> REPAINT </option>' +
                                '<option disabled></option>' +
                                '<option value="40"> EAR BUMPER</option>' +
                                '<option value="41"> DICKY DOOR</option>' +
                                '<option value="42"> QUARTER PANEL LHS </option>' +
                                '<option value="43"> QUARTER PANEL RHS</option>' +
                                '<option value="44"> REAR DOOR RHS</option>' +
                                '<option value="45"> FLENDER RHS</option>' +
                                '<option value="46"> FRONT BUMPER</option>' +
                                '<option value="47"> FLENDER LHS </option>' +
                                '<option value="48"> BONNET</option>' +
                                '<option disabled></option>' +
                                // '<option value="49"> REPLACE </option>' +
                                '<option disabled></option>' +
                                '<option value="50"> HEAD LIGHTLHS</option>' +
                                '<option value="51"> RETANIOR LHS</option>' +
                                '<option value="52"> LOWER GRILL </option>' +
                                '<option value="53"> SHELL</option>' +
                                '<option value="54"> NUMBER PLATE HOLDER - BOTH SIDE</option>' +
                                '<option value="55"> AC CONDENCER</option>' +
                                '<option value="56"> DICKY DOOR COMPLETE</option>' +
                                '<option value="57"> TAIL LIGHT - BOTH SIDE (With Bulb) </option>' +
                                '<option value="58"> REAR BUMPER</option>' +
                                '<option value="59"> REFLECTOR RHS</option>' +
                                '<option value="60"> NUMBER PLATE </option>' +
                                '<option value="61"> BACK CUT</option>' +
                                '<option value="62"> RIM - ALL</option>' +
                                '<option value="63"> TYER LHS </option>' +
                                '<option value="64"> REAR RETANIOR RHS</option>' +
                                '<option value="65"> FRONT RETANIOR RHS</option>' +
                                '<option value="66"> TAPE </option>' +
                                '<option value="67"> CLIPS</option>' +
                                '<option value="68"> BODY SEALENT</option>' +
                                '<option value="69"> WRAPPING </option>' +
                                '</select>';
                            var priceHtml =
                                '<select class="form-control service-job-price-list selectpicker" data-live-search="true">' +
                                '<option value="$100">$100</option>' +
                                '<option value="$200">$200</option>' +
                                '<option value="$300">$300</option>' +
                                '</select>';
                            selectCell.innerHTML = selectHtml;
                            option2Cell.innerHTML = option2Html;
                            priceCell.innerHTML = priceHtml;
                            $('.selectpicker').selectpicker('refresh');
                        }
                    }

                    $(document).ready(function() {
                        $('.selectpicker').selectpicker();
                    });
                </script>



                <!------------------------------------------- Total Price--------------------------------------------------------- -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <hr class="section-separator">
                            <h3 class="h3font">Total Price</h3>
                            <div class="form-group">
                                <label for="totalPrice">Total Price:</label>
                                <input type="text" class="form-control" id="totalPrice" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- ----------------------------------------footer---------------------------------------------------------------- -->
                    <footer class="bg-light text-dark mt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p>Team Auto World - Form The Finest</p>
                                    <p>Quality Service You Can Trust</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>

                <!-- Bootstrap JS and Popper.js -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <!-- Add the Bootstrap Typeahead JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
            </div>
    </body>

    </html>
