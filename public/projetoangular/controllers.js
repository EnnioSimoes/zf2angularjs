'use strict'
angular.module('myApp.controllers', ['ngRoute','myApp.services'])
    .controller('CategoriasCtrl',
        ['$scope','CategoriasSrv','$location','$routeParams',
            function($scope, CategoriasSrv, $location, $routeParams){
                $scope.nome = "Ennio 10";

                $scope.load = function(){
                    $scope.registros = CategoriasSrv.query();
                }
                $scope.load();

                $scope.get = function(){
                    $scope.item = CategoriasSrv.get({id: $routeParams.id});

                }

                $scope.add = function(item){
                    $scope.result = CategoriasSrv.save(
                        {},
                        item,
                        function(data, status, headers, config){
                            $location.path('/categorias/');
                        },
                        function(data, status, headers, config){
                            alert('Erro ao inserir registro: '+data.messages[0]);
                        }
                    )
                }
                $scope.editar = function(item){
                    $scope.result = CategoriasSrv.update(
                        {id: $routeParams.id},
                        item,
                        function(data, status, headers, config){
                            $location.path('/categorias/');
                        },
                        function(data, status, headers, config){
                            alert('Erro ao editar registro: '+data.messages[0]);
                        }                                    
                    )
                }
                $scope.delete = function(id){
                    if(confirm('Deseja realmente excluir este registro?')){
                        CategoriasSrv.remove(
                            {id: id},
                            {},
                            function(data, status, headers, config){
                                $location.path('/categorias/');
                            },
                            function(data, status, headers, config){
                                alert('Erro ao deletar registro: '+data.messages[0]);
                            }                                
                        )
                    }
                }

            }
        ]
    )
    .controller('ProdutosCtrl',
            ['$scope','ProdutosSrv','CategoriasSrv','$location','$routeParams',
            function($scope, ProdutosSrv,CategoriasSrv,$location, $routeParams){
                $scope.nome = "Ennio 10";

                $scope.load = function(){
                    $scope.registros = ProdutosSrv.query();
                }

                $scope.getCategorias = function(){
                    $scope.categorias = CategoriasSrv.query();
                }
                $scope.getCategorias();
               //$scope.load();

                $scope.get = function(){
                    $scope.item = ProdutosSrv.get({id: $routeParams.id});

                }

                $scope.add = function(item){
                    $scope.result = ProdutosSrv.save(
                        {},
                        item,
                        function(data, status, headers, config){
                            $location.path('/produtos/');
                        },
                        function(data, status, headers, config){
                            alert('Erro ao inserir registro: '+data.messages[0]);
                        }
                    )
                }
                $scope.editar = function(item){
                    $scope.result = ProdutosSrv.update(
                        {id: $routeParams.id},
                        item,
                        function(data, status, headers, config){
                            $location.path('/produtos/');
                        },
                        function(data, status, headers, config){
                            alert('Erro ao editar registro: '+data.messages[0]);
                        }                                    
                    )
                }
                $scope.delete = function(id){
                    if(confirm('Deseja realmente excluir este registro?')){
                        ProdutosSrv.remove(
                            {id: id},
                            {},
                            function(data, status, headers, config){
                                $location.path('/produtos/');
                            },
                            function(data, status, headers, config){
                                alert('Erro ao deletar registro: '+data.messages[0]);
                            }                                
                        )
                    }
                }

            }
        ]
    )
;