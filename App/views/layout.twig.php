{% include('includes/header.twig.php') %}

	{% block css %}
        
    {% endblock %}
</head>
<body>
<!-- HEADER -->
	<header>
		{% block header %}
		{% endblock %}
	</header>
	<!-- CONTENT -->
	<div id='wrapper'>
		{% block wrapper %}   
		{% endblock %}
	</div>
	<!-- FOOTER -->
	<footer>
		{% include('includes/footer.twig.php') %}
	</footer>
</body>
    <!-- SCRIPT -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    {% block script %}
    {% endblock %}
</html>