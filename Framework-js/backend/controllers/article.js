'use strict'

var validator = require('validator');
var fs = require('fs');
var path = require('path');
var Article = require('../models/article');

var controller = {

    datosCurso: (req, res) =>{
        var hola = req.body.hola;
    
        
        return res.status(200).send({
           curso: 'Master mamalon frameworks',
           autor: 'yo el padre',
           edad: 23 ,
           hola
        
        });
    },

    test: (req, res) => {
        return res.status(200).send({
            message: 'Soy la accion test de mi controlador de articulos'
        });
    },

    save: (req, res) =>{
        // Recoger los parametros por post
        var params = req.body;
        console.log(params);
        //validar dtos con (validator)
        try {
            var validateTitle = !validator.isEmpty(params.title);
            var validateContent = !validator.isEmpty(params.content);

        } catch (error) {
            return res.status(200).send({
                status: 'error',
                message: 'Faltan datos por enviar'
            });
        }

        if(validateTitle && validateContent){
            //crear el objeto a guardar
            var article = new Article();
            //asignar valores
            article.titulo = params.title;
            article.content = params.content;
            article.image = null;
            //guardar el articulo
            article.save((err, articleStore)=>{

                if(err || !articleStore){
                    return res.status(404).send({
                        status: 'error',
                        message: 'El articulo no se ha guardado'
                    });
                }
                //devolver unqa respuesta
                return res.status(200).send({
                    status: 'success',
                    article
            });
            })
            
        }
        else{
            return res.status(200).send({
                status: 'error',
                message: 'Los datos no son validos'
            });
        }
        
       
    },

    getArticles: (req, res) =>{

        var query = Article.find({});
        var last = req.params.last;

        if(last || last != undefined){
            query.limit(5);
        }
        //Find
        query.sort('-_id').exec((err, articles) => {

            if(err){
                return res.status(500).send({
                    status: 'error',
                    message: 'Error al devolver los articulos'
                });
            }

            if(!articles){
                return res.status(404).send({
                    status: 'error',
                    message: 'No hay articulos para mostrar'
                });
            }
            
            return res.status(200).send({
                status: 'access',
                articles
            });
        });
    },

    getArticle: (req, res)=>{
        //recoger id
        var id = req.params.id;
        //comprobar que existe
        if(!id || id == null){
            return res.status(404).send({
                status: 'error',
                message: 'No existe el id'
            });
        }
        //buscar el articulo
        Article.findById(id, (err, article) =>{

            if(err || !article){
                return res.status(404).send({
                    status: 'error',
                    message: 'No existe el articulo'
                });
            }
            //devolverlo
            return res.status(200).send({
                status: 'success',
                article
            });

        });
        
    },

    update: (req, res) => {
        //recoger id de la url
        var id = req.params.id;
        //recoger datos por put
        var params = req.body;
        //validar los datos
        try {
            var validateTitle = !validator.isEmpty(params.title);
            var validateContent = !validator.isEmpty(params.content);
        } catch (error) {
            return res.status(404).send({
                status: 'error',
                message: "Faltan datos por enviar"
            });
        }
        if(validateTitle && validateContent){
            //Find and update
            Article.findOneAndUpdate({_id: id}, params, {new: true}, (err, articleUpdate) =>{
               if(err){
                    return res.status(500).send({
                        status: 'error',
                        message: "Error al actualizar"
                    });
                }
                
                if(!articleUpdate){
                    return res.status(404).send({
                        status: 'error',
                        message: "No existe el articulo"
                    });
                }

                return res.status(200).send({
                    status: 'success',
                    articleUpdate
                });

               });

        }else{
            //devolver respuesta
            return res.status(500).send({
                status: 'error',
                message: "La validacion no es correcta"
            });
        }     
    },

    delete: (req, res) =>{
        //recoger id
        var id = req.params.id;
        //find and delete
        Article.findOneAndDelete({_id: id}, (err,articleRemove) =>{
            if(err){
                return res.status(500).send({
                    status: 'error',
                    message: 'Error al eliminar'
                });
            }

            if(!articleRemove){
                return res.status(404).send({
                    status: 'error',
                    message: 'No se encontro el articulo'
                })
            }

            return res.status(200).send({
                status: 'success',
                message: 'El articulo fue eliminado'
            })
        });

    },

    upload: (req, res) => {

        //configurar el modulo del connect multyparty router/article.js

        //recoger el fichero 
        var fileName = 'Imagen no subida';

        if(!req.files){
            return res.status(404).send({
                status: 'error',
                message: fileName
            })
        }        
        //cponseguir el nombre y la extension del archivo
        var filePath = req.files.file0.path;
        var fileSplit = filePath.split('\\');

        //ADVERTENCIA, EN LINUX O MAC
        //var fileSplit = filePath.split('/');

        //NOMBRE DEL ARCHIVO
        var file_name = fileSplit[2];

        //Extension del fichero

        var extSplit = file_name.split('\.');
        var file_ext = extSplit[1];

        //comprobar la extension solo img y si no es validads, borrar

        if(file_ext != 'png' && file_ext != 'jpg' && file_ext != 'jpeg' && file_ext != 'gif'){
            //borrar el archivo
            fs.unlink(filePath, (err) =>{
                res.status(200).send({
                    status: 'error',
                    message: 'La extension no es valida'
                });
            })
        }
        else{
            //si todo es valiudo

            //buscar el articulo, asignarle nombre a la img y actualizar
            var id = req.params.id;
            Article.findOneAndUpdate({_id: id}, {image: file_name}, {new: true}, (err, articleUpdated) =>{

                if(err || !articleUpdated){
                    return res.status(500).send({
                        status: 'error',
                        message: 'error al guardar la imagen'
                    })
                }

                return res.status(200).send({
                    status: 'success',
                    articleUpdated
                })


            });
        }    
    },

    getImage: (req ,res) =>{

        var file = req.params.image;
        var pathFile = './upload/articles/'+file;

        fs.exists(pathFile, (exists)=>{
            if(exists){
                return res.sendFile(path.resolve(pathFile));
            }
            else{
                return res.status(404).send({
                    status: 'error',
                    message: 'La imagen no existe'
                });
            }
        });
        
    },

    search: (req, res) =>{
        //sacar el string a buscar
        var searchString = req.params.search;
        //find or 
        Article.find({"$or": [

            {"title": {"$regex": searchString, "$options": "i"}},
            {"content": {"$regex": searchString, "$options": "i"}}
        ]})
        .sort([['date', 'descending']])
        .exec((err, articles) =>{

            if(err){
                return res.status(500).send({
                    status: 'error',
                    message: 'Error en la peticion'
                });
            }

            if(!articles || articles.length <= 0){
                return res.status(404).send({
                    status: 'error',
                    message: 'No hay articulos que coincidan'
                });
            }
            return res.status(200).send({
                status: 'success',
                articles
            });
        });
        
    }
}; //end controller

module.exports = controller;