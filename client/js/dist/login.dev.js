"use strict";

var _message = require("./utilities/message.js");

var _serverHttpRequest = require("./utilities/serverHttpRequest.js");

function getLoginsDetails() {
  var email = document.getElementById("email").value;
  var userPassword = document.getElementById("userPassword").value;
  return {
    email: email,
    userPassword: userPassword
  };
}

function userLogin() {
  var data, response;
  return regeneratorRuntime.async(function userLogin$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          event.preventDefault();
          _context.next = 3;
          return regeneratorRuntime.awrap(getLoginsDetails());

        case 3:
          data = _context.sent;
          _context.next = 6;
          return regeneratorRuntime.awrap(_serverHttpRequest.HttpRequest.server("../api/login.php", 'POST', data));

        case 6:
          response = _context.sent;

          if (response) {
            (0, _message.messageBox)("#loginmsg", "block", "red", "Email not exist");
          } else {
            (0, _message.messageBox)("#loginmsg", "block", "red", "Wrong Password");
            /*  
             location.href = 'myProfileEdit.php';       */
          }

        case 8:
        case "end":
          return _context.stop();
      }
    }
  });
}

document.querySelector("#loginForm").addEventListener('submit', userLogin);