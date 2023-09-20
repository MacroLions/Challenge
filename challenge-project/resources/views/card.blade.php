<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Validation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
@include('partials.navbar')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Credit Card Information</h1>
                <div class="form-group">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" class="form-control" id="cardNumber" placeholder="0123456789012345678" maxlength="19" >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="expiryDate">Expiry Date:</label>
                        <input type="text" class="form-control"  id="monthYear" placeholder="MM/YY" maxlength="5" oninput="handleInput(this)">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" placeholder="CVV" maxlength="4" >
                    </div>
                </div>
                <button class="btn btn-primary" onclick="validateCreditCard()">Submit</button>
            </div>
        </div>
    </div>

    <script>
        function validateCreditCard() {
            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;
            console.log('Credit Card Number:', cardNumber);
            console.log('Expiry Date:', expiryDate);
            console.log('CVV:', cvv);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>