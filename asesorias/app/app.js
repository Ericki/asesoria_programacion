var app = angular.module('myApp', ['ngRoute','angularMoment','ngTable','ui.bootstrap']);
app.factory("services", ['$http', function($http) {
  var serviceBase = 'services/'
    var obj = {};
    obj.getCustomers = function(){
        return $http.get(serviceBase + 'customers');
    }
    obj.getUsuarios = function(){
        return $http.get(serviceBase + 'usuarios');
    }
    obj.getCustomer = function(customerID){
        return $http.get(serviceBase + 'customer?id=' + customerID);
    }

    obj.insertCustomer = function (customer) {
    return $http.post(serviceBase + 'insertCustomer', customer).then(function (results) {
        return results;
    });
	  };

	  obj.updateCustomer = function (id,customer) {
	    return $http.post(serviceBase + 'updateCustomer', {id:id, customer:customer}).then(function (status) {
	        return status.data;
	    });
	};

	obj.deleteCustomer = function (id) {
	    return $http.delete(serviceBase + 'deleteCustomer?id=' + id).then(function (status) {
	        return status.data;
	    });
	};
  obj.getComentarios = function(){
        return $http.get(serviceBase + 'comentarios');
    }
    obj.getComentariosC = function(){
        return $http.get(serviceBase + 'comentariosC');
    }
    obj.getComentario = function(comentarioID){
        return $http.get(serviceBase + 'comentario?id=' + comentarioID);
    }

    obj.insertarComentario = function (comentario) {
    return $http.post(serviceBase + 'insertarComentario', comentario).then(function (results) {
        return results;
    });
    };

  obj.actualizarComentario = function (id,customer) {
      return $http.post(serviceBase + 'actualizarComentario', {id:id, customer:customer}).then(function (status) {
          return status.data;
      });
  };
obj.borrarComentario = function (id) {
      return $http.delete(serviceBase + 'borrarComentario?id=' + id).then(function (status) {
          return status.data;
      });
  };
  obj.getSubComentarios = function(){
        return $http.get(serviceBase + 'subComentarios');
    }
  obj.getSubComentario = function(comentarioID){
        return $http.get(serviceBase + 'subComentario?id=' + comentarioID);
  }
  obj.insertarSubComentario = function (comentario) {
    return $http.post(serviceBase + 'insertarSubComentario', comentario).then(function (results) {
        return results;
  });
  };
  obj.actualizarSubComentario = function (id,customer) {
      return $http.post(serviceBase + 'actualizarSubComentario', {id:id, customer:customer}).then(function (status) {
          return status.data;
      });
  };
 obj.borrarSubComentario = function (id) {
      return $http.delete(serviceBase + 'borrarSubComentario?id=' + id).then(function (status) {
          return status.data;
      });
  };
    return obj; 
    
}]);
  

app.controller('listCtrl', function ($scope, services) {
    services.getCustomers().then(function(data){
        $scope.customers = data.data;
    });
});
app.controller('listUsuariosCtrl', function ($scope, services) {
    services.getUsuarios().then(function(data){
        $scope.customers = data.data;
    });
});

app.controller('usuarioEditCtrl', function ($scope, $rootScope, $location, $routeParams, services, customer, upload) {
    
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Editar Usuario' : 'Añadir usuario';
    $scope.buttonText = (customerID > 0) ? 'Actualizar' : 'Añadir nuevo usuario';
      var original = customer.data;
      original._id = customerID;
      $scope.customer = angular.copy(original);
      $scope.customer._id = customerID;


      
    $scope.uploadFile = function(customer){
    var name = $scope.name;
    var file = $scope.file;
      upload.uploadFile(file, name).then(function(res){
      $scope.customer.foto= 'imagenes/'+res.data;
      services.updateCustomer($scope.customer._id, $scope.customer);
      $location.path('/editar-perfil/'+customerID);
      });
    };
    $scope.isClean = function() {
        return angular.equals(original, $scope.customer);
      }

      $scope.deleteCustomer = function(customer) {
        $location.path('/');
        if(confirm("Seguro eliminar: "+$scope.customer._id)==true)
        services.deleteCustomer(customer.id_usuario);

      };

      $scope.saveCustomer = function(customer) {
        $location.path('/');
        if (customerID <= 0) {
            services.insertCustomer(customer);
        }
        else {
            services.updateCustomer(customerID, customer);
            $location.path("/perfil/"+customerID);
        }
    };
     $scope.status = ['Alta','Baja'];
     $scope.selected = $scope.status[0];
});

app.controller('editCtrl', function ($scope, $rootScope, $location, $routeParams, services, customer) {
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Editar Usuario' : 'Añadir usuario';
    $scope.buttonText = (customerID > 0) ? 'Actualizar' : 'Añadir nuevo usuario';
      var original = customer.data;
      original._id = customerID;
      $scope.customer = angular.copy(original);
      $scope.customer._id = customerID;
      $scope.isClean = function() {
        return angular.equals(original, $scope.customer);
      }

      $scope.deleteCustomer = function(customer) {
        $location.path('/');
        if(confirm("Seguro: "+$scope.customer._id)==true)
        services.deleteCustomer(customer.id_usuario);
      };

      $scope.saveCustomer = function(customer) {
        $location.path('/');
        if (customerID <= 0) {
            services.insertCustomer(customer);
        }
        else {
            services.updateCustomer(customerID, customer);
            window.location.assign("#administrar-usuarios");
            alert();
        }
    };

     $scope.status = ['Alta','Baja'];
     $scope.tusuarios = ['Asesorado','Alumno Asesor','Asesor'];
     $scope.selected2 = $scope.tusuarios[0];
     $scope.selected = $scope.status[0];
});

app.controller('listaComentariosCtrl', function ($scope, services,moment) {
    services.getComentarios().then(function(data){
        $scope.comentarios = data.data;
         $scope.filteredComentario = []
        ,$scope.currentPage = 1
        ,$scope.numPerPage = 5
        ,$scope.maxSize = 5;
  
    $scope.makeTodos = function() {
      $scope.todos = [];
      $scope.todos=data.data;
    };
    $scope.makeTodos(); 
  
    $scope.numPages = function () {
      return Math.ceil($scope.todos.length / $scope.numPerPage);
    };
  
    $scope.$watch('currentPage + numPerPage', function() {
      var begin = (($scope.currentPage - 1) * $scope.numPerPage)
      , end = begin + $scope.numPerPage;
    
      $scope.filteredComentario = $scope.todos.slice(begin, end);
    });
    });
    services.getSubComentarios().then(function(data){
        $scope.subComentarios = data.data;
    });
    
    angular.element(document).ready(function () {//start jquery
        //document.getElementById('msg').innerHTML = 'Hello';
         $('.collapsible').collapsible();//Initialization of collapsible
         
    });
   
});
app.controller('listaComentariosCCtrl', function ($scope, services,moment,$rootScope, $location, $routeParams, customer) {
    services.getComentariosC().then(function(data){
      var customerID = ($routeParams.customerID); 
      $scope.lenguaje = customerID;
      alert($scope.lenguaje);
        $scope.comentarios = data.data;
         $scope.filteredComentario = []
        ,$scope.currentPage = 1
        ,$scope.numPerPage = 5
        ,$scope.maxSize = 5;
  
    $scope.makeTodos = function() {
      $scope.todos = [];
      $scope.todos=data.data;
    };
    $scope.makeTodos(); 
  
    $scope.numPages = function () {
      return Math.ceil($scope.todos.length / $scope.numPerPage);
    };
  
    $scope.$watch('currentPage + numPerPage', function() {
      var begin = (($scope.currentPage - 1) * $scope.numPerPage)
      , end = begin + $scope.numPerPage;
    
      $scope.filteredComentario = $scope.todos.slice(begin, end);
    });
    });
    services.getSubComentarios().then(function(data){
        $scope.subComentarios = data.data;
    });
    
    angular.element(document).ready(function () {//start jquery
        //document.getElementById('msg').innerHTML = 'Hello';
         $('.collapsible').collapsible();//Initialization of collapsible
         
    });
   
});
app.controller('editarComentarioCtrl', function ($scope, $rootScope, $location, $routeParams, services, customer) {
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Editar Comentario' : 'Añadir Comentario';
    $scope.buttonText = (customerID > 0) ? 'Editar' : 'Comentar';
      var original = customer.data;
      original._id = customerID;
      $scope.customer = angular.copy(original);
      $scope.customer._id = customerID;

      $scope.isClean = function() {
        return angular.equals(original, $scope.customer);
      }
      $scope.deleteCustomer = function(customer) {
        $location.path('/');
        if(confirm("Borrar comentario: "+$scope.customer._id)==true)
        services.borrarComentario(customer.id_foro);
        $location.path("/foro");

      };

      $scope.saveCustomer = function(customer) {
        $location.path('/');
        if (customerID <= 0) {
            services.insertarComentario(customer);
            $location.path("/foro");
            //window.location.assign("#foro");
        }
        else {
            services.actualizarComentario(customerID, customer);
            window.location.assign("#foro");
            window.location.reload(true);
            
            alert();
       
        }
    };
    var f = new Date();

    $scope.message = {
    time:  f.getFullYear()+ "-" + (f.getMonth() +1) + "-" + f.getDate() + " " + f.getHours()+ ":" +f.getMinutes()+ ":"+f.getSeconds() 
    };
    
});
app.controller('insertarSubComentarioCtrl', function ($scope, $rootScope, $location, $routeParams, services, customer) {
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Comentar' : 'Añadir Comentario';
    $scope.buttonText = (customerID > 0) ? 'Comentar' : 'Comentar';
      var original = customer.data;
      original._id = customerID;
      $scope.customer = angular.copy(original);
      $scope.customer._id = customerID;

      $scope.isClean = function() {
        return angular.equals(original, $scope.customer);
      }

      $scope.saveCustomer = function(customer) {
        $location.path('/');
            services.insertarSubComentario (customer);
            window.location.assign("#foro");
      };
    var f = new Date();

    $scope.message = {
    time:  f.getFullYear()+ "-" + (f.getMonth() +1) + "-" + f.getDate() + " " + f.getHours()+ ":" +f.getMinutes()+ ":"+f.getSeconds() 
    };
    
});
app.controller('editarSubComentarioCtrl', function ($scope, $rootScope, $location, $routeParams, services, customer) {
    var customerID = ($routeParams.customerID) ? parseInt($routeParams.customerID) : 0;
    $rootScope.title = (customerID > 0) ? 'Editar Comentario' : 'Añadir Comentario';
    $scope.buttonText = (customerID > 0) ? 'Editar' : 'Comentar';
      var original = customer.data;
      original._id = customerID;
      $scope.customer = angular.copy(original);
      $scope.customer._id = customerID;

      $scope.isClean = function() {
        return angular.equals(original, $scope.customer);
      }
      $scope.deleteCustomer = function(customer) {
        $location.path('/');
        if(confirm("Borrar comentario: "+$scope.customer._id)==true)
        services.borrarSubComentario(customer.id_comentario);
      window.location.assign("#foro");
      };

      $scope.saveCustomer = function(customer) {
        $location.path('/');
        if (customerID <= 0) {
            services.insertarSubComentario(customer);
            window.location.assign("#foro");
        }
        else {
            services.actualizarSubComentario(customerID, customer);
            window.location.assign("#foro");
        }
    };
    var f = new Date();

    $scope.message = {
    time:  f.getFullYear()+ "-" + (f.getMonth() +1) + "-" + f.getDate() + " " + f.getHours()+ ":" +f.getMinutes()+ ":"+f.getSeconds() 
    };
    
});

app.controller('HomeCtrl', ['$scope', 'upload', function ($scope, upload) 
{
  $scope.uploadFile = function()
  {
    var name = $scope.name;
    var file = $scope.file;
    
    upload.uploadFile(file, name).then(function(res)
    {
      console.log(res);
    })
  }
}])

app.directive('uploaderModel', ["$parse", function ($parse) {
  return {
    restrict: 'A',
    link: function (scope, iElement, iAttrs) 
    {
      iElement.on("change", function(e)
      {
        $parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
      });
    }
  };
}])

app.service('upload', ["$http", "$q", function ($http, $q) 
{
  this.uploadFile = function(file, name)
  {
    var deferred = $q.defer();
    var formData = new FormData();
    formData.append("name", name);
    formData.append("file", file);
    return $http.post("server.php", formData, {
      headers: {
        "Content-type": undefined
      },
      transformRequest: angular.identity
    })
    .success(function(res)
    {
      deferred.resolve(res);
    })
    .error(function(msg, code)
    {
      deferred.reject(msg);
    })
    return deferred.promise;
  } 
}])
app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider
    .when('/', {
        title: 'Inicio',
        templateUrl: 'partials/inicio.php',
        controller: 'listCtrl'
      })
    .when('/administrar-usuarios', {
        title: 'Administrar usuarios',
        templateUrl: 'partials/administrador/administrar-usuarios.php',
        controller: 'listCtrl'
      })
      .when('/administrar-usuarios-asesor', {
        title: 'Administrar usuarios',
        templateUrl: 'partials/administrador/administrar-usuarios-asesor.php',
        controller: 'listUsuariosCtrl'
      })
      .when('/editar-usuario/:customerID', {
        title: 'Edit Customers',
        templateUrl: 'partials/administrador/editar-usuario.php',
        controller: 'editCtrl',
        resolve: {
          customer: function(services, $route){
            var customerID = $route.current.params.customerID;
            return services.getCustomer(customerID);
          }
        }
      })
      .when('/editar-usuario-asesor/:customerID', {
        title: 'Edit Customers',
        templateUrl: 'partials/administrador/editar-usuario-asesor.php',
        controller: 'editCtrl',
        resolve: {
          customer: function(services, $route){
            var customerID = $route.current.params.customerID;
            return services.getCustomer(customerID);
          }
        }
      })
      .when('/editar-perfil/:customerID', {
        title: 'Editar Perfil',
        templateUrl: 'partials/perfil/editar-perfil.php',
        controller: 'usuarioEditCtrl',
        resolve: {
          customer: function(services, $route){
            var customerID = $route.current.params.customerID;
            return services.getCustomer(customerID);
          }
        }
      })
      .when('/foro', {
        title: 'Foro Java',
        templateUrl: 'partials/foro/comentarios.php',
        controller: 'listaComentariosCtrl',
        
      })
      .when('/imagens', {
        title: 'imagen',
        templateUrl: 'partials/imagen.html',
        controller: 'HomeCtrl',
        
      })
      .when('/foroc', {
        title: 'Foro C',
        templateUrl: 'partials/foro/comentariosC.php',
        controller: 'listaComentariosCCtrl',
        resolve: {
          customer: function(services, $route){
            var customerID = 'hola';
            return customerID;
          }
        }  
      })
      .when('/editar-comentario/:customerID', {
        title: 'Editar Comentario',
        templateUrl: 'partials/foro/editar-comentario.php',
        controller: 'editarComentarioCtrl',
        resolve: {
          customer: function(services, $route){
            var comentarioID = $route.current.params.customerID;
            return services.getComentario(comentarioID);
          }
        }
      })
      .when('/insertar-subcomentario/:customerID', {
        title: 'Editar Comentario',
        templateUrl: 'partials/foro/insertar-subcomentario.php',
        controller: 'insertarSubComentarioCtrl',
        resolve: {
          customer: function(services, $route){
            var comentarioID = $route.current.params.customerID;
            return services.getComentario(comentarioID);
          }
        }
      })
      .when('/editar-subcomentario/:customerID', {
        title: 'Editar Comentario',
        templateUrl: 'partials/foro/editar-subcomentario.php',
        controller: 'editarSubComentarioCtrl',
        resolve: {
          customer: function(services, $route){
            var comentarioID = $route.current.params.customerID;
            return services.getSubComentario(comentarioID);
          }
        }
      })
      .when('/perfil/:customerID', {
        title: 'Perfil',
        templateUrl: 'partials/perfil/perfil.php',
        controller: 'usuarioEditCtrl',
        resolve: {
          customer: function(services, $route){
            var customerID = $route.current.params.customerID;
            return services.getCustomer(customerID);
          }
        }
      })
      .otherwise({
        redirectTo: '/'
      });
}]);
app.run(['$location', '$rootScope', function($location, $rootScope) {
    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
        $rootScope.title = current.$$route.title;
    });
}]);



