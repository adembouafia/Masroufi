function adds_ajout() {
    var id_user = 1;
    var name_adds = document.getElementById("name_add").value;
    var prix = document.getElementById("prix_add").value;

    if (!name_adds.trim()) {
        Swal.fire({
            title: "Error!",
            text: "Name cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    if (!/^\d+(\.\d+)?$/.test(prix)) {
        Swal.fire({
            title: "Error!",
            text: "Price must be a valid number",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    prix = parseFloat(prix);

    var xhr = new XMLHttpRequest();
    var url = "api/ajout.php";
    var params = "id_user=" + id_user + "&name=" + name_adds + "&prix=" + prix;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "adds added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function add_dependents() {
    var id_user = 1;
    var name = document.getElementById("name_dependent").value;
    var price = document.getElementById("price_dependent").value;

    // Validate inputs
    if (!name.trim() || !price.trim()) {
        // Display error message for empty inputs
        Swal.fire({
            title: "Error!",
            text: "Name and Price cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return; // Stop execution if inputs are empty
    }

    if (!/^\d+(\.\d+)?$/.test(price)) {
        // Display error message for invalid price format
        Swal.fire({
            title: "Error!",
            text: "Price must be a valid number",
            icon: "error",
            confirmButtonText: "OK",
        });
        return; // Stop execution if price is invalid
    }

    // Convert price to a number
    price = parseFloat(price);

    var xhr = new XMLHttpRequest();
    var url = "api/add_dependents.php";
    var params = "id_user=" + id_user + "&name=" + name + "&price=" + price;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Dependent added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function adds_epargne() {
    var id_user = 1;
    var amount = document.getElementById("amount_add").value;

    if (!amount.trim()) {
        Swal.fire({
            title: "Error!",
            text: "Amount cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    if (!/^\d+(\.\d+)?$/.test(amount)) {
        Swal.fire({
            title: "Error!",
            text: "Amount must be a valid number",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    amount = parseFloat(amount);

    var xhr = new XMLHttpRequest();
    var url = "api/add_epargne.php";
    var params = "id_user=" + id_user + "&amount=" + amount;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Epargne added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function addSalaire() {
    var id_user = 1;
    var salaire = document.getElementById("salaire").value.trim();
    var solde = document.getElementById("solde").value.trim();

    if (!salaire || !solde) {
        Swal.fire({
            title: "Error!",
            text: "Salaire and Solde cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    if (!/^\d+(\.\d+)?$/.test(salaire) || !/^\d+(\.\d+)?$/.test(solde)) {
        Swal.fire({
            title: "Error!",
            text: "Salaire and Solde must be valid numeric values",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    salaire = parseFloat(salaire);
    solde = parseFloat(solde);

    var xhr = new XMLHttpRequest();
    var url = "api/ajout_salaire.php";
    var params = "id_user=" + id_user + "&salaire=" + salaire + "&solde=" + solde;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Votre salaire et solde ont été mis à jour avec succès!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function add_monthly_expense() {
    var id_user = 1;
    var subject = document.getElementById("subject_add").value.trim();
    var amount = document.getElementById("monthly_amount_add").value.trim();

    // Validate inputs
    if (!subject || !amount) {
        // Display error message for empty inputs
        Swal.fire({
            title: "Error!",
            text: "Subject and Amount cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return; // Stop execution if inputs are empty
    }

    if (!/^\d+(\.\d+)?$/.test(amount)) {
        // Display error message for invalid numeric value for amount
        Swal.fire({
            title: "Error!",
            text: "Amount must be a valid numeric value",
            icon: "error",
            confirmButtonText: "OK",
        });
        return; // Stop execution if amount is not a valid numeric value
    }

    // Convert amount to number
    amount = parseFloat(amount);

    var xhr = new XMLHttpRequest();
    var url = "api/add_trans_mens.php";
    var params = "id_user=" + id_user + "&subject=" + subject + "&amount=" + amount;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Expense added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}


function add_payement() {
    var id_user = 1;
    var name_payement = document.getElementById("name_payement").value;
    var prix_payement = document.getElementById("prix_payement").value;

    if (!name_payement.trim()) {
        Swal.fire({
            title: "Error!",
            text: "Name cannot be empty",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    if (!/^\d+(\.\d+)?$/.test(prix_payement)) {
        Swal.fire({
            title: "Error!",
            text: "Price must be a valid number",
            icon: "error",
            confirmButtonText: "OK",
        });
        return;
    }

    prix_payement = parseFloat(prix_payement);

    var xhr = new XMLHttpRequest();
    var url = "api/add_payement.php";
    var params =
        "id_user=" + id_user + "&name=" + name_payement + "&prix=" + prix_payement;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Payment added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}


function getTransactions() {
    var sortOrder = document.getElementById("sort_order").value;

    var url = "api/read_transactions.php?sort_order=" + sortOrder;

    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("transactions").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}

function loadUserInfo() {
    var url = "api/read_user_info.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("user_info").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function getMail() {
    var url = "api/get_mail.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("mail").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function getEpargne() {
    var url = "api/get_epargne.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("savings").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}

function fillUserInfo() {
    var url = "api/profile_fill.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("info-perso").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}

function getSavings() {
    var url = "api/read_epargne.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("saving").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function getMonthlyExpenses() {
    var url = "api/read_trans_mens.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("monthly_expense").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function getDep() {
    var url = "api/get_dependents.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("depense").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}

function readModifProfil() {
    var url = "api/read_modif_profil.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("inputs").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}

function deleteExpense(expenseId) {
    if (confirm("Are you sure you want to delete this expense?")) {
        var xhr = new XMLHttpRequest();
        var url = "api/delete_trans_mens.php";
        var params = "expense_id=" + expenseId;

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        title: "Success!",
                        text: "Expense deleted successfully!",
                        icon: "success",
                        confirmButtonText: "Cool",
                    }).then(function () {
                        window.location = "home.html";
                    });
                } else {
                    alert("Failed to delete expense: " + response.error);
                }
            }
        };

        xhr.send(params);
    }
}

function modifUserInfo() {
    var id_user = 1;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;

    var xhr = new XMLHttpRequest();
    var url = "api/modif_user_info.php";
    var params =
        "id_user=" +
        id_user +
        "&nom=" +
        nom +
        "&prenom=" +
        prenom +
        "&email=" +
        email;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "User info updated successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function readDependents() {
    var url = "api/read_dependents.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("items_quot").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}




var quotL = [];

function quotList(id) {
    var item = document.getElementById(id);
    var index = quotL.indexOf(id); // Check if id exists in the array

    if (index !== -1) {
        // If id exists in the array, remove it
        quotL.splice(index, 1);
    } else {
        // If id does not exist in the array, add it
        quotL.push(id);
    }

    item.classList.toggle("selected");
    if (item.classList.contains("selected")) {
        item.style.backgroundColor = "#ECE6D3";
    } else {
        item.style.backgroundColor = "";
    }
    console.log(quotL);
}


function readSalaire() {
    var url = "api/get_salaire.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("salaire_aff").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function readSolde() {
    var url = "api/get_solde.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("solde_aff").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function readDaily() {
    var url = "api/get_dep_quot.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("dep_quot").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}
function inputDependents() {


    var xhr = new XMLHttpRequest();

    var url = "api/input_dependents.php";

    var myArray = quotL;

    var jsonString = JSON.stringify(myArray);

    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            Swal.fire({
                title: "Success!",
                text: "Dependents added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }else{
            Swal.fire({
                title: "Error!",
                text: "Failed to add dependents: " + xhr.responseText,
                icon: "error",
                confirmButtonText: "OK",
            });
        }
    };

    // Send the request with the JSON string as the body
    xhr.send(jsonString);

    // fetch("api/input_dependents.php", {
    //     method: "POST",
    //     headers: {
    //         "Content-Type": "application/json"
    //     },
    //     body: JSON.stringify({
    //         array: quotL,
    //         id_user: 1
    //     })
    // })
    // .then(response => {
    //     if (!response.ok) {
    //         throw new Error("Network response was not ok");
    //     }
    //     return response.json();
    // })
    // .then(data => {
    //     if (data.success) {
    //         // Show success message using Swal
    //         Swal.fire({
    //             title: "Success!",
    //             text: "Dependents added successfully!",
    //             icon: "success",
    //             confirmButtonText: "Cool"
    //         }).then(() => {
    //             // Redirect to home page after user confirms
    //             window.location.href = "home.html";
    //         });
    //     } else {
    //         // Show error message using Swal
    //         Swal.fire({
    //             title: "Error!",
    //             text: "Failed to add dependents: " + data.error,
    //             icon: "error",
    //             confirmButtonText: "OK"
    //         });
    //     }
    // })
    // .catch(error => {
    //     console.error("Error:", error);
    // });
}









function delete_dependents(expenseId) {
    if (confirm("Are you sure you want to delete this expense?")) {
        var xhr = new XMLHttpRequest();
        var url = "api/delete_list_quot.php";
        var params = "expense_id=" + expenseId;

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
                        title: "Success!",
                        text: "quotidien deleted successfully!",
                        icon: "success",
                        confirmButtonText: "Cool",
                    }).then(function () {
                        window.location = "home.html";
                    });
                } else {
                    alert("Failed to delete quotidien: " + response.error);
                }
            }
        };

        xhr.send(params);
    }
}


function getMonthlyExpenses2() {
    var url = "api/read_trans_mens2.php";
    fetch(url)
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("mon_exp").innerHTML = data;
        })
        .catch((error) => console.error("Error:", error));
}