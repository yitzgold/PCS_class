var express = require('express');
var router = express.Router();

let contacts = {
  "list":
    [
      {
        "firstName": "bob",
        "lastName": "klien",
        "email": "a@b",
        "phone": "1234567"
      },
      {
        "firstName": "jon",
        "lastName": "doe",
        "email": "s@a",
        "phone": "7654321"
      }
    ]
};

/* GET home page. */
router.get('/', function (req, res, next) {
  res.render('index', { title: 'Express' });
});

router.post('/contacts', function (req, res, next) {
  contacts.list.push({
    "firstName": req.body.firstName,
    "lastName": req.body.lastName,
    "email": req.body.email,
    "phone": req.body.phone
  });
})

router.get('/contacts', function (req, res, next) {
  res.render('contacts', { title: 'Contacts', contacts: contacts });
});


module.exports = router;
