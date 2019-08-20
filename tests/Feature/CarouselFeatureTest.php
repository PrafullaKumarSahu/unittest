<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use Illuminate\Http\UploadedFile;

class CarouselFeatureTest extends TestCase
{
    use WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     * 
     * @test
     */
    public function it_can_show_the_create_carousel_page()
    {
        $employee = factory(User::class)->create();

        $this//->actingAs($emplyee, 'admin')
            ->get(route('carousels.create'))
            ->assertStatus(200)
            ->assertSee('Title')
            ->assertSee('Link')
            ->assertSee('Image');
    }

    /** 
     * @test
    */
    public function it_can_create_the_carousel()
    {
        $file = UploadedFile::fake()->create('image.jpg');

        $data = [
            'title' => $this->faker->word,
            'link' => $this->faker->url,
            'src' => $file,
        ];
      
        $employee = factory(User::class)->create();
      
        $this
            // ->actingAs($employee, 'admin')
            ->post(route('carousels.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route('carousels.index'))
            ->assertSessionHas('message', 'Create carousel successfully');
    }
}
