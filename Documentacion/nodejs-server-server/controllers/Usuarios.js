'use strict';

var utils = require('../utils/writer.js');
var Usuarios = require('../service/UsuariosService');

module.exports.apiAuthSignupPost = function apiAuthSignupPost (req, res, next) {
  var body = req.swagger.params['body'].value;
  Usuarios.apiAuthSignupPost(body)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.apiAuthUserGet = function apiAuthUserGet (req, res, next) {
  var token = req.swagger.params['token'].value;
  Usuarios.apiAuthUserGet(token)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.apiRolGet = function apiRolGet (req, res, next) {
  var body = req.swagger.params['body'].value;
  Usuarios.apiRolGet(body)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.apiUserCreatorGet = function apiUserCreatorGet (req, res, next) {
  var token = req.swagger.params['token'].value;
  Usuarios.apiUserCreatorGet(token)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.apiUserGet = function apiUserGet (req, res, next) {
  var body = req.swagger.params['body'].value;
  Usuarios.apiUserGet(body)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.apiUserIdGet = function apiUserIdGet (req, res, next) {
  var id = req.swagger.params['id'].value;
  var token = req.swagger.params['token'].value;
  Usuarios.apiUserIdGet(id,token)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.loginUser = function loginUser (req, res, next) {
  var correo = req.swagger.params['correo'].value;
  var password = req.swagger.params['password'].value;
  Usuarios.loginUser(correo,password)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.logoutUser = function logoutUser (req, res, next) {
  Usuarios.logoutUser()
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.petAuthSignupActivateTokenGet = function petAuthSignupActivateTokenGet (req, res, next) {
  var token = req.swagger.params['token'].value;
  Usuarios.petAuthSignupActivateTokenGet(token)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};

module.exports.updateUser = function updateUser (req, res, next) {
  var id = req.swagger.params['id'].value;
  var body = req.swagger.params['body'].value;
  Usuarios.updateUser(id,body)
    .then(function (response) {
      utils.writeJson(res, response);
    })
    .catch(function (response) {
      utils.writeJson(res, response);
    });
};
