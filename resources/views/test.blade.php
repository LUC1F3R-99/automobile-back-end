<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Vehicle Number Format</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="mb-3">
        {{-- Vehicle no search field --}}
        <label for="searchvehicleNumber" class="form-label">Vehicle No</label>
        <input type="text" class="form-control" id="searchvehicleNumber" name="searchVehicleNo" aria-describedby="emailHelp"
            placeholder="ABCD123 or ABCD123 or ABCD1234">
    </div>

    <script>
        // Add hyphen dynamically after the numeric part of the vehicle number
        $(document).ready(function () {
            $('#searchvehicleNumber').on('input', function () {
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

</body>

</html>
