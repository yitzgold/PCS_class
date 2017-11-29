/*global $*/
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody"),
        contacts = [];

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        contactTable.append(
            '<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '</tr>'

        );
    }

    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.val(),
            lastName: lastNameInput.val(),
            email: emailInput.val(),
            phone: phoneInput.val()
        };
        addContact(newContact);
        hideAddContactForm();
        event.preventDefault();
    });

    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    $("#import").click(function () {

        $.getJSON('contacts.php', function (data) {
            $.each(data, function (index, obj) {
                var contact = {};
                $.each(obj, function (key, value) {
                    contact[key] = value;
                });
                addContact(contact);
            });
        }).fail(function (jqxhr) {
            alert("Failed to load file: " + jqxhr.status + " " + jqxhr.statusText);
        });

        // $.get("contacts.php", function (data) {
        //     $.each(JSON.parse(data), function (idx, obj) {
        //         var contact = {};
        //         $.each(obj, function (key, value) {
        //             contact[key] = value;
        //         });
        //         addContact(contact);
        //     });
        // }).fail(function (jqxhr) {
        //     alert("Failed to load file: " + jqxhr.status + " " + jqxhr.statusText);
        // });

        // $.get("contacts.json", function (data) {
        //     data.forEach(function (element) {
        //         var contact = {
        //             firstName: element.firstName,
        //             lastName: element.lastName,
        //             email: element.email,
        //             phone: element.phone
        //         };
        //         addContact(contact);
        //     });
        // });

        // $.get("contacts.php", function (data) {
        //     JSON.parse(data).forEach(function (element) {
        //         var contact = {
        //             firstName: element.firstName,
        //             lastName: element.lastName,
        //             email: element.email,
        //             phone: element.phone
        //         };
        //         addContact(contact);
        //     });
        // });
    });
}());