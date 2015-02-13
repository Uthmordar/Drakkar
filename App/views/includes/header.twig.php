<!DOCTYPE html>
<html lang="{{config.getConfig('locale') }}">
    <head>
        <title>{{config.getConfig('name')}}{% block title %}{% endblock %}</title>
        <!-- META -->
        <meta http-equiv="Content-Type" content="text/html; charset={{ config.getConfig('charset') }}"/>
        <meta name='Author' content="{{ config.getConfig('author') }}">
        <meta name='description' content="{{ config.getConfig('description') }}">
        <meta name='keywords' content="{{ config.getConfig('keywords') }}">
        <meta name="robots" content="follow,index">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <!-- [if IE]>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=8'/>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- FAVICON -->
        <link rel='shortcut icon' href="{{path.getPath('image')}}favicon.ico"/>
        <link rel='icon' href="{{path.getPath('image')}}favicon.ico"/>
        <!-- CSS -->
        <link rel='stylesheet' href="{{path.getPath('css')}}reset.css" type='text/css' media='all' />
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <style>
            @font-face {
                font-family: "Varela";
                src: url("{{path.getPath('assets')}}/fonts/Varela/varela-regular-webfont.eot"); /* Mode de compatibilité IE9 */
                src: url("{{path.getPath('assets')}}/fonts/Varela/varela-regular-webfont.eot?#iefix") format('embedded-opentype'), 
                    url("{{path.getPath('assets')}}/fonts/Varela/varela-regular-webfont.woff") format('woff'), 
                    url("{{path.getPath('assets')}}/fonts/Varela/varela-regular-webfont.svg#Varela") format('svg'), 
                    url("{{path.getPath('assets')}}/fonts/Varela/varela-regular-webfont.ttf") format('truetype'); /* Safari, Android, iOS */
                font-weight: 'normal';
                font-style: 'normal';
            }
            @font-face {
                font-family: "Voltaire";
                src: url("{{path.getPath('assets')}}/fonts/Voltaire/voltaire-regular-webfont.eot"); /* Mode de compatibilité IE9 */
                src: url("{{path.getPath('assets')}}/fonts/Voltaire/voltaire-regular-webfont.eot?#iefix") format('embedded-opentype'), 
                    url("{{path.getPath('assets')}}/fonts/Voltaire/voltaire-regular-webfont.woff") format('woff'), 
                    url("{{path.getPath('assets')}}/fonts/Voltaire/voltaire-regular-webfont.svg#Varela") format('svg'), 
                    url("{{path.getPath('assets')}}/fonts/Voltaire/voltaire-regular-webfont.ttf") format('truetype'); /* Safari, Android, iOS */
                font-weight: 'normal';
                font-style: 'normal';
            }
        </style>
        <link rel='stylesheet' href="{{path.getPath('css')}}animate-min.css" type='text/css' media='all'/>
        <link rel='stylesheet' href="{{path.getPath('css')}}index.css" type='text/css' media='all'/>