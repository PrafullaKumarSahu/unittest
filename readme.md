## Unit Test

#### Positive Tests
    ###### Create Test
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>createCarousel()</code> with data to create a carousel, now
        2. Check if the created carousel is instance of <code>Carousel</code> model class
        3. Check if title of this carousel is same as input title given
        4. Check if link of this carousel is same as input link given
        5. Check if src of this carousel is same as input src given
        6. If all are okay, then create is working fine

    ###### Show Test
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>findCarousel()</code> by passing an id of an carousel, now
        2. Check if it has title, link and src attributes
        3. If all are okay, then create is working fine

    ###### Update Test
        1. Create an instance of <code>CarouselRepository</code> class with instance of Carousel model that to be updated, call the <code>updateCarousel()</code> and pass data to update a carousel, now
        2. Check if title of this carousel is same as input title given
        3. Check if link of this carousel is same as input link given
        4. Check if src of this carousel is same as input src given
        5. If all are okay, then create is working fine
    
 #### Positive Tests

    ###### Try to find a carousel with non existing id
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>findCarousel()</code> by passing a non existing id, now
        2. It should through a <code>CarouselNotFoundException</code> exception

    ###### Try to create a carousel without required field/required value
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>createCarousel()</code> by skipping any required field in <code>$data</code> array
        2. It should through a <code>CreateCarouselErrorException</code> exception

    ###### Try to create a carousel with invalid value for any field
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>createCarousel()</code> by passing any invalid field/value in <code>$data</code> array
        2. It should through a <code>UpdateCarouselErrorException</code> exception

    ###### Try to delete a non existing carousel
        1. Create an instance of <code>CarouselRepository</code> class, call the <code>deleteCarousel()</code> by passing a non existing carousel id
        2. It should return null

## Feature Test
    ###### Check if create carousel form page is accessible and having correct fields
        1. Create a form to create a carousel
        2. Using <code>get()</code> method visit the form route, check if <code>assertStatus()</code>  method returns 200
        3. And then if <code>assertSee()</code> method can see title, link and Image fields

    ###### Check if store carousel is working fine after posting the create form and redirecting to index page
        1. Post data to <code>carousels.store</code> route, check if <code>assertStatus()</code>  method returns 302
        2. Redirect to carouseld.index route using <code>assertRedirect</code>
        3. Now if  <code>assertSessionHas</code> returns true for message "Create carousel successfully", then everything fine

## Repository Design Pattern

The real idea is to not allowing Contollers to communicate with Models directly, so Controllers will communicate with repositories and repositories will communicate with Models, but as it will break <strong>route-model</strong> concept, so what I did is just allowing Controller to accept and create model instance only to create Repository instance, rest jobs will be done in Repositories, so there will be only read only transaction fro controller to model and no direct write transaction.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
