1. composer create-project laravel/laravel laravel10-vue3
2. cd laravel10-vue3
3. npm install
4. npm i vue
5. npm i vue-loader
6. npm i @vitejs/plugin-vue

7. Update vite.config.js file
Vite is a module bundler for modern JavaScript applications. 
Open vite.config.js and copy-paste the following code. 
First invoice defineConfig from vite at the top of the file 
and also import laravel-vite-plugin. 
Here plugins() take the path of the js and CSS file and create bundles for your application. 
you need to add vue() in the plugins array.

// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
plugins: [
vue(),
laravel([
'resources/css/app.css',
'resources/js/app.js',
]),
],
});


8. Create Vue 3 App
In resources/js/app.js create an instance of the vue 3 
firstly you import { createApp } from 'vue' and createApp 
It takes a parameter here we have passed App. 
Before that, you can create a vue file which is the main file responsible for the vuejs content 
name is App.vue.

// app.js
require('./bootstrap');

import { createApp } from 'vue'

import App from './App.vue'

createApp(App).mount("#app")


9. Create Vue 3 Component
Under the js folder create a file name 'App.vue' 
and write content for this example let’s write simple 
"How To Install Vue 3 in Laravel 10 with Vite - TechvBlogs" 
you can change it according to your requirement.

<template>
    How To Install Vue 3 in Laravel 10 with Vite - TechvBlogs
</template>

10. Connect Vue 3 Component with Laravel blade file
In this step, go-to resource / views  directory, create the  app.blade.php  file, 
and add the following code to app.blade.php  as follow:

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>How To Install Vue 3 in Laravel 10 with Vite</title>

	@vite('resources/css/app.css')
</head>
<body>
	<div id="app">
        <template></template>
    </div>

	@vite('resources/js/app.js')
</body>
</html>

11. Update Laravel Routes
    Route::get('/', function () {
    return view('app');
    });


12. composer require laravel/ui
13. npm install
14. php artisan ui vue --auth
15. php artisan migrate
16. npm run dev
