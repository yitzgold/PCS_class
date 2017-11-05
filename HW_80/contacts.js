(function () {
    "use strict";

    var contactTable = get("contactTable");
    var contacts = [];

    function get(id) {
        return document.getElementById(id);
    }

    get("theForm").addEventListener("submit", function (event) {
        var firstName = get("firstName").value;
        var lastName = get("lastName").value;
        var email = get("email").value;
        var phone = get("phone").value;

        addContact(firstName, lastName, email, phone);

        event.preventDefault();
    });


    function addContact(firstName, lastName, email, phone) {
        var contact = {
            firstName: firstName,
            lastName: lastName,
            email: email,
            phone: phone
        };

        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.deleteRow(1);
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();

        firstNameCell.innerHTML = firstName;
        lastNameCell.innerHTML = lastName;
        emailCell.innerHTML = email;
        phoneCell.innerHTML = phone;
    }

}());