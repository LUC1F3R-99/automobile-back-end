<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="./style.css"> --}}
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title> </title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
}

.company-name {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 24px;
}

.company-details {
    font-size: 16px;
}

.form-group {
    margin-bottom: 20px;
}
.form-group input[type="text"] {
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
padding: 10px;
border-radius: 5px;
}

.form-group input[type="text"]:hover {
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.col-md-2 img {
    width: 100%;
    height: auto;
}

.dropdown-container {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
}
.dropdown-container select {
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.dropdown-container select:hover {
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


.custom-dropdown {
    position: relative;
    display: inline-block;
    width: 100%;
}

.custom-dropdown select {
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: url('./pluss.png') no-repeat;
    background-position: right 8px center;
    background-color: rgb(255, 255, 255);
    background-size: 16px;
    cursor: pointer;
}
.section-separator {
    border-top: 1px solid #000000;
    margin-top: 20px;
    margin-bottom: 20px;
}

.h3font {
font-size: 1.5rem;
font-weight: bold;
color: #9b9b9b;
margin-bottom: 15px;
text-transform: uppercase;
letter-spacing: 1px;
}
    </style>
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
                                <a href="mailto:autoworldrepairs2020@gmail.com">autoworldrepairs2020@gmail.com</a> <br>
                                Phone: 0777182575 | 0715586895 </p>
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
            <div class="col-md-12 mt-5">
                <h3 class="h3font">Service job List</h3>
            </div>
            <div class="col-md-12 mt-5">
                <div class="dropdown-container">
                    <div class="col-md-6">
                        <div class="custom-dropdown dropdown1">
                            <select class="form-control">
                                <!--Remove and refiting Start-->
                                <option value="" disabled selected>Remove & Refitting</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-dropdown dropdown1-1">
                            <select class="form-control">
                                <option value="" disabled selected>Qty</option>
                                <!--Remove and refiting Quentity-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-dropdown dropdown1-2">
                            <select class="form-control">
                                <option value="" disabled selected>Price</option>
                                <!--Remove and refiting price-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="dropdown-container">
                    <div class="col-md-6">
                        <div class="custom-dropdown dropdown2">
                            <select class="form-control">
                                <option value="" disabled selected>Repair</option>
                                <!--Repair Start-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-dropdown dropdown2-1">
                            <select class="form-control">
                                <option value="" disabled selected>Qty</option>
                                <!--Repair Quentity-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-dropdown dropdown2-1">
                            <select class="form-control">
                                <option value="" disabled selected>Price</option>
                                <!--Repair Price-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="dropdown-container">
                    <div class="col-md-6">
                        <div class="custom-dropdown dropdown3">
                            <select class="form-control">
                                <option value="" disabled selected>Repaint</option>
                                <!--Repaint Start-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="custom-dropdown dropdown3-1">
                            <select class="form-control">
                                <option value="" disabled selected>Qty</option>
                                <!--Repaint Quentity-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-dropdown dropdown3-1">
                            <select class="form-control">
                                <option value="" disabled selected>Price</option>
                                <!--Repaint price-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="dropdown-container">
                    <div class="col-md-6">
                        <div class="custom-dropdown dropdown4">
                            <select class="form-control">
                                <option value="" disabled selected>Replace</option>
                                <!--Replace Start-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="custom-dropdown dropdown4-1">
                            <select class="form-control">
                                <option value="" disabled selected>Qty</option>
                                <!--Replace Quentity-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="custom-dropdown dropdown4-2">
                            <select class="form-control">
                                <option value="" disabled selected>Price</option>
                                <!--Replace Price-->
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
