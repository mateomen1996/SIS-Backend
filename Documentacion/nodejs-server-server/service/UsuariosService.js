'use strict';


/**
 * Creacion de Usuarios
 * 
 *
 * body DatosUsuario El Usuario cierra la sesion
 * no response value expected for this operation
 **/
exports.apiAuthSignupPost = function(body) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Obtener datos del Usuario por token
 * 
 *
 * token String Token
 * returns UsuarioRegistro
 **/
exports.apiAuthUserGet = function(token) {
  return new Promise(function(resolve, reject) {
    var examples = {};
    examples['application/json'] = {
  "activation_token" : "activation_token",
  "id_rol" : 0,
  "passwors" : "passwors",
  "name" : "name",
  "id_user" : 6,
  "email" : "email"
};
    if (Object.keys(examples).length > 0) {
      resolve(examples[Object.keys(examples)[0]]);
    } else {
      resolve();
    }
  });
}


/**
 * Muestra lo diferentes roles de Usuarios
 * 
 *
 * body Rol Solicita los roles existentes
 * no response value expected for this operation
 **/
exports.apiRolGet = function(body) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Muestra informacion detallada de un usuario
 * 
 *
 * token String Token
 * returns UsuarioRegistro
 **/
exports.apiUserCreatorGet = function(token) {
  return new Promise(function(resolve, reject) {
    var examples = {};
    examples['application/json'] = {
  "activation_token" : "activation_token",
  "id_rol" : 0,
  "passwors" : "passwors",
  "name" : "name",
  "id_user" : 6,
  "email" : "email"
};
    if (Object.keys(examples).length > 0) {
      resolve(examples[Object.keys(examples)[0]]);
    } else {
      resolve();
    }
  });
}


/**
 * Muestra todos los usuarios que creaste
 * 
 *
 * body UsuarioRegistro Solicita todos los usuarios que el creo
 * no response value expected for this operation
 **/
exports.apiUserGet = function(body) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Muestra todos los usuarios en el login
 * 
 *
 * id String id del usuario a mostrar datos
 * token String Token
 * returns UsuarioRegistro
 **/
exports.apiUserIdGet = function(id,token) {
  return new Promise(function(resolve, reject) {
    var examples = {};
    examples['application/json'] = {
  "activation_token" : "activation_token",
  "id_rol" : 0,
  "passwors" : "passwors",
  "name" : "name",
  "id_user" : 6,
  "email" : "email"
};
    if (Object.keys(examples).length > 0) {
      resolve(examples[Object.keys(examples)[0]]);
    } else {
      resolve();
    }
  });
}


/**
 * Ingreso al sistema
 * 
 *
 * correo String Correo electronico
 * password String La Contraseña del usuario
 * no response value expected for this operation
 **/
exports.loginUser = function(correo,password) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Cerrado de Session
 * 
 *
 * no response value expected for this operation
 **/
exports.logoutUser = function() {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Activacion del la Cuenta Correo electronico
 * 
 *
 * token String Token
 * no response value expected for this operation
 **/
exports.petAuthSignupActivateTokenGet = function(token) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}


/**
 * Actualizacion del usuario
 * 
 *
 * id String name that need to be updated
 * body UsuarioUP Updated user object
 * no response value expected for this operation
 **/
exports.updateUser = function(id,body) {
  return new Promise(function(resolve, reject) {
    resolve();
  });
}

