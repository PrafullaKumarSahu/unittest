<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Carousel;
use App\Repositories\CarouselRepository;
use CarouselFactory;

use App\Exceptions\CreateCarouselErrorException;
use App\Exceptions\CarouselNotFoundException;
use App\Exceptions\UpdateCarouselErrorException;

class CarouselUnitTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     * 
     * @test
     */
    public function it_can_create_a_carousel()
    {
        $data = [
            'title' => $this->faker->word,
            'link' => $this->faker->url,
            'src' => $this->faker->url
        ];

        $carouselRepo = new CarouselRepository(new Carousel);
        $carousel = $carouselRepo->createCarousel($data);

        $this->assertInstanceOf(Carousel::class, $carousel);
        $this->assertEquals($data['title'], $carousel->title);
        $this->assertEquals($data['link'], $carousel->link);
        $this->assertEquals($data['src'], $carousel->src);

    }

    /** 
     * @test
    */
    public function it_can_show_the_carousel()
    {
        $carousel = factory(Carousel::class)->create();
        $carouselRepo = new CarouselRepository(new Carousel);
        $found = $carouselRepo->findCarousel($carousel->id);

        $this->assertInstanceOf(Carousel::class, $found);
        $this->assertEquals($found->title, $carousel->title);
        $this->assertEquals($found->link, $carousel->link);
        $this->assertEquals($found->src, $carousel->src);
    }

    /**
     * A basic test example.
     *
     * @return void
     * 
     * @test
     */
    public function it_can_update_the_carousel()
    {
        $carousel = factory(Carousel::class)->create();

        $data = [
            'title' => $this->faker->word,
            'link' => $this->faker->url,
            'src' => $this->faker->url
        ];

        $carouselRepo = new CarouselRepository($carousel);
        $update = $carouselRepo->updateCarousel($data);

        $this->assertTrue($update);
        $this->assertEquals($data['title'], $carousel->title);
        $this->assertEquals($data['link'], $carousel->link);
        $this->assertEquals($data['src'], $carousel->src);
    }

    /** @test */
    public function it_should_throw_not_found_error_exception_when_the_carousel_is_not_found()
    {
        $this->expectException(CarouselNotFoundException::class);
        $carouselRepo = new CarouselRepository(new Carousel);
        $carouselRepo->findCarousel(999);
    }

    /** @test */
    public function it_should_throw_an_error_when_the_required_columns_are_not_filled()
    {
        $this->expectException(CreateCarouselErrorException::class);
        $carouselRepo = new CarouselRepository(new Carousel);
        $carouselRepo->createCarousel([]);
    }

    /** 
     * @test
    */
    public function it_should_throw_update_error_exception_when_the_carousel_has_failed_to_update()
    {
        $this->expectException(UpdateCarouselErrorException::class);

        $carousel = factory(Carousel::class)->create();
        $carouselRepo = new CarouselRepository($carousel);

        $data = ['title' => null];
        $carouselRepo->updateCarousel($data);
    }

    /**
     * @test
     */
    public function it_returns_null_when_deleting_a_non_existing_carousel()
    {
        $carouselRepo = new CarouselRepository(new Carousel);
        $delete = $carouselRepo->deleteCarousel();
        $this->assertNull($delete);
    }
}
