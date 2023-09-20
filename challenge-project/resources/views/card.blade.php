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
    <div class="container mt-5" style="max-width: 30%;">
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
                        <input type="text" class="form-control"  id="expiryDate" placeholder="MM/YY" maxlength="5" >

                    </div>
                    <div class="form-group col-md-6">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" placeholder="CVV" maxlength="4" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="successDiv" style="color:green;"></div>
                    <div class="col-md-6" id="errorDiv" style="color:red;"></div>
                </div>
                <button class="btn btn-primary" onclick="validateCreditCard()">Submit</button>
            </div>
        </div>
    </div>

    <script>
        const dateInput = document.getElementById("expiryDate");
        dateInput.addEventListener("input", function() {
            let date = this.value;
            date = date.replace(/\D/g, "");
            if (date.length >= 2) {
                date = date.slice(0, 2) + "/" + date.slice(2);
            }
            this.value = date;

        });
        function validateCreditCard() {
            let divError = document.getElementById("errorDiv");
            divError.innerText= '';
            let divSuccess = document.getElementById("successDiv");
            divSuccess.innerText= '';

            const cardNumber = document.getElementById('cardNumber').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const cvv = document.getElementById('cvv').value;

            const data = {
                cardNumber: cardNumber,
                expiryDate: expiryDate,
                cvv: cvv
            };

            console.log('Credit Card Number:', cardNumber);
            console.log('Expiry Date:', expiryDate);
            console.log('CVV:', cvv);

            //Card checker
            const cardValidationUrl = `/api/check_card/${cardNumber}`;
            fetch(cardValidationUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No data on input');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                if(data.status == "success"){
                    let divSuccess = document.getElementById("successDiv");
                    if(divSuccess.innerText!=''){
                        divSuccess.innerText+='\n';
                    }
                    divSuccess.innerText+= data.message;
                    document.getElementById('cardNumber').classList.remove("border-danger");
                    document.getElementById('cardNumber').classList.add("border-success");
                }else{
                    let divError = document.getElementById("errorDiv");
                    if(divError.innerText!=''){
                        divError.innerText+='\n';
                    }
                    divError.innerText+= data.message;
                    document.getElementById('cardNumber').classList.remove("border-success");
                    document.getElementById('cardNumber').classList.add("border-danger");
                }
            })
            .catch(error => {
                console.error('Something went wrong', error);
                let divError = document.getElementById("errorDiv");
                if(divError.innerText!=''){
                        divError.innerText+='\n';
                }
                divError.innerText+= "No card number inserted";
                document.getElementById('cardNumber').classList.remove("border-success");
                document.getElementById('cardNumber').classList.add("border-danger");
            });

            // Date checker
            const cardValidationUrl2 = `/api/check_date/${expiryDate}`;
            fetch(cardValidationUrl2)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No data on input');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                if(data.status == "success"){
                    let divSuccess = document.getElementById("successDiv");
                    if(divSuccess.innerText!=''){
                        divSuccess.innerText+='\n';
                    }
                    divSuccess.innerText+= data.message;
                    document.getElementById('expiryDate').classList.remove("border-danger");
                    document.getElementById('expiryDate').classList.add("border-success");
                }else{
                    let divError = document.getElementById("errorDiv");
                    if(divError.innerText!=''){
                        divError.innerText+='\n';
                    }
                    divError.innerText+= data.message;
                    document.getElementById('expiryDate').classList.remove("border-success");
                    document.getElementById('expiryDate').classList.add("border-danger");
                }
            })
            .catch(error => {
                console.error('Something went wrong', error);
                let divError = document.getElementById("errorDiv");
                if(divError.innerText!=''){
                        divError.innerText+='\n';
                }
                divError.innerText+= "No correct date inserted";
                document.getElementById('expiryDate').classList.remove("border-success");
                document.getElementById('expiryDate').classList.add("border-danger");
            });

            // CVV Checker
            const cardValidationUrl3 = `/api/check_cvv/${cardNumber}/${cvv}`;
            fetch(cardValidationUrl3)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No data on input');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                if(data.status == "success"){
                    let divSuccess = document.getElementById("successDiv");
                    if(divSuccess.innerText!=''){
                        divSuccess.innerText+='\n';
                    }
                    divSuccess.innerText+=data.message;
                    document.getElementById('cvv').classList.remove("border-danger");
                    document.getElementById('cvv').classList.add("border-success");
                }else{
                    let divError = document.getElementById("errorDiv");
                    if(divError.innerText!=''){
                        divError.innerText+='\n';
                    }
                    divError.innerText+= data.message;
                    document.getElementById('cvv').classList.remove("border-success");
                    document.getElementById('cvv').classList.add("border-danger");
                }
            })
            .catch(error => {
                console.error('Something went wrong', error);
                let divError = document.getElementById("errorDiv");
                if(divError.innerText!=''){
                        divError.innerText+='\n';
                }
                if(document.getElementById('cvv').value==''){
                    divError.innerText+= "No CVV value inserted";
                    
                }else{
                    divError.innerText+= "No card number inserted";
                }
                document.getElementById('cvv').classList.remove("border-success");
                document.getElementById('cvv').classList.add("border-danger");
                    
            });
        }
    </script>


</body>
</html>