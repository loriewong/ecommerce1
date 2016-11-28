@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Blog</h1>
    <h3>Problems</h3>
    <p>Initial setup took me a while to figure out even though homestead is supposed to be easy. I suppose it's easy for someone who has already used it.</p>
    <p>Had issues npm installing in homestead vs local machine and versioning issues.</p>
    <p>Gulping didnt work on homestead so had to set it up on local machine.</p>
    <p>Learning laravel framework also took a while, many features to know such as database migrations. I was doing this manually in the DB before.</p>
    <p>Vue was also new to me.</p>
    <p>I never programmed at home before so committing to git and pulling to work and home computer had initial issues on different setups.</p>

    <h3>Features/Implementations</h3>
    <p>Had to figure out what database columns and tables to do and looking online led me to my current db structure.</p>
    <p>Shopping cart - i initially was going to use cookies but found out session states were better and easier to implement. I didnt want to use DB because that would be more work and traffic for a simple e-commerce site.</p>
    
@endsection