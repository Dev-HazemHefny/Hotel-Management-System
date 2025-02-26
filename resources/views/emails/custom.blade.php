<!-- filepath: resources/views/emails/custom.blade.php -->
<h1>{{ $details['greeting'] }}</h1>
<p>{{ $details['body'] }}</p>
<a href="{{ $details['action_url'] }}">{{ $details['action_text'] }}</a>
<p>{{ $details['endline'] }}</p>