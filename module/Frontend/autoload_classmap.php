<?php
/*
 * Como estamos en desarrollo, no es necesario cargar archivos a través del ClassMap,
 *  por lo que ofrecemos una matriz vacía para el autoloader ClassMap. 
 * 
 * Al ser un array vaio, siempre que el autoloader busque una clase dentro del espacio de nombres
 * retornara al StandarAutoloader automaticamente para nosotros
 * este modulo Usuario
 * 
 * should return an array classmap of class name/filename pairs (with the filenames
 * resolved via the __DIR__ magic constant).
 */
return array();