<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>

<h3>Context Display</h3>

<pre>
    @php
        var_dump($context);
    @endphp
</pre>

@if(old())
	<h3>Old Display</h3>
	@php
        var_dump(old());
    @endphp
@endif

<!-- debugging -->
{{--
	@if(array_key_exists('debugging', $context) and $context['debugging'] != NULL)
	    <?php
	        echo '<pre>';
	        var_dump($context);
	        echo '</pre>'
	    ?>
	@endif
--}}

</body>
</html>