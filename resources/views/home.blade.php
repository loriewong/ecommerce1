@extends('layouts.app')

@section('title', 'Blog')

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
    <p>Shopping cart - i initially was going to use cookies but found out session states were better and easier to implement. I didnt want to use DB because that would be more work and traffic for a simple e-commerce site. The session state would store the price at the time the customer adds to cart. I did it this way because it was easier on me and I am intentionally not accounting for security. Problems with logging the price at this time is the customer can potentially modify price in session state. To have a safer measure is to pull the price from DB everytime it is displayed.</p>
    <p></p>


    <p>Below is an image of how I would similarly implement it if I was planning on making this ecommerce site a full fledged one. The products table in this one would basically produce a different product for every attribute, mine has an attributes table.</p>
    <img src="https://www.princeton.edu/~rcurtis/ultradev/images/storediagram.gif"/>
@endsection